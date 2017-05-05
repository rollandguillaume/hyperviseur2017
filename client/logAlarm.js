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

  var datasend = {
    data:"alarm"
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

LogAlarm.prototype.getLog = function () {
  var divres = document.getElementById('resultatLogAlarm');

  var datasend = {
    data:"log"
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

LogAlarm.prototype.constructList = function (jsondata) {
  //construction de la liste
  var i = 0;
  while (i < jsondata.length) {
    var id = jsondata[i]["id"];
    var div = document.createElement("div");
    div.setAttribute("id", "logAlarm"+id);

    div.appendChild(document.createTextNode(jsondata[i]["date"] + " : " + jsondata[i]["description"]));

    var divinfo = document.createElement("div");
    var idinfo = "infologAlarm"+id;
    divinfo.setAttribute("id", idinfo);
    divinfo.appendChild(document.createTextNode(idinfo + " : " + jsondata[i]["description"]));
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

LogAlarm.prototype.emptyList = function () {
  while (this.divres.childNodes.length > 2) {
    this.divres.removeChild(this.divres.childNodes[2]);
  }
};
