-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdm_01
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `id_Comentario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comentario` varchar(255) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `noticia` int(10) unsigned DEFAULT NULL,
  `usuario` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_Comentario`),
  KEY `fk_Comentarios_Noticia` (`noticia`),
  KEY `fk_Comentarios_Usuario` (`usuario`),
  CONSTRAINT `fk_Comentarios_Noticia` FOREIGN KEY (`noticia`) REFERENCES `noticia` (`id_Noticia`),
  CONSTRAINT `fk_Comentarios_Usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estatus_noticia`
--

DROP TABLE IF EXISTS `estatus_noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estatus_noticia` (
  `id_Estatus_Noticia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estatus` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Estatus_Noticia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `imagen`
--

DROP TABLE IF EXISTS `imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagen` (
  `id_Imagen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imagen` mediumblob,
  PRIMARY KEY (`id_Imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id_Like` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noticia` int(10) unsigned DEFAULT NULL,
  `usuario` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_Like`),
  KEY `fk_Likes_Noticia` (`noticia`),
  KEY `fk_Likes_Usuario` (`usuario`),
  CONSTRAINT `fk_Likes_Noticia` FOREIGN KEY (`noticia`) REFERENCES `noticia` (`id_Noticia`),
  CONSTRAINT `fk_Likes_Usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `noticia` (
  `id_Noticia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(80) NOT NULL,
  `FechaPublicacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaAcontesimiento` date DEFAULT NULL,
  `Lugar` varchar(250) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Texto` text,
  `destacada` bit(1) DEFAULT (0),
  `activa` bit(1) DEFAULT (1),
  `seccion` int(10) unsigned DEFAULT NULL,
  `estatus` int(10) unsigned DEFAULT NULL,
  `autor` int(10) unsigned DEFAULT NULL,
  `palabra` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_Noticia`),
  KEY `fk_noticia_seccion` (`seccion`),
  KEY `fk_noticia_EstatusNoticia` (`estatus`),
  KEY `fk_noticia_Usuario` (`autor`),
  CONSTRAINT `fk_noticia_EstatusNoticia` FOREIGN KEY (`estatus`) REFERENCES `estatus_noticia` (`id_Estatus_Noticia`),
  CONSTRAINT `fk_noticia_Usuario` FOREIGN KEY (`autor`) REFERENCES `usuario` (`id_Usuario`),
  CONSTRAINT `fk_noticia_seccion` FOREIGN KEY (`seccion`) REFERENCES `seccion` (`id_Seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tgBorrarNoticia` BEFORE DELETE ON `noticia` FOR EACH ROW begin
	delete from comentarios where noticia = old.id_Noticia;
    delete from noticiaimagen where noticia = old.id_Noticia;
    delete from noticiavideo where noticia = old.id_Noticia;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `noticiaimagen`
--

DROP TABLE IF EXISTS `noticiaimagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `noticiaimagen` (
  `id_NoticiaImagen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noticia` int(10) unsigned DEFAULT NULL,
  `imagen` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_NoticiaImagen`),
  KEY `fk_NoticiaImagen_Noticia` (`noticia`),
  KEY `fk_NoticiaImagen_Imagen` (`imagen`),
  CONSTRAINT `fk_NoticiaImagen_Imagen` FOREIGN KEY (`imagen`) REFERENCES `imagen` (`id_Imagen`),
  CONSTRAINT `fk_NoticiaImagen_Noticia` FOREIGN KEY (`noticia`) REFERENCES `noticia` (`id_Noticia`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `noticiapalabra`
--

DROP TABLE IF EXISTS `noticiapalabra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `noticiapalabra` (
  `id_NoticiaPalabra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noticia` int(10) unsigned DEFAULT NULL,
  `palabra` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_NoticiaPalabra`),
  KEY `fk_NoticiaPalabra_Noticia` (`noticia`),
  KEY `fk_NoticiaPalabra_PalabraClave` (`palabra`),
  CONSTRAINT `fk_NoticiaPalabra_Noticia` FOREIGN KEY (`noticia`) REFERENCES `noticia` (`id_Noticia`),
  CONSTRAINT `fk_NoticiaPalabra_PalabraClave` FOREIGN KEY (`palabra`) REFERENCES `palabraclave` (`id_PalabraClave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `noticiavideo`
--

DROP TABLE IF EXISTS `noticiavideo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `noticiavideo` (
  `id_NoticiaVideo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noticia` int(10) unsigned DEFAULT NULL,
  `video` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_NoticiaVideo`),
  KEY `fk_NoticiaVideo_Noticia` (`noticia`),
  KEY `fk_NoticiaVideo_Video` (`video`),
  CONSTRAINT `fk_NoticiaVideo_Noticia` FOREIGN KEY (`noticia`) REFERENCES `noticia` (`id_Noticia`),
  CONSTRAINT `fk_NoticiaVideo_Video` FOREIGN KEY (`video`) REFERENCES `video` (`id_Video`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `palabraclave`
--

DROP TABLE IF EXISTS `palabraclave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `palabraclave` (
  `id_PalabraClave` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PalabraClave` varchar(20) NOT NULL,
  PRIMARY KEY (`id_PalabraClave`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seccion` (
  `id_Seccion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seccion_nombre` varchar(30) NOT NULL,
  `color` varchar(8) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `activa` bit(1) DEFAULT (1),
  PRIMARY KEY (`id_Seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tgSeccion` BEFORE DELETE ON `seccion` FOR EACH ROW begin

	update noticia set seccion=null, activa = 0 where seccion=old.id_Seccion;

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipousuario` (
  `id_TipoUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TipoUsuario` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_Usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `firma` varchar(30) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido_materno` varchar(20) DEFAULT NULL,
  `apellido_paterno` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `avatar` int(10) unsigned DEFAULT NULL,
  `tipoUsuario` int(10) unsigned DEFAULT NULL,
  `activo` bit(1) DEFAULT (1),
  PRIMARY KEY (`id_Usuario`),
  UNIQUE KEY `correo` (`correo`),
  KEY `fk_usuario_imagen` (`avatar`),
  KEY `fk_usuario_tipoUsuario` (`tipoUsuario`),
  CONSTRAINT `fk_usuario_imagen` FOREIGN KEY (`avatar`) REFERENCES `imagen` (`id_Imagen`),
  CONSTRAINT `fk_usuario_tipoUsuario` FOREIGN KEY (`tipoUsuario`) REFERENCES `tipousuario` (`id_TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `triggerUsuarioDelete` AFTER UPDATE ON `usuario` FOR EACH ROW begin
	if (new.activo = 0) then begin
		delete from noticia where autor = old.id_Usuario and estatus != 3;
    end;
    end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary view structure for view `vcomentario`
--

DROP TABLE IF EXISTS `vcomentario`;
/*!50001 DROP VIEW IF EXISTS `vcomentario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vcomentario` AS SELECT 
 1 AS `id_Comentario`,
 1 AS `comentario`,
 1 AS `fecha`,
 1 AS `noticia`,
 1 AS `firma`,
 1 AS `avatar`,
 1 AS `imagen`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `video` (
  `id_Video` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `direccion_video` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_Video`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tgNoticiaVideo` AFTER INSERT ON `video` FOR EACH ROW begin
	insert into noticiavideo (noticia, video) 
    values (ultimaNoticia(),new.id_Video);

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary view structure for view `vnoticiacard`
--

DROP TABLE IF EXISTS `vnoticiacard`;
/*!50001 DROP VIEW IF EXISTS `vnoticiacard`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vnoticiacard` AS SELECT 
 1 AS `id_Noticia`,
 1 AS `Titulo`,
 1 AS `FechaPublicacion`,
 1 AS `FechaAcontesimiento`,
 1 AS `Descripcion`,
 1 AS `destacada`,
 1 AS `activa`,
 1 AS `estatus`,
 1 AS `estatusNombre`,
 1 AS `seccion`,
 1 AS `PalabraClave`,
 1 AS `imagen`,
 1 AS `firma`,
 1 AS `autor`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vnoticiaimagenes`
--

DROP TABLE IF EXISTS `vnoticiaimagenes`;
/*!50001 DROP VIEW IF EXISTS `vnoticiaimagenes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vnoticiaimagenes` AS SELECT 
 1 AS `id_Imagen`,
 1 AS `imagen`,
 1 AS `noticia`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vusuario`
--

DROP TABLE IF EXISTS `vusuario`;
/*!50001 DROP VIEW IF EXISTS `vusuario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vusuario` AS SELECT 
 1 AS `id_Usuario`,
 1 AS `correo`,
 1 AS `contraseña`,
 1 AS `firma`,
 1 AS `nombre`,
 1 AS `apellido_materno`,
 1 AS `apellido_paterno`,
 1 AS `telefono`,
 1 AS `tipoUsuario`,
 1 AS `activo`,
 1 AS `imagen`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vvernoticia`
--

DROP TABLE IF EXISTS `vvernoticia`;
/*!50001 DROP VIEW IF EXISTS `vvernoticia`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vvernoticia` AS SELECT 
 1 AS `id_Noticia`,
 1 AS `Titulo`,
 1 AS `FechaPublicacion`,
 1 AS `FechaAcontesimiento`,
 1 AS `Lugar`,
 1 AS `Descripcion`,
 1 AS `Texto`,
 1 AS `destacada`,
 1 AS `activa`,
 1 AS `seccion`,
 1 AS `seccion_nombre`,
 1 AS `estatus`,
 1 AS `autor`,
 1 AS `firma`,
 1 AS `palabra`,
 1 AS `PalabraClave`,
 1 AS `direccion_video`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'bdm_01'
--

--
-- Dumping routines for database 'bdm_01'
--
/*!50003 DROP FUNCTION IF EXISTS `fCountLikes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fCountLikes`(pNoticia int) RETURNS int(11)
    DETERMINISTIC
BEGIN
	declare likesTotales int;
    set likesTotales = (select count(id_Like) from likes where noticia = pNoticia);
    return (likesTotales);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fFirstSeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fFirstSeccion`() RETURNS int(11)
    DETERMINISTIC
BEGIN
	declare id int;
    set id = (select id_Seccion from Seccion order by id_Seccion limit 1);
    return (id);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fLastSeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fLastSeccion`() RETURNS int(11)
    DETERMINISTIC
BEGIN
	declare id int;
    set id = (select id_Seccion from Seccion order by id_Seccion desc limit 1);
    return (id);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fNuevoOrden` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `fNuevoOrden`() RETURNS int(11)
    DETERMINISTIC
BEGIN
	declare norden int;
    set norden = (select orden from Seccion order by orden desc limit 1) + 1;
    return (norden);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `ultimaImagen` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ultimaImagen`() RETURNS int(11)
    DETERMINISTIC
BEGIN
	declare imagen int;
	
    set imagen = (select id_Imagen from imagen
    order by id_Imagen desc limit 1);
    
    return (imagen);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `ultimaNoticia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ultimaNoticia`() RETURNS int(11)
    DETERMINISTIC
BEGIN
	declare nota int;
	
    set nota = (select id_Noticia from noticia
    order by id_Noticia desc limit 1);
    
    return (nota);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `ultimaPalabra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ultimaPalabra`() RETURNS int(11)
    DETERMINISTIC
BEGIN
	declare palabra int;
	
    set palabra = (select id_PalabraClave 
    from palabraclave 
    order by id_PalabraClave desc limit 1);
    
    return (palabra);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `noticiaBusqueda_ByTitulo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaBusqueda_ByTitulo`(IN p varchar(50))
BEGIN
  select id_Noticia, Titulo, descripcion, FechaPublicacion, activa, PalabraClave, imagen 
		from vNoticiaCard where Titulo Like CONCAT('%', p , '%') and estatus = 3 and activa = 1
        order by FechaPublicacion desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `noticiaDelete_ById` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaDelete_ById`(IN p int(10))
BEGIN
  delete from noticia where id_Noticia = p;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `noticiaGet_All` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaGet_All`()
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia where estatus != 3;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `noticiaGet_ById` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaGet_ById`(IN p int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia where id_Noticia = p;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `noticiaGet_BySeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaGet_BySeccion`(IN p int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia where seccion = p;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `noticiaGet_ByUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaGet_ByUser`(IN p int(10))
BEGIN
  select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion,
  estatus, autor, destacada, activa from noticia where autor = p;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `noticiaRedactar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaRedactar`(IN pTitulo varchar(50), IN pFechaAcontesimiento date,
IN pLugar varchar(250), IN pDescripcion varchar(250), IN pTexto text, 
IN pseccion int(10), IN pstatus int(10), IN pautor int(10))
BEGIN
  insert into noticia (Titulo, FechaAcontesimiento, Lugar, Descripcion, Texto, seccion, estatus, autor) 
        values (pTitulo, pFechaAcontesimiento, pLugar, pDescripcion, pTexto, pseccion, pestatus, pautor);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `noticiaSoftDelete_ById` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `noticiaSoftDelete_ById`(IN p int(10))
BEGIN
  update noticia set activa=0 where id_Noticia = p;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtenerComentarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerComentarios`(
	in noticiaID int
)
begin
	select id_Comentario, comentario, fecha, noticia, firma, imagen 
	from vComentario where noticia = noticiaID;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `obtenerImagenesNoticia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerImagenesNoticia`(
	in idNoticia int
)
BEGIN
	select id_Imagen, imagen, noticia
    from vNoticiaImagenes
    where noticia = idNoticia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pSeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pSeccion`(
	in opcion int,
	in pId int,
    in pNombre varchar(30),
    in pColor varchar(8),
	in pOrden int,
    in pActiva int
)
begin
declare oldOrden int;

	if (opcion = 1) then
		insert into seccion (seccion_nombre, color, orden, activa) values (pNombre, pColor, fNuevoOrden(), 1);
    end if;
    if(opcion = 2) then
		set oldOrden = (select orden from seccion where id_Seccion = pId);
		
		if(oldOrden != pOrden) then
			if(pOrden < oldOrden) then
				update seccion set orden = (orden + 1) where orden between pOrden and oldOrden;
			end if;
			if(pOrden > oldOrden) then
				update seccion set orden = (orden - 1) where orden between oldOrden and pOrden;
			end if;
		end if;
		update seccion set orden = pOrden, color = pColor, activa = pActiva where id_Seccion = pId;
        
    end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `psUsuarioByID` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `psUsuarioByID`(
	in pID int
)
BEGIN
	select id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno, telefono, tipoUsuario, activo, imagen 
	from vUsuario
    where id_Usuario = pID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pUpdateSeccion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pUpdateSeccion`(
	in pId int,
    in pColor varchar(8),
	in pOrden int,
    in pActiva int
)
begin
	declare oldOrden int;
	
    set oldOrden = (select orden from seccion where id_Seccion = pId);
    
	if(oldOrden != pOrden) then
		if(pOrden < oldOrden) then
			update seccion set orden = (orden + 1) where orden between pOrden and oldOrden;
        end if;
        if(pOrden > oldOrden) then
			update seccion set orden = (orden - 1) where orden between oldOrden and pOrden;
        end if;
    end if;
    
    update seccion set orden = pOrden, color = pColor, activa = pActiva where id_Seccion = pId;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spGetLikes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetLikes`(
	in pNoticia int
)
BEGIN
	select id_Like, usuario from likes where noticia = pNoticia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spImagen` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spImagen`(
	in pImagen mediumblob
)
BEGIN
	insert into imagen (imagen) values (pImagen);
    
    insert into noticiaimagen (noticia, imagen) values (ultimaNoticia(), ultimaImagen());
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spLike` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spLike`(
	in opcion int,
    in idNoticia int,
    in idUsuario int
)
BEGIN
	if(opcion = 1) then
		insert into likes (noticia, usuario) values (idNoticia, idUsuario);
	elseif(opcion = 2) then
		delete from likes where noticia = idNoticia and usuario = idUsuario;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spNotasRelacionadas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spNotasRelacionadas`(
	in pPalabra varchar(30)
)
BEGIN
	select id_Noticia, Titulo, FechaPublicacion, FechaAcontesimiento,Descripcion, destacada, activa, 
		estatus, estatusNombre, seccion, PalabraClave, imagen, firma, autor
	from vNoticiaCard
    where PalabraClave = pPalabra and estatus = 3
	order by rand()
	limit 5;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spPortada` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spPortada`(
)
BEGIN
	select id_Noticia, Titulo, descripcion, activa, destacada, PalabraClave, imagen
	from vNoticiaCard where estatus = 3 and activa = 1
	order by destacada desc, id_Noticia
	limit 8;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spUpdateUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateUsuario`(
	in pID int,
	in pNombre varchar(20),
    in pPaterno varchar(20),
    in pMaterno varchar(20),
    in pFirma varchar(30),
    in pTelefono varchar(15),
    in pImagen mediumblob,
    in pContraseña varchar(30)
)
BEGIN
	if(pImagen is not null) then
		insert into imagen (imagen) values (pImagen);
        
        update usuario set nombre=pNombre, apellido_paterno=pPaterno, apellido_materno=pMaterno, 
			firma = pFirma, telefono = pTelefono, avatar = ultimaImagen(), contraseña = pContraseña where id_Usuario = pID;
    else
		update usuario set nombre=pNombre, apellido_paterno=pPaterno, apellido_materno=pMaterno, 
			firma = pFirma, telefono = pTelefono, contraseña = pContraseña where id_Usuario = pID;
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `testBusqueda` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `testBusqueda`(
	IN texto VARCHAR(255)
)
BEGIN
	SELECT * 
 	FROM noticia
	WHERE Titulo Like CONCAT("'%", texto, "%' ");
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `testBusqueda2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `testBusqueda2`(
	IN texto VARCHAR(255)
)
BEGIN
	SELECT * 
 	FROM noticia
	WHERE Titulo Like texto;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `testBusqueda3` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `testBusqueda3`(
	IN texto VARCHAR(255)
)
BEGIN
	SELECT * 
 	FROM noticia
	WHERE Titulo Like CONCAT('%', texto , '%');
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `testBusquedaOpcion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BusquedaOpcion`(
	in opcion int,
	IN texto VARCHAR(255),
    in fechaIni date,
    in fechaFin date
)
BEGIN
    case  
	   when opcion = 0 then
		select id_Noticia, Titulo, descripcion, FechaPublicacion, activa, PalabraClave, imagen 
		from vNoticiaCard where Titulo Like CONCAT('%', texto , '%') and estatus = 3 and activa = 1
        order by FechaPublicacion desc;
	   when opcion = 1 then
		select id_Noticia, Titulo, descripcion, FechaPublicacion, activa, PalabraClave, imagen 
		from vNoticiaCard where PalabraClave Like CONCAT('%', texto , '%') and estatus = 3 and activa = 1
        order by FechaPublicacion desc;
	   when opcion = 2 then
       SELECT id_Noticia, Titulo, descripcion, FechaPublicacion, activa, PalabraClave, imagen  
		FROM vNoticiaCard WHERE FechaPublicacion  BETWEEN fechaIni AND fechaFin and estatus = 3 and activa = 1
        order by FechaPublicacion desc;
	end case;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `testBusquedaOpcion2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `testBusquedaOpcion2`(
	in opcion int,
	IN texto VARCHAR(255),
    in fechaIni date,
    in fechaFin date
)
BEGIN
	IF fechaIni = '' THEN SET fechaIni = null; END IF;
    IF fechaFin = '' THEN SET fechaFin = null; END IF;
    case  
	   when opcion = 0 then
		SELECT * FROM noticia WHERE Titulo Like CONCAT('%', texto , '%');
	   when opcion = 1 then
		SELECT * FROM noticia;
	   when opcion = 2 then
       SELECT * FROM noticia WHERE FechaPublicacion  BETWEEN fechaIni AND fechaFin;
	end case;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usuarioGet_porCorreoContra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioGet_porCorreoContra`(
	in correo2 varchar(50),
	IN contraseña2 VARCHAR(255)
)
BEGIN
	select id_Usuario, correo, contraseña, firma, nombre, apellido_materno, apellido_paterno, telefono, tipoUsuario, activo, imagen 
	from vUsuario
    where correo = correo2 and contraseña = contraseña2; 
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `usuarioRegistro` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioRegistro`(IN pCorreo varchar(100), IN pContra varchar(30), IN pFirma varchar(20),
IN pNombre varchar(20), IN pApPaterno varchar(20), IN pApMaterno varchar(20), IN pTelefono varchar(15),
IN pAvatar int(10), IN pTipoUsuario varchar(10))
BEGIN
  INSERT INTO usuario (correo, contraseña, firma, nombre, apellido_paterno, apellido_materno, telefono,avatar, tipoUsuario,activo)
  VALUES (pCorreo, pContra, pFirma, pNombre, pApPaterno, pApMaterno, pTelefono, pAvatar, pTipoUsuario, 1);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vcomentario`
--

/*!50001 DROP VIEW IF EXISTS `vcomentario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vcomentario` AS select `c`.`id_Comentario` AS `id_Comentario`,`c`.`comentario` AS `comentario`,`c`.`fecha` AS `fecha`,`c`.`noticia` AS `noticia`,`a`.`firma` AS `firma`,`a`.`avatar` AS `avatar`,`i`.`imagen` AS `imagen` from ((`comentarios` `c` join `usuario` `a` on((`c`.`usuario` = `a`.`id_Usuario`))) left join `imagen` `i` on((`i`.`id_Imagen` = `a`.`avatar`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vnoticiacard`
--

/*!50001 DROP VIEW IF EXISTS `vnoticiacard`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vnoticiacard` AS select `n`.`id_Noticia` AS `id_Noticia`,`n`.`Titulo` AS `Titulo`,`n`.`FechaPublicacion` AS `FechaPublicacion`,`n`.`FechaAcontesimiento` AS `FechaAcontesimiento`,`n`.`Descripcion` AS `Descripcion`,`n`.`destacada` AS `destacada`,`n`.`activa` AS `activa`,`n`.`estatus` AS `estatus`,`en`.`estatus` AS `estatusNombre`,`n`.`seccion` AS `seccion`,`p`.`PalabraClave` AS `PalabraClave`,`i`.`imagen` AS `imagen`,`u`.`firma` AS `firma`,`n`.`autor` AS `autor` from (((((`noticia` `n` join `palabraclave` `p` on((`n`.`palabra` = `p`.`id_PalabraClave`))) join `noticiaimagen` `ni` on((`ni`.`noticia` = `n`.`id_Noticia`))) join `imagen` `i` on((`i`.`id_Imagen` = `ni`.`imagen`))) join `estatus_noticia` `en` on((`en`.`id_Estatus_Noticia` = `n`.`estatus`))) join `usuario` `u` on((`u`.`id_Usuario` = `n`.`autor`))) group by `n`.`id_Noticia` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vnoticiaimagenes`
--

/*!50001 DROP VIEW IF EXISTS `vnoticiaimagenes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vnoticiaimagenes` AS select `i`.`id_Imagen` AS `id_Imagen`,`i`.`imagen` AS `imagen`,`ni`.`noticia` AS `noticia` from (`imagen` `i` join `noticiaimagen` `ni` on((`i`.`id_Imagen` = `ni`.`imagen`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vusuario`
--

/*!50001 DROP VIEW IF EXISTS `vusuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vusuario` AS select `u`.`id_Usuario` AS `id_Usuario`,`u`.`correo` AS `correo`,`u`.`contraseña` AS `contraseña`,`u`.`firma` AS `firma`,`u`.`nombre` AS `nombre`,`u`.`apellido_materno` AS `apellido_materno`,`u`.`apellido_paterno` AS `apellido_paterno`,`u`.`telefono` AS `telefono`,`u`.`tipoUsuario` AS `tipoUsuario`,`u`.`activo` AS `activo`,`i`.`imagen` AS `imagen` from (`usuario` `u` left join `imagen` `i` on((`u`.`avatar` = `i`.`id_Imagen`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vvernoticia`
--

/*!50001 DROP VIEW IF EXISTS `vvernoticia`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vvernoticia` AS select `n`.`id_Noticia` AS `id_Noticia`,`n`.`Titulo` AS `Titulo`,`n`.`FechaPublicacion` AS `FechaPublicacion`,`n`.`FechaAcontesimiento` AS `FechaAcontesimiento`,`n`.`Lugar` AS `Lugar`,`n`.`Descripcion` AS `Descripcion`,`n`.`Texto` AS `Texto`,`n`.`destacada` AS `destacada`,`n`.`activa` AS `activa`,`n`.`seccion` AS `seccion`,`s`.`seccion_nombre` AS `seccion_nombre`,`n`.`estatus` AS `estatus`,`n`.`autor` AS `autor`,`u`.`firma` AS `firma`,`n`.`palabra` AS `palabra`,`p`.`PalabraClave` AS `PalabraClave`,`v`.`direccion_video` AS `direccion_video` from (((((`noticia` `n` join `noticiavideo` `nv` on((`n`.`id_Noticia` = `nv`.`noticia`))) join `video` `v` on((`v`.`id_Video` = `nv`.`video`))) join `seccion` `s` on((`s`.`id_Seccion` = `n`.`seccion`))) join `usuario` `u` on((`u`.`id_Usuario` = `n`.`autor`))) join `palabraclave` `p` on((`p`.`id_PalabraClave` = `n`.`palabra`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-24 20:34:05
