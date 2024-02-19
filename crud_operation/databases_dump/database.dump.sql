-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: crud_db
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `crud_data_banjar`
--

DROP TABLE IF EXISTS `crud_data_banjar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crud_data_banjar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_banjar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crud_data_banjar`
--

LOCK TABLES `crud_data_banjar` WRITE;
/*!40000 ALTER TABLE `crud_data_banjar` DISABLE KEYS */;
INSERT INTO `crud_data_banjar` VALUES (1,'Batu'),(2,'Gambang'),(3,'Pande'),(4,'Munggu'),(5,'Pandean'),(6,'Serangan'),(7,'Peregae'),(8,'Lebah Pangkung'),(9,'Pengiasan'),(10,'Alangkajeng'),(11,'Delod Bale Agung');
/*!40000 ALTER TABLE `crud_data_banjar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crud_data_penduduk`
--

DROP TABLE IF EXISTS `crud_data_penduduk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crud_data_penduduk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` char(16) NOT NULL,
  `nomor_kk` char(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `banjar` int NOT NULL,
  `tempat_lahir` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` int NOT NULL,
  `email` varchar(250) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`),
  KEY `banjar` (`banjar`),
  KEY `jenis_kelamin` (`jenis_kelamin`),
  CONSTRAINT `crud_data_penduduk_ibfk_1` FOREIGN KEY (`banjar`) REFERENCES `ref_banjar` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `crud_data_penduduk_ibfk_2` FOREIGN KEY (`jenis_kelamin`) REFERENCES `ref_gender` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crud_data_penduduk`
--

LOCK TABLES `crud_data_penduduk` WRITE;
/*!40000 ALTER TABLE `crud_data_penduduk` DISABLE KEYS */;
INSERT INTO `crud_data_penduduk` VALUES (1,'5103020805960008','5103021415210012','I Gst Ngr Bagus Putra Mahendra Yasa',10,'Mengwi','1996-05-08',1,'ngurahmahendra@mengwi-badung.desa.id','65d08ec851bcc.webp'),(2,'5103025805960002','5103021415210012','Ni Komang Urmila Dewi',10,'Denpasar','1996-05-18',2,'urmiladewi18@gmail.com','65d08ece4dc85.webp'),(4,'5103020901230004','5103021415210012','I Gusti Ayu Manik Mandala Putri',10,'Tabanan','2023-01-09',2,'manik.mandalaputri@gmail.com','65d08eda23cf4.webp'),(5,'5103021508820004','5103020711120014','I Putu Gede Astrawan',4,'Mengwi','1982-08-15',1,'astrawan.putu@mengwi-badung.desa.id','65d08ed447962.webp'),(6,'5103020506890002','5103021106180009','Ida Bagus Putu Ari Suryawan',2,'Badung','1989-06-05',1,'gustu_ary@gmail.com','65d08ee079f27.webp'),(7,'5103021011960002','5103020711120014','Ni Putu Nita Ningsih',4,'Mengwi','1996-11-10',2,'thanitha96@gmail.com','65d0b1033bf30.webp');
/*!40000 ALTER TABLE `crud_data_penduduk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crud_meta_jenis_kelamin`
--

DROP TABLE IF EXISTS `crud_meta_jenis_kelamin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `crud_meta_jenis_kelamin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crud_meta_jenis_kelamin`
--

LOCK TABLES `crud_meta_jenis_kelamin` WRITE;
/*!40000 ALTER TABLE `crud_meta_jenis_kelamin` DISABLE KEYS */;
INSERT INTO `crud_meta_jenis_kelamin` VALUES (1,'Laki-Laki'),(2,'Perempuan');
/*!40000 ALTER TABLE `crud_meta_jenis_kelamin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_banjar`
--

DROP TABLE IF EXISTS `ref_banjar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_banjar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_banjar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_banjar`
--

LOCK TABLES `ref_banjar` WRITE;
/*!40000 ALTER TABLE `ref_banjar` DISABLE KEYS */;
INSERT INTO `ref_banjar` VALUES (1,'Batu'),(2,'Gambang'),(3,'Pande'),(4,'Munggu'),(5,'Pandean'),(6,'Serangan'),(7,'Peregae'),(8,'Lebah Pangkung'),(9,'Pengiasan'),(10,'Alangkajeng'),(11,'Delod Bale Agung');
/*!40000 ALTER TABLE `ref_banjar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_gender`
--

DROP TABLE IF EXISTS `ref_gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_gender`
--

LOCK TABLES `ref_gender` WRITE;
/*!40000 ALTER TABLE `ref_gender` DISABLE KEYS */;
INSERT INTO `ref_gender` VALUES (1,'Laki-Laki'),(2,'Perempuan');
/*!40000 ALTER TABLE `ref_gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-19 13:41:07
