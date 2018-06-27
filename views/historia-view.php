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
			<li><a href="index">Główna</a></li>
			<li><a href="galeria">Galeria</a></li>
			<li><a href="register">Zarejestruj</a></li>
			<li><a href="add_image">Dodaj Zdjęcie</a></li>>
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
			<h3 class="center bold">Zaloguj</h3>
			<form method="POST">
				<label>Login:<br><input type="text" name="login"/></label>
				<label>Hasło:<br><input type="password" name="password"/></label>
				<input type="submit" value="Zaloguj"/>
			</form>
			</div>
		<?php else:?>
			<form method="POST">
				Jesteś zalogowany jako <?=$_SESSION['user']['login'] ?>
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
	<br>
	<h2 class="border">Wstęp</h2>
	<br>
	<div id="wstep">
Historia prawdziwej motoryzacji, mającej znaczenie użytkowe, sięga zaledwie początków ubiegłego stulecia. Pierwsze próby skonstruowania pojazdu poruszającego się o własnych siłach czyniono już znacznie dawniej. W roku 1600, w Brukseli, Simon Stevin zbudował pierwszy pojazd żaglowy. W niespełna sto siedemdziesiąt lat później w roku 1769, Francuz Mikołaj Józef Cugnot skonstruował pierwszy pojazd o napędzie parowym. Samochód i parowóz początkowo miały wspólną historię. Publikacje poświęcone obu pojazdom jako ich praprzodków wymieniają te same parowe konstrukcje. Rodzaj napędu sprawił, że miały one wkład w rozwój kolei, a brak szyn wskazywał na ich związek z dzisiejszymi samochodami. Maszyna parowa Cugnota była jednak na dzisiejsze standardy konstrukcja bardzo prymitywna, ale niewątpliwie poruszała się sama i mogła osiągać prędkość 4km/h. Pojazd ten nie miał jeszcze własnego paleniska i aby nagrzać parę trzeba było pod kotłem rozpalać na ziemi ognisko. Szesnaście lat później młody angielski inżynier William Murdock przeprowadził próby z napędzanym parą pojazdem zabawką. Pracujący w wytwórni pomp parowych Murdock skonstruował model 30-centymetrowej wysokości z silnikiem o stosunkowo dużej mocy. Anglik postanowił wypróbować swój wynalazek na ulicy i z przerażeniem stwierdził, iż nie jest w stanie dogonić szybko poruszającego się pojazdu. Mknąca przez miasto zabawka tak przestraszyła miejscowego księdza, że umarł na zawał serca. Pod naciskiem okolicznych mieszkańców i Jamesa Watta (który zastrzegał sobie patent na maszyny parowe używane do przewożenia osób, ale nie prowadził nad nimi prac) Murdock zrezygnował z dalszych eksperymentów.
	</div>
	<br>
	<h2 class="border">Lokomotywa drogowa</h2>
	<br>
	<div id="lokomotywa">
Następny milowy krok w historii samochodu stanowiła lokomotywa drogowa skonstruowana w 1801 roku przez Anglika Richarda Trevithicka. Dzięki wysokoprężnemu silnikowi pojazd Trevithicka był jak na owe czasy konstrukcją nowoczesną. Wynalazca zaprezentował go zaskoczonym mieszkańcom Londynu, a w 1804 roku postawił lokomotywę drogową na torach. Od tego momentu historia samochodu i historia parowozu potoczyły się dwiema różnymi drogami. Pomimo rozwoju kolei wynalazcy nie zaprzestali prac nad drogowymi pojazdami parowymi. Co więcej, nie były to tylko konstrukcje doświadczalne, ale powstały również omnibusy parowe wożące za opłatą pasażerów. Pierwsza linia, na której regularnie kursowały omnibusy, została uruchomiona w Anglii w 1831 roku. Napędzane parą pojazdy jeździły pomiędzy Londynem a Statford. Z czasem do omnibusów parowych wprowadzono liczne ulepszenia, których część przejęli później konstruktorzy pojazdów spalinowych. Na szczególną uwagę zasługuje zbudowany w 1873 roku przez francuskiego inżyniera Amd’ego Boll’ego omnibus „Posłuszna”. Pojazd ten wyposażony został w dwie maszyny parowe napędzające oddzielnie każde z tylnych kół. „Posłuszna” miała ogumienie z masywnego kauczuku i miękkie resory piórowe, czyli takie, jak stosuje się we współczesnych samochodach. Nowością w tamtych czasach było przeniesienie napędu przy użyciu przekładni łańcuchowej współpracującej ze skrzynią biegów. Pojazd ważył co prawda prawie pięć ton, ale osiągał przeciętną prędkość 42 km/h, wliczając w czas podróży przerwy potrzebne na uzupełnienie wody.
	</div>
	<br>
	<h2 class="border">Pierwszy samochód spalinowy</h2>
	<br>
	<div id="pierwszy_samochod">
