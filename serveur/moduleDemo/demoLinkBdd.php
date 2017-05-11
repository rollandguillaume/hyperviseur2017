<?php
  include_once("../coBaseDonnee.php");

  class demoLinkBdd {

    public function __construct() {

    }

	//config 1 : prépare la table utilisateur avec les logins et pwd du jury
	public function config1(){

		$this->reinitialise();

		$bdd = coBaseDonnee::getConnection();

		$query ="INSERT INTO `utilisateur` (`login`, `pwd`, `admin`) VALUES
			('aze', 'aze', 1),
			('qsd', 'qsd', 0);
			";
		$requete = $bdd->prepare($query);
		$requete->execute();

		return "OK";

	}

	//config 2 : config1 + prépare les entités à superviser
	public function config2(){

		$this->reinitialise();

		$bdd = coBaseDonnee::getConnection();

		$query ="INSERT INTO `utilisateur` (`login`, `pwd`, `admin`) VALUES
			('aze', 'aze', 1),
			('qsd', 'qsd', 0);
			";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query = "INSERT INTO `entiteCo` (`nom`) values
	      	('robot'),
      		('ascenseur'),
      		('robot'),
      		('robot'),
      		('porte'),
      		('maintenance');";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query = "INSERT INTO `infoEntite` (vitesse, `posX`, `posY`, `disponibilite`, `chargePortee`) VALUES
    		(10, -500, 200, 1, 0),
    		(25, 500, 80, 1, 0),
    		(30, -95, -90, 1, 0),
    		(17, -65, -45, 1, 0),
    		(6, 20, 20, 1, 0),
    		(0, 0, 0, 1, 0);
    		";
		$requete = $bdd->prepare($query);
		$requete->execute();

		return "OK";

	}

	//config 3 : config2 + crée des alarmes
	public function config3(){
    $this->reinitialise();

		$bdd = coBaseDonnee::getConnection();

		$query ="INSERT INTO `utilisateur` (`login`, `pwd`, `admin`) VALUES
			('aze', 'aze', 1),
			('qsd', 'qsd', 0);
			";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query = "INSERT INTO `entiteCo` (`nom`) values
	      	('robot'),
      		('ascenseur'),
      		('robot'),
      		('robot'),
      		('porte'),
      		('maintenance');";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query = "INSERT INTO `infoEntite` (vitesse, `posX`, `posY`, `disponibilite`, `chargePortee`) VALUES
    		(10, -500, 200, 1, 0),
    		(25, 500, 80, 1, 0),
    		(30, -95, -90, 1, 0),
    		(17, -65, -45, 1, 0),
    		(6, 20, 20, 1, 0),
    		(0, 0, 0, 1, 0);
    		";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query ="INSERT INTO `logAlarm` ( `type`, `description`, `date`, `time`, `info`, sender, niveau) VALUES
    		('alarme', 'description de l\'alarme', '2017-05-04', '00:00:00', 'informations', 1, 2),
    		('log', 'description du log', '2017-05-04', '00:00:00', 'informations', 2, 1),
    		('alarme', 'alarme de sécurité', '2017-05-04', '00:00:00', 'informations', 1, 2),
    		('log', 'robot truc s\'est connecté', '2017-05-04', '00:00:00', 'informations', 3, 3),
    		('alarme', 'eboulement niveau cavite 3', '2017-05-04', '00:00:00', 'informations', 2, 1);
    		";
		$requete = $bdd->prepare($query);
		$requete->execute();

		return "OK";

	}

    public function makeAction ($action, $id) {
      $bdd = coBaseDonnee::getConnection();

      $tabexe = array();

      if ($action == "avarie") {
        $query = "
          insert into logAlarm (type, description, info, date, time, traitee, sender)
          values (
            'alarme',
            'description avarie',
            'information avarie',
            :date,
            :time,
            0,
            :id
          );

          update infoEntite set disponibilite=0 where id=:id ;
        ";
        $tabexe["id"] = $id;
        $tabexe["date"] = date("Y-m-d");
        $tabexe["time"] = date("H:i:s");

      } else if($action == "connecter"){

		$query = "
          insert into entiteCo (nom)
          values (
            ".$id."
          );
		  ";

		  //TODO vérifier la requête

      } else if($action == "deconnecter"){

		  $query = "
          delete from entiteCo
          where id = ".$id."
          ;
		  ";

		  //TODO vérifier la requête

	  } else if($action =="creer"){
		  //TODO creer table d'entités dans la bdd
	  }

      $requete = $bdd->prepare($query);
      $requete->execute($tabexe);
      return array("update" => $action,"id" => $id);
    }


	//Fonction qui réalise un drop de toutes les tables de la bdd et qui les recrée, vides
    public function reinitialise () {
      $bdd = coBaseDonnee::getConnection();

      $query = "DROP TABLE IF EXISTS tabletest;
    		DROP TABLE IF EXISTS logAlarm;
    		DROP TABLE IF EXISTS infoEntite;
    		DROP TABLE IF EXISTS entiteCo;
        DROP TABLE IF EXISTS utilisateur;
    		";
      $requete = $bdd->prepare($query);
      $requete->execute();

      $query = "CREATE TABLE entiteCo(id int (10) AUTO_INCREMENT PRIMARY KEY,
        nom varchar(25) NOT NULL)
        ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $requete = $bdd->prepare($query);
      $requete->execute();



      $query = "CREATE TABLE `infoEntite` (
  		  `id` int(10) AUTO_INCREMENT PRIMARY KEY,
  		  `vitesse` int(5) NOT NULL,
  		  `posX` int(5) NOT NULL,
  		  `posY` int(5) NOT NULL,
  		  `disponibilite` tinyint(4) NOT NULL,
  		  `chargePortee` int(11) NOT NULL
  		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $requete = $bdd->prepare($query);
      $requete->execute();



      $query ="CREATE TABLE `logAlarm` (
  		  `id` int(10) AUTO_INCREMENT PRIMARY KEY,
  		  `type` varchar(25) DEFAULT NULL,
  		  `description` varchar(50) DEFAULT NULL,
  		  `date` date DEFAULT NULL,
  		  `time` time DEFAULT NULL,
  		  `info` varchar(50) DEFAULT NULL,
  		  `traitee` int(4) DEFAULT 0,
        niveau int(5) DEFAULT NULL,
        sender int(10) NOT NULL

  		) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  		";
      $requete = $bdd->prepare($query);
      $requete->execute();



      $query ="CREATE TABLE `tabletest` (
  		  `id` int(10)  AUTO_INCREMENT PRIMARY KEY,
  		  `titre` varchar(10) DEFAULT NULL,
  		  `autre` int(10) DEFAULT NULL,
  		  `description` varchar(10) DEFAULT NULL
  		) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  		";
      $requete = $bdd->prepare($query);
      $requete->execute();



      $query ="CREATE TABLE `utilisateur` (
  		  `id` int(10) AUTO_INCREMENT PRIMARY KEY,
        login varchar(20) not null,
        pwd varchar(20) not null,
        admin int(4) default 0
  		) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  		";
      $requete = $bdd->prepare($query);
      $requete->execute();

      return "OK";
    }
  }
 ?>
