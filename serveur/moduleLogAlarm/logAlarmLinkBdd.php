<?php
  include_once("../coBaseDonnee.php");

  class logAlarmLinkBdd {

    public function __construct() {

    }

    public function getLogAlarm ($id) {
      $bdd = coBaseDonnee::getConnection();

      $query = "select * from logAlarm";

      $requete = $bdd->prepare($query);
      $requete->execute();
      return $requete->fetchAll();
    }

    public function getAlarm ($id) {
      $bdd = coBaseDonnee::getConnection();

      $query = "
        select * from logAlarm
        where
          (
            type='alarme'
            and niveau=1
            and traitee=0
            and sender = :id
          )
        or
          (
            type='alarme'
            and niveau > 1
            and traitee=0
            and sender != :id
          )
        ";

      $tabexe = array();
      $tabexe["id"] = $id;

      $requete = $bdd->prepare($query);
      $requete->execute($tabexe);
      return $requete->fetchAll();
    }

    public function getLog ($id) {
      $bdd = coBaseDonnee::getConnection();

      $query = "
        select * from logAlarm
        where type=\"log\"
        and sender = :id
        ";
      $tabexe = array();
      $tabexe["id"] = $id;

      $requete = $bdd->prepare($query);
      $requete->execute($tabexe);
      return $requete->fetchAll();
    }

  }
 ?>
