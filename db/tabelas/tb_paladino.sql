-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Mar-2017 às 03:12
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
-- Estrutura da tabela `tb_paladino`
--

CREATE TABLE `tb_paladino` (
  `id` int(2) DEFAULT NULL,
  `habilidade` varchar(20) DEFAULT NULL,
  `REQUISITOS` varchar(44) DEFAULT NULL,
  `TIPO` varchar(7) DEFAULT NULL,
  `MANA` int(2) DEFAULT NULL,
  `DESCRICAO` varchar(396) DEFAULT NULL,
  `excluido` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_paladino`
--

INSERT INTO `tb_paladino` (`id`, `habilidade`, `REQUISITOS`, `TIPO`, `MANA`, `DESCRICAO`, `excluido`) VALUES
(1, 'Animal Celestial 1', 'Montaria Especial 1 e Aura Divina', 'Suporte', 0, 'Sua montaria foi tocada pelos deuses e\npode mudar sua forma quando quiser. A qualquer momento\nele pode se transformar em um roedor, canino,\nfelino ou eqüino comum. Esta forma possui a mesma\ncoloração que o cavalo e poderá ficar nesta forma o\ntempo que quiser.', 0),
(2, 'Animal Celestial 2', 'Animal Celestial 1', 'Suporte', 0, 'Sua montaria foi tocada pelos deuses e\nagora possui Asas Pesadas ou Toque de Cura. Escolha\nassim que adquirir esta habilidade.', 0),
(3, 'Ataque Giratório', 'Nenhum', 'Ação', 10, 'Este ataque que pode acertar todos os\noponentes adjacentes. Faça um ataque para cada um\ndestes oponentes.', 0),
(4, 'Aura Divina', 'Nenhum', 'Reação', 0, 'Você deve ser sempre justo e seguir os\nensinamentos dos deuses. Todo demônio, morto - vivo\nou espírito maligno deve ser bem sucedido em um teste\nde Vontade (Dificuldade 5 + sua Von) ou fugirá de\nmedo de você. Criaturas com Mente Vazia devem testar\nForça e se falhar serão completamente destruídos.\nSe você for injusto, agir de má fé ou trair a justiça, você\nperderá esta habilidade imediatamente.', 0),
(5, 'Cavaleiro Experiente', 'Nenhum', 'Suporte', 0, 'Você sempre vence testes de Agilidade\npara controlar e cavalgar animais selvagens ou para\ncontrolar montarias em combate.', 0),
(6, 'Combate Tático', 'Nenhum', 'Reação', 0, 'Se você derrotar um oponente, você\nganha imediatamente um ataque extra em qualquer\noponente que esteja adjacente.', 0),
(7, 'Confiança nos Deuses', 'Aura Divina', 'Suporte', 0, 'Você e todos seus aliados que estejam\naté 6 metros de você, sempre receberão Vontade+1 enquanto\nestiverem perto de você.\nEspecial: Se você perder a habilidade Aura Divina,\nvocê também perderá esta habilidade.', 0),
(8, 'Corpo Santo', 'Aura Divina', 'Suporte', 0, 'Seus ferimentos se recuperam duas vezes\nmais rápido que o normal e você é imune a doenças\ne venenos.', 0),
(9, 'Exorcismo', 'Aura Divina', 'Ação', 10, 'Você pode destruir instantaneamente\nqualquer morto-vivo que tenha Mente Vazia e que esteja\nna sua área de visão.', 0),
(10, 'Força de Combate', 'Nenhum', 'Suporte', 0, 'Todos seus ataques corporais causam\n+1 de dano para cada 2 pontos de força que você tiver.', 0),
(11, 'Grito de Guerra', 'Nenhum', 'Ação', 10, 'Você pode dar um grito fervoroso que\nmotiva todos seus aliados. Eles recebem (assim como\nvocê) +1 em todas as rolagens até o final da batalha.\nEste bônus não é cumulativo.', 0),
(12, 'Inquisidor', 'Aura Divina', 'Suporte', 0, 'Você sempre saberá quando alguém estiver\nmentindo. Lembre-se que nem sempre omitir é\nmentir, depende das intenções da pessoa que está omitindo.\nMentir é passar informações erradas propositalmente.\nEspecial: Se você perder a habilidade Aura Divina,\nvocê também perderá esta habilidade.', 0),
(13, 'Investida Montada', 'Nenhum', 'Suporte', 0, 'Sempre que fizer uma investida sob\numa montaria, acrescente +10 de dano ao ataque.', 0),
(14, 'Investida Mortal', 'Nenhum', 'Ação', 10, 'Em carga você pode desferir um poderoso\ngolpe. Se estiver distante do oponente, você pode\ncorrer até ele e fazer um ataque normal que causa +10\nde dano.', 0),
(15, 'Justiça Final', 'Aura Divina', 'Ação', 20, 'Você pode fazer um ataque comum que\ncausará +10 de dano, ou +15 se a criatura for um demônio,\nmorto-vivo ou espírito maligno. O tipo deste\ndano adicional é você que escolhe (Fogo, Frio ou Eletricidade).\nEspecial: Se você perder a habilidade Aura Divina,\nvocê também perderá esta habilidade.', 0),
(16, 'Knock Out', 'Nenhum', 'Ação', 10, 'Faça um ataque normal com uma arma\nde FN 5 ou mais. O oponente recebe metade do dano,\nmas não poderá fazer nada no seu próximo turno. E\ntodos os turnos seguintes (até o final da batalha) terá\nque testar Força (dificuldade 12) antes de poder agir.', 0),
(17, 'Montaria Especial 1', 'Nenhum', 'Suporte', 0, 'Você tem um cavalo e possui um contato\nmuito forte com este animal. Ele nunca o largará e\nfará de tudo para protegê-lo. Com assovios e sons você\nconsegue pedir para que ele faça ações simples.', 0),
(18, 'Montaria Especial 2', 'Montaria Especial 1', 'Suporte', 0, 'Você possui contato telepático com sua\nmontaria e poderá ver o que ele vê após um tempo se\nconcentrando.\nEle também ganha +10 de vida e mana.', 0),
(19, 'Toque da Cura', 'Aura Divina', 'Ação', 10, 'Com seu toque você pode recuperar até\n10 pontos de vida de qualquer aliado. Para isto você\ndeve ser bem sucedido em um teste de Vontade (Dificuldade\n8).\nEspecial: Se você perder a habilidade Aura Divina,\nvocê também perderá esta habilidade.', 0),
(20, 'Força de Combate 2', 'Nível 5; Força de Combate', 'Suporte', 0, 'Todos seus ataques corporais causam +1\nde dano para cada ponto de força que você tiver.', 0),
(21, 'Grito de Guerra 2', 'Nível 5; Grito de Guerra', 'Ação', 10, 'Você pode dar um grito fervoroso que\nmotiva todos seus aliados. Eles recebem (assim como\nvocê) +2 em todas as rolagens até o final da batalha.\nEste bônus não é cumulativo.', 0),
(22, 'Guerreiro de Aço', 'Nível 5 ', 'Suporte', 0, 'O bônus de defesa por equipamento (armadura\ne escudo) pode somar até +6.', 0),
(23, 'Implacável', 'Nível 5', 'Suporte', 0, 'Sempre que errar um ataque corporal,\nvocê causa dano igual à metade do dano do ataque.', 0),
(24, 'Justiça Final 2', 'Nível 5; Aura Divina e Justiça Final', 'Ação', 20, 'Você pode fazer um ataque comum que\ncausará +20 de dano, ou +30 se a criatura for um demônio,\nmorto-vivo ou espírito maligno. O tipo deste dano adicional\né você que escolhe (fogo, frio ou eletricidade).\nEspecial: Se você perder a habilidade Aura Divina,\nvocê também perderá esta habilidade.', 0),
(25, 'Montaria Especial 3', 'Nível 5; Montaria Especial 2', 'Suporte', 0, 'Sua montaria ganhará +1 em três atributos\na sua escolha.', 0),
(26, 'Montaria Especial 4', 'Nível 5; Montaria Especial 3', 'Suporte', 0, 'Sua montaria ganhará +10 de Vida e\nMana, e +1 em três atributos a sua escolha.', 0),
(27, 'Poder Divino', 'Nível 10; Von 6; Aura Divina e Justiça Final', 'Ação', 30, 'Você pode carregar sua arma com o poder\ndos deuses. Sua arma ficará com este efeito até você\nacertar o próximo golpe, que causará o triplo do dano.\nCaso a criatura seja um demônio ou morto-vivo, você\ncausa +30 de dano adicional.', 0),
(28, 'Toque da Cura 2', 'Nível 5; Toque da Cura', 'Ação', 10, 'Com seu toque você pode recuperar até 20\npontos de vida de qualquer aliado. Para isto você deve ser\nbem sucedido em um teste de Vontade (Dificuldade 10).\nEspecial: Se você perder a habilidade Aura Divina,\nvocê também perderá esta habilidade.', 0),
(29, 'Valor da Vitória', 'Nível 5', 'Suporte', 0, 'Ao final da batalha, se você tiver derrotado\nPelo menos um oponente, você recupera 10\npontos de mana para cada criatura derrotada.', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
