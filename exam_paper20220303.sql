-- MySQL dump 10.16  Distrib 10.1.32-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: exam_pastpaper
-- ------------------------------------------------------
-- Server version	10.1.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `exam_classes`
--

DROP TABLE IF EXISTS `exam_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_classes` (
  `exam_class_id` tinyint(4) NOT NULL,
  `exam_class` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `exam_type_id` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`exam_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_classes`
--

LOCK TABLES `exam_classes` WRITE;
/*!40000 ALTER TABLE `exam_classes` DISABLE KEYS */;
INSERT INTO `exam_classes` VALUES (1,'STD FOUR','1'),(2,'STD SIX','1'),(3,'FORM TWO','1'),(4,'FORM FOUR','2'),(5,'FORM SIX','2'),(6,'FORM II MOCK','3'),(7,'FORM IV MOCK','3'),(8,'FORM VI MOCK','3');
/*!40000 ALTER TABLE `exam_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_level`
--

DROP TABLE IF EXISTS `exam_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_level` (
  `school_level_id` tinyint(4) NOT NULL,
  `school_level_name` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`school_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_level`
--

LOCK TABLES `exam_level` WRITE;
/*!40000 ALTER TABLE `exam_level` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_subject`
--

DROP TABLE IF EXISTS `exam_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_subject` (
  `exam_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_subject` varchar(45) NOT NULL,
  `exam_class_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`exam_subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_subject`
--

LOCK TABLES `exam_subject` WRITE;
/*!40000 ALTER TABLE `exam_subject` DISABLE KEYS */;
INSERT INTO `exam_subject` VALUES (1,'ENGLISH',1),(2,'HISABATI',1),(3,'KISWAHILI',1),(4,'MATHEMATICS',1),(5,'SAYANSI',1),(6,'SCIENCE',1),(7,'ARABIC',2),(8,'DINI',2),(9,'ENGLISH',2),(10,'GEOGRAPHY',2),(11,'HISTORIA',2),(12,'HISTORY',2),(13,'ICT',2),(14,'KISWAHILI',2),(15,'MATHEMATICS',2),(16,'SCIENCE',2),(17,'ARABIC',3),(18,'ARCHITECURAL DRAUGHTING',3),(19,'BIOLOGY',3),(20,'BOOK KEEPING',3),(21,'BUILDING CONSTRUCTION ',3),(22,'CHEMISTRY',3),(23,'CIVICS',3),(24,'COMMERCE',3),(25,'COMPUTER',3),(26,'DINI',3),(27,'ELECTRICAL ENGINEERING',3),(28,'ELECTRONICS & COM.ENG',3),(29,'ENG.SCIENCE',3),(30,'ENGLISH',3),(31,'FINE ART',3),(32,'FRENCH ',3),(33,'GEOGRAPHY',3),(34,'H.ECONOMICS',3),(35,'HISTORY',3),(36,'KISWAHILI',3),(37,'MATHEMATICS',3),(38,'MECH.DRAUGHTING',3),(39,'MECH.ENGINEERING',3),(40,'P.EDUCATION',3),(41,'PHYSICS',3),(42,'BASIC MATHEMATIC',4),(43,'BIOLOGY',4),(44,'BOOK KEEPING',4),(45,'CHEMISTRY',4),(46,'CIVICS',4),(47,'COOMERCE',4),(48,'COMPUTER STUDIES',4),(49,'DINI YA KIISLAMY',4),(50,'GEOGRAPHY',4),(51,'HISTORY ',4),(52,'KISWAHILI',4),(53,'LITERATURE',4),(54,'PHYSICS',4),(55,'ENGLISH LANGUAGE',4),(56,'AGRICULTURE',4),(57,'BIBLE KNOWLEDGE',4),(58,'ADVANCE MATHEMATICS',5),(59,'BASIC APPLIED MATHEMATICS',5),(60,'ACSEE BIOLOGY',5),(61,'ACSEE PHYSICS',5),(62,'ACSEE CHEMISTRY',5),(63,'ACSEE COMMERCE',5),(64,'ACSEE ECONOMICS',5),(65,'ACSEE ENGLISH LANGUAGE',5),(66,'ACSEE GENERAL STUDIES',5),(67,'ACSEE GEOGRAPHY',5),(68,'ACSEE HISTORY',5),(69,'ACSEE ISLAMIC KNOWLEDGE',5),(70,'ACSEE KISWAHILI',5);
/*!40000 ALTER TABLE `exam_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_type`
--

DROP TABLE IF EXISTS `exam_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_type` (
  `exam_type_id` tinyint(4) NOT NULL,
  `exam_type_name` char(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`exam_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_type`
--

LOCK TABLES `exam_type` WRITE;
/*!40000 ALTER TABLE `exam_type` DISABLE KEYS */;
INSERT INTO `exam_type` VALUES (1,'ZEC'),(2,'NECTA'),(3,'MOCK');
/*!40000 ALTER TABLE `exam_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_year`
--

DROP TABLE IF EXISTS `exam_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_year` (
  `exam_year_id` tinyint(4) NOT NULL,
  `exam_year` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`exam_year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_year`
--

LOCK TABLES `exam_year` WRITE;
/*!40000 ALTER TABLE `exam_year` DISABLE KEYS */;
INSERT INTO `exam_year` VALUES (1,'2010'),(2,'2011'),(3,'2012'),(4,'2013'),(5,'2014'),(6,'2015'),(7,'2016'),(8,'2017'),(9,'2018'),(10,'2019'),(11,'2020');
/*!40000 ALTER TABLE `exam_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `past_papers`
--

DROP TABLE IF EXISTS `past_papers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `past_papers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_type_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exam_year` year(4) DEFAULT NULL,
  `attachment` longtext COLLATE utf8_unicode_ci,
  `createdDate` datetime DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `past_papers`
--

LOCK TABLES `past_papers` WRITE;
/*!40000 ALTER TABLE `past_papers` DISABLE KEYS */;
INSERT INTO `past_papers` VALUES (1,'3','127',2015,'481663.pdf','2022-03-02 12:28:44','2022-03-02 12:28:44',NULL),(2,'3','127',2015,'889346.pdf','2022-03-02 13:22:41','2022-03-02 13:22:41',NULL),(3,'2','10',2010,'200921.pdf','2022-03-02 13:23:33','2022-03-02 13:23:33',NULL);
/*!40000 ALTER TABLE `past_papers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `salutation` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(40) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `userLocation` int(11) NOT NULL,
  `roleName` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `login` tinyint(4) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Mr','Admin','A','Admin','ZNZ','0777890939','r.saleh@moez.go.tz','admin','ff668aa261b6f4e3d73915fcc93176e0ac992558d1145e963',1,'1',1,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_privilege`
--

DROP TABLE IF EXISTS `user_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_privilege` (
  `user_privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(100) NOT NULL,
  PRIMARY KEY (`user_privilege_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_privilege`
--

LOCK TABLES `user_privilege` WRITE;
/*!40000 ALTER TABLE `user_privilege` DISABLE KEYS */;
INSERT INTO `user_privilege` VALUES (1,'Administrator'),(2,'Manager');
/*!40000 ALTER TABLE `user_privilege` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-03 16:26:40
