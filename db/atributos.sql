-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Abr-2017 às 15:39
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

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
-- Estrutura da tabela `atributos`
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
  `DESCRICAO` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atributos`
--

INSERT INTO `atributos` (`id_atrib`, `FORCA`, `AGILIDADE`, `INTELIGENCIA`, `VONTADE`, `PV`, `PM`, `PE`, `excluido`, `personagem`, `CLASSE_COMUM`, `HABILIDADE_AUTOMATICA`, `DESCRICAO`) VALUES
(1, 2, 5, 4, 3, 60, 60, 0, '0', 'Clivina', 'RANGER,ESPADACHIM,LADRAO,FEITICEIRO', 'Sentidos Apurados', 'ROLA 3D6 PARA TESTE DE INTELIGENCIA QUE ENVOLVE PERCEPCAO E OS CINCO SENTIDOS'),
(2, 3, 5, 3, 3, 60, 60, 0, '0', 'Jack', 'RANGER,ESPADACHIM,LADRAO,FEITICEIRO', 'Sentidos Apurados', 'ROLA 3D6 PARA TESTE DE INTELIGENCIA QUE ENVOLVE PERCEPCAO E OS CINCO SENTIDOS'),
(3, 3, 3, 5, 4, 60, 60, 0, '0', 'Arathor', 'TODAS', '', '+ UM EM QUALQUER ATRIBUTO'),
(4, 5, 4, 3, 3, 60, 60, 0, '0', 'Galican', 'TODAS', '', '+ UM EM QUALQUER ATRIBUTO'),
(5, 2, 5, 4, 3, 60, 60, 0, '0', 'Osvaldo', 'LADRAO', 'Tamanho Pequeno', 'ROLA 3D6 PARA TESTE DE AGILIDADE PARA SE ESCONDER E MOVER EM SILENCIO,GANHA MAIS UM EM DEFESA');

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
  MODIFY `id_atrib` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
