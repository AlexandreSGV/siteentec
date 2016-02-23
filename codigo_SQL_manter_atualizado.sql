-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2016 às 05:50
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
-- Estrutura da tabela `atividades`
--

CREATE TABLE IF NOT EXISTS `atividades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` enum('Palestra','Minicurso','Oficina') NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `id_palestrante` int(10) NOT NULL,
  `horario` datetime NOT NULL,
  `local` varchar(45) NOT NULL,
  `horariofim` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_atividade_palestrante_id_idx` (`id_palestrante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id`, `tipo`, `titulo`, `descricao`, `id_palestrante`, `horario`, `local`, `horariofim`) VALUES
(2, 'Palestra', 'zdsadas', 'asdasdads', 0, '0000-00-00 00:00:00', '', '00:00:00'),
(3, 'Minicurso', 'dsadasdsa', 'adsasdas', 33, '0000-00-00 00:00:00', '', '00:00:00'),
(4, 'Palestra', 'CSS + HTML5', 'Palestra muito interessante', 34, '0000-00-00 00:00:00', '', '00:00:00'),
(5, 'Oficina', 'JavaScript', 'java script para leigos', 34, '2016-02-23 04:18:00', 'Auditório', '00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestrantes`
--

CREATE TABLE IF NOT EXISTS `palestrantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` varchar(4000) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ocupacao` varchar(100) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_palestrantes_user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `palestrantes`
--

INSERT INTO `palestrantes` (`id`, `perfil`, `foto`, `ocupacao`, `user_id`) VALUES
(33, 'asdasd', 'dasdas', 'adsad', 31),
(34, 'Alexandre é um professor teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste ....', '2212256cb993799cfe6.60771999.png', 'Professor do IFPE', 36);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `nome`, `cpf`, `email`, `telefone`, `nascimento`, `sexo`, `cep`, `estado`, `cidade`, `bairro`, `logradouro`, `numero`, `complemento`, `instituicao`, `instrucao`, `activation_code`, `ativo`) VALUES
(31, 'entec.ifpe.igarassu@gmail.com', '$2y$10$t//ejKxETSvC3PAYdGJLR.5Lnl1f5a5H8v57tvj/duslLpVjNEJ42', 'admin', '2016-01-26 16:35:50', '2016-01-27 11:47:41', 'andre', '456123', 'entec.ifpe.igarassu@gmail.com', '132', '2004-01-26', 'M', '123', '123', '123', '132', '', '', '', '', 'medio', 'fcf4d3a25d652a48664372146c76fb9d', 1),
(33, 'alexandre.vianna@igarassu.ifpe.edu.br', '$2y$10$gcLK6zh0UYY7sbFxP.MOkeHxPXU30FaNUakYqJYCW6MbP0MsKmaWG', 'participante', '2016-02-01 18:46:47', NULL, 'jknjknjknkj', '978678', 'alexandre.vianna@igarassu.ifpe.edu.br', '66786876', '2004-02-01', 'F', '12312312', '1231243', '123123', '123124', '', '', '', '', 'medio', 'dbbcb97ec49d98e382d12cb6420d9303', 0),
(34, 'asdsad@sdkadak.com', '$2y$10$IuaIl7DmIWKastG0IcW5qu5Favo64.85LWDw94..7IapHaxj9/JcC', 'participante', '2016-02-01 18:51:23', NULL, '312312', '1231231', 'asdsad@sdkadak.com', '', '2004-02-01', 'M', '12312321', '12312321', '12321321', '21321321', '', '', '', '', 'superior', 'cdb931c2c1df3404f7ef8d091ee7848b', 0),
(36, 'strapacao@gmail.com', '123', 'participante', '2016-02-22 19:40:58', '2016-02-22 20:32:48', 'Alexandre Strapação Guedes Vianna', '123123123', 'strapacao@gmail.com', '123', '2003-04-28', 'M', '58045550', 'PB', 'João Pessoa', 'Seixas', '123', '123', 'asdasd', 'asdasd', 'tecnico', '03056d3da33a9b17535f9a36e3017477', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `palestrantes`
--
ALTER TABLE `palestrantes`
  ADD CONSTRAINT `fk_palestrantes_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
