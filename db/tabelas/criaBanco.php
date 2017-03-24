<?php
    $filename='d20.sql';
    $mode='w+';
    $handle=fopen($filename, $mode);
    $tabela1='personagem';
    $tabela2='mapas';
    $texto='SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `d20` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE IF NOT EXISTS `d20` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `d20`;
CREATE TABLE IF NOT EXISTS `'.$tabela1.'` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NULL,
  `personagem` varchar(100) NULL,
  `raca` varchar(100) NULL,
  `classe` varchar(100) NULL,
  `tendencia1` varchar(50) NULL,
  `tendencia2` varchar(50) NULL,
  `idade` varchar(10) NULL,
  `tabela` varchar(10) NULL,
  `criado` varchar(50) NULL,
  `modificado` varchar(50) NULL,
  `excluido` INT(1) NOT NULL DEFAULT \'0\',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
    $texto .= "\r\n"."CREATE TABLE IF NOT EXISTS `".$tabela2."` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `mes` INT(2) NULL , `dt` DATE NULL , `descricao` TEXT NULL , `entrada` DECIMAL(12,2) NULL , `saida` DECIMAL(12,2) NULL , `diz_ofe` ENUM('diz','ofe') NULL , `criado` varchar(50) NULL , `modificado` varchar(50) NULL , `excluido` INT(1) NOT NULL DEFAULT '0', PRIMARY KEY (`id`)) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";    
    fwrite($handle, $texto); 
    fclose($handle);
?>