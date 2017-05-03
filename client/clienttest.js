//declaration de la variable js objtest si undefined
if (typeof objtest === "undefined") {
  var objtest = {

    //declaration d'un fonction de l'objet
    premierefonction: function () {
      var divres = document.getElementById('resultattest');//div de resultat

      $.ajax({
        type: 'POST',
        url: 'serveur/moduletest/test.php',
        data: {"datatest": "lesdonneessilenfaut"},
        success: function(data) {
          jsondata = JSON.parse(data);
          console.log(jsondata);

          divres.innerHTML = jsondata;

        },
        error: function() {
          console.log("erreur");
        }
      });


    }

  }
}
