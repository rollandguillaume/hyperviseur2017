<?php
//inclure le module qui fait les requete bdd
include_once("./affichCentrLinkBdd.php");

if (isset($_POST["data"])) {
  $data = $_POST["data"];

  if ($data["data"] == "afficheEntite") {

    if (isset($data["id"])) {
      $id = $data["id"];
      $link = new affichCentrLinkBdd();
      echo json_encode($link->getEntite($id));
    }

  }

}

?>
