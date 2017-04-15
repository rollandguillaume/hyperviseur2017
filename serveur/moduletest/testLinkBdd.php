<?php
  include_once("../coBaseDonnee.php");

  class testlinkBdd {

    public function __construct() {

    }

    /*
    retourne les sous serie correspondant à une serie de la table catalog
    */
    public function getTest () {
      $bdd = coBaseDonnee::getConnection();

      $query = "select * from tabletest";

      $requete = $bdd->prepare($query);
      $requete->execute();
      return $requete->fetchAll();
    }

  }
 ?>
