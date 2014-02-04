-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2014 at 07:09 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scheduler_db`
--
CREATE DATABASE IF NOT EXISTS `scheduler_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `scheduler_db`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valid` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `valid`, `name`, `description`) VALUES
(1, 1, 'Pre School', 'Pre School Department'),
(2, 1, 'Elementary', 'Elementary Department'),
(3, 1, 'High School', 'High School Department'),
(4, 1, 'SPED', 'SPED Department');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `valid`, `name`, `description`, `department_id`) VALUES
(1, 1, 'Makigisig', 'Matatalinong mga bata ng paaralan', 1),
(2, 0, 'Malakas', 'AT MAGANDA', 1),
(3, 0, 'Mga Pogi Kami', 'Yow YO w yow', 1),
(4, 0, 'Testing Testing Lang', 'Yow Yow Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) NOT NULL,
  `ISDELETED` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `FullName`, `ISDELETED`) VALUES
(1, 'tae444', '', 'popo', 'Y'),
(2, 'julss', '', 'Julius', 'N'),
(3, 'asdsadassad', 'adsf', 'adsadsaddas', 'Y'),
(4, 'johann', '', 'Johani', 'N'),
(5, 'jecaning', '', 'Jissica Sibulo', 'N'),
(6, 'werd', 'werdooo', 'werdo', 'N'),
(7, 'julsmendoza', '', 'Julius DC Mendoza', 'Y'),
(8, 'andrewemo11', 'eqr', 'qwerqewrqw', 'Y'),
(9, 'andrewemo', '', 'Alejandro Alain III', 'N'),
(23, 'andrewemo', '67888', 'wowooww', 'N'),
(24, 'werdemos', 'password', 'Alejandro III', 'Y'),
(25, 'andrewemo', 'password', 'Alejandro III', 'N'),
(26, 'Maraont', '', 'Pia Abarquez Villar', 'Y'),
(27, 'jyy', '', 'Juliusyy 345tret', 'Y'),
(28, 'rtretet', 'ertrt', 'ertetr', 'Y'),
(29, 'afd', 'afd', 'asdf', 'Y'),
(30, 'dfgd', 'fdg', 'df', 'Y'),
(31, 'werdpogi', 'pass', 'werdpogi', 'Y'),
(32, 'werdpogi', '', 'werdpogi', 'Y'),
(33, '', NULL, '', 'Y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
