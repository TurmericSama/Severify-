-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: smart
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `bugs_t`
--

DROP TABLE IF EXISTS `bugs_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bugs_t` (
  `bug_id` varchar(13) NOT NULL,
  `bugdesc` varchar(300) DEFAULT NULL,
  `tester` varchar(5) NOT NULL,
  `proj_id` varchar(13) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `severity` varchar(6) DEFAULT NULL,
  `replicate` varchar(100) DEFAULT NULL,
  `bstatus` varchar(7) DEFAULT 'unfixed',
  PRIMARY KEY (`bug_id`),
  KEY `tester` (`tester`),
  KEY `proj_id` (`proj_id`),
  CONSTRAINT `bugs_t_ibfk_1` FOREIGN KEY (`tester`) REFERENCES `user_t` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bugs_t_ibfk_2` FOREIGN KEY (`proj_id`) REFERENCES `project_t` (`proj_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bugs_t`
--

LOCK TABLES `bugs_t` WRITE;
/*!40000 ALTER TABLE `bugs_t` DISABLE KEYS */;
INSERT INTO `bugs_t` VALUES ('BUG7949691550','balance does not deduct','U0004','PRJ6909030345','2018-10-01 23:54:39','medium','../../tester/report/images/omaewa.mp4','unfixed'),('BUG8321237118','Finished','U0005','PRJ0929662504','2018-10-15 00:36:11',NULL,NULL,'fixed'),('BUG9514705997','No data','U0005','PRJ0929662504','2018-10-10 14:20:57','low','../../tester/report/images/masaya.mp4','unfixed');
/*!40000 ALTER TABLE `bugs_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_t`
--

DROP TABLE IF EXISTS `project_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_t` (
  `proj_id` varchar(13) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pdesc` varchar(300) DEFAULT NULL,
  `creator` varchar(5) DEFAULT NULL,
  `coder` varchar(5) DEFAULT NULL,
  `tester` varchar(5) DEFAULT NULL,
  `source` varchar(13) DEFAULT NULL,
  `status` varchar(13) DEFAULT 'coding',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`proj_id`),
  KEY `creator` (`creator`),
  KEY `coder` (`coder`),
  KEY `tester` (`tester`),
  KEY `source` (`source`),
  CONSTRAINT `project_t_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user_t` (`user_id`),
  CONSTRAINT `project_t_ibfk_2` FOREIGN KEY (`coder`) REFERENCES `user_t` (`user_id`),
  CONSTRAINT `project_t_ibfk_3` FOREIGN KEY (`tester`) REFERENCES `user_t` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_t`
--

LOCK TABLES `project_t` WRITE;
/*!40000 ALTER TABLE `project_t` DISABLE KEYS */;
INSERT INTO `project_t` VALUES ('PRJ0105413015','HourNet10','Unlimited internet for 1 hour.','U0000','U0003','U0004',NULL,'coding','2018-10-01 14:47:14'),('PRJ0929662504','AllOutSurf30','Unlimited text to all networks, 30 minutes calls to Smart/TNT/Sun, 300 MB data, Unlimited Facebook.','U0000','U0001','U0005','SRC0373968792','fixed','2018-10-10 13:59:57'),('PRJ1369720846','NetWeek70','10 GB of internet access, 70 text to all network and 2 hours of call to Smart, Sun and TNT. valid for 7 days','U0000','U0002','U0005',NULL,'coding','2018-10-01 14:58:24'),('PRJ2139588103','AllOut99','5gb internet access, unli calls and text to sun, smart and TNT. Unli access to facebook and youtube for 7 days.','U0000','U0003','U0004',NULL,'coding','2018-10-01 14:42:43'),('PRJ2183308576','Sample Project Name','Sample Description','U0000','U0001','U0004','SRC3489968337','testing','2018-10-04 06:13:36'),('PRJ2859776659','SuperSurf 50','All day surfing, all sites and games, 50 pesos','U0000','U0001','U0004','SRC2773582569','testing','2018-10-02 06:06:14'),('PRJ5318232716','HyperText10','Unlimited text to Smart and Sun for 1 day.','U0000','U0002','U0004',NULL,'coding','2018-10-01 14:46:20'),('PRJ6705441368','PickMe25','Unlimited access to a selected application for 2 days. (FBME25) for facebook, (YTME25) for Youtube, (IGME25) for Instagram, (TWME25) for twitter, (MLME25) for Mobile legends.','U0000','U1704','U0004',NULL,'coding','2018-10-01 14:51:19'),('PRJ6909030345','SurfSupreme60','3 days of ulimited surfing on the internet and 60 minutes call to Smart, TNT or Sun.','U0000','U0001','U0004','SRC3443022007','testing','2018-10-01 14:44:56'),('PRJ6991047812','Sample Project','Sample Project Description','U0000','U0001','U0004','SRC1335891252','testing','2018-10-15 00:29:31'),('PRJ7018203704','AllReach25','Unlimited calls to Smart and Sun plus 25 texts to all network','U0000','U1704','U0004',NULL,'coding','2018-10-01 14:48:14'),('PRJ7352868758','TextMonth199','unlimited text to all network, 2GB of internet access and 5 hours of call to Smart,TNT and Sun for 30 days.','U0000','U0003','U0005',NULL,'coding','2018-10-01 14:55:56'),('PRJ9331618782','MaxOut30','All-out usage for 1 day on internet access, texting and calling.','U0000','U0002','U0005',NULL,'coding','2018-10-01 14:53:06');
/*!40000 ALTER TABLE `project_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `source`
--

