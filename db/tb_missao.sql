-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15/05/2017 às 15:18
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
-- Estrutura para tabela `tb_missao`
--

CREATE TABLE `tb_missao` (
  `id` int(5) NOT NULL,
  `MISSAO` text,
  `DESCRICAO` text,
  `excluido` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_missao`
--

INSERT INTO `tb_missao` (`id`, `MISSAO`, `DESCRICAO`, `excluido`) VALUES
(1, 'Parada Dura', 'Tempo de dureza', '0'),
(2, 'Parada Dura2', 'Tempo de dureza', '0'),
(3, 'Parada Dura3', 'Tempo de dureza', '0'),
(4, 'Parada Dura4', 'Tempo de dureza', '0');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_missao`
--
ALTER TABLE `tb_missao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_missao`
--
ALTER TABLE `tb_missao`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
