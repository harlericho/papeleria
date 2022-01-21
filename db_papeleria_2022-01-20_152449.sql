/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ db_papeleria /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE db_papeleria;

DROP TABLE IF EXISTS libro;
CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `precio_c` decimal(8,2) NOT NULL,
  `precio_v` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS login;
CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS tienda;
CREATE TABLE `tienda` (
  `id_tienda` int(11) NOT NULL AUTO_INCREMENT,
  `caja` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id_tienda`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS tipo_transaccion;
CREATE TABLE `tipo_transaccion` (
  `id_tipo_transaccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tipo_transaccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS transaccion;
CREATE TABLE `transaccion` (
  `id_transaccion` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `precio_adquirido` decimal(8,2) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'A',
  `id_libro` int(11) DEFAULT NULL,
  `id_tipo_transaccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaccion`),
  KEY `IX_Relationship1` (`id_libro`),
  KEY `IX_Relationship2` (`id_tipo_transaccion`),
  CONSTRAINT `Relationship1` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`),
  CONSTRAINT `Relationship2` FOREIGN KEY (`id_tipo_transaccion`) REFERENCES `tipo_transaccion` (`id_tipo_transaccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



INSERT INTO tienda(id_tienda,caja) VALUES(1,5000.00);

INSERT INTO tipo_transaccion(id_tipo_transaccion,nombre,estado) VALUES(1,'efectivo','A'),(2,'tarjeta','A'),(3,'transferencia','A');