DROP TABLE IF EXISTS `source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `source` (
  `source_id` varchar(13) NOT NULL,
  `proj_id` varchar(13) DEFAULT NULL,
  `source_type` varchar(5) DEFAULT NULL,
  `dir` varchar(60) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`source_id`),
  KEY `proj_id` (`proj_id`),
  CONSTRAINT `source_ibfk_1` FOREIGN KEY (`proj_id`) REFERENCES `project_t` (`proj_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source`
--

LOCK TABLES `source` WRITE;
/*!40000 ALTER TABLE `source` DISABLE KEYS */;
INSERT INTO `source` VALUES ('SRC0373968792','PRJ0929662504','patch','files/sample_source_code.txt','2018-10-11 04:58:45'),('SRC1335891252','PRJ6991047812','base','files/sample_source_code.txt','2018-10-15 00:34:06'),('SRC2773582569','PRJ2859776659','base','files/omaewa.mp4','2018-10-04 12:58:58'),('SRC3443022007','PRJ6909030345','base','files/sample_source_code.txt','2018-10-01 16:00:34'),('SRC3489968337','PRJ2183308576','base','images/sample_source_code.txt','2018-10-04 06:35:30'),('SRC5496523161','PRJ0929662504','base','files/_files_sample_source_code (1).txt','2018-10-10 14:07:00');
/*!40000 ALTER TABLE `source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_t`
--

DROP TABLE IF EXISTS `user_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_t` (
  `user_id` varchar(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(60) DEFAULT '$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS',
  `userfname` varchar(50) DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL,
  `workstat` varchar(15) DEFAULT 'employed',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pic` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_type` (`user_type`),
  CONSTRAINT `user_t_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_t`
--

LOCK TABLES `user_t` WRITE;
/*!40000 ALTER TABLE `user_t` DISABLE KEYS */;
INSERT INTO `user_t` VALUES ('U0000','leviathan','$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS','Gabrielle Celestino',1,'employed','2018-10-01 12:56:34',NULL),('U0001','Turmeric','$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS','Paulo Lopera',2,'employed','2018-10-01 13:22:15',NULL),('U0002','sinned16','$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS','Dennis Varona',2,'employed','2018-10-01 13:22:44',NULL),('U0003','unidentified.py','$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS','Angelito Casasis',2,'employed','2018-10-01 13:23:18',NULL),('U0004','esorlem081','$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS','Melrose Iglesia',3,'employed','2018-10-01 13:24:57',NULL),('U0005','zenzen','$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS','Sweetzen Jimenez',3,'employed','2018-10-01 13:27:48',NULL),('U1704','spolaryz','$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS','Daniel Yalung',2,'employed','2018-10-01 14:46:31',NULL),('U4525','juan231','$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS','Juan Gabriel Palarpalar',3,'employed','2018-10-15 00:30:43',NULL),('U7486','varona','$2y$12$A1fWxpDlKhOsXJT8A3WqpelV0J6ifBjKCv2UaR3sOLD7U.1PUGAfS','Dennis Varona',2,'employed','2018-10-10 14:28:48',NULL);
/*!40000 ALTER TABLE `user_t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type` (
  `type_id` int(1) NOT NULL,
  `type_title` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Project Manager'),(2,'Developer'),(3,'Tester');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-21  1:43:18
