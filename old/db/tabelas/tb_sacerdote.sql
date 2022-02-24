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
-- Estrutura da tabela `tb_sacerdote`
--

CREATE TABLE `tb_sacerdote` (
  `id` int(2) DEFAULT NULL,
  `habilidade` varchar(29) DEFAULT NULL,
  `REQUISITOS` varchar(45) DEFAULT NULL,
  `TIPO` varchar(7) DEFAULT NULL,
  `MANA` int(2) DEFAULT NULL,
  `DIFICULDADE` varchar(21) DEFAULT NULL,
  `DESCRICAO` varchar(441) DEFAULT NULL,
  `OBS` varchar(198) DEFAULT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_sacerdote`
--

INSERT INTO `tb_sacerdote` (`id`, `habilidade`, `REQUISITOS`, `TIPO`, `MANA`, `DIFICULDADE`, `DESCRICAO`, `OBS`, `excluido`) VALUES
(1, 'Abençoar Aliados', 'Nenhum', 'Ação', 10, '', 'Todos seus aliados que estiverem até 10 metros de você receberão +1 em todas as rolagens por 1 minuto (ou até o final da batalha). Este bônus não é cumulativo.', '', '0'),
(2, 'Abençoar Objeto', 'Nenhum', 'ação', 10, '', 'Você pode abençoar qualquer água e torná-la água benta. Se abençoar uma arma, esta sempre causará +6 de dano contra demônios, mortos-vivos e espíritos malignos. Se abençoar um símbolo sagrado do seu deus, qualquer demônio, morto-vivo ou espírito maligno que encostar receberá 6 de dano imediatamente (e mais 6 de dano a cada turno que tiverem em contato com o objeto).', '', '0'),
(3, 'Arma dos Deuses', 'Dogma (qualquer)', 'Ação', 20, '', 'Você pode conjurar a arma de seu deus patrono. Esta arma terá as características normais da arma apropriada do deus (escolha a que for mais lógica), mas sempre causará +10 de dano quando usada para o propósito do deus. Esta arma é brilhante e coberta por runas angelicais. Você pode usar normalmente esta arma mesmo que se ela for complexa. Ela desaparece após 1 minuto (ou até o final da batalha) em um brilho de luz.', 'Se você perder a habilidade Dogma, você perde esta habilidade também.', '0'),
(4, 'Criar Alimento', 'Nenhum', 'Ação', 10, '', 'Você pode criar uma refeição para até seis pessoas. Esta refeição é formada basicamente de pão, peixe, geléia, vinho e água. Você também pode usar esta habilidade para transformar um barril de água em vinho, transformar um peixe ou pão em 20, ou fazer brotar frutas em uma arvore ou planta apropriada.', 'perde esta habilidade também.', '0'),
(5, 'Caminhada Mágica', 'Nenhum', 'Ação', 10, '12', 'Com o seu toque, você pode encantar alguém para caminhas sobre qualquer tipo de superfície (incluindo líquidos). É possível caminhar pelas paredes, pelo teto, por cima da água, etc. Esta magia dura 1 hora e só influencia seus pés.', '', '0'),
(6, 'Curar Ferimentos', 'Nenhum', 'Ação', 5, '8', 'Com seu toque você pode curar até 10 pontos de vida.', '', '0'),
(7, 'Detectar Magua', 'Nenhum', 'Ação', 0, '8', 'Você pode enxergar a aura mágica de criaturas e objetos mágicos ou encantados por 10 minutos.', '', '0'),
(8, 'Destruir Mortos-Vivos', 'Nenhum', 'Ação', 10, '10', 'Todos Mortos-vivos que estiverem até 6 metros de você e que tiverem Mente Vazia, voltarão a ser cadáveres inanimados e não poderão ser reanimados novamente.', '', '0'),
(9, 'Dogma: Discípulo da Guerra', 'Nenhum', 'Suporte', 0, '0', 'Você nunca pode fugir de uma luta (a menos que seja uma morte certa) e deve sempre honrar a morte de quem morreu lutando. Você tem Força +1 enquanto seguir este dogma. Se em qualquer momento você fugir de uma luta ou desonrar os mortos, você perderá este bônus e esta habilidade, e nunca mais poderá adquiri-la novamente.', 'Você só pode ter uma habilidade Dogma.', '0'),
(10, 'Dogma: Discípulo da Justiça', 'Nenhum', 'Suporte', 0, '0', 'Você deve ser sempre justo e nunca mentir. Você tem Vontade +1 enquanto seguir este dogma. Se em qualquer momento você mentir ou for injusto com alguém, você perderá este bônus e esta habilidade, e nunca mais poderá adquiri-la novamente.', 'Você só pode ter uma habilidade Dogma.', '0'),
(11, 'Dogma: Discípulo da Morte', 'Nenhum', 'Suporte', 0, '0', 'Você deve todos os dias de lua cheia sacrificar um animal e não deve nunca mais cortar unhas ou cabelos. Você pode ver e se comunicar com os espíritos dos mortos livremente. Estes espíritos podem contar coisas sobre o passado do local onde ele está. Se em qualquer momento você cortar suas unhas e cabelos, ou esquecer de sacrificar um animal em um dia de lua cheia, você perderá esta habilidade, e nunca mais poderá adquiri-la novamente.', 'Você só pode ter uma Dogma', '0'),
(12, 'Dogma: Discípulo da Natureza', 'Nenhum', 'Suporte', 0, '0', 'Você deve sempre respeitar a natureza (plantas e animais) e nunca deixar que outros desrespeitem. Com um teste bem sucedido de Inteligência ou Vontade (Dif 6 + Von do animal) você pode se comunicar com um animal por meio de gestos e olhares. Se em qualquer momento você desrespeitar a natureza, deixar que outros o façam ou deixar de ajudar quando ela precisar, você perderá esta habilidade, e nunca mais poderá adquiri-la novamente.', 'Você só pode ter uma Dogma.', '0'),
(13, 'Dogma: Discípulo da Paz', 'Nenhum', 'Suporte', 0, '0', 'Você deve ser sempre trazer a paz, nunca poderá lutar e nem deixar que outros o faça. Você tem Vontade +2 enquanto seguir este dogma. Se em qualquer momento você lutar ou deixar que alguém lute, você perderá este bônus e esta habilidade, e nunca mais poderá adquiri-la novamente.', 'Você só pode ter uma Dogma.', '0'),
(14, 'Dogma: Discípulo da Sabedoria', 'Nenhum', 'Suporte', 0, '0', 'Você deve sempre que puder transmitir conhecimento e deve ler livros sagrados por pelo menos 2 horas por dia. Você tem Inteligência +1 enquanto seguir este dogma. Se em qualquer momento você desprezar a educação ou deixar de ler os livros sagrados em um dia, você perderá este bônus e esta habilidade, e nunca mais poderá adquiri-la novamente.', 'Você só pode ter uma Dogma.', '0'),
(15, 'Dogma: O Panteão', 'Nenhum', 'Suporte', 0, '0', 'Você deve ser sempre justo, respeitar a natureza e evitar combates desnecessários. Demônio morto-vivos ou espíritos malignos devem ser bem sucedidos em um teste de Vontade (Dif. 5 + sua Von) ou fugirão de medo de você (Seres sem Vontade devem testar Força). Se em qualquer momento você for injusto com alguém, desrespeitar a natureza ou matar algum ser sem necessidade, você perderá esta habilidade, e nunca mais poderá adquiri-la novamente.', 'Você só pode ter uma habilidade Dogma.', '0'),
(16, 'Graça Divina', 'Nenhum', 'Ação', 10, '10', 'Com seu toque, você pode fazer uma pessoa ganhar +2 na sua próxima rolagem de dado. Esta magia só pode ser feita com um cajado.', NULL, '0'),
(17, 'Lança do Destino', 'Nenhum', 'Ação', 10, '12', 'Na sua frente se materializa uma lança sagrada com símbolos angelicais feita de luz, que dispara na direção de seu inimigo, causando 10 pontos de dano. Se a criatura for um demônio, morto-vivo ou espírito maligno, este receberá 30 pontos de dano. Após isto, a lança some em uma grande explosão de luz.', NULL, '0'),
(18, 'Parede Invisível', 'Esta magia só pode ser feita com um cajado.', 'Ação', 20, '10', 'Você pode criar uma parede invisível de 3 metros de altura por 3 de largura. Esta parede é impenetrável, mas some após 20 minutos. O conjurador pode cancelar esta magia a qualquer momento. Ela é capaz de aguentar até 60 pontos de dano.', NULL, '0'),
(19, 'Proteção Mental', 'Nenhum', 'Ação', 5, '8', 'Com seu toque, você pode fazer uma pessoa ficar imune a magias de controle mental. Este efeito dura até a pessoa dormir.', NULL, '0'),
(20, 'Recarregar Mana', 'Nenhum', 'Ação', 0, '0', 'Você deve sacrificar 5 pontos de vida para recuperar 5 pontos de mana.', NULL, '0'),
(21, 'Resistência Elementar', 'Nenhum', 'Ação', 10, '12', 'Com o seu toque você pode encantar uma pessoa (ou você mesmo) para ficar com resistência a fogo, frio ou eletricidade. Esta pessoa sempre receberá a metade do dano deste tipo (arredondando para cima). Este efeito dura até o final da batalha (1 minuto).', NULL, '0'),
(22, 'Sono', 'Esta magia só pode ser feita com uma varinha.', 'Ação', 20, '[Von do oponente] + 8', 'A vitima desta magia cairá em um sono muito pesado e só acordará após 1 hora. A vítima só acordará se receber algum dano, caso contrário ela continuará dormindo profundamente.', NULL, '0'),
(23, 'Telecinésia', 'Nenhum', 'Ação', 10, 'Variada', 'Você pode erguer qualquer objeto visível com o poder de sua mente. A dificuldade varia de acordo com o peso do objeto, variando desde um objeto leve como uma arma (dif 10) até uma pessoa (dificuldade 20). Pode manter o objeto no ar enquanto estiver concentrado e focado no objeto.', NULL, '0'),
(24, 'Toque Estéreo', 'Esta magia só pode ser feita com um cajado.', 'Ação', 20, '14', 'Toque um aliado e no próximo turno ele não gastará nenhum ponto de mana caso use uma habilidade (ou magia) com custo de mana igual ou inferior a 30.', NULL, '0'),
(25, 'Trovão', 'Nenhum', 'Ação', 20, '12', 'Você pode atirar um trovão em qualquer criatura que esteja no seu campo de visão, causando 20 pontos de dano (elétrico). O oponente pode fazer um teste de Agilidade (Dif 14) para receber apenas a metade do dano.', NULL, '0'),
(26, 'Velcidade', 'Esta magia só pode ser feita com um cajado.', 'Ação', 20, '13', 'Com um toque você pode aumentar a velocidade de um aliado. Ele poderá andar o dobro do normal e poderá fazer 2 ações no seu próximo turno. Esta magia dura apenas um turno.', NULL, '0'),
(27, 'Voar', 'Nenhum', 'Ação', 20, '12', 'Você pode fazer alguém voar apenas com um toque. Esta pessoa poderá voar livremente no ar para qualquer direção e na sua velocidade normal. Este efeito dura 1 hora, mas pode acabar imediatamente se a pessoa receber qualquer dano.', NULL, '0'),
(28, 'Abençoar Aliados 2', 'Nível 5; Abençoar Aliados', 'Ação', 10, '12', 'Todos seus aliados que estiverem até 10 metros de você receberão +2 em todas as rolagens por 1 minuto (ou até o final da batalha). Este bônus não é cumulativo.', NULL, '0'),
(29, 'Aura da Cura 1', 'Nível 5; Cura Ferimentos', 'Ação', 20, '12', 'Todos que estiverem até 2m de você recuperarão 10 pontos de vida.', NULL, '0'),
(30, 'Aura da Cura 2', 'Nível 5; Aura da Cura 1', 'Ação', 30, '14', 'Todos que estiverem até 2m de você recuperarão 30 pontos de vida.', NULL, '0'),
(31, 'Circulo da Proteção', 'Nível 10', 'Ação', 40, '16', 'Você pode criar uma barreira indestrutível em sua volta (5 metros de raio). Esta barreira é indestrutível e bloqueia qualquer tipo de magia. Todos que estiverem dentro do circulo receberão 10 pontos de vida a cada minuto. Além disto, qualquer demônio que estiver dentro deste circulo será automaticamente banido para os mundos infernais. Este círculo dura quanto tempo o conjurador quiser, contando que ele esteja dentro dele e concentrado.', NULL, '0'),
(32, 'Criar Golem', 'Nível 5', 'Ação', 60, '16', 'Você pode dar vida para objetos inanimados. Estes seres criados são chamados de Golens e podem ser feitos dos mais variados objetos, mas devem ser feito de um mesmo tipo de material (exemplo: Madeira, Metal, Pedra, Papel, etc.). Um golem se destrói após 1 hora.', 'Você deve usar o pó de uma pedra preciosa (no valor de 400 moedas) para fazer um golem de 1 metro de altura. Para cada metro a mais, você precisará de mais uma pedra e a dificuldade aumentará em +2.', '0'),
(33, 'Curar Ferimento 2', 'Nível 5; Curar Ferimentos', 'Ação', 30, '14', 'Com seu toque você pode curar até 80 pontos de vida.', '', '0'),
(34, 'Manter Golem', 'Nível 5; Criar Golem', 'Ação', 10, '14', 'Você pode estender a longevidade de um Golem. Cada vez que é feita esta magia em um golem, duplique sua duração (duração x2). Exemplo: Se usar esta magia em um golem que dura 1 hora, ele durará 2 horas. Se fizer esta magia em um golem que dura 2 horas, ele durará 4 horas.', '', '0'),
(35, 'Neutralizar Mana', 'Nível 5', 'Ação', 80, '14', 'Todos que estiverem até 4m de você perderão 60 pontos de mana.', '', '0'),
(36, 'Recarregar Mana 2', 'Nível 5; Recarregar Mana', 'Ação', 0, '0', 'Você deve sacrificar 10 pontos de vida para recuperar 30 pontos de mana.', '', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
