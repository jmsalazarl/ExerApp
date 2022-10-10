-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: exerapp
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Area_Practica`
--

DROP TABLE IF EXISTS `Area_Practica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Area_Practica` (
  `idArea_Practica` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `num_horas_area` int(11) NOT NULL,
  `carrera_area_practica` int(11) NOT NULL,
  `tutor_a_cargo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idArea_Practica`),
  KEY `fk_carrera_area_practica_idx` (`carrera_area_practica`),
  CONSTRAINT `fk_carrera_area_practica` FOREIGN KEY (`carrera_area_practica`) REFERENCES `Carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Area_Practica`
--

LOCK TABLES `Area_Practica` WRITE;
/*!40000 ALTER TABLE `Area_Practica` DISABLE KEYS */;
/*!40000 ALTER TABLE `Area_Practica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Asistencia`
--

DROP TABLE IF EXISTS `Asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Asistencia` (
  `idAsistencia` int(11) NOT NULL,
  `cedula_es_asist` varchar(10) NOT NULL,
  `hora_entrada` varchar(45) NOT NULL,
  `hora_salida` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idAsistencia`),
  KEY `fk_cedula_est_asist_idx` (`cedula_es_asist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Asistencia`
--

LOCK TABLES `Asistencia` WRITE;
/*!40000 ALTER TABLE `Asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `Asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Carrera`
--

DROP TABLE IF EXISTS `Carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Carrera` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(45) NOT NULL,
  `num_horas_practica` int(11) NOT NULL,
  `facultad` int(11) NOT NULL,
  PRIMARY KEY (`idCarrera`),
  KEY `fk_Carrera_facultad_idx` (`facultad`),
  CONSTRAINT `fk_Carrera_facultad` FOREIGN KEY (`facultad`) REFERENCES `Facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Carrera`
--

LOCK TABLES `Carrera` WRITE;
/*!40000 ALTER TABLE `Carrera` DISABLE KEYS */;
INSERT INTO `Carrera` VALUES (1,'ingenieria en sistemas',480,1);
/*!40000 ALTER TABLE `Carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Decano`
--

DROP TABLE IF EXISTS `Decano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Decano` (
  `cedula_dec` varchar(10) NOT NULL,
  `facultad` int(11) NOT NULL,
  PRIMARY KEY (`cedula_dec`),
  KEY `fk_facultad_decano_idx` (`facultad`),
  CONSTRAINT `fk_facultad_decano` FOREIGN KEY (`facultad`) REFERENCES `Facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Decano`
--

LOCK TABLES `Decano` WRITE;
/*!40000 ALTER TABLE `Decano` DISABLE KEYS */;
/*!40000 ALTER TABLE `Decano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Estudiante`
--

DROP TABLE IF EXISTS `Estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Estudiante` (
  `cedula_est` varchar(10) NOT NULL,
  `carrera_est` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_est`),
  KEY `fk_carrera_est_idx` (`carrera_est`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Estudiante`
--

LOCK TABLES `Estudiante` WRITE;
/*!40000 ALTER TABLE `Estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `Estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Facultad`
--

DROP TABLE IF EXISTS `Facultad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Facultad` (
  `idFacultad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idFacultad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Facultad`
--

LOCK TABLES `Facultad` WRITE;
/*!40000 ALTER TABLE `Facultad` DISABLE KEYS */;
INSERT INTO `Facultad` VALUES (1,'ENERGIA'),(2,'EDUCATIVA'),(3,'ADMINISTRATIVA');
/*!40000 ALTER TABLE `Facultad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Institucion`
--

DROP TABLE IF EXISTS `Institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Institucion` (
  `ruc` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `vacantes` int(11) DEFAULT NULL,
  `num_practicantes` int(11) DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ruc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Institucion`
--

LOCK TABLES `Institucion` WRITE;
/*!40000 ALTER TABLE `Institucion` DISABLE KEYS */;
INSERT INTO `Institucion` VALUES (2222,'oderbiz',2,4,'vespertino');
/*!40000 ALTER TABLE `Institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tarea`
--

DROP TABLE IF EXISTS `Tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tarea` (
  `idTarea` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `hora_finalizacion` varchar(45) NOT NULL,
  `lugar_ejecucion` varchar(45) NOT NULL,
  PRIMARY KEY (`idTarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tarea`
--

LOCK TABLES `Tarea` WRITE;
/*!40000 ALTER TABLE `Tarea` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tarea_Estudiante`
--

DROP TABLE IF EXISTS `Tarea_Estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tarea_Estudiante` (
  `idTarea_Estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `tarea_asignada` int(11) NOT NULL,
  `estudiante_asignado` varchar(10) NOT NULL,
  PRIMARY KEY (`idTarea_Estudiante`),
  KEY `fk_tarea_asignada_idx` (`tarea_asignada`),
  KEY `fk_estudiante_asignado_idx` (`estudiante_asignado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tarea_Estudiante`
--

LOCK TABLES `Tarea_Estudiante` WRITE;
/*!40000 ALTER TABLE `Tarea_Estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tarea_Estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tutor_Institucion`
--

DROP TABLE IF EXISTS `Tutor_Institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tutor_Institucion` (
  `cedula_tutor_inst` varchar(10) NOT NULL,
  `institucion` varchar(50) NOT NULL,
  PRIMARY KEY (`cedula_tutor_inst`),
  KEY `fk_institucion_idx` (`institucion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tutor_Institucion`
--

LOCK TABLES `Tutor_Institucion` WRITE;
/*!40000 ALTER TABLE `Tutor_Institucion` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tutor_Institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tutor_Practicas`
--

DROP TABLE IF EXISTS `Tutor_Practicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tutor_Practicas` (
  `cedula_tutor_prac` varchar(10) NOT NULL,
  `carrera_tutor_prac` varchar(45) NOT NULL,
  `area_tutor_prac` varchar(45) NOT NULL,
  PRIMARY KEY (`cedula_tutor_prac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tutor_Practicas`
--

LOCK TABLES `Tutor_Practicas` WRITE;
/*!40000 ALTER TABLE `Tutor_Practicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tutor_Practicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `cedula` varchar(10) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `nivel` int(1) NOT NULL,
  `cookie` int(10) NOT NULL DEFAULT '0',
  `logueado` varchar(2) NOT NULL DEFAULT 'NO',
  `salt` char(28) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-24 17:06:26
