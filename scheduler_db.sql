-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2014 at 12:51 AM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `FullName`) VALUES
(1, 'andrewemo', 'password', 'Alejandro A. Alain III'),
(2, 'juls', 'password', 'Julius DC Mendoza'),
(3, 'joe', 'password1', 'Joan Alain'),
(4, 'a', 'b', 'c'),
(5, 'joe2', 'password', 'katnis Everdeen'),
(6, 'w', 'e', 'r'),
(7, 'w', 'e', 'r'),
(8, 'andrewemo11', 'eqr', 'qwerqewrqw'),
(9, 'andrewemo', 'password', ''),
(10, 'anika', 'password', 'joannaeeasdfasdf'),
(11, 'andrewemo', 'password', ''),
(12, 'andrewemo', 'password', ''),
(13, 'andrewemo', 'password', ''),
(14, 'andrewemo', 'password', ''),
(15, 'andrewemo', 'password', ''),
(16, 'afdafd', 'adsfasf', 'adfafsdafsd'),
(17, 'werdemo', 'password', 'Andrew Alain III');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
