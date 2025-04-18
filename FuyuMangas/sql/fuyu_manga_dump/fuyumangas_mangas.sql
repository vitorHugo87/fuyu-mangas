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
-- Table structure for table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mangas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `editora` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paginas` int DEFAULT NULL,
  `descricao` text COLLATE utf8mb4_general_ci,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int DEFAULT '0',
  `imagem` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_publicacao` date DEFAULT NULL,
  `ativo` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mangas`
--

LOCK TABLES `mangas` WRITE;
/*!40000 ALTER TABLE `mangas` DISABLE KEYS */;
INSERT INTO `mangas` VALUES (1,'Initial D - Vol. 1','Shuichi Shigeno','Panini',448,'Takumi Fujiwara é filho do dono de uma loja de tofu, e não sabe quase nada sobre carros. Certo dia, ele vai assistir a uma corrida dos Akina SpeedStars, o time de corredores de Iketani, seu veterano no trabalho, acompanhado de Itsuki, seu melhor amigo. Então, o Akagi RedSuns, time liderado pelos irmãos Takahashi e considerado o mais rápido de Akagi, aparece e desafia os Akina SpeedStars para uma corrida! É aqui que a lenda começa.',69.90,50,'img/capas/capa_67fc09d18c86b2.44113945.jpg','2024-12-06',1),(2,'Initial D - Vol. 2','Shuichi Shigeno','Panini',448,'A batalha na descida entre Takumi e Nakazato, dos Myogi NightKids, que Itsuki aceitou por conta própria, começou!! Os irmãos Takahashi saem atrás deles, para ver de perto o desfecho da corrida, e o Oito-meia pouco a pouco vai sendo deixado para trás pelo GT-R de Nakazato, com sua potência estrondosa. Mas Takumi, sem perder a calma, dá início a uma perseguição impressionante à medida que a descida fica mais íngreme!!',74.90,75,'img/capas/capa_67fc0ba3879208.35853734.jpg','2025-02-28',1),(3,'Initial D - Vol. 3','Shuichi Shigeno','Panini',448,'Takumi foi desafiado pelo rei das ruas da região de Gunma, Ryosuke Takahashi!! Ryosuke estudou a forma de Takumi de correr, e configurou seu carro especialmente para a descida, deixando ele perfeitamente balanceado, e mostra confiança absoluta em relação a esta disputa. Em meio à atenção do público enorme que se reúne, a batalha decisiva da descida do Monte Akina finalmente começa!!',74.90,92,'img/capas/capa_67fc0e06d73d13.06107131.jpg','2025-02-07',1),(4,'Chainsaw Man - Vol. 1','Tatsuki Fujimoto','Panini',192,'Denji é um jovem extremamente pobre que junto de Pochita, seu demônio de estimação, trabalha feito um condenado como Caçador de Demônios para pagar a imensa dívida que possui. Mas sua vida de miséria está prestes a mudar graças a uma traição brutal!! Aqui começa a história de um novo anti-herói que com um demônio em seu corpo, caça demônios!!',36.90,45,'img/capas/capa_67fc401fab5f03.22531162.jpg','2024-03-01',1),(5,'Chainsaw Man - Vol. 2','Tatsuki Fujimoto','Panini',192,'Motivado por um desejo avassalador, Denji encara o Demônio dos Morcegos em uma batalha mortal!! Será que ele conseguirá alcançar seu objetivo no fim?! Ou então...?! E quem é o Demônio das Armas de Fogo, o inimigo da humanidade de que Makima falou?! A luta de Denji, o cãozinho da Segurança Pública, ruma para novos desdobramentos!!',36.90,63,'img/capas/capa_67fc4fa36f2da7.20231290.jpg','2023-11-01',1),(6,'Kaiju N.° 8 - Vol. 1','Naoya Matsumoto','Panini',212,'O Japão é o lugar com o maior índice de aparição de monstros no mundo, sofrendo invasões todos os dias. No passado, Kafka Hibino almejava fazer parte das Forças de Defesa, mas atualmente trabalha para uma empresa especializada na limpeza dos resquícios das batalhas travadas com os monstros. Certo dia, o rapaz tem seu corpo transformado por uma criatura misteriosa e recebe o codinome ´Kaiju no. 8´ das Forças de Defesa do Japão, a organização responsável por subjugar os monstros!!',34.90,79,'img/capas/capa_67fc52f6893049.72780261.jpg','2024-12-01',1);
/*!40000 ALTER TABLE `mangas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-13 21:16:08
