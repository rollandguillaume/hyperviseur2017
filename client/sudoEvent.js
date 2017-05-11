var defl = "droits";

window.onload = function () {

  var entiteCo = new EntiteCo();
  var logAlarm = new LogAlarm();


  document.getElementById("submitUser").onclick = function () {
    var login = document.getElementById("loginUser").value;
    var pwd = document.getElementById("pwdUser").value;
    var admin = document.getElementById("adminUser").checked;
    var select = document.getElementById("selectActionUser")
    var action = select.options[select.selectedIndex].value;

    entiteCo.setUserByAdmin(login, pwd, admin, action);
    entiteCo.getDroit();
  }

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
