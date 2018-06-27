	
function powitanie(){
		var imie = document.getElementById("input-imie");
		if(document.getElementsByName("local")[0].checked===true)
			localStorage.imie = imie.value;
		else
			sessionStorage.imie = imie.value;
		document.getElementById("powitanie_form").style.display="none";
		document.getElementById("powitanie").style.display="block";
		document.getElementById("powitanie").innerHTML="Witaj, "+imie.value;
		stworz_guzik();
	}
window.onload = function(){
	if(screen.width >480){
		if(sessionStorage.imie){
			document.getElementById("powitanie").style.display="block";
			document.getElementById("powitanie").innerHTML="Witaj, "+sessionStorage.imie;
			document.getElementById("powitanie_form").style.display = "none";
			stworz_guzik();
		}
		else if(localStorage.imie){
			document.getElementById("powitanie").style.display="block";
			document.getElementById("powitanie").innerHTML="Witaj, "+localStorage.imie;
			document.getElementById("powitanie_form").style.display = "none";
			stworz_guzik();
		}
	}
	else{
		if(sessionStorage.imie){
		document.getElementById("resp-powitanie").style.display="block";
		document.getElementById("resp-powitanie").innerHTML="Witaj, "+sessionStorage.imie;
		document.getElementById("powitanie_form").style.display = "none";
		stworz_guzik();


	}
	else if(localStorage.imie){
		document.getElementById("resp-powitanie").style.display="block";
		document.getElementById("resp-powitanie").innerHTML="Witaj, "+localStorage.imie;
		document.getElementById("powitanie_form").style.display = "none";
		stworz_guzik();
	}
	}
};

var wyczysc = function(){
	sessionStorage.removeItem("imie");
	localStorage.removeItem("imie");
	if(screen.width >480){
	document.getElementById("powitanie").style.display="none";
	document.getElementById("powitanie_form").style.display="block";
	}
	else{
	document.getElementById("resp-powitanie").style.display="none";
	document.getElementById("resp-powitanie_form").style.display="block";
	}
	
}
var stworz_guzik = function(){
	var button = document.createElement("input");
		button.type="button";
		button.value="wyczyść";
		button.onclick = wyczysc;
	if(screen.width > 480)
		document.getElementById("powitanie").appendChild(button);
	else{
		button.style.marginLeft="10px";
		document.getElementById("resp-powitanie").appendChild(button);

	}
}