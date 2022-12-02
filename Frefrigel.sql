/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.21-MariaDB : Database - frefrig3_frefrigel_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`frefrig3_frefrigel_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `frefrig3_frefrigel_system`;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_calle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `d_colonia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `d_municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_referencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`cliente`,`representante`,`codigo`,`telefono`,`email`,`ruta`,`d_calle`,`d_colonia`,`d_municipio`,`d_referencia`,`created_at`,`updated_at`) values 
(2,'DULCERÍA SORPRESA TIXCA','N/A','N/A','N/A','alex-pch.28@hotmail.com','1','N/A','N/A','TIXCALTITLÁN','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(3,'DULCERÍA SORPRESA SULTEPEC','N/A','N/A','N/A',NULL,'1','N/A','N/A','SULTEPEC','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(4,'DULCERÍA VICTOR ALMOLOYA','N/A','N/A','N/A',NULL,'1','N/A','N/A','ALMOLOYA DE ALQUISIRAS','MERCADO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(5,'DULCERÍA ALMOLOYA','N/A','N/A','N/A',NULL,'1','N/A','N/A','ALMOLOYA DE ALQUISIRAS','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(6,'DULCERÍA VICTOR HDEZ','N/A','N/A','N/A',NULL,'1','N/A','N/A','ALMOLOYA DE ALQUISIRAS','LLANO GRANDE','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(7,'DULCERÍA RIGOBERTO HDEZ','N/A','N/A','N/A',NULL,'1','N/A','N/A','ALMOLOYA DE ALQUISIRAS','LLANO GRANDE','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(8,'Tiendas GARIS VILLA','N/A','N/A','N/A',NULL,'2','N/A','N/A','VILLA GUERRERO','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(9,'Tiendas GARIS IXTAPAN','N/A','N/A','N/A',NULL,'2','N/A','N/A','IXTAPAN DE LA SAL','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(10,'DULCERÍA PAYASITO','N/A','N/A','N/A',NULL,'2','N/A','N/A','VILLA GUERRERO',' ','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(11,'DULCERÍA SN RAFAEL','N/A','N/A','N/A',NULL,'2','N/A','N/A','VILLA GUERRERO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(12,'DULCERÍA MEXICANA','N/A','N/A','N/A',NULL,'2','N/A','N/A','VILLA GUERRERO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(13,'DULCERÍA CRISTAL','N/A','N/A','N/A',NULL,'2','N/A','N/A','VILLA GUERRERO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(14,'DULCERÍA GERARDO','N/A','N/A','N/A',NULL,'2','N/A','N/A','VILLA GUERRERO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(15,'DULCERÍA ALEJANDRO','N/A','N/A','N/A',NULL,'2','N/A','N/A','VILLA GUERRERO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(16,'Tiendas GARIS INSURGENTES','N/A','N/A','N/A',NULL,'2','N/A','N/A','TENANCINGO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(17,'Tiendas GARIS MADERO','N/A','N/A','N/A',NULL,'2','N/A','N/A','TENANCINGO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(18,'DULCERÍA MONSE','N/A','N/A','N/A',NULL,'2','N/A','N/A','TENANCINGO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(19,'DULCERÍA FERNANDO OLIVARES','N/A','N/A','N/A',NULL,'2','N/A','N/A','TENANGO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(20,'DULCERÍA EDGAR 1','N/A','N/A','N/A',NULL,'3','N/A','N/A','TENANGO','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(21,'DULCERÍA EDGAR2','N/A','N/A','N/A',NULL,'3','N/A','N/A','TENANGO','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(22,'Tiendas GARIS LA JOYA','N/A','N/A','N/A',NULL,'3','N/A','N/A','TENANGO','BALDERAS','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(23,'DULCERÍA OSO DULCERO SN MATEO','N/A','N/A','N/A',NULL,'4','N/A','N/A','SAN MATEO ATENCO','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(24,'DULCERÍA DULCE KANDY','N/A','N/A','N/A',NULL,'4','N/A','N/A','SAN MATEO ATENCO','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(25,'DULCERÍA DULCE MEX','N/A','N/A','N/A',NULL,'4','N/A','N/A','SANTIAGO TIANGUISTENCO','CENTRO','2022-12-02 19:51:28','2022-12-02 19:51:28'),
(26,'DULCERÍA MUNDO DE CARAMELO','N/A','N/A','N/A',NULL,'4','N/A','N/A','SANTIAGO TIANGUISTENCO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(27,'DULCERÍA OSO DULCERO OCOYOACAC','N/A','N/A','N/A',NULL,'4','N/A','N/A','OCOYACAC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(28,'DULCERÍA LA PEQUE','N/A','N/A','N/A',NULL,'4','N/A','N/A','OCOYACAC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(29,'DULCERÍA EL PUENTE','N/A','N/A','N/A',NULL,'4','N/A','N/A','OCOYACAC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(30,'DULCERÍA SURTITODO SANTIAGO','N/A','N/A','N/A',NULL,'4','N/A','N/A','OCOYACAC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(31,'DULCERÍA DON JUVE','N/A','N/A','N/A',NULL,'4','N/A','N/A','OCOYACAC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(32,'DULCERÍA DULCE MENTA','N/A','N/A','N/A',NULL,'4','N/A','N/A','OCOYACAC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(33,'DULCERÍA FONSECA','N/A','N/A','N/A',NULL,'5','N/A','N/A','TEMASCALTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(34,'DULCERÍA CANASTA','N/A','N/A','N/A',NULL,'5','N/A','N/A','TEMASCALTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(35,'DULCERÍA RANCHERO','N/A','N/A','N/A',NULL,'5','N/A','N/A','TEMASCALTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(36,'DULCERÍA GARCIA','N/A','N/A','N/A',NULL,'5','N/A','N/A','VALLE DE BRAVO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(37,'DULCERÍA ALBRISS','N/A','N/A','N/A',NULL,'5','N/A','N/A','VALLE DE BRAVO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(38,'DULCERÍA LUPITA','N/A','N/A','N/A',NULL,'6','N/A','N/A','IXTLAHUACA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(39,'DULCERÍA OSCARIN','N/A','N/A','N/A',NULL,'6','N/A','N/A','IXTLAHUACA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(40,'DULCERÍA PANALITO','N/A','N/A','N/A',NULL,'6','N/A','N/A','IXTLAHUACA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(41,'DULCERÍA PANAL ','N/A','N/A','N/A',NULL,'6','N/A','N/A','IXTLAHUACA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(42,'DULCERÍA NUEVA IXTLAHUACA','N/A','N/A','N/A',NULL,'6','N/A','N/A','IXTLAHUACA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(43,'DULCERÍA CRUMON','N/A','N/A','N/A',NULL,'6','N/A','N/A','IXTLAHUACA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(44,'DULCERÍA PACHIS','N/A','N/A','N/A',NULL,'6','N/A','N/A','IXTLAHUACA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(45,'DULCERÍA ROSSY','N/A','N/A','N/A',NULL,'6','N/A','N/A','IXTLAHUACA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(46,'Tiendas GARIS IXTLAHUACA','N/A','N/A','N/A',NULL,'6','N/A','N/A','IXTLAHUACA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(47,'DULCERÍA NUEVA ATLACOMULCO','N/A','N/A','N/A',NULL,'7','N/A','N/A','ATLACOMULCO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(48,'DULCERÍA BELEM ','N/A','N/A','N/A',NULL,'7','N/A','N/A','ATLACOMULCO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(49,'Dulcería LACONCHA','N/A','N/A','N/A',NULL,'7','N/A','N/A','ATLACOMULCO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(50,'DULCERÍA DANY ACAMBAY','N/A','N/A','N/A',NULL,'7','N/A','N/A','ATLACOMULCO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(51,'DULCERÍA MONARCA','N/A','N/A','N/A',NULL,'8','N/A','N/A','CARMONA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(52,'DULCERÍA CARMONA','N/A','N/A','N/A',NULL,'8','N/A','N/A','CARMONA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(53,'DULCERÍA MANOLOS','N/A','N/A','N/A',NULL,'8','N/A','N/A','SAN JOSÉ DEL RINCÓN',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(54,'DULCERÍA MORENITA','N/A','N/A','N/A',NULL,'8','N/A','N/A','SAN JOSÉ DEL RINCÓN',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(55,'DULCERÍA EL SALTO','N/A','N/A','N/A',NULL,'8','N/A','N/A','SAN JOSÉ DEL RINCÓN',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(56,'DULCERÍA JACAL','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(57,'DULCERÍA ARCO IRIS','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(58,'DULCERÍA DIEGO','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(59,'DULCERÍA BELEM','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(60,'DULCERÍA DULCE ZITA','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(61,'DULCERÍA LA JUNTA','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(62,'DULCERÍA COKIS CENTRO','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(63,'DULCERÍA COKIS CENTRAL','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(64,'DULCERÍA VICTOR FRITURAS','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(65,'DULCERÍA LULU TOÑO','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(66,'DULCERÍA HNOS. JAIMES','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(67,'Tiendas GARIS ZITACUARO','N/A','N/A','N/A',NULL,'9','N/A','N/A','ZITACUARO',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(68,'DULCERÍA SUPER G7','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(69,'DULCERÍA ABEJA  REYNA','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(70,'DULCERÍA CONASEGA','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(71,'DULCERÍA SUPER ZINA','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(72,'DULCERÍA DOMYS','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(73,'DULCERÍA ZENON','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(74,'DULCERÍA SURTITIENDA TOLUCA','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(75,'DULCERÍA LA GUERA','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(76,'DULCERÍA ROBLE TOLUCA','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(77,'Tiendas GARIS ALMOLOYA','N/A','N/A','N/A',NULL,'10','N/A','N/A','ZINACANTEPEC',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(78,'DULCERÍA ROBLE','N/A','N/A','N/A',NULL,'11','N/A','N/A','CENTRAL TOLUCA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(79,'DULCERÍA ARDILLA','N/A','N/A','N/A',NULL,'11','N/A','N/A','CENTRAL TOLUCA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(80,'DULCERÍA MODERNA','N/A','N/A','N/A',NULL,'11','N/A','N/A','CENTRAL TOLUCA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(81,'Tiendas NAVE C','N/A','N/A','N/A',NULL,'11','N/A','N/A','CENTRAL TOLUCA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28'),
(82,'DULCERÍA DIAZ','N/A','N/A','N/A',NULL,'11','N/A','N/A','CENTRAL TOLUCA',NULL,'2022-12-02 19:51:28','2022-12-02 19:51:28');

/*Table structure for table `detalles` */

DROP TABLE IF EXISTS `detalles`;

CREATE TABLE `detalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idc` int(11) NOT NULL,
  `cantidad` double(8,2) NOT NULL,
  `importe` double(8,2) NOT NULL DEFAULT 0.00,
  `descuento` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detalles` */

