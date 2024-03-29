-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: spital
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.6-MariaDB

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
-- Table structure for table `terminet`
--

DROP TABLE IF EXISTS `terminet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terminet` (
  `idterminet` int(11) NOT NULL AUTO_INCREMENT,
  `idpacienti` int(11) DEFAULT NULL,
  `idnurse` int(11) DEFAULT NULL,
  `data_termin` datetime DEFAULT NULL,
  `pershkrim` varchar(255) DEFAULT NULL,
  `idmjeku` int(11) DEFAULT NULL,
  PRIMARY KEY (`idterminet`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terminet`
--

LOCK TABLES `terminet` WRITE;
/*!40000 ALTER TABLE `terminet` DISABLE KEYS */;
INSERT INTO `terminet` VALUES (1,1,3,'2020-03-08 00:00:00','dfgdfgd',1),(2,6,24,'2020-03-11 00:00:00','valtonuaaa',2),(3,6,24,'0000-00-00 00:00:00','une e bona',2),(4,1,3,'0000-00-00 00:00:00','',2),(5,4,3,'1996-02-29 00:00:00','unuri duhet',4),(6,7,26,'2020-03-09 00:00:00','Dhembje te pa shpjeguara',27),(7,2,3,'0000-00-00 00:00:00','Te mjeku ',2),(8,6,3,'0000-00-00 00:00:00','Te mjeku \n',2);
/*!40000 ALTER TABLE `terminet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-13 23:40:44
