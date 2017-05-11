<?php
//inclure le module qui fait les requete bdd
include_once("./demoLinkBdd.php");

if (isset($_POST["data"])) {
  $data = $_POST["data"];
  $link = new demoLinkBdd();

  if (isset($data["data"])) {
    if ($data["data"] == "reinitialiser") {
		echo json_encode($link->reinitialise());
  }
  else if ($data["data"] == "config1"){
		echo json_encode($link->config1());
	}
  else if ($data["data"] == "config2p0"){
		echo json_encode($link->config2p0());
	}
  else if ($data["data"] == "config2p1"){
		echo json_encode($link->config2p1());
	}
  else if ($data["data"] == "config2p2"){
		echo json_encode($link->config2p2());
	}
  else if ($data["data"] == "config2p3"){
		echo json_encode($link->config2p3());
	}
  else if ($data["data"] == "config2p4"){
		echo json_encode($link->config2p4());
	}



  else {
    	echo json_encode("ptn");

  }
  // else if ($data["data"] == "config3"){
	// 	echo json_encode($link->config3());
	// }

  } else if (isset($data["action"]) && isset($data["id"])) {
    $action = $data["action"];
    $id = $data["id"];
    $name = $data["nameEntite"];
    echo json_encode($link->makeAction($action, $id, $name));

  }

}

?>
