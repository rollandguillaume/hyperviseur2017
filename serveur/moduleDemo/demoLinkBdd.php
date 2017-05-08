<?php
  include_once("../coBaseDonnee.php");

  class demoLinkBdd {

    public function __construct() {

    }

    public function makeAction ($action, $id) {
      $bdd = coBaseDonnee::getConnection();

      $tabexe = array();

      if ($action == "avarie") {
        $query = "
          insert into logAlarm (type, description, info, date, time, traitee)
          values (
            'alarme',
            'description alarme',
            'information alarme',
            :date,
            :time,
            0
          );

          update infoEntite set disponibilite=0 where id=:id
        ";
        $tabexe["id"] = $id;
        $tabexe["date"] = date("Y-m-d");
        $tabexe["time"] = date("H:i:s");
      } else {
        //TODO else if avec autre action
      }

      $requete = $bdd->prepare($query);
      $requete->execute($tabexe);
      return array("update" => $action,"id" => $id);
    }


    public function reinitialise () {
      $bdd = coBaseDonnee::getConnection();

      $query = "select * from infoEntite";

      $requete = $bdd->prepare($query);
      $requete->execute();
      return $requete->fetchAll();
    }


  }
 ?>
