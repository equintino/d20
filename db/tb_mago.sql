-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Jul-2017 às 01:15
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
-- Estrutura da tabela `tb_mago`
--

CREATE TABLE `tb_mago` (
  `id` int(2) DEFAULT NULL,
  `habilidade` varchar(21) DEFAULT NULL,
  `REQUISITOS` varchar(75) DEFAULT NULL,
  `TIPO` varchar(7) DEFAULT NULL,
  `MANA` int(2) DEFAULT NULL,
  `DIFICULDADE` varchar(22) DEFAULT NULL,
  `DESCRICAO` varchar(346) DEFAULT NULL,
  `OBS` varchar(10) DEFAULT NULL,
  `excluido` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_mago`
--

INSERT INTO `tb_mago` (`id`, `habilidade`, `REQUISITOS`, `TIPO`, `MANA`, `DIFICULDADE`, `DESCRICAO`, `OBS`, `excluido`) VALUES
(1, 'Aríete Mágico', 'Nenhum', 'Ação', 10, '10', 'Você pode dar um golpe mágico em qualquer pessoa ou objeto. Este golpe invisível se assemelha ao arremesso de uma pedra pesada de 1m de diâmetro. É útil para derrubar portas ou paredes (funciona com Força 10), ou derrubar oponentes. Causa 10 pontos de dano de contusão e se o oponente não vencer um teste de Força (Dif 15) cairá para trás.', '', 0),
(2, 'Bola de Fogo', 'Nenhum', 'Ação', 20, '12', 'Você pode disparar uma esfera de chamas de 20 cm de diâmetro que ao explodir causa 20 pontos de dano (Fogo) no alvo e 10 pontos de dano (Fogo) em todos que estiverem adjacentes ao alvo. O oponente pode fazer um teste de Agilidade (Dif 14) para receber apenas a metade do dano.', '', 0),
(3, 'Detectar Magia', 'Nenhum', 'Ação', 0, '8', 'Você pode enxergar a aura mágica de criaturas e objetos mágicos ou encantados por 10 minutos.', '', 0),
(4, 'Elemental do Fogo 1', 'Nenhum', 'Ação', 10, '10', 'Você pode criar um pequeno elemental do fogo que agirá no turno seguinte. Este elemental tem 50 cm de altura e é feito completamente de fogo. Ele desaparecerá assim que o combate acabar ou após 10 minutos. Veja os dados do Elemental do Fogo Pequeno no capítulo 8: Monstros.', '', 0),
(5, 'Elemental do Fogo 2', 'Elemental do Fogo', 'Ação', 30, '12', 'Você pode criar um elemental do fogo de tamanho médio (igual a um humano) que agirá no turno seguinte. Seu corpo é feito completamente de fogo e desaparecerá assim que o combate acabar ou após 10 minutos. Veja os dados do Elemental do Fogo Médio no capítulo 8: Monstros.', '', 0),
(6, 'Elemental do Fogo 3', 'Nível 5; Elemental do Fogo 2', 'Ação', 60, '14', 'Você pode criar um elemental do fogo grande (3m de altura) que agirá no turno seguinte. Seu corpo é feito completamente de fogo e desaparecerá assim que o combate acabar ou após 10 minutos. Veja os dados do Elemental do Fogo Grande no capítulo 8: Monstros.', '', 0),
(7, 'Elemental do Gelo 1', 'Nenhum', 'Ação', 10, '10', 'Você pode criar um pequeno elemental do Gelo que agirá no turno seguinte. Este elemental tem 50 cm de altura e é feito completamente de gelo. Ele desaparecerá assim que o combate acabar ou após 10 minutos. Veja os dados do Elemental do Gelo Pequeno no capítulo 8: Monstros.', '', 0),
(8, 'Elemental do Gelo 2', 'Elemental do Gelo', 'Ação', 30, '12', 'Você pode criar um elemental do Gelo de tamanho médio (igual a um humano) que agirá no turno seguinte. Seu corpo é feito completamente de gelo e desaparecerá assim que o combate acabar ou após 10 minutos. Veja os dados do Elemental do Gelo Médio no capítulo 8: Monstros.', '', 0),
(9, 'Elemental do Gelo 3', 'Nível 5; Elemental do Gelo 2', 'Ação', 60, '14', 'Você pode criar um elemental do Gelo grande (3m de altura) que agirá no turno seguinte. Seu corpo é feito completamente de gelo e desaparecerá assim que o combate acabar ou após 10 minutos. Veja os dados do Elemental do Gelo Grande no capítulo 8: Monstros.', '', 0),
(10, 'Escudo Mágico', 'Nenhum', 'Ação', 10, '10', 'Você pode criar um escudo de energia para proteger uma pessoa qualquer. Este escudo garante +2 na defesa desta pessoa (Este bônus funciona como o bônus de armadura). Esta magia dura 2 minutos (ou até o final da batalha).', '', 0),
(11, 'Familiar', 'Nenhum', 'Suporte', 0, '0', 'Você tem um animal que está destinado a ser seu seguidor. Ele mantém contato telepático com você e pode renascer após 7 dias. Escolha um destes animais ao escolher esta habilidade: Águia, Cobra, Coruja, Corvo, Rato ou Gato.', '', 0),
(12, 'Inferno 1', 'Esta magia só pode ser feita com um cajado.', 'Ação', 30, '12', 'Você pode fazer o chão de uma área de 4 metros de diâmetro ficar em chamas. Todos que tiverem em contato com o chão desta área receberão 10 pontos de dano (fogo) e mais 10 pontos de dano (fogo) em cada rodada seguinte que estiver na área. Esta magia dura 3 turnos.', '', 0),
(13, 'Inferno 2', 'Nível 5; Inferno; Esta magia só pode ser feita com um cajado.', 'Ação', 40, '12', 'Você pode fazer o chão de uma área de 4 metros de diâmetro ficar em chamas e uma chuva de fogo cair sobre ela. Todos que estiverem dentro desta área receberão 20 pontos de dano (fogo) e mais 20 pontos de dano (fogo) em cada rodada seguinte que continuar dentro da área. Esta magia dura 3 turnos.', '', 0),
(14, 'Inferno 3', 'Nível 10, Inferno 2; Esta magia só pode ser feita com um cajado.', 'Ação', 60, '14', 'Você pode fazer o chão de uma área de 4 metros de diâmetro ficar em chamas e uma chuva de fogo e magma cair sobre ela. Todos que estiverem dentro desta área receberão 20 pontos de dano (fogo) e mais 20 pontos de dano (fogo) em cada rodada seguinte que continuar dentro da área. Esta magia só acaba quando você quiser.', '', 0),
(15, 'Invisibilidade', 'Esta magia só pode ser feita com uma orbe.', 'Ação', 30, '14', 'Com o seu toque você pode tornar alguém (ou você mesmo) invisível por 1 minuto (ou até o final da batalha). Seu corpo e todas suas posses ficarão invisíveis.', '', 0),
(16, 'Paralisar', 'Esta magia só pode ser feita com uma varinha.', 'Ação', 50, '[Von do oponente] + 11', 'Escolha um oponente visível. Você poderá paralisar as pernas, braços ou cabeça dele. Paralisando as pernas ele não poderá andar. Paralisando os braços ele não poderá usá-los para atacar ou agarrar objetos. Se paralisar a cabeça ele não poderá falar, ouvir ou enxergar. O efeito desta magia dura 1 minuto.', '', 0),
(17, 'Quatro Elementos', 'Nenhum', 'Ação', 5, '8', 'Você pode criar uma esfera de pedra, água, fogo ou ar. Uma pedra pode ser arremessada e causará 4 de dano, uma porção de água poderá matar a sede, uma esfera de fogo poderá iluminar locais escuros e uma esfera de ar poderá ser mantida para respirar em locais sem ar. O fogo e ar podem ser mantidos enquanto fizerem o teste de magia a cada minuto.', '', 0),
(18, 'Raio Gélido', 'Nenhum', 'Ação', 10, '8', 'Você pode disparar um raio capaz de congelar até 5 litros de água. Se o alvo for uma criatura ela receberá 10 pontos de dano (frio).', '', 0),
(19, 'Recarregar Mana 1', 'Nenhum', 'Ação', 0, '0', 'Você deve sacrificar 5 pontos de vida para recuperar 5 pontos de mana.', '', 0),
(20, 'Recarregar Mana 2', 'Nível 5; Recarregar Mana', 'Ação', 0, '0', 'Você deve sacrificar 10 pontos de vida para recuperar 30 pontos de mana.', '', 0),
(21, 'Resistencia Elemental', 'Nenhum', 'Ação', 10, '12', 'Com o seu toque você pode encantar uma pessoa (ou você mesmo) para ficar com resistência a fogo, frio ou eletricidade. Esta pessoa sempre receberá a metade do dano deste tipo (arredondando para cima). Este efeito dura até o final da batalha.', '', 0),
(22, 'Sono', 'Esta magia só pode ser feita com uma varinha.', 'Ação', 20, '[Von do oponente] + 8', 'A vitima desta magia cairá em um sono muito pesado e só acordará após 1 hora. A vítima só acordará se receber algum dano, caso contrário ela continuará dormindo profundamente.', '', 0),
(23, 'Telecinésia', 'Nenhum', 'Ação', 10, 'Variada', 'Você pode erguer qualquer objeto visível com o poder de sua mente. A dificuldade varia de acordo com o peso do objeto, variando desde um objeto leve como uma arma (dif 10) até uma pessoa (dificuldade 20). Pode manter o objeto no ar enquanto estiver concentrado e focado no objeto.', '', 0),
(24, 'Teleporte 1', 'Esta magia só pode ser feita com uma orbe.', 'Ação', 30, '12', 'Você pode se teleportar para qualquer lugar visível até 6 metros de onde você está. Você pode levar alguém com você apenas encostando-a, mas some +2 na dificuldade da magia para cada pessoa a mais.', '', 0),
(25, 'Teleporte 2', 'Nível 5; Teleporte; Esta magia deve ser feita com uma orbe.', 'Ação', 35, '14', 'Você pode se teleportar para qualquer lugar visível. Você pode levar alguém com você apenas encostando nela, mas some +2 na dificuldade da magia para cada pessoa a mais.', '', 0),
(26, 'Teleporte 3', 'Nível 5; Teleporte 2; Esta magia deve ser feita com uma orbe.', 'Ação', 50, '16', 'Você pode se teleportar para qualquer lugar que você conhece. Você pode levar alguém com você apenas encostando nela, mas some +2 na dificuldade da magia para cada pessoa a mais.', '', 0),
(27, 'Tempestade de Gelo 1', 'Esta magia só pode ser feita com um cajado.', 'Ação', 30, '12', 'Você pode evocar uma tempestade de gelo em uma área visível circular de 4 metros de diâmetro. Uma chuva de pedaços finos e afiados de gelo cai sobre a área. Todos que estiverem na área escolhida receberão automaticamente 10 pontos de dano (corte) + 15 pontos de dano (frio).', '', 0),
(28, 'Tempestade de Gelo 2', 'Nível 5; Tempestade de Gelo; Esta magia só pode ser feita com um cajado.', 'Ação', 40, '12', 'Você pode evocar uma tempestade de gelo em uma área visível circular de 4 metros de diâmetro. Uma chuva de pedaços finos e afiados de gelo cai sobre a área. Todos que estiverem na área escolhida receberão automaticamente 20 pontos de dano (corte) + 30 pontos de dano (frio).', '', 0),
(29, 'Tempestade de Gelo 3', 'Nível 10; Tempestade de Gelo 2; Esta magia só pode ser feita com um cajado.', 'Ação', 80, '14', 'Você pode evocar uma tempestade de gelo em uma área visível circular de 2m até 1km de diâmetro (a sua escolha). Todos que estiverem na área escolhida receberão automaticamente 20 pontos de dano (corte) + 30 pontos de dano (frio).', '', 0),
(30, 'Tiro de Energia', 'Nenhum', 'Ação', 0, '10', 'Você pode disparar tiros de energia para acertar qualquer alvo visível causando 8 pontos de dano. O oponente pode fazer um teste de Agilidade (Dif 14) para receber apenas a metade do dano.', '', 0),
(31, 'Trovão', 'Nenhum', 'Ação', 20, '12', 'Você pode atirar um trovão em qualquer criatura que esteja no seu campo de visão, causando 20 pontos de dano (elétrico). O oponente pode fazer um teste de Agilidade (Dif 14) para receber apenas a metade do dano.', '', 0),
(32, 'Voar', 'Nenhum', 'Ação', 20, '12', 'Você pode fazer alguém voar apenas com um toque. Esta pessoa poderá voar livremente no ar para qualquer direção e na sua velocidade normal. Este efeito dura 1 hora, mas pode acabar imediatamente se a pessoa receber qualquer dano.', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
