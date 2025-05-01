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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (4,'Ação','Lutas intensas, batalhas e adrenalina pura.'),(5,'Aventura','Viagens épicas e descobertas incríveis.'),(6,'Comédia','Situações engraçadas e momentos divertidos.'),(7,'Drama','Histórias emocionantes e cheias de sentimentos.'),(8,'Fantasia','Mundos mágicos e criaturas encantadas.'),(9,'Romance','Amores doces, encontros e corações acelerados.'),(10,'Slice of Life','O cotidiano de personagens comuns, com charme.'),(11,'Escolar','A vida de estudantes e seus desafios.'),(12,'Esporte','Competição, trabalho em equipe e superação.'),(13,'Sobrenatural','Fantasmas, espíritos e fenômenos misteriosos.'),(14,'Horror','Suspense, medo e coisas de arrepiar.'),(15,'Mistério','Investigações, segredos e revelações.'),(16,'Psicológico','Tramas complexas e mente humana em foco.'),(17,'Ficção Científica','Tecnologia futurista e universos paralelos.'),(18,'Shounen','Ação e aventura para o público jovem masculino.'),(19,'Shoujo','Romance e fantasia voltados ao público feminino.'),(20,'Seinen','Temas maduros e complexos para adultos.'),(21,'Josei','Romances realistas voltados para mulheres adultas.'),(22,'Yaoi (BL)','Romances entre garotos, com muito carinho.'),(23,'Yuri (GL)','Romances entre garotas, cheios de ternura.'),(24,'Mecha','Robôs gigantes e batalhas tecnológicas.'),(25,'Histórico','Tramas em épocas passadas e cenários clássicos.'),(26,'Guerra','Conflitos armados e dramas militares.'),(27,'Música','Tramas com bandas, idols e muito ritmo.'),(28,'Paródia','Zoeira e sátiras de outros gêneros.'),(29,'Vampiros','Criaturas da noite, charme e perigo.'),(30,'Demônios','Seres infernais e mundos sombrios.'),(31,'Magia','Feiticeiros, feitiços e poderes místicos.'),(32,'Vida após a morte','Explorações do além e reencarnações.'),(33,'Isekai','Personagens transportados para outro mundo.'),(34,'Corrida','Competições de velocidade, veículos velozes e adrenalina em alta octanagem.'),(35,'Super-Herói','Poderes extraordinários, identidades secretas e a eterna luta entre o bem e o mal.');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-01 20:28:49