Napęd parowy samochodów okazał się jednak ślepą uliczką. Od dawna trwały prace nad konkurencyjnymi dla maszyn parowych silnikami. W 1800 roku emerytowany szwajcarski wojskowy, major Isaac de Rivaz zbudował prymitywny pojazd wprawiany w ruch wybuchem mieszanki gazu świetlnego i powietrza. Zapalana iskrą elektryczną mieszanka wyrzucała w górę tłok, który z kolei napędzał umieszczone nad nim koło. Jego ruch był przenoszony za pomocą sznura na koło pojazdu. Konstrukcja nie miała kierownicy, a po każdej eksplozji musiała być od nowa „tankowana” gazem. Rivaz uzyskał na nią patent, ale na tym poprzestał i nie starał się udoskonalić swojego wynalazku.
	</div>
	<br>
	<h2 class="border">Pierwszy silnik elektryczny</h2>
	<br>
	<div id="pierwszy_silnik_el">
Amerykanin Thomas Davenoprt w roku 1835 zbudował pierwszy samochód napędzany silnikiem elektrycznym, czerpiącym prąd z elektrycznej baterii. W 1860 roku, francuski mechanik tienne Lenoir skonstruował silnik gazowy, który pracował bez sprężania mieszanki. Mianowicie w cylindrze umieścił tłok, po którego obu stronach naprzemiennie odbywało się zasysanie i spalanie mieszanki. Silnik miał już jednak mechanizm dostarczający gaz do cylindra. Powietrze – drugi składnik mieszanki – było zasysane przez szczeliny pomiędzy tłokiem a cylindrem.
Dwa lata później uczony francuski Alphonse Beau de Rochas opracował teoretyczną zasadę pracy silnika czterosuwowego. Polegała ona na zassaniu do cylindra mieszanki paliwa, jej sprężeniu, spaleniu, co nadaje ruch tłokowi, i wyrzuceniu spalin na zewnątrz. W tym samym roku prototyp takiego silnika gazowego budował Niemiec Nikolaus August Otto.
	</div>
	<br>
	<h2 class="border">Samochód z silnikiem cztersuwowym</h2>
	<br>
	<div id="pierwszy_silnik_czter">
W 1875 roku mieszkający w Wiedniu ślusarz żydowskiego pochodzenia Siegfried Marcus wyjechał na ulicę czterokołowym pojazdem z czterosuwowym silnikiem benzynowym. Marcus zamontował silnik na drewnianej ramie wzmocnionej blaszanymi okuciami. Rama opierała się na dwóch osiach z kołami, z których pierwsza była skrętna, tak jak w wozach konnych. Pojazdem sterowano za pomocą niewielkiej, pionowo ustawionej kierownicy połączonej z przekładnią. Konstrukcja Marcusa ważyła 756 kilogramów i była na tyle solidna, że jeszcze w 1950 roku udało się ją uruchomić. Pojazd osiągał prędkość od 6 do 8 km/h, miał hamulce w postaci drewnianych klocków dociskanych do obręczy kół oraz resorowaną przednią oś. Niestety, miejscowa policja zabroniła Mercusowi publicznego korzystania z wynalazku ze względu na dokuczliwy odór spalin.
	</div>
	<br>
	<h2 class="border">Samochody Benza i Damilera</h2>
	<br>
	<div id="benz">
