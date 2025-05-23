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
-- Table structure for table `acrm_roles`
--

DROP TABLE IF EXISTS `acrm_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acrm_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` enum('contact_type','role') COLLATE utf8mb4_unicode_ci DEFAULT 'contact_type',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `priority` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acrm_roles`
--

LOCK TABLES `acrm_roles` WRITE;
/*!40000 ALTER TABLE `acrm_roles` DISABLE KEYS */;
INSERT INTO `acrm_roles` VALUES (1,'Admin','Admin','Admin','• The person who gave the access permission to all the users for each module in the project.\r\n• Reviewing written business requirements and technical specifications\r\n• Investigating and analyzing reported defects.\r\n• Creating unit task plans, projects, and reminders.\r\n• Setting up security parameters for all the users','2019-01-30 12:52:17','2019-10-07 06:10:10','#41cc57',NULL,'role','active',1),(2,'Customer','Customer','Customer','1. A customer is an individual or business that purchases another company\'s products.\r\n2. Customers are important because they drive revenues.\r\n3. Without Customers, businesses have nothing to offer. To understand how to meet the needs of the customers, the businesses closely monitor their customer relationships to identify ways to improve service and products.\r\n4. The way businesses treat their customers can give them a competitive edge.','2019-01-30 12:52:17','2019-10-03 11:53:23','#80828a',NULL,'role','active',2),(3,'Business Manager','Business Manager','BusinessManager','A business manager is one who monitors the work of others to have an efficient business and make a large profit. In order to manage these, they should have a working knowledge of the following areas and should be a specialist in one or more fields, such as finance, marketing or public relations. He is the one who has control over all the transactions, profits and losses of the company or organization.','2019-01-30 12:52:17','2019-10-03 11:51:30','#b2c920',NULL,'role','active',3),(4,'Sales Manager','Sales Manager','SalesManager','In LaraOffice sales manager is a person who manages all the sales agents, their details, products, purchase orders and product transfer. In other words, the sales manager is the person who has control over product management and all the purchase order actions. Sales manager can also send quick notifications and have command over recurring invoices.','2019-01-30 12:52:17','2019-10-07 12:00:20','#3ebce6',NULL,'role','active',6),(5,'Sale Agent','Sale Agent','SalesPerson','LaraOffice provides a platform for Sales Agents who are self-employed salespersons whose works are usually alone or work for perhaps several non competing companies. They obtain orders from companies and are paid commission on those orders. The Sales Agents usually work in a specific area of industry and within geographical limits. In LaraOffice a sales agent can send quick notifications and have access to invoices, recurring invoices, and Quotes.','2019-01-30 12:52:17','2019-10-03 11:50:14','#000000',NULL,'role','active',7),(6,'Project Manager','Project Manager','ProjectManager','1. Project managers have the responsibility of the planning, procurement, and execution of a project within a defined scope in the field of project management.\r\n2. They are the Task assigners for the project to the employees.\r\n3. Project managers are the first point of contact for any issues.\r\n4. Project management is the responsibility of a project manager. This individual seldom participates directly in the activities that produce the end result, but rather strives to maintain the progress, mutual interaction and tasks of various parties in such a way that reduces the risk of overall failure, maximizes benefits and minimizes costs.','2019-01-30 12:52:17','2019-10-03 11:49:01','#660505',NULL,'role','active',8),(7,'Stock Manager','Stock Manager','StockManager','In LaraOffice stock manager is a person who is responsible for managing storage warehouses or delivering products to retail stores and has permission to manage content management. Sometimes, stock managers may be in charge of purchasing products. Stock managers need to understand the stock mix of a company and the different demands on that stock. These demands may be influenced by both external and internal factors and are balanced by the creation of purchase order requests to keep supplies at a reasonable or prescribed level.','2019-01-30 12:52:17','2019-10-03 11:47:05','#c94008',NULL,'role','active',9),(8,'Supplier','Supplier','Supplier','The person who supplies products/resources to an organization. A supplier may be distinguished from a contractor or subcontractor, who commonly adds specialized input to deliverables.LaraOffice gives suppliers permissions to send quick notifications, manage content and purchase orders.','2019-01-30 12:52:17','2019-10-03 11:44:52','#4a7037',NULL,'role','active',10),(10,'Client','Client','Client','A client is somebody who buys a product or pays for services. Companies and other organizations may also be clients. Unlike customers, clients usually have an arrangement or a relationship with the company/organization. In LaraOffice clients play a role as important as customers bringing profits to the organization.','2019-03-18 09:06:56','2019-10-03 11:43:49','#221199',NULL,'role','active',4),(11,'Lead','Lead','Leads','A person who is interested in the products. He is a person or business who may eventually become a client.','2019-01-30 12:52:17','2019-10-03 12:14:58',NULL,NULL,'contact_type','active',3),(12,'Employee','Employee','Employee','A person who is hired by an organization in order to fulfill the requirements of an organization for wages. An employee might work for the organization either part-time or full-time under a contract of employment, whether oral or written, express or implied, and has recognized rights and duties. LaraOffice provides an employee all rights, manages his wages and work, and maintains transparency between the employee and employer.','2019-05-16 04:43:20','2019-10-03 11:42:44','#d93434',NULL,'role','active',5),(14,'Executive','Executive','Executive','An executive is a powerful person who is responsible for making things run in a planned manner. In LaraOffice the executive is the organ exercising authority in and holding responsibility for managing the working of the organization. He has the authority and responsibility to execute and enforce laws regarding the organization.','2019-09-17 06:18:19','2019-10-03 11:41:40','#c2bc30',NULL,'role','active',2);
/*!40000 ALTER TABLE `acrm_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-09 15:13:04
