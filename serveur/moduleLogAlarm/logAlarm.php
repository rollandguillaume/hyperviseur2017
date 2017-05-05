<?php
//inclure le module qui fait les requete bdd
include_once("./logAlarmLinkBdd.php");

if (isset($_POST["data"])) {
  $data = $_POST["data"];
  $link = new logAlarmLinkBdd();

  if ($data["data"] == "logAlarm") {
    echo json_encode($link->getLogAlarm());

  } else if ($data["data"] == "alarm") {
    echo json_encode($link->getAlarm());

  }
  else if ($data["data"] == "log") {
    echo json_encode($link->getLog());

  }

}

?>
