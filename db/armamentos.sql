-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Mar-2017 às 03:35
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
-- Estrutura da tabela `armamentos`
--

CREATE TABLE `armamentos` (
  `id` int(4) NOT NULL,
  `ARMA` text,
  `excluido` enum('0','1') DEFAULT '0',
  `CUSTO` int(10) DEFAULT NULL,
  `personagem` varchar(50) DEFAULT NULL,
  `armadura` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `armamentos`
--

INSERT INTO `armamentos` (`id`, `ARMA`, `excluido`, `CUSTO`, `personagem`, `armadura`) VALUES
(1, 'Bordão/Virote_Comum/Varinha/', '0', 123, 'JK', 'Armadura_Simples/'),
(2, 'Arco_Recurvo/Flecha_Comum/Flecha_Garateia/', '0', 38, 'rase', 'Armadura_de_Couro/'),
(3, 'Adaga/Funda/', '0', 150, 'batman', 'Escudo_Pequeno/Armadura_de_Couro/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armamentos`
--
ALTER TABLE `armamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personagem` (`personagem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armamentos`
--
ALTER TABLE `armamentos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
