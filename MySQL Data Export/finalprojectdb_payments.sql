-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: finalprojectdb
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `txid` varchar(256) NOT NULL,
  `addr` varchar(256) NOT NULL,
  `value` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (11,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1qv8n5june5p7k4es6jsjhpncx3mr8cclyj0fmeq',178751632,2),(12,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1q6w6stfksf33g9s63zqfdd6h7hpjhp6lexy09v9',177498999,2),(13,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1q425rgrv67r87tqwlw5en3u29nakh6zuz9deypj',132969352,2),(14,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1qm9h0984jqej43we25a0ha89ycv6d07fx8p0fgk',120994259,2),(15,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1q3de9k93w9fsgfrxav7wjrgs47d5960275cj5d2',131063421,2),(16,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1qeet03nuzp382xue63jsfzd99kehrw778xy2haq',107801937,2),(17,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1qv64w8srm9xc5s2dh2rgqfdagu7ske0l6e6dpyf',126540688,2),(18,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1q49jdvcc46r383vmph34grj4z7xpg0xsgyeskl2',130161722,2),(19,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1qnm3j08whe8kzn6f8tlzxnddu263paqzy22gk7r',123954150,2),(20,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1qkzjn7wqg3jk9w7vjsntudprtsrjqp0qd9yrv94',132001340,2),(21,'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction','bc1qg24efzzuvhfzzttl9qmfjkr88x2xvt5tkummq3',132427742,2);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-02 21:49:53
