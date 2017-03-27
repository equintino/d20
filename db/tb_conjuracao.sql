-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Mar-2017 às 04:36
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
-- Estrutura da tabela `tb_conjuracao`
--

CREATE TABLE `tb_conjuracao` (
  `id` int(5) NOT NULL,
  `item` varchar(100) NOT NULL,
  `CUSTO` int(5) NOT NULL,
  `FN` int(5) NOT NULL,
  `peso` decimal(10,1) NOT NULL,
  `DESCRICAO` text NOT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0',
  `OBS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_conjuracao`
--

INSERT INTO `tb_conjuracao` (`id`, `item`, `CUSTO`, `FN`, `peso`, `DESCRICAO`, `excluido`, `OBS`) VALUES
(1, 'Cajado', 50, 1, '2.0', 'Cajados são simplesmente bordões sintonizados a um conjurador\r\natravés de sua runa pessoal. Canalizador, Cerne Arcano, Cerne\r\nMístico, Registro, Duas Mãos', '0', 'Pode ser usado em combate como um Bordão; Veja as estatísticas do Bordão na descrição das armas.'),
(2, 'Cetro', 75, 3, '1.5', 'Cetros são simplesmente clavas sintonizadas a um conjurador\r\natravés de sua runa pessoal. Canalizador, Cerne Arcano, Cerne\r\nMístico, Registro', '0', 'Pode ser usado em combate como uma Clava; Veja as estatísticas da Clava na descrição das armas.'),
(3, 'Grimório', 50, 2, '0.5', 'Livro usado por conjuradores arcanos para registrar suas magias.\r\nCanalizador, Registro', '0', ''),
(4, 'Missal', 50, 2, '0.5', 'Livro usado por conjuradores místicos para registrar suas magias.\r\nCanalizador; Registro', '0', ''),
(5, 'Orbe de Cristal', 25, 1, '0.3', 'Um globo de cristal ou qualquer outra pedra semipreciosa com\r\ncerca de 20 cm de diâmetro.\r\nCanalizador, Foco Mágico', '0', ''),
(6, 'Punhal', 50, 1, '0.3', 'Punhais são simplesmente adagas sintonizadas a um conjurador\r\natravés de sua runa pessoal. Canalizador, Cerne Arcano', '0', 'Pode ser usado em combate como uma Adaga; Veja as estatísticas da Adaga na descrição das armas.'),
(7, 'Símbolo Sagrado', 25, 1, '0.1', 'Um medalhão com o símbolo de uma divindade. Canalizador,\r\nCerne Místico', '0', ''),
(8, 'Varinha', 25, 1, '0.2', 'Uma pequena haste com 25 a 40 centímetros de comprimento feito\r\nde madeira nobre. Canalizador, Asseste Mágico', '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_conjuracao`
--
ALTER TABLE `tb_conjuracao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_conjuracao`
--
ALTER TABLE `tb_conjuracao`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
