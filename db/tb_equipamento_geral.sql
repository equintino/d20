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
-- Estrutura da tabela `tb_equipamento_geral`
--

CREATE TABLE `tb_equipamento_geral` (
  `id` int(2) NOT NULL,
  `item` varchar(31) DEFAULT NULL,
  `ouro` int(4) DEFAULT NULL,
  `peso` varchar(4) DEFAULT NULL,
  `DESCRICAO` varchar(237) DEFAULT NULL,
  `excluido` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tb_equipamento_geral`
--

INSERT INTO `tb_equipamento_geral` (`id`, `item`, `ouro`, `peso`, `DESCRICAO`, `excluido`) VALUES
(1, 'Alforge   ', 50, '1', 'Mochila acoplada na parte de traz na sela da montaria.Comporta até 40 quilos de equipamento.', 0),
(2, 'Aljava Comum', 10, '1,6', 'Utensilio usado normalmente nas costas para carregar flechas. Comporta até 20 flechas (compradas separadamente). ', 0),
(3, 'Anzol e Linha', 1, '0', 'Para pescar', 0),
(4, 'Armadura para animais(Couro)', 300, '35', 'Concede +1 de defesa ao animal', 0),
(5, 'Armadura para animais(Simples) ', 600, '50', 'Concede +2 de defesa ao animal', 0),
(6, 'Armadura para animais(Batalha)', 1200, '75', 'Concede +3 de defesa ao animal', 0),
(7, 'Armadura para animais(Completa)', 1800, '100', 'Concede +4 de defesa ao animal', 0),
(8, 'Barril', 10, '20', 'Barril de madeira para liquidos. Comporta 50 litros de liquido.', 0),
(9, 'Barrilete', 5, '6', 'Barril de madeira para liquidos. Comporta 10 litros de líquido.', 0),
(10, 'Baú Pequeno', 30, '20', 'Baú de madeira reforçado. Com alça para cadeado. 50 cm da largura, 25 cm de profundidade e 25 cm de altura.', 0),
(11, 'Baú Grande', 50, '60', 'Baú de madeira reforçado. Com alça para cadeado. 1m da largura, 50 cm de profundidade e 50 cm de altura.', 0),
(12, 'Caixa Pequena', 2, '8', 'Caixa quadrada de madeira com 50 cm de lado.', 0),
(13, 'Caixa Grande', 10, '45', 'Caixa retangular de madeira com 1m de largura e altura, e 2m de comprimento.', 0),
(14, 'Cantil', 5, '0,5', 'Recipiente para carregar líquidos feito com couro e armação de madeira e/ou metal. Mais fácil de carregar do que o odre. Cheio de líquido pesa 1kg a mais.', 0),
(15, 'Capa de lã', 3, '1', 'Para proteger do frio.', 0),
(16, 'Capa de pele', 10, '3', 'Para climas muito frios.', 0),
(17, 'Chapéu', 3, '0,5', 'de palha, couro ou lona.', 0),
(18, 'Cinto oculto', 1, '0,15', 'Cinto para adaga pode ser colocado na coxa ou no braço', 0),
(19, 'Cinturão de Adagas', 3, '0,25', 'Cinto para o peito com espaço para 10 adagas', 0),
(20, 'Cinto de Ferramentas', 3, '0,4', 'Cinto com pequenos bolsos para guardar ferramentas e utensílios.', 0),
(21, 'Corda Grossa (15m)', 6, '3', 'Corda reforçada aguenta 500 kg', 0),
(22, 'Corda simples (15m)', 3, '2', 'Suporta 200 kg', 0),
(23, 'Kit de Arrombamento', 100, '0,4', 'Bainha com varias gazuas. Necessário para arrombar fechaduras.', 0),
(24, 'Kit de Cura', 50, '2', 'Bandagens, agulha, linha, faca e pastas de ervas medicinais.', 0),
(25, 'Martelete', 24, '1', 'Pequeno martelo usado para fixar os pinos de escalada, a cabeça do martelo é dividida em uma ponta de martelo e outra de picareta.', 0),
(26, 'Mochila Pequena', 20, '1', 'Mochila básica para guardar o essencial. Comporta até 5Kg.', 0),
(27, 'Mochila Grande', 50, '2', 'Mochila reforçada de viagem. Comporta até 20 quilos.', 0),
(28, 'Frasco de Cerâmica', 2, '*', 'Frasco de cerâmica para poções. Comporta 100 ml de líquido.', 0),
(29, 'Frasco de Tinta', 15, '0', 'Suficiente pra dez páginas de texto', 0),
(30, 'Frasco de Vidro', 4, '*', 'Frasco de vidro para poções. Comporta 50 ml de líquido.', 0),
(31, 'Freio, Rédeas e Bocal', 20, '0,45', 'Consiste no equipamento que vai na cabeça do animal. O personagem recebe -2 nos testes de cavalgar se não possuir esse equipamento.', 0),
(32, 'Garatéia', 12, '1', 'Gancho para escalar muros e paredes com 3 anzóis grandes juntos.', 0),
(33, 'Garatéia Furtiva', 20, '1', 'Garatéia forrada com tecido grosso para diminuir o barulho.', 0),
(34, 'Garrafa de Cerâmica', 5, '0,5', 'Garrafa para vinho e cerveja. Comporta 1 litro de líquido.', 0),
(35, 'Lampião', 20, '0,5', 'Este lampião funciona a óleo. Dura 6 horas.', 0),
(36, 'Luvas', 1, '0', 'De lã ou pelica, para proteger do frio.', 0),
(37, 'Luvas de Couro', 3, '0,5', 'Para trabalho pesado ou climas muito frios.', 0),
(38, 'Manto', 5, '1', 'Capa de lã ou lona com capuz, para proteger do frio.', 0),
(39, 'Mata Borrão', 5, '0', 'Usado para limpar o excesso de tinta ajudando na secagem.', 0),
(40, 'Odre', 2, '0,5', 'Cantil que consiste basicamente de um saco de couro com um bocal de madeira e rolha. Cheio de líquido pesa 4kg a mais.', 0),
(41, 'Óleo combustível', 10, '0,5', 'Serve para recarregar lampiões. Se exposto ao fogo, explode (dano igual à 10/fogo em uma área de 2 metros de raio)', 0),
(42, 'Pá de Acampamento', 5, '1', 'Pá pequena para ajudar na montagem do acampamento', 0),
(43, 'Papiro', 1, '0', 'Uma folha. Papel de baixa qualidade feito a partir de uma pasta de junco seco. 100 dessas pesam 1kg', 0),
(44, 'Pederneira e isqueiro', 5, '0,25', 'Uma pedra especial que quando riscada por um metal(isqueiro) gera uma grande quantidade de faíscas. Usada para ascender uma fogueira.', 0),
(45, 'Pelego', 10, '4', 'Couro com lã de ovelha para dormir em cima. Bom para noites frias.', 0),
(46, 'Pena', 2, '0', 'Pena usada para escrever', 0),
(47, 'Pergaminho', 5, '0', 'Uma folha. Pele de cordeiro preparada para receber tinta.E desse material que os grimórios são feitos. 20 dessas pesam 1kg.', 0),
(48, 'Pinos Para escalada', 10, '0,4', '10 pinos para escaladas.', 0),
(49, 'Provisões', 10, '1', 'Suficiente para 2 refeições.', 0),
(50, 'Roupas comuns', 5, '1', 'Camisa ou túnica, calções ou saia e sandálias.', 0),
(51, 'Roupas de festa', 10, '2', 'Vestido ou roupas decoradas ou de cores vibrantes.', 0),
(52, 'Roupas de viagem', 20, '3', 'Camisa e calças de lona e botas.', 0),
(53, 'Sela e estribos', 80, '1', 'Confere um bônus de +2 em todos os testes de Cavalgar.Tenda Pequena (Uma Pessoa) 35 3 Tenda simples para uma pessoa, 1m de altura por 2m de comprimentos e 1m de largura.', 0),
(54, 'Tenda Média (Duas Pessoas)', 50, '6', 'Tenda simples para duas pessoas, 1m de altura por 2m de comprimentos e 2m de largura.', 0),
(55, 'Tenda Grande (Quatro Pessoas)', 85, '13', 'Tenda simples para quatro pessoas, 1,8m de altura por 4m de comprimentos e 4m de largura. Essa tenda é muito grande para ser carregada por apenas uma pessoa, ela deve ser posta em uma carroça ou, ao menos, em um cavalo.', 0),
(56, 'Tenda Grupo (Dez Pessoas)', 150, '27', 'Lembra um pequeno circo em forma de octógono, possui oito mastros a sua volta e um mastro central maior. Só pode ser transportado em uma carroça. Tem 2,5m de altura por 4m de raio.', 0),
(57, 'Tocha', 1, '0,5', 'Dura uma hora', 0),
(58, 'Túnica', 3, '1', 'Camisa longa que fica sobre as calças.', 0),
(59, 'Velino', 10, '0,02', 'Uma folha. Pele de feto de boi ou cordeiro, preparada para receber tinta. Mais lisa e macia do que pergaminho comum, depois de seca a tinta resiste mesmo que a folha seja molhada. Grimórios a prova d’água podem ser feitos desse material.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_equipamento_geral`
--
ALTER TABLE `tb_equipamento_geral`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
