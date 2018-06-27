var powieksz = function(e){
			document.getElementById("tlo").style.display="block";
			var tlo = document.getElementById("tlo");
			tlo.setAttribute("onclick","galeria_zamknij();");
			var img = document.createElement("img");
			img.src = e.src;
			img.className += "powiekszone";
			document.body.appendChild(img);
		};
var galeria_zamknij = function(){
			document.getElementById("tlo").style.display = "none";
			var img = document.getElementsByClassName("powiekszone")[0];
			img.parentNode.removeChild(img);
		};