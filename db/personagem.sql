-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Abr-2017 às 19:45
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
-- Estrutura da tabela `personagem`
--

CREATE TABLE `personagem` (
  `id` int(5) NOT NULL,
  `jogador` varchar(100) DEFAULT NULL,
  `personagem` varchar(100) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL,
  `classe` varchar(100) DEFAULT NULL,
  `tendencia1` varchar(50) DEFAULT NULL,
  `tendencia2` varchar(50) DEFAULT NULL,
  `idade` varchar(10) DEFAULT NULL,
  `tabela` varchar(10) DEFAULT NULL,
  `sexo` varchar(4) DEFAULT NULL,
  `criado` varchar(50) DEFAULT NULL,
  `modificado` varchar(50) DEFAULT NULL,
  `excluido` int(1) NOT NULL DEFAULT '0',
  `habilidade` text,
  `altura` varchar(10) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `motivacao` text,
  `breveHistoria` text,
  `ARMA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personagem` (`personagem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
