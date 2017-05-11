<?php
//inclure le module qui fait les requete bdd
include_once("./entiteCoLinkBdd.php");

if (isset($_POST["data"])) {

  if ($_POST["data"] == "getListeEntiteCo") {
    $link = new entiteCoLinkBdd();
    echo json_encode($link->getListeEntiteCo());
  }


}

?>
