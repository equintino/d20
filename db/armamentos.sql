-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07-Abr-2017 às 21:35
-- Versão do servidor: 10.1.21-MariaDB
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
-- Estrutura da tabela `armamentos`
--

CREATE TABLE `armamentos` (
  `id` int(4) NOT NULL,
  `ARMA` text,
  `excluido` enum('0','1') DEFAULT '0',
  `CUSTO` int(10) DEFAULT NULL,
  `personagem` varchar(50) DEFAULT NULL,
  `armadura` text,
  `equipamento` text,
  `defesa` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `armamentos`
--

INSERT INTO `armamentos` (`id`, `ARMA`, `excluido`, `CUSTO`, `personagem`, `armadura`, `equipamento`, `defesa`) VALUES
(3, 'Bordão/Soqueira/Bico-de-Corvo/Maça_Estrela/Maça_Leve/Maça_Pesada/Clava/Mangual/Martelo_de_Guerra/Marreta/Azagaia/Lança/Tridente/Martelo_Lucerno/Alabarda/Glaive/Machado_Pesado/Machado_de_Guerra/Machadinha/Adaga/Espada_Curta/Espada_Longa/Rapiera/Sabre/Cimitarra/Claymore/Besta_Pesada/Besta_Leve/Prodd/Zarabatana/Funda/Fustíbalo/Plumbata/Arco_Recurvo/Arco_Composto/Arco_Simples/Arco_de_Guerra/Cajado/Cetro/Punhal/Grimório/Varinha/Missal/Orbe_de_Cristal/Símbolo_Sagrado/', '0', 300, 'JK', 'Armadura_Completa/Armadura_de_Couro/Armadura_Simples/Armadura_de_Batalha/Túnica_Pesada/Escudo_Pequeno/Escudo_Médio/Escudo_de_Corpo/', NULL, 4),
(5, 'Alabarda/Arco_Recurvo/', '0', 300, 'JK2', '', 'Alforge___/Aljava_Comum/Anzol_e_Linha/Alforge___/Aljava_Comum/Tocha/Túnica/', 4),
(6, 'Cimitarra/', '0', 150, 'gugu', NULL, NULL, 2),
(10, NULL, '0', 0, 'JK3', 'Armadura_Simples/Escudo_de_Corpo/', NULL, 4),
(12, NULL, '0', 100, 'JK4', 'Armadura_Simples/Escudo_Médio/', NULL, 10),
(13, 'Arco_de_Guerra/', '0', 0, 'JK5', 'Armadura_Simples/', NULL, 8);

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
