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
            type='alarme'
            and niveau<=1
            and traitee=0
            and sender = :id
        UNION
        select * from logAlarm
        where
            type='alarme'
            and niveau > 1
            and traitee=0
        ";

      $tabexe = array();
      $tabexe["id"] = $id;

      $requete = $bdd->prepare($query);
      $requete->execute($tabexe);
      return $requete->fetchAll();
    }

    public function countAlarm ($id) {
      $bdd = coBaseDonnee::getConnection();

      $query = "
        select count(*) from logAlarm
        where
            type='alarme'
            and niveau<=1
            and traitee=0
            and sender = :id
        UNION
        select count(*) from logAlarm
        where
            type='alarme'
            and niveau > 1
            and traitee=0
        ";

      $tabexe = array();
      $tabexe["id"] = $id;

      $requete = $bdd->prepare($query);
      $requete->execute($tabexe);
      $tabcount = $requete->fetchAll();
      $ret = 0;
      for ($i=0; $i < sizeof($tabcount); $i++) {
        $ret += $tabcount[$i][0];
      }

      return $ret;
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

    public function getLogAdmin () {
      $bdd = coBaseDonnee::getConnection();

      $query = "
      select * from logAlarm
      ";

      $requete = $bdd->prepare($query);
      $requete->execute();
      return $requete->fetchAll();
    }

  }
 ?>
