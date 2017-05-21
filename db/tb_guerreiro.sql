-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2017 às 19:32
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
-- Estrutura da tabela `tb_guerreiro`
--

CREATE TABLE `tb_guerreiro` (
  `id` int(2) DEFAULT NULL,
  `habilidade` varchar(20) DEFAULT NULL,
  `REQUISITOS` varchar(25) DEFAULT NULL,
  `TIPO` varchar(7) DEFAULT NULL,
  `MANA` int(2) DEFAULT NULL,
  `DESCRICAO` varchar(303) DEFAULT NULL,
  `excluido` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_guerreiro`
--

INSERT INTO `tb_guerreiro` (`id`, `habilidade`, `REQUISITOS`, `TIPO`, `MANA`, `DESCRICAO`, `excluido`) VALUES
(1, 'Arremesso Poderoso', 'Nenhum', 'Suporte', 0, 'Você pode usar sua Força em vez de sua\nAgilidade para atacar com armas de arremesso (como\nlanças e machadinhas).', 0),
(2, 'Ataque do Búfalo', 'Nenhum', 'Ação', 10, 'Você pode fazer um ataque normal\nusando uma arma de FN 5 ou mais. Se acertar, alem do\ndano, o oponente cairá para traz (a menos que ele seja\n2 vezes mais pesado que você).', 0),
(3, 'Ataque Giratório', 'Nenhum', 'Ação', 10, 'Este ataque que pode acertar todos os\noponentes adjacentes. Faça um ataque para cada um\ndestes oponentes.', 0),
(4, 'Ataque Simultâneo', 'Nenhum', 'Ação', 20, 'Faça um ataque normal contra um oponente.\nSe acertar, todos aliados que estiverem adjacentes\nao mesmo oponente, poderão fazer um ataque\nnormal extra.', 0),
(5, 'Ataque do Trovão', 'Nenhum', 'Ação', 20, 'Faça um ataque corporal com uma arma\nde FN 5 ou mais, para causar +10 pontos de dano (elétrico)A vitima deve ser bem sucedida em um teste de\nForça (Dificuldade 12) ou ficará paralisada por uma rodada\ndevido ao choque.', 0),
(6, 'Brigão', 'Nenhum', 'Suporte', 0, 'Seu ataque de soco causa +2 de dano.', 0),
(7, 'Combate Tático', 'Nenhum', 'Reação', 0, 'Se você derrotar um oponente, você ganha\nimediatamente um ataque extra em qualquer oponente\nque esteja adjacente.', 0),
(8, 'Combate em Grupo', 'Nenhum', 'Reação', 0, 'Você ganha +1 nos ataques corporais\npara cada aliado que esteja em combate corporal com a\nmesma criatura que você.', 0),
(9, 'Defletor', 'Nenhum', 'Suporte', 0, 'Quando estiver usando um escudo ou\narma de duas mãos, você recebe Defesa +2 contra ataques\na distância.', 0),
(10, 'Força de Combate', 'Nenhum', 'Suporte', 0, 'Todos seus ataques corporais causam +1 de\ndano para cada 2 pontos de força que você tiver', 0),
(11, 'Golpe Devastador', 'Nenhum', 'Ação', 30, 'Você pode fazer um ataque corporal que\ncausa o dobro de dano, e a vítima não poderá agir no\npróximo turno.', 0),
(12, 'Golpe com Escudo', 'Nenhum', 'Reação', 0, 'Se fizer um ataque e errar, você pode fazer\num ataque extra com seu escudo que causará dano\nigual a sua força. O oponente também deve vencer um\nteste de Força (dif 12) ou cairá no chão.', 0),
(13, 'Grito de Guerra', 'Nenhum', 'Ação', 10, 'Você pode dar um grito fervoroso que\nmotiva todos seus aliados. Eles recebem (assim como\nvocê) +1 em todas as rolagens até o final da batalha.\nEste bônus não é cumulativo.', 0),
(14, 'Investida Mortal', 'Nenhum', 'Ação', 10, 'Em carga você pode desferir um poderoso\ngolpe. Se estiver distante do oponente, você pode\ncorrer até ele e fazer um ataque normal que causa +10\nde dano.', 0),
(15, 'Knock Out', 'Nenhum', 'Ação', 10, 'Faça um ataque normal com uma arma\nde FN 5 ou mais. O oponente recebe metade do dano,\nmas não poderá fazer nada no seu próximo turno. E todos\nos turnos seguintes (até o final da batalha) terá que\ntestar Força (dificuldade 12) antes de poder agir.', 0),
(16, 'Quebra-Escudo', 'Nenhum', 'Ação', 10, 'Você deve fazer este ataque utilizando\numa arma pesada (FN 5 ou mais). Se acertar o ataque,\nnão causará dano algum no oponente, porém, seu escudo\nou armadura será destruído.', 0),
(17, 'Sem Escapatória', 'Nenhum', 'Reação', 0, 'Se um oponente que está adjacente a\nvocê tentar se afastar (ou se levantar), você poderá fazer\num ataque normal (sem habilidades de ação) contra\nele. Se acertar, além de causar o dano, o oponente não\npoderá se movimentar neste turno.', 0),
(18, 'Pernas Fortes', 'Nenhum', 'Suporte', 0, 'Você sempre rola 3d6 em testes de Força\npara não ser derrubado.', 0),
(19, 'Proteger Aliado', 'Nenhum', 'Suporte', 0, 'Sempre que seus aliados forem atacados,\nvocê ajudará com seu escudo. Se você usa um escudo\ngrande, todos aliados adjacentes a você recebem Defesa\n+1.', 0),
(20, 'Força de Combate 2', 'Nível 5; Força de Combate', 'Suporte', 0, 'Todos seus ataques corporais causam +1\nde dano para cada ponto de força que você tiver.', 0),
(21, 'Força de Explosão', 'Nível 5', 'Suporte', 0, 'Todos seus ataques corporais derrubam\no inimigo no chão (menos inimigos que sejam 2 vezes\nmais pesados que você). Ele ainda pode fazer um teste\nde Força (dif: [sua For] +4) para não cair.\nEspecial: Se você usar qualquer habilidade que derrube\no oponente, a dificuldade do teste de Força aumenta\nPara +4.', 0),
(22, 'Golpe Devastador 2', 'Nível 5; Golpe Devastador', 'Ação', 60, 'Você pode fazer um ataque corporal que\ncausa o triplo de dano, e a vítima não poderá agir no\npróximo turno.', 0),
(23, 'Grito de Guerra 2', 'Nível 5; Grito de Guerra', 'Ação', 10, 'Você pode dar um grito fervoroso que\nmotiva todos seus aliados. Eles recebem (assim como\nvocê) +2 em todas as rolagens até o final da batalha.\nEste bônus não é cumulativo.', 0),
(24, 'Grito de Intimidação', 'Nível 5; Grito de Guerra', 'Ação', 10, 'Você pode dar um grito para intimidar\nseus inimigos. Cada inimigo que estiver na batalha\ndeve vencer um teste de Vontade (Dif 14) ou ficará\nparalisado por 2 turnos.', 0),
(25, 'Guerreiro de Aço', 'Nível 5', 'Suporte', 0, 'O bônus de defesa por equipamento (armadura\ne escudo) pode somar até +6.', 0),
(26, 'Implacável', 'Nível 5', 'Suporte', 0, 'Sempre que errar um ataque corporal,\nvocê causa dano igual à metade do dano do ataque.', 0),
(27, 'Investida Forte', 'Nível 5', 'Suporte', 0, 'Sempre que você fizer uma investida\ncarregando um escudo, o oponente deve testar Força\n(Dif = [sua For] +8). Se falhar, ele cairá no chão.', 0),
(28, 'Matador de Dragão', 'Nível 10', 'Ação', 50, 'Faça um ataque corporal normal, se\nacertar reduza a vida do oponente pela metade.', 0),
(29, 'Valor da Vitória', 'Nível 5', 'Reação', 0, 'Cada vez que você derrota um oponente\n(isso inclui se ele se render ou fugir após a batalha)\nvocê recupera 10 pontos de vida e 10 pontos de mana.', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
