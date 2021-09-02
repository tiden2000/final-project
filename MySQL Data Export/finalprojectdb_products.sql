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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `img_link` varchar(200) DEFAULT NULL,
  `seller` varchar(45) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (13,'Mansion','92 Division Street',24320,'users/sellers/2/product1.jpg','seller','Peru','House'),(19,'Penthouse','34 Twin Pines Center',58954.5,'users/sellers/5/webaliser-_TPTXZd9mOo-unsplash.jpg','seller2','China',NULL),(15,'5 Floor House','7675 Bartelt Center',60515.68,'users/sellers/2/product2.jpg','seller','Sweden','Apartment'),(20,'Office 10 Floors','5 Emmet Avenue',90690.19,'users/sellers/5/alesia-kazantceva-VWcPlbHglYc-unsplash.jpg','seller2','United States',NULL),(18,'River Side Apartment','5 Lakeland Alley',35280.66,'users/sellers/2/kara-eads-L7EwHkq1B2s-unsplash.jpg','seller','Indonesia','Apartment'),(21,'Apartment With Parking Garage','6 Bultman Drive',58822.69,'users/sellers/5/chuttersnap-3_1f0ZGOjIY-unsplash.jpg','seller2','Canada',NULL),(22,'Surburban House','6205 Springs Road',66612.15,'users/sellers/2/phil-hearing-IYfp2Ixe9nM-unsplash.jpg','seller','Mexico','House'),(23,'Family House','21597 Loeprich Alley',73308.03,'users/sellers/2/jacques-bopp-Hh18POSx5qk-unsplash.jpg','seller','Poland','House'),(24,'Office Beach View','2646 Bayside Road',51479.09,'users/sellers/5/rahul-bhogal-Ub9LkIWxyec-unsplash.jpg','seller2','Argentina',NULL),(25,'3 Floors Office With Pool','6 Hazelcrest Plaza',62641.5,'users/sellers/5/lycs-architecture-U2BI3GMnSSE-unsplash.jpg','seller2','France',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-02 21:49:52
