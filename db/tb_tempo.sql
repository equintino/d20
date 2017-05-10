-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2017 às 02:24
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
-- Estrutura da tabela `tb_tempo`
--

CREATE TABLE `tb_tempo` (
  `id` int(2) NOT NULL,
  `DIA` int(2) DEFAULT NULL,
  `TEMPMAX` varchar(3) DEFAULT NULL,
  `TEMPMIN` varchar(11) DEFAULT NULL,
  `DESCRICAO` varchar(65) DEFAULT NULL,
  `ESTACAO` varchar(9) DEFAULT NULL,
  `LUAS` varchar(9) DEFAULT NULL,
  `excluido` enum('0','1') NOT NULL DEFAULT '0',
  `figura` blob,
  `figura2` blob,
  `figura3` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tempo`
--

INSERT INTO `tb_tempo` (`id`, `DIA`, `TEMPMAX`, `TEMPMIN`, `DESCRICAO`, `ESTACAO`, `LUAS`, `excluido`, `figura`, `figura2`, `figura3`) VALUES
(1, 1, '17°', '6°', 'Sol com algumas nuvens. Céu limpo e estrelado durante a noite. ', 'Outono', 'Minguante', '0', 0x89504e470d0a1a0a0000000d4948445200000044000000490806000000848d806c00000006624b4744000000000000f943bb7f000000097048597300000b1300000b1301009a9c180000000774494d4507e105090e310a883261db0000001974455874436f6d6d656e74004372656174656420776974682047494d5057810e17000004e04944415478daed9bdb53135718c07f1b22a404a91b13c82850b9d8973eb68f7de8433bd3715a91000aa8a31511ad43556e76a6ff405b158208142f682f4ab954dbcef432d3766a1fabe3631f3aa3582f1508686cb926114e1f98a5a11785cd0692e5fc9e92cc9e6f935fbef3edb7272720914824128944229148240b637070f0c5a57e0f4a2c093973f69c181a1a06c09d9ecece1ddb95652d04e0ddf78f8af0e7168b85fada6a656878b8d4e574762e3b218d4dcd22100860b3d91042100804e688597642b42cb15aadd41c3a0040fba9d33c7cf8070076bb9daafdfba2f6be2db12824212181478f1ecd3eafacd8cde1ba1a121313191b1bfbd7b432bd90bcbcdc57003ace7d38e7f54307aac8c8583b9b45e72f7c2a96859082fc8ddf0368579c70b6969670b8ae06803b77ef62b4949814a24d9bc7112ea5f7e2a56ed30b494b733df1184dcaf5eb378a4d2f64c7f66d0ac0cf57aece4b8a5185366685685cb97a75ded9d4d2d62e4c2f647c7ce289c7bcb6614361424202232323e6cd908181816cedf1f4f4f4af8f3bd6e5727e565b7d1080a30d5e614a216eb7fbe66c3bad28aef98c49494999d3d09972ca689f753e07eddf57094083b749984ec8f0f0fdb2b00c495c48ff120c86cc9721535353bfeb19979dbdae07a0bba7f781a984a4a7a7fd04b062c58a058d2b2cd8540c70ebf61dd59435e4e9d454bd1966ae29d3d5d32b00ca77ed5cf05887c361be1a72ef5ebfeeb115e56f984f88b674383d3dfd9bde189f5ce814a61102e05cbd1a8bc5b24eeff8d1d15173644853738beefa118e9e7e2426854c4c4ca02891af23ebb9d2c49c9096d60f04c0deca8a77228d65b55ae35fc8c8e8288aa29062b7d7451aeb299b2dbe8534788f0b80fada6a2c16cbaa48e3a5a6a6fae356486757b7080683d8747cabffe4e3f31700d85c5ce8885b21b76edd06e040d5fe8863f97c43f1dd98690bc439d9d97e23e245b248b4e4428e1c6b14002e9793e2228f6a545c5555e34f4883b7494c4d4db172e54a76eddc61545307406545b9125742de3b724c048321b23233a8ac28ffc5a8b893939300f8fdfe1c5dbdcb52d50c21042ea793d2922d00cf1911f7e4e93300e4e6e45c5355b52fe68534b7b48ab1b17100b2b23229ddb2d9d0f87eff43008a8b3c2fe88db1281b663ace7d247c3e1f30b324587df02d43e30b21fc8d4dcd6a2814e2edfada883e535432c4e7f379d2d2d22eb6b6b58b3f4746d0643c9395457191e74b60a391e7fbe1c7cb6a2814c26eb7471ccbf00c3975a643dcbf3f77c13b333383b2995a11ad020d107176e81672e458a378d2adb5cd6633a4eb5c4c19baa7cc7fc9484a4ac2e574b2b5ac64312fdd00e4e5e5f6181553b755addd76381c14790a5e52d5559717b98f0160ed9a356cdf56a62cb9907029aaba8a3dbbcba32e21140a7ddbd9d5fd6a7fff0000cfae5f5fe929c83f69e4392236abd5134551a8afad8eaa90a30dded9e96a54cd305cc8c0e060f6575f7fd3a7ed180cdf706b5c43d7c6f8f8b8b6e8c39b7bf744ad7f3234b0f7f809a1dd4b288a42664606a525fabb516f533381601098f955bfaee6507c6eed3e7ea25568dfa886dd9e8cdbedbe56e42978feffc69dee38cb83077e84f8fbf725abd54a6df5c145db821ed5135dfafc8b976ff4ddfc6ea10b365a7695956e31ffdf433abbba456032c06460666a252626614b4a223939397753feeb7d482412894422914824128964c1fc05a68ab272730d87310000000049454e44ae426082, 0x89504e470d0a1a0a0000000d49484452000000460000004d08060000001be9124700000006624b4744000000000000f943bb7f000000097048597300000b1300000b1301009a9c180000000774494d4507e10509171304dbcf920300000b984944415478daed5b699055c515fece7d6f66deacccc00c3bca6a320aa295286e151383b82060a2512a15a3c6b8548289d1321afd612c97a452a60cb1622ccb1f2612d48854708b518c22418322468282d4806c02b33333f7be65eeedfef2e3f51b9aeb9b85196609f34ed5d4bcdbddb7dfe9afcf397d967e408e72f47f476c4b5c944321473d9696334916901c43b20800e826be91430600c97348ae20b98064de50e0c91922d81c4ff2dbf0834b86ca660d2a307413b34916039821223e22ce6800a39f7ee619a19b3873b8abd1a924b7f0107d3d675bc87292bf26d99641456bfd16c94900c0d6c482e10acc4c925b49c6a9f4c324df32f89c4552869d8de1c1f868f331054003580747ee05b0c1b4274484c30e18292faa23590ee06700aa01d4034800c803a000fc8964e531ab2adec1d69bbb50a3a95aa9bd243f2479160050f32692078c3acdb1d5892da93387836d8992fc8301e04d92930160dffa1a87e4ab2435c97a92ceb052250033007cc57cde0ec00580f173a66b006b001c04500960de312919418b17a1cffc90b49c4cf26d232d4f913c8ee42492d790ac3663369bfe24c92bad778ba978f6b1a032d374a01e267917c95f30508f907cc32cba85e40566dcd5245b49de6a9e17934c997101c9db19a887547bf0e784eb1d686d6c3aa33ff93e585f3f216d243dafa2bf8243ad35337f162d27b990e43833eebb243d92b7902c306d571ac054e6a5c00f54a2cd7bb7b5a9f9a42e8d7edcbd70a84b4cbed67a090fa73f66d20bd6b82f0063f5cda7d63e494daddba9d463836e7cfd868357b1c91ddfd598446bdb6d9dfa2b22ed22b2c56a7a12c012c493418f7d1e919721320f80400410c9ef6223a4971bf885f7a259068c02504ad2159165b607cada9673108d44e048ad54146f0580c2b2d2df76678349b64b7a41df03f0be14173e7a044c4700ac0240002988789d4927808871140fefab6f9d03005255b6be83293731aaa1b6aea8beb6d6f9f8dd0dbbbb63224672a511f9f7485ee4fbfe4c26db8fe7473bba94ae96fdb5796c8dcfef64de85962add91a5bf2b55cacbc497245fefad6498b57d899ab394e6d454abb77aefb6edead30f3e62cbde03b12e25c6eccac700e603380dc02bd1681480fa04d5931e24b9cbeccadb1949221905314f05c1c4c09157d892b8504614be1a9a358020092006608a6a8dcf8d9415adee543d3d2f56585c9c0400adf5698ee30080076093512f86165d0460368002003b4464b7d577a2d6ba0cc0d9001e80a0004a838e40698d5155551bcb268c513d125d92f79174d9395d4ff20a928bb452bfb1da5f0a8260c2176c55a35bc640fdde1a77f311484c465a366693961d3b764449de61cdfd9af6839b485e6a4eb5ed36e33a9ddba06af79974e3342a08367a455d02e337b75d42721cc975590049750ad5a1d3f8051d049332f3ad5bb356cc82aeb5465f7704c004e9348dde14b61bbeefc748dec6ee491fc621a9b5d264a05e30c12cba5325e45594be447204803700cc045066753f0e600180b0df9384d62e22ce54000b241289917c11c00a11d99f99da1abf502bbdd68938dbba91debb014896b4451546144e8e025703f8413a00d575a2e9211aa934260146edebcc5ae60138aee3b073e47940ae1011dd23608c0eb730e05240cf46c45968755502f8b9b11562d9902494f610711601f82180f301cc0570a252ea9e48245207c03ea2178a23cf02d8d68d66df6fd93e0d00c986b62846145e0ee03e738202c007e2eba748d648345265011325b94b445200c2d1f90322a2d9e88e975125fb8ecc92fbea52921f8794e5820e0fd3f3468576782cc9272c91f5493eae949a4af29756bb0ac5405955c9a891c978ea6d5aeb29d4fa06ad75b335d706b2f3f889e474539a499af11ec97b498ee9b5f7f7d2ae4d42f2616b521a63f61d3b25e0baee5c8b9171241fb5c6c7cdd1ff99d5f61ec9d37b00cc0a6b43e25aeb755aeb7d26bcd8497219c9730f0b075cf78410308f86eccd72927d0b81949b3c95e46924df37bb9c61b22e6c24ddb87779062c921348de49f2c54e8ce13d3d31bec96472dc17ac681a94ad24e72aa5c6dacea9e7b96109be98648df57a1dc94524237e73dbfcaed61eedaa335212fbd0a8d49b88c82c886498ae0a1bc5e2c2a295000a3dcf9d26229b5a9b5a96965694ad02f0ae31bcdabce30078a1271b138bc5f61b1079c8fc0901bc2722ab0fa9b47b82886c03d0189ae25b00a601003401a59f8523ef4834a200bcdce780caadd93f92e4eb96ceb3137dce23d901f6ce3d3b856421c9629245d6ffe8111cd7997732ef179b30a15b0f98e463d681bd9149ffe49eae39da934125d3c735913c60763dc3d43f01ccb58f3b11f1edf7264f9acc6cb1cb1125ce3b898db279c021506e31b199198c5a14441b0622b579ee10cf934d0150dcdbf5f60518c1314c7d0126c801939dc603184b72f450cc1c0228cd9239e0510566cf9e3d79263eb2c7d703f81cc0672447ae5ab54a06b3de4c4fe7b35d1dcf409d415fbd03e0da101063ac10e2a8edc04f8d175a67bce044c8efaa23f93592b37a397fa7c7750fdf1fc5f6e06aa6fc2d21be7cc36bca38a7f7932c3d2ac735491191a500969a7441b5b12fd71bc7add4387c6b006c20b95844b60f98a4685602b81379113bf7dc0ec007f03a802d004602580be0af6197e268488d849e9790bcddd49a9bac5d5aafb59eb97cf972a73f2586a450733cc987acef4e906c20f9ac49a61d3798866e31c95b0d43195a9bb9fcd38fc09468a51fb0be3320f91793b99bd6d77545fb3a81883c63181d09e06ed33cc32485f6f4e39e948a4826c7d202e06992bf721c67b765027a7dc7c6398a6af681d510207d29a8df486bad21e9cb00009a01bc9201a5bb7061c080314ca4ac8698c9f2f505ec88e7ba9dfa484eba7430221396015834541c3c7b11a5007e9ca97e00581104c1b6becfaba777d17d10c0d3006acdf35c92e7f724ea1e28e31b25f9f750c6eeb24e5318a164525ffc18738564abf5dd07b4d6170c0970ac6b1d1d457ba5d4c8d098f1bef267db6d35353562f52f3275ac1f1dc9772712890292d7856a600d2407feb6437575b5bda07f854079826499e98b916a22c9582295f849abdb5a9e05d4c9241f27b9cd1cb735d47a33c9acd73c3ccf8d913c2cf4686868700c38718b8f83545c38b01252ef4ea1d6eb48fef7301f42eb954dcd4d858716d1764d3ce14d74ddd6cb3319b7102813ad3a79980e74064e874aba6dd5992aa299efc68e645da098686dab6bd8bdf7c37d9fd69cc7fd8d7306049c20e5c795520c9543fea6db834a9233c2a94b8bf932adf5092467917cae9bea61a3b9963623737931abf74b4e4826e28ba9799dc99633e52574edf69dfc64ed7aeed8f09f75cd3b767f7940924d547a258172080a45e40c2b3e7101c4013ca694fa47241229b142fe76008b01dc684eae7213cfec0230ce64db18e2a9c5b4296a7db1384ea989d3c4bc5b09e04100130138244b941f20d5e6c1ad6bdc2929ffa3fc58feef2aaaa7bd3530c09005d444436303aaaaaa969994c4374d5f268915a45d9c74e91a6404227699f6dfe6b8dd8b74c5b1dab4af3160250c8819f2919e9b48fb4d34ee46bee5f47da6dafd37d11ec410a8a7f2478d7895a4d35919f6a88704c9cf1b4f299c58b9de00718589aeef02d024e9c57f1f87eac419a76f2380e78c642401ac14912d8cb72f41619e7d44ff0ac06a115124770328200911190b911b42acb4005806603bc872c771d6470a63cf37efab95f271a333cea7eecd1a7b054c0614cbebad03704bc6af31e1fe490600985ddd2c22ebb2b8b0c9504b0900b0c1ab40a3f7a454a6ebcac6806f36ea0aa4ab151e80552212b727a8183f66507f8770b4fca0f34277582ecb768af568aea66eeeb80c74483054484616c773c0f433e580c90193032607ccb10e8ce480c94e3eccc54343f1d0f3b005667ac6db35744ae879f8914929bc16baa0dc647ebd2fc359628a90ceb588f923800ab407d387bb2a358087d59fd252921f5d3fd83f481f4c352a21f9482857db51ff1eec7b37832931a526355198a5ef740045c3159828d2bf2f02b2df741abece27c9af5abfb136e5bad44a2683a939df3b4739ca51bfd99e8696ab069b87ff01ed845a4c5578c2d80000000049454e44ae426082, 0x89504e470d0a1a0a0000000d4948445200000040000000400806000000aa6971de0000000473424954080808087c086488000000097048597300000b1200000b1201d2dd7efc000002374944415478daed9ac1ad83300c863b4246600446c8081d81638f1d81111881113a0223e4da1b6f836c90672a3f290f511a8aff00c295fe0b5029fe1cc78e934b08e172665d14800250000a4001280005a000148002383100f42ffcdc0ca922b524470a6fe4f89be1db02369e5c00c8084b7acc18fc49c37fede100d0a04b52b7c2f0b13a4910500000e3633543381d220438eeef242f0cc1ad859075116410d23362805aee02c0f3f92c482dc99302cbf3b32202818060360540069623c3c71ade95d14cd845382403a0c11b523de1dd9a3d3f677cfc7dc1106ac4c28804e0120c4c511bcd024476b0e200d8cb41487eb428d6c2e1d02100784100214376b0620038f60340c8ecf03802007476285601a0415d493dd8786476a8be06c0c687cc92ce0eed1a00fd0600bcf05ae0be029021e63f6607a9c570779ba1059ba6e6ec00ea4300e08122d41d0540d8a1ba3f9d09409f9af7a501b82d3c3b0a917ab39618f7ed9146bb39cfc6ad304aa396f49848afc3338b0250018dbf2fe846350975468300806a6a54a99e4d34fe5fb92d5a07ac3ced99f53c6f97a52b4e2b0dc022ba3920e35f3347bc12146c645c73ec461100246681073460f30010dac074993a5018002b0a23cff5bfc905205e08a501182e4b9754776622afe7e83f3490ed301f89f74b3a366fce14b34080f4037826b894c3cc8433457838202f48bc5b18ebc8f35b1affaa0bd05764ec449d60c0c5ce22e5be24d5a18edc760d608313a7ef00e84d5105a00014800250000a4001280005a0004ea75fba05dd0b27e068ae0000000049454e44ae426082),
(2, 2, '18°', '7°', 'Céu com mais nuvens pela manhã e chuva forte a tarde.  ', 'Outono', 'Minguante', '0', NULL, NULL, NULL),
(3, 3, '18°', '6°', 'Chuva fraca durante a manhã, restante do dia nublado. ', 'Outono', 'Nova', '0', NULL, NULL, NULL),
(4, 4, '16°', '5°', 'Céu parcialmente nublado o dia inteiro. ', 'Outono', 'Crescente', '0', NULL, NULL, NULL),
(5, 5, '12°', '2°', 'Céu nublado com geada pela manhã.  ', 'Inverno', 'Crescente', '0', NULL, NULL, NULL),
(6, 6, '8°', '1°', 'Geada pela manhã, dia nublado com chuva fraca ao anoitecer.  ', 'Inverno', 'Cheia', '0', NULL, NULL, NULL),
(7, 7, '4°', '-3°', 'Neve pela manhã, sol entre nuvens a tarde, neve forte  a noite.  ', 'Inverno', 'Cheia', '0', NULL, NULL, NULL),
(8, 8, '2°', '-7°', 'Neve pela manhã e a tarde. Céu aberto ao anoitecer.  ', 'Inverno', 'Minguante', '0', NULL, NULL, NULL),
(9, 9, '1°', '-6°', 'Nevasca. Rápidas aparições do sol à tarde.  ', 'Inverno', 'Minguante', '0', 0x89504e470d0a1a0a0000000d4948445200000044000000490806000000848d806c00000006624b4744000000000000f943bb7f000000097048597300000b1300000b1301009a9c180000000774494d4507e105090e310a883261db0000001974455874436f6d6d656e74004372656174656420776974682047494d5057810e17000004e04944415478daed9bdb53135718c07f1b22a404a91b13c82850b9d8973eb68f7de8433bd3715a91000aa8a31511ad43556e76a6ff405b158208142f682f4ab954dbcef432d3766a1fabe3631f3aa3582f1508686cb926114e1f98a5a11785cd0692e5fc9e92cc9e6f935fbef3edb7272720914824128944229148240b637070f0c5a57e0f4a2c093973f69c181a1a06c09d9ecece1ddb95652d04e0ddf78f8af0e7168b85fada6a656878b8d4e574762e3b218d4dcd22100860b3d91042100804e688597642b42cb15aadd41c3a0040fba9d33c7cf8070076bb9daafdfba2f6be2db12824212181478f1ecd3eafacd8cde1ba1a121313191b1bfbd7b432bd90bcbcdc57003ace7d38e7f54307aac8c8583b9b45e72f7c2a96859082fc8ddf0368579c70b6969670b8ae06803b77ef62b4949814a24d9bc7112ea5f7e2a56ed30b494b733df1184dcaf5eb378a4d2f64c7f66d0ac0cf57aece4b8a5185366685685cb97a75ded9d4d2d62e4c2f647c7ce289c7bcb6614361424202232323e6cd908181816cedf1f4f4f4af8f3bd6e5727e565b7d1080a30d5e614a216eb7fbe66c3bad28aef98c49494999d3d09972ca689f753e07eddf57094083b749984ec8f0f0fdb2b00c495c48ff120c86cc9721535353bfeb19979dbdae07a0bba7f781a984a4a7a7fd04b062c58a058d2b2cd8540c70ebf61dd59435e4e9d454bd1966ae29d3d5d32b00ca77ed5cf05887c361be1a72ef5ebfeeb115e56f984f88b674383d3dfd9bde189f5ce814a61102e05cbd1a8bc5b24eeff8d1d15173644853738beefa118e9e7e2426854c4c4ca02891af23ebb9d2c49c9096d60f04c0deca8a77228d65b55ae35fc8c8e8288aa29062b7d7451aeb299b2dbe8534788f0b80fada6a2c16cbaa48e3a5a6a6fae356486757b7080683d8747cabffe4e3f31700d85c5ce8885b21b76edd06e040d5fe8863f97c43f1dd98690bc439d9d97e23e245b248b4e4428e1c6b14002e9793e2228f6a545c5555e34f4883b7494c4d4db172e54a76eddc61545307406545b9125742de3b724c048321b23233a8ac28ffc5a8b893939300f8fdfe1c5dbdcb52d50c21042ea793d2922d00cf1911f7e4e93300e4e6e45c5355b52fe68534b7b48ab1b17100b2b23229ddb2d9d0f87eff43008a8b3c2fe88db1281b663ace7d247c3e1f30b324587df02d43e30b21fc8d4dcd6a2814e2edfada883e535432c4e7f379d2d2d22eb6b6b58b3f4746d0643c9395457191e74b60a391e7fbe1c7cb6a2814c26eb7471ccbf00c3975a643dcbf3f77c13b333383b2995a11ad020d107176e81672e458a378d2adb5cd6633a4eb5c4c19baa7cc7fc9484a4ac2e574b2b5ac64312fdd00e4e5e5f6181553b755addd76381c14790a5e52d5559717b98f0160ed9a356cdf56a62cb9907029aaba8a3dbbcba32e21140a7ddbd9d5fd6a7fff0000cfae5f5fe929c83f69e4392236abd5134551a8afad8eaa90a30dded9e96a54cd305cc8c0e060f6575f7fd3a7ed180cdf706b5c43d7c6f8f8b8b6e8c39b7bf744ad7f3234b0f7f809a1dd4b288a42664606a525fabb516f533381601098f955bfaee6507c6eed3e7ea25568dfa886dd9e8cdbedbe56e42978feffc69dee38cb83077e84f8fbf725abd54a6df5c145db821ed5135dfafc8b976ff4ddfc6ea10b365a7695956e31ffdf433abbba456032c06460666a252626614b4a223939397753feeb7d482412894422914824128964c1fc05a68ab272730d87310000000049454e44ae426082, 0x89504e470d0a1a0a0000000d4948445200000046000000460806000000712ee28400000006624b4744000000000000f943bb7f000000097048597300000b1300000b1301009a9c180000000774494d4507e1050a0014264a325f3b00000a2e4944415478daed9c7b8c5c551dc77f67773abb5dba5bb68d50e4258682020a454111104890678190aad548e51183b1062a188340a0e28b9810d020be308a240dc1000af2908796184a8958296d450a580ab46ca1dbddceceee9db98ff3fbf8c7dedb9ede9d3baf4eb7edb6bf643233f7cc3df777bee7f73ee78cc83890a7f4b6aaaf0d96d9b2972a53df90376f8f1d7c89d649d96e436b0787e7269f87cae1ac4c15cc00e7ed4d2373f7eacd9e4aa1d59b802780878107444400f31ecc05cc841e3c701c300814809e2d1e2662ae55ee615b7a2275ef2ae0ad48f5f93706468e68b597db99a0ec9f1a38a9f65b53cd2b53ed05a7edce5d72905e939e0238c91d7931883e2b2252f4c33343ab7e0a98152222ebdf7db71d58e35c5fd6328f1746b95dc29502c7006fc6035400553dc92a9f53c6d0cbcf7b5e0e58ea5c0b805b5ac2fbaea686c00d290036bce971846f793f757da3c2df9cef9aa8df8434c661184e07fee30cb864e1251d9586aaa4aa274e78f70cbc4dfda400de4e8882db9a1cdc2763c6bfd98c0d6fe0b7261039a0cb98c106f9fb48ccdfc21d8e60bf1fcd4e8102f0e3300c730d306c44445429d7232e83e5f0fa97d76dcc35317100367e3fbb452502edadf3a1894339b6d167144ae175aeaa64d0ab211cd9042897a6fa392b2bf46869a20a2c709f6aadfeab0c33eabd3f8aa506f8416c58511d83cfb2300c0f6c902fe34c5cd2e1e3c07e22226b0b5e66e2b9b67ff8532d016724d2e5e948b651570a1c52456afed80c28aafa60aa9f9bc7cd5aaf2b7145cace0084cdf4a57065055056a583c820289d59e97e1b94e63ae02c4af5f3d71d1ad90397390f3b3c4902812fb95c6c1a29ffa209b5bcb802302b9a54f1479d3ede4ab50dc5d7d7b6ca9ecc74c4dd15f92315ae068aaed4a8eac15e1474d56bd02d9ca7aa9bb38009c3727b05299994565b6061aa8f374444acb5c702afa5da96789ed75d3b228d4af3aa007378961d5078c5c212f75a64f59d2c7b039c0c1ce8960d4ad05b0aa3c7b2b2eb302c773af7cf8b81e901da9debdd0a8b537dbc0fdc55c5e35dbf5d59b4effb5dc06f1b885407812f64d8935f026fb9a09523fb99c86a314b621c4ff308d03726212c957a80176b45cecefb10300738a2be8c338ab688bf55ff5c608ac35cd766df5e1e178c6a5268f5fedb9e5b3d29fd0cdff73b1895b0f793a876306046a83c55cdc6002f00beb5768c3a0691f6d49b56a8ea4ce0c322227d96a31b9616ab7e5b865ae59c38a1167db1528902f84bdcee8b88fc739d372554eeab014c0118ae126cd64307b532909b31f665a70d06fca19e1902cec808c09602ba62c58a5c86577aa5502874ac5fbfbe03589d1527799e37bd4e502e088260bf0ae339a0e132461886b3ea1c7cadf673815345440607064c2a3a1d01be55c7c09e71cba4aa7a4e1046a736c84716e51b9596c10a617aa3a44e3de5bc2a2a50eb41d700d7ae59b3c600ffa0b5f4a3ccb4de837dbb8cd9ec7aa4ced140a8c798a60b6688887b7351449e1491bc88842232a7897e168bc819ad8ee44dc6202b5e54e54011728d0213044198cfe7e78bc88de394a1f8c56271bfeeeeeedeedc0656dddc0b4c878af1291a377242aee6c7bd0db6841ab6adf3b0814638c017815982c2287c4036949f958440e36c6bc973c6777abed1a1191be52342f52fa92ba4b46fd6509f020f0e73a0cf245136785405999aafabb002d06a63aa9c3ef6b78928bc783e796c8f6d0c8c8ecaeaeaea7c320f849673e7f7c2cee097588c8c929698adf454c9bf9769b31b76f35fc3a53445eaba276af88485f8af70f88c80263cce25601d392a54a3f0cf6e996ae40dbdb978bc8825aeedb18b3151c91492983da915ade4ef77354fc72e93769504a51d4353997f376655b33adca421ac08da9df1f5f4395be3c1e7ce776a6bac61ee587407f1445cfe572b9bc882cab10204e2c022e01ae6a309fa99522dc532814da9b29c0ef747af67f9ba65bd5850d0cb6d1fceb7ee057e9d0605ce28fba0a5c15aaeac572789bc25ac687960277b462dc9eddbad3ab4aaea4ab8c318734993c76c4af96cc538ac74ab6c78ac848359b04a38eb04253a731265fb7f135c6748b48778b06571491a78d3173dcb243ad9890d1783f5fb6d23d396786818f89c88a3846725d7cbb88f454cfa9aaa61715296bb7c38b2d02659931a6c718332751d1300c9342b48ac87f2b25e92272b531e66b22a2368a1e8f276b659c34de104b4e2b92d07cddaed449007fee886ff2db4d2272739de2ff8831e622a73f638c41950163a45744bee3238bf2465e30719219d37263ccac9897e52272ac885c3e30ecf74f9bd2f15849a5a7b34dae3122d344e4aa3ac6bf0818a85077d94744e61b63cadb6d8081efd76914170d0e0e9af49227307f34aed34b4444fa3dffe37ea4af56593e3925d98397f0552e954caa1258cbe36d5f9a50b24cf594de4aebb78172a9b26d225885ee5bb972657b4621fc01d7bedcf9e8dfdbfc489fadb64ae0fbfe61f1f57b2b4cd4e975f2b41af8774bdd3b30bb41177a5786a74bf6c4ccdc766dc8de5f0d182fb25d3a5ad15f5d81b7fd1be4cd0277d7198b545e570eacf65659a2b5c0bab8d2ef065f7fca9a11e0a6f4269e50b9c06aed457da01b58923171c76700e0552bb08fc1a1d636d7a834fc09f5bdc9f12ccf7036212743782a910ae02177176615502a8aee262f3ca11cd94df5ee76786f60f0a319e05c9beae3dd225c013c93da7800300c9cd7b0ead8f2f0adf8defe8e0a9cef74ba250cf723bd2b9529dfd070b9c2724a68b590de00dd84ba7f5a759b687b3884afc46d5f05be971871556d6e4f1e51f134284d7580f920f07977d91538d2eab60be6cd1835e04cd8b6e4a9b066e99a81039a0027bd06fe602a7df92970ba88c80b4b96d4e6332a0defebea1951b113ca6d35983834c5c43175303e352e8c27df0f42f1ad2a36550b56b83da38f76770b884bafbffefaa4d4810c05be9eb46f842b1a425acb43e7d79b2cf60ffbb3818e0ac66c4a13337c9855258c2c91b563c001bed1a41775e9bbf5dcb37ea030767362e46f3e3b0c878f6af0c109f721f0a1a640b18a1f46ea8711a1034c42e5d03ed4243069677176bd9581ed8d6bdc1d5097d57b5f1094b69c585318052588f0c388c88e9196e4c3c264fbc918c35df64eccf27e511c035825543861dc6a35c02dc0cdc0ac46fb50d505aa4a682d915522ab63a4657b8dba1744d7019b87cbc1396f0c789de35ea92b453aa50950d7a5d7966a243bcf37318139e0b8dda906fcbbb12b05b5e3f8d8264c1b4f5edbc6eb41bf7eb93f0772a873e99d82952b2bd4dd10113faecc25808e4c3666a0d9670f95fc2d2abfa13032afa5c77c4a76eb326aa3b471e3c61c70774a101e064eab20202fc560fccc3d4669ad9ddecc804a919db2cb9efa77ca03ea1ad5d0ea85594924a3e7aefdf456fa0973fc0fe809c2e8a5d8eb246788e68b88bc33e0ed6be31a4d46a1ea2ca0949c95042e94894240be54f64f2a87515290dab241bacfd7ab83489f4c01f3769548f65e99681445511e985a2c16d3e700eec83aaceed4627ae257a7eca53d9c86cad1acbd28b861fb76bad01df63704bb0a6d2894f7ccbf55f2746c60b83bfccdd2ff01bc721c99df1400c50000000049454e44ae426082, 0x89504e470d0a1a0a0000000d49484452000000310000002e0806000000811cf15200000006624b474400ff00ff00ffa0bda793000000097048597300000b1300000b1301009a9c180000000774494d4507e105090f0b10513b2cef0000001974455874436f6d6d656e74004372656174656420776974682047494d5057810e17000006e94944415468deed595d6c5b67197ebe737c6227ced2b4cd46c456baa6599d3fdaac430569fc15ed828bb209c40a0c6e40080a9bba6a6842aa104c5c4c1a54888e0a9555a03271b3549b0aedb65209b2ae84a45992264d9cda499a2cad9dc43e766c9fe3f3fb9df3bd5c24610bac901427b2449ecbd79f7dbec7effb3e7eded7c00636b081f783dde91bfbfafa946030d8a828ca5e22fa080008216e0921fa3399ccf8fefdfbbdb226118bc5224288238cb1471963f500a4c597048059007f24a2e3cdcdcd636549221a8d7e4a96e5130076ff97a3439ee73dd9d6d6d655562462b1580440c70a082c619088beb2d61909acf4604747872c84382249d2ee557c7e3b63ece98e8e8ec30d0d0d922449b58aa28438e77630182cb4b6b6baeb9a896834da22cbf24500f7aef21949002789680f8026c65898884c00638cb1738cb173914824b32e2462b1d8d701bcfcbe265e0de8839e45441e63ec6ddff78fb6b6b65eb953122bbe10116dbb4302b7fdb2186301009f9365f974341afdf87a90a035eccd2659969f8fc7e3756b46221a8d5633c62ad7526188e8d344f4859293e8ecec0c8d8e8e7e5592a4f3007eb0a65acf5880880ef4f5f5292593d8bebebe4de170f8c7000e31c6aad6c941ec9224a91680fa3f93e8ecec0c85c3e19f30c60e0390d7cd03311656142554924cd4d7d77f11c077d793c092e40602817b86868688736e4f4e4ee60e1e3ce8af5afa16cbe82c63ecb3eb6da989c8658ca5177f3f3422ea07f0f2f0f0f0e5ff44867d80127d5296e5d701d494c3ac40445900cf0b214edccea6fc9b3ac9b2dc562e0416fb642b809f4a92f4c46a24b60e6506c65818c033838383f7ae948453a65368533018fcc44a494c11915786d95088a87145247cdf1f049028d36cd08a489c39736612c09fcaeef6449c3136b1628b7cfdfaf55d8cb1df02d8bec6ee75a5a52411d184e338df686f6f4fae74286203030375a150a8aa4c4830ceb9b567cf1ef57625f5ff81975eba12d475fb906dbbbf9898c84400606444555229ed51c3b08f6732c66796cea652da01dbf65e4ca50a0700e0d4a97196c9143f6618ce2f7339f3f1bf77df082d388364b36df36305cd7cfae4efbb1400989eceeed034fb394db38f249385ad2525313f6fedf27d1a2222d234eb878b8db69573ef0d21886c9b1f8fc5d420f0736659ee7922f21d875f342d62aa6a870cc37d4e0822eef97fb65db11d008a45eb4744c439f7a753a9e20e00b06def09dff70dcebd19cbe2fb4abab25153563210c0902c4b559a66f500c0cc8c6e84c3814ba190b2d334f9505353c405e6c930bef796a2042205cdbe78cfdd771111b9b99c758d318c7b9eff8e5194b20090cd98970381c0846df39142c14c034036abc7376f0ef7fa4264727933b52665954c3acb3c5522416c6eceafeae9b9b16c1af338dd75faaf62998d9fbc910b699a17fc17d90c8e4633cbe687b1f854e5cd693354d28b0f0f271bf279e3d5f9f9e2abe9b4560b00b3b3a6a2aac5dfe8badd198fab7bdf2bbbe20b9a66bdd3df3fd506005353ba72eb56eedb9a6e0f64e7cd2f2f9d9b99c97fb358b4af2512f3879662998cf59056b0aea454ede82b6f0c5796b81fcc2f71eea71dc7a36432bf1700ae5e4dd45b96c3852043d3ecc30b7ba9d476db76aff942502e671e0100d7a56ac370cefbbe205db77fd7d4f4940400baeebc4e4464184e17008c8eaa15b99cf98ce709b26daf339d321b4abac64c24b27fbbfffeba5342906459d618003cf8e07d73d96cf128f7c48e5955bf08004d4d1f9a9ecf192715eeef4ba60be700a0a282151389dcaf6b6b2bb38ee3fd21163b21161ad87d510a20abebee59006869b9db5555ed9c61386d9cfb9747a2a964e97a604edf9ccb9beddd576ed52ec5babaa62b35cd7e2891c8d7ffb38ec752615db777cfcce81f5e8af5c7c7a56cd668d13477d752ec855fbd2967b34644558b91f7bc1ab177dfcd6eb32cbe1b78b2b4e3f0d44db5c230dcef388e376e9aeecf0cd3af05004db31fe7dc1b354de7b58929750b00e472d6e75dd7efb66d7e3e932d6e0780ecbcf180693a3daeebbfadebf6c30090cb9b11c7f1ce2e2892f53000704e35a6e99ee6dcbba6e9f6b7eee4aeb72d279f2b0ca0fb64198dbe8f07b82b0200e038bc3e1cae6806fc2a09caa2da501d63d82b84c8089faa1694075592c4f64912d34dd3dd0200a6c1c3d5e18a5622d6e879620b00a8aaa66cda146c614cfea810625b494934eeac75d2e9c269cf5362962546babba77200909a2dbe120c2959c7e6b3f1eba9b9c5ec5c00e86bbe2ff2e1aaea2900a8508231c3b01eaba820796c4c7d0b007a7ae2a38f3cd2f67d22a98631e51200d4d4d4e40b05eda9ea6aec746c7f6dfe90e9ed9d969f7df62fcb8ce2607446be70617859acbfffa674e9d2145bbebf8a4ab1587a99dd1f184848bdbd9965b163c7aeb29191ccbaae8736b0810d9439fe01a5dee729641a67f70000000049454e44ae426082),
(10, 10, '2°', '-5°', 'Neve durante a manhã e tarde.  ', 'Inverno', 'Nova', '0', NULL, NULL, NULL),
(11, 11, '2°', '-3°', 'Vento forte com chuva fraca o dia inteiro. ', 'Inverno', 'Crescente', '0', NULL, NULL, NULL),
(12, 12, '4°', '-2°', 'Chuva fraca o dia inteiro.  ', 'Inverno', 'Crescente', '0', NULL, NULL, NULL),
(13, 13, '7°', '1° ', 'Vento forte e céu limpo.  ', 'Inverno', 'Cheia', '0', NULL, NULL, NULL),
(14, 14, '10°', '    3°     ', 'Céu sem nuvens. ', 'Inverno', 'Cheia', '0', NULL, NULL, NULL),
(15, 15, '14°', '4° ', 'Céu parcialmente nublado.  ', 'Inverno', 'Minguante', '0', NULL, NULL, NULL),
(16, 16, '12°', '3° ', 'Sol entre nuvens.  ', 'Primavera', 'Minguante', '0', NULL, NULL, NULL),
(17, 17, '13°', '5° ', 'Céu aberto e noite estrelada.  ', 'Primavera', 'Nova', '0', NULL, NULL, NULL),
(18, 18, '18°', '7° ', 'Chuva fraca pela manhã. Restante do dia ensolarado.  ', 'Primavera', 'Crescente', '0', NULL, NULL, NULL),
(19, 19, '19°', '8° ', 'Céu aberto com poucas nuvens. ', 'Primavera', 'Crescente', '0', NULL, NULL, NULL),
(20, 20, '20°', '8° ', 'Céu parcialmente nublado pela manhã, sol entre nuvens a tarde. ', 'Primavera', 'Cheia', '0', NULL, NULL, NULL),
(21, 21, '21°', '9° ', 'Sol entre nuvens pela manhã, céu aberto a tarde e a noite.  ', 'Primavera', 'Cheia', '0', NULL, NULL, NULL),
(22, 22, '21°', '10° ', 'Céu aberto.  ', 'Primavera', 'Minguante', '0', NULL, NULL, NULL),
(23, 23, '20°', '9° ', 'Céu aberto e noite estrelada.  ', 'Primavera', 'Minguante', '0', NULL, NULL, NULL),
(24, 24, '19°', '7° ', 'Céu aberto e chuva fraca ao anoitecer. ', 'Primavera', 'Nova', '0', NULL, NULL, NULL),
(25, 25, '22°', '6° ', 'Céu com poucas nuvens a maior parte do dia. ', 'Primavera', 'Crescente', '0', NULL, NULL, NULL),
(26, 26, '22°', '16° ', 'Céu com poucas nuvens e chuva fraca ao fim da tarde.   ', 'Verão', 'Crescente', '0', NULL, NULL, NULL),
(27, 27, '21°', '10° ', 'Nublado pela manhã, céu limpo durante o restante do dia.  ', 'Verão', 'Cheia', '0', NULL, NULL, NULL),
(28, 28, '24°', '12° ', 'Céu aberto e sem nuvens durante o dia inteiro. Noite estrelada.  ', 'Verão', 'Cheia', '0', NULL, NULL, NULL),
(29, 29, '20°', '10° ', 'Céu aberto durante o dia, noite com nuvens.  ', 'Verão', 'Minguante', '0', NULL, NULL, NULL),
(30, 30, '23°', '15° ', 'Céu aberto durante o dia, chuva forte a noite. ', 'Verão', 'Minguante', '0', NULL, NULL, NULL),
(31, 31, '25°', '13° ', 'Céu aberto sem nuvens, noite estrelada.  ', 'Verão', 'Nova', '0', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_tempo`
--
ALTER TABLE `tb_tempo`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
