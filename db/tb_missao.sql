-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2017 às 19:32
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
  `MISSAO` text,
  `DESCRICAO` text,
  `excluido` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_missao`
--

INSERT INTO `tb_missao` (`id`, `MISSAO`, `DESCRICAO`, `excluido`) VALUES
(1, 'Pé de cabra', 'Um alfaiate comeu um verme', '0'),
(2, 'Pé de cabra 2', 'Um alfaiate comeu um verme', '0'),
(3, 'Pé de cabra 3', 'Um alfaiate comeu um verme', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_missao`
--
ALTER TABLE `tb_missao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_missao`
--
ALTER TABLE `tb_missao`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
