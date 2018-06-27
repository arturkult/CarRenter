<?php

function get_db()
{
    $mongo = new MongoClient(
        "mongodb://localhost:27017/",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
            'db' => 'wai',
        ]);

    $db = $mongo->wai;

    return $db;
}

function get_images()
{
    $db = get_db();
    if(!isset($_SESSION['user'])||$_SESSION['user']['logged']==false)
    return $db->images->find(['access'=>'public']);
	else {
		return $db->images->find(['$or'=>[
			['access'=>'public'],
				['$and'=>[
				[
				'author'=>$_SESSION['user']['login']
				],
				[
				'access'=>'private'
				]
			]
			]
			]
		]);
	}
}

function get_images_by_id($ids){
	$db = get_db();

	$table = [];

	foreach ($ids as $id) {
		array_push($table, $db->images->findOne(['_id' => new MongoId($id)]));
	}
	return $table;
}

function get_image($id){
	$db = get_db();
	return $db->images->findOne(['_id' => new MongoId($id)]);
}

function delete_from_selected($ids){
	$_SESSION['images'] = array_diff($_SESSION['images'], $ids);
}

function upload_image($id, $image, $title, $author, $access){
	   $db = get_db();

	   $check = true;

	   $dest_image = [];

	   $target_file_name = $image['name'];
			$target_directory = "images/".$target_file_name;
			$image_file_type = pathinfo($target_file_name,PATHINFO_EXTENSION);
			if(!strtolower($image_file_type) =='jpg' || !strtolower($image_file_type) =='png'){
					echo "<div id='error'>Nieprawidłowy typ</div>";
					$check=false;
				}
			if(!$image['size']<=1000000){
				echo "<div id='error'>Nieprawidłowy rozmiar</div>";
				$check = false;
				}
				if($check){
					if(!(move_uploaded_file($image['tmp_name'], $target_directory))){
						echo "<div id='error'>Błąd uploadu</div>";
						echo $image['size'];
						return false;
						}
					else{
						$dest_image['name'] = $target_file_name;
						$dest_image['target_directory'] = $target_directory;
						$dest_image['type'] = $image_file_type;
						$dest_image['title'] = $title;
						$dest_image['author'] = $author;
						$dest_image['access'] = $access;
						$watermark_text = $_POST['watermark'];
						if(!create_watermark($dest_image,$watermark_text)){
							echo "<div id='error'>nie mozna stworzyc znaku wodnego</div>";
						}
						if(!create_miniature($dest_image)){
							echo "<div id='error'>nie można stworzyć miniatury</div>";
							return false;
						}
					}
			}
			else return false;

    if ($id == null) {
        $db->images->insert($dest_image);
    } else {
        $db->images->update(['_id' => new MongoId($id)], $dest_image);
    }

    return true;
}

function create_watermark(&$dest_image, $watermark_text){
	if($dest_image['type']=='jpg'){
		$image = imagecreatefromjpeg($dest_image['target_directory']);
	}
	else{
		$image = imagecreatefrompng($dest_image['target_directory']);
	}

	$fontsize = imagesy($image)/10;

	$blue = imagecolorallocate($image, 111, 143, 162);
	imagettftext($image, $fontsize, 0, 20, $fontsize, $blue, 'static/fonts/arial.TTF', $watermark_text);


	$new_directory = substr($dest_image['target_directory'], 0,-4).'-watermark.'.$dest_image['type'];
	$dest_image['watermark'] = $new_directory;
	if($dest_image['type'] == 'jpg'){
		imagejpeg($image,$new_directory);
	}
	else{
		imagepng($image,$new_directory);
	}

	return true;
}

function create_miniature(&$dest_image){
	$new_width = 200;
	$new_height = 125;
	$temp = imagecreatetruecolor($new_width, $new_height);
	//wczytanie
	if($dest_image['type']=='jpg'){
		$image = imagecreatefromjpeg($dest_image['target_directory']);
	}
	else{
		$image = imagecreatefrompng($dest_image['target_directory']);
	}
	if($image == NULL) return false;
	list($width,$height) = getimagesize($dest_image['target_directory']);
	//zmiana rozmiaru
	imagecopyresized($temp,$image,0,0,0,0,$new_width,$new_height,$width,$height);
	//tworzenie nowego pliku
	$new_directory = substr($dest_image['target_directory'], 0,-4).'-miniature.'.$dest_image['type'];
	$dest_image['miniature'] = $new_directory;
	if($dest_image['type'] == 'jpg'){
		imagejpeg($temp,$new_directory);
	}
	else{
		imagepng($temp,$new_directory);
	}


	return true;
}

function find_user($user){
	$db = get_db();
	if($db->users->findOne(['login'=>$user['login']])==null) return false;
	else return true;
}

function add_user($user){
	$db = get_db();

	$db->users->insert($user);

	return true;
}

function log_in($user){
	$db = get_db();
	$db_user = $db->users->findOne(['login'=>$user['login']]);
	if($db_user == null) {
		echo "<div id='error'>Niepoprawny login</div>"; 
		return false;
	}
	if(!password_verify($user['password'],$db_user['password'])){
		echo "<div id='error'>Niepoprawne hasło</div>"; 
		return false;
	}
	$_SESSION['user']['logged'] =true;
	$_SESSION['user']['login'] = $user['login'];
	$_SESSION['user']['_id'] =$db_user['_id'];

}

function log_out(){
	$_SESSION['user']['logged'] = false;
	$_SESSION['user']['login'] = null;
	$_SESSION['user']['_id'] = null;
}
