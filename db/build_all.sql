-- MariaDB dump 10.19  Distrib 10.11.3-MariaDB, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: trs
-- ------------------------------------------------------
-- Server version	10.11.3-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `reservations`
--
DROP DATABASE IF EXISTS trs;
CREATE DATABASE trs;

USE trs;

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host_id` int(11) NOT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `length_min` int(11) NOT NULL,
  PRIMARY KEY (`id`,`start_time`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES
(1,1,NULL,'2023-09-22 10:00:00',15),
(2,1,NULL,'2023-09-22 10:15:00',15),
(3,1,NULL,'2023-09-22 10:30:00',15),
(4,1,NULL,'2023-09-22 10:45:00',15),
(5,1,NULL,'2023-09-22 11:00:00',15),
(6,1,NULL,'2023-09-22 11:15:00',15),
(7,1,NULL,'2023-09-22 11:30:00',15),
(8,1,NULL,'2023-09-22 11:45:00',15),
(9,1,NULL,'2023-09-29 10:00:00',15),
(10,1,NULL,'2023-09-29 10:15:00',15),
(11,1,NULL,'2023-09-29 10:30:00',15),
(12,1,NULL,'2023-09-29 10:45:00',15),
(13,1,NULL,'2023-09-29 11:00:00',15),
(14,1,NULL,'2023-09-29 11:15:00',15),
(15,1,NULL,'2023-09-29 11:30:00',15),
(16,1,NULL,'2023-09-29 11:45:00',15),
(17,2,NULL,'2023-09-22 10:00:00',15),
(18,2,NULL,'2023-09-22 10:15:00',15),
(19,2,NULL,'2023-09-22 10:30:00',15),
(20,2,NULL,'2023-09-22 10:45:00',15),
(21,2,NULL,'2023-09-22 11:00:00',15),
(22,2,NULL,'2023-09-22 11:15:00',15),
(23,2,NULL,'2023-09-22 11:30:00',15),
(24,2,NULL,'2023-09-22 11:45:00',15),
(25,2,NULL,'2023-09-29 10:00:00',15),
(26,2,NULL,'2023-09-29 10:15:00',15),
(27,2,NULL,'2023-09-29 10:30:00',15),
(28,2,NULL,'2023-09-29 10:45:00',15),
(29,2,NULL,'2023-09-29 11:00:00',15),
(30,2,NULL,'2023-09-29 11:15:00',15),
(31,2,NULL,'2023-09-29 11:30:00',15),
(32,2,NULL,'2023-09-29 11:45:00',15);
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `passwd` varchar(150) NOT NULL,
  `type` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'james','pw','h'),
(2,'wayne','pw','h'),
(3,'alice','pw','g'),
(4,'bob','pw','g');
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

-- Dump completed on 2023-08-15 17:18:23
