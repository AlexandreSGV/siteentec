-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Dez-2015 às 15:24
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `entecdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `created`, `modified`, `user_id`) VALUES
(1, 'The title', 'This is the article body. muito chato', '2015-09-14 15:09:17', '2015-09-14 18:49:28', 1),
(2, 'A title once again', 'And the article body follows.', '2015-09-14 15:09:17', NULL, 1),
(4, 'Teste', 'Artigo legal', '2015-09-14 18:49:15', '2015-09-14 18:49:15', 2),
(5, 'sada', 'dasd', '2015-09-14 21:18:04', '2015-09-14 21:18:04', 3),
(6, 'Souuuu', 'Aeee', '2015-09-14 21:26:37', '2015-09-14 21:26:37', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`,`email`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `cpf`, `email`, `telefone`, `nascimento`, `sexo`, `cep`, `estado`, `cidade`, `bairro`, `logradouro`, `numero`, `complemento`, `instituicao`, `instrucao`, `created`, `modified`, `role`, `password`, `username`) VALUES
(6, '', '', 'alex@gmail.com', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 'medio', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'participante', '$2y$10$mPRL/DObgpKqYOERmzL/jOF037gk6z2cAJfJqSY.T74Aq2gKKPI/a', 'alex@gmail.com'),
(8, '', '', 'alex@gmail.com2', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 'medio', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'participante', '$2y$10$I6SPgRsZgC5btUL5MPLYRe8VIArUM1uyLC1XH0roVGcDiASwGw9ze', 'alex@gmail.com2'),
(10, 'Alexandre Strapação Guedes Vianna', '123456789', 'asd@sada.com', '123', '2003-09-16', 'F', '654321', 'asd', 'as', 'as', 'sada', '12', '123', 'ifpe', 'medio', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'participante', '$2y$10$15UeH.ycmj1HULMibXgjDOFlnlCyYgs4YC8QA57.OB0et9U0wo4Ce', 'asd@sada.com'),
(11, 'Alexandre Strapação Guedes Vianna', '213', '123123@asdas.com', '', '2003-09-19', 'F', '13', '123', '123', '123', '', '', '', '', 'medio', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'participante', '$2y$10$rMsSLJijkiBGPBWgjdu0BOaxeKcuMuoIJtk9Q7d.4kTDzQML5ac9.', '123123@asdas.com'),
(12, 'Alexandre Teste', '38172839217', 'strap@gmail.com', '29018309218', '2000-12-16', 'M', '5804550', 'Paraiva', 'João pessoa', 'Seixas', '', '', '', 'sdasdsa', 'medio', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'participante', '$2y$10$dYd1AgA/MVe7P0UyJ/IB5u2UfVzQDC1p7LUud4j/G4072ZnY9bBwe', 'strap@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
