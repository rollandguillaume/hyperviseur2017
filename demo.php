<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="ressources/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>hyperviseur 2017</title>
</head>

<body>

  <div class="">
    <input id="reinitialise" type="button" name="" value="restart">
  </div>

  <hr>
  <div class="">
    <input id="idEntite" type="int" name="" value="" placeholder="id entite">
    <input id="nameEntite" type="text" name="" value="" placeholder="name entite">
    <select id="selectAction" class="" name="">
      <option value="avarie">avarie</option>
      <option value="connecter">connecter</option>
      <option value="deconnecter">deconnecter</option>
      <option value="creer">creer</option>
    </select>
    <input id="actionEntite" type="button" name="" value="go">
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript" src="client/demo.js"></script>

  <!-- event a garder en dernier -->
  <script type="text/javascript" src="client/eventDemo.js"></script>

</body>
</html>
