-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Mar-2017 às 04:43
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
  `item` varchar(31) DEFAULT NULL,
  `CUSTO` varchar(4) DEFAULT NULL,
  `peso` varchar(57) DEFAULT NULL,
  `DESCRICAO` varchar(232) DEFAULT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0',
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_equipamento_geral`
--

INSERT INTO `tb_equipamento_geral` (`item`, `CUSTO`, `peso`, `DESCRICAO`, `excluido`, `id`) VALUES
('Alforge   ', '50', '1', 'Mochila acoplada na parte de traz na sela da montaria.Comporta at? 40 quilos de equipamento.', '0', 1),
('Aljava Comum', '10', '1,6', 'Utensilio usado normalmente nas costas para carregar flechas. Comporta at? 20 flechas (compradas separadamente). ', '0', 2),
('Anzol e Linha', '1', '0', 'Para pescar', '0', 3),
('Armadura para animais(Couro)', '300', '35', 'Concede +1 de defesa ao animal', '0', 4),
('Armadura para animais(Simples) ', '600', '50', 'Concede +2 de defesa ao animal', '0', 5),
('Armadura para animais(Batalha)', '1200', '75', 'Concede +3 de defesa ao animal', '0', 6),
('Armadura para animais(Completa)', '1800', '100', 'Concede +4 de defesa ao animal', '0', 7),
('Barril', '10', '20', 'Barril de madeira para liquidos. Comporta 50 litros de liquido.', '0', 8),
('Barrilete', '5', '6', 'Barril de madeira para liquidos. Comporta 10 litros de l?quido.', '0', 9),
('Ba? Pequeno', '30', '20', 'Ba? de madeira refor?ado. Com al?a para cadeado. 50 cm da largura, 25 cm de profundidade e 25 cm de altura.', '0', 10),
('Ba? Grande', '50', '60', 'Ba? de madeira refor?ado. Com al?a para cadeado. 1m da largura, 50 cm de profundidade e 50 cm de altura.', '0', 11),
('Caixa Pequena', '2', '8', 'Caixa quadrada de madeira com 50 cm de lado.', '0', 12),
('Caixa Grande', '10', '45', 'Caixa retangular de madeira com 1m de largura e altura, e 2m de comprimento.', '0', 13),
('Cantil', '5', '0,5', 'Recipiente para carregar l?quidos feito com couro e arma??o de madeira e/ou metal. Mais f?cil de carregar do que o odre. Cheio de l?quido pesa 1kg a mais.', '0', 14),
('Capa de l?;3', '1', 'Para proteger do frio.', NULL, '0', 15),
('Capa de pele', '10', '3', 'Para climas muito frios.', '0', 16),
('Chap?u;3', '0,5', 'de palha, couro ou lona.', NULL, '0', 17),
('Cinto oculto', '1', '0,15', 'Cinto para adaga pode ser colocado na coxa ou no bra?o\r', '0', 18),
('Cintur?o de Adagas', '3', '0,25', 'Cinto para o peito com espa?o para 10 adagas', '0', 19),
('Cinto de Ferramentas', '3', '0,4', 'Cinto com pequenos bolsos para guardar ferramentas e utens?lios.', '0', 20),
('Corda Grossa (15m)', '6', '3', 'Corda refor?ada aguenta 500 kg', '0', 21),
('Corda simples (15m)', '3', '2', 'Suporta 200 kg', '0', 22),
('Kit de Arrombamento', '100', '0,4', 'Bainha com varias gazuas. Necess?rio para arrombar fechaduras.', '0', 23),
('Kit de Cura', '50', '2', 'Bandagens, agulha, linha, faca e pastas de ervas medicinais.', '0', 24),
('Martelete', '24', '1', 'Pequeno martelo usado para fixar os pinos de escalada, a cabe?a do martelo ? dividida em uma ponta de martelo e outra de picareta.', '0', 25),
('Mochila Pequena/embornal', '20', '1', 'Mochila b?sica para guardar o essencial. Comporta at? 5Kg.', '0', 26),
('Mochila Grande', '50', '2', 'Mochila refor?ada de viagem. Comporta at? 20 quilos.', '0', 27),
('Frasco de Cer?mica', '2', '*', 'Frasco de cer?mica para po??es. Comporta 100 ml de l?quido.', '0', 28),
('Frasco de Tinta', '15', '0', 'Suficiente pra dez p?ginas de texto', '0', 29),
('Frasco de Vidro', '4', '*', 'Frasco de vidro para po??es. Comporta 50 ml de l?quido.', '0', 30),
('Freio, R?deas e Bocal', '20', '0,45', 'Consiste no equipamento que vai na cabe?a do animal. O personagem recebe -2 nos testes de cavalgar se n?o possuir esse equipamento.', '0', 31),
('Garat?ia', '12', '1', 'Gancho para escalar muros e paredes com 3 anz?is grandes juntos.', '0', 32),
('Garat?ia Furtiva', '20', '1', 'Garat?ia forrada com tecido grosso para diminuir o barulho.', '0', 33),
('Garrafa de Cer?mica', '5', '0,5', 'Garrafa para vinho e cerveja. Comporta 1 litro de l?quido.', '0', 34),
('Lampi?o;20', '0,5', 'Este lampi?o funciona a ?leo. Dura 6 horas.', NULL, '0', 35),
('Luvas', '1', '0', 'De l? ou pelica, para proteger do frio.', '0', 36),
('Luvas de Couro', '3', '0,5', 'Para trabalho pesado ou climas muito frios.', '0', 37),
('Manto', '5', '1', 'Capa de l? ou lona com capuz, para proteger do frio.', '0', 38),
('Mata Borr?o;5', '0', 'Usado para limpar o excesso de tinta ajudando na secagem.', NULL, '0', 39),
('Odre', '2', '0,5', 'Cantil que consiste basicamente de um saco de couro com um bocal de madeira e rolha. Cheio de l?quido pesa 4kg a mais.', '0', 40),
('?leo combust?vel', '10', '0,5', 'Serve para recarregar lampi?es. Se exposto ao fogo, explode (dano igual ? 10/fogo em uma ?rea de 2 metros de raio)', '0', 41),
('P? de Acampamento', '5', '1', 'P? pequena para ajudar na montagem do acampamento', '0', 42),
('Papiro', '1', '0', 'Uma folha. Papel de baixa qualidade feito a partir de uma pasta de junco seco. 100 dessas pesam 1kg', '0', 43),
('Pederneira e isqueiro', '5', '0,25', 'Uma pedra especial que quando riscada por um metal(isqueiro) gera uma grande quantidade de fa?scas. Usada para ascender uma fogueira.', '0', 44),
('Pelego', '10', '4', 'Couro com l? de ovelha para dormir em cima. Bom para noites frias.', '0', 45),
('Pena', '2', '0', 'Pena usada para escrever', '0', 46),
('Pergaminho', '5', '0', 'Uma folha. Pele de cordeiro preparada para receber tinta.E desse material que os grim?rios s?o feitos. 20 dessas pesam 1kg.', '0', 47),
('Pinos Para escalada', '10', '0,4', '10 pinos para escaladas.', '0', 48),
('Provis?es', '10', '1', 'Suficiente para 2 refei??es.', '0', 49),
('Roupas comuns', '5', '1', 'Camisa ou t?nica, cal??es ou saia e sand?lias.', '0', 50),
('Roupas de festa', '10', '2', 'Vestido ou roupas decoradas ou de cores vibrantes.', '0', 51),
('Roupas de viagem', '20', '3', 'Camisa e cal?as de lona e botas.', '0', 52),
('Sela e estribos', '80', '1', 'Confere um b?nus de +2 em todos os testes de Cavalgar.Tenda Pequena (Uma Pessoa) 35 3 Tenda simples para uma pessoa, 1m de altura por 2m de comprimentos e 1m de largura.', '0', 53),
('Tenda M?dia (Duas Pessoas)', '50', '6', 'Tenda simples para duas pessoas, 1m de altura por 2m de comprimentos e 2m de largura.', '0', 54),
('Tenda Grande (Quatro Pessoas)', '85', '13', 'Tenda simples para quatro pessoas, 1,8m de altura por 4m de comprimentos e 4m de largura. Essa tenda ? muito grande para ser carregada por apenas uma pessoa, ela deve ser posta em uma carro?a ou, ao menos, em um cavalo.', '0', 55),
('Tenda Grupo (Dez Pessoas)', '150', '27', 'Lembra um pequeno circo em forma de oct?gono, possui oito mastros a sua volta e um mastro central maior. S? pode ser transportado em uma carro?a. Tem 2,5m de altura por 4m de raio.', '0', 56),
('Tocha', '1', '0,5', 'Dura uma hora', '0', 57),
('T?nica', '3', '1', 'Camisa longa que fica sobre as cal?as.', '0', 58),
('Velino', '10', '0,02', 'Uma folha. Pele de feto de boi ou cordeiro, preparada para receber tinta. Mais lisa e macia do que pergaminho comum, depois de seca a tinta resiste mesmo que a folha seja molhada. Grim?rios a prova d??gua podem ser feitos desse mate', '0', 59);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_equipamento_geral`
--
ALTER TABLE `tb_equipamento_geral`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_equipamento_geral`
--
ALTER TABLE `tb_equipamento_geral`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
