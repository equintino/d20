-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Ago-2017 às 17:03
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
-- Estrutura da tabela `viloes`
--

CREATE TABLE `viloes` (
  `id` int(5) NOT NULL,
  `vilao` varchar(100) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL,
  `classe` varchar(100) DEFAULT NULL,
  `idade` int(4) DEFAULT NULL,
  `sexo` enum('F','M') DEFAULT NULL,
  `excluido` enum('0','1') DEFAULT '0',
  `avatar` text,
  `DESCRICAO` text,
  `FORCA` int(5) DEFAULT NULL,
  `AGILIDADE` int(5) DEFAULT NULL,
  `INTELIGENCIA` int(5) DEFAULT NULL,
  `VONTADE` int(5) DEFAULT NULL,
  `PV` int(5) DEFAULT NULL,
  `PM` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `viloes`
--
ALTER TABLE `viloes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vilao` (`vilao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `viloes`
--
ALTER TABLE `viloes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
