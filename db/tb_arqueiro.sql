-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Mar-2017 às 19:24
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
-- Estrutura da tabela `tb_arqueiro`
--

CREATE TABLE `tb_arqueiro` (
  `id` int(2) DEFAULT NULL,
  `habilidade` varchar(24) DEFAULT NULL,
  `REQUISITOS` varchar(29) DEFAULT NULL,
  `TIPO` varchar(7) DEFAULT NULL,
  `MANA` int(2) DEFAULT NULL,
  `DESCRICAO` varchar(680) DEFAULT NULL,
  `excluido` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_arqueiro`
--

INSERT INTO `tb_arqueiro` (`id`, `habilidade`, `REQUISITOS`, `TIPO`, `MANA`, `DESCRICAO`, `excluido`) VALUES
(1, 'Agilidade de Combate', 'Nenhum', 'Suporte', 0, 'Você pode usar sua Agilidade para fazer\nataques corporais com armas de FN 4 ou menos.', 0),
(2, 'Ataque Aleijador', 'Nenhum', 'Ação', 20, 'Faça um ataque normal à distância.\nVocê pode acertar a junta do joelho ou o pé de seu\noponente, comprometendo sua locomoção. Além de\nreceber o dano, sempre que a vitima tentar se locomover\n(caminhar ou correr) receberá 10 pontos de dano.\nEste efeito dura até a vitima descansar por pelo menos\n1 minuto.', 0),
(3, 'Chuva de Flechas', 'Nenhum', 'Ação', 40, 'Você pode disparar até 5 flechas num único\nataque e num único alvo. Role uma única vez independente\ndo número de flechas que você usar. ', 0),
(4, 'Combate com Duas Armas 1', 'Nenhum', 'Suporte', 0, 'Você pode fazer um ataque para cada\narma que estiver usando. A soma da FN das armas deve\nser no máximo 2.', 0),
(5, 'Combate com Duas Armas 2', 'Combate com Duas Armas 1', 'Suporte', 0, 'Você pode fazer um ataque para cada\narma que estiver usando. A soma da FN das armas deve\nser no máximo 5.', 0),
(6, 'Combate com Duas Armas 3', 'Combate com Duas Armas 2', 'Suporte', 0, ' Combate com Duas Armas 2.\nDescrição: Você pode fazer um ataque para cada\narma que estiver usando. A soma da FN das armas deve\nser no máximo 8.', 0),
(7, 'Companheiro Animal 1', 'Nenhum', 'Suporte', 0, 'Você possui um contato com um animal.\nEscolha um destes animais ao escolher esta habilidade:\nLobo comum, Águia, Cobra, Coruja ou Cavalo\n(Veja a ficha dos animais no capítulo 7).', 0),
(8, 'Companheiro Animal 2', 'Companheiro Animal 1', 'Suporte', 0, ' Companheiro Animal\nDescrição: Você passa a ter um contato telepático\ncom seu companheiro animal, e ele receberá +10 de\nvida e mana.', 0),
(9, 'Contato de Gaia', 'Nenhum', 'Suporte', 0, 'Você deve sempre respeitar a natureza\n(plantas e animais). Com um teste bem sucedido de Inteligência\nou Vontade (Dif 6 + Von do animal) você\npode se comunicar com um animal por meio de gestos\ne olhares. Se em qualquer momento você desrespeitar\na natureza, deixar que outros o façam ou deixar de ajudar\nquando ela precisar, você perderá esta habilidade, e\nnunca mais poderá adquiri-la novamente.', 0),
(10, 'Espírito Animal: Águia', 'Nenhum', 'Suporte', 0, 'Seu espírito possui a forma de uma águia.\nVocê ganha +1 nas rolagens de ataque a distância.\nEspecial: Você só pode ter uma habilidade Espírito\nAnimal.', 0),
(11, 'Espírito Animal: Lobo', 'Nenhum', 'Suporte', 0, 'Seu espírito possui a forma de um lobo.\nVocê ganha +1 nas rolagens de ataque corporal. Especial:\nVocê só pode ter uma habilidade Espírito Animal.', 0),
(12, 'Espírito Animal: Coruja', 'Nenhum', 'Suporte', 0, 'Seu espírito possui a forma de uma coruja.\nVocê rola 3d6 em testes de Inteligência relativos\nao conhecimento.\nEspecial: Você só pode ter uma habilidade Espírito\nAnimal.', 0),
(13, 'Espírito Animal: Cobra', 'Nenhum', 'Suporte', 0, 'Seu espírito possui a forma de uma cobra.\nVocê ganha +1 na defesa.\nEspecial: Você só pode ter uma habilidade Espírito\nAnimal.', 0),
(14, 'Espírito Animal: Cavalo', 'Nenhum', 'Suporte', 0, 'Descrição: Seu espírito possui a forma de um cavalo.\nVocê rola 3d6 em testes de Força para correr e se\nmovimentar.\nEspecial: Você só pode ter uma habilidade Espírito\nAnimal.', 0),
(15, 'Evasão', 'Nenhum', 'Reação', 20, 'Se o seu inimigo fizer um ataque corporal\ne acertar, você pode declarar evasão, e obrigar o\ninimigo a rolar novamente os dados. Só pode usar esta\nhabilidade uma vez por rodada.', 0),
(16, 'Fabricar Flechas', 'Nenhum', 'Ação', 0, 'Usando uma faca ou adaga, você pode\ntransformar pedaços de galhos e madeira em flechas. 1\nhora de trabalho rende 20 flechas. ', 0),
(17, 'Falhas da Armadura', 'Nenhum', 'Suporte', 0, 'Você sabe como acertar ataques entre\nas frestas e falhas das armaduras do inimigo. Ignore\nsempre o bônus de armadura da defesa do oponente.', 0),
(18, 'Flecha Elementa', 'Nenhum', 'Ação', 10, 'Você pode encantar uma flecha com\num poder. Este encantamento dura 1 rodada. Qualquer\nalvo atingido por ela recebe um dano adicional de +8\nde fogo, frio ou elétrico (a sua escolha). ', 0),
(19, 'Flecha Fantasma', 'Nenhum', 'Ação', 10, 'Você pode encantar uma flecha com\num poder. Este encantamento dura 1 rodada. Esta flecha\natinge alvos incorpóreos e ignora paredes, portas,\narmaduras, escudos e qualquer coisa não seja orgânica\nou sobrenatural. Causa +6 de dano adicional.', 0),
(20, 'Flechas Rápidas', 'Nenhum', 'Ação', 10, 'Você pode fazer 2 ataques com arco\nneste turno. Podendo escolher alvos diferentes.', 0),
(21, 'Furtividade', 'Nenhum', 'Suporte', 0, ' Você pode rolar 3d6 quando fizer testes\nde Agilidades para se movimentar em silencio, se esconder\ne furtar bolsos (se for proficiente).', 0),
(22, 'Guia Espiritual', 'Nenhum', 'Suporte', 0, 'Você possui um guia espiritual que entra\nem contato com você por sonhos. Este guia pode\nassumir qualquer forma, mas normalmente escolhe a\nforma de um animal. Ele irá lhe alertar se alguma coisa\nacontecer enquanto você estiver dormindo, e pode\n(quando o mestre achar necessário) alertar sobre algum\nperigo iminente ou uma mensagem do futuro.\nVocê pode usar o guia espiritual para relembrar de fatos\npassados da sua vida, ou saber informações sobre animais e\nplantas. Para isto, basta meditar por alguns minutos.', 0),
(23, 'Medicina Natural', 'Nenhum', 'Suporte', 0, 'Você pode rolar 3d6 quando fizer testes\nde Inteligência para fazer curativos, e conhecer ervas\nmedicinais. Este teste pode prevenir que um aliado\ncontraia veneno ou doenças comuns.', 0),
(24, 'Rastrear', 'Nenhum', 'Ação', 0, ' Você pode seguir pegadas facilmente, e\npode identificar o tipo de pegada a partir de um teste de\nInteligência. Dificuldade pode variar entre 10 a 16.', 0),
(25, 'Sabedoria Selvagem', 'Nenhum', 'Suporte', 0, 'Você pode rolar 3d6 quando fizer testes\nde Inteligência referentes a conhecimentos de plantas,\nanimais e natureza.', 0),
(26, 'Tiro Certeiro', 'Nenhum', 'Ação', 10, 'Você pode fazer um ataque normal à\ndistância rolando 3d6. ', 0),
(27, 'Arquearia de Mestre', 'Nível 10', 'Suporte', 0, 'Você sempre rola 3d6 para ataques usando arco.', 0),
(28, 'Caçador de [Monstro]', 'Nível 5', 'Suporte', 0, 'Escolha um monstro (orc, troll, ogro, goblin\nou qualquer outro monstro) quando comprar esta habilidade.\nVocê sempre causa +6 de dano em todos os ataques\ncontra esta criatura. Além de rolar sempre 3d6 quando fizer\ntestes ligados ao conhecimento desta criatura.', 0),
(29, 'Camuflagem', 'Nível 5; Furtividade', 'Suporte', 0, 'Você pode se camuflar em florestas usando\ngalhos e folhas, ou nas sombras de becos e ruas usando\numa capa preta e barro. Se fizer isso, você ganha um\nbônus de +4 nos testes para se esconder. ', 0),
(30, 'Chuva de Flechas 2', 'Nível 5; Chuva de Flechas', 'Ação', 10, 'Você pode atirar varias flechas em um\nsó ataque. Para cada flecha extra, gaste 10 pontos de\nmana. Você pode escolher alvos diferentes para cada\nflecha extra. Máximo 6 flechas por ataque e você pode\nescolher múltiplos alvos.\nExemplo: Para fazer um ataque com 3 flechas, gaste\n20 pontos de mana.', 0),
(31, 'Companheiro Animal 3', 'Nível 5; Companheiro Animal 2', 'Suporte', 0, 'Seu companheiro animal ganhará +1\nem três atributos a sua escolha.', 0),
(32, 'Companheiro Animal 4', 'Nível 5; Companheiro Animal 3', 'Suporte', 0, 'Seu companheiro animal ganhará +10\nde Vida e Mana, e +1 em três atributos a sua escolha.', 0),
(33, 'Flecha Elemental 2', 'Nível 5; Flecha Elemental', 'Ação', 20, 'Você pode encantar uma flecha com\num poder. Este encantamento dura 1 rodada. Qualquer\nalvo atingido por ela recebe um dano adicional de +16\nde fogo, frio ou elétrico (a sua escolha). ', 0),
(34, 'Flecha Fantasma 2', 'Nível 5; Flecha Fantasma', 'Ação', 20, 'Você pode encantar uma flecha com um poder.Este encantamento dura 1 rodada. Esta flecha\natinge alvos incorpóreos e ignora paredes, portas,\narmaduras, escudos e qualquer coisa não seja orgânica\nou sobrenatural. Causa +12 de dano adicional.', 0),
(35, 'Herbalismo', 'Nível 5; Medicina Natural', 'Suporte', 0, ' Você sabe fazer muitas coisas com ervas\nraras. Se ficar um dia inteiro procurando estas ervas em\numa floresta, você é capaz de encontrar uma delas (se\nelas existirem nesta floresta; consulte o mestre).\nEncontrando a Erva da Lua e a Folha de Garraka,\nvocê pode fazer uma pasta verde e aplicar em uma arma\nou flecha. Ao atingir a pasta se solta e a vítima sentirá\numa dor horrível. Se ela falhar em um teste de Vontade\n(dif 12), a vítima não poderá agir por 2 turnos\ndevido a intensa dor.\nEncontrando a Flor de Isura e a Erva dos Passos,\nvocê pode fazer um chá que recupera 60 pontos de\nvida. O chá deve ser feito com água fervente. Ele perde\nseu efeito se não for tomado na hora. ', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
