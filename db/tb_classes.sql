-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2017 às 16:41
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
-- Estrutura da tabela `tb_classes`
--

CREATE TABLE `tb_classes` (
  `id` int(1) NOT NULL,
  `CLASSE` varchar(10) DEFAULT NULL,
  `BONUS_ATRIBUTO` varchar(7) DEFAULT NULL,
  `PROFICIENCIA` varchar(41) DEFAULT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_classes`
--

INSERT INTO `tb_classes` (`id`, `CLASSE`, `BONUS_ATRIBUTO`, `PROFICIENCIA`, `excluido`) VALUES
(1, 'ESPADACHIM', 'F+1;A+1', 'USAR ARMAS SIMPLES E COMPLEXAS', '0'),
(2, 'GUERREIRO', 'F+1;A+1', 'USAR ARMAS SIMPLES E COMPLEXAS', '0'),
(3, 'BARBARO', 'F+1;A+1', 'USAR ARMAS SIMPLES E COMPLEXAS', '0'),
(4, 'PALADINO', 'F+1;V+1', 'USAR ARMAS SIMPLES E COMPLEXAS', '0'),
(5, 'RANGER', 'A+1;I+1', 'USAR ARMAS SIMPLES E COMPLEXAS', '0'),
(6, 'GATUNO', 'A+1;I+1', 'USAR ARMAS SIMPLES E FURTAR BOLSOS', '0'),
(7, 'MAGO', 'I+1;V+1', 'USAR ARMAS SIMPLES E LER ESCRITAS MAGICAS', '0'),
(8, 'SACERDOTE', 'I+1;V+1', 'USAR ARMAS SIMPLES E LER ESCRITAS MAGICAS', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_classes`
--
ALTER TABLE `tb_classes`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
