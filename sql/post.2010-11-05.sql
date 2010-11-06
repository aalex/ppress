-- MySQL dump 10.13  Distrib 5.1.47, for Win64 (unknown)
--
-- Host: localhost    Database: itschinesetome
-- ------------------------------------------------------
-- Server version	5.1.47-community

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
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `post_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `URL` varchar(256) DEFAULT NULL,
  `crttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,1,'[转载]谁为亡国灭种的楼市巨泡敲响丧钟？','2010-10-15 04:00:00','http://blog.sina.com.cn/s/blog_60eca5730100m97x.html','2010-11-06 02:30:13','2010-11-06 02:30:13'),(2,2,'<no title>','2010-11-05 04:00:00','http://t.sina.com.cn/n/%E9%92%9F%E5%A6%82%E4%B9%9D','2010-11-06 02:33:10','2010-11-06 02:33:10'),(3,3,'我的时尚肖像','2010-10-20 04:00:00','http://blog.sina.com.cn/s/blog_476bdd0a0100mkgy.html','2010-11-06 02:34:48','2010-11-06 02:34:48'),(4,4,'[转] 当嫖娼变成包养','2010-11-03 04:00:00','http://user.qzone.qq.com/452598814/blog/1288837375','2010-11-06 02:36:20','2010-11-06 02:36:20'),(5,5,'四月（Cond.)','2010-10-11 04:00:00','http://dimplewan.wordpress.com/2010/10/11/%E5%9B%9B%E6%9C%88%EF%BC%88cond-%EF%BC%89/','2010-11-06 02:37:41','2010-11-06 02:37:41');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-11-05 22:40:26
