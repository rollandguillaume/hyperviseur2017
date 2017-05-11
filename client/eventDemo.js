window.onload = function () {

  var demo = new Demo();

  var select = document.getElementById('selectAction');
  var idEntite = document.getElementById('idEntite');
  var nameEntite = document.getElementById('nameEntite');
  //-------------------
  //EVENT DEMO
  //-------------------

  document.getElementById('config1').onclick = function () {
      demo.config("config1");
  };
  document.getElementById('config20').onclick = function () {
      demo.config("config2p0");
  };
  document.getElementById('config21').onclick = function () {
      demo.config("config2p1");
  };
  document.getElementById('config22').onclick = function () {
      demo.config("config2p2");
  };
  document.getElementById('config23').onclick = function () {
      demo.config("config2p3");
  };
  document.getElementById('config24').onclick = function () {
      demo.config("config2p4");
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
