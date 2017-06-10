-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2017 às 16:39
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
-- Estrutura da tabela `missao`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `missao`
--
ALTER TABLE `missao`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `missao` ADD FULLTEXT KEY `MISSAO` (`MISSAO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `missao`
--
ALTER TABLE `missao`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
