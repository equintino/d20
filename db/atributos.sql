-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2017 at 06:31 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d20`
--

-- --------------------------------------------------------

--
-- Table structure for table `atributos`
--

CREATE TABLE `atributos` (
  `id_atrib` int(5) NOT NULL,
  `FORCA` int(5) DEFAULT NULL,
  `AGILIDADE` int(5) DEFAULT NULL,
  `INTELIGENCIA` int(5) DEFAULT NULL,
  `VONTADE` int(5) DEFAULT NULL,
  `PV` int(5) DEFAULT NULL,
  `PM` int(5) DEFAULT NULL,
  `PE` int(5) DEFAULT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0',
  `personagem` varchar(50) NOT NULL,
  `CLASSE_COMUM` varchar(100) DEFAULT NULL,
  `HABILIDADE_AUTOMATICA` varchar(100) DEFAULT NULL,
  `DESCRICAO` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atributos`
--

INSERT INTO `atributos` (`id_atrib`, `FORCA`, `AGILIDADE`, `INTELIGENCIA`, `VONTADE`, `PV`, `PM`, `PE`, `excluido`, `personagem`, `CLASSE_COMUM`, `HABILIDADE_AUTOMATICA`, `DESCRICAO`) VALUES
(1, 4, 4, 4, 3, 60, 60, 0, '0', 'JK', 'TODAS', '', ''),
(10, 5, 3, 3, 3, 60, 60, 0, '0', 'JK2', 'GUERREIRO,PALADINO,SACERDOTE', 'VIGOR DA MONTANHA', 'IImine a veneno, rola 3D6 para teste de força para restituir a fadiga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atributos`
--
ALTER TABLE `atributos`
  ADD PRIMARY KEY (`id_atrib`),
  ADD UNIQUE KEY `personagem` (`personagem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atributos`
--
ALTER TABLE `atributos`
  MODIFY `id_atrib` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
