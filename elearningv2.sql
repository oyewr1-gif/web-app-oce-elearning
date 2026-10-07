-- MySQL dump 10.16  Distrib 10.2.33-MariaDB, for Linux (mipsel)
--
-- Host: localhost    Database: elearning
-- ------------------------------------------------------
-- Server version	10.2.33-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `announce`
--

DROP TABLE IF EXISTS `announce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pengumuman` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announce`
--

LOCK TABLES `announce` WRITE;
/*!40000 ALTER TABLE `announce` DISABLE KEYS */;
INSERT INTO `announce` VALUES (1,'2023-08-31 11:07:42','Besok libur 7 hari');
/*!40000 ALTER TABLE `announce` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL DEFAULT '0',
  `category` varchar(15) NOT NULL DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (1,'Instalasi Debian Server Pada VirtualBox (Youtube)','video','https://youtube.com/embed/z2EHGaIVkCQ?si=w1fsg5d_yTgadCX-'),(2,'LKPD Prinsip Dasar WLAN (G-Form)','jobsheet','https://docs.google.com/forms/d/e/1FAIpQLScOxCXNWSDj7WQQYeVln6h7Do1-m7T-XfP0rQrT-kNqw9KbYA/viewform?usp=sf_link'),(3,'LKPD Proses Bisnis Pertemuan 1 (G-Form)','jobsheet','https://forms.gle/nQn5iXfarMEE7KBx8'),(4,'LKPD Proses Bisnis Pertemuan 2 (G-Form)','jobsheet','https://forms.gle/y5p5pPEN7hi3aM4KA'),(5,'Besok libur 7 hari','announcement',NULL),(6,'Quiz Prinsip Dasar WLAN (G-Form)','quiz','https://docs.google.com/forms/d/e/1FAIpQLSfAQB8lZqQ9jUybDzZaWEGa6dUddncwDfZ7VrdC3TJmSaRx_w/viewform?embedded=true'),(7,'Quiz Proses Bisnis di Bidang Kmputer dan Telekomunikasi (G-Form)','quiz','https://forms.gle/CL5rbtftxQNm79Gx7'),(9,'Quiz Membangun Server Web (G-Form)','quiz','https://forms.gle/gKyyn7uPikbDYQFR7'),(12,'10 Ide Usaha Model Kecil Untung Besar (Youtube)','apersepsi','https://www.youtube.com/embed/E2t9npEYWC8'),(13,'Mudahnya Jalani Hobi Ilustrasi Jadi Bisnis Art (Youtube)','apersepsi','https://www.youtube.com/embed/0eBjex_a3vM'),(14,'Ilustrasi Proses Bisnis (Youtube)','apersepsi','https://www.youtube.com/embed/rkN19lD6rnM'),(15,'Cara Seting Router TP-Link TL-WR840N (Youtube)','video','https://www.youtube.com/embed/cmTmXSoOST4'),(16,'Quiz Bank','quiz','?class=Quiz'),(17,'Database Server Post-test (G-Form)','quiz','https://forms.gle/xnkd9gT17Y8RKUaM6');
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ebook`
--

DROP TABLE IF EXISTS `ebook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '0',
  `link` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ebook`
--

