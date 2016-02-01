-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Fev-2016 às 22:03
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `etiigarassu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestrantes`
--

CREATE TABLE IF NOT EXISTS `palestrantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` varchar(4000) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ocupacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `palestrantes`
--

INSERT INTO `palestrantes` (`id`, `perfil`, `foto`, `ocupacao`) VALUES
(1, 'bla bla bla', 'Array', 'sadadasdsadsa'),
(2, 'adasdsada', 'Array', 'dsadasdsadas'),
(3, 'asdsadsadasdq', '', '21312312312'),
(4, 'asdasdasd', '', '123123'),
(5, '31312', '', '312312'),
(6, '1231231', '', '312312'),
(7, '2131231', '', '123123'),
(8, '312312312', '12312321', '12321321'),
(9, 'asdasdas', 'bla bla bla', 'dasdas'),
(10, '123123', '', '23123213'),
(11, '12321321', 'bla bla bla', '213213'),
(12, '213213123123', 'eu.gif', '32132131'),
(13, '321231231', 'IMG_20150826_092640.jpg', '2312321'),
(14, '3213123', 'IMG_20150925_222215.jpg', '231312'),
(15, '213213213', '1442762061456.jpg', '12321321'),
(16, 'sdadsada', '1442762061456.jpg', 'sadasdasdas'),
(17, '312312321', 'IMG_19700101_231307.jpg', '13123'),
(18, '1231231', 'IMG_19700101_231307.jpg', '123213'),
(19, '12312321', '1525256afbe448e9f46.26262321.jpg', '123123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nome` varchar(50) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `logradouro` varchar(80) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `complemento` varchar(8) NOT NULL,
  `instituicao` varchar(70) NOT NULL,
  `instrucao` varchar(60) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `nome`, `cpf`, `email`, `telefone`, `nascimento`, `sexo`, `cep`, `estado`, `cidade`, `bairro`, `logradouro`, `numero`, `complemento`, `instituicao`, `instrucao`, `activation_code`, `ativo`) VALUES
(31, 'entec.ifpe.igarassu@gmail.com', '$2y$10$t//ejKxETSvC3PAYdGJLR.5Lnl1f5a5H8v57tvj/duslLpVjNEJ42', 'admin', '2016-01-26 16:35:50', '2016-01-27 11:47:41', 'andre', '456123', 'entec.ifpe.igarassu@gmail.com', '132', '2004-01-26', 'M', '123', '123', '123', '132', '', '', '', '', 'medio', 'fcf4d3a25d652a48664372146c76fb9d', 1),
(32, 'strapacao@gmail.com', '$2y$10$gYRHo7E7PggdVlQJs3mKTeoPu0qKXhPvbJ6riXxih2svwQRncqYIi', 'participante', '2016-02-01 14:51:31', '2016-02-01 14:52:02', 'Alexandre', '132456489', 'strapacao@gmail.com', '32165498', '2004-02-01', 'M', '456789', '123231', '32123', '231231', '', '', '', '', 'tecnico', '99796ca92334325f9d8f8583ec7c9912', 1),
(33, 'alexandre.vianna@igarassu.ifpe.edu.br', '$2y$10$gcLK6zh0UYY7sbFxP.MOkeHxPXU30FaNUakYqJYCW6MbP0MsKmaWG', 'participante', '2016-02-01 18:46:47', NULL, 'jknjknjknkj', '978678', 'alexandre.vianna@igarassu.ifpe.edu.br', '66786876', '2004-02-01', 'F', '12312312', '1231243', '123123', '123124', '', '', '', '', 'medio', 'dbbcb97ec49d98e382d12cb6420d9303', 0),
(34, 'asdsad@sdkadak.com', '$2y$10$IuaIl7DmIWKastG0IcW5qu5Favo64.85LWDw94..7IapHaxj9/JcC', 'participante', '2016-02-01 18:51:23', NULL, '312312', '1231231', 'asdsad@sdkadak.com', '', '2004-02-01', 'M', '12312321', '12312321', '12321321', '21321321', '', '', '', '', 'superior', 'cdb931c2c1df3404f7ef8d091ee7848b', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
