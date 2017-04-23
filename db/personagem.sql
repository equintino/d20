-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Abr-2017 às 15:39
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
-- Estrutura da tabela `personagem`
--

CREATE TABLE `personagem` (
  `id` int(5) NOT NULL,
  `jogador` varchar(100) DEFAULT NULL,
  `personagem` varchar(100) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL,
  `classe` varchar(100) DEFAULT NULL,
  `tendencia1` varchar(50) DEFAULT NULL,
  `tendencia2` varchar(50) DEFAULT NULL,
  `idade` varchar(10) DEFAULT NULL,
  `tabela` varchar(10) DEFAULT NULL,
  `sexo` varchar(4) DEFAULT NULL,
  `criado` varchar(50) DEFAULT NULL,
  `modificado` varchar(50) DEFAULT NULL,
  `excluido` int(1) NOT NULL DEFAULT '0',
  `habilidade` text,
  `altura` varchar(10) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `motivacao` text,
  `breveHistoria` text,
  `ARMA` varchar(100) DEFAULT NULL,
  `figura` longblob,
  `avatar` text,
  `nivel` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `personagem`
--

INSERT INTO `personagem` (`id`, `jogador`, `personagem`, `raca`, `classe`, `tendencia1`, `tendencia2`, `idade`, `tabela`, `sexo`, `criado`, `modificado`, `excluido`, `habilidade`, `altura`, `peso`, `cidade`, `motivacao`, `breveHistoria`, `ARMA`, `figura`, `avatar`, `nivel`) VALUES
(1, 'Karen', 'Clivina', 'elfo', 'ranger', 'bom', 'leal', '30', 'personagem', 'F', '1492826573', '1492826684', 0, 'Falhas_da_Armadura/Flecha_Fantasma/Tiro_Certeiro/', '1.7', '60', 'Isis', '', '', NULL, NULL, 'elfo4', NULL),
(2, 'Edmilson', 'Jack', 'elfo', 'espadachim', 'neutro', 'neutro', '90', 'personagem', 'M', '1492826909', '1492827095', 0, 'AGILIDADE_DE_COMBATE/COMBATE_COM_DUAS_ARMAS_1/CORTE_ARTERIAL/', '1.8', '80', 'Jerusalem', '', '', NULL, NULL, 'elfo3', NULL),
(3, 'Israel', 'Arathor', 'humano', 'sacerdote', 'bom', 'leal', '35', 'personagem', 'M', '1492827624', '1492827777', 0, 'Curar_Ferimentos/Detectar_Magua/Parede_Invisível/', '1.85', '75', 'Jerusalém', 'Para tornar desse mundo um lugar melhor.', '', NULL, NULL, 'humano9', NULL),
(4, 'Julio', 'Galican', 'humano', 'guerreiro', 'bom', 'leal', '25', 'personagem', 'M', '1492828298', '1492828537', 0, 'Força_de_Combate/Investida_Mortal/Quebra-Escudo/', '1.85', '100', 'Gauina', 'Após haver matado meus mestres, tive que fugir da cidade ameaçado de morte, por outros mestres, hoje sonho eu me tornar cada vez mais forte, e um dia livrar meus irmãos das garras dos mestres de Gauina.', 'Venho de Gauina, cidade conhecida por formar guerreiros desde pequeno, não conheci meus pais, apenas meus mestres, que descobri terem sido os responsáveis pela morte de meus pais, e como vingança, hoje eles não estão mais entre nós.', NULL, NULL, 'humano2', NULL),
(5, 'Junior', 'Osvaldo', 'halfling', 'gatuno', 'bom', 'neutro', '16', 'personagem', 'M', '1492828899', '1492829072', 0, 'Agilidade_de_Combate/Arrombamento/Mentiroso/', '1.30', '25', 'Jupiter', 'Fugi de casa após uma briga com meus pais e fui aceito por essa nova família de aventuras, hoje apenas penso em novas aventuras.', 'Em jupiter, ou a gente aprende a se virar, ou é passado pra trás, fui criado entre uma família de ladrões, e isso me tornou um dos melhores.', NULL, NULL, 'halfling1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personagem` (`personagem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
