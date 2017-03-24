-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Mar-2017 às 19:23
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
-- Estrutura da tabela `tb_espadachim`
--

CREATE TABLE `tb_espadachim` (
  `id` int(2) DEFAULT NULL,
  `habilidade` varchar(24) DEFAULT NULL,
  `REQUISITOS` varchar(26) DEFAULT NULL,
  `TIPO` varchar(7) DEFAULT NULL,
  `MANA` varchar(2) DEFAULT NULL,
  `DESCRICAO` varchar(237) DEFAULT NULL,
  `OBS` varchar(108) DEFAULT NULL,
  `excluido` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_espadachim`
--

INSERT INTO `tb_espadachim` (`id`, `habilidade`, `REQUISITOS`, `TIPO`, `MANA`, `DESCRICAO`, `OBS`, `excluido`) VALUES
(1, 'ACROBACIA', 'NENHUM', 'SUPORTE', '0', 'Você pode rolar 3d6 quando fizer testes de Agilidades para equilibrar-se, saltar com precisão e cair sem se machucar.', '', 0),
(2, 'AGILIDADE DE COMBATE', 'NENHUM', 'SUPORTE', '0', 'Você pode usar sua Agilidade para fazer ataques corporais com armas de FN 4 ou menos.', '', 0),
(3, 'ATAQUE GIRATÓRIO', 'NENHUM', 'AÇÃO', '10', 'Este ataque pode acertar todos os oponentes adjacentes. Faça um ataque para cada um destes oponentes.', '', 0),
(4, 'ATAQUE REDIRECIONADO', 'NENHUM', 'REAÇÃO', '0', 'Quando alguém te atacar e errar, você adjacente a ele, e acertar automaticamente. Você deve estar usando uma arma corporal para fazer isto.', '', 0),
(5, 'COMBATE COM DUAS ARMAS 1', 'NENHUM', 'SUPORTE', '0', 'Você pode fazer um ataque para cada arma que estiver usando. A soma da FN das armas deve ser no máximo 2.', '', 0),
(6, 'COMBATE COM DUAS ARMAS 2', 'COMBATE COM DUAS ARMAS 1', 'SUPORTE', '0', 'Você pode fazer um ataque para cada arma que estiver usando. A soma da FN das armas deve ser no máximo 5.', '', 0),
(7, 'COMBATE COM DUAS ARMAS 3', 'COMBATE COM DUAS ARMAS 2', 'SUPORTE', '0', 'Você pode fazer um ataque para cada arma que estiver usando. A soma da FN das armas deve ser no máximo 8.', '', 0),
(8, 'COMBATE TÁTICO', 'NENHUM', 'REAÇÃO', '0', 'Se você derrotar um oponente, você ganha imediatamente um ataque extra em qualquer oponente que esteja adjacente.', '', 0),
(9, 'CORTE ARTERIAL', 'NENHUM', 'AÇÃO', '30', 'Faça um ataque corporal com uma arma de corte. Se acertar, a vítima começará a sangrar sem parar perdendo 10 pontos de dano a cada turno seguinte. Só poderá parar o sangramento se for feito curativos o mais rápido possível.', 'Criaturas imunes a acertos críticos e que não possuem pontos vitais ou sangramento são imunes a este ataque.', 0),
(10, 'CORTE DO VENTO', 'NENHUM', 'AÇÃO', '5', 'Você é capaz de cortar o ar, enviando uma rajada de vento que corta alvos distantes. Faça um ataque corporal (corte) para acertar alvos à distância.', '', 0),
(11, 'DANÇA DE ESPADAS 1', 'NENHUM', 'AÇÃO', '30', 'Você começa uma dança que acompanha o fluxo da batalha. Esta dança dura até o final da batalha ou até você se desconcentrar (cair no chão, tontear, etc.). Durante este período você ganha temporariamente Agilidade +2.', '', 0),
(12, 'DESARMAR OPONENTE', 'NENHUM', 'AÇÃO', '20', 'Você pode usar a sua arma para tirar a arma do seu oponente. Faça um teste resistido de Agilidade contra seu inimigo. Se você vencer, a arma dele cairá no chão entre você e ele.', '', 0),
(13, 'ESCUDO IMPROVISADO', 'NENHUM', 'SUPORTE', '', 'Você pode usar qualquer coisa que esteja em uma de suas mãos como se fosse um escudo pequeno (defesa +1). Se usar uma capa ou pedaço grande de pano, o bônus é +2.', '', 0),
(14, 'ESPADA FANTASMA', 'NENHUM', 'AÇÃO', '15', 'Uma espada espectral surge junto com a sua ao fazer este ataque. Faça um ataque com sua espada e cause +8 pontos de dano (Corte). Este ataque pode ferir criaturas incorpóreas. não pode ultrapassar +4.', '', 0),
(15, 'FALHAS DA ARMADURA', 'NENHUM', 'SUPORTE', '', 'Você sabe como acertar ataques entre as frestas e falhas das armaduras do inimigo. Ignore sempre o bônus de armadura da defesa do oponente.', '', 0),
(16, 'INVESTIDA MORTAL', 'NENHUM', 'AÇÃO', '10', 'Em carga você pode desferir um poderoso golpe. Se estiver distante do oponente, você pode correr até ele e fazer um ataque normal que causa +10 de dano.', '', 0),
(17, 'LAMINA DAS CHAMAS', 'NENHUM', 'AÇÃO', '10', 'Você carrega sua arma (de corte) com uma energia que incendeia a lâmina da sua arma. Sua arma estará em chamas por até 1 rodada. O ataque com esta arma causará +8 de dano adicional (fogo).', '', 0),
(18, 'SEM ESCAPATÓRIA', 'NENHUM', 'REAÇÃO', '', 'Se um oponente que está adjacente a você tentar se afastar (ou se levantar), você poderá fazer um ataque normal (sem habilidades de ação) contra ele. Se acertar, além de causar o dano, o oponente não poderá se movimentar neste turno.', '', 0),
(19, 'TEMPESDADE DE LAMINAS', 'NENHUM', 'AÇÃO', '30', 'Faça um ataque corporal normal com uma arma de corte. Se acertar, cause o dano e faça um ataque extra com um redutor de -1 na rolagem. Se acertar este também, siga com ataques extras, mas sempre aumentando o redutor, até errar um ataque.', '', 0),
(20, 'TIRO CERTEIRO', 'NENHUM', 'AÇÃO', '10', 'Você pode fazer um ataque normal à distância rolando 3d6.', '', 0),
(21, 'TOUCHE', 'NENHUM', 'AÇÃO', '10', 'Você pode rolar 3d6 em um ataque corporal com uma arma leve (peso 3)', '', 0),
(22, 'ATAQUE DA HYDRA', 'NENHUM', 'AÇÃO', '30', 'Faça um ataque normal com uma arma de uma mão. Se acertar o ataque role 1d6 e multiplique o dano pelo resultado.', 'HABILIDADE AVANÇADA', 0),
(23, 'DANÇA DE ESPADAS 2', 'NÍVEL 5;DANÇA DE ESPADAS 1', 'AÇÃO', '40', 'Você começa uma dança que acompanha o fluxo da batalha. Esta dança dura até o final da batalha ou até você se desconcentrar (cair no chão, tontear, etc.). Durante este período você ganha temporariamente Agilidade +4.', '', 0),
(24, 'CORAÇÃO DA BATALHA', 'NÍVEL 5 ', 'SUPORTE', '', 'Sempre que receber dano, você recupera 5 pontos de mana. Só pode ganhar 5 de mana por turno.', '', 0),
(25, 'IMPLACÁVEL', 'NÍVEL 5', 'SUPORTE', '', 'Sempre que errar um ataque corporal, você causa dano igual à metade do dano do ataque (arredondando para baixo).', '', 0),
(26, 'MOVIMENTOS EVASIVOS', 'NÍVEL 5', 'SUPORTE', '', 'Você ganha +1 na sua defesa para cada 2 pontos que tiver em Agilidade. Esta habilidade só funciona se você estiver sem armadura.', '', 0),
(27, 'NOVE DEMÔNIOS', 'NÍVEL 5', 'AÇÃO', '25', 'Faça um ataque corporal normal com uma arma de uma mão. Se acertar, a vitima deve vencer um teste de Vontade (dificuldade 14) ou ficará paralisada por 2 turnos. A vitima estará vivendo em sua mente um pesadelo horrível e assustador.', 'Esta técnica secreta é proibida por muitos espadachins.', 0),
(28, 'RETALHAMENTO', 'NÍVEL 5', 'REAÇÃO', '', 'Se você fizer um acerto crítico, role 1d6. Se cair 6 você decapitou a vítima matando-a na hora (exceto se ela for imune a crítico).', '', 0),
(29, 'SENHOR DAS LAMINAS', 'NÍVEL 10', 'REAÇÃO', '30', 'Sempre que fizer uma ação de ataque com uma arma corporal de corte em um turno, você pode fazer um ataque extra com esta mesma arma.', '', 0),
(30, 'VALOR DA VITÓRIA', 'NÍVEL 5', 'REAÇÃO', '', 'Cada vez que você derrota um oponente (isso inclui se ele se render ou fugir após a batalha) você recupera 10 pontos de vida e 10 pontos de mana.', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
