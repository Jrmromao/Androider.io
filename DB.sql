-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: androida_login
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `permitions` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_content` text NOT NULL,
  `post_date` date NOT NULL,
  `post_topic` varchar(255) NOT NULL,
  `post_by` varchar(45) NOT NULL,
  `post_title` varchar(45) NOT NULL,
  `post_views` int(11) NOT NULL,
  `reply_num` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (117,'With the largest network and an excellent selection of phones, it is no wonder why Verizon is largely considered to be the â€œtop dogâ€ out of all the major U.S. carriers. For those on Big Redâ€™s network, there are quite a few options to choose from, including major flagships that are universally available on all carriers, as well as handsets specific to Verizon only.','2016-04-24','App','laura','BEST VERIZON ANDROID PHONES (APRIL 2016)',1003,0),(118,'With Android thoroughly dominating the mobile industry, picking the best Android smartphones is almost synonymous with choosing the best smartphones, period. But while Android phones have few real opponents on other platforms, internal competition is incre','2016-04-24','App','laura','BEST ANDROID PHONES (APRIL 2016): OUR PICKS, ',1,0),(119,'Android tablets make great gifts, and the best thing about them is that everyone can use them, from a three-year-old to your grandma. But with so many devices out there, how can you make sure you get the best Androi','2016-04-24','News','laura','BEST ANDROID TABLETS (APRIL 2016)',1,0),(121,'If youâ€™re a fan of the second-generation Moto 360 but need something a bit more rugged, you should check out the Moto 360 Sport. It has basically the same internal specifications, plus GPS tracking capabilities. The battery on this device does suffer a bit with the GPS turned on, but that can easily be forgiven when taking into account the watchâ€™s other great features. It has a killer AnyLight Hybrid display that makes it super easy to see outdoors, as well as an IP67 rating for dust and water resistance.\r\n\r\nAll in all, this is the go-to Android Wear option if you need something to track your exercises. As of right now it only supports run tracking, but Motorola says more exercises will be added to the watch in the future. The Moto 360 Sport starts at $299.99 from Motorolaâ€™s website, or you can usually find it a bit cheaper on Amazon.\r\n\r\nSpecs\r\n\r\n1.37-inch AnyLight Hybrid Display with 360 x 325 resolution, 263ppi\r\n1.2GHz quad-core Qualcomm Snapdragon 400 processor\r\n512MB of RAM\r\n4GB of on-board storage\r\n300mAh battery\r\n45 x 45 x 11.5mm, 54g\r\nIP67 dust and water resistance\r\nRead more\r\n\r\nMoto 360 Sport review','2016-04-24','Features','laura','Moto 360 Sport',10,0),(123,'Although the LG Watch Urbane was announced almost a year ago, itâ€™s still one of the better options out there. Sporting a completely circular 1.3-inch P-OLED display with a premium build, this device excels in almost every areaâ€¦ especially for a first-generation Android Wear device. It has just about the same specifications as all other current watches on the market, including a high-resolution display, powerful processor, plenty of on-board storage and an IP67 rating for dust and water resistance.\r\n<br>\r\nNowadays you can find the Watch Urbane on Amazon or eBay for just under $250, which is a pretty decent price for a good Android Wear watch. Oh, and if youâ€™re looking for a more luxurious version of this watch, LG released a 23k gold version called the Watch Urbane Luxe. That will cost you about $1,200 though, so weâ€™re not expecting everyone to rush out and pick one up right away.','2016-04-24','News','laura','LG Watch Urbane',26,0);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_by` varchar(45) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reply_date` varchar(45) NOT NULL,
  `reply_text` text NOT NULL,
  `reply_num` int(11) NOT NULL,
  PRIMARY KEY (`reply_id`),
  UNIQUE KEY `reply_id_UNIQUE` (`reply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` VALUES (199,'laura',111,'2016-Apr-24, 11:03','wdsad',0),(200,'laura',111,'2016-Apr-24, 11:03','asd',0),(201,'tola',113,'2016-Apr-24, 13:35','lool',0),(202,'tola',113,'2016-Apr-24, 13:35',' nm,.',0),(203,'tola',113,'2016-Apr-24, 13:35','nkm,.',0),(204,'tola',113,'2016-Apr-24, 13:35','nkm,.',0),(213,'laura',123,'2016-Apr-24, 18:12','asxz',0),(214,'laura',123,'2016-Apr-24, 18:12','aSZD',0),(215,'laura',123,'2016-Apr-24, 18:12','ASZD',0),(216,'laura',123,'2016-Apr-24, 18:31','qwdas',0);
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `topic_ID` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(45) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_by` varchar(45) NOT NULL,
  PRIMARY KEY (`topic_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'App','2016-04-22 00:54:05','laura'),(2,'Battery','2016-04-22 01:07:11','laura'),(3,'News','2016-04-22 01:08:00','laura'),(4,'Features','2016-04-22 01:08:21','laura'),(5,'mmmm','2016-04-23 11:28:34','laura'),(6,'fvd','2016-04-23 12:22:35','laura'),(7,'i','2016-04-23 13:16:44','laura');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_session`
--

DROP TABLE IF EXISTS `user_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_session` (
  `session_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `hash` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`session_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_session`
--

LOCK TABLES `user_session` WRITE;
/*!40000 ALTER TABLE `user_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `users_userID` int(11) NOT NULL AUTO_INCREMENT,
  `users_username` varchar(128) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_salt` varchar(64) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `users_joined` datetime NOT NULL,
  `users_group` varchar(25) NOT NULL,
  `users_email` text NOT NULL,
  PRIMARY KEY (`users_userID`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (52,'tola','6bef429609a8ce98751f6cbb67d42cbd31f2f8df552b7a609500277ac1e292ea','¥uCÊ‡‹ó5é|¦ï– ?wRÌíoÜ³Ó\nÎŽîü','Hugo Lopes','2016-04-17 15:48:45','Moderator','tola@mail.com'),(54,'laura','7870825d1ed02890910c75bb7e1184bbb40c6c42b7cee02cc5f79240fd428ab6','Æd|Êl.º³g$mJ¨œçµÛŒþèXšmLážÜ','Laura Linda','2016-04-19 21:06:12','Administrator','laura@mail.com'),(55,'kim','7294611edc13547676a5d34bb6fbcd02a1143f448a812ac36a2595976ed1b745','¶²]îõ**ýûØ@Ò¤¹Ï`˜hZ	¯@±[ú\0Ú’X!Û','Joaquim','2016-04-21 18:13:05','Administrator','mail@mail.com'),(56,'cristina','2e30594f4b29ad5d4d3fccf66553573e6634517c9b5f33561d146129e2f5ae8f','€Eq»•ÁªM€ó©ÜÙ/·ýš­‚´:À¡Ã¨ÝÖ','Cristina Fernandes','0000-00-00 00:00:00','User','cris@mail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'androida_login'
--
/*!50003 DROP PROCEDURE IF EXISTS `add_view` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_view`(in newView int, in postID int)
BEGIN
update posts set post_views = newView where post_id =postID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_pots` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_pots`(in postid int(11))
begin
select *
from posts WHERE post_id = postid;


 END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_reply` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_reply`(in postID int)
BEGIN

SELECT * FROM reply WHERE post_id = postID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-24 21:53:07
