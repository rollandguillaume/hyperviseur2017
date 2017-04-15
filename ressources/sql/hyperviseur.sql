-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2017 at 12:45 PM
-- Server version: 5.7.17-0ubuntu0.16.04.2
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
