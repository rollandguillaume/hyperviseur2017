<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="ressources/css/style.css" media="screen" title="no title" charset="utf-8">
    <title>hyperviseur 2017</title>
</head>

<body>

  <div class="row header">
      <div class="col-4">
        username :
        <!-- user : TODO -->
      </div>
      <div class="col-4">
        EXDEMA
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
	<div id="droits"> Droits</div>
	<div id="log"> Log</div>
    </div>
    <!-- <input id="entiteCo" type="button" name="" value="entiteCo"> -->

    <div id="resultatAffichCentr" class="affichCentr col-8">

    </div>

    <div id="resultatLogAlarm" class="logAlarm col-3">
      <div class="row">
      </div>
    </div>
    <!-- <input id="logAlarm" type="button" name="" value="logAlarm"> -->

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript" src="client/config.js"></script>

  <!-- event a garder en dernier -->
  <script type="text/javascript" src="client/sudoEvent.js"></script>

</body>
</html>