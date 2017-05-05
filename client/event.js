//declaration des evenements
window.onload = function () {


  var entiteCo = new EntiteCo();
  var affichCentr = new AffichCentr();
  var logAlarm = new LogAlarm();

  boucleprog = function () {
    console.log("requete en boucle");

    entiteCo.getListeEntiteCo();
    logAlarm.getLogAlarm();
  }


  boucleprog();
  window.setInterval(function () {
    boucleprog();
  }, 10000);


}
