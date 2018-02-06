/*
SQLyog Ultimate v9.31 GA
MySQL - 5.5.16 : Database - shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `shop`;

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postavshik` int(11) DEFAULT NULL,
  `sum` double DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `payment` */

/*Table structure for table `postavshik` */

DROP TABLE IF EXISTS `postavshik`;

CREATE TABLE `postavshik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `tel` varchar(60) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `postavshik` */

insert  into `postavshik`(`id`,`name`,`tel`,`saldo`) values (1,'Абдурашид','926100100',NULL);

/*Table structure for table `prihod` */

DROP TABLE IF EXISTS `prihod`;

CREATE TABLE `prihod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `summa` double DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `prihod` */

/*Table structure for table `prihod_info` */

DROP TABLE IF EXISTS `prihod_info`;

CREATE TABLE `prihod_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `postavshik` int(11) DEFAULT NULL,
  `price_in` double DEFAULT NULL,
  `price_out` double DEFAULT NULL,
  `count` double DEFAULT NULL,
  `summa` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `prihod_info` */

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shcode` varchar(20) DEFAULT NULL,
  `ed_izm` int(1) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price_in` double DEFAULT NULL,
  `price_out` double DEFAULT NULL,
  `income` double DEFAULT NULL,
  `id_postavshik` int(11) DEFAULT NULL,
  `sector` int(11) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `count` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`id`,`shcode`,`ed_izm`,`name`,`price_in`,`price_out`,`income`,`id_postavshik`,`sector`,`exp_date`,`count`) values (1,'1',1,'RC Cola',7,8,1,1,NULL,'2018-04-01',6);

/*Table structure for table `sale` */

DROP TABLE IF EXISTS `sale`;

CREATE TABLE `sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `sum_int` double DEFAULT NULL,
  `sum_out` double DEFAULT NULL,
  `income` double DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sale` */

/*Table structure for table `sale_info` */

DROP TABLE IF EXISTS `sale_info`;

CREATE TABLE `sale_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale` int(11) DEFAULT NULL,
  `product` int(11) DEFAULT NULL,
  `price_in` double DEFAULT NULL,
  `price_out` double DEFAULT NULL,
  `income` double DEFAULT NULL,
  `count` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sale_info` */

/*Table structure for table `spr_key` */

DROP TABLE IF EXISTS `spr_key`;

CREATE TABLE `spr_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `spr_key` */

insert  into `spr_key`(`id`,`name`) values (1,'Единицы измерения');

/*Table structure for table `spr_val` */

DROP TABLE IF EXISTS `spr_val`;

CREATE TABLE `spr_val` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spr` int(11) DEFAULT NULL,
  `val` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `spr_val` */

insert  into `spr_val`(`id`,`spr`,`val`) values (1,1,'шт'),(2,1,'кг');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
