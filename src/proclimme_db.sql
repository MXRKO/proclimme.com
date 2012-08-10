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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `imagenes` */

insert  into `imagenes`(`id`,`id_producto`,`nombre_archivo`,`descripcion`,`extencion`) values (1,1,'item1.png',NULL,'png'),(2,2,'item2.png','','png'),(3,3,'item3.png','','png'),(4,4,'item4.png','','png'),(5,5,'item5.png','','png'),(6,6,'item6.png','','png'),(7,7,'item7.png','','png'),(17,36,'item36.png','','png');

/*Table structure for table `noticias` */

DROP TABLE IF EXISTS `noticias`;

CREATE TABLE `noticias` (
  `id` int(12) NOT NULL auto_increment,
  `titulo` varchar(200) collate utf8_spanish_ci default NULL,
  `breve` varchar(300) collate utf8_spanish_ci default NULL,
  `descripcion` text collate utf8_spanish_ci,
  `fecha` date default NULL,
  `imagen` varchar(155) collate utf8_spanish_ci default NULL,
  `extencion` varchar(5) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `noticias` */

insert  into `noticias`(`id`,`titulo`,`breve`,`descripcion`,`fecha`,`imagen`,`extencion`) values (9,'RadiaciÃ³n solar intensa y estabilidad atmosfÃ©rica propician una disminuciÃ³n en la calidad del aire para el D.F','El Sistema de Monitoreo AtmosfÃ©rico de la Ciudad de MÃ©xico (Simat) informÃ³ que la radiaciÃ³n solar es extremadamente alta en el valle de MÃ©xico, de 11 puntos el Ãndice de Rayos Ultravioleta (UV).','El Sistema de Monitoreo AtmosfÃ©rico de la Ciudad de MÃ©xico (Simat) informÃ³ que la radiaciÃ³n solar es extremadamente alta en el valle de MÃ©xico, de 11 puntos el Ãndice de Rayos Ultravioleta (UV).\r\n\r\nY aquÃ­ lo demÃ¡s de la noticia','2012-08-10','n_9.jpg','jpg'),(8,'ImÃ¡genes de la Tierra en HD','ImÃ¡genes de la Tierra en alta resoluciÃ³n tomadas por el satÃ©lite Ruso Electro-L en distintas longitudes de onda','ImÃ¡genes de la Tierra en alta resoluciÃ³n tomadas por el satÃ©lite Ruso Electro-L en distintas longitudes de onda y todo el texto completo','2012-08-10','n_8.jpg','jpg'),(10,'Fuertes vientos asociados a tormenta causan diversos daÃ±os en el distrito federal','Tres Ã¡rboles cayeron por los fuertes vientos y la ligera llovizna, dejando dos vehÃ­culos daÃ±ados y toda una colonia sin luz en la Gustavo A. Madero','Tres Ã¡rboles cayeron por los fuertes vientos y la ligera llovizna, dejando dos vehÃ­culos daÃ±ados y toda una colonia sin luz en la Gustavo A. Madero\r\n\r\nTres Ã¡rboles cayeron por los fuertes vientos y la ligera llovizna, dejando dos vehÃ­culos daÃ±ados y toda una colonia sin luz en la Gustavo A. Madero','2012-08-10','n_10.jpg','jpg');

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `id` int(12) NOT NULL auto_increment,
  `id_usuario` int(12) default NULL,
  `estatus` char(1) collate utf8_spanish_ci default 'C' COMMENT 'C - Carrito, E - Enviada, R - Respondida, T - Terminada, S - Pedido de cotizacion sin usuario',
  `email` varchar(255) collate utf8_spanish_ci default NULL,
  `fecha` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pedidos` */

insert  into `pedidos`(`id`,`id_usuario`,`estatus`,`email`,`fecha`) values (1,1,'E','zero.marko@gmail.com','2012-07-24'),(2,11,'E','hkjh','2012-07-24'),(3,0,'S','lÃ±jlkj','2012-07-24'),(4,1,'E',NULL,'2012-07-25');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(12) NOT NULL auto_increment,
  `nombre` varchar(256) collate utf8_spanish_ci default NULL,
  `descripcion_corta` varchar(550) collate utf8_spanish_ci default NULL,
  `descripcion` text collate utf8_spanish_ci,
  `formatos_entrega` varchar(750) collate utf8_spanish_ci default NULL,
  `medio_entrega` varchar(650) collate utf8_spanish_ci default NULL,
  `estatus` tinyint(1) default '1',
  `fecha_creacion` date default NULL,
  `ultima_modificacion` date NOT NULL,
  `mostrar_principal` tinyint(1) NOT NULL default '1',
  `orden` int(3) default NULL,
  `eliminado` tinyint(1) default '0' COMMENT 'True - Indica que un producto esta "eliminado"',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `productos` */

insert  into `productos`(`id`,`nombre`,`descripcion_corta`,`descripcion`,`formatos_entrega`,`medio_entrega`,`estatus`,`fecha_creacion`,`ultima_modificacion`,`mostrar_principal`,`orden`,`eliminado`) values (1,'PronÃ³stico meteorolÃ³gico a 3 dÃ­as','Pronostico de variables y eventos meteorolÃ³gicos significativos que puedan presentarse dentro de las prÃ³ximas 72 horas','AquÃ­ puede ir una explicaciÃ³n mas larga del producto o se puede reducir la primera.\r\nPronostico de variables y eventos meteorolÃ³gicos significativos que puedan presentarse dentro de las prÃ³ximas 72 horas','1000','4',1,NULL,'2012-08-09',1,1,0),(2,'PronÃ³stico de FenÃ³menos meteorolÃ³gicos significativos','DeterminaciÃ³n de valores mÃ­nimos de temperatura como sistema de prevenciÃ³n para actividades productivas, pronÃ³stico de lluvias intensas, pronÃ³stico de precipitaciones  que puedan resultar en afectaciones significativas para regiones del territorio mexicano, pronÃ³sticos de ondas gÃ©lidas y de calor, entre otros','DeterminaciÃ³n de valores mÃ­nimos de temperatura como sistema de prevenciÃ³n para actividades productivas, pronÃ³stico de lluvias intensas, pronÃ³stico de precipitaciones  que puedan resultar en afectaciones significativas para regiones del territorio mexicano, pronÃ³sticos de ondas gÃ©lidas y de calor, entre otros.\r\n\r\nDeterminaciÃ³n de valores mÃ­nimos de temperatura como sistema de prevenciÃ³n para actividades productivas, pronÃ³stico de lluvias intensas, pronÃ³stico de precipitaciones  que puedan resultar en afectaciones significativas para regiones del territorio mexicano, pronÃ³sticos de ondas gÃ©lidas y de calor, entre otros','JPG, PNG','Email, sistema proclimme',1,NULL,'2012-08-09',1,2,0),(3,'PronÃ³stico meteorolÃ³gico a 7 dÃ­as','Pronostico de variables y eventos meteorolÃ³gicos significativos que puedan presentarse dentro de las prÃ³ximas 168 horas, con alta probabilidad de ocurrencia','Pronostico de variables y eventos meteorolÃ³gicos significativos que puedan presentarse dentro de las prÃ³ximas 168 horas, con alta probabilidad de ocurrencia.\r\n\r\nPronostico de variables y eventos meteorolÃ³gicos significativos que puedan presentarse dentro de las prÃ³ximas 168 horas, con alta probabilidad de ocurrencia.','JPG, PNG','Email, sistema proclimme',1,NULL,'2012-08-09',1,3,0),(4,'Trayectoria y efectos por ciclones tropicales','PronÃ³stico de trayectoria, vientos, rachas y zonas de alertamiento de acuerdo con modelos de pronÃ³stico numÃ©rico e informaciÃ³n emitida por el Centro Nacional de Huracanes de Miami, EU.','PronÃ³stico de trayectoria, vientos, rachas y zonas de alertamiento de acuerdo con modelos de pronÃ³stico numÃ©rico e informaciÃ³n emitida por el Centro Nacional de Huracanes de Miami, EU.\r\n\r\nPronÃ³stico de trayectoria, vientos, rachas y zonas de alertamiento de acuerdo con modelos de pronÃ³stico numÃ©rico e informaciÃ³n emitida por el Centro Nacional de Huracanes de Miami, EU.','JPG, PNG','Email, sistema proclimme',1,NULL,'2012-08-09',1,4,0),(5,'PronÃ³stico de Marea tormenta','PronÃ³stico de altura de marea asociado con el paso de un ciclÃ³n tropical sobre aguas oceÃ¡nicas que delimitan el territorio mexicano','PronÃ³stico de altura de marea asociado con el paso de un ciclÃ³n tropical sobre aguas oceÃ¡nicas que delimitan el territorio mexicano.','JPG, PNG','Email, sistema proclimme',1,NULL,'2012-08-09',1,5,0),(6,'PronÃ³stico climatolÃ³gico mensual','PronÃ³stico de precipitaciÃ³n, temperatura y otras variables climatolÃ³gicas para los prÃ³ximos meses enfocadas a determinar las condiciones esperadas con respecto a valores normales','PronÃ³stico de precipitaciÃ³n, temperatura y otras variables climatolÃ³gicas para los prÃ³ximos meses enfocadas a determinar las condiciones esperadas con respecto a valores normales\r\n\r\nPronÃ³stico de precipitaciÃ³n, temperatura y otras variables climatolÃ³gicas para los prÃ³ximos meses enfocadas a determinar las condiciones esperadas con respecto a valores normales','PDF, Word, ImÃ¡gen','CD, Email, Sistema Proclimme',1,NULL,'2012-08-09',1,6,0),(7,'PronÃ³stico climatolÃ³ico estacional','PronÃ³stico probabilÃ­stico de precipitaciÃ³n, temperatura y otras variables climatolÃ³gicas para 6 o mÃ¡s meses, enfocadas a determinar las condiciones esperadas con respecto a valores normales','PronÃ³stico probabilÃ­stico de precipitaciÃ³n, temperatura y otras variables climatolÃ³gicas para 6 o mÃ¡s meses, enfocadas a determinar las condiciones esperadas con respecto a valores normales\r\n\r\n\r\nPronÃ³stico probabilÃ­stico de precipitaciÃ³n, temperatura y otras variables climatolÃ³gicas para 6 o mÃ¡s meses, enfocadas a determinar las condiciones esperadas con respecto a valores normales','kljkljlj','llkjljlljljlkjklj',1,NULL,'2012-08-09',1,7,0),(36,'Producto de pruebÃ¡','descripciÃ³n breve de un producto de prueba','Contenido mÃ¡s detallado de un producto de prueba',',mn',',n,mn',1,NULL,'2012-08-09',1,8,0);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `solicitudes` */

insert  into `solicitudes`(`id`,`id_pedido`,`id_producto`,`fecha_carrito`,`fecha_envio`,`descripcion`) values (1,1,3,'2012-07-24',NULL,'jejejkljdhh lkdsfldskfhkl kjh kjh kj'),(2,2,3,'2012-07-24',NULL,'kjhkjhkjh'),(3,3,3,'2012-07-24',NULL,'jlkjklj'),(4,4,1,'2012-07-25','2012-07-25','esto es una prueba');

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
