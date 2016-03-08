-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: etiigarassu
-- ------------------------------------------------------
-- Server version	5.5.47-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atividades`
--

DROP TABLE IF EXISTS `atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades` (
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades`
--

LOCK TABLES `atividades` WRITE;
/*!40000 ALTER TABLE `atividades` DISABLE KEYS */;
INSERT INTO `atividades` VALUES (2,'Palestra','zdsadas','asdasdads',33,'0000-00-00 00:00:00','','00:00:00'),(3,'Minicurso','dsadasdsa','adsasdas',33,'0000-00-00 00:00:00','','00:00:00'),(4,'Palestra','CSS + HTML5','Palestra muito interessante',33,'0000-00-00 00:00:00','','00:00:00'),(5,'Oficina','JavaScript','java script para leigos',33,'2016-02-23 04:18:00','Auditório','00:00:00');
/*!40000 ALTER TABLE `atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `palestrantes`
--

DROP TABLE IF EXISTS `palestrantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `palestrantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` varchar(4000) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ocupacao` varchar(100) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_palestrantes_user_id_idx` (`user_id`),
  CONSTRAINT `fk_palestrantes_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `palestrantes`
--

LOCK TABLES `palestrantes` WRITE;
/*!40000 ALTER TABLE `palestrantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `palestrantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (39,'entec.ifpe.igarassu@gmail.com','$2y$10$wAwL3za3jlMKvPYYlvX8LO8wyKZg8ZZ4mLnQDxb1eeCKc3esfE8mm','admin','2016-02-23 21:27:16','2016-02-24 00:50:25','admin','entec.ifpe.igarassu@gmail.com','','2006-02-23','Feminino','58045550','Pernambuco','Igarassu','Centro','','','','IFPE2','Técnico Completo','ddc56937c7ba1e8abbc7b435f5bdf7bd',1),(44,'alexandre.vianna@igarassu.ifpe.edu.br','$2y$10$x.1yjjTrxNu100N0PDww/.9vMVxX/62HwX6aHJW.Nmc1XGjSawlYa','admin','2016-03-03 22:25:42','2016-03-07 19:55:46','Alexandre Strapação Guedes Vianna','alexandre.vianna@igarassu.ifpe.edu.br','83996992741','1986-12-28','Masculino','58045550','Paraíba','JOÃO PESSOA','Seixas','AVENIDA DA FALESIA','261','','IFPE','Mestrado Completo','a247165284216f5dc496df4c4290971a',1),(45,'evertonpkmntr@gmail.com','$2y$10$G2Uu5RyRlpjc6A2t0uveaOMrkhD5lGgnO1.B1yV0kUrugw76u0tWG','participante','2016-03-04 11:40:30','2016-03-04 11:40:30','Everton Machado Soares','evertonpkmntr@gmail.com','81992096533','1995-12-25','Masculino','53635520','Pernambuco','Igarassu','Cruz de Rebouças','Rua joão leite Nougueira paz','12','','IFPE','Técnico Incompleto','03024726bc73a2e03207cd6b41ad9926',1),(46,'jhonatansatiro@gmail.com','$2y$10$u97ncrJIwX2BBMXVHQptgOrmtENNHrYHSLOk669KKMBlBy5rcweWi','participante','2016-03-04 11:46:55','2016-03-04 11:46:55','Jhonatan José dos Santos Sátiro','jhonatansatiro@gmail.com','','1994-10-06','Masculino','53620687','Pernambuco','Igarassu','Posto do monta','Rua três','73','Históric','IFPE','Técnico Incompleto','876a8ecffc7e44d1a121362d95c9f7bc',1),(47,'gleibsonytalo12@gmail.com','$2y$10$lJRzLZm/cpFB2gpY0BeGze3v1wP5MOeJITXoxj/88a7jQ2xNCYxLi','participante','2016-03-04 12:06:45','2016-03-04 12:06:45','Gleibson Ytallo','gleibsonytalo12@gmail.com','8183056641','1996-11-09','Masculino','53580590','Pernambuco','Abreu e Lima','Fosfato','Alto jose bonifacil','236','','Instituto Federal de Pernambuco','Técnico Incompleto','b9d2fdcf947d986691cf382991595036',1),(48,'santosdulcineide@gmail.com','$2y$10$3I2DBF/gZ0KP8CBV7Tc5W.hCpXokF4dgJYEoqQrld8gUH9cWfeyGC','participante','2016-03-04 12:08:22','2016-03-04 12:08:22','Dulcineide Monteiro dos Santos','santosdulcineide@gmail.com','92224472','1992-06-12','Feminino','53610-270','Pernambuco','Igarassu','Centro','Av. Santina Gomes de Andrade','501','','IFPE','Técnico Incompleto','cf2bcac0991d6d31fa6257b14e2aa15f',1),(49,'nininho67@gmail.com','$2y$10$.ijC85GMkvtVE23qMD6KvOALf8aAT2PzgtqAk4.JQNmCS8mNcEUcK','participante','2016-03-04 12:09:14','2016-03-04 12:09:14','Adauto Pereira dos Santos Júnior','nininho67@gmail.com','993665054','1997-05-13','Masculino','53625-222','Pernambuco','Igarassu','Cruz de Rebouças','Rua Jacob Pinto de Freitas','367','','Instituto Federal de Pernambuco, Campus Igarassu','Técnico Incompleto','8f93e2b3c74cd55268895b4dfcb3216f',1),(50,'flavianavarino@gmail.com','$2y$10$8n.MMQQLwsDu1LN4anlKzOGhfQQ3LM9G3Zaq2K1eXN1VuPuuxtGha','participante','2016-03-04 12:09:18','2016-03-04 12:09:18','Flaviana varino Cavalcanti','flavianavarino@gmail.com','91796295','1997-05-30','Feminino','53650-805','Pernambuco','Igarassu','Alto do céu','governador valadares','260','casa','IFPE','Técnico Incompleto','107107f7ae429d8fedfc8d740b491627',1),(51,'anabia01.f@gmail.com','$2y$10$GHUz7piaTT8XsuwRlrxc.ewqaGSjeLk31BjaDB4f5o.kFngJh9AEm','participante','2016-03-04 12:09:35','2016-03-04 12:16:35','Ana Beatriz Ferreira','anabia01.f@gmail.com','8173000862','1997-10-01','Feminino','53900000','Pernambuco','Ilha de Itamaracá','Jaguaribe','Rua Deodato Vieira de Carvalho','279','A','Instituto Federal de Pernambuco-Campus Igarassu','Técnico Incompleto','b3af3e303390628b9e55af8ddbd3f4cd',1),(52,'bruno.net12@hotmail.com','$2y$10$gLYTW2N8ECGAUQiM5HBkkOfuukGaaRsA2nvjNvFEjqldVF.cA6gQ.','participante','2016-03-04 12:10:23','2016-03-04 12:17:23','Bruno Mendes','bruno.net12@hotmail.com','985852694','1996-08-05','Masculino','53620200','Pernambuco','Igarassu','Cruz de Rebolças','Loteamento encanto Igarassu avenida: Brasil ','16','','IFPE - Campus Igarassu','Técnico Incompleto','92c4a3c2563087c1ce5a3b5cb58325b3',1),(53,'joaoperreira026@gmail.com','$2y$10$rvKxQ9BYJVJDvwMdu8V4neu2D8ffUVHGOModGjIOa1QJuRAlpr/xW','participante','2016-03-04 12:11:49','2016-03-04 12:17:52','João Paulo Pereira da Silva','joaoperreira026@gmail.com','(81)9865604','1996-11-04','Masculino','53500-000','Pernambuco','Abreu e Lima','Matinha','Manoel de Santana      (Com.josefa do carmo   Bloco-02   APartamento-105 )',' 22','apt','IFPE','Técnico Incompleto','225b553735abc4b556e6dcfcea930846',1),(54,'ellaine.dayane@hotmail.com','$2y$10$GJ6oMCucJqQSbafg4nikDOZDPgJDLw5Pv5LYJUD2lktZRACDczAlW','participante','2016-03-04 13:10:22','2016-03-04 13:10:22','Ellaine Dayane de Souza Barros','ellaine.dayane@hotmail.com','','1996-07-04','Feminino','53650617','Pernambuco','Igarassu','Vila Rural','','','','IFPE','Técnico Incompleto','91992c15bc5930e6fcb38c68e4438505',1),(55,'bertonnipaz@gmail.com','$2y$10$/fA99vXWKgka8KiMuDiLYeTIPyDxuvKL/4owM79fKekj3RrVOrPsS','participante','2016-03-04 14:56:13','2016-03-04 14:56:13','Bertonni Thiago de Souza Paz','bertonnipaz@gmail.com','81987330562','1986-11-08','Masculino','53620787','Pernambuco','Igarassu','Cruz de Rebouças','Rua Jose Rodrigues De Araújo','62','Casa','IFPE','Técnico Incompleto','c40a8bc4da86fe1146dc9296ef7b844c',1),(56,'obede.silva3@gmail.com','$2y$10$tK50tqzbERmCwxikjbVAD.85mgPZ/Y300cqsys0fC.gND35izW9UG','participante','2016-03-04 23:02:10','2016-03-04 23:02:10','OBEDE OLIVEIRA DA SILVA','obede.silva3@gmail.com','973460307','1996-09-08','Masculino','53625-015','Pernambuco','IGARASSU','CRUZ DE REBOUCAS','AV BARÃO DE VERA CRUZ','425','','IFPE campus Igarassu','Médio Completo','d9d22f0d58782bdbee114aab553eacbd',1),(57,'Gabrielbevenutoi7@gmail.com','$2y$10$H043v1qSLQ12vl5iPekRXOvxLyv8nxXBRSD62zup51K7IvBefhNFm','participante','2016-03-05 15:26:49','2016-03-05 15:26:49','Gabriel Bevenuto da Silva Neto','Gabrielbevenutoi7@gmail.com','81997726755','1995-03-06','Masculino','53630-152','Pernambuco','Igarassu','ANA DE ALBUQUERQUE','pernambuco','97','','Instituto Federal de pernambuco Campus Igarassu','Técnico Incompleto','257789df8f34ead129c44dda9320e8c1',1),(58,'ramon.farias@igarassu.ifpe.edu.br','$2y$10$rPxG64hPlft5u6NgCW6UWutsutf2AfsRoisX1hQKv/ZeKzfF4Lksy','admin','2016-03-06 00:58:11','2016-03-07 17:27:54','Ramon Mota de Souza Farias','ramon.farias@igarassu.ifpe.edu.br','83988868249','1984-11-06','Masculino','58051060','Paraíba','João Pessoa','Bancários','Rua Manoel Firmino do Nascimento','57','','Instituto Federal de Pernambuco','Superior Completo','805693d47671be2082eec9d4382d0eed',1),(59,'odinmiguel97@gmail.com','$2y$10$G3TQ3I4svblx4Lm3gW/4mu.NBFsJ0J1w/hcGiKUnf7Auul61ZdFay','participante','2016-03-07 15:22:08','2016-03-07 15:22:08','odin miguel dos santos oliveira','odinmiguel97@gmail.com','989910114','1997-10-20','Masculino','5390000','Pernambuco','ilha de itamaracá','quatro cantos','África do sul','01','','Instituto Federal de Pernambuco - campus igarassu','Técnico Incompleto','f092865f730a293203e357e2e063d51b',1),(60,'allyson1040@gmail.com','$2y$10$fzmPWe/YXZ7zHhDT2fo2Fu8hiKX3Ezr9zpmwXvSmIQdTuYgVmUhwu','participante','2016-03-07 15:38:15','2016-03-07 15:38:15','Allyson nyerton carlos da silva','allyson1040@gmail.com','996058119','1995-04-21','Masculino','5369000','Pernambuco','Araçoiaba','centro','Rua joão josé de freitas','13','','Instituto Federal de Pernambuco','Técnico Incompleto','3a63df2afbf7f054e535d0fbcce74e9e',1),(61,'yadson20@gmail.com','$2y$10$RbGQm3LhoBZJ.dg1Irn0cek1U7Qwmvn7Eed.jeRkMyz4cMRUmbtWW','participante','2016-03-07 17:58:51','2016-03-07 17:58:51','Yadson Matheus Ribeiro de Paula Albuquerque','yadson20@gmail.com','83435908','1998-03-27','Masculino','53610-213','Pernambuco','Igarassu','Centro','Barbosa Lima','154','Casa','Instituto Federal de Pernambuco - Campus Igarassu','Médio Completo','97b2bc82cab400175077c0671222639b',1),(62,'magaly_feitosa_andrade@hotmail.com','$2y$10$1hdhwY8gIG7y3DQNlZlsfOg7getZg2nUGo4DLQMeiMUxpPXwnimVm','participante','2016-03-07 21:26:25','2016-03-07 21:26:25','Rebeca Feitosa Botêlho de Andrade','magaly_feitosa_andrade@hotmail.com','982321370','1999-05-31','Feminino','53900000','Pernambuco','Ilha de Itamaracá','Forno da Cal','Rod PE 001','150','','EREM Alberto Augusto de Morais Pradines','Médio Incompleto','d3fb099a095d68a02e38991b67c94e8b',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-07 20:42:33
