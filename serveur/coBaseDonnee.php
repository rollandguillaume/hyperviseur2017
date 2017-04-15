<?php

  class coBaseDonnee {
    /*
    fonction permettant de se connecter à la base de donnee
    */
    public static function getConnection() {
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=hyperviseur;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // connection ok
      } catch(PDOException $e) {
        print ("Erreur ! : " . $e->getMessage() . "<br/>");
        die();
      }
      return $bdd;
    }

  }

 ?>
