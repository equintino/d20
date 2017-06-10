-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2017 às 16:41
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
-- Estrutura da tabela `tb_barbaro`
--

CREATE TABLE `tb_barbaro` (
  `id` int(2) DEFAULT NULL,
  `habilidade` varchar(23) DEFAULT NULL,
  `REQUISITOS` varchar(43) DEFAULT NULL,
  `TIPO` varchar(7) DEFAULT NULL,
  `MANA` int(2) DEFAULT NULL,
  `DESCRIÇÃO` varchar(510) DEFAULT NULL,
  `excluido` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_barbaro`
--

INSERT INTO `tb_barbaro` (`id`, `habilidade`, `REQUISITOS`, `TIPO`, `MANA`, `DESCRIÇÃO`, `excluido`) VALUES
(1, 'Arremesso Poderoso', 'Nenhum', 'Suporte', 0, 'Você pode usar sua Força em vez de sua\nAgilidade para atacar com armas de arremesso (como\nlanças e machadinhas).', 0),
(2, 'Ataque do Búfalo', 'Nenhum', 'Ação', 10, 'Você pode fazer um ataque normal\nusando uma arma de FN 5 ou mais. Se acertar, alem do\ndano, o oponente cairá para traz (a menos que ele seja\n2 vezes mais pesado que você).', 0),
(3, 'Ataque Giratório', 'Nenhum', 'Ação', 10, 'Este ataque que pode acertar todos os\noponentes adjacentes. Faça um ataque para cada um\ndestes oponentes.', 0),
(4, 'Brigão', 'Nenhum', 'Suporte', 0, 'Seu ataque de soco causa +2 de dano.', 0),
(5, 'Combate Tático', 'Nenhum', 'Reação', 0, 'Se você derrotar um oponente, você ganha\nimediatamente um ataque extra em qualquer oponente\nque esteja adjacente.', 0),
(6, 'Companheiro Animal 1', 'Nenhum', 'Suporte', 0, 'Você possui um contato com um animal.\nEscolha um destes animais ao escolher esta habilidade:\nLobo, Águia, Cobra, Coruja ou Cavalo.', 0),
(7, 'Companheiro Animal 2', 'Companheiro Animal 1', 'Suporte', 0, 'Você passa a ter um contato telepático\ncom seu companheiro animal, e ele receberá +10 de\nvida e mana.', 0),
(8, 'Espírito Animal: Lobo', 'Nenhum', 'Suporte', 0, 'Seu espírito possui a forma de um lobo.\nVocê ganha +1 nas rolagens de ataque corporal.\nEspecial: Você só pode ter uma habilidade Espírito\nAnimal.', 0),
(9, 'Espírito Animal: Cavalo', 'Nenhum', 'Suporte', 0, 'Seu espírito possui a forma de um cavalo.\nVocê rola 3d6 em testes de Força para correr e se\nmovimentar.\nEspecial: Você só pode ter uma habilidade Espírito\nAnimal.', 0),
(10, 'Espírito Animal: Urso', 'Nenhum', 'Suporte', 0, 'Seu espírito possui a forma de um urso.\nVocê rola 3d6 em testes de Força para erguer objetos\npesados, e ganha +2 no dano desarmado.\nEspecial: Você só pode ter uma habilidade Espírito\nAnimal.', 0),
(11, 'Força de Combate', 'Nenhum', 'Suporte', 0, 'Todos seus ataques corporais causam +1\nde dano para cada 2 pontos de força que você tiver.', 0),
(12, 'Fúria de Batalha', 'Nenhum', 'Ação', 30, 'Com uma ação você pode invocar uma\nfúria destrutiva de dentro de si, ficando neste estado\naté o final da batalha ou até ficar dois turnos sem poder\natacar. Você recebe temporariamente +2 na Força e\nfica imune a medo ou intimidação.', 0),
(13, 'Golpe Devastador', 'Nenhum', 'Ação', 30, 'Você pode fazer um ataque corporal que\ncausa o dobro de dano, e a vítima não poderá agir no\npróximo turno.', 0),
(14, 'Guia Espiritual', 'Nenhum', 'Suporte', 0, 'Você possui um guia espiritual que entra\nem contato com você por sonhos. Este guia pode\nassumir qualquer forma, mas normalmente escolhe a\nforma de um animal. Ele irá lhe alertar se alguma coisa\nacontecer enquanto você estiver dormindo, e pode\n(quando o mestre achar necessário) alertar sobre algum\nperigo iminente ou uma mensagem do futuro.\nVocê pode usar o guia espiritual para relembrar de\nfatos passados da sua vida, ou saber informações sobre\nanimais e plantas. Para isto, basta meditar por alguns\nMinutos.', 0),
(15, 'Investida Mortal', 'Nenhum', 'Ação', 10, 'Em carga você pode desferir um poderoso\ngolpe. Se estiver distante do oponente, você pode\ncorrer até ele e fazer um ataque normal que causa +10\nde dano.', 0),
(16, 'Mordida', 'Nenhum', 'Ação', 10, 'Você pode fazer um ataque corporal\ncom sua boca. O dano é igual a sua Força +4. Se estiver\nem Fúria, o dano será sua Força x2.', 0),
(17, 'Pernas Fortes', 'Nenhum', 'Suporte', 0, 'Você sempre rola 3d6 em testes de Força\npara não ser derrubado.', 0),
(18, 'Rastrear', 'Nenhum', 'Ação', 0, 'Você pode seguir pegadas facilmente, e\npode identificar o tipo de pegada a partir de um teste\nde Inteligência. Dificuldade pode variar entre 10 a 16.', 0),
(19, 'Resistência Selvagem', 'Nenhum', 'Suporte', 0, 'Quando sem armadura, você ganha +2\nde bônus na Defesa.\nEste bônus conta como bônus de armadura.', 0),
(20, 'Sabedoria Selvagem', 'Nenhum', 'Suporte', 0, 'Você pode rolar 3d6 quando fizer testes\nde Inteligência referentes a conhecimentos de plantas,\nanimais e natureza.', 0),
(21, 'Berserker', 'Nível 10; Fúria de Batalha', 'Ação', 50, 'Sua raiva é tanta que seus olhos e sua\nboca se enchem de sangue. Se você estiver no estado\nde fúria e usar esta habilidade, você traz as forças mais\nbrutais do fundo da sua alma, ficando imortal por 4 turnos.\nTodo dano será anulado.', 0),
(22, 'Companheiro Animal 3', 'Nível 5; Companheiro Animal 2', 'Suporte', 0, 'Seu companheiro animal ganhará +1\nem três atributos a sua escolha.', 0),
(23, 'Companheiro Animal 4', 'Nível 5; Companheiro Animal 3', 'Suporte', 0, 'Seu companheiro animal ganhará +10\nde Vida e Mana, e For, Agi e Von +1.', 0),
(24, 'Destruição Total', 'Nível 5', 'Ação', 10, 'Você pode fazer um ataque normal a um\ninimigo usando uma arma pesada (FN 5 ou mais). Se\nacertar, em vez de causar dano você pode optar por\ndestruir uma arma, armadura, escudo ou item visível\ndo inimigo.', 0),
(25, 'Força de Combate 2', 'Nível 5', 'Suporte', 0, 'Nível 5; Força de Combate\nDescrição: Todos seus ataques corporais causam +1\nde dano para cada ponto de força que você tiver.', 0),
(26, 'Fúria Animal', 'Nível 5; Fúria de Batalha e Espírito\nAnimal', 'Suporte', 0, 'Quando em fúria, você fica mais peludo,\nseus dentes e suas unhas ficam mais pontudas e\nvocê fica imune a Frio e Eletricidade.', 0),
(27, 'Fúria de Batalha 2', 'Nível 5; Fúria de Batalha', 'Ação', 40, 'Com uma ação você pode invocar uma\nfúria destrutiva de dentro de si, ficando neste estado\naté o final da batalha ou até ficar dois turnos sem poder\natacar. Você recebe temporariamente +4 na Força e\nfica imune a medo ou intimidação.', 0),
(28, 'Onda Destruidora', 'Nível 5; Fúria de Batalha', 'Ação', 20, 'Quando estiver em fúria, você pode dar\num golpe no chão de onde estiver e derrubar todos a\nsua volta (incluindo aliados) em até 6m. Todos estes\npodem fazer um teste de Agi (dif. 14) para evitar a queda.\nSe você estiver em um superfície frágil poderá destruí-\nla. O mestre dará a última palavra.', 0),
(29, 'Implacável', 'Nível 5', 'Suporte', 0, 'Sempre que errar um ataque corporal,\nvocê causa dano igual à metade do dano do ataque.', 0),
(30, 'Resistência Selvagem 2', 'Nível 5; Resistência Selvagem', 'Suporte', 0, 'Quando sem armadura, você ganha +4\nde bônus na Defesa.\nEste bônus conta como bônus de armadura.', 0),
(31, 'Valor da Vitória', 'Nível 5', 'Reação', 0, 'Cada vez que você derrota um oponente\n(isso inclui se ele se render ou fugir após a batalha)\nvocê recupera 10 pontos de vida e 10 pontos de mana.', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
