function AffichCentr () {
  this.divres = document.getElementById('resultatAffichCentr');

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

      var nameOfVideo = "video0.ogv";//a recuperer d'une requete TODO
      
      var videoSuppri = 1;
      if (divres.childNodes[1] !== undefined) {
        var v = divres.childNodes[1];
        if (v.childNodes[0].getAttribute("src") == ("ressources/video/"+nameOfVideo)) {
          videoSuppri = 2;//laisser video
        }
      }

      //vider le contenu
      while (divres.childNodes.length > videoSuppri) {
        divres.removeChild(divres.childNodes[videoSuppri]);
      }

      if (jsondata.length == 1) {
        var div = document.createElement("div");
        var ul = document.createElement("ul");
        //
        if (videoSuppri != 2) {
          var video = myself.makeVideo("video0.ogv", "ogg");
          divres.appendChild(video);
        }
        //
        myself.makeItemList(ul, "id", jsondata[0]["id"]);
        myself.makeItemList(ul, "posx", jsondata[0]["posX"]);
        myself.makeItemList(ul, "posy", jsondata[0]["posY"]);
        myself.makeItemList(ul, "vitesse", jsondata[0]["vitesse"]);
        myself.makeItemList(ul, "dispo", jsondata[0]["disponibilite"]);
        myself.makeItemList(ul, "charge", jsondata[0]["chargePortee"]);

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

AffichCentr.prototype.makeVideo = function (name, type) {
  var video = document.createElement("video");
  video.setAttribute("autoplay", "");
  video.setAttribute("loop", "");
  var source = document.createElement("source");
  source.setAttribute("src", "ressources/video/"+name);
  source.setAttribute("type", "video/"+type);

  video.appendChild(source);
  return video;
};
