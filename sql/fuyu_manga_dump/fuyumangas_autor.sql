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
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `biografia` text COLLATE utf8mb4_general_ci,
  `pais_origem` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pais_origem_flag_svg` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `slug` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `redes_sociais` json DEFAULT NULL,
  `foto_perfil` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Shuichi Shigeno','Shuichi Shigeno (しげの 秀一) é um mangaká japonês nascido em 8 de março de 1958, em Matsunoyama, Niigata. Apaixonado por velocidade desde jovem, estreou com Bari Bari Densetsu em 1983, obra que lhe rendeu o Prêmio Kodansha de Mangá em 1985. Seu maior sucesso veio com Initial D (1995–2013), série que revolucionou os mangás de corrida e gerou diversas adaptações em anime e live-action. Em 2017, lançou MF Ghost, sequência espiritual de Initial D, concluída em fevereiro de 2025. Além de suas criações, Shigeno é conhecido por possuir carros icônicos como o Toyota AE86, refletindo sua paixão por automobilismo.','Japan','https://flagcdn.com/jp.svg','1983-03-08','shuichi-shigeno','{\"x\": \"\", \"site\": \"\", \"instagram\": \"\"}','img/autores_pfps/autor_1650493049_3c23b2e98c.webp'),(2,'Tatsuki Fujimoto','Tatsuki Fujimoto (藤本タツキ) é um mangaká japonês nascido em 10 de outubro de 1992 ou 1993, em Nikaho, Prefeitura de Akita. Formado em pintura ocidental pela Universidade de Arte e Design de Tohoku em 2014, Fujimoto é conhecido por sua abordagem única e imprevisível na narrativa. Ele ganhou destaque com Fire Punch (2016–2018) e consolidou seu sucesso com Chainsaw Man, cuja primeira parte foi publicada na Weekly Shōnen Jump (2018–2020) e a segunda parte iniciou na Shōnen Jump+ em 2022. Além disso, lançou os one-shots Look Back e Goodbye, Eri, ambos aclamados pela crítica. Fujimoto é vencedor do Prêmio Shogakukan de Mangá (2021) e do Harvey Awards por três anos consecutivos (2021–2023).\r ','Japan','https://flagcdn.com/jp.svg','1992-10-10','tatsuki-fujimoto','{\"x\": \"\", \"site\": \"\", \"instagram\": \"\"}','img/autores_pfps/autor_5674839291_5c12b4e99c.webp'),(3,'Naoya Matsumoto','Naoya Matsumoto (松本直也) é um mangaká japonês nascido em 2 de maio de 1982, na Prefeitura de Hyōgo. Iniciou sua carreira com Nekowappa! (2009–2010) e Pochi Kuro (2014–2015), mas foi com Kaiju No. 8 (2020–presente) que alcançou reconhecimento internacional. A série, publicada na plataforma Shōnen Jump+, conquistou mais de 18 milhões de cópias em circulação até março de 2025 e recebeu uma adaptação em anime pela Production I.G em 2024, com a segunda temporada prevista para julho de 2025. Inspirado por obras tokusatsu como Ultraseven e Shin Godzilla, Matsumoto criou uma narrativa que mescla ação e drama, refletindo suas próprias experiências e desafios na indústria de mangás. Além disso, ele atuou como jurado em premiações para novos talentos, contribuindo para o futuro da arte sequencial.','Japan','https://flagcdn.com/jp.svg','1982-05-02','naoya-matsumoto','{\"x\": \"\", \"site\": \"\", \"instagram\": \"https://www.instagram.com/naoyamatsumoto_official/\"}','img/autores_pfps/autor_2591039429_1c00b2e93c.webp'),(4,'One','ONE (ワン), nascido em 29 de outubro de 1986 na Prefeitura de Niigata, Japão, é o pseudônimo de um mangaká japonês conhecido por criar as séries One-Punch Man e Mob Psycho 100. Ele começou sua carreira publicando One-Punch Man como um webcomic em 2009, que posteriormente ganhou uma versão ilustrada por Yusuke Murata, publicada na Weekly Young Jump. Mob Psycho 100 foi serializado na plataforma online Ura Sunday de 2012 a 2017. Em 2022, ONE lançou a série Versus, em colaboração com o artista Kyōtarō Azuma. Seus trabalhos são reconhecidos por misturar humor, ação e críticas sociais, conquistando fãs ao redor do mundo.','Japan','https://flagcdn.com/jp.svg','1986-10-29','one','{\"x\": \"\", \"site\": \"\", \"instagram\": \"\"}','img/autores_pfps/autor_9583729031_0c92b9e12c.webp'),(5,'Coolkyousinnjya','Coolkyousinnjya (クール教信者) é um mangaká japonês conhecido por obras como Miss Kobayashi\'s Dragon Maid, I Can\'t Understand What My Husband Is Saying e Komori-san Can\'t Decline. Seu trabalho mais famoso, Miss Kobayashi\'s Dragon Maid, foi adaptado para anime pelo estúdio Kyoto Animation, com temporadas exibidas em 2017 e 2021. Além disso, ele escreveu Peach Boy Riverside e ilustrou The Idaten Deities Know Only Peace, ambos com adaptações em anime lançadas em 2021. Recentemente, Komori-san Can\'t Decline encerrou sua serialização em março de 2025, após 13 anos de publicação.','Japan','https://flagcdn.com/jp.svg','0001-06-23','coolkyousinnjya','{\"x\": \"https://x.com/coolkyou2\", \"site\": \"https://www.i-love-cool.com/\", \"instagram\": \"\"}','img/autores_pfps/autor_1746230582_2c33b4e83c.webp'),(6,'Keiichi Arawi','Keiichi Arawi (あらゐ けいいち) é um mangaká japonês nascido em 29 de dezembro de 1977, na província de Gunma. Com um estilo artístico único e humor absurdamente criativo, ganhou destaque com Nichijou (2006–2015), obra que conquistou fãs pelo mundo com sua mistura de cotidiano escolar e situações surreais. O sucesso do mangá resultou em uma adaptação em anime altamente elogiada por sua animação detalhada e timing cômico. Arawi também é autor de City (2016–2021) e Helvetica Standard, mostrando versatilidade entre o nonsense e a crítica social sutil. Seu traço limpo e senso de humor peculiar o tornaram uma referência no gênero slice of life com toque surrealista.','Japan','https://flagcdn.com/jp.svg','1977-12-29','keiichi-arawi','{\"x\": \"https://x.com/himaraya\", \"site\": \"http://www.kumomadori.com/\", \"instagram\": \"\"}','img/autores_pfps/autor_1746321810_ad8dc5001a.webp');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-18 21:08:40
