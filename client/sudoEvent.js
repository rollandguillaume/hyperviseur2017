var defl = "droits";

window.onload = function () {

  document.getElementById('droits').onclick = function () {
	defl = "droits";
	boucleprog();
  }
  document.getElementById('log').onclick = function () {
	defl = "log"
	boucleprog();  
	}

  boucleprog = function () {
    console.log("requete en boucle");
	  var toDisplay;

	  if(defl == "droits"){
		  toDisplay = "log";
	  }else{
		  toDisplay = "droits";
	  }


	  document.getElementById(defl).style.display = "none";
	  document.getElementById(toDisplay).style.display = "block";
  }



  boucleprog();
  window.setInterval(function () {
    boucleprog();
  }, 10000);




}
