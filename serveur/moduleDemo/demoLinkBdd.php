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
          insert into logAlarm (type, description, info, date, time, traitee)
          values (
            'alarme',
            'description alarme',
            'information alarme',
            :date,
            :time,
            0
          );

          update infoEntite set disponibilite=0 where id=:id
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

      $query = "CREATE TABLE entiteCo(id int (10) NOT NULL, nom varchar(25) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $requete = $bdd->prepare($query);
      $requete->execute();

      $query = "insert into entiteCo (id, nom) values 
	      	(3, 'robot'),
		(4, 'ascenseur'),
		(5, 'robot'),
		(1, 'robot'),
		(2, 'porte'),
		(6, 'maintenance');";
      $requete = $bdd->prepare($query);
      $requete->execute();

      $query = "CREATE TABLE `infoEntite` (
		  `id` int(10) NOT NULL,
		  `vitesse` int(5) NOT NULL,
		  `posX` int(5) NOT NULL,
		  `posY` int(5) NOT NULL,
		  `disponibilite` tinyint(4) NOT NULL,
		  `chargePortee` int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $requete = $bdd->prepare($query);
      $requete->execute();

      $query = "INSERT INTO `infoEntite` (`id`, `vitesse`, `posX`, `posY`, `disponibilite`, `chargePortee`) VALUES
		(1, 10, -500, 200, 1, 0),
		(2, 25, 500, 80, 1, 0),
		(3, 30, -95, -90, 1, 0),
		(4, 17, -65, -45, 1, 0),
		(5, 6, 20, 20, 1, 0),
		(6, 0, 0, 0, 1, 0);
		";
      $requete = $bdd->prepare($query);
      $requete->execute();

      $query ="CREATE TABLE `logAlarm` (
		  `id` int(10) NOT NULL,
		  `type` varchar(25) NOT NULL,
		  `description` varchar(50) NOT NULL,
		  `date` date DEFAULT NULL,
		  `time` time NOT NULL,
		  `info` varchar(50) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		";
      $requete = $bdd->prepare($query);
      $requete->execute();
     
      $query ="INSERT INTO `logAlarm` (`id`, `type`, `description`, `date`, `time`, `info`) VALUES
		(1, 'alarme', 'description de l\'alarme', '2017-05-04', '00:00:00', 'informations'),
		(2, 'log', 'description du log', '2017-05-04', '00:00:00', 'informations'),
		(3, 'alarme', 'alarme de sécurité', '2017-05-04', '00:00:00', 'informations'),
		(4, 'log', 'robot truc s\'est connecté', '2017-05-04', '00:00:00', 'informations'),
		(5, 'alarme', 'eboulement niveau cavite 3', '2017-05-04', '00:00:00', 'informations');
		";
      $requete = $bdd->prepare($query);
      $requete->execute();
      
      $query ="CREATE TABLE `tabletest` (
		  `id` int(10) NOT NULL,
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
