//declaration de la variable js objtest si undefined
if (typeof entiteCo === "undefined") {
  var entiteCo = {

    //declaration d'un fonction de l'objet
    getListeEntiteCo: function () {
      var divres = document.getElementById('resultatEntiteCo');

      $.ajax({
        type: 'POST',
        url: 'serveur/moduleEntiteCo/entiteCo.php',
        data: {"data":"getListeEntiteCo"},
        success: function(data) {
          jsondata = JSON.parse(data);
          // console.log(jsondata);

          //vider le contenu
          while (divres.childNodes.length > 1) {
            divres.removeChild(divres.childNodes[1]);
          }


          //construction de la liste
          i = 0;
          while (i < jsondata.length) {
            var id = jsondata[i]["id"];
            var div = document.createElement("div");
            div.setAttribute("id", id);
            div.appendChild(document.createTextNode(jsondata[i]["nom"] + id));
            div.addEventListener('click', function() {
              affichCentr.toStringEntite(this.getAttribute('id'));
            });
            divres.appendChild(div);
            i++;
          }

        },
        error: function() {
          console.log("erreur");
        }
      });


    }

  }
}
