-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: newssystem
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `newsid` int(4) NOT NULL AUTO_INCREMENT,
  `letterid` int(3) unsigned NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`newsid`),
  KEY `fk_newsletter_letter_id_idx` (`letterid`),
  CONSTRAINT `fk_newsletter_letter_id` FOREIGN KEY (`letterid`) REFERENCES `newsletter` (`letterid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,1,'Newsletter 1 zu MySQL','2014-01-03'),(2,1,'Newsletter 2 zu MySQL','2014-03-01'),(3,2,'Newsletter zu MacOS X','2014-03-01');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter` (
  `letterid` int(3) unsigned NOT NULL,
  `shorttext` text NOT NULL,
  `longtext` longtext NOT NULL,
  `teaser` mediumtext NOT NULL,
  PRIMARY KEY (`letterid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter`
--

LOCK TABLES `newsletter` WRITE;
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
INSERT INTO `newsletter` VALUES (1,'MySQL-Community-Server','Der Newsletter richtet sich an alle, die über den MySQL-Community-Server auf dem Laufenden bleiben möchten. Sie erhalten vier mal im Jahr aktuelle Informationen rund um MySQL und verwandte Themen.','Liebe Abonnentin, Lieber Abonnent, vielen Dank für die Bestellung des Newsletters zum MySQL-Community-Server. Bitte bestätigen Sie diese E-Mail noch einmal durch Klick auf den unten stehenden Link. Hat diese E-Mail Sie unberechtigter Weise erreicht, so reagieren Sie einfach nicht. Ihre Mail-Adresse wird dann nach 48 Stunden automatisch aus unserem Verteiler gelöscht.'),(2,'MacOS X Betriebssystem','Der Newsletter richtet sich an alle, die über das MacOS X Betriebssystem auf dem Laufenden bleiben möchten. Sie erhalten vier mal im Jahr aktuelle Informationen rund um Apple und verwandte Themen.','Liebe Abonnentin, Lieber Abonnent, vielen Dank für die Bestellung des Newsletters zum MacOS X Betriebssystem. Bitte bestätigen Sie diese E-Mail noch einmal durch Klick auf den unten stehenden Link. Hat diese E-Mail Sie unberechtigter Weise erreicht, so reagieren Sie einfach nicht. Ihre Mail-Adresse wird dann nach 48 Stunden automatisch aus unserem Verteiler gelöscht.');
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriber`
--

DROP TABLE IF EXISTS `subscriber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriber` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `vname` char(30) NOT NULL,
  `name` char(30) NOT NULL,
  `email` char(100) NOT NULL,
  `date` char(50) NOT NULL,
  `checked` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriber`
--

LOCK TABLES `subscriber` WRITE;
/*!40000 ALTER TABLE `subscriber` DISABLE KEYS */;
INSERT INTO `subscriber` VALUES (1,'Max','Mustermann','max@muster.de','2014-06-01','9182739812738912793812981273as'),(2,'Susanne','Müller','susanne@mueller.de','2014-06-02','123675127635172667152673zu');
/*!40000 ALTER TABLE `subscriber` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `id` int(3) unsigned NOT NULL,
  `letterid` int(3) unsigned NOT NULL,
  PRIMARY KEY (`id`,`letterid`),
  KEY `fk_newsletter_letterid_idx` (`letterid`),
  CONSTRAINT `fk_newsletter_letterid` FOREIGN KEY (`letterid`) REFERENCES `newsletter` (`letterid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_subscriber_id` FOREIGN KEY (`id`) REFERENCES `subscriber` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
INSERT INTO `subscription` VALUES (1,1),(2,1),(1,2),(2,2);
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-13 12:51:03
