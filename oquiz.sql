-- MySQL dump 10.17  Distrib 10.3.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: oquiz
-- ------------------------------------------------------
-- Server version	10.3.25-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `response` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DADD4A251E27F6BF` (`question_id`),
  CONSTRAINT `FK_DADD4A251E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,'Word',1,1,'2023-07-24 16:05:25','2023-07-25 14:29:22'),(2,'Excel',0,1,'2023-07-24 16:05:25',NULL),(3,'PowerPoint',0,1,'2023-07-24 16:05:25',NULL),(4,'Access',0,1,'2023-07-24 16:05:25',NULL),(5,'Tableur',1,2,'2023-07-24 16:05:25',NULL),(6,'Traitement de texte',0,2,'2023-07-24 16:05:25',NULL),(7,'Navigateur internet',0,2,'2023-07-24 16:05:25',NULL),(8,'Messagerie',0,2,'2023-07-24 16:05:25',NULL),(9,'Bug',1,3,'2023-07-24 16:05:25',NULL),(10,'Crack',0,3,'2023-07-24 16:05:25',NULL),(11,'Spam',0,3,'2023-07-24 16:05:25',NULL),(12,'Virus',0,3,'2023-07-24 16:05:25',NULL),(13,'« Windows 8 »',1,4,'2023-07-24 16:05:25',NULL),(14,'« Windows 7 »',0,4,'2023-07-24 16:05:25',NULL),(15,'« Windows CE »',0,4,'2023-07-24 16:05:25',NULL),(16,'« Windows Mobile »',0,4,'2023-07-24 16:05:25',NULL),(17,'PAO',1,5,'2023-07-24 16:05:25',NULL),(18,'USB',0,5,'2023-07-24 16:05:25',NULL),(19,'VGA',0,5,'2023-07-24 16:05:25',NULL),(20,'CIO',0,5,'2023-07-24 16:05:25',NULL),(21,'Tatooine',1,6,'2023-07-24 16:05:25',NULL),(22,'Naboo',0,6,'2023-07-24 16:05:25',NULL),(23,'Hoth',0,6,'2023-07-24 16:05:25',NULL),(24,'Endor',0,6,'2023-07-24 16:05:25',NULL),(25,'Chewbacca',1,7,'2023-07-24 16:05:25',NULL),(26,'Palpatine',0,7,'2023-07-24 16:05:25',NULL),(27,'Watto',0,7,'2023-07-24 16:05:25',NULL),(28,'Jar Jar Binks',0,7,'2023-07-24 16:05:25',NULL),(29,'Ben',1,8,'2023-07-24 16:05:25',NULL),(30,'Tom',0,8,'2023-07-24 16:05:25',NULL),(31,'Sid',0,8,'2023-07-24 16:05:25',NULL),(32,'Ken',0,8,'2023-07-24 16:05:25',NULL),(33,'Faucon Millenium',1,9,'2023-07-24 16:05:25',NULL),(34,'Aigle Solitaire',0,9,'2023-07-24 16:05:25',NULL),(35,'B-Wing',0,9,'2023-07-24 16:05:25',NULL),(36,'Speeder',0,9,'2023-07-24 16:05:25',NULL),(37,'C-3PO',1,10,'2023-07-24 16:05:25',NULL),(38,'R2-D2',0,10,'2023-07-24 16:05:25',NULL),(39,'T-1000',0,10,'2023-07-24 16:05:25',NULL),(40,'Daryl',0,10,'2023-07-24 16:05:25',NULL),(41,'Michael Jordan',1,11,'2023-07-24 16:05:25',NULL),(42,'Patrick Ewing',0,11,'2023-07-24 16:05:25',NULL),(43,'Karl Malone',0,11,'2023-07-24 16:05:25',NULL),(44,'Charles Barkley',0,11,'2023-07-24 16:05:25',NULL),(45,'Belgique',1,12,'2023-07-24 16:05:25',NULL),(46,'France',0,12,'2023-07-24 16:05:25',NULL),(47,'États-Unis',0,12,'2023-07-24 16:05:25',NULL),(48,'Pologne',0,12,'2023-07-24 16:05:25',NULL),(49,'Kobe Bryant',1,13,'2023-07-24 16:05:25',NULL),(50,'Ron Harper',0,13,'2023-07-24 16:05:25',NULL),(51,'Derek Fisher',0,13,'2023-07-24 16:05:25',NULL),(52,'Rick Fox',0,13,'2023-07-24 16:05:25',NULL),(53,'Slam Dunk Contest',1,14,'2023-07-24 16:05:25',NULL),(54,'Skills Challenge',0,14,'2023-07-24 16:05:25',NULL),(55,'Three-point Shoot',0,14,'2023-07-24 16:05:25',NULL),(56,'All-Star Game',0,14,'2023-07-24 16:05:25',NULL),(57,'Vince Carter',1,15,'2023-07-24 16:05:25',NULL),(58,'Marc Gasol',0,15,'2023-07-24 16:05:25',NULL),(59,'Jarnell Stokes',0,15,'2023-07-24 16:05:25',NULL),(60,'Andrew Harrison',0,15,'2023-07-24 16:05:25',NULL),(61,'Outreterre',1,16,'2023-07-24 16:05:25',NULL),(62,'Kalimdor',0,16,'2023-07-24 16:05:25',NULL),(63,'Norfendre',0,16,'2023-07-24 16:05:25',NULL),(64,'Darnassus',0,16,'2023-07-24 16:05:25',NULL),(65,'Farmers',1,17,'2023-07-24 16:05:25',NULL),(66,'Killers',0,17,'2023-07-24 16:05:25',NULL),(67,'Miners',0,17,'2023-07-24 16:05:25',NULL),(68,'Runners',0,17,'2023-07-24 16:05:25',NULL),(69,'Zandalar',1,18,'2023-07-24 16:05:25',NULL),(70,'Kezan',0,18,'2023-07-24 16:05:25',NULL),(71,'Pandaria',0,18,'2023-07-24 16:05:25',NULL),(72,'Nordrassil',0,18,'2023-07-24 16:05:25',NULL),(73,'-2900',1,19,'2023-07-24 16:05:25',NULL),(74,'55',0,19,'2023-07-24 16:05:25',NULL),(75,'1148',0,19,'2023-07-24 16:05:25',NULL),(76,'3024',0,19,'2023-07-24 16:05:25',NULL),(77,'Ner\'zhul',1,20,'2023-07-24 16:05:25',NULL),(78,'Kamagua',0,20,'2023-07-24 16:05:25',NULL),(79,'Naaru',0,20,'2023-07-24 16:05:25',NULL),(80,'Rohart',0,20,'2023-07-24 16:05:25',NULL),(81,'Devenir le meilleur sabreur au monde',1,21,NULL,NULL),(82,'Devenir le roi des pirates',0,21,NULL,NULL),(83,'Réussir à ne pas se perdre dans chaque endroit où il va',0,21,NULL,NULL),(84,'Décrypter tous les Ponéglyphes',0,21,NULL,NULL),(85,'299',1,22,NULL,NULL),(86,'357',0,22,NULL,NULL),(87,'151',0,22,NULL,NULL),(88,'69',0,22,NULL,NULL),(89,'Shoto Todoroki',1,23,NULL,NULL),(90,'Toya Todoroki',0,23,NULL,NULL),(91,'Natsuo Todoroki',0,23,NULL,NULL),(92,'Enji Torodori',0,23,NULL,NULL),(93,'Akira Toriyama',1,24,NULL,NULL),(94,'Eiichirō Oda',0,24,NULL,NULL),(95,'Tite Kubo',0,24,NULL,NULL),(96,'Hiro Mashima',0,24,NULL,NULL),(97,'Orelsan',1,25,NULL,NULL),(98,'Stéphane Excoffier',0,25,NULL,NULL),(99,'Brigitte Lecordier',0,25,NULL,NULL),(100,'Arnaud Laurent',0,25,NULL,NULL),(101,'Dev',0,26,NULL,NULL),(102,'Dave',0,26,NULL,NULL),(103,'Les deux',0,26,NULL,NULL),(104,'Aucun',1,26,NULL,NULL),(105,'Dev',0,27,NULL,NULL),(106,'Dave',0,27,NULL,NULL),(107,'Les deux',1,27,NULL,NULL),(108,'Aucun',0,27,NULL,NULL),(109,'Dev',1,28,NULL,NULL),(110,'Dave',0,28,NULL,NULL),(111,'Les deux',0,28,NULL,NULL),(112,'Aucun',0,28,NULL,NULL),(113,'Dev',0,29,NULL,NULL),(114,'Dave',1,29,NULL,NULL),(115,'Les deux',0,29,NULL,NULL),(116,'Aucun',0,29,NULL,NULL),(117,'Dev',1,30,NULL,NULL),(118,'Dave',0,30,NULL,NULL),(119,'Les deux',0,30,NULL,NULL),(120,'Aucun',0,30,NULL,NULL),(121,'16 Octobre 1923',1,31,NULL,NULL),(122,'13 Novembre 1923',0,31,NULL,NULL),(123,'11 Septembre 1923',0,31,NULL,NULL),(124,'04 Juillet 1923',0,31,NULL,NULL),(125,'Oswald le lapin Chanceux',1,32,NULL,NULL),(126,'Casey le petit train du cirque',0,32,NULL,NULL),(127,'Donald',0,32,NULL,NULL),(128,'Mickey était le premier',0,32,NULL,NULL),(129,'Steamboat Willie',1,33,NULL,NULL),(130,'La maison de Mickey',0,33,NULL,NULL),(131,'Dumbo',0,33,NULL,NULL),(132,'Cendrillon',0,33,NULL,NULL),(133,'Blanche-Neige et les 7 nains',1,34,NULL,NULL),(134,'Pinocchio',0,34,NULL,NULL),(135,'Fantasia',0,34,NULL,NULL),(136,'Bambi',0,34,NULL,NULL),(137,'Merida',1,35,NULL,NULL),(138,'Elinor',0,35,NULL,NULL),(139,'Maude',0,35,NULL,NULL),(140,'Raiponce ',0,35,NULL,NULL),(141,'900',1,36,NULL,NULL),(142,'999',0,36,NULL,NULL),(143,'990',0,36,NULL,NULL),(144,'995',0,36,NULL,NULL),(145,'Din, Nayru et Farore',1,37,NULL,NULL),(146,'Fay, Mojo et Hylia',0,37,NULL,NULL),(147,'Ganondorf, Link et Zelda',0,37,NULL,NULL),(148,'Firone, Lanelle et Ordinn',0,37,NULL,NULL),(149,'Les Zoras',1,38,NULL,NULL),(150,'Les Gorons',0,38,NULL,NULL),(151,'Les Piafs',0,38,NULL,NULL),(152,'Les Hyliens',0,38,NULL,NULL),(153,'24',1,39,NULL,NULL),(154,'28',0,39,NULL,NULL),(155,'20',0,39,NULL,NULL),(156,'25',0,39,NULL,NULL),(157,'L\'ancien roi d\'Hyrule',1,40,NULL,NULL),(158,'L\'arbre Mojo',0,40,NULL,NULL),(159,'C\'est juste un bâteau qui parle',0,40,NULL,NULL),(160,'Epona ',0,40,NULL,NULL),(161,'Vesemir',1,41,NULL,NULL),(162,'Lambert',0,41,NULL,NULL),(163,'Letho de Guleta',0,41,NULL,NULL),(164,'Eskel',0,41,NULL,NULL),(165,'Gaunter O\'Dimm',1,42,NULL,NULL),(166,'Emhyr var Emreis',0,42,NULL,NULL),(167,'Philippa Eilhart',0,42,NULL,NULL),(168,'Vernon Roche',0,42,NULL,NULL),(169,'Voyager entre les dimensions et les mondes',1,43,NULL,NULL),(170,'Contrôle des éléments',0,43,NULL,NULL),(171,'Télékinésie',0,43,NULL,NULL),(172,'Métamorphose',0,43,NULL,NULL),(173,'Geralt de Riv',1,44,NULL,NULL),(174,'Berengar',0,44,NULL,NULL),(175,'Dandelion',0,44,NULL,NULL),(176,'Coën',0,44,NULL,NULL),(177,'Par une mutation génétique',1,45,NULL,NULL),(178,'Par des rituels magiques',0,45,NULL,NULL),(179,'Par un pacte avec des démons',0,45,NULL,NULL),(180,'Par l\'étude approfondie des grimoires anciens',0,45,NULL,NULL),(181,'Iron Man',1,46,'2023-08-01 10:07:52',NULL),(182,'Thor',0,46,'2023-08-01 10:07:52',NULL),(183,'Wolverine',0,46,'2023-08-01 10:07:52',NULL),(184,'Cyclope',0,46,'2023-08-01 10:07:52',NULL),(185,'Le Bouffon vert',1,47,'2023-08-01 10:07:52',NULL),(186,'Le Lézard',0,47,'2023-08-01 10:07:52',NULL),(187,'Thanos',0,47,'2023-08-01 10:07:52',NULL),(188,'Voïd',0,47,'2023-08-01 10:07:52',NULL),(189,'Catwoman',1,48,'2023-08-01 10:07:52',NULL),(190,'Galactus',0,48,'2023-08-01 10:07:52',NULL),(191,'Loki',0,48,'2023-08-01 10:07:52',NULL),(192,'Séléné',0,48,'2023-08-01 10:07:52',NULL),(193,'The Daily Planet',1,49,'2023-08-01 10:07:52',NULL),(194,'The Daily Press',0,49,'2023-08-01 10:07:52',NULL),(195,'The New Daily',0,49,'2023-08-01 10:07:52',NULL),(196,'The Daily News',0,49,'2023-08-01 10:07:52',NULL),(197,'Daredevil',1,50,'2023-08-01 10:07:52',NULL),(198,'Captain America',0,50,'2023-08-01 10:07:52',NULL),(199,'Spider-Man',0,50,'2023-08-01 10:07:52',NULL),(200,'Colin-Woman',0,50,'2023-08-01 10:07:52',NULL),(201,'Zack Fair',1,51,'2023-08-01 10:21:44',NULL),(202,'Tifa Lockheart',0,51,'2023-08-01 10:21:44',NULL),(203,'Aerith Gainsborough',0,51,'2023-08-01 10:21:44',NULL),(204,'Barret Wallace',0,51,'2023-08-01 10:21:44',NULL),(205,'Les seeds',1,52,'2023-08-01 10:21:44',NULL),(206,'Les sids',0,52,'2023-08-01 10:21:44',NULL),(207,'Les cids',0,52,'2023-08-01 10:21:44',NULL),(208,'Les soldats d\'élite',0,52,'2023-08-01 10:21:44',NULL),(209,'Bibi Orunitia',1,53,'2023-08-01 10:21:44',NULL),(210,'Djidane Tribal',0,53,'2023-08-01 10:21:44',NULL),(211,'Mikoto',0,53,'2023-08-01 10:21:44',NULL),(212,'Adelbert Steiner',0,53,'2023-08-01 10:21:44',NULL),(213,'Blitzball',1,54,'2023-08-01 10:21:44',NULL),(214,'Quidditch',0,54,'2023-08-01 10:21:44',NULL),(215,'Waterball',0,54,'2023-08-01 10:21:44',NULL),(216,'Basketball',0,54,'2023-08-01 10:21:44',NULL),(217,'Chocobo ',1,55,'2023-08-01 10:21:44',NULL),(218,'Mog',0,55,'2023-08-01 10:21:44',NULL),(219,'Cheval',0,55,'2023-08-01 10:21:44',NULL),(220,'Dragon',0,55,'2023-08-01 10:21:44',NULL),(221,'Commercial',1,56,'2023-08-01 10:32:29',NULL),(222,'Expérimental',0,56,'2023-08-01 10:32:29',NULL),(223,'Touristique',0,56,'2023-08-01 10:32:29',NULL),(224,'Scientifique',0,56,'2023-08-01 10:32:29',NULL),(225,'Facehugger',1,57,'2023-08-01 10:32:29',NULL),(226,'Faceplant',0,57,'2023-08-01 10:32:29',NULL),(227,'Facepower',0,57,'2023-08-01 10:32:29',NULL),(228,'Faceleader',0,57,'2023-08-01 10:32:29',NULL),(229,'Suicide',1,58,'2023-08-01 10:32:29',NULL),(230,'Meurtre',0,58,'2023-08-01 10:32:29',NULL),(231,'Noyade',0,58,'2023-08-01 10:32:29',NULL),(232,'Électrocution',0,58,'2023-08-01 10:32:29',NULL),(233,'Ridley Scott',1,59,'2023-08-01 10:32:29',NULL),(234,'James Cameron',0,59,'2023-08-01 10:32:29',NULL),(235,'David Fincher',0,59,'2023-08-01 10:32:29',NULL),(236,'Jean-Pierre Jeunet',0,59,'2023-08-01 10:32:29',NULL),(237,'Chat',1,60,'2023-08-01 10:32:29',NULL),(238,'Chimpanzé',0,60,'2023-08-01 10:32:29',NULL),(239,'Rat',0,60,'2023-08-01 10:32:29',NULL),(240,'Chien',0,60,'2023-08-01 10:32:29',NULL),(241,'Prue',1,61,'2023-08-01 10:50:43',NULL),(242,'Piper',0,61,'2023-08-01 10:50:43',NULL),(243,'Buffy',0,61,'2023-08-01 10:50:43',NULL),(244,'Paige',0,61,'2023-08-01 10:50:43',NULL),(245,'Smallville',1,62,'2023-08-01 10:50:43',NULL),(246,'Le Caméléon',0,62,'2023-08-01 10:50:43',NULL),(247,'Stargate',0,62,'2023-08-01 10:50:43',NULL),(248,'Profiler',0,62,'2023-08-01 10:50:43',NULL),(249,'Rousse',1,63,'2023-08-01 10:50:43',NULL),(250,'Brune',0,63,'2023-08-01 10:50:43',NULL),(251,'Blonde',0,63,'2023-08-01 10:50:43',NULL),(252,'Noire',0,63,'2023-08-01 10:50:43',NULL),(253,'Six',1,64,'2023-08-01 10:50:43',NULL),(254,'Huit',0,64,'2023-08-01 10:50:43',NULL),(255,'Deux',0,64,'2023-08-01 10:50:43',NULL),(256,'Quatre',0,64,'2023-08-01 10:50:43',NULL),(257,'Pacey',1,65,'2023-08-01 10:50:43',NULL),(258,'Joey',0,65,'2023-08-01 10:50:43',NULL),(259,'Dan',0,65,'2023-08-01 10:50:43',NULL),(260,'Jack',0,65,'2023-08-01 10:50:43',NULL),(261,'Stade Vélodrome',1,66,'2023-08-01 11:02:23',NULL),(262,'Parc des Princes',0,66,'2023-08-01 11:02:23',NULL),(263,'Allianz Riviera',0,66,'2023-08-01 11:02:23',NULL),(264,'Matmut-Atlantique',0,66,'2023-08-01 11:02:23',NULL),(265,'Décines-Charpieu',1,67,'2023-08-01 11:02:23',NULL),(266,'Vaulx-en-Velin',0,67,'2023-08-01 11:02:23',NULL),(267,'Villeurbanne',0,67,'2023-08-01 11:02:23',NULL),(268,'Vénissieux',0,67,'2023-08-01 11:02:23',NULL),(269,'Louis Fonteneau',1,68,'2023-08-01 11:02:23',NULL),(270,'Jean Snaudeau',0,68,'2023-08-01 11:02:23',NULL),(271,'Marcel Picot',0,68,'2023-08-01 11:02:23',NULL),(272,'Marcel Saupin',0,68,'2023-08-01 11:02:23',NULL),(273,'Stade du Ray',1,69,'2023-08-01 11:02:23',NULL),(274,'Stade de La Bocca',0,69,'2023-08-01 11:02:23',NULL),(275,'Stade de Lorient',0,69,'2023-08-01 11:02:23',NULL),(276,'Stade Océane',0,69,'2023-08-01 11:02:23',NULL),(277,'Stade Léon-Bollée',1,70,'2023-08-01 11:02:23',NULL),(278,'Stade de la Sarthe',0,70,'2023-08-01 11:02:23',NULL),(279,'Stade Océane',0,70,'2023-08-01 11:02:23',NULL),(280,'Stade de Lorient',0,70,'2023-08-01 11:02:23',NULL),(281,'Aucun',1,71,'2023-08-01 11:14:55',NULL),(282,'Frère et soeur',0,71,'2023-08-01 11:14:55',NULL),(283,'Fils et mère',0,71,'2023-08-01 11:14:55',NULL),(284,'Cousin et cousine',0,71,'2023-08-01 11:14:55',NULL),(285,'Centurion',1,72,'2023-08-01 11:14:55',NULL),(286,'Simple soldat',0,72,'2023-08-01 11:14:55',NULL),(287,'Général',0,72,'2023-08-01 11:14:55',NULL),(288,'Décurion',0,72,'2023-08-01 11:14:55',NULL),(289,'Fléau de Dieu',1,73,'2023-08-01 11:14:55',NULL),(290,'Le Sanguinaire',0,73,'2023-08-01 11:14:55',NULL),(291,'Le Cruel',0,73,'2023-08-01 11:14:55',NULL),(292,'Le Désherbant',0,73,'2023-08-01 11:14:55',NULL),(293,'Frère de Kradoc',1,74,'2023-08-01 11:14:55',NULL),(294,'Époux de Mevanwi',0,74,'2023-08-01 11:14:55',NULL),(295,'Roi de Bretagne',0,74,'2023-08-01 11:14:55',NULL),(296,'Mari de Guenièvre',0,74,'2023-08-01 11:14:55',NULL),(297,'Perceval',1,75,'2023-08-01 11:14:55',NULL),(298,'Lancelot du Lac',0,75,'2023-08-01 11:14:55',NULL),(299,'Karadoc',0,75,'2023-08-01 11:14:55',NULL),(300,'Bohort',0,75,'2023-08-01 11:14:55',NULL),(301,'1996',1,76,'2023-08-02 09:20:10',NULL),(302,'1989',0,76,'2023-08-02 09:20:10',NULL),(303,'2005',0,76,'2023-08-02 09:20:10',NULL),(304,'2012',0,76,'2023-08-02 09:20:10',NULL),(305,'Angleterre',1,77,'2023-08-02 09:20:10',NULL),(306,'France',0,77,'2023-08-02 09:20:10',NULL),(307,'Italie',0,77,'2023-08-02 09:20:10',NULL),(308,'Irlande',0,77,'2023-08-02 09:20:10',NULL),(309,'80 dB',1,78,'2023-08-02 09:20:10',NULL),(310,'90 dB',0,78,'2023-08-02 09:20:10',NULL),(311,'100 dB',0,78,'2023-08-02 09:20:10',NULL),(312,'110 dB',0,78,'2023-08-02 09:20:10',NULL),(313,'La piscine Molitor',1,79,'2023-08-02 09:20:10',NULL),(314,'Le château de Versailles',0,79,'2023-08-02 09:20:10',NULL),(315,'La tour de Pise',0,79,'2023-08-02 09:20:10',NULL),(316,'Le Parthénon',0,79,'2023-08-02 09:20:10',NULL),(317,'Des sacs poubelle et de l\'eau',1,80,'2023-08-02 09:20:10',NULL),(318,'Son survet kaki',0,80,'2023-08-02 09:20:10',NULL),(319,'Des chewings-gums',0,80,'2023-08-02 09:20:10',NULL),(320,'Son chien',0,80,'2023-08-02 09:20:10',NULL);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Cinéma','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/categories/cinema.jpg','Bienvenue dans le quiz cinéma, où vous pourrez tester vos connaissances sur le monde magique du septième art ! Plongez dans l\'univers du cinéma et préparez-vous à un défi captivant, rempli de questions sur les films cultes, les acteurs légendaires, les répliques mémorables et bien plus encore.\r\nAlors, installez-vous confortablement, rassemblez vos amis cinéphiles ou affrontez-vous en solo, et laissez-vous transporter dans l\'univers magique du cinéma.','2023-07-11 00:00:00','2023-08-02 17:17:01','cinema'),(2,'Musique','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/categories/musique.jpg','Bienvenue dans la catégorie \"Musique\" de notre quiz ! Préparez-vous à un voyage envoûtant à travers les rythmes, les mélodies et les paroles qui ont façonné l\'histoire de la musique. Que vous soyez un mélomane passionné, un fanatique de genres spécifiques ou simplement curieux d\'en apprendre davantage sur le monde de la musique, ce quiz est fait pour vous.\r\nAlors, réglez le volume, préparez-vous à taper du pied et laissez-vous emporter par les notes enjouées de ce quiz musical captivant. Prêt à mettre vos connaissances musicales à l\'épreuve ? Que la symphonie des questions commence !','2023-07-11 00:00:00','2023-08-02 17:17:14','musique'),(3,'Sport','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/categories/sport.jpg','La catégorie \"Sport\" vous offre une occasion excitante de tester vos connaissances et votre passion pour le monde du sport. Que vous soyez un fervent supporter, un amateur occasionnel ou un véritable fanatique, ce quiz est conçu pour mettre à l\'épreuve votre expertise dans différents domaines sportifs.\r\nQue vous soyez un expert en statistiques sportives, un fanatique des records ou simplement un passionné de l\'esprit compétitif, ce quiz est l\'occasion idéale de mettre vos connaissances à l\'épreuve.','2023-07-11 00:00:00','2023-08-02 17:17:29','sport'),(4,'Jeux-vidéo','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/categories/jeuxvideo.jpg','Bienvenue dans la catégorie \"Jeux vidéo\" de notre quiz ! Plongez dans l\'univers captivant des jeux virtuels, où vous pourrez tester vos connaissances sur les titres emblématiques, les personnages légendaires et les moments mémorables de l\'histoire du jeu vidéo.\r\nQue vous soyez fan de Mario, de Sonic, de Lara Croft, de Master Chief ou d\'autres icônes du jeu vidéo, ce quiz vous permettra de revivre des moments épiques.\r\nPrêt à appuyer sur le bouton Start et à relever le défi ? Que le quiz gaming commence et que la meilleure réponse gagne !','2023-07-11 00:00:00','2023-08-02 17:17:39','jeux-video'),(5,'Technologie','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/categories/technologie.jpg','La catégorie \"Technologie\" de notre quiz vous propose une immersion passionnante dans le monde de l\'innovation et des avancées technologiques. Êtes-vous prêt à tester vos connaissances sur les gadgets, les inventions et les concepts qui ont façonné notre société moderne ?\r\nRéunissez vos amis technophiles, préparez-vous à relever des défis stimulants et prouvez que vous êtes à la pointe de la technologie.','2023-07-11 00:00:00','2023-08-02 17:17:47','technologie'),(6,'Culture Générale','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/categories/culturegenerale.jpg','Bienvenue dans la catégorie \"Culture générale\" de notre quiz ! Préparez-vous à un voyage captivant à travers une multitude de sujets variés et enrichissants, conçus pour tester votre connaissance et votre curiosité sur le monde qui nous entoure. Alors, préparez-vous à explorer le vaste monde de la culture générale et à élargir vos connaissances avec ce quiz captivant. Que les questions intéressantes et les réponses éclairantes commencent !','2023-07-11 00:00:00','2023-08-02 17:17:55','culture-generale');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230724123107','2023-07-24 14:31:15',621),('DoctrineMigrations\\Version20230724123604','2023-07-24 14:36:07',198),('DoctrineMigrations\\Version20230724124422','2023-07-24 14:44:25',61),('DoctrineMigrations\\Version20230801141025','2023-08-01 16:10:39',180),('DoctrineMigrations\\Version20230801141154','2023-08-01 16:15:03',156),('DoctrineMigrations\\Version20230801141633','2023-08-01 16:16:36',68);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anecdote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6F7494E853CD175` (`quiz_id`),
  CONSTRAINT `FK_B6F7494E853CD175` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,1,'Quel logiciel de traitement de texte a été mis au point par la société Microsoft ?','Microsoft a déjà publié plusieurs logiciels de traitement de texte, mais « Word » en reste la « vedette ».','2023-07-24 16:06:16','2023-07-31 15:25:22',NULL),(2,1,'Le logiciel « Excel », extrait de la suite bureautique Microsoft Office, est un...','Excel a été plusieurs fois critiqué pour ses problèmes de précision sur calculs à virgule flottante.','2023-07-24 16:06:16',NULL,NULL),(3,1,'En informatique, comment appelle-t-on une erreur de programmation encore non localisée ?','La gravité d\'un dysfonctionnement informatique peut aller de bénigne à majeure.','2023-07-24 16:06:16',NULL,NULL),(4,1,'Quelle version de Windows Microsoft a-t-il lancée le vendredi 26 octobre 2012 ?','La version de Windows 8.1 est une mise à jour gratuite de Windows 8, disponible depuis 2013.','2023-07-24 16:06:16',NULL,NULL),(5,1,'Comment est communément abrégée la publication assistée par ordinateur ?','La PAO consiste à créer des documents imprimés en travaillant la composition et la typographie de documents.','2023-07-24 16:06:16',NULL,NULL),(6,2,'Sur quelle planète désertique Anakin Skywalker est-il arrivé à l\'âge de quatre ans ?','George Lucas a utilisé l\'habitat traditionnel de Tataouine sans retouches pour la scène où Anakin retourne voir sa mère.','2023-07-24 16:06:16',NULL,NULL),(7,2,'Quel légendaire guerrier Wookiee est depuis longtemps le fidèle compagnon d\'Han Solo ?','Chewbacca possède un grand coeur et fait preuve d\'une loyauté indéfectible envers ses amis.','2023-07-24 16:06:16',NULL,NULL),(8,2,'Quel nom Obi-Wan Kenobi a-t-il adopté pendant des années jusqu\'au jour où il rencontra Luke ?','Le vieil Obi-Wan Kenobi met Luke Skywalker sur le chemin de la Force avant d\'être tué volontairement par Dark Vador.','2023-07-24 16:06:16',NULL,NULL),(9,2,'Quel est le nom du vaisseau spatial du contrebandier Han Solo ?','Le vaisseau fut appelé « Millenium Condor » dans la version française du premier épisode produit.','2023-07-24 16:06:16',NULL,NULL),(10,2,'Quel nom porte le robot qu\'Anakin a construit à partir du corps d\'un droïde de protocole ?','Ce droïde protocolaire de forme humanoïde « maîtrise plus de six millions de formes de communication ».','2023-07-24 16:06:16',NULL,NULL),(11,4,'Quel basketteur américain a été champion NBA en 1998 pour la sixième fois de sa carrière ?','Dans les années 1990, les Bulls ont acquis un des plus beaux palmarès de la Ligue.','2023-07-24 16:06:16',NULL,NULL),(12,4,'Dans quel pays est né le joueur de basket-ball professionnel Tony Parker ?','Il évolue dans l\'équipe des Spurs de San Antonio depuis son arrivée dans la NBA en 2001.','2023-07-24 16:06:16',NULL,NULL),(13,4,'Qui a été élu joueur de la décennie 2000 suite à un sondage du site officiel NBA ?','Kobe Bryant est le seul joueur en activité en NBA à avoir inscrit plus de 30 000 points en carrière.','2023-07-24 16:06:16',NULL,NULL),(14,4,'Quel concours de dunks est organisé par la NBA durant le NBA All-Star Week-end ?','Lors de ce concours, chaque essai est noté de 6 à 10 par cinq juges (qui le plus souvent sont d\'anciens joueurs). ','2023-07-24 16:06:16',NULL,NULL),(15,4,'Quel basketteur américain a réalisé en 2000 un 360 degrés inversé mythique ?','Vince Carter est le premier joueur de l\'histoire des Nets à inscrire plus de 2000 points en une saison.','2023-07-24 16:06:16',NULL,NULL),(16,9,'Dans « World of Warcraft », quelle planète peut être atteinte via la Porte des Ténèbres ?','La Porte des ténèbres a été ouverte par Medivh sous l\'emprise de Sargeras, le fondateur de la Légion ardente.','2023-07-24 16:06:16',NULL,'https://fr.wikipedia.org/wiki/Lieux_de_Warcraft'),(17,9,'Quels joueurs de « World of Warcraft » collectent tout ce qui est monnayable dans le jeu ?','Les farmers sont parfois aussi des pirates qui s\'introduisent dans le compte d\'autres joueurs et revendent ce qu\'ils possèdent.','2023-07-24 16:06:16',NULL,'https://fr.wikipedia.org/wiki/World_of_Warcraft'),(18,9,'Quelle île d\'Azeroth constitue la terre natale de la civilisation Trolle ?','Les cinq continents d\'Azeroth sont séparés par La Grande Mer qui abrite en son centre un énorme vortex appelé Le Maelström.','2023-07-24 16:06:16',NULL,'https://fr.wikipedia.org/wiki/Lieux_de_Warcraft'),(19,9,'En quelle année fut fondé l\'empire humain d\'Arathor de « World of Warcraft » ?','Azeroth est composé de cinq continents : Les Royaumes de l\'Est, Kalimdor, Norfendre, Pandarie et les îles brisées au nord est.','2023-07-24 16:06:16',NULL,'https://fr.wikipedia.org/wiki/Lieux_de_Warcraft'),(20,9,'Dans « World of Warcraft », quel chaman est notamment le mentor de Gul\'dan ?','À la fin des évènements de la Deuxième Guerre, Ner\'zhul sera vaincu par l\'alliance des Humains, des Hauts-Elfes et des Nains.','2023-07-24 16:06:16',NULL,'https://fr.wikipedia.org/wiki/Personnages_de_Warcraft'),(21,10,'Quel est le but du personnage Zoro dans le manga One Piece ?',NULL,'2023-07-26 15:07:27',NULL,NULL),(22,10,'En arrivant dans le Blue Lock, quel numéro porte le héro Yoichi Isagi ?',NULL,'2023-07-26 15:07:27',NULL,NULL),(23,10,'Dans le manga My Hero Academia, comment se nomme le personnage ayant pour Alter le feu et la glace ?',NULL,'2023-07-26 15:07:27',NULL,NULL),(24,10,'Qui est le créateur des mangas : Dragon Ball et Dr Slump ?',NULL,'2023-07-26 15:07:27',NULL,NULL),(25,10,'En version française, qui double le personnage Saitama dans l\'animé One Punch Man ?',NULL,'2023-07-26 15:07:27',NULL,NULL),(26,11,'Il chante SOS d\'un terrien en détresse',NULL,'2023-07-26 15:31:06',NULL,NULL),(27,11,'Il appuie sur les touches d\'un clavier',NULL,'2023-07-26 15:31:06',NULL,NULL),(28,11,'Il passe son temps à resoudre des bugs',NULL,'2023-07-26 15:31:06',NULL,NULL),(29,11,'Il possède les plus beaux cheveux de France',NULL,'2023-07-26 15:31:06',NULL,NULL),(30,11,'Il ne voit le soleil que quelques heures par an',NULL,'2023-07-26 15:31:06',NULL,NULL),(31,12,'Quand a été crée The Walt Disney Company ?',NULL,'2023-07-26 15:50:30',NULL,NULL),(32,12,'Qui était le prédécesseur de Mickey Mouse ?',NULL,'2023-07-26 15:50:30',NULL,NULL),(33,12,'Comment s\'appelle le court-métrage qui a eu la première bande-son ?',NULL,'2023-07-26 15:50:30',NULL,NULL),(34,12,'Quel a été le premier film Disney ?',NULL,'2023-07-26 15:50:30',NULL,NULL),(35,12,'Quel est le nom de la princesse dans Rebelle ?',NULL,'2023-07-26 15:50:30',NULL,NULL),(36,13,'Combien de Korogus y a-t-il en tout à trouver dans Breath of the Wild ?',NULL,'2023-07-26 16:03:02',NULL,NULL),(37,13,'Quelles sont les trois divinités fondatrices d\'Hyrule ?',NULL,'2023-07-26 16:03:02',NULL,NULL),(38,13,'Comment s\'appelle le peuple aquatique, mi-homme, qui apparaît fréquemment dans la franchise Zelda ?',NULL,'2023-07-26 16:03:02',NULL,NULL),(39,13,'Combien de masques Link peut-il porter dans Majora\'s Mask ?',NULL,'2023-07-26 16:03:02',NULL,NULL),(40,13,'Dans The Wind Waker, quelle est la véritable identité du bâteau parlant Lion Rouge ?',NULL,'2023-07-26 16:03:02',NULL,NULL),(41,14,'Qui est le mentor de Geralt, lui ayant enseigné les voies des sorceleurs ?',NULL,'2023-07-26 16:30:41',NULL,NULL),(42,14,'Dans le jeu \"The Witcher 3: Wild Hunt\", quel démon joue un rôle central dans l\'intrigue de l\'extension \"Hearts of Stone\" ?',NULL,'2023-07-26 16:30:41',NULL,NULL),(43,14,'Quels pouvoirs spéciaux possède Ciri dans l\'univers de The Witcher ?',NULL,'2023-07-26 16:30:41',NULL,NULL),(44,14,'Quel sorceleur est connu pour porter deux épées, l\'une en acier pour tuer les humains, et l\'autre en argent pour tuer les monstres ?',NULL,'2023-07-26 16:30:41',NULL,NULL),(45,14,'Dans l\'univers de The Witcher, comment les sorceleurs acquièrent-ils leurs capacités surnaturelles ?',NULL,'2023-07-26 16:30:41',NULL,NULL),(46,3,'Quel humain devient surpuissant grâce à une armure de haute technologie ?','Cette armure pouvant voler jusqu\'à atteindre Mach 8 lui confère une force très supérieure à celle d\'un humain.','2023-08-01 10:00:44',NULL,NULL),(47,3,'Laquelle de ces propositions désigne un ennemi emblématique de Spider-Man ?','Le Bouffon vert possède une capacité de régénération rapide qui lui permet de guérir rapidement selon la gravité de ses blessures.','2023-08-01 10:00:44',NULL,NULL),(48,3,'Quelle super-héroïne portait à ses débuts un masque de chat avec une robe ?','Dans la culture populaire, Catwoman est devenue un symbole de la femme fatale, associant élégance, indépendance et beauté.','2023-08-01 10:00:44',NULL,NULL),(49,3,'Pour quel journal travaille Clark Kent, alias Superman ?','On retrouve le journal « Daily Planet » dans toutes les versions existantes des aventures de Superman.','2023-08-01 10:00:44','2023-08-01 10:08:23',NULL),(50,3,'Quel super-héros ayant perdu la vue possède des organes sensoriels développés ?','Daredevil a (ironiquement) obtenu ses pouvoirs en perdant la vue à l\'âge de neuf ans, sauvant ainsi un passant aveugle.','2023-08-01 10:00:44','2023-08-01 10:17:21',NULL),(51,15,'Dans Final Fantasy VII, qui donne l\'épée au protagoniste Cloud Strife ?',NULL,'2023-08-01 10:14:38',NULL,NULL),(52,15,'Sous quel nom se présente l\'unité d\'élite de l\'université dans Final Fantasy VIII ?',NULL,'2023-08-01 10:14:38',NULL,NULL),(53,15,'Dans Final Fantasy IX, Comment se nomme le mage noir jouable ?',NULL,'2023-08-01 10:14:38',NULL,NULL),(54,15,'Comment s\'appelle le sport pratiquer par le protagoniste dans Final Fantasy X ?',NULL,'2023-08-01 10:14:38',NULL,NULL),(55,15,'Dans les différents jeux Final Fantasy, quel animal peut-on chevaucher pour être utiliser comme moyen de transport ?',NULL,'2023-08-01 10:14:38',NULL,NULL),(56,5,'Quel est le type de vaisseau spatial du film « Alien, le huitième passager » ?','En 2122, le cargo interstellaire Nostromo, de retour vers la Terre à la fin de sa mission de raffinerie, capte un signal sonore.','2023-08-01 10:30:50',NULL,NULL),(57,5,'Quel parasite génère des embryons dans la gorge des humains ?','Cet étreigneur de visage, qui se déplace très vite, est également capable de courir et de sauter sur de grandes distances.','2023-08-01 10:30:50','2023-08-01 10:34:17',NULL),(58,5,'Comment meurt Ripley dans le film « Alien 3 » réalisé par David Fincher ?','Si dans l\'édition de 1992, la Reine alien sort du corps de Ripley quand celle-ci se suicide, il n\'en est rien dans la version longue.','2023-08-01 10:30:50',NULL,NULL),(59,5,'Qui a réalisé le film de science-fiction « Alien, le huitième passager » ?','Ridley Scott est reconnu pour son style visuel très concentré et atmosphérique, qui a inspiré un grand nombre de réalisateurs.','2023-08-01 10:30:50',NULL,NULL),(60,5,'Quel animal de compagnie possèdent les membres du Nostromo ?','Aidé par l\'équipage, le chat Jones aura la lourde tache de tenter de survivre parmi les aliens présents dans son vaisseau spatial.','2023-08-01 10:30:50',NULL,NULL),(61,6,'Qui est la soeur aînée des héroïnes de la série télévisée « Charmed » ?','La série raconte l\'histoire de trois soeurs qui deviennent sorcières en héritant des pouvoirs transmis par leurs aïeules.','2023-08-01 10:48:36',NULL,'https://fr.wikipedia.org/wiki/Charmed'),(62,6,'Dans laquelle de ces séries télévisées trouve-t-on un super-héros ?','Cette série télévisée de science-fiction américaine en 218 épisodes de 42 minutes raconte la jeunesse du futur Superman.','2023-08-01 10:48:36',NULL,'https://fr.wikipedia.org/wiki/Smallville_(série_télévisée)'),(63,6,'Quelle est la couleur des cheveux de Miranda dans la série « Sex and the City » ?','Miranda est avocate et sa carrière tient la place la plus importante dans sa vie.','2023-08-01 10:48:36',NULL,'https://fr.wikipedia.org/wiki/Miranda_Hobbes'),(64,6,'Combien de saisons compte la série télé « Lost, les disparus » créée par J.J. Abrams ?','Bien que d\'abord hésitant, J.J. Abrams était enthousiasmé par le concept de la série, à condition que celle-ci ait un angle surnaturel.','2023-08-01 10:48:36',NULL,'https://fr.wikipedia.org/wiki/Lost_:_Les_Disparus'),(65,6,'Qui est le meilleur ami de Dawson dans la série télévisée du même nom ?','La série « Dawson » a été créée par Kevin Williamson, l\'auteur de la trilogie des « Scream ».','2023-08-01 10:48:36',NULL,'https://fr.wikipedia.org/wiki/Dawson_(série_télévisée)'),(66,7,'Quel est à ce jour le second stade de France de par sa capacité en nombre de supporters ?','Juste avant la Coupe du monde de football de 1998, l\'enceinte est passée à 60 000 places et n\'a désormais plus de toit.','2023-08-01 11:01:35',NULL,'https://fr.wikipedia.org/wiki/Stade_Vélodrome'),(67,7,'L\'Olympique lyonnais a quitté le stade Gerland pour quelle commune ?','Le stade de Gerland accueille désormais les matchs de l\'équipe féminine depuis que le stade de Décines est opérationnel.','2023-08-01 11:01:35',NULL,'https://fr.wikipedia.org/wiki/Olympique_lyonnais'),(68,7,'Quel autre nom porte également le stade de la Beaujoire du FC Nantes ?','L\'idée de construire un nouveau stade de football à Nantes sera lancée à la fin des années 1970 par Louis Fonteneau.','2023-08-01 11:01:35',NULL,'https://fr.wikipedia.org/wiki/Stade_de_la_Beaujoire'),(69,7,'Où jouait l\'OGC Nice avant d\'utiliser l\'Allianz Riviera depuis 2013 ?','Le terme Ray correspond au nom du quartier où se trouve le stade qui a accueilli les matchs de l\'OGC Nice de 1927 à 2013.','2023-08-01 11:01:35',NULL,'https://fr.wikipedia.org/wiki/Stade_Léo-Lagrange_(Nice)'),(70,7,'Quel stade Le Mans FC a-t-il longtemps utilisé avant le MMArena ?','L\'enceinte portait le nom d\'une personnalité mancelle (Léon Bollée), fameux pionnier de la construction automobile du XIXe siècle.','2023-08-01 11:01:35',NULL,'https://fr.wikipedia.org/wiki/Stade_Léon-Bollée'),(71,8,'Quel est le lien de parenté entre Lancelot du Lac et la Dame du Lac ?','Envoyée pour lui confier la quête du Graal, seul Roi Arthur peut voir, entendre et converser avec la Dame du Lac.','2023-08-01 11:08:57',NULL,'https://fr.wikipedia.org/wiki/Personnages_de_Kaamelott'),(72,8,'Quel est le grade de Caius dans la série télévisée « Kaamelott » ?','Arthur le retrouvera à plusieurs reprises dans un camp romain abandonné, en uniforme de centurion, et allongé sur une couche.','2023-08-01 11:08:57',NULL,'https://fr.wikipedia.org/wiki/Personnages_de_Kaamelott'),(73,8,'Quel surnom Attila, chef des Huns, porte-t-il dans la série « Kaamelott » ?','On dit de lui que là où il passe, l\'herbe ne repousse jamais. Dans Kaamelott, néanmoins, le seul chevalier à le redouter est Bohort.','2023-08-01 11:08:57',NULL,'https://fr.wikipedia.org/wiki/Personnages_de_Kaamelott'),(74,8,'Laquelle de ces affirmations concernant Karadoc est fausse ?','Karadoc de Vannes est le meilleur ami de Perceval et est aussi incompétent que lui en ce qui concerne les quêtes et les combats.','2023-08-01 11:08:57',NULL,'https://fr.wikipedia.org/wiki/Personnages_de_Kaamelott'),(75,8,'En dehors d\'Arthur, avec quel autre personnage Excalibur semble-t-elle réagir ?','Certains considèrent qu\'Excalibur et l\'Épée du Rocher (preuve du lignage d\'Arthur) ne sont qu\'une seule et même arme.','2023-08-01 11:08:57',NULL,'https://fr.wikipedia.org/wiki/Excalibur'),(76,16,'En quelle année est sorti la pépite de DJ Shadow, Organ Donor  ?',NULL,'2023-08-02 09:19:37',NULL,NULL),(77,16,'De quel pays est originaire la légendaire Spiral Tribe ?',NULL,'2023-08-02 09:19:37',NULL,NULL),(78,16,'Quelle est la limite de volume à partir de laquelle il devient dangereux de s\'exposer pendant trop longtemps ?',NULL,'2023-08-02 09:19:37',NULL,NULL),(79,16,'Dans quel monument les Heretics ont-ils organisés une fête sauvage au nez et à la barbe des autorités?',NULL,'2023-08-02 09:19:37',NULL,NULL),(80,16,'De tout ce qu\'on peut ramener en teuf sauvage, c\'est quoi le plus important ?',NULL,'2023-08-02 09:19:37','2023-08-02 09:21:20',NULL);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A412FA9212469DE2` (`category_id`),
  CONSTRAINT `FK_A412FA9212469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,5,'Applications web','applications-web','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/applicationweb.jpg',NULL,'2023-07-24 14:40:14','2023-07-24 14:41:13'),(2,1,'Héros de Star Wars','heros-de-star-wars','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/starwars.jpg',NULL,'2023-07-24 14:40:15',NULL),(3,1,'Comics','comics','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/comics.jpg',NULL,'2023-07-24 14:40:15',NULL),(4,3,'NBA','nba','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/nba.jpg',NULL,'2023-07-24 14:40:15',NULL),(5,1,'Alien: la saga','alien-la-saga','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/alien.jpg',NULL,'2023-07-24 14:40:15',NULL),(6,1,'Séries américaines','series-americaines','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/series-americaines.jpg',NULL,'2023-07-24 14:40:15',NULL),(7,3,'Stades de Ligue 1','stades-de-ligue-1','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/ligue1.jpg',NULL,'2023-07-24 14:40:15',NULL),(8,1,'Héros de Kaamelott','heros-de-kaamelott','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/kaamelott.jpg',NULL,'2023-07-24 14:40:15',NULL),(9,4,'World of Warcraft','world-of-warcraft','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/wow.jpg',NULL,'2023-07-24 14:40:15',NULL),(10,6,'Manga','manga','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/perso-manga.jpg',NULL,'2023-07-26 15:01:58',NULL),(11,2,'Dev, Dave ou les deux','dev-dave-ou-les-deux','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/perso-dave.jpg',NULL,'2023-07-26 15:39:12',NULL),(12,1,'Disney','disney','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/perso-disney.jpg',NULL,'2023-07-26 15:38:54',NULL),(13,4,'Zelda','zelda','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/perso-zelda.jpg',NULL,'2023-07-26 16:02:27',NULL),(14,4,'The Witcher','the-witcher','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/perso-witcher.jpg',NULL,'2023-07-26 16:28:59',NULL),(15,4,'Final Fantasy','final-fantasy','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/ff.jpg',NULL,'2023-08-01 10:10:29',NULL),(16,2,'Musique électronique','musique-electronique','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/quiz/perso-musique.jpg',NULL,'2023-08-02 09:18:35',NULL);
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_32993751A76ED395` (`user_id`),
  KEY `IDX_32993751853CD175` (`quiz_id`),
  CONSTRAINT `FK_32993751853CD175` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`),
  CONSTRAINT `FK_32993751A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
/*!40000 ALTER TABLE `score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:json)',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','$2y$13$.7pLi/ULUxcvqVHiry8I1.SrO5svUYw9/snCmhrwCKsykIRYwn32W','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/profil/icone-verte.png','admin@gmail.com','[\"ROLE_ADMIN\"]','2023-07-24 14:37:18','2023-08-02 17:21:41'),(2,'Rudy','$2y$13$kYLhueicMjW6a5pIjYwBEeFfRu4geh2xFnVcqKDV86QTlwK0DzlCS','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/profil/icone-bleue.png','rudy@oquiz.com','[\"ROLE_ADMIN\"]','2023-07-27 19:33:06','2023-08-02 17:21:59'),(3,'Mathias','$2y$13$KrRCn5PygSxn4skTx9QAz.pojKcbjV8V07LhF22CObwQBD0ahAMSq','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/profil/icone-rouge.png','mathias@oquiz.com','[\"ROLE_ADMIN\"]','2023-07-27 19:33:50','2023-08-02 17:22:11'),(4,'Nina','$2y$13$WH4/vyksbv2bBhGElLKPie8DMtip93k2YORZqjKuYxS.kNvYyvUw.','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/profil/icone-jaune.png','nina@oquiz.com','[\"ROLE_USER\"]','2023-07-27 19:34:01','2023-08-02 17:22:23'),(5,'Loic','$2y$13$gxxraFKPnjV9tITwzfbLaOk9sMyMv3b9i07W8WfHwdDFXXy3IttVy','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/profil/icone-verte.png','loic@oquiz.com','[\"ROLE_USER\"]','2023-07-27 19:34:30','2023-08-02 17:22:34'),(6,'Sylvain','$2y$13$kX9Rp7OsCI7pxfDtbyk8IuJbJz/og8I23O7b8gjHOKo1UNV.dCJSy','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/profil/icone-orange.png','sylvain@oquiz.com','[\"ROLE_USER\"]','2023-07-27 19:35:41','2023-08-02 17:22:47'),(7,'Colin','$2y$13$0pUmVrOTZG8wsW8jGSvZ5eCfQ1Xmw7uLIVQmp.CEYOVAj5kD8TAXm','https://mathiasmurcia-server.eddi.cloud/deploiement/projet-o-quiz-back/public/images/profil/icone-orange.png','colin@oquiz.com','[\"ROLE_USER\"]','2023-07-27 19:35:50','2023-08-02 17:22:58');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-02 18:12:41
