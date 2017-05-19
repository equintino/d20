-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19/05/2017 às 16:32
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
  `id` int(5) NOT NULL,
  `DATA` text,
  `MISSAO` text,
  `personagem` varchar(100) DEFAULT NULL,
  `excluido` enum('0','1') DEFAULT '0',
  `emMissao` enum('0','1') DEFAULT '0',
  `jogador` varchar(100) DEFAULT NULL,
  `ouro` int(5) DEFAULT NULL,
  `anotacoes` text,
  `PV` int(5) DEFAULT NULL,
  `PM` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `missao`
--

INSERT INTO `missao` (`id`, `DATA`, `MISSAO`, `personagem`, `excluido`, `emMissao`, `jogador`, `ouro`, `anotacoes`, `PV`, `PM`) VALUES
(1, '1850-10-02 18:10:00', 'Parada Dura4', 'Elle', '0', '1', 'EDMILSON', NULL, NULL, NULL, NULL),
(2, '1850-10-02 18:10:00', 'Parada Dura3', 'pepe', '0', '0', 'EDMILSON', NULL, NULL, NULL, NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `missao`
--
ALTER TABLE `missao`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `missao` ADD FULLTEXT KEY `MISSAO` (`MISSAO`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `missao`
--
ALTER TABLE `missao`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
