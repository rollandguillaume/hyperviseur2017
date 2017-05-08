window.onload = function () {

  var demo = new Demo();

  var select = document.getElementById('selectAction');
  var idEntite = document.getElementById('idEntite');

  //-------------------
  //EVENT DEMO
  //-------------------

  var btnReini = document.getElementById('reinitialise').onclick = function () {
      demo.reinitialiser();
  };

  var btnAvarie = document.getElementById('actionEntite').onclick = function () {
    var option = select.options[select.selectedIndex].value;
    var id = idEntite.value;

    demo.makeAction(id, option);
  };

}
