-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Fev-2017 às 03:59
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
  `breveHistoria` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `personagem`
--

INSERT INTO `personagem` (`id`, `jogador`, `personagem`, `raca`, `classe`, `tendencia1`, `tendencia2`, `idade`, `tabela`, `sexo`, `criado`, `modificado`, `excluido`, `habilidade`, `altura`, `peso`, `cidade`, `motivacao`, `breveHistoria`) VALUES
(1, 'Edmilson', 'Justiceiro', 'humano', 'guerreiro', 'bom', 'leal', '20', 'personagem', 'M', '1488235924', '1488235957', 0, 's01-ARREMESSO_PODDEROSO/s04-FORÇA_DE_COMBATE/s06-PROTEGER_ALIADO/', '2.10', '20', 'Belem', 'Buscas minha origem', ''),
(2, 'Edmilson', 'Baragon', 'anao', 'guerreiro', 'bom', 'neutro', '20', 'personagem', 'M', '1488244440', '1488245940', 0, 'a03-GOLPE_DEVASTADOR/a05-INVESTIDA_MORTAL/tr2-SEM_ESCAPATÓRIA/', '2.10', '20', 'Belem', 'Quero encontrar meu destino.', 'Pertenço a uma população de imigrantes vindo do norte da Inglaterra.'),
(3, 'Edmilson', 'JK', 'anao', 'guerreiro', 'bom', 'leal', '100', 'personagem', 'M', '1488246731', '1488247021', 0, 'ta2-ATAQUE_DO_TROVÃO/a03-GOLPE_DEVASTADOR/a05-INVESTIDA_MORTAL/', '4,10', '200', 'BH', 'Para ter muitos amigos.', 'Um povo de barbaros.'),
(4, 'Lucas', 'Taevan', 'anao', 'guerreiro', 'neutro', 'leal', '47', 'personagem', NULL, '1488247235', '1488247903', 0, 'a04-GRITO_DE_GUERRA/a05-INVESTIDA_MORTAL/tr2-SEM_ESCAPATÓRIA/', '1,30', '80', 'Trigard', 'Embora Taevan tenha vindo de um grande e poderoso clã,após ter sofrido na pele a dor de perder sua amada,se viu na necessidade de fazer mais por sí mesmo,e decidiu viajar o mundo em busca de se tornar uma lenda, e ter seu nome lembrado após sua morte. Costuma dizer desde então que tudo o que importa depois da morte de um homem, é o legado que ele deixou, e como ele será lembrado pelos que ficarem.', 'Taeven é descente dos anões das montanhas,mais precisamente de uma tribo chamada machados de Raegar, fundada pelo grande Raegar o destruidor.'),
(5, 'Lucas', 'Tordek', 'humano', 'paladino', 'bom', 'leal', '47', 'personagem', 'M', '1488248639', '1488248915', 0, 'ta1-EXORCISMO/s01-FORÇA_DE_COMBATE/ts8-MONTARIA_ESPECIAL_1/', '1,80', '85', 'Higarden', 'Para mostrar que a bondade ainda é a melhor forma de mudar o mundo!', 'Sou um paladino devoto a dinaer o deus vermelho, assim como meus irmãos do clérigo vermelhor, acredito que a maldade deve ser extinta deste mundo a qualquer custo!');

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
