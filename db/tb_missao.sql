-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Set-2017 às 21:30
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
  `MISSAO` varchar(50) NOT NULL,
  `DESCRICAO` text,
  `excluido` enum('0','1') DEFAULT NULL,
  `DATA` datetime DEFAULT NULL,
  `emMissao` enum('0','1') DEFAULT '0',
  `objetivo` varchar(100) DEFAULT NULL,
  `local` text,
  `vilao` text,
  `recompensa` varchar(100) DEFAULT NULL,
  `falha` text,
  `como` text,
  `avatar` text,
  `anotacoes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_missao`
--

INSERT INTO `tb_missao` (`id`, `MISSAO`, `DESCRICAO`, `excluido`, `DATA`, `emMissao`, `objetivo`, `local`, `vilao`, `recompensa`, `falha`, `como`, `avatar`, `anotacoes`) VALUES
(1, 'Terras de Athas', '', '0', '1996-02-28 20:22:28', '0', 'Revoluçao!', 'Thyr', 'kalak', 'Paz?', 'A morte', 'Acabando com os reis sacerdotes', 'imagens/personagens/viloes/kalak.jpg', 'Quem construiu Tebas, a das sete portas?Nos livros vem o nome dos reis,Mas foram os reis que transportaram as pedras?Babilónia, tantas vezes destruída,Quem outras tantas a reconstruiu? Em que casasDa Lima Dourada moravam seus obreiros?No dia em que ficou pronta a Muralha da China para ondeForam os seus pedreiros? A grande RomaEstá cheia de arcos de triunfo. Quem os ergueu? Sobre quemTriunfaram os Césares? A tão cantada BizâncioSó tinha paláciosPara os seus habitantes? Até a legendária AtlântidaNa noite em que o mar a engoliuViu afogados gritar por seus escravos.Em cada página uma vitória.Quem cozinhava os festins?Em cada década um grande homem.Quem pagava as despesas?Tantas históriasQuantas perguntas1 - perde um olho2 - perde um braço ou mao3 - perde um pé ou perna4 - dano no pé (manco)5-7 ferimento interno8-10 costela quebrada11-13 cicatriz terrível14-16 ferida apodrecida17-20 cicatriz pequena ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_missao`
--
ALTER TABLE `tb_missao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MISSAO` (`MISSAO`),
  ADD KEY `MISSAO_2` (`MISSAO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_missao`
--
ALTER TABLE `tb_missao`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
