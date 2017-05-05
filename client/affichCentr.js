function AffichCentr () {

}

AffichCentr.prototype.toStringEntite = function (idEntite) {
  var divres = document.getElementById('resultatAffichCentr');

  var datasend = {
    data:"afficheEntite",
    id:idEntite
  };

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleAffichCentr/affichCentr.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      // console.log(jsondata);

      //vider le contenu
      while (divres.childNodes.length > 1) {
        divres.removeChild(divres.childNodes[1]);
      }

      if (jsondata.length == 1) {
        var div = document.createElement("div");
        div.appendChild(document.createTextNode("id: "+jsondata[0]["id"]));
        div.appendChild(document.createTextNode("posX: "+jsondata[0]["posX"]));
        div.appendChild(document.createTextNode("posY: "+jsondata[0]["posY"]));
        div.appendChild(document.createTextNode("vitesse: "+jsondata[0]["vitesse"]));
        div.setAttribute("id", "huv");

        divres.appendChild(div);
      }

    },
    error: function() {
      console.log("erreur");
    }
  });

}
