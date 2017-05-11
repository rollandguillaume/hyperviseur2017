<?php
//inclure le module qui fait les requete bdd
include_once("./entiteCoLinkBdd.php");

if (isset($_POST["data"])) {
  $data = $_POST["data"];
  $link = new entiteCoLinkBdd();

  if ($_POST["data"] == "getListeEntiteCo") {
    echo json_encode($link->getListeEntiteCo());

  } else if ($_POST["data"] == "getDroit") {
    echo json_encode($link->getDroit());
  }
  else if ($data["data"] == "setUserByAdmin") {
    $login = $data["login"];
    $pwd = $data["pwd"];
    $admin = $data["admin"];
    $action = $data["action"];
    echo json_encode($link->setUserByAdmin($login, $pwd, $admin, $action));
  }


}

?>
