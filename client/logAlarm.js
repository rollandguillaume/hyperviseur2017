function LogAlarm () {
  this.divres = document.getElementById('resultatLogAlarm');

}

LogAlarm.prototype.getLogAlarm = function () {
  var divres = document.getElementById('resultatLogAlarm');

  var datasend = {
    data:"logAlarm"
  };

  var myself = this;

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleLogAlarm/logAlarm.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      // console.log(jsondata);

      myself.constructList(jsondata);

    },
    error: function() {
      console.log("erreur");
    }
  });
};

LogAlarm.prototype.getAlarm = function () {
  var divres = document.getElementById('resultatLogAlarm');

  isLog = false;

  var datasend = {
    data:"alarm",
    id:idCentrale
  };

  var myself = this;

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleLogAlarm/logAlarm.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      // console.log(jsondata);

      myself.emptyList(2);

      myself.constructList(jsondata);

    },
    error: function() {
      console.log("erreur");
    }
  });
};

LogAlarm.prototype.countAlerte = function () {
  var datasend = {
    data:"countalarm",
    id:idCentrale
  };

  var myself = this;

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleLogAlarm/logAlarm.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      // console.log(jsondata);

      if (jsondata > nbAlerteEnCours) {
        btnalerte.style.backgroundColor = "red";
      }

    },
    error: function() {
      console.log("erreur");
    }
  });
};

LogAlarm.prototype.getLog = function () {
  var divres = document.getElementById('resultatLogAlarm');

  isLog = true;

  var datasend = {
    data:"log",
    id:idCentrale
  };

  var myself = this;

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleLogAlarm/logAlarm.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      // console.log(jsondata);

      myself.emptyList(2);

      myself.constructList(jsondata);

    },
    error: function() {
      console.log("erreur");
    }
  });
};

LogAlarm.prototype.getLogAdmin = function () {
  var divres = document.getElementById('resultatLogAlarm');

  var datasend = {
    data:"logAdmin",
  };

  var myself = this;

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleLogAlarm/logAlarm.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      // console.log(jsondata);

      myself.emptyList(1);

      // construction de la liste
      myself.constructList(jsondata);

    },
    error: function() {
      console.log("erreur");
    }
  });
};

LogAlarm.prototype.constructList = function (jsondata) {
  //construction de la liste
  var i = 0;
  while (i < jsondata.length) {
    var obj = jsondata[i];
    var id = jsondata[i]["id"];
    var div = document.createElement("div");
    div.setAttribute("id", "logAlarm"+id);

    div.appendChild(document.createTextNode(
      jsondata[i]["date"]
      + " (" + jsondata[i]["time"] + ") : "
      + "sender=" + obj["sender"] + "\n"
      + jsondata[i]["description"])
    );

    this.setClassAlarme(div, obj["niveau"]);

    var divinfo = document.createElement("div");
    var idinfo = "infologAlarm"+id;
    divinfo.setAttribute("id", idinfo);
    divinfo.appendChild(document.createTextNode(
      idinfo
      + " => niveau : " + jsondata[i]["niveau"])
    );
    divinfo.style.display = "none";

    this.toggleVisibility(div, divinfo);

    this.divres.appendChild(div);
    this.divres.appendChild(divinfo);
    i++;
  }
};

LogAlarm.prototype.toggleVisibility = function (element, elementToggle) {
  element.addEventListener('click', function() {
    if (elementToggle.style.display == "none") {
      elementToggle.style.display = "block";
    } else {
      elementToggle.style.display = "none";
    }
  });
};

LogAlarm.prototype.emptyList = function (nbr) {
  //nbr la pos a partir de laquelle effacer
  while (this.divres.childNodes.length > nbr) {
    this.divres.removeChild(this.divres.childNodes[nbr]);
  }
};

LogAlarm.prototype.setClassAlarme = function (div, nivAlerte) {
  div.setAttribute("class", "niveau"+nivAlerte);
};
