-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Mar-2017 às 03:44
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
-- Estrutura da tabela `tb_armaduras`
--

CREATE TABLE `tb_armaduras` (
  `id` int(5) NOT NULL,
  `armadura` varchar(50) NOT NULL,
  `CUSTO` int(5) NOT NULL,
  `defesa` int(5) NOT NULL,
  `FN` int(5) NOT NULL,
  `peso` decimal(10,1) NOT NULL,
  `OBS` text NOT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_armaduras`
--

INSERT INTO `tb_armaduras` (`id`, `armadura`, `CUSTO`, `defesa`, `FN`, `peso`, `OBS`, `excluido`) VALUES
(1, 'Túnica Pesada', 50, 1, 1, '2.5', '', '0'),
(2, 'Armadura de Couro', 100, 2, 2, '12.0', '', '0'),
(3, 'Armadura Simples', 200, 3, 4, '18.0', 'Pesada', '0'),
(4, 'Armadura de Batalha', 600, 4, 6, '27.0', 'Pesada', '0'),
(5, 'Armadura Completa', 2000, 5, 8, '36.0', 'Pesada, Rígida', '0'),
(6, 'Escudo Pequeno', 50, 1, 2, '4.0', 'Ocupa uma mão', '0'),
(7, 'Escudo Médio', 100, 2, 3, '6.0', 'Ocupa um mão', '0'),
(8, 'Escudo de Corpo', 200, 3, 5, '9.0', 'Ocupa um mão', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_armaduras`
--
ALTER TABLE `tb_armaduras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_armaduras`
--
ALTER TABLE `tb_armaduras`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
