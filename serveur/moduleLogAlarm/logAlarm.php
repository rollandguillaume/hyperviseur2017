<?php
//inclure le module qui fait les requete bdd
include_once("./logAlarmLinkBdd.php");

if (isset($_POST["data"])) {
  $data = $_POST["data"];

  if ($data["data"] == "logAlarm") {

    $link = new logAlarmLinkBdd();
    echo json_encode($link->getLogAlarm());

  }

}

?>
