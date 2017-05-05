<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="ressources/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>hyperviseur 2017</title>
</head>

<body>

  <div class="row">
      <div class="col-4">
        <!-- user : TODO -->
      </div>
      <div class="col-4">
        <p>EXDEMA</p>
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
    <!-- <div id="resultattest">
    </div>
    <input id="test" type="submit" name="test" value="test"> -->


    <div id="resultatEntiteCo" class="entiteCo col-1">

    </div>
    <!-- <input id="entiteCo" type="button" name="" value="entiteCo"> -->

    <div id="resultatAffichCentr" class="affichCentr col-8">

    </div>

    <div id="resultatLogAlarm" class="logAlarm col-3">
      <div class="row">
        <input class="col-6" type="button" name="" value="log">
        <input class="col-6" type="button" name="" value="alerte">
      </div>
    </div>
    <!-- <input id="logAlarm" type="button" name="" value="logAlarm"> -->

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript" src="client/clienttest.js"></script>
  <script type="text/javascript" src="client/affichCentr.js"></script>
  <script type="text/javascript" src="client/entiteCo.js"></script>
  <script type="text/javascript" src="client/logAlarm.js"></script>

  <!-- event a garder en dernier -->
  <script type="text/javascript" src="client/event.js"></script>

</body>
</html>