insert  into `detalles`(`id`,`codigo`,`idc`,`cantidad`,`importe`,`descuento`,`created_at`,`updated_at`) values 
(1,'1',3,1.00,34.20,10.00,'2022-12-02 19:52:23','2022-12-02 19:52:23'),
(2,'1',8,10.00,75.00,0.00,'2022-12-02 19:52:23','2022-12-02 19:52:23');

/*Table structure for table `entradas` */

DROP TABLE IF EXISTS `entradas`;

CREATE TABLE `entradas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_encargado` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `entradas` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `materias_primas` */

DROP TABLE IF EXISTS `materias_primas`;

CREATE TABLE `materias_primas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` double NOT NULL DEFAULT 0,
  `cant_min` double NOT NULL,
  `cant_max` double NOT NULL,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double NOT NULL,
  `proveedor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `materias_primas` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2021_07_05_014741_create_productos_table',1),
(6,'2021_07_05_015025_create_clientes_table',1),
(7,'2021_07_19_021059_create_ventas_table',1),
(8,'2021_08_23_024029_create_entradas_table',1),
(9,'2021_10_14_024838_create_materia__primas_table',1),
(10,'2021_10_14_025318_create_proveedores_table',1),
(11,'2022_03_29_235746_create_detalles_table',1),
(12,'2022_04_14_210027_create_rutas_table',1),
(13,'2022_08_04_031904_create_pagos_table',1);

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PayerID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pagos` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Producto',
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Descripción',
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Unidad',
  `cantidad` int(11) NOT NULL DEFAULT 0 COMMENT 'Cantidad por cajas',
  `precio` double(8,2) NOT NULL COMMENT 'Precio por cajas',
  `tipo` enum('Producido','Comprado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'producto.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `productos` */

insert  into `productos`(`id`,`producto`,`descripcion`,`unidad`,`cantidad`,`precio`,`tipo`,`activo`,`foto`,`created_at`,`updated_at`) values 
(1,'Producto 1','Gomas 950GR, gota leche,gota agua,frutita,estrella,gajo,corazón,flor,oso,CAJA C/10 BOLSAS','Piezas',0,38.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(2,'Producto 2','Goma surtida 50 pzas o 25 pz caja  c/40 bolsas','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(3,'Producto 3','Vela chica agua c/120pzas caja 20 bolsas','Piezas',-1,38.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:52:23'),
(4,'Producto 4','Vela chica leche c/120 pzas caja 20bosas','Piezas',0,38.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(5,'Producto 5','Vela grande agua c/60pz caja20 bolsas','Piezas',0,38.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(6,'Producto 6','Vela surtida agua y leche c/25pz caja 40 bolsas','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(7,'Producto 7','Vela surtida agua y leche c/50pz caja 40 bolsas','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(8,'Producto 8','Gorda c/10 pzas caja 25 bolsas','Piezas',-10,7.50,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:52:23'),
(9,'Producto 9','Extra c/20 pzas caja 25 bolsas ','Piezas',0,7.50,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(10,'Producto 10','Extra c/20pzas caja 25 bolsas','Piezas',0,8.50,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(11,'Producto 11','Freskin c/20 pzas caja 15 bolsas ','Piezas',0,13.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(12,'Producto 12','Freskita c/10 pzas caja 14 bolsas ','Piezas',0,10.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(13,'Producto 13','Gelatina agua c/60 pzas caja 15 bolsas','Piezas',0,28.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(14,'Producto 14','Gelatina leche c/60 pzas caja 15 bolsas ','Piezas',0,28.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(15,'Producto 15','Gelatina agua c/20 pzas caja 30 bolsas ','Piezas',0,10.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(16,'Producto 16','Gelatina leche c/20 pzas caja 30 bolsas ','Piezas',0,10.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(17,'Producto 17','Gelatina charola combinada  c/30 pz caja con 20 pz','Piezas',0,15.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(18,'Producto 18','Tamarindo puro c/13pz exibidor','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(19,'Producto 19','Gelatina agua  c/50pzas caja 20bolsas ','Piezas',0,22.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(20,'Producto 20','Gelatina leche c/50 pzas caja 20 bolsas ','Piezas',0,22.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(21,'Producto 21','Gelatina popotina  agua c/30 pzaas caja 20 bolsas ','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(22,'Producto 22','Gelatina popotina leche c/30pzas caja 20 bolsas','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(23,'Producto 23','Tamarindo puro c/20pzas  caja 25 bolsas ','Piezas',0,25.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(24,'Producto 24','Tamarindo vaso  negro  c/13 pzas caja 20 bolsas','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(25,'Producto 25','Tamarindo vaso rojo  c/13 pzas caja 20 bolsas ','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(26,'Producto 26','Vaso tamarindo rojo  c/20 pzas  caja 25 bolsas ','Piezas',0,25.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(27,'Producto 27','Vaso tamarindo negro  c/20pzas caja 25 bolsas','Piezas',0,25.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(28,'Producto 28','Gelatina agua leche  c/40 pz caja c/20','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(29,'Producto 29','Chamoy  chela  1 kilo caja 20','Piezas',0,41.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(30,'Producto 30','Alegria chica  c/10 pzas caja 66 bolsas','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(31,'Producto 31','Alegria grande  c/12 pzas  caja 32 bolsas ','Piezas',0,34.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(32,'Producto 32','Barquillo chocolate vitro c/120pz ','Piezas',0,82.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(33,'Producto 33','Chicotazo azucar c/50pzas caja 50 bolsas ','Piezas',0,26.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(34,'Producto 34','Chicotazo chile  c/50pzas caja 50 bolsas','Piezas',0,26.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(35,'Producto 35','Choco almendra  kg caja 10','Piezas',0,94.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(36,'Producto 36','Choco almendra 450gr kg caja 30 bolsas ','Piezas',0,41.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(37,'Producto 37','Banderilla combinada c/100 pz caja con 12pz','Piezas',0,61.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(38,'Producto 38','Barquillo bombon 20pz  caja 35 bolsas ','Piezas',0,13.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(39,'Producto 39','Banderilla grande 50pzas caja 12 vitro ','Piezas',0,36.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(40,'Producto 40','Banderilla grande c25pzas caja 40 bolsas','Piezas',0,18.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(41,'Producto 41','Barquillo bombon 40pz  caja 20 bolsas ','Piezas',0,25.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(42,'Producto 42','Borracho diaz 70 pzas caja 20 estuche','Piezas',0,54.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(43,'Producto 43','Carmeli miel exibidor caja c/20','Piezas',0,17.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(44,'Producto 44','Choco rompope 100 pzs caja 18 estuche ','Piezas',0,69.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(45,'Producto 45','Choco bombon 30pzas caja 30 bolsas ','Piezas',0,31.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(46,'Producto 46','Choco surtido 80pzas caja 20 estuche ','Piezas',0,75.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(47,'Producto 47','Cuchara c/80pz ','Piezas',0,60.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(48,'Producto 48','Coco mari colores 60pzas caja 12 estuche ','Piezas',0,75.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(49,'Producto 49','Chocomenta 1/2 kg caja 20 bolsas ','Piezas',0,33.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(50,'Producto 50','Choco bombon  estuche c/100 pz','Piezas',0,98.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(51,'Producto 51','Goma oso  chamoy c/60pz ','Piezas',0,44.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(52,'Producto 52','Goma pikingo c/120 pzas caja 20estuche ','Piezas',0,51.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(53,'Producto 53','Goma dino  c/60pzas caja 20 estuche ','Piezas',0,46.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(54,'Producto 54','Goma surtida 40pzas caja 30 charola ','Piezas',0,21.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(55,'Producto 55','Goma vivora 30pzas caja 30 charola ','Piezas',0,21.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(56,'Producto 56','Goma vivora 60pzas caja 20estuche ','Piezas',0,44.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(57,'Producto 57','Goma surtida 60pzas caja 20 estuche ','Piezas',0,44.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(58,'Producto 58','Huevo saurio 60pzas caja 12 estuche ','Piezas',0,42.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(59,'Producto 59','Macarron 75pzas caja 20 estuche ','Piezas',0,48.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(60,'Producto 60','Malvadisco surtido c/50pzas caja 16 estuche ','Piezas',0,46.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(61,'Producto 61','Manguito 90pzas  aprox  caja 20 estuche ','Piezas',0,53.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(62,'Producto 62','Muela de coco 10pzas caja 8 vitro ','Piezas',0,70.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(63,'Producto 63','Muelas 30pzas caja 30 bolsas ','Piezas',0,22.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(64,'Producto 64','Maruchanr tamarindo  c/50pzas caja 16 estuche ','Piezas',0,79.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(65,'Producto 65','Oblea comal  caja 50pzas ','Piezas',0,22.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(66,'Producto 66','Oblea mini 12pzas caja 200 bolsas ','Piezas',0,9.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(67,'Producto 67','Oblea mini 64pzas caja 32 estuche ','Piezas',0,39.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(68,'Producto 68','Oblea recorte  c/24 pzas bulto 10','Piezas',0,22.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(69,'Producto 69','Palanqueta c/20pzas caja 30 bolsas ','Piezas',0,21.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(70,'Producto 70','Palanqueta 95pzas caja 16 estuche ','Piezas',0,87.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(71,'Producto 71','Palanqueta vaso 60pzas caja 12 estuche ','Piezas',0,55.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(72,'Producto 72','Galleta surtida  c/60 ','Piezas',0,47.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(73,'Producto 73','Pelon mini  c/100 pzas caja 12 estuche ','Piezas',0,79.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(74,'Producto 74','Popotes surtidos  c/12pzas  caja 100 paquete ','Piezas',0,16.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(75,'Producto 75','Popotix  c/50pzas caja  40 bolsas ','Piezas',0,26.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(76,'Producto 76','Rifas niño-niña','Piezas',0,37.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(77,'Producto 77','Ollita c/100 pzas caja 20 estuche ','Piezas',0,39.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(78,'Producto 78','Ricaleta bolsa c/30 pz','Piezas',0,26.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(79,'Producto 79','Tarugo  c/80 pzas caha 20vitro ','Piezas',0,49.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(80,'Producto 80','Trufa convinada 60 pzas caja 20 estuche ','Piezas',0,46.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(81,'Producto 81','Trufa ganzo c/50pzas caja 24 estuche ','Piezas',0,46.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(82,'Producto 82','Paleta surtida c/40pz','Piezas',0,28.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(83,'Producto 83','Barquillo chocolate bolsa 20 pz caja c/30 ','Piezas',0,27.00,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15'),
(84,'Producto 84','Tronchis  suspiro 1/2 kg bolsa caja 20bolsas ','Piezas',0,35.50,'Producido',1,'producto.jpg','2022-12-02 19:48:15','2022-12-02 19:48:15');

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `proveedores` */

/*Table structure for table `rutas` */

DROP TABLE IF EXISTS `rutas`;

CREATE TABLE `rutas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rutas` */

insert  into `rutas`(`id`,`ruta`,`created_at`,`updated_at`) values 
(1,'TIXCA-ALMOLOYA- LLANO GDE.','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(2,'IXTAPAN- VILLA GRO','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(3,'TENANGO-TENANCINGO','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(4,'TENANGO- BALDERAS- TENANCINGO','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(5,'OCOYOACAC-SANTIAGO','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(6,'VALLE DE BRAVO- TEMASCALTEPEC','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(7,'IXTLAHUACA','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(8,'ATLACOMULCO- ACAMBAY','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(9,'CARMONA-SN JOSÉ RINCON','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(10,'ZITACUARO','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(11,'STA. MA. MONTE- ZINACANTEPEC','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(12,'CENTRAL','2022-12-02 19:49:32','2022-12-02 19:49:32'),
(13,'ATARASQUILLO','2022-12-02 19:49:32','2022-12-02 19:49:32');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ND',
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ND',
  `tipo_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`app`,`apm`,`representate`,`codigo`,`tipo_usuario`,`foto`,`activo`,`created_at`,`updated_at`) values 
(1,'Administrador UTVT','admin@utvt.com',NULL,'$2y$10$Zm5GFINInQTgoIBGCsqZUOFHJcihBrYZgsvZuJXJKQxgVsLQ771Ii',NULL,NULL,NULL,'ND','ND','1','user.jpg',1,NULL,NULL),
(2,'Usuario UTVT','usuario@utvt.com',NULL,'$2y$10$sDjCs9j6d18CNKamNXX2leZtAiTxZJKY65W0FcUyRSOa3lwO1UAMO',NULL,NULL,NULL,'ND','ND','2','user.jpg',1,NULL,NULL);

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_encargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `descuento` double(8,2) DEFAULT 0.00,
  `impuestos` double(8,2) NOT NULL,
  `total` double DEFAULT 0,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pago` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `estatus_pago` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Pendiente',
  `PayerID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ventas` */

insert  into `ventas`(`id`,`id_encargado`,`codigo`,`id_cliente`,`subtotal`,`descuento`,`impuestos`,`total`,`tipo`,`tipo_pago`,`estatus_pago`,`PayerID`,`created_at`,`updated_at`) values 
(1,'1','1','5',109.20,3.80,16.00,126.67,'Venta','1','Pagado','','2022-12-02 13:52:23','2022-12-02 19:54:21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
