-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Ago-2017 às 17:07
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
-- Estrutura da tabela `tb_missao`
--

CREATE TABLE `tb_missao` (
  `id` int(4) NOT NULL,
  `MISSAO` varchar(50) NOT NULL,
  `DESCRICAO` text,
  `excluido` enum('0','1') DEFAULT NULL,
  `DATA` datetime DEFAULT NULL,
  `emMissao` enum('0','1') DEFAULT '0',
  `objetivo` varchar(100) DEFAULT NULL,
  `local` text,
  `vilao` text,
  `recompensa` varchar(100) DEFAULT NULL,
  `falha` text,
  `como` text,
  `avatar` text,
  `anotacoes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_missao`
--
ALTER TABLE `tb_missao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MISSAO` (`MISSAO`),
  ADD KEY `MISSAO_2` (`MISSAO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_missao`
--
ALTER TABLE `tb_missao`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
