-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2016 às 22:15
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
(2, 'Palestra', 'zdsadas', 'asdasdads', 33, '0000-00-00 00:00:00', '', '00:00:00'),
(3, 'Minicurso', 'dsadasdsa', 'adsasdas', 33, '0000-00-00 00:00:00', '', '00:00:00'),
(4, 'Palestra', 'CSS + HTML5', 'Palestra muito interessante', 33, '0000-00-00 00:00:00', '', '00:00:00'),
(5, 'Oficina', 'JavaScript', 'java script para leigos', 33, '2016-02-23 04:18:00', 'Auditório', '00:00:00');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','participante','supervisor','palestrante') NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` enum('Masculino','Feminino') NOT NULL,
  `cep` varchar(10) NOT NULL,
  `estado` enum('Acre','Alagoas','Amapá','Amazonas','Bahia','Ceará','Distrito Federal','Espírito Santo','Goiás','Maranhão','Mato Grosso','Mato Grosso do Sul','Minas Gerais','Pará','Paraíba','Paraná','Pernambuco','Piauí','Rio de Janeiro','Rio Grande do Norte','Rio Grande do Sul','Rondônia','Roraima','Santa Catarina','São Paulo','Sergipe','Tocantins') NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `logradouro` varchar(80) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `complemento` varchar(8) NOT NULL,
  `instituicao` varchar(70) NOT NULL,
  `instrucao` enum('Fundamental Incompleto','Fundamental Completo','Médio Incompleto','Médio Completo','Técnico Incompleto','Técnico Completo','Superior Incompleto','Superior Completo','Mestrado Incompleto','Mestrado Completo','Doutorado Incompleto','Doutorado Completo') NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `nome`, `email`, `telefone`, `nascimento`, `sexo`, `cep`, `estado`, `cidade`, `bairro`, `logradouro`, `numero`, `complemento`, `instituicao`, `instrucao`, `activation_code`, `ativo`) VALUES
(38, 'strapacao@gmail.com', '$2y$10$GTLvTtF.t0O4Lxf6cgIaIORqiw7LTHwlh8mm8CuwMZX8Gug5UR/QC', 'participante', '2016-02-23 19:34:08', '2016-02-23 20:03:07', 'Alexandre Strapação Guedes Vianna', 'strapacao@gmail.com', '88999999999', '1986-12-28', 'Masculino', '58045550', 'Paraíba', 'JOÃO PESSOA', 'Ponta do Seixas', 'AVENIDA DA FALESIA', '261', '', 'IFPE', 'Mestrado Completo', 'f8172ca17ec192d260f68234681e3a11', 1),
(39, 'entec.ifpe.igarassu@gmail.com', '$2y$10$wAwL3za3jlMKvPYYlvX8LO8wyKZg8ZZ4mLnQDxb1eeCKc3esfE8mm', 'admin', NULL, NULL, 'admin', 'entec.ifpe.igarassu@gmail.com', '', '2006-02-23', 'Feminino', '58045550', 'Pernambuco', 'Igarassu', 'Centro', '', '', '', 'IFPE', 'Técnico Completo', 'ddc56937c7ba1e8abbc7b435f5bdf7bd', 1);

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
