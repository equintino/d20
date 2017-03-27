-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql113.byethost7.com
-- Generation Time: Mar 27, 2017 at 02:02 PM
-- Server version: 5.6.34-79.1
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
-- Table structure for table `tb_municao`
--

CREATE TABLE IF NOT EXISTS `tb_municao` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `CUSTO` int(10) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `DESCRICAO` text NOT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_municao`
--

INSERT INTO `tb_municao` (`id`, `item`, `CUSTO`, `peso`, `DESCRICAO`, `excluido`) VALUES
(1, 'Bala', 1, '0.02', 'Esferas de metal ou pedra para fustibalo, Prodd e Funda.', '0'),
(2, 'Dardo', 1, '0.00', 'Agulhas para zarabatana, 200 dessas pesam 1kg.', '0'),
(3, 'Flecha Comum', 2, '0.05', 'Flecha usada em todos os tipos de arco.', '0'),
(4, 'Flecha Garateia', 10, '0.20', 'Fecha especial para acoplar uma garatéia na ponta e uma corda', '0'),
(5, 'Virote Comum', 2, '0.04', 'Seta usada em todos os tipos de besta e Plumbata.', '0'),
(6, 'Virote Garateia', 10, '0.20', 'Virote especial para acoplar uma garatéia na ponta e uma corda', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
