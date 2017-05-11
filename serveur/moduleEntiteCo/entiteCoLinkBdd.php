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

    public function setUserByAdmin ($login, $pwd, $admin, $action) {
      $bdd = coBaseDonnee::getConnection();
      $ret = "problème de requete setUserByAdmin";

      if ($admin == "true") {
        $admin = 1;
      } else {
        $admin = 0;
      }

      $tabexe = array();
      $query = "";

      if ($action == "ajouter") {
        if (isset($login) && isset($pwd) && isset($admin)) {
          $query = "
            insert into utilisateur (login, pwd, admin)
            values (:login, :pwd, :admin)
          ";
          $tabexe["login"] = $login;
          $tabexe["pwd"] = $pwd;
          $tabexe["admin"] = $admin;
          $ret = "ok";
        }
      }
      else if ($action == "supprimer") {
        if (isset($login) && isset($pwd) && isset($admin)) {
          $query = "select count(*) from utilisateur where admin=1";
          $requete = $bdd->prepare($query);
          $requete->execute();
          $count = $requete->fetch()[0];

          if ($count != 1) {
            $query = "
            delete from utilisateur
            where login = :login
            ";
            $tabexe["login"] = $login;
            $ret = "ok";

          }
        }
      }
      else if ($action == "promote") {
        if (isset($login) && isset($pwd) && isset($admin)) {
          $query = "
            update utilisateur
            set admin=1
            where login = :login
          ";
          $tabexe["login"] = $login;
          $ret = "ok";
        }
      }
      else if ($action == "demote") {
        if (isset($login) && isset($pwd) && isset($admin)) {
          $query = "select count(*) from utilisateur where admin=1";
          $requete = $bdd->prepare($query);
          $requete->execute();
          $count = $requete->fetch()[0];

          if ($count > 1) {
            $query = "
            update utilisateur
            set admin=0
            where login = :login
            ";
            $tabexe["login"] = $login;

            $ret = "ok";
          }


        }
      }

      $requete = $bdd->prepare($query);
      $requete->execute($tabexe);
      return array(
        "login" => $login,
        "pwd" => $pwd,
        "admin" => $admin,
        "action" => $action,
        "status" => $ret
      );
    }

  }
 ?>
