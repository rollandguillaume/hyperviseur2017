//declaration des evenements
window.onload = function () {

  //declaration du bouton test
  // document.getElementById('test').onclick = function () {
  //   objtest.premierefonction();
  // }


  // document.getElementById('entiteCo').onclick = function () {
    entiteCo.getListeEntiteCo();//auto affichage de la liste des enttites actives
  // }

  document.getElementById('logAlarm').onclick = function () {
    logAlarm.getLogAlarm();//auto affichage de la liste des enttites actives
  }

}
