<?php
//inclure le module qui fait les requete bdd
include_once("./entiteCoLinkBdd.php");

if (isset($_POST["data"])) {

  $link = new entiteCoLinkBdd();

  if ($_POST["data"] == "getListeEntiteCo") {
    echo json_encode($link->getListeEntiteCo());

  } else if ($_POST["data"] == "getDroit") {
    echo json_encode($link->getDroit());
  }


}

?>
