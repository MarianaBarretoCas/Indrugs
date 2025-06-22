/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.32-MariaDB : Database - indrugs
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`indrugs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `indrugs`;

/*Table structure for table `control` */

DROP TABLE IF EXISTS `control`;

CREATE TABLE `control` (
  `ID_CONTROL` int(11) NOT NULL AUTO_INCREMENT,
  `FECHA_INICIO_TRATAMIENTO` datetime NOT NULL,
  `FECHA_FIN_TRATAMIENTO` datetime NOT NULL,
  `PROBLEMA_SALUD` text NOT NULL,
  `CANTIDAD_MEDIC` varchar(100) NOT NULL,
  `FRECUENCIA_MEDIC` varchar(100) NOT NULL,
  `ALARMA_CONTROL` time NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_MEDICAMENTOS` int(11) NOT NULL,
  PRIMARY KEY (`ID_CONTROL`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_MEDICAMENTOS` (`ID_MEDICAMENTOS`),
  CONSTRAINT `ID_MEDICAMENTOS` FOREIGN KEY (`ID_MEDICAMENTOS`) REFERENCES `medicamentos` (`ID_MEDICAMENTOS`),
  CONSTRAINT `ID_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `control` */

insert  into `control`(`ID_CONTROL`,`FECHA_INICIO_TRATAMIENTO`,`FECHA_FIN_TRATAMIENTO`,`PROBLEMA_SALUD`,`CANTIDAD_MEDIC`,`FRECUENCIA_MEDIC`,`ALARMA_CONTROL`,`ID_USUARIO`,`ID_MEDICAMENTOS`) values (1,'2025-04-17 06:43:00','2025-06-26 06:43:00','Hipertiroidismo',' 2 tabletas','cada 8 horas','22:44:00',32,1);

/*Table structure for table `domicilio` */

DROP TABLE IF EXISTS `domicilio`;

CREATE TABLE `domicilio` (
  `ID_DOMICILIO` int(11) NOT NULL AUTO_INCREMENT,
  `UBICACION_DOMICILIO` varchar(45) NOT NULL,
  `ESTADO_DOMICILIO` enum('EN CAMINO','ENTREGADO','EN ESPERA') NOT NULL,
  `FECHA_ENTREGA_DOMICILIO` datetime NOT NULL,
  `ID_VEHICULO` int(11) NOT NULL,
  `ID_ORDENES` int(11) NOT NULL,
  PRIMARY KEY (`ID_DOMICILIO`),
  KEY `ORDENES_ID_ORDENES` (`ID_ORDENES`),
  KEY `VEHÍCULO_ID_VEHÍCULO` (`ID_VEHICULO`),
  CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`ID_ORDENES`) REFERENCES `ordenes` (`ID_ORDENES`) ON DELETE CASCADE,
  CONSTRAINT `domicilio_ibfk_2` FOREIGN KEY (`ID_VEHICULO`) REFERENCES `vehiculo` (`ID_VEHICULO`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `domicilio` */

insert  into `domicilio`(`ID_DOMICILIO`,`UBICACION_DOMICILIO`,`ESTADO_DOMICILIO`,`FECHA_ENTREGA_DOMICILIO`,`ID_VEHICULO`,`ID_ORDENES`) values (4,'Transversal 8 #56-78','ENTREGADO','2024-09-24 13:24:15',4,4),(5,'Calle 15 #98-34','ENTREGADO','2024-07-09 08:37:31',5,5),(6,'Avenida 3 #22-10','EN ESPERA','2024-06-20 13:37:43',6,6),(8,'Calle 6 #44-55','ENTREGADO','2024-03-06 14:38:22',8,8),(9,'Calle 12 #78-90','EN ESPERA','2024-06-10 07:15:32',9,9),(10,'Avenida 6 #45-67','ENTREGADO','2024-04-09 12:50:52',10,10);

/*Table structure for table `inventario` */

DROP TABLE IF EXISTS `inventario`;

CREATE TABLE `inventario` (
  `ID_INVENTARIO` int(11) NOT NULL AUTO_INCREMENT,
  `FECHA_ENTRADA_INVENTARIO` datetime NOT NULL,
  `FECHA_SALIDA_INVENTARIO` datetime NOT NULL,
  `ID_MEDICAMENTOS` int(11) NOT NULL,
  `STOCK_INVENTARIO` varchar(100) NOT NULL,
  `VENCIMIENTOMED_INVENTARIO` date NOT NULL,
  `ESTADOMED_INVENTARIO` enum('ACTIVO','INACTIVO') NOT NULL,
  PRIMARY KEY (`ID_INVENTARIO`),
  KEY `MEDICAMENTOS_ID_MEDICAMENTOS` (`ID_MEDICAMENTOS`),
  CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`ID_MEDICAMENTOS`) REFERENCES `medicamentos` (`ID_MEDICAMENTOS`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `inventario` */

insert  into `inventario`(`ID_INVENTARIO`,`FECHA_ENTRADA_INVENTARIO`,`FECHA_SALIDA_INVENTARIO`,`ID_MEDICAMENTOS`,`STOCK_INVENTARIO`,`VENCIMIENTOMED_INVENTARIO`,`ESTADOMED_INVENTARIO`) values (1,'2024-08-01 15:37:49','2024-11-01 15:38:07',1,'24','2026-06-01','ACTIVO'),(2,'2024-09-02 08:39:31','2024-10-15 14:39:50',2,'72','2026-06-01','ACTIVO'),(3,'2024-08-06 12:40:00','2024-11-02 10:40:14',3,'86','2026-06-01','ACTIVO'),(4,'2024-04-02 16:43:05','2024-11-08 15:42:51',4,'45','2026-07-13','ACTIVO'),(5,'2024-06-13 14:47:19','2024-11-07 17:46:07',5,'63','2026-07-13','ACTIVO'),(6,'2024-07-09 07:47:29','2024-10-31 13:46:19',6,'98','2026-07-14','ACTIVO'),(7,'2024-01-24 11:47:43','2024-11-29 12:46:29',7,'102','2026-07-21','ACTIVO'),(8,'2024-03-13 09:48:00','2024-10-29 10:46:36',8,'56','2026-12-24','ACTIVO'),(9,'2024-08-13 13:48:13','2024-11-20 07:46:55',9,'40','2026-01-31','ACTIVO'),(10,'2024-04-17 14:48:22','2024-11-08 09:47:04',10,'74','2026-11-27','ACTIVO');

/*Table structure for table `medicamentos` */

DROP TABLE IF EXISTS `medicamentos`;

CREATE TABLE `medicamentos` (
  `ID_MEDICAMENTOS` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_MEDICAMENTOS` varchar(45) NOT NULL,
  `DESCRIPCION_MEDICAMENTOS` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_MEDICAMENTOS`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `medicamentos` */

insert  into `medicamentos`(`ID_MEDICAMENTOS`,`NOMBRE_MEDICAMENTOS`,`DESCRIPCION_MEDICAMENTOS`) values (1,'Aspirina','Analgésico'),(2,'Ibuprofeno','Antiinflamatorio'),(3,'Paracetamol','Antipirético'),(4,'Omeprazol','Antiácido'),(5,'Azitromicina','Antibiótico'),(6,'Ciprofloxina','Antibiótico'),(7,'Metformina','Antidiabético'),(8,'Atrovastatina','Hipolipemiante'),(9,'Fexofedina','Antialérgico'),(10,'Dexametasona','Corticoide');

/*Table structure for table `ordenes` */

DROP TABLE IF EXISTS `ordenes`;

CREATE TABLE `ordenes` (
  `ID_ORDENES` int(11) NOT NULL AUTO_INCREMENT,
  `FECHA_ENTREGA` datetime NOT NULL,
  `EPS_ORDEN` varchar(75) NOT NULL,
  `ESTADO_ORDEN` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `USUARIOS_PACIENTE` int(11) NOT NULL,
  `CANTIDADMED_ORDEN` int(11) NOT NULL,
  `DIRECCION_ORDEN` varchar(100) DEFAULT NULL,
  `TELEFONO_ORDEN` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ORDENES`),
  KEY `USUARIOS_ID_USUARIOS_PACIENTE` (`USUARIOS_PACIENTE`),
  CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`USUARIOS_PACIENTE`) REFERENCES `usuarios` (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `ordenes` */

insert  into `ordenes`(`ID_ORDENES`,`FECHA_ENTREGA`,`EPS_ORDEN`,`ESTADO_ORDEN`,`USUARIOS_PACIENTE`,`CANTIDADMED_ORDEN`,`DIRECCION_ORDEN`,`TELEFONO_ORDEN`) values (4,'2024-10-08 09:55:43','SURA','ACTIVO',8,0,NULL,NULL),(5,'2024-09-10 14:55:52','SANITAS','ACTIVO',9,0,NULL,NULL),(6,'2024-10-07 21:20:55','COMPENSAR ','ACTIVO',10,0,NULL,NULL),(8,'2024-07-25 07:22:02','SALUD_TOTAL','ACTIVO',12,0,NULL,NULL),(9,'2024-04-02 08:22:19','COMPENSAR ','ACTIVO',13,0,NULL,NULL),(10,'2023-10-03 13:23:32','SURA','ACTIVO',14,0,NULL,NULL),(18,'2025-04-18 11:08:00','Sanitas','ACTIVO',30,1,'Carrera 32 ',2147483647);

/*Table structure for table `ordenes_has_medicamentos` */

DROP TABLE IF EXISTS `ordenes_has_medicamentos`;

CREATE TABLE `ordenes_has_medicamentos` (
  `ID_MEDICAMENTO_POR_ORDEN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ORDENES` int(11) NOT NULL,
  `ID_MEDICAMENTOS` int(11) NOT NULL,
  PRIMARY KEY (`ID_MEDICAMENTO_POR_ORDEN`),
  KEY `ORDENES_ID_ORDENES` (`ID_ORDENES`),
  KEY `MEDICAMENTOS_ID_MEDICAMENTOS` (`ID_MEDICAMENTOS`),
  CONSTRAINT `ordenes_has_medicamentos_ibfk_1` FOREIGN KEY (`ID_ORDENES`) REFERENCES `ordenes` (`ID_ORDENES`) ON DELETE CASCADE,
  CONSTRAINT `ordenes_has_medicamentos_ibfk_2` FOREIGN KEY (`ID_MEDICAMENTOS`) REFERENCES `medicamentos` (`ID_MEDICAMENTOS`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `ordenes_has_medicamentos` */

insert  into `ordenes_has_medicamentos`(`ID_MEDICAMENTO_POR_ORDEN`,`ID_ORDENES`,`ID_MEDICAMENTOS`) values (4,4,4),(5,5,5),(6,6,6),(8,8,8),(9,9,9),(10,10,10),(12,18,1);

/*Table structure for table `pqrs` */

DROP TABLE IF EXISTS `pqrs`;

CREATE TABLE `pqrs` (
  `ID_PQRS` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO_SOLICITUD` enum('Queja','Reclamo','Sugerencia','Peticion') NOT NULL,
  `NOMBRE_COMPLETO` varchar(100) NOT NULL,
  `NUMERO_TELEFONO` varchar(20) NOT NULL,
  `TIPO_DOCUMENTO` enum('CC','TI') NOT NULL,
  `NUMERO_DOCUMENTO` varchar(20) NOT NULL,
  `MOTIVO_PQRS` text NOT NULL,
  `ID_USUARIOS` int(11) NOT NULL,
  PRIMARY KEY (`ID_PQRS`),
  KEY `ID_USUARIOS` (`ID_USUARIOS`),
  CONSTRAINT `ID_USUARIOS` FOREIGN KEY (`ID_USUARIOS`) REFERENCES `usuarios` (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pqrs` */

insert  into `pqrs`(`ID_PQRS`,`TIPO_SOLICITUD`,`NOMBRE_COMPLETO`,`NUMERO_TELEFONO`,`TIPO_DOCUMENTO`,`NUMERO_DOCUMENTO`,`MOTIVO_PQRS`,`ID_USUARIOS`) values (1,'Queja','Juan Camilo Torres Rojas ','3228173448','CC','1025142088','prueba',32),(2,'Reclamo','Mariana','31245667897','CC','123456789','Problemas en servidor',30);

/*Table structure for table `privilegios` */

DROP TABLE IF EXISTS `privilegios`;

CREATE TABLE `privilegios` (
  `ID_PRIVILEGIOS` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_PRIVILEGIOS` enum('SELECT','INSERT','UPDATE','DELETE') NOT NULL,
  PRIMARY KEY (`ID_PRIVILEGIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `privilegios` */

insert  into `privilegios`(`ID_PRIVILEGIOS`,`DESCRIPCION_PRIVILEGIOS`) values (1,'SELECT'),(2,'UPDATE'),(3,'INSERT');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `ID_ROLES` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_ROLES`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `roles` */

insert  into `roles`(`ID_ROLES`,`NOMBRE_ROL`) values (1,'Administrador'),(2,'Paciente'),(3,'Domiciliario');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `ID_USUARIOS` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIOS` varchar(100) NOT NULL,
  `TIPODOC_USUARIOS` enum('CC','TI','PPT') NOT NULL,
  `NUMDOC_USUARIOS` varchar(20) NOT NULL,
  `DIRECCION_USUARIOS` varchar(120) NOT NULL,
  `FORMULA _USUARIO` blob NOT NULL,
  `ESTADO_USUARIO` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `TELEFONO_USUARIOS` varchar(20) NOT NULL,
  `CORREO_USUARIOS` varchar(100) NOT NULL,
  `CONTRASEÑA_USUARIOS` varchar(300) NOT NULL,
  `ID_ROLES_USUARIOS` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIOS`),
  KEY `ROLES_ID_ROLES` (`ID_ROLES_USUARIOS`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_ROLES_USUARIOS`) REFERENCES `roles` (`ID_ROLES`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`ID_USUARIOS`,`NOMBRE_USUARIOS`,`TIPODOC_USUARIOS`,`NUMDOC_USUARIOS`,`DIRECCION_USUARIOS`,`FORMULA _USUARIO`,`ESTADO_USUARIO`,`TELEFONO_USUARIOS`,`CORREO_USUARIOS`,`CONTRASEÑA_USUARIOS`,`ID_ROLES_USUARIOS`) values (1,'Mariana Barreto','CC','1612950689','Calle 10 #12-45','','INACTIVO','300-123-4567','Mariana.Barreto@gmail.com','1612950689mb',1),(2,'Juan Torres','CC','1827842630','Avenida 5 #67-89','','ACTIVO','301-234-5678','Juan.Camilo.Torres@gmail.com','1827842630jt',1),(3,'Karol Galvin','CC','1730343072','Carrera 7 #34-23','','ACTIVO','302-345-6789','Karol.Diley.Galvin@gmail.com','1730343072kg',1),(4,'Gabriela Castiblanco','CC','1020129753','Transversal 8 #56-78','','ACTIVO','303-456-7890','Gabriela.Castiblanco@gmail.com','1020129753gc',1),(5,'Alejandro García','CC','1581667604','Calle 15 #98-34','','ACTIVO','304-567-8901','Alejandro.García@gmail.com','1581667604ag',2),(6,'Isabella Martínez','CC','1811252786','Avenida 3 #22-10','','ACTIVO','305-678-9012','Isabella.Martínez@gmail.com','1811252786im',2),(7,'Santiago Rodríguez','CC','1383943047','Carrera 11 #88-90','','ACTIVO','306-789-0123','Santiago.Rodríguez@gmail.com','1383943047sr',2),(8,'Valentina López','CC','1093252651','Calle 6 #44-55','','ACTIVO','307-890-1234','Valentina.López@gmail.com','1093252651vl',2),(9,'Elena Salazar','CC','1500644017','Calle 12 #78-90','','ACTIVO','319-012-3456','Elena.Salazar@gmail.com','1500644017es',2),(10,'Luis Álvarez','CC','1724984431','Avenida 6 #45-67','','ACTIVO','320-123-4567','Luis.Álvarez@gmail.com','1724984431la',2),(11,'Juliana Gutiérrez','CC','1854910208','Carrera 2 #89-23','','ACTIVO','321-234-5678','Juliana.Gutiérrez@gmail.com','1854910208jg',2),(12,'David Reyes','CC','1435288430','Calle 4 #12-34','','ACTIVO','322-345-6789','David.Reyes@gmail.com','1435288430dr',2),(13,'Paola Serrano','CC','1160767709','Avenida 8 #56-78','','ACTIVO','323-456-7890','Paola.Serrano@gmail.com','1160767709ps',2),(14,'Jorge Pacheco','CC','1520987374','Carrera 10 #34-56','','ACTIVO','324-567-8901','Jorge.Pacheco@gmail.com','1520987374jp',2),(15,'Gabriel Hernández','CC','1659922590','Avenida 9 #12-30','','INACTIVO','308-901-2345','Gabriel.Hernandez@gmail.com','1659922590gh',3),(16,'Catalina Pérez','CC','1044535462','Carrera 5 #67-89','','ACTIVO','309-012-3456','Catalina.Pérez@gmail.com','1044535462cp',3),(17,'Daniela García','CC','1184678867','Carrera 19 # 76-58','','ACTIVO','326-789-0123','Daniela.García@gmail.com','1184678867dg',3),(18,'Carmen Márquez','CC','1109101728','Avenida 12 # 98-21','','ACTIVO','327-890-1234','Carmen.Márquez@gmail.com','1109101728cm',3),(19,'Carlos Palacios','CC','1763082705','Transversal 7 # 42-14','','ACTIVO','328-901-2345','Carlos.Palacios@gmail.com','1763082705cp',3),(20,'Marta Vega','CC','1885632190','Calle 25 # 65-45','','ACTIVO','329-012-3456','Marta.Vega@gmail.com','1885632190mv',3),(21,'Javier Arango','CC','1779546502','Carrera 8 # 24-30','','ACTIVO','330-123-4567','Javier.Arango@gmail.com','1779546502ja',3),(22,'Tatiana Valdés','CC','1496824190','Avenida 7 # 56-32','','ACTIVO','331-234-5678','Tatiana.Valdés@gmail.com','1496824190tv',3),(23,'Luisana Paniagua','CC','1804326520','Calle 33 # 22-45','','ACTIVO','332-345-6789','Lusiana.Paniagua@gmail.com','1804326520lp',3),(24,'Oscar Suárez','CC','1188001437','Carrera 11 # 62-18','','ACTIVO','333-456-7890','Oscar.Suárez@gmail.com','1188001437os',3),(30,'Mariana ','CC','1234567896','CARRERA 32 #13-131','','ACTIVO','3124669522','marianac@gmail.com','$2y$10$UDLMJA16Cvw.0HtLLjRrRecjkebJmjWAR9hBPNoGP1J.oJlfyQ22W',1),(31,'camilo','CC','1234567896','CARRERA 32 #13-131','','ACTIVO','3013457821','camilo@gmail.com','$2y$10$zZqZmVyp.4U/wirjEC4z3.gOxNXqGJZstmDDraRqZozhyyLnx01py',3),(32,'Carlos','CC','123456789','CARRERA 32 #13-131','','ACTIVO','3124669522','carlos?@gmail.com','$2y$10$opYN/kdSFZWNd.ARRBxwle/0UOLcD8GifpLzLtjxIwVPT/xbB8dmS',2),(35,'Maria Velandia','CC','1045897603','calle 45 #15-23','','ACTIVO','3157995844','mariav@gmail.com','$2y$10$5uXJcyyhMUF/TG7wcWgwQetc9l/u06UXzPihprIyfc45IW40SIvju',3);

/*Table structure for table `usuarios_has_privilegios` */

DROP TABLE IF EXISTS `usuarios_has_privilegios`;

CREATE TABLE `usuarios_has_privilegios` (
  `ID_PRIVILEGIO_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIOS` int(11) NOT NULL,
  `ID_PRIVILEGIOS` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRIVILEGIO_USUARIO`),
  KEY `USUARIOS_ID_USUARIOS` (`ID_USUARIOS`),
  KEY `PRIVILEGIOS_ID_PRIVILEGIOS` (`ID_PRIVILEGIOS`),
  CONSTRAINT `usuarios_has_privilegios_ibfk_1` FOREIGN KEY (`ID_USUARIOS`) REFERENCES `usuarios` (`ID_USUARIOS`),
  CONSTRAINT `usuarios_has_privilegios_ibfk_2` FOREIGN KEY (`ID_PRIVILEGIOS`) REFERENCES `privilegios` (`ID_PRIVILEGIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `usuarios_has_privilegios` */

insert  into `usuarios_has_privilegios`(`ID_PRIVILEGIO_USUARIO`,`ID_USUARIOS`,`ID_PRIVILEGIOS`) values (1,1,3),(2,2,2),(3,3,1),(4,4,1),(5,5,2),(6,6,2),(7,7,2),(8,8,2),(9,9,2),(10,10,2),(11,11,2),(12,12,2),(13,13,2),(14,14,2),(15,15,1),(16,16,1);

/*Table structure for table `vehiculo` */

DROP TABLE IF EXISTS `vehiculo`;

CREATE TABLE `vehiculo` (
  `ID_VEHICULO` int(11) NOT NULL AUTO_INCREMENT,
  `COLOR_VEHICULO` varchar(45) NOT NULL,
  `MARCA_VEHICULO` varchar(50) NOT NULL,
  `PLACA_VEHICULO` varchar(45) NOT NULL,
  `TIPO_VEHICULO` enum('Carro','Moto') NOT NULL,
  `ESTADO_VEHICULO` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `PROPIETARIO_USUARIOS` int(11) NOT NULL,
  PRIMARY KEY (`ID_VEHICULO`),
  KEY `USUARIOS_ID_USUARIOS` (`PROPIETARIO_USUARIOS`),
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`PROPIETARIO_USUARIOS`) REFERENCES `usuarios` (`ID_USUARIOS`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `vehiculo` */

insert  into `vehiculo`(`ID_VEHICULO`,`COLOR_VEHICULO`,`MARCA_VEHICULO`,`PLACA_VEHICULO`,`TIPO_VEHICULO`,`ESTADO_VEHICULO`,`PROPIETARIO_USUARIOS`) values (1,'Rojo','Chevrolet','ABC-123','Carro','ACTIVO',15),(2,'Azul','Yamaha','XAA-01D','Moto','ACTIVO',16),(3,'Blanco','Toyota','GHI-789','Carro','ACTIVO',17),(4,'Negro','Honda','XAC-02F','Moto','ACTIVO',18),(5,'Verde','Ford','HDJ-556','Carro','ACTIVO',19),(6,'Azul','Volkswagen','HSY-884','Carro','ACTIVO',20),(7,'Blanco','Nissan','GSO-412','Carro','ACTIVO',21),(8,'Amarillo','Suzuki','XGA-03P','Moto','ACTIVO',22),(9,'Negro','AKT','XAU-58O','Moto','ACTIVO',23),(10,'Verde','Suzuki','XAS-24D','Moto','ACTIVO',24),(13,'Rosa','BMW','AFG47h','Moto','ACTIVO',35),(14,'Naranja','Chevrolet','MNE987','Carro','ACTIVO',35);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
