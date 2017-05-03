<?php
  include_once("../coBaseDonnee.php");

  class affichCentrLinkBdd {

    public function __construct() {

    }

    public function getEntite ($id) {
      $bdd = coBaseDonnee::getConnection();

      $query = "
        select * from infoEntite
        where id = :id
      ";

      $requete = $bdd->prepare($query);
      $requete->execute(array(
        'id' => $id
      ));
      return $requete->fetchAll();
    }

  }
 ?>
