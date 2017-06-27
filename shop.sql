-- phpMiniAdmin dump 1.9.170312
-- Datetime: 2017-06-26 10:33:31
-- Host: 
-- Database: shop

/*!40030 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

DROP TABLE IF EXISTS `catalog`;
CREATE TABLE `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `pubyear` int(4) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
INSERT INTO `catalog` VALUES ('1','John','Php','1234','111'),('2','jd','css','2222','2132'),('3','jdh;l','rfhids','1233','12213');
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(25) NOT NULL DEFAULT '-',
  `email` varchar(60) NOT NULL DEFAULT '',
  `address` varchar(60) NOT NULL DEFAULT '',
  `datetime` int(35) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES ('1','erroe','67342913','jasjd@udg.ua','mayfdsklhs','1498473031'),('2','qwerty','380976828330','qwerty@qwerty.ua','Mayak,9','1498473099');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `pubyear` int(4) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `customer` varchar(200) NOT NULL DEFAULT '',
  `quantity` int(10) NOT NULL DEFAULT '0',
  `datetime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES ('1','John','Php','1234','111','2','3','1498473099'),('2','jd','css','2222','2132','2','1','1498473099'),('3','jdh;l','rfhids','1233','12213','2','3','1498473099');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;


-- phpMiniAdmin dump end
