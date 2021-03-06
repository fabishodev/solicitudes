-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: aspaaug
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `tram_eventos`
--

DROP TABLE IF EXISTS `tram_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tram_eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(255) DEFAULT NULL,
  `des_evento` mediumtext,
  `estatus` tinyint(1) DEFAULT NULL,
  `lugar` mediumtext,
  `hora_inicio` datetime DEFAULT NULL,
  `hora_fin` datetime DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `fecha_actualizado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_evento_UNIQUE` (`nombre_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tram_eventos`
--

LOCK TABLES `tram_eventos` WRITE;
/*!40000 ALTER TABLE `tram_eventos` DISABLE KEYS */;
INSERT INTO `tram_eventos` VALUES (1,'Dia Del Niño 2015','Festival del dia del Niño',1,'ASPAREC','0000-00-00 09:00:00','0000-00-00 18:00:00','2015-05-30 00:00:00','2015-05-30 00:00:00',1,'2015-04-16 13:00:00','2015-04-28 16:57:25'),(3,'Dia del Padre 2015','Entrega de botellas Dia del Padre',1,'Auditorio de la Universidad de Guanajuato','0000-00-00 09:00:00','0000-00-00 18:00:00','2015-06-10 00:00:00','2015-06-10 00:00:00',1,'2015-04-22 17:12:38','2015-04-28 16:57:29'),(4,'Dia del Marestro 2015','Entrega de mochilas dia del maestro 2015',1,'Auditorio de la Universidad de Guanajuato','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-05-15 00:00:00','2015-05-15 00:00:00',1,'2015-04-28 20:55:47',NULL);
/*!40000 ALTER TABLE `tram_eventos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-28 15:36:01
