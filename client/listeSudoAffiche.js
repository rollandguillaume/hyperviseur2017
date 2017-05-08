function EntiteCo () {

};

EntiteCo.prototype.getListeEntiteCo = function (affichCentr, logAlarm) {
  var divres = document.getElementById('resultatEntiteCo');
  var t = this;

  idCentrale = 0;
  var interv = window.setInterval(function () {
    // console.log("actualisation centrale "+idCentrale);
    if (idCentrale == t.getAttribute('id')) {
      affichCentr.toStringEntite(t.getAttribute('id'));
    } else {
      window.clearInterval(interv);//s'auto stoper
    }

    },
    error: function() {
      console.log("erreur");
    }
  });

};
