-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2017 at 12:24 AM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyperviseur`
--

-- --------------------------------------------------------

--
-- Table structure for table `entiteCo`
--

CREATE TABLE `entiteCo` (
  `id` int(10) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entiteCo`
--

INSERT INTO `entiteCo` (`id`, `nom`) VALUES
(3, 'robot'),
(4, 'ascenseur'),
(5, 'robot'),
(1, 'robot'),
(2, 'porte'),
(6, 'maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `infoEntite`
--

CREATE TABLE `infoEntite` (
  `id` int(10) NOT NULL,
  `vitesse` int(5) NOT NULL,
  `posX` int(5) NOT NULL,
  `posY` int(5) NOT NULL,
  `disponibilite` tinyint(4) NOT NULL,
  `chargePortee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infoEntite`
--

INSERT INTO `infoEntite` (`id`, `vitesse`, `posX`, `posY`, `disponibilite`, `chargePortee`) VALUES
(1, 10, -500, 200, 1, 0),
(2, 25, 500, 80, 1, 0),
(3, 30, -95, -90, 1, 0),
(4, 17, -65, -45, 1, 0),
(5, 6, 20, 20, 1, 0),
(6, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logAlarm`
--

CREATE TABLE `logAlarm` (
  `id` int(10) NOT NULL,
  `type` varchar(25) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  `info` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logAlarm`
--

INSERT INTO `logAlarm` (`id`, `type`, `description`, `date`, `time`, `info`) VALUES
(1, 'alarme', 'description de l\'alarme', '2017-05-04', '00:00:00', 'informations'),
(2, 'log', 'description du log', '2017-05-04', '00:00:00', 'informations'),
(3, 'alarme', 'alarme de sécurité', '2017-05-04', '00:00:00', 'informations'),
(4, 'log', 'robot truc s\'est connecté', '2017-05-04', '00:00:00', 'informations'),
(5, 'alarme', 'eboulement niveau cavite 3', '2017-05-04', '00:00:00', 'informations');

-- --------------------------------------------------------

--
-- Table structure for table `tabletest`
--

CREATE TABLE `tabletest` (
  `id` int(10) NOT NULL,
  `titre` varchar(10) DEFAULT NULL,
  `autre` int(10) DEFAULT NULL,
  `description` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabletest`
--

INSERT INTO `tabletest` (`id`, `titre`, `autre`, `description`) VALUES
(1, 'titre1', 1, 'descript1'),
(2, 'titre2', 2, 'descript2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabletest`
--
ALTER TABLE `tabletest`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
