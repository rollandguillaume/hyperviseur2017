<?php
  include_once("../coBaseDonnee.php");

  class entiteColinkBdd {

    public function __construct() {

    }

    public function getListeEntiteCo () {
      $bdd = coBaseDonnee::getConnection();

      $query = "select * from entiteCo";

      $requete = $bdd->prepare($query);
      $requete->execute();
      return $requete->fetchAll();
    }

  }
 ?>
