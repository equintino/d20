-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2017 às 19:33
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
-- Estrutura da tabela `tb_racas`
--

CREATE TABLE `tb_racas` (
  `id` int(1) NOT NULL,
  `RACA` varchar(8) DEFAULT NULL,
  `FORCA` int(1) DEFAULT NULL,
  `AGILIDADE` int(1) DEFAULT NULL,
  `INTELIGENCIA` int(1) DEFAULT NULL,
  `VONTADE` int(1) DEFAULT NULL,
  `OBS` varchar(93) DEFAULT NULL,
  `CLASSE_COMUM` varchar(35) DEFAULT NULL,
  `HABILIDADE_AUTOMATICA` varchar(17) DEFAULT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_racas`
--

INSERT INTO `tb_racas` (`id`, `RACA`, `FORCA`, `AGILIDADE`, `INTELIGENCIA`, `VONTADE`, `OBS`, `CLASSE_COMUM`, `HABILIDADE_AUTOMATICA`, `excluido`) VALUES
(1, 'HUMANO', 3, 3, 3, 3, '+ UM EM QUALQUER ATRIBUTO', 'TODAS', '', '0'),
(2, 'ANAO', 4, 2, 3, 3, 'IMUNE A VENENO,ROLA 3D6 PARA TESTE DE FORCA PARA RESISTIR A FADIGA', 'GUERREIRO,PALADINO,SACERDOTE', 'Vigor da Montanha', '0'),
(3, 'ELFO', 2, 4, 3, 3, 'ROLA 3D6 PARA TESTE DE INTELIGENCIA QUE ENVOLVE PERCEPCAO E OS CINCO SENTIDOS', 'RANGER,ESPADACHIM,LADRAO,FEITICEIRO', 'Sentidos Apurados', '0'),
(4, 'HALFLING', 2, 4, 3, 3, 'ROLA 3D6 PARA TESTE DE AGILIDADE PARA SE ESCONDER E MOVER EM SILENCIO,GANHA MAIS UM EM DEFESA', 'LADRAO', 'Tamanho Pequeno', '0'),
(5, 'ORC', 4, 3, 2, 3, 'POSSUI MAIS 10 PONTOS DE VIDA', 'BARBARO', 'Sangue Orc', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_racas`
--
ALTER TABLE `tb_racas`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
