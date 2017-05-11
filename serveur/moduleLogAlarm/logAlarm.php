<?php
//inclure le module qui fait les requete bdd
include_once("./logAlarmLinkBdd.php");

if (isset($_POST["data"])) {
  $data = $_POST["data"];
  $link = new logAlarmLinkBdd();

  if ($data["data"] == "logAdmin") {
    echo json_encode($link->getLogAdmin());

  } else {
    if (isset($data["id"])) {
      $id = $data["id"];
      if ($data["data"] == "logAlarm") {
        echo json_encode($link->getLogAlarm($id));

      } else if ($data["data"] == "alarm") {
        echo json_encode($link->getAlarm($id));

      }
      else if ($data["data"] == "log") {
        echo json_encode($link->getLog($id));

      }
      else if ($data["data"] == "countalarm") {
        echo json_encode($link->countAlarm($id));

      }
    }
  }

}

?>
