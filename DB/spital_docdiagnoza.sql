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
-- Table structure for table `docdiagnoza`
--

DROP TABLE IF EXISTS `docdiagnoza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docdiagnoza` (
  `iddiagnoze` varchar(10) NOT NULL,
  `pershkrim` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddiagnoze`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docdiagnoza`
--

LOCK TABLES `docdiagnoza` WRITE;
/*!40000 ALTER TABLE `docdiagnoza` DISABLE KEYS */;
INSERT INTO `docdiagnoza` VALUES ('A00','Kolera '),('A01','Tifo e Paratifo (Ethet tifoide e paratifoide)'),('A02','Infeksione te tjera nga salmonelat'),('A03','Shigeloza'),('A04','Infeksione te tjera bakteriale intestinale'),('A05','Intoksikacione te tjera bakteriale me transme'),('A06','Amebiaza'),('A07','Semundje te tjera nga protozoaret e zorreve'),('B00','Infeksione herpetike virale (=Herpes i thjesh'),('B01','Varicela (=Lija e dhenve)'),('B02','Zoster (=Herpes zoster)'),('B03','Lija'),('B04','Lija e majmuneve'),('B05','Fruthi'),('B06','Rubeola'),('B07','Kondilomat virale të lekures'),('B08','Infeksione te tjera virale me demtime të leku'),('B09','Infeksione virale te paspecifikuara me demtim');
/*!40000 ALTER TABLE `docdiagnoza` ENABLE KEYS */;
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
