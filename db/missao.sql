-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11/05/2017 às 20:41
-- Versão do servidor: 10.1.21-MariaDB
-- Versão do PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `d20`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `missao`
--

CREATE TABLE `missao` (
  `id` varchar(10) NOT NULL,
  `DATA` datetime DEFAULT NULL,
  `MISSAO` text,
  `FORCA` int(10) DEFAULT NULL,
  `AGILIDADE` int(10) DEFAULT NULL,
  `INTELIGENCIA` int(10) DEFAULT NULL,
  `VONTADE` int(10) DEFAULT NULL,
  `PV` int(10) DEFAULT NULL,
  `PM` int(10) DEFAULT NULL,
  `PE` int(10) DEFAULT NULL,
  `personagem` varchar(100) DEFAULT NULL,
  `excluido` enum('0','1') DEFAULT '0',
  `emMissao` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `missao`
--

INSERT INTO `missao` (`id`, `DATA`, `MISSAO`, `FORCA`, `AGILIDADE`, `INTELIGENCIA`, `VONTADE`, `PV`, `PM`, `PE`, `personagem`, `excluido`, `emMissao`) VALUES
('1', '1816-05-10 12:59:00', 'Parada dura', 4, 3, 2, 2, 60, 60, 0, 'Jorge', '0', '0'),
('2', '1816-05-10 12:59:00', 'Parada dura', 4, 3, 2, 2, 60, 60, 0, 'Galya', '0', '1');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `missao`
--
ALTER TABLE `missao`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `missao` ADD FULLTEXT KEY `MISSAO` (`MISSAO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
