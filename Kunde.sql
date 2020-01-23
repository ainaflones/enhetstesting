-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2016 at 10:45 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Kunde`
--

-- --------------------------------------------------------

--
-- Table structure for table `kunde`
--

CREATE TABLE IF NOT EXISTS `kunde` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fornavn` varchar(50) NOT NULL,
  `Etternavn` varchar(50) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Telefonnr` varchar(8) NOT NULL,
  `Epost` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `kunde`
--

INSERT INTO `kunde` (`ID`, `Fornavn`, `Etternavn`, `Adresse`, `Telefonnr`, `Epost`) VALUES
(1, 'Ole', 'Olsen', 'Osloveien 82', '12345679', 'ole.olsen@online.no'),
(2, 'Lene', 'Jensen', 'Askerveien 82', '54678t56', 'line.jensen@online.no'),
(68, 'Finn', 'Finnsen', 'Finnmarksveien 2', '12345678', 'finn@online.no'),
(69, 'Hans', 'Hansen', 'Hansenveien ', '12345678', 'hans@hans.no');
