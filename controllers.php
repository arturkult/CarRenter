<?php 
require_once 'business.php';

function galeria(&$model){
	$images = get_images();

	$model['images'] = $images;

	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			$user = [
			'login'=>$_POST['login'],
			'password'=>$_POST['password'],
			];
			log_in($user);
		}
		else if(isset($_POST['log_out'])) log_out();
	}
	else if($_SERVER['REQUEST_METHOD']=='GET'){
		if(!empty($_GET['images'])){
			$_SESSION['images'] = $_GET['images'];
		}
	}

	return 'galeria-view';
}

function index(&$model){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			$user = [
			'login'=>$_POST['login'],
			'password'=>$_POST['password'],
			];
			log_in($user);
		}
		else if(isset($_POST['log_out'])) log_out();
	}
	return 'index-view';
}

function historia(&$model){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			$user = [
			'login'=>$_POST['login'],
			'password'=>$_POST['password'],
			];
			log_in($user);
		}
		else if(isset($_POST['log_out'])) log_out();
	}
	return 'historia-view';
}
function register(&$model){

	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(!empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['password'])&& !empty($_POST['password_repeat'])){
			if(!strcmp($_POST['password'], $_POST['password_repeat'])){
				$user = [
				'email' => $_POST['email'],
				'login' => $_POST['login'],
				'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),	
				];
				if(!find_user($user)){
					if(add_user($user)){
							$_SESSION['user']['logged'] =true;
							$_SESSION['user']['login'] = $user['login'];
							$_SESSION['user']['_id'] =$db_user['_id'];
					}
				}
				else echo "<div id='error'>Zajęty login</div>";
			}
			else echo "<div id='error'>Różne hasła</div>";
		}
	}

	return 'register-view';
}

function add_image(&$model){

	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(!empty($_FILES['image']) && !empty($_POST['watermark']) && !empty($_POST['title']) && !empty($_POST['author'])){
			if(!isset($_SESSION['user'])||$_SESSION['user']['logged']==false) $type='public';
			else $type=$_POST['access'];
			echo $_FILES['image']['size'];
			if(upload_image(null,$_FILES['image'], $_POST['title'], $_POST['author'],$type)) return 'redirect:galeria';
		}
	}
	if(!empty($_POST['login']) && !empty($_POST['password'])){
			$user = [
			'login'=>$_POST['login'],
			'password'=>$_POST['password'],
			];
			log_in($user);
		}
		else if(isset($_POST['log_out'])) log_out();
	

	return 'add_image-view';
}
function image_view(&$model){
		if(!empty($_GET['id'])){
			$image = get_image($_GET['id']);
			$model['image'] = $image;
			return 'image_view';
		}
	else return 'galeria-view';
}

function view_selected(&$model){
	$model['images'] = get_images_by_id($_SESSION['images']);


	if($_SERVER['REQUEST_METHOD']=='GET'){
		if(!empty($_GET['images'])){
			delete_from_selected($_GET['images']);
			return "redirect:galeria";
		}
	}

	return 'view_selected';

}

function search_image(&$model){
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(is_ajax()){
		$db = get_db();
		$keyword = $_POST['keyword'];
		$model['images'] = $db->images->find(['title'=> new MongoRegex("/^.*$keyword.*/i")]);
			return 'search_image_ajax-view';
		}

		if(!empty($_POST['login']) && !empty($_POST['password'])){
			$user = [
			'login'=>$_POST['login'],
			'password'=>$_POST['password'],
			];
			log_in($user);
		}
		else if(isset($_POST['log_out'])) log_out();
	}
	return 'search_image-view';
}
 


