var defl = "droits";

window.onload = function () {

  var entiteCo = new EntiteCo();
  var logAlarm = new LogAlarm();


  // document.getElementById('droits').onclick = function () {
  //   entiteCo.getDroit();
  //
  // }
  // document.getElementById('log').onclick = function () {
  //   logAlarm.getLogAdmin();
	// }

  boucleprog = function () {
    console.log("requete en boucle");
    entiteCo.getDroit();
    logAlarm.getLogAdmin();


  }


  boucleprog();
  window.setInterval(function () {
    boucleprog();
  }, actuProg);




}
