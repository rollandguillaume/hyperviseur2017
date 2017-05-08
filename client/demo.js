function Demo () {

}

Demo.prototype.makeAction = function (idEntite, action) {
  var datasend = {
    action:"logAlarm",
    id:"gzrgeh"
  };

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleDemo/demo.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      console.log(jsondata);


    },
    error: function() {
      console.log("erreur");
    }
  });

};

Demo.prototype.reinitialiser = function () {
  var datasend = {
    data:"reinitialiser",
  };

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleDemo/demo.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      console.log(jsondata);


    },
    error: function() {
      console.log("erreur");
    }
  });

};
