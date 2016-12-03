CREATE DATABASE `testdb`;
USE `testdb`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `inNumber` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `inNumber` (`inNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL DEFAULT '0',
  `cid` int(8) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL,
  `type` int(2) NOT NULL,
  `typedes` varchar(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `postal` varchar(7) NOT NULL,
  `statu` int(2) NOT NULL DEFAULT '0',
  `path` varchar(300) NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `clerk`;
CREATE TABLE IF NOT EXISTS `clerk` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `eid` int(8) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `eid` (`eid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
