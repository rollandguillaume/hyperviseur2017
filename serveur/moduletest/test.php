<?php
//inclure le module qui fait les requete bdd
include_once("./testLinkBdd.php");

if (isset($_POST["datatest"])) {

  $testlink = new testLinkBdd();
  echo json_encode($testlink->getTest());

}

?>
