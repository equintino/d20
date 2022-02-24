-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Mar-2017 às 03:11
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
-- Estrutura da tabela `tb_gatuno`
--

CREATE TABLE `tb_gatuno` (
  `id` int(2) DEFAULT NULL,
  `habilidade` varchar(24) DEFAULT NULL,
  `REQUISITOS` varchar(28) DEFAULT NULL,
  `TIPO` varchar(7) DEFAULT NULL,
  `MANA` int(2) DEFAULT NULL,
  `DESCRICAO` varchar(328) DEFAULT NULL,
  `excluido` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_gatuno`
--

INSERT INTO `tb_gatuno` (`id`, `habilidade`, `REQUISITOS`, `TIPO`, `MANA`, `DESCRICAO`, `excluido`) VALUES
(1, 'Acrobacia', 'Nenhum', 'Suporte', 0, 'Você pode rolar 3d6 quando fizer testes\nde Agilidades para equilibrar-se, saltar com precisão e\ncair sem se machucar.', 0),
(2, 'Agilidade de Combate', 'Nenhum', 'Suporte', 0, 'Você pode usar sua Agilidade para fazer\nataques corporais com armas de FN 4 ou menos.', 0),
(3, 'Armadilhas 1', 'Nenhum', 'Ação', 0, 'Com um teste bem sucedido de Inteligência\nvocê pode perceber armadilhas. Para desarmá-\n-las você deve fazer um teste de Agilidade. A dificuldade\npara ambos os teste varia entre 10 a 16 (depende\nda armadilha).', 0),
(4, 'Armadilhas 2', 'Armadilhas 1', 'Ação', 0, 'Para armar uma armadilha você deve ter\nos materiais necessários e fazer um teste de Inteligência.\nA dificuldade para localizar e desarmar esta armadilha\né o resultado do teste usado para armá-la.', 0),
(5, 'Arrombamento', 'Nenhum', 'Ação', 0, 'Usando um Kit de Arrombamento e\nrealizando um teste bem sucedido de Agilidade você\npode abrir fechaduras. A dificuldade varia com o tipo\nde fechadura (normalmente 12).', 0),
(6, 'Ataque Aleijador', 'Nenhum', 'Ação', 20, 'Faça um ataque normal à distância.\nVocê pode acertar a junta do joelho ou o pé de seu\noponente, comprometendo sua locomoção. Além de\nreceber o dano, sempre que a vitima tentar se locomover\n(caminhar ou correr) receberá 10 pontos de dano.\nEste efeito dura até a vitima descansar por pelo menos\n1 minuto.', 0),
(7, 'Ataque Evasivo', 'Nenhum', 'Ação', 5, 'Faça um ataque normal com uma arma\nde peso 2 ou menos. Após o ataque você pode se esconder\nem algum lugar para impedir que o inimigo te\nAtaque.', 0),
(8, 'Ataque Redirecionado', 'Nenhum', 'Reação', 10, 'Quando alguém te atacar e errar, você\npode direcionar o ataque do inimigo para outro inimigo\nadjacente a ele, e acertar automaticamente. Você deve\nestar usando uma arma corporal para fazer isto.', 0),
(9, 'Combate com Duas Armas 1', 'Nenhum', 'Suporte', 0, 'Você pode fazer um ataque para cada\narma que estiver usando. A soma da FN das armas deve\nser no máximo 2.', 0),
(10, 'Combate com Duas Armas 2', 'Combate com Duas Armas 1', 'Suporte', 0, 'Combate com Duas Armas 1.\nDescrição: Você pode fazer um ataque para cada\narma que estiver usando. A soma da FN das armas deve\nser no máximo 5.', 0),
(11, 'Combate com Duas Armas 3', 'Combate com Duas Armas 2', 'Suporte', 0, 'Combate com Duas Armas 2.\nDescrição: Você pode fazer um ataque para cada\narma que estiver usando. A soma da FN das armas deve\nser no máximo 8.', 0),
(12, 'Contatos no Crime', 'Nenhum', 'Suporte', 0, 'Você possui muitos contatos entre os\ngrandes criminosos. Com isto você pode descobrir informações\nprivilegiadas. Obviamente o mestre poderá\nrestringir informações que forem problemáticas para a\naventura.\nVocê também pode comprar mercadorias roubadas\npela metade do preço no mercado negro (encontrado\napenas nas grandes cidades).', 0),
(13, 'Evasão', 'Nenhum', 'Reação', 20, 'Se o seu inimigo fizer um ataque corporal\ne acertar, você pode declarar evasão, e obrigar o\ninimigo a rolar novamente os dados. Só pode usar esta\nhabilidade uma vez por rodada.', 0),
(14, 'Falhas da Armadura', 'Nenhum', 'Suporte', 0, 'Você sabe como acertar ataques entre as\nfrestas e falhas das armaduras do inimigo. Ignore sempre\no bônus de armadura da defesa do oponente.', 0),
(15, 'Fuga de Mestre', 'Nenhum', 'Suporte', 0, 'Você pode rolar 3d6 quando fizer testes\nde Agilidade para despistar oponentes e dar nós. Você\ntambém pode escapar de nós ou correntes vencendo\num teste de Agilidade.', 0),
(16, 'Furtividade', 'Nenhum', 'Suporte', 0, 'Você pode rolar 3d6 quando fizer testes\nde Agilidades para se movimentar em silêncio, se esconder\ne furtar bolsos (se for proficiente).', 0),
(17, 'Golpes Rápidos', 'Nenhum', 'Ação', 20, 'Você pode fazer dois ataques corporais\nem uma ação, usando uma arma leve (Peso 2 ou menos).', 0),
(18, 'Mentiroso', 'Nenhum', 'Ação', 0, 'Você é um perito na arte do disfarce e do\nblefe. Role 3d6 quando fizer testes de Inteligência para\nmentir, se disfarçar, intimidar ou imitar outra pessoa.', 0),
(19, 'Mestre das Adagas 1', 'Nenhum', 'Suporte', 0, 'Você pode arremessar duas armas de arremesso\nde peso 1 em um turno.', 0),
(20, 'Mestre das Adagas 2', 'Mestre das Adagas 1', 'Suporte', 0, 'Você pode arremessar quatro armas de\narremesso de peso 1 em um turno.', 0),
(21, 'Truque Sujo', 'Nenhum', 'Ação', 10, 'Quando estiver em distância corporal do\noponente e ele estiver te vendo, faça um teste de Inteligência\n(Dificuldade 7 + Int do oponente). Se vencer,\nvocê fez alguns movimentos de corpo que enganaram\no oponente, o fazendo perder equilíbrio ou o deixando\nconfuso. Ele não poderá agir no próximo turno.', 0),
(22, 'Adagas Improvisadas', 'Nível 5', 'Suporte', 0, 'Você pode pegar garrafas quebradas, lascas\nde madeira, pedaços de vidro e usar como se fosse uma\nadaga (podendo usar qualquer habilidade relacionada).', 0),
(23, 'Camuflagem', 'Nível 5; Furtividade', 'Suporte', 0, 'Você pode se camuflar em florestas\nusando galhos e folhas, ou nas sombras de becos e ruas\nusando uma capa preta e barro. Se fizer isso, você ganha\num bônus de +4 nos testes para se esconder.', 0),
(24, 'Golpes Rápidos 2', 'Nível 5; Golpes Rápidos', 'Ação', 20, 'Você pode fazer quatro ataques corporais\nem uma ação, usando uma arma leve (Peso 2 ou\nMenos).', 0),
(25, 'Golpes Rápidos 3', 'Nível 10; Golpes Rápidos 2', 'Ação', 30, 'Você pode fazer 8 ataques corporais em\numa ação usando uma arma de peso 2 ou menos.', 0),
(26, 'Improvisação Ladina', 'Nível 5', 'Suporte', 0, 'Você pode pegar quaisquer objetos que\nencontrar para montar armadilhas ou abrir fechadura\nsem ter o kit de arrombamento.', 0),
(27, 'Mestre das Adagas 3', 'Nível 5; Mestre das Adagas 2', 'Suporte', 0, 'Você pode arremessar cinco armas de\narremesso de peso 1 em um turno.', 0),
(28, 'Mestre das Adagas 4', 'Nível 5; Mestre das Adagas 3', 'Suporte', 0, 'Você pode arremessar seis armas de arremesso\nde peso 1 em um turno.', 0),
(29, 'Mestre Especialista', 'Nível 10', 'Suporte', 0, 'Você rola 4d6 em todos os testes que\nvocê for rolar 3d6.', 0),
(30, 'Movimentos Evasivos', 'Nível 5', 'Suporte', 0, 'Você ganha +1 na sua defesa para cada\n2 pontos que tiver em Agilidade. Esta habilidade só\nfunciona se você estiver sem armadura.', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
