-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2017 at 09:48 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
-- Table structure for table `armamentos`
--

CREATE TABLE `armamentos` (
  `id` int(4) NOT NULL,
  `ARMA` text,
  `excluido` enum('0','1') DEFAULT '0',
  `CUSTO` int(10) DEFAULT NULL,
  `personagem` varchar(50) DEFAULT NULL,
  `armadura` varchar(100) DEFAULT NULL,
  `equipamento` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `armamentos`
--

INSERT INTO `armamentos` (`id`, `ARMA`, `excluido`, `CUSTO`, `personagem`, `armadura`, `equipamento`) VALUES
(1, 'Cimitarra/', '0', 100, 'JK', 'Túnica_Pesada/', NULL),
(2, 'Fustíbalo/', '0', 30, 'JK2', 'Armadura_de_Couro/', 'Alforge___/Aljava_Comum/');

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
