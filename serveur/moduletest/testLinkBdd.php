<?php
  include_once("../coBaseDonnee.php");

  class testlinkBdd {

    public function __construct() {

    }

    public function getTest () {
      $bdd = coBaseDonnee::getConnection();

      $query = "select * from tabletest";

      $requete = $bdd->prepare($query);
      $requete->execute();
      return $requete->fetchAll();
    }

  }
 ?>
