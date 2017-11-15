-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql113.byethost7.com
-- Generation Time: Sep 08, 2017 at 01:43 PM
-- Server version: 5.6.35-81.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b7_16656868_d20`
--

-- --------------------------------------------------------

--
-- Table structure for table `missao`
--

CREATE TABLE IF NOT EXISTS `missao` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `DATA` text,
  `MISSAO` text,
  `personagem` varchar(100) DEFAULT NULL,
  `excluido` enum('0','1') DEFAULT '0',
  `emMissao` enum('0','1') DEFAULT '0',
  `jogador` varchar(100) DEFAULT NULL,
  `ouro` int(5) DEFAULT NULL,
  `anotacoes` text,
  `PV` int(5) DEFAULT NULL,
  `PM` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `MISSAO` (`MISSAO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=6 ;

--
-- Dumping data for table `missao`
--

INSERT INTO `missao` (`id`, `DATA`, `MISSAO`, `personagem`, `excluido`, `emMissao`, `jogador`, `ouro`, `anotacoes`, `PV`, `PM`) VALUES
(1, '1850-10-02 18:10:00', 'Terras de Athas', 'Osvaldo', '0', '1', 'RUBEN JUNIOR', NULL, NULL, NULL, NULL),
(2, '1850-10-02 18:10:00', 'Terras de Athas', 'Leraf', '0', '0', 'MESTRE', NULL, ' ', NULL, NULL),
(3, '1850-10-02 18:10:00', 'Terras de Athas', 'Avenger', '0', '0', 'AGNALDO', NULL, ' ', NULL, NULL),
(4, '1850-10-02 18:10:00', 'Terras de Athas', 'Jack', '0', '0', 'MESTRE', NULL, ' ', NULL, NULL),
(5, '1850-10-02 18:10:00', 'Terras de Athas', 'Galican', '0', '0', 'MESTRE', NULL, ' ', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
