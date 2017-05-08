var idCentrale = 0;//item a actualiser sur le panneau central
var isLog = true;

//declaration des evenements
window.onload = function () {

  var entiteCo = new EntiteCo();
  var affichCentr = new AffichCentr();
  var logAlarm = new LogAlarm();


  document.getElementById('btnAlerte').onclick = function () {
    logAlarm.emptyList();
    isLog = false;
    logAlarm.getAlarm();
  }
  document.getElementById('btnLog').onclick = function () {
    logAlarm.emptyList();
    isLog = true;
    logAlarm.getLog();
  }

  boucleprog = function () {
    console.log("requete en boucle");

    entiteCo.getListeEntiteCo(affichCentr, logAlarm);

    if (isLog) {
      logAlarm.getLog();
    } else {
      logAlarm.getAlarm();
    }
  }


  boucleprog();
  window.setInterval(function () {
    boucleprog();
  }, 10000);




}
