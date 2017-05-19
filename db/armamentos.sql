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
-- Estrutura para tabela `armamentos`
--

CREATE TABLE `armamentos` (
  `id` int(4) NOT NULL,
  `ARMA` text,
  `excluido` enum('0','1') DEFAULT '0',
  `ouro` int(10) DEFAULT NULL,
  `personagem` varchar(50) DEFAULT NULL,
  `armadura` text,
  `equipamento` text,
  `defesa` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `armamentos`
--

INSERT INTO `armamentos` (`id`, `ARMA`, `excluido`, `ouro`, `personagem`, `armadura`, `equipamento`, `defesa`) VALUES
(1, 'Claymore/', '0', 50, 'Elle', NULL, 'Alforge___/', 10),
(2, 'Glaive/', '0', 50, 'pepe', 'Armadura_de_Couro/', 'Alforge___/', 12);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `armamentos`
--
ALTER TABLE `armamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personagem` (`personagem`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `armamentos`
--
ALTER TABLE `armamentos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
