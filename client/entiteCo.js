//declaration de la variable js objtest si undefined
if (typeof entiteCo === "undefined") {
  var entiteCo = {

    //declaration d'un fonction de l'objet
    getListeEntiteCo: function () {
      var divres = document.getElementById('resultatEntiteCo');

      $.ajax({
        type: 'GET',
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
            var div = document.createElement("div");
            div.setAttribute("id", jsondata[i]["id"]);
            div.appendChild(document.createTextNode(jsondata[i]["nom"]));
            div.addEventListener('click', function() {
              // TODO lien pour affichage div centrale
              console.log("afficher information");
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
