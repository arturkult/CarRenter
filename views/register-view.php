<!DOCTYPE html>
<html>
<head>
	<title>Motoryzacja</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="static/css/reset.css">
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
	<script type="text/javascript" src="static/js/powitanie.js"></script>
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
		<div >
			<form id="powitanie_form">
			<input type="text" name="imie" id="input-imie" placeholder="Podaj imię" />
			<input type="checkbox" name="local"/>Zapamietaj mnie
			<input type="button" value ="zapisz" onclick="powitanie();">
			</form>
			<span id="powitanie"></span>
		</div>
	</nav>
	<div class="menu">
		<img src="static/galeria/menu-icon.png" alt="ups"/>
		<span id="menu-button">Menu</span>
		<ul>
			<li><a href="historia.html">Historia</a></li>
			<li><a href="galeria.html">Galeria</a></li>
		</ul>
	</div>
	<aside>
	<span id="resp-powitanie"></span>
	<form id="resp-form">
		<input type="text" name="imie" id="resp-input-imie"/>
		<input type="checkbox" name="local"/>Zapamietaj
		<input type="button" value ="zapisz" onclick="powitanie();">
	</form>
	<h2 class="center">Zarejestruj</h2>
	<form method="POST" >
		<p>Email: <input type="email" name="email" placeholder="Email" required/></p>
		<p>Login: <input type="text" name="login" placeholder="Login" required/></p>
		<p>Hasło: <input type="password" name="password" required/></p>
		<p>Powtórz hasło: <input type="password" name="password_repeat" required/></p>
		<p><input type="submit" value="zarejestruj"/>
	</form>
	</aside>
	<footer>
		
	</footer>
	<script>
	$(document).ready(function(){
		$(".menu").click(function(){
			$("ul").toggle(300);
		});
		$("#error").fadeOut(5000);
	});
	</script>
</body>
</html>