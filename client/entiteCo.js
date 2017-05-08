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
            // console.log("actualisation centrale "+idCentrale);
            if (idCentrale == t.getAttribute('id')) {
              affichCentr.toStringEntite(t.getAttribute('id'));
            } else {
              window.clearInterval(interv);//s'auto stoper
            }
          }, 10000);

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
