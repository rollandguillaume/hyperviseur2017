function Demo () {

}

Demo.prototype.makeAction = function (idEntite, action, nameEntite) {
  var datasend = {
    action:action,
    id:idEntite,
    nameEntite:nameEntite
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

Demo.prototype.config1 = function () {
  var datasend = {
    data:"config1",
  };

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleDemo/demo.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      console.log(jsondata);


    },
    error: function(erreur) {
      console.log("erreur");
    }
  });

};

Demo.prototype.config2 = function () {
  var datasend = {
    data:"config2",
  };

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleDemo/demo.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      console.log(jsondata);


    },
    error: function(erreur) {
      console.log("erreur");
    }
  });

};

Demo.prototype.config3 = function () {
  var datasend = {
    data:"config3",
  };

  $.ajax({
    type: 'POST',
    url: 'serveur/moduleDemo/demo.php',
    data: {data:datasend},
    success: function(data) {
      var jsondata = JSON.parse(data);
      console.log(jsondata);


    },
    error: function(erreur) {
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
    error: function(erreur) {
      console.log("erreur");
    }
  });

};
