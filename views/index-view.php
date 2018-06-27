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
		<img src="static/obrazki/menu-icon.png" alt="ups"/>
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
	<img src="static/obrazki/glowna.jpg" id="glowna_img" alt="ups"/>
	<h2>
	CYTATY
	</h2>
	<span>
	Jeżeli Twoja żona chce się nauczyć jeździć samochodem nie stawaj jej na drodze.
	</span>
	<br>
	<span class="autor">Sam Levinson</span>
 	<span>
 	Budujemy samochody, których nikt nie potrzebuje, ale każdy chce mieć.
 	</span>
	<br>
	<span class="autor">Ferry Porsche</span>
	<span>
		Rozejrzałem się dookoła i nie mogłem znaleźć dla siebie samochodu, o którym marzyłem. Dlatego podjąłem decyzję – zbuduje go sam.
	</span>
	<span class="autor">Enzo Ferrari</span>

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