<?php
  include_once("../coBaseDonnee.php");

  class entiteColinkBdd {

    public function __construct() {

    }

    public function getListeEntiteCo () {
      $bdd = coBaseDonnee::getConnection();

      $query = "
        select * from entiteCo
        where entiteCo.id in (
            select id from infoEntite
            where disponibilite=1
          )
      ";

      $requete = $bdd->prepare($query);
      $requete->execute();
      return $requete->fetchAll();
    }

    public function getDroit () {
      $bdd = coBaseDonnee::getConnection();

      $query = "
      select * from utilisateur
        ";

        $requete = $bdd->prepare($query);
        $requete->execute();
        return $requete->fetchAll();
      }

  }
 ?>
