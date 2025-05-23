-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: laraoffice
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acrm_role_user`
--

DROP TABLE IF EXISTS `acrm_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acrm_role_user` (
  `role_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  KEY `fk_p_259279_259280_user_r_5c4fd26c5adde` (`role_id`),
  KEY `fk_user_id_role_user_idx` (`user_id`),
  CONSTRAINT `fk_acrm_role_user_1` FOREIGN KEY (`user_id`) REFERENCES `acrm_contacts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_role_id_role_user` FOREIGN KEY (`role_id`) REFERENCES `acrm_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acrm_role_user`
--

LOCK TABLES `acrm_role_user` WRITE;
/*!40000 ALTER TABLE `acrm_role_user` DISABLE KEYS */;
INSERT INTO `acrm_role_user` VALUES (1,312),(7,10946),(2,10956),(5,10955),(4,10953),(8,10954),(12,10952),(10,10951),(6,10950),(3,10949),(14,12960),(12,12940),(6,12920),(12,12900),(2,12880),(12,12860),(5,12840),(8,12820),(12,12800),(11,12780),(5,12760),(3,12740),(3,12720),(6,12700),(1,12680),(12,12660),(5,12640),(3,12620),(2,12600),(5,12580),(14,12560),(10,12540),(7,12520),(12,12500),(1,12480),(14,10948),(2,12989),(2,12990),(2,12996),(5,12997),(1,12999),(12,13001);
/*!40000 ALTER TABLE `acrm_role_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-09 15:38:45
