<?php
session_start();
session_destroy();
session_start();

include("./serveur/coBaseDonnee.php");
if (isset($_POST["login"]) && isset($_POST["pwd"])) {

  $bdd = coBaseDonnee::getConnection();
  $query = "
    select * from utilisateur
    where login = :login
    and pwd = :pwd
    ";
  $requete = $bdd->prepare($query);
  $requete->execute(array(
    'login' => $_POST["login"],
    'pwd' => $_POST["pwd"]
  ));
  $resultat = $requete->fetchAll();

  if (sizeof($resultat) == 1) {
    $_SESSION["id"] = $resultat[0]["id"];
    $_SESSION["admin"] = $resultat[0]["admin"];
    $_SESSION["username"] = $resultat[0]["login"];
    header("Location: index.php");
  } else {
    echo "Identifiant ou mot de passe incorect";
    include("formConnexion.php");
  }
} else {
  include("formConnexion.php");

}
