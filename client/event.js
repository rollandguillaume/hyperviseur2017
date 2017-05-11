var idCentrale = 0;//item a actualiser sur le panneau central
var isLog = true;

var nbAlerteEnCours = 0;

toggleColor = function (elem1, elem2) {
  elem1.style.fontWeight = "bold";
  elem1.style.color = "blue";
  elem2.style.fontWeight = "normal";
  elem2.style.color = "black";
}
var btnalerte = document.getElementById('btnAlerte');
var btnlog = document.getElementById('btnLog');

//declaration des evenements
window.onload = function () {

  var entiteCo = new EntiteCo();
  var affichCentr = new AffichCentr();
  var logAlarm = new LogAlarm();



  document.getElementById('btnAlerte').onclick = function () {
    toggleColor(btnalerte, btnlog);
    btnalerte.style.backgroundColor = "";

    logAlarm.emptyList();
    isLog = false;
    logAlarm.getAlarm();
  }
  document.getElementById('btnLog').onclick = function () {
    toggleColor(btnlog, btnalerte);
    logAlarm.emptyList();
    isLog = true;
    logAlarm.getLog();
  }

  boucleprog = function () {
    console.log("requete en boucle");


    entiteCo.getListeEntiteCo(affichCentr, logAlarm);

    if (isLog) {
      logAlarm.getLog();
      logAlarm.countAlerte();
    } else {
      logAlarm.getAlarm();
    }
  }


  boucleprog();
  window.setInterval(function () {
    boucleprog();
  }, actuProg);
}
