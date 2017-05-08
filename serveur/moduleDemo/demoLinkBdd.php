<?php
  include_once("../coBaseDonnee.php");

  class demoLinkBdd {

    public function __construct() {

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
      } else {
        //TODO else if avec autre action
      }

      $requete = $bdd->prepare($query);
      $requete->execute($tabexe);
      return array("update" => $action,"id" => $id);
    }


    public function reinitialise () {
      $bdd = coBaseDonnee::getConnection();

      $query = "DROP TABLE IF EXISTS tabletest;
    		DROP TABLE IF EXISTS logAlarm;
    		DROP TABLE IF EXISTS infoEntite;
    		DROP TABLE IF EXISTS entiteCo;
    		";
      $requete = $bdd->prepare($query);
      $requete->execute();

      $query = "CREATE TABLE entiteCo(id int (10) AUTO_INCREMENT PRIMARY KEY,
        nom varchar(25) NOT NULL)
        ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $requete = $bdd->prepare($query);
      $requete->execute();

      $query = "insert into entiteCo (nom) values
	      	('robot'),
      		('ascenseur'),
      		('robot'),
      		('robot'),
      		('porte'),
      		('maintenance');";
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

      $query ="INSERT INTO `logAlarm` ( `type`, `description`, `date`, `time`, `info`, sender, niveau) VALUES
    		('alarme', 'description de l\'alarme', '2017-05-04', '00:00:00', 'informations', 1, 2),
    		('log', 'description du log', '2017-05-04', '00:00:00', 'informations', 2, 1),
    		('alarme', 'alarme de sécurité', '2017-05-04', '00:00:00', 'informations', 1, 2),
    		('log', 'robot truc s\'est connecté', '2017-05-04', '00:00:00', 'informations', 3, 3),
    		('alarme', 'eboulement niveau cavite 3', '2017-05-04', '00:00:00', 'informations', 2, 1);
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

      $query ="INSERT INTO `tabletest` (`id`, `titre`, `autre`, `description`) VALUES
    		(1, 'titre1', 1, 'descript1'),
    		(2, 'titre2', 2, 'descript2');
    		";
      $requete = $bdd->prepare($query);
      $requete->execute();

      return "OK";
    }
  }
 ?>
