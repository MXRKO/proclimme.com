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
  `id` int(12) NOT NULL auto_increment,
  `id_usuario` int(12) default NULL,
  `nombre` varchar(255) collate utf8_spanish_ci default NULL,
  `apellidos` varchar(255) collate utf8_spanish_ci default NULL,
  `direccion` varchar(450) collate utf8_spanish_ci default NULL,
  `cp` varchar(5) collate utf8_spanish_ci default NULL,
  `ciudad` varchar(450) collate utf8_spanish_ci default NULL,
  `empresa` varchar(450) collate utf8_spanish_ci default NULL,
  `rfc` varchar(21) collate utf8_spanish_ci default NULL,
  `telefono_casa` varchar(25) collate utf8_spanish_ci default NULL,
  `telefono_celular` varchar(25) collate utf8_spanish_ci default NULL,
  `telefono_trabajo` varchar(25) collate utf8_spanish_ci default NULL,
  `email` varchar(55) collate utf8_spanish_ci default NULL,
  `fax` varchar(25) collate utf8_spanish_ci default NULL,
  `no_cuenta` varchar(25) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`id_usuario`,`nombre`,`apellidos`,`direccion`,`cp`,`ciudad`,`empresa`,`rfc`,`telefono_casa`,`telefono_celular`,`telefono_trabajo`,`email`,`fax`,`no_cuenta`) values (1,1,'Marco Antonio','Lozada LÃ³pez','Conocida','91000','Xico','Nerv','LOM841107','333333','222222','','zero.marko@gmail.com','',''),(4,11,'Cliente','Prueba','','','','','CLIENTEDEPRUEBA','','','','cliente@prueba.com','',''),(3,3,'Juan','Gonzales','','','','','123456','','','','juan@juan.com','','');

/*Table structure for table `imagenes` */

DROP TABLE IF EXISTS `imagenes`;

