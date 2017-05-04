//declaration de la variable js objtest si undefined
if (typeof logAlarm === "undefined") {
  var logAlarm = {

    //declaration d'un fonction de l'objet
    getLogAlarm: function () {
      var divres = document.getElementById('resultatLogAlarm');

      var datasend = {
        data:"logAlarm"
      };

      $.ajax({
        type: 'POST',
        url: 'serveur/moduleLogAlarm/logAlarm.php',
        data: {data:datasend},
        success: function(data) {
          jsondata = JSON.parse(data);
          // console.log(jsondata);

          //construction de la liste
          i = 0;
          while (i < jsondata.length) {
            var id = jsondata[i]["id"];
            var div = document.createElement("div");
            div.setAttribute("id", id);

            div.appendChild(document.createTextNode(jsondata[i]["date"] + " : " + jsondata[i]["description"]));
            div.addEventListener('click', function() {
              console.log(this.getAttribute('id'));
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
