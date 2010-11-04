--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(125) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `intro` text,
  `URL` varchar(256) DEFAULT NULL,
  `crttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

