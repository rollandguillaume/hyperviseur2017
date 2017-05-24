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

	//config 2.0 : crée les utilisateurs, connecte les entités à superviser, leur donnes des infos
	public function config2p0(){

		$this->reinitialise();

		$bdd = coBaseDonnee::getConnection();

		$query ="INSERT INTO `utilisateur` (`login`, `pwd`, `admin`) VALUES
			('test', 'test', 1),
			('dhairion', 'dhairion', 0),
			('ssadou', 'ssadou', 0),
			('cpreaux', 'cpreaux', 0),
			('jlphilippe', 'jlphilippe', 0),
			('plaunay', 'plaunay', 0),
			('mpeyrichon', 'mpeyrichon', 0);
			('hleroux', 'hleroux', 0);
			";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query = "INSERT INTO `entiteCo` (`nom`) values
	      	('robot1'),
      		('robot2'),
      		('robot3');";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query = "INSERT INTO `infoEntite` (id, vitesse, `posX`, `posY`, `disponibilite`, `chargePortee`) VALUES
    		(1, 10, -500, 200, 1, 0),
    		(2, 25, 500, 80, 1, 0),
    		(3, 30, -95, -90, 1, 0);
    		";
		$requete = $bdd->prepare($query);
		$requete->execute();

		return "OK";

	}

	//le robot 1 crée une alerte de niveau 1 le robot 2 en crée une de niveau 2
	public function config2p1(){

		$bdd = coBaseDonnee::getConnection();

    $tabexe = array();
    $tabexe["date"] = date("Y-m-d");
    $tabexe["time"] = date("H:i:s");

		$query = "INSERT INTO `logAlarm`(type,description,date,time,info,traitee,niveau,sender) VALUES
			('alarme','niveau de batterie à 25%',:date,:time,'',0,2,1),
			('alarme','besoin d\'assistance',:date,:time,'',0,1,2);
    		";
		$requete = $bdd->prepare($query);
		$requete->execute($tabexe);

		return "OK";

	}


	//le robot 2 se met en indisponible et crée une alerte de niveau 3
	public function config2p2(){

		$bdd = coBaseDonnee::getConnection();
    $tabexe = array();
    $tabexe["date"] = date("Y-m-d");
    $tabexe["time"] = date("H:i:s");

		$query = "UPDATE `infoEntite`
			SET disponibilite = 0
    		WHERE id = 2;
    		";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query = "INSERT INTO `logAlarm`(type,description,date,time,info,traitee,niveau,sender) VALUES
			('alarme','moteur endommagé',:date,:time,'',0,3,2);
    		";
		$requete = $bdd->prepare($query);
		$requete->execute($tabexe);

		return "OK";

	}

	//le problème est réglé, le robot 2 se remet en disponible et l'alerte est traitée
	public function config2p3(){

		$bdd = coBaseDonnee::getConnection();

		$query = "UPDATE `infoEntite`
			SET disponibilite = 1
    		WHERE id = 2;
    		";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query = "UPDATE `logAlarm`
			SET traitee = 1
			WHERE sender = 2;
    		";
		$requete = $bdd->prepare($query);
		$requete->execute();

		return "OK";

	}

	//le robot 1 est retiré de la liste des robots, en attente de son remplacement
	public function config2p4(){

		$bdd = coBaseDonnee::getConnection();

		$query = "DELETE FROM `infoEntite`
    		WHERE id = 1;
    		";
		$requete = $bdd->prepare($query);
		$requete->execute();

		$query = "DELETE FROM `entiteCo`
    		WHERE id = 1;
    		";
		$requete = $bdd->prepare($query);
		$requete->execute();

    //on genere pas d'alerte/log ??

		return "OK";

	}



    public function makeAction ($action, $id) {
      $bdd = coBaseDonnee::getConnection();

      $tabexe = array();

      if ($action == "avarie") {
        $query = "
          insert into logAlarm(type, description, info, date, time, traitee, sender)
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
              :name
            );
  		  ";
        $tabexe["name"] = $name;

      } else if($action == "deconnecter"){
        $query = "select count(nom) from entiteCo where id= :id";
        $tabexe["id"] = $id;
        $requete = $bdd->prepare($query);
        $requete->execute($tabexe);

        if ($requete->fetch()[0] == 1) {
          $query = "
              delete from entiteCo
              where id = :id
              ;

              insert into logAlarm (type, description, info, date, time, traitee, sender)
              values (
                'log',
                'description de la deconnexion',
                'information deconnexion',
                :date,
                :time,
                0,
                :id
              );
          ";
          $tabexe["date"] = date("Y-m-d");
          $tabexe["time"] = date("H:i:s");
        };


  	  } else if($action =="creer"){
  		  //TODO creer table d'entités dans la bdd
  	  }

      $requete = $bdd->prepare($query);
      $requete->execute($tabexe);
      return array("action" => $action,"id" => $id,"name" => $name);
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

      $query = "CREATE TABLE entiteCo(
		      id int (10) AUTO_INCREMENT PRIMARY KEY,
        nom varchar(25) NOT NULL)
        ENGINE=InnoDB DEFAULT CHARSET=latin1;";
      $requete = $bdd->prepare($query);
      $requete->execute();



      $query = "CREATE TABLE `infoEntite` (
  		  `id` int(10) PRIMARY key REFERENCES EntiteCo(id),
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
    		login varchar(20) unique not null,
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