LOCK TABLES `ebook` WRITE;
/*!40000 ALTER TABLE `ebook` DISABLE KEYS */;
INSERT INTO `ebook` VALUES (4,'Instalasi Debian Server Pada VirtualBox','https://youtube.com/embed/z2EHGaIVkCQ?si=w1fsg5d_yTgadCX-');
/*!40000 ALTER TABLE `ebook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobsheet`
--

DROP TABLE IF EXISTS `jobsheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobsheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '0',
  `link` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobsheet`
--

LOCK TABLES `jobsheet` WRITE;
/*!40000 ALTER TABLE `jobsheet` DISABLE KEYS */;
INSERT INTO `jobsheet` VALUES (1,'LKPD Prinsip Dasar WLAN (G-Form)','https://docs.google.com/forms/d/e/1FAIpQLScOxCXNWSDj7WQQYeVln6h7Do1-m7T-XfP0rQrT-kNqw9KbYA/viewform?usp=sf_link'),(2,'LKPD Proses Bisnis Pertemuan 1 (G-Form)','https://forms.gle/nQn5iXfarMEE7KBx8'),(3,'LKPD Proses Bisnis Pertemuan 2 (G-Form)','https://forms.gle/y5p5pPEN7hi3aM4KA');
/*!40000 ALTER TABLE `jobsheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `text_menu` varchar(50) NOT NULL DEFAULT '0',
  `link_menu` varchar(50) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (2,'Library','?class=Library',0),(3,'Teacher','?class=Teacher',0),(4,'Student','?class=Student',0),(5,'About','?class=About',0),(6,'Ebook','Content/ebook',2),(8,'Announcement','Announcement',3),(10,'Module','Content/ebook',4),(11,'Jobsheet','Content/jobsheet',4),(12,'Quiz','Content/quiz',4),(14,'Apersepsi','Apersepsi',3),(15,'About Developer','cAbout',5),(18,'Contents','cContent',3),(21,'Videos','Content/video',2),(23,'Quiz','cQuiz',3),(25,'Grades','cGrades',3);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) NOT NULL DEFAULT 0,
  `quiz_txt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`quiz_id`),
  KEY `title_id` (`title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,5,'Pernyataan tentang server database di bawah ini yang tidak tepat adalah ....'),(2,5,'Yang bukan termasuk program server database adalah ....'),(3,5,'Jika sekolah adalah instansi yang akan dilakukan pendataan database, maka pernyataan yang tepat adalah ...'),(4,5,'Saat ini terdapat jenis database baru, yaitu ....'),(5,5,'Dalam mendefinisikan sebuah database terdapat kelompok perintah yang disebut ....'),(6,6,'Untuk menyimpan halaman web yang kita buat diperlukan sebuah server web. Jika kita menitipkan halaman web kita pada tempat lain, tempat tersebut bernama... '),(7,7,'Sebuah sekolah menggunakan media komputer untuk melaksanakan ujian akhir semester. Maka pernyataan yang paling tepat sebagai seorang admin jaringan adalah…'),(8,7,'Tujuan paling tepat menggunakan https pada server web adalah untuk..…'),(9,7,'Sebagai seorang admin jaringan anda dituntut untuk membangun sebuah server web. Maka yang urutan langkah harus anda lakukan adalah …'),(10,7,'Untuk dapat mengakses web server yang ada di internet maka seorang admin jaringan harus membuka port…'),(11,7,'Untuk mengakses protokol web maka penulisan yang paling tepat adalah….'),(12,7,'Kebutuhan sebuah server web diantaranya adalah software aplikasi server. Manakah aplikasi server di bawah ini yang tepat?');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_ans`
--

DROP TABLE IF EXISTS `quiz_ans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_ans` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `ans` int(1) NOT NULL,
  PRIMARY KEY (`ans_id`),
  KEY `quiz_id` (`quiz_id`),
  KEY `title_id` (`title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_ans`
--

LOCK TABLES `quiz_ans` WRITE;
/*!40000 ALTER TABLE `quiz_ans` DISABLE KEYS */;
INSERT INTO `quiz_ans` VALUES (1,5,1,3),(2,5,3,12),(3,5,2,6),(4,5,4,19),(5,5,5,24),(6,6,6,30),(7,7,7,34),(8,7,8,42),(9,7,9,43),(10,7,10,51),(11,7,11,55),(12,7,12,61);
/*!40000 ALTER TABLE `quiz_ans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_answer`
--

DROP TABLE IF EXISTS `quiz_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_answer` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `quiz_id` int(11) NOT NULL DEFAULT 0,
  `ans` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ans_id`),
  KEY `user_id` (`user_id`),
  KEY `opt_id` (`quiz_id`) USING BTREE,
  KEY `title_d` (`title_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_answer`
--

LOCK TABLES `quiz_answer` WRITE;
/*!40000 ALTER TABLE `quiz_answer` DISABLE KEYS */;
INSERT INTO `quiz_answer` VALUES (1,5,4,1,3),(3,5,4,3,12),(6,5,4,2,6),(7,5,1,1,3),(8,5,1,3,12),(9,5,1,2,6),(10,5,2,1,3),(11,5,2,3,12),(12,5,2,2,9);
/*!40000 ALTER TABLE `quiz_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_option`
--

DROP TABLE IF EXISTS `quiz_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_option` (
  `opt_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `opt_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`opt_id`),
  KEY `quiz_id` (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_option`
--

LOCK TABLES `quiz_option` WRITE;
/*!40000 ALTER TABLE `quiz_option` DISABLE KEYS */;
INSERT INTO `quiz_option` VALUES (1,1,'Bekerja secara client server'),(2,1,'Menunggu request dari client'),(3,1,'Membagikan data ke semua komputer'),(4,1,'Merespon permintaan client'),(6,2,'Apache'),(8,3,'Nama database adalah siswa, table teridiri dari induk, nama, alamat'),(9,2,'mySql'),(10,2,'Postgre'),(11,2,'Ms SQL server'),(12,3,'Nama database adalah sekolah, table teridiri dari siswa, guru, mapel'),(13,3,'Nama database adalah kelas, table teridiri dari siswa, guru, mapel'),(14,1,'Hanya mengirim data ke client yang request saja'),(15,2,'MariaDB'),(16,3,'Terdiri data tabel siswa, guru, dan mapel saja'),(17,3,'Terdiri dari kolom nomor induk, nama, kelas, nilai saja'),(18,4,'MariaDB'),(19,4,'noSQL'),(20,4,'.dbf'),(21,4,'mySql'),(22,4,'DBMS'),(23,5,'DBMS'),(24,5,'DDL'),(25,5,'SQL'),(26,5,'DML'),(27,5,'SSL'),(28,6,'Server web'),(29,6,'Server Database '),(30,6,'Server Hosting '),(31,6,'Streaming server '),(32,6,'Dedicated server'),(33,7,'Sekolah harus menyediakan komputer'),(34,7,'Sekolah membutuhkan server web dan server database'),(35,7,'Sekolah membutuhkan perusahaan komputer dan jaringan'),(36,7,' Peserta didik diwajibkan membawa hp'),(37,7,'Sekolah harus menyediakan hp'),(38,8,'Agar pengguna aman saat menggunakan layanan'),(39,8,'Agar server aman saat diakses'),(40,8,'Agar data tidak terbaca orang'),(41,8,'Agar web aman dari gangguan'),(42,8,'Untuk keamanan komunikasi data dalam jaringan'),(43,9,'Mengidentifikasi kebutuhan, menjadwalkan pelaksanaan, menguji hasil, mengevaluasi kinerja server'),(44,9,'Merencanakan proyek, memanggil ahli IT, memberikan perencanaan, menguji hasil'),(45,9,'Memanggil ahli IT, memberikan penawaran, menugaskan pekerjaan, menguji hasil'),(46,9,'Menjadwalkan pekerjaan, mengevaluasi, mengidentifikasi kebutuhan, membeli barang'),(47,9,'Semua jawaban salah'),(48,10,'88 dan 22'),(49,10,'80 dan 21'),(50,10,'443 dan 22'),(51,10,'443 dan 80'),(52,10,'433 dan 88'),(53,11,'http://nama_domain:443'),(54,11,'http://ip_address:443'),(55,11,'http://nama_domain'),(56,11,'www.ip_addess:80'),(57,11,'ftp://ip_address'),(58,12,'Ngix, linux, mozila firefox'),(59,12,'Apache, openwrt, opera'),(60,12,'Linux, windows, apple'),(61,12,'Ngix, apache, Microsoft IIS'),(62,12,'Apache, ngix, xampp');
/*!40000 ALTER TABLE `quiz_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_title`
--

DROP TABLE IF EXISTS `quiz_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_title` (
  `title_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT 'Title',
  `description` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`title_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_title`
--

LOCK TABLES `quiz_title` WRITE;
/*!40000 ALTER TABLE `quiz_title` DISABLE KEYS */;
INSERT INTO `quiz_title` VALUES (5,'Quiz Server Database','Post-test Server Database',''),(6,'Quiz Control Panel Hosting','Pre-test dan Post-test Control Panel Hosting',NULL),(7,'Quiz Server Web','Pre-test dan Post-test Server Web',NULL);
/*!40000 ALTER TABLE `quiz_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) NOT NULL DEFAULT '0',
  `password` longtext NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'user','user',0),(2,'admin','admin123',2),(4,'siswa','1siswa',0),(5,'root','toor',3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '0',
  `link` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (4,'Instalasi Debian Server Pada VirtualBox','https://youtube.com/embed/z2EHGaIVkCQ?si=w1fsg5d_yTgadCX-'),(5,'Panduan Cara Install Debian 10 di VirtualBox Lengkap untuk Pemula','0');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-07 23:15:32
