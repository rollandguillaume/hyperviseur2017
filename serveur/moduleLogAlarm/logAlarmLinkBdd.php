<?php
  include_once("../coBaseDonnee.php");

  class logAlarmLinkBdd {

    public function __construct() {

    }

    public function getLogAlarm () {
      $bdd = coBaseDonnee::getConnection();

      $query = "select * from logAlarm";

      $requete = $bdd->prepare($query);
      $requete->execute();
      return $requete->fetchAll();
    }

  }
 ?>
