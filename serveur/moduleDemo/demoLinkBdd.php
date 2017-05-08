<?php
  include_once("../coBaseDonnee.php");

  class demoLinkBdd {

    public function __construct() {

    }

    public function makeAction () {
      $bdd = coBaseDonnee::getConnection();

      $query = "select * from infoEntite";

      $requete = $bdd->prepare($query);
      $requete->execute();
      return $requete->fetchAll();
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
