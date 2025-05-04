-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: fuyumangas
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `colecao`
--

DROP TABLE IF EXISTS `colecao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colecao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci,
  `data_lancamento` date DEFAULT NULL,
  `data_encerramento` date DEFAULT NULL,
  `status` enum('ativa','finalizada','hiato') COLLATE utf8mb4_general_ci DEFAULT 'ativa',
  `slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colecao`
--

LOCK TABLES `colecao` WRITE;
/*!40000 ALTER TABLE `colecao` DISABLE KEYS */;
INSERT INTO `colecao` VALUES (1,'Initial D','Takumi Fujiwara parece só um entregador de tofu… até entrar no volante. Nas montanhas de Akina, ele se torna uma lenda do drift, enfrentando pilotos ferozes em batalhas noturnas de tirar o fôlego.','1995-07-17','2013-06-29','finalizada','initial-d'),(2,'Chainsaw Man','Em um mundo onde demônios nascem dos medos humanos, Denji — um caçador de demônios falido — renasce com uma motosserra no peito e um destino sangrento nas mãos. Violento, caótico e surpreendentemente emotivo.','2018-12-03',NULL,'ativa','chainsaw-man'),(3,'Kaiju N.° 8','Em um Japão assolado por monstros gigantes chamados kaijus, uma força especial luta para proteger a humanidade. Com trajes feitos dos próprios inimigos, heróis enfrentam ameaças colossais — e Kafka Hibino está prestes a mudar tudo.','2020-07-03',NULL,'ativa','kaiju-n-8'),(4,'One-Punch Man','Saitama é um herói tão poderoso que derrota qualquer inimigo com um único soco... e está entediado com isso. Uma comédia épica que mistura ação explosiva com crises existenciais hilárias.','2012-06-14',NULL,'ativa','one-punch-man'),(5,'Miss Kobayashi\'s Dragon Maid','A vida da programadora Kobayashi vira de cabeça pra baixo quando uma dragão mágica decide virar sua empregada... e também sua nova família. Uma comédia adorável sobre convivência, magia e afeto improvável.','2013-05-25',NULL,'ativa','miss-kobayashis-dragon-maid'),(6,'Nichijou','O cotidiano nunca foi tão absurdo! Em um mundo onde o inesperado é rotina, três garotas vivem situações hilárias, surreais e maravilhosamente sem sentido — tudo com um toque caótico de fofura.','2007-07-26',NULL,'hiato','nichijou');
/*!40000 ALTER TABLE `colecao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-03 22:33:44
