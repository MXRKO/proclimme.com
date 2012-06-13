/*
SQLyog Enterprise - MySQL GUI v7.13 
MySQL - 5.0.67-community : Database - proclimme_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`proclimme_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `proclimme_db`;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(12) default NULL,
  `id_usuario` int(12) default NULL,
  `nombre` varchar(255) collate utf8_spanish_ci default NULL,
  `apellidos` varchar(255) collate utf8_spanish_ci default NULL,
  `direccion` varchar(450) collate utf8_spanish_ci default NULL,
  `rfc` varchar(21) collate utf8_spanish_ci default NULL,
  `telefono_casa` varchar(25) collate utf8_spanish_ci default NULL,
  `telefono_celular` varchar(25) collate utf8_spanish_ci default NULL,
  `telefono_trabajo` varchar(25) collate utf8_spanish_ci default NULL,
  `email` varchar(55) collate utf8_spanish_ci default NULL,
  `fax` varchar(25) collate utf8_spanish_ci default NULL,
  `no_cuenta` varchar(25) collate utf8_spanish_ci default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `clientes` */

/*Table structure for table `imagenes` */

DROP TABLE IF EXISTS `imagenes`;

CREATE TABLE `imagenes` (
  `id` int(12) NOT NULL auto_increment,
  `id_producto` int(12) default NULL,
  `nombre_archivo` varchar(450) collate utf8_spanish_ci default NULL,
  `descripcion` text collate utf8_spanish_ci,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `imagenes` */

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `id` int(12) NOT NULL auto_increment,
  `id_producto` int(12) default NULL,
  `id_usuario` int(12) default NULL,
  `fecha_pedido` date default NULL,
  `fecha_pago` date default NULL,
  `fecha_envio` date default NULL,
  `fecha_entrega` date default NULL,
  `cantidad` int(3) default NULL,
  `pagado` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pedidos` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(12) NOT NULL auto_increment,
  `nombre` varchar(256) collate utf8_spanish_ci default NULL,
  `descripcion` text collate utf8_spanish_ci,
  `precio` double default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `productos` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(12) NOT NULL auto_increment,
  `user` varchar(45) collate utf8_spanish_ci default NULL,
  `pass` varchar(450) collate utf8_spanish_ci default NULL,
  `tipo` char(1) collate utf8_spanish_ci default 'C',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
