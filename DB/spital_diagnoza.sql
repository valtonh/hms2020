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
-- Table structure for table `diagnoza`
--

DROP TABLE IF EXISTS `diagnoza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnoza` (
  `iddiagnoza` int(11) NOT NULL AUTO_INCREMENT,
  `idmjeku` int(11) DEFAULT NULL,
  `idpacienti` int(11) DEFAULT NULL,
  `idtermini` int(11) DEFAULT NULL,
  `idllojdiagnoza` varchar(10) DEFAULT NULL,
  `pershkrim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iddiagnoza`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnoza`
--

LOCK TABLES `diagnoza` WRITE;
/*!40000 ALTER TABLE `diagnoza` DISABLE KEYS */;
INSERT INTO `diagnoza` VALUES (2,4,4,5,'A06','po po shkoj erfifi'),(3,2,6,3,'A00','Docktor kolera'),(4,2,1,4,'B05','Leja e qenit doktor'),(5,27,7,6,'B03','antibiotik'),(6,2,6,2,'B08','Keq e ka honger \nJepi inkecion: Penicilin per 7 dite rradhazi'),(7,2,6,8,'A00','testohet');
/*!40000 ALTER TABLE `diagnoza` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-13 23:40:45
