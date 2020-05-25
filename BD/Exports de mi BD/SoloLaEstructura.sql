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

-- Dump completed on 2020-05-24 19:18:01