Mimo, że Siegfried Marcus skonstruował pojazd z silnikiem benzynowym, powszechnie uznaje się, że pierwsze samochody powstały niezależnie od siebie w warsztatach dwóch niemieckich inżynierów: Gottlieba Damilera i Carla Benza.
Benz w 1885 roku przeprowadził pierwsze próby z trójkołowym pojazdem napędzanym czterosuwowym silnikiem benzynowym o mocy 0,55 kW, z elektrycznym układem zapłonowym wysokiego napięcia. Napęd przenoszony był na dwa tylne koła łańcuchem, a przednie służyło do sterowania. Duże, leżące poziomo koło zamachowe zapewniało równą pracę jednocylindrowego silnika. Hamulcami były klocki, w razie potrzeby dociskane do obręczy szprychowych kół. Pojazd ważył 260 kilogramów i już podczas pierwszej próby poza podwórkiem Benza bezawaryjnie przejechał 24 kilometry. Konstruktor opatentował go w 1886 roku.
Lata 1885-1886 były przełomowe dla rozwoju motoryzacji. Gottlieb Daimler i Karol Benz, po wykonaniu prób ze swoimi pierwszymi samochodami, zakładają wówczas dwie rywalizujące wytwórnie, znane później ze swych wyrobów na całym świecie.W 1886 roku swój pierwszy samochód zaprezentował publicznie Gottlieb Daimler. Umieścił on silnik benzynowy nie na trójkołowym, lecz na czterokołowym podwoziu. Skrętna była cała przednia oś. Jego pojazd przypominał bryczkę, od której odczepiono konia. Taki kształt miał być pomocny w razie awarii samochodu (łatwo było doczepić do niego zwierzę pociągowe). Po kolejnych zmianach silnik Daimlera miał moc 3,75 konia mechanicznego, co umożliwiało rozpędzenie samochodu do szybkości 32 km/h.
	</div>
	<br>
	<h2 class="border">Pierwszy kabriolet</h2>
	<br>
	<div id="kabriolet">
Pierwsze samochody przyjmowano bardzo nieufnie. Często budziły one uśmiechy politowania i denerwowały hałaśliwymi silnikami. Nic już jednak nie mogło zatrzymać ich rozwoju. Samochód stawał się coraz doskonalszy tak na zewnątrz, jak i wewnątrz. W przeszłości odchodziły pojazdy podobne do bryczek. W 1905 roku pojawił się pierwszy samochód, którego nadwozie można było za pomocą specjalnej nakładki zmienić z otwartego na zamknięte. Coraz popularniejsze stawały się luksusowe auta z oszklonym pomieszczeniem dla pasażerów. Kierowca znajdował się co prawda jeszcze poza nim, ale osłaniał go przedłużony dach i pionowa szyba zamontowana na przodzie pojazdu. Z tego typu konstrukcji narodziły się współczesne karoserie samochodowe.
	</div>
	<br>
	<h2 class="border">Opona pneumatyczna i hamulce</h2>
	<br>
	<div id="opona">
W 1893 roku Francuz Albert de Dion zbudował silnik, który osiągał 3000 obrotów na minutę. Taki wynik był możliwy dzięki elektrycznemu systemowi zapalania mieszanki. Dwa lata później bracia Michalin: Andr i douard, łączą pneumatyczne ogumienie Johna Dunlopa z wymienną obręczą koła. Od tej pory złapanie gumy stało się już znacznie mniejszym problemem. Doskonalono też hamulce samochodów. Najpierw wyposażono w nie tylko 2 koła, ale wraz ze wzrostem prędkości pojazdów takie rozwiązanie przestało wystarczać. W 1907 roku H. Ledvinka, konstruktor austriacki, zastosował hamulec mechaniczny na 4 koła.
Mimo wątpliwych wartości użytkowych produkowanych wówczas samochodów rozwój motoryzacji na przełomie XIX i XX wieku cechuje wyjątkowy dynamizm. O ówczesnych konstrukcjach świadczą najlepiej rezultaty rozgrywanych imprez sportowych. Pierwszy światowy rekord prędkości ustanowiony w roku 1902 na samochodzie z silnikiem spalinowym wynosił już 122,4 km/h. W roku 1909 samochód firmy Benz przekroczył prędkość 200 km/h. Było to oczywiście związane z nieustannym doskonaleniem konstrukcji oraz metod wytwarzania.
	</div>
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