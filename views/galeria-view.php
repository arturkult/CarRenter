<!DOCTYPE html>
<html>
<head>
	<title>Motoryzacja</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="static/css/reset.css">
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
	<script type="text/javascript" src="static/js/powitanie.js"></script>
	<script type="text/javascript" src="static/js/galeria.js"></script>
	 <script src="static/js/jquery-1.11.3.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<header>
	<img src="static/obrazki/porsche_logo.png" alt="ups"/>
	<h1>motoryzacja</h1>
	<img src="static/obrazki/vw_logo.png" alt="ups"/>
	</header>
	<nav>
		<ul>
			<li><a href="historia">Historia</a></li>
			<li><a href="galeria">Galeria</a></li>
			<li><a href="register">Zarejestruj</a></li>
			<li><a href="add_image">Dodaj Zdjęcie</a></li>
			<li><a href="search_image">Szukaj zdjęcia</a></li>
			<?php if(!empty($_SESSION['images'])):?>
			<li><a href="view_selected">Pokaż zaznaczone</a></li>
			<?php endif?>
		</ul>
		<div>
			<form id="powitanie_form">
			<input type="text" name="imie" id="input-imie" placeholder="Podaj imię" />
			<input type="checkbox" name="local"/>Zapamietaj mnie
			<input type="button" value ="zapisz" onclick="powitanie();">
			</form>
			<span id="powitanie"></span>
		</div>
		<?php if(!isset($_SESSION['user']['logged'])||$_SESSION['user']['logged']==false):?>
		<div id="login">
			<h3>Zaloguj</h3>
			<form method="POST">
				<input type="text" name="login"/>
				<input type="password" name="password"/>
				<input type="submit" value="Zaloguj"/>
			</form>
			</div>
		<?php else:?>
			<form method="POST">
				<input type="submit" name="log_out" value="Wyloguj"/>
			</form>
		<?php endif?>
	</nav>
	<div class="menu">
		<img src="static/galeria/menu-icon.png" alt="ups"/>
		<span id="menu-button">Menu</span>
		<ul>
			<li><a href="index">Główna</a></li>
			<li><a href="historia">Historia</a></li>
		</ul>
	</div>
	<aside>
	<div id="tlo"></div>
	<div id="galeria">
	<?php if ($model['images']->count()):  ?>
		<form method="GET">
		<?php foreach($images as $image): ?>
			<div class="photo">
			<input type="checkbox" name="images[]" value="<?=$image['_id']?>" <?php if(isset($_SESSION['images'])&&in_array($image['_id'], $_SESSION['images'])):?> checked <?php endif ?> />
			<a href="image_view?id=<?=$image['_id']?>">
				<p><img src="<?=$image['miniature'] ?>" alt="ups"/></p>
				<br>
				<p>Tytuł: <?=$image['title']?></p>
				<br>
				<p>Autor: <?=$image['author']?></p>
				<?php if($image['access']=='private'): ?>
					<p>Zdjęcie prywatne</p>
				<?php endif ?>
				</div>
			</a>
		<?php endforeach?>
		<input type="submit" value="Zapamiętaj wybrane"/>
		</form>
	<?php endif?>
	</div>
	</aside>
	<footer>
		
	</footer>
	<script>
	$(document).ready(function(){
		$(".menu").click(function(){
			$(".menu>ul").toggle(300);
		});
		$("#error").fadeOut(5000);
	});

	
	</script>
</body>
</html>