CREATE TABLE `imagenes` (
  `id` int(12) NOT NULL auto_increment,
  `id_producto` int(12) default NULL,
  `nombre_archivo` varchar(450) collate utf8_spanish_ci default NULL,
  `descripcion` text collate utf8_spanish_ci,
  `extencion` varchar(5) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `imagenes` */

insert  into `imagenes`(`id`,`id_producto`,`nombre_archivo`,`descripcion`,`extencion`) values (1,1,'item1.png',NULL,'png'),(2,2,'item2.png','','png'),(3,3,'item3.png','','png'),(4,4,'item4.png','','png'),(5,5,'item5.png','','png'),(6,6,'item6.png','','png'),(7,7,'item7.png','','png'),(8,8,'item8.png',NULL,'png');

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `id` int(12) NOT NULL auto_increment,
  `id_usuario` int(12) default NULL,
  `estatus` char(1) collate utf8_spanish_ci default 'C' COMMENT 'C - Carrito, E - Enviada, R - Respondida, T - Terminada, S - Pedido de cotizacion sin usuario',
  `email` varchar(255) collate utf8_spanish_ci default NULL,
  `fecha` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pedidos` */

insert  into `pedidos`(`id`,`id_usuario`,`estatus`,`email`,`fecha`) values (1,0,'S','zero.marko@gmail.com','2012-07-24'),(2,0,'S','hkjh','2012-07-24'),(3,0,'S','lÃ±jlkj','2012-07-24');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(12) NOT NULL auto_increment,
  `nombre` varchar(256) collate utf8_spanish_ci default NULL,
  `descripcion_corta` varchar(550) collate utf8_spanish_ci default NULL,
  `descripcion` text collate utf8_spanish_ci,
  `precio` double default NULL,
  `entrega_aprox` int(11) default NULL,
  `estatus` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `productos` */

insert  into `productos`(`id`,`nombre`,`descripcion_corta`,`descripcion`,`precio`,`entrega_aprox`,`estatus`) values (1,'Pronóstico meteorológico a 3 días','Pronostico de variables y eventos meteorológicos significativos que puedan presentarse dentro de las próximas 72 horas','Aquí puede ir una explicación mas larga del producto o se puede reducir la primera.\r\nPronostico de variables y eventos meteorológicos significativos que puedan presentarse dentro de las próximas 72 horas.',1000,4,1),(2,'Pronóstico de Fenómenos meteorológicos significativos','Determinación de valores mínimos de temperatura como sistema de prevención para actividades productivas, pronóstico de lluvias intensas, pronóstico de precipitaciones  que puedan resultar en afectaciones significativas para regiones del territorio mexicano, pronósticos de ondas gélidas y de calor, entre otros','Determinación de valores mínimos de temperatura como sistema de prevención para actividades productivas, pronóstico de lluvias intensas, pronóstico de precipitaciones  que puedan resultar en afectaciones significativas para regiones del territorio mexicano, pronósticos de ondas gélidas y de calor, entre otros.\r\nDeterminación de valores mínimos de temperatura como sistema de prevención para actividades productivas, pronóstico de lluvias intensas, pronóstico de precipitaciones  que puedan resultar en afectaciones significativas para regiones del territorio mexicano, pronósticos de ondas gélidas y de calor, entre otros.',1500,3,1),(3,'Pronóstico meteorológico a 7 días','Pronostico de variables y eventos meteorológicos significativos que puedan presentarse dentro de las próximas 168 horas, con alta probabilidad de ocurrencia','Pronostico de variables y eventos meteorológicos significativos que puedan presentarse dentro de las próximas 168 horas, con alta probabilidad de ocurrencia.\r\nPronostico de variables y eventos meteorológicos significativos que puedan presentarse dentro de las próximas 168 horas, con alta probabilidad de ocurrencia.',900,4,1),(4,'Trayectoria y efectos por ciclones tropicales','Pronóstico de trayectoria, vientos, rachas y zonas de alertamiento de acuerdo con modelos de pronóstico numérico e información emitida por el Centro Nacional de Huracanes de Miami, EU.','Pronóstico de trayectoria, vientos, rachas y zonas de alertamiento de acuerdo con modelos de pronóstico numérico e información emitida por el Centro Nacional de Huracanes de Miami, EU.\r\nPronóstico de trayectoria, vientos, rachas y zonas de alertamiento de acuerdo con modelos de pronóstico numérico e información emitida por el Centro Nacional de Huracanes de Miami, EU.',1300,5,1),(5,'Pronóstico de Marea tormenta','Pronóstico de altura de marea asociado con el paso de un ciclón tropical sobre aguas oceánicas que delimitan el territorio mexicano','Pronóstico de altura de marea asociado con el paso de un ciclón tropical sobre aguas oceánicas que delimitan el territorio mexicano.',1400,3,1),(6,'Pronóstico climatológico mensual','Pronóstico de precipitación, temperatura y otras variables climatológicas para los próximos meses enfocadas a determinar las condiciones esperadas con respecto a valores normales','Pronóstico de precipitación, temperatura y otras variables climatológicas para los próximos meses enfocadas a determinar las condiciones esperadas con respecto a valores normales.\r\nPronóstico de precipitación, temperatura y otras variables climatológicas para los próximos meses enfocadas a determinar las condiciones esperadas con respecto a valores normales.',1100,4,1),(7,'Pronóstico climatológico estacional','Pronóstico probabilístico de precipitación, temperatura y otras variables climatológicas para 6 o más meses, enfocadas a determinar las condiciones esperadas con respecto a valores normales','Pronóstico probabilístico de precipitación, temperatura y otras variables climatológicas para 6 o más meses, enfocadas a determinar las condiciones esperadas con respecto a valores normales.\r\nPronóstico probabilístico de precipitación, temperatura y otras variables climatológicas para 6 o más meses, enfocadas a determinar las condiciones esperadas con respecto a valores normales.',1050,5,1);

/*Table structure for table `respuestas` */

DROP TABLE IF EXISTS `respuestas`;

CREATE TABLE `respuestas` (
  `id` int(12) NOT NULL auto_increment,
  `id_solicitud` int(12) default NULL,
  `tipo` char(1) collate utf8_spanish_ci default NULL COMMENT 'C - Cotizacion, A - Archivo Trabajo',
  `nombre_archivo` varchar(300) collate utf8_spanish_ci default NULL,
  `descripcion` text collate utf8_spanish_ci,
  `fecha` date default NULL,
  `formato` varchar(25) collate utf8_spanish_ci default NULL COMMENT 'xls, doc, docx, pdf, jpg, png, gif',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `respuestas` */

/*Table structure for table `solicitudes` */

DROP TABLE IF EXISTS `solicitudes`;

CREATE TABLE `solicitudes` (
  `id` int(12) NOT NULL auto_increment,
  `id_pedido` int(12) default NULL,
  `id_producto` int(12) default NULL,
  `fecha_carrito` date default NULL COMMENT 'Fecha en que se agrego al carrito',
  `fecha_envio` date default NULL,
  `descripcion` text collate utf8_spanish_ci,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `solicitudes` */

insert  into `solicitudes`(`id`,`id_pedido`,`id_producto`,`fecha_carrito`,`fecha_envio`,`descripcion`) values (1,1,3,'2012-07-24',NULL,'jejejkljdhh lkdsfldskfhkl kjh kjh kj'),(2,2,3,'2012-07-24',NULL,'kjhkjhkjh'),(3,3,3,'2012-07-24',NULL,'jlkjklj');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(12) NOT NULL auto_increment,
  `user` varchar(45) collate utf8_spanish_ci default NULL,
  `pass` varchar(450) collate utf8_spanish_ci default NULL,
  `tipo` char(1) collate utf8_spanish_ci default 'C',
  `estatus` tinyint(1) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`user`,`pass`,`tipo`,`estatus`) values (1,'MXRKO','86266ee937d97f812a8e57d22b62ee29','C',1),(4,'CHENCHO','827ccb0eea8a706c4c34a16891f84e7b','A',1),(3,'Juan','827ccb0eea8a706c4c34a16891f84e7b','C',1),(6,'PEPE','827ccb0eea8a706c4c34a16891f84e7b','A',1),(7,'NEON','86266ee937d97f812a8e57d22b62ee29','A',1),(10,'administrador','bbfc8cd4785d5532b26d82a934ed8fd1','A',1),(9,'alquimista','12345','A',1),(11,'cliente','6fad3d82bf09dfc87666af9131c7dc61','C',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
