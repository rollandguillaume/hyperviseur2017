function AffichCentr () {

}

AffichCentr.prototype.toStringEntite = function (idEntite) {
  var divres = document.getElementById('resultatAffichCentr');

  var datasend = {
    data:"afficheEntite",
    id:idEntite
  };

  var myself = this;

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
        var ul = document.createElement("ul");

        myself.makeItemList(ul, "id", jsondata[0]["id"]);
        myself.makeItemList(ul, "posx", jsondata[0]["posX"]);
        myself.makeItemList(ul, "posy", jsondata[0]["posY"]);
        myself.makeItemList(ul, "vitesse", jsondata[0]["vitesse"]);
        myself.makeItemList(ul, "dispo", jsondata[0]["disponibilite"]);

        div.setAttribute("id", "huv");

        div.appendChild(ul);
        divres.appendChild(div);

      }

    },
    error: function() {
      console.log("erreur");
    }
  });

};

AffichCentr.prototype.makeItemList = function (ul, title, val) {
  var li = document.createElement("li");
  li.innerHTML = title+" : "+val;
  ul.appendChild(li);
};
