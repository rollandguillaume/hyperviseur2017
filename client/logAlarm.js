class LogAlarm {
  constructor() {

  }

  getLogAlarm() {
    var divres = document.getElementById('resultatLogAlarm');

    var datasend = {
      data:"logAlarm"
    };

    $.ajax({
      type: 'POST',
      url: 'serveur/moduleLogAlarm/logAlarm.php',
      data: {data:datasend},
      success: function(data) {
        var jsondata = JSON.parse(data);
        // console.log(jsondata);

        //construction de la liste
        var i = 0;
        while (i < jsondata.length) {
          var id = jsondata[i]["id"];
          var div = document.createElement("div");
          div.setAttribute("id", "logAlarm"+id);

          div.appendChild(document.createTextNode(jsondata[i]["date"] + " : " + jsondata[i]["description"]));
          div.addEventListener('click', function() {
            // console.log(this.getAttribute('id'));
            var idinfo = "info"+this.getAttribute("id");
            var divinfo = document.getElementById(idinfo);
            if (divinfo.style.display == "none") {
              divinfo.style.display = "block";
            } else {
              divinfo.style.display = "none";
            }
          });

          var divinfo = document.createElement("div");
          var idinfo = "infologAlarm"+id;
          divinfo.setAttribute("id", idinfo);
          divinfo.appendChild(document.createTextNode(idinfo + " : " + jsondata[i]["description"]));
          divinfo.style.display = "none";

          divres.appendChild(div);
          divres.appendChild(divinfo);
          i++;
        }

      },
      error: function() {
        console.log("erreur");
      }
    });


  }

}
