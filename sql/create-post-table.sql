CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `title` varchar(125) DEFAULT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `URL` varchar(256) DEFAULT NULL,
  `crttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`post_id`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`)
) AUTO_INCREMENT=8 DEFAULT CHARACTER SET=utf8;
