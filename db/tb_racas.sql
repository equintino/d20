-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql113.byethost7.com
-- Generation Time: Mar 28, 2017 at 11:15 AM
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
-- Table structure for table `tb_racas`
--

CREATE TABLE IF NOT EXISTS `tb_racas` (
  `id` int(1) NOT NULL,
  `RACA` varchar(8) DEFAULT NULL,
  `FORCA` int(1) DEFAULT NULL,
  `AGILIDADE` int(1) DEFAULT NULL,
  `INTELIGENCIA` int(1) DEFAULT NULL,
  `VONTADE` int(1) DEFAULT NULL,
  `OBS` text,
  `CLASSE_COMUM` varchar(35) DEFAULT NULL,
  `HABILIDADE_AUTOMATICA` varchar(17) DEFAULT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_racas`
--

INSERT INTO `tb_racas` (`id`, `RACA`, `FORCA`, `AGILIDADE`, `INTELIGENCIA`, `VONTADE`, `OBS`, `CLASSE_COMUM`, `HABILIDADE_AUTOMATICA`, `excluido`) VALUES
(1, 'humano', 3, 3, 3, 3, 'Mais um em qualquer atributo', 'TODAS', '', '0'),
(2, 'anao', 4, 2, 3, 3, 'IImine a veneno, rola 3D6 para teste de força para restituir a fadiga', 'GUERREIRO,PALADINO,SACERDOTE', 'VIGOR DA MONTANHA', '0'),
(3, 'elfo', 2, 4, 3, 3, 'Rola 3D6 para teste de inteligência que envolve percepção e oa cincos sentidos', 'RANGER,ESPADACHIM,LADRAO,FEITICEIRO', 'SENTIDOS APURADOS', '0'),
(4, 'halfling', 2, 4, 3, 3, 'Rola 3D6 para teste de agilidade para se esconder e mover em silêncio, ganha mais um em defesa.', 'LADRAO', 'TAMANHO PEQUENO', '0'),
(5, 'orc', 4, 3, 2, 3, 'Possui mais 10 pontos de vida.', 'BARBARO', 'SANGUE ORC', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
