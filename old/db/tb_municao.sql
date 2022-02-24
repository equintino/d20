-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2017 às 16:42
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
-- Estrutura da tabela `tb_municao`
--

CREATE TABLE `tb_municao` (
  `id` int(5) NOT NULL,
  `item` varchar(50) NOT NULL,
  `CUSTO` int(10) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `DESCRICAO` text NOT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_municao`
--

INSERT INTO `tb_municao` (`id`, `item`, `CUSTO`, `peso`, `DESCRICAO`, `excluido`) VALUES
(1, 'Bala', 1, '0.02', 'Esferas de metal ou pedra para fustibalo, Prodd e Funda.', '0'),
(2, 'Dardo', 1, '0.00', 'Agulhas para zarabatana, 200 dessas pesam 1kg.', '0'),
(3, 'Flecha Comum', 2, '0.05', 'Flecha usada em todos os tipos de arco.', '0'),
(4, 'Flecha Garateia', 10, '0.20', 'Fecha especial para acoplar uma garatéia na ponta e uma corda', '0'),
(5, 'Virote Comum', 2, '0.04', 'Seta usada em todos os tipos de besta e Plumbata.', '0'),
(6, 'Virote Garateia', 10, '0.20', 'Virote especial para acoplar uma garatéia na ponta e uma corda', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_municao`
--
ALTER TABLE `tb_municao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_municao`
--
ALTER TABLE `tb_municao`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
