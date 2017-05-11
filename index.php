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

  if (!isset($_SESSION["id"])) {
    header("Location: connexion.php");
  } else {
    // unset($_SESSION['admin']);//deconnexion
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
        <?php
          if (isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)) {
            ?>
            <a href="sudo.php"><input type="button" name="" value="admin"></a>
            <?php
          }
         ?>
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

      <div id="resultatEntiteCo" class="entiteCo col-1">

      </div>
      <!-- <input id="entiteCo" type="button" name="" value="entiteCo"> -->

      <div id="resultatAffichCentr" class="affichCentr col-8">

      </div>

      <div id="resultatLogAlarm" class="logAlarm col-3">
        <div class="row">
          <input id="btnLog" class="col-6" type="button" name="" value="log">
          <input id="btnAlerte" class="col-6" type="button" name="" value="alerte">
        </div>
      </div>
      <!-- <input id="logAlarm" type="button" name="" value="logAlarm"> -->

    </div>

    <script src="ressources/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="client/affichCentr.js"></script>
    <script type="text/javascript" src="client/entiteCo.js"></script>
    <script type="text/javascript" src="client/logAlarm.js"></script>
    <script type="text/javascript" src="client/config.js"></script>

    <!-- event a garder en dernier -->
    <script type="text/javascript" src="client/event.js"></script>
    <?php
  }
  ?>
</body>
</html>
