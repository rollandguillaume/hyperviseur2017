//declaration des evenements
window.onload = function () {

  //declaration du bouton test
  // document.getElementById('test').onclick = function () {
  //   objtest.premierefonction();
  // }


  window.setInterval(function () {
    console.log("requete en boucle");
    
    entiteCo.getListeEntiteCo();
    logAlarm.getLogAlarm();

  }, 5000);



}
