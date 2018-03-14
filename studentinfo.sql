-- MySQL dump 10.16  Distrib 10.1.30-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: students
-- ------------------------------------------------------
-- Server version	10.1.30-MariaDB

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
-- Table structure for table `studentinfo`
--

DROP TABLE IF EXISTS `studentinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentinfo`
--

LOCK TABLES `studentinfo` WRITE;
/*!40000 ALTER TABLE `studentinfo` DISABLE KEYS */;
INSERT INTO `studentinfo` VALUES (1,'isuru mahesh','isurumahesh97@gmail.com','cpwd_0001'),(2,'namal perera','namalperera333@gmail.com','cpwd_0002'),(3,'sandun mahesh','sandunmahesh@gmail.com','cpwd_0003'),(4,'ravindu silva','ravindusilva@gmail.com','cpwd_0004'),(5,'priyan darshana','priayndarshana@gmail.com','cpwd_0005'),(6,'lakmal asela','lakmalasela@gmail.com','cpwd_0006'),(7,'anjula botheju','anjulabotheju@gmail.com','cpwd_0007'),(8,'nirmal silva','nirmalsilva@imail.com','cpwd_0008'),(9,'sandun lakshitha','sandunlakshitha@gmail.com','cpwd_0009'),(10,'chathun thushantha','chathunthushantha@gmail.com','cpwd_0010'),(11,'kavindu anjana','kavinduanjana@gmail.com','cpwd_0011'),(12,'seshan dhanushka','seshandhanushka@gmail.com','cpwd_0012'),(13,'sandupama nayanamina','sandupamanayanamina@gmail.com','cpwd_0013'),(14,'ishan lakshitha','ishanlakshitha@gmail.com','cpwd_0014'),(15,'lahiru perera','lahiruperera@gmail.com','cpwd_0015'),(16,'gihan randeniya','gihanrandeniya@gmail.com','cpwd_0016'),(17,'upul anjana','upulanjana@gmail.com','cpwd_0017'),(18,'kavindu perera','kavinduperera97@gmail.com','cpwd_0018'),(19,'nirmal de silva','nirmaldesilva7@gmail.com','cpwd_0019'),(20,'ashen prbashvara','ashenprabashvara@gmail.com','cpwd_0020'),(21,'chathun thushantha','chathunthushantha@gmail.com','cpwd_0021'),(22,'lahiru perera','lahiruperera@gmail.com','cpwd_0022'),(23,'sandun mahesh','sandunmahesh@gmail.com','cpwd_0023'),(24,'ravindu silva','ravindusilva@gmail.com','cpwd_0024'),(25,'priyan darshana','priayndarshana@gmail.com','cpwd_0025'),(26,'lakmal asela','lakmalasela@gmail.com','cpwd_0026'),(27,'anjula botheju','anjulabotheju@gmail.com','cpwd_0027'),(28,'sandupama nayanamina','sandupamanayanamina@gmail.com','cpwd_0028'),(29,'kavindu perera','kavinduperera97@gmail.com','cpwd_0029'),(30,'isuru mahesh','isurumahesh97@gmail.com','cpwd_0030'),(31,'kavindu anjana','kavinduanjana@gmail.com','cpwd_0031'),(32,'seshan dhanushka','seshandhanushka@gmail.com','cpwd_0032'),(33,'nirmal silva','nirmalsilva@imail.com','cpwd_0033'),(34,'ishan lakshitha','ishanlakshitha@gmail.com','cpwd_0034'),(35,'upul anjana','upulanjana@gmail.com','cpwd_0035'),(36,'gihan randeniya','gihanrandeniya@gmail.com','cpwd_0036'),(37,'ashen prbashvara','ashenprabashvara@gmail.com','cpwd_0037'),(38,'sandun lakshitha','sandunlakshitha@gmail.com','cpwd_0038'),(39,'nirmal de silva','nirmaldesilva7@gmail.com','cpwd_0039'),(40,'ishan lakshitha','ishanlakshitha@gmail.com','cpwd_0040'),(41,'lakmal asela','lakmalasela@gmail.com','cpwd_0041'),(42,'upul anjana','upulanjana@gmail.com','cpwd_0042'),(43,'sandun mahesh','sandunmahesh@gmail.com','cpwd_0043'),(44,'ishan lakshitha','ishanlakshitha@gmail.com','cpwd_0044'),(45,'priyan darshana','priayndarshana@gmail.com','cpwd_0045'),(46,'chathun thushantha','chathunthushantha@gmail.com','cpwd_0046'),(47,'anjula botheju','anjulabotheju@gmail.com','cpwd_0047'),(48,'sandupama nayanamina','sandupamanayanamina@gmail.com','cpwd_0048'),(49,'kavindu perera','kavinduperera97@gmail.com','cpwd_0049'),(50,'isuru mahesh','isurumahesh97@gmail.com','cpwd_0050'),(51,'ashen prbashvara','ashenprabashvara@gmail.com','cpwd_0051'),(52,'seshan dhanushka','seshandhanushka@gmail.com','cpwd_0052'),(53,'nirmal silva','nirmalsilva@imail.com','cpwd_0053'),(54,'ishan lakshitha','ishanlakshitha@gmail.com','cpwd_0054'),(55,'lahiru perera','lahiruperera@gmail.com','cpwd_0055'),(56,'gihan randeniya','gihanrandeniya@gmail.com','cpwd_0056'),(57,'kavindu perera','kavinduperera97@gmail.com','cpwd_0057'),(58,'sandun lakshitha','sandunlakshitha@gmail.com','cpwd_0058');
/*!40000 ALTER TABLE `studentinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-04 23:01:19
