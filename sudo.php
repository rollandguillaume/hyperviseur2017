<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="ressources/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>hyperviseur 2017</title>
</head>

<body>

  <?php
    if (isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)) {
      ?>

      <div class="row header">
        <div class="col-4">
          <form class="" action="connexion.php" method="post">
            <input type="submit" name="" value="<?php
              if (isset($_SESSION["username"])) {
                echo "deconnexion de ".$_SESSION["username"];
              }
             ?>">
          </form>
        </div>
        <div class="col-4">
          EXDEMA
          <a href="index.php"><input type="button" name="" value="retour principale"></a>
        </div>
        <div id="date" class="col-4">
          <script type="text/javascript">
          window.setInterval(function() {
            var d = new Date();
            document.getElementById('date').innerHTML = d.toString();
          }, 1000)
          </script>
        </div>
      </div>

      <div class="row">

        <!-- <div id="resultatEntiteCo" class="entiteCo col-1">
          <div id="droits"> Droits</div>
          <div id="log"> Log</div>
        </div> -->
        <!-- <input id="entiteCo" type="button" name="" value="entiteCo"> -->

        <div id="resultatAffichCentr" class="affichCentr col-6">

        </div>

        <div id="resultatLogAlarm" class="logAlarm col-6">
          <div class="row">
          </div>
        </div>
        <!-- <input id="logAlarm" type="button" name="" value="logAlarm"> -->

      </div>

      <script src="ressources/js/jquery-1.12.4.min.js"></script>
      <script type="text/javascript" src="client/config.js"></script>
      <script type="text/javascript" src="client/entiteCo.js"></script>
      <script type="text/javascript" src="client/logAlarm.js"></script>

      <!-- event a garder en dernier -->
      <script type="text/javascript" src="client/sudoEvent.js"></script>

      <?php
    } else {
      ?>
        <h1>vous n'avez rien a faire là !!!</h1>
        <a href="index.php"><input type="button" name="" value="retour principale"></a>
      <?php
    }
    ?>

</body>
</html>
