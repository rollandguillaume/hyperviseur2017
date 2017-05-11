window.onload = function () {

  var demo = new Demo();

  var select = document.getElementById('selectAction');
  var idEntite = document.getElementById('idEntite');
  var nameEntite = document.getElementById('nameEntite');
  //-------------------
  //EVENT DEMO
  //-------------------

  var btnReini = document.getElementById('config1').onclick = function () {
      demo.config1();
  };
  var btnReini = document.getElementById('config2').onclick = function () {
      demo.config2();
  };
  var btnReini = document.getElementById('config3').onclick = function () {
      demo.config3();
  };

  var btnReini = document.getElementById('reinitialise').onclick = function () {
      demo.reinitialiser();
  };

  var btnAvarie = document.getElementById('actionEntite').onclick = function () {
    var option = select.options[select.selectedIndex].value;
    var id = idEntite.value;
    var name = nameEntite.value;

    demo.makeAction(id, option, name);
  };

}
