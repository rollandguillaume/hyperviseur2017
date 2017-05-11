function EntiteCo () {

};

EntiteCo.prototype.getListeEntiteCo = function (affichCentr, logAlarm) {
  var divres = document.getElementById('resultatEntiteCo');

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleEntiteCo/entiteCo.php',
    data: {"data":"getListeEntiteCo"},
    success: function(data) {
      var jsondata = JSON.parse(data);
      // console.log(jsondata);

      //vider le contenu
      while (divres.childNodes.length > 1) {
        divres.removeChild(divres.childNodes[1]);
      }

      //construction de la liste
      var i = 0;
      while (i < jsondata.length) {
        var id = jsondata[i]["id"];
        var div = document.createElement("div");
        div.setAttribute("id", id);
        div.appendChild(document.createTextNode(jsondata[i]["nom"]));
        div.addEventListener('click', function() {
          var t = this;
          idCentrale = t.getAttribute('id');
          affichCentr.toStringEntite(t.getAttribute('id'));
          logAlarm.getLog();
          var interv = window.setInterval(function () {
            console.log("actualisation centrale "+idCentrale);
            if (idCentrale == t.getAttribute('id')) {
              affichCentr.toStringEntite(t.getAttribute('id'));
            } else {
              window.clearInterval(interv);//s'auto stoper
            }
          }, actuCentrMs);

        });
        divres.appendChild(div);
        i++;
      }

    },
    error: function() {
      console.log("erreur");
    }
  });

};



EntiteCo.prototype.getDroit = function () {
  var divres = document.getElementById('resultatAffichCentr');

  var myself = this;

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleEntiteCo/entiteCo.php',
    data: {"data":"getDroit"},
    success: function(data) {
      var jsondata = JSON.parse(data);
      // console.log(jsondata);

      //vider le contenu
      while (divres.childNodes.length > 1) {
        divres.removeChild(divres.childNodes[1]);
      }

      var tab = document.createElement("table");
      myself.makeItemTab(tab, ["login", "administrateur"], true);


      //construction de la liste
      var i = 0;
      while (i < jsondata.length) {
        var obj = jsondata[i];
        myself.makeItemTab(tab, [obj["login"], obj["admin"]]);

        i++;
      }

      divres.appendChild(tab);

    },
    error: function() {
      console.log("erreur");
    }
  });

};

// EntiteCo.prototype.makeItemList = function (ul, title) {
//   var li = document.createElement("li");
//   li.innerHTML = title;
//   ul.appendChild(li);
// };

EntiteCo.prototype.makeItemTab = function (tab, tabVal, head) {
  var tr = document.createElement("tr");
  if (head) {
    for (var i = 0; i < tabVal.length; i++) {
      var th = document.createElement("th");
      th.innerHTML = tabVal[i];
      tr.appendChild(th);
    }
  } else {
    for (var i = 0; i < tabVal.length; i++) {
      var td = document.createElement("td");
      td.innerHTML = tabVal[i];
      tr.appendChild(td);
    }
  }
  tab.appendChild(tr);

};
