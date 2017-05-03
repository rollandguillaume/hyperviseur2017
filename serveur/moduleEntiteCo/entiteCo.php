<?php
//inclure le module qui fait les requete bdd
include_once("./entiteCoLinkBdd.php");

if (isset($_GET["data"])) {

  if ($_GET["data"] == "getListeEntiteCo") {
    $link = new entiteCoLinkBdd();
    echo json_encode($link->getListeEntiteCo());
  }


}

?>
