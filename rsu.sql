-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: rsu
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.20.04.1

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
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `abouts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
INSERT INTO `abouts` VALUES (1,'Welcome to Tilganga Institute of Ophthalmology, Refractive Surgery Unit','welcome-to-tilganga-institute-of-ophthalmology-refractive-surgery-unit','active','<p>One of the major breakthroughs in the history of refractive surgery in Nepal occurred in 2003 when the Nepal Eye Program, Tilganga Institute of Ophthalmology (TIO) Refractive Surgery services was started. TIO has played a vital role in the development and advancement of eye care services, including refractive surgery, in Nepal. It has contributed to train Nepali ophthalmologists in the latest surgical techniques and has been instrumental in conducting research and spreading awareness about refractive surgery within the country.</p>\r\n\r\n<p>Tilganga Institute of Ophthalmology has introduced refractive surgery (PRK) in 2003, Dr Reeta Gurung, was Nepal&rsquo;s first refractive surgeon, she had operated more than 500 Laser eye surgery to make people see the world without heavy spectacles and contact lenses, later on TIO trained other ophthalmologists.</p>\r\n\r\n<p>Over the years, several types of refractive surgeries have been introduced and practiced in Worldwide and Nepal. Laser-assisted in situ keratomileusis (LASIK) and ReLex Smile has been one of the most commonly performed procedures. In LASIK, a thin flap is created on the cornea, and the underlying tissue is reshaped using an excimer laser to correct the refractive error. Other procedures like photorefractive keratectomy (PRK), ICL, also have also gained popularity.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With advancements in technology and surgical techniques, refractive surgery in Nepal has become safer, more accurate, and accessible to a wider population, TIO had upgraded the technology in 2012 with Visumax 500 and MEL 80, more than 12000 were successfully performed. The increasing number of trained refractive surgeon and the availability of advanced equipment have contributed to the growth of refractive surgery services across the country.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In the June 2023 TIO has introduced Zeiss Visumax 800 which is most advanced and recent refractive surgery technique, for the first time in Nepal and started performing ReLEx SMILE Pro surgery in Nepal. ReLEx SMILE PRO&reg; is the world&rsquo;s first robotic laser vision correction system. ReLEx&reg; SMILE Pro offers various advantages such as a very fast action time of up to 8 seconds per eye (Extra Fast). Higher security (Safer) with a combination of robotic arm technology and AI systems for integration of pre-operation support data to minimize risk. At the same time, giving convenience to the patient.</p>','Dr Bandana Refractive Surgeon.jpg','2023-08-01 11:09:22','2023-08-30 15:46:19');
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (4,'Krishna Gopal Shrestha','krishna.shrestha@tilganga.org','9851065535','08:05','2023-09-07','ok','2023-08-30 16:01:11','2023-08-30 16:01:11');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'LASIK/SMILE LASER REFRACTIVE SURGERIES FAQ','lasiksmile-laser-refractive-surgeries-faq','<p>WHAT ARE DIFFERENT REFRACTIVE SURGERIES PERFORMED AT TILGANGA INSTITUTE OF OPHTHALMOLOGY (TIO)?<br />\r\nCurrently TIO refractive surgery unit (RSU) is performing<br />\r\n&bull; Femto LASIK (Laser assisted in situ Keratomelasia) and<br />\r\n&bull; SMILE (Small Incision Lenticular Extraction)</p>\r\n\r\n<p>WHAT IS THE COST OF THE LASIK/SMILE SURGERY IN NEPAL?<br />\r\nThe current cost of the surgery is 80,000 per person. Above this you will be charged NRS 110 as registration fee and Rs 3500 for Initial screening (consultation charges with surgeon, optometrist and all test done within the department). If you need cross consultation you will be charge as per the TIO price list.</p>\r\n\r\n<p><strong>HOW LONG DOES IT TAKE TO COMPLETE THE LASER EYE SURGERY PROCEDURE?</strong><br />\r\nBefore the procedure is done in your eyes, you need go through a detail eye examination. Generally, if all is well you will complete these pre-tests in 2 appointments. The first appoint will be with the optometrist and the second one will be with the surgeon. These appoints are done on separate days. If you are found fit for the surgery in the pre-test, third appointment will be the surgery. We generally operate 3 days in a week. For now, it&rsquo;s (Sunday, Tuesday and Thursday). So, from the first appointment date you can complete all the procedure in 3-6 days, depending upon the slots of appointment available.</p>\r\n\r\n<p><strong>WHAT IS AGE LIMIT OF THE PROCEDURE TO BE CARRIED OUT?</strong><br />\r\nThese procedures (Surgery) can be carried out once an individual is above 18 years of age. There is no upper limit of the age<br />\r\nas long as the eye health is suitable.</p>\r\n\r\n<p><strong>HOW LONG SHOULD WE FOLLOW-UP AFTER THE SURGERY?</strong><br />\r\nFollow-up examination is the regular eye examination procedure which is carried throughout the life. This can be done with<br />\r\nyour local optometrist or ophthalmologist. But after surgery 1 week follow up with the clinic is compulsory (if we feel it&rsquo;s necessary, we always extend this time period)</p>\r\n\r\n<p><strong>WHAT IS THE POWER RANGE THAT CAN OPERATED AT TIO?</strong><br />\r\nCurrently we are operating Myopia from -0.50 to -14.00 Diopters, Hyperopia from +0.50 to +8.00 Dipters, Astigmatism from 0.25D till 6.00D., We also have the procedure for presbyopia. (There are other procedures where we can go beyond this range, this is explained during the consultation with the optometrist and the surgeon both. So people who have prescription out of these range can also book their appointment for other options)</p>\r\n\r\n<p><strong>HOW CAN I BOOK AN APPOINTMENT FOR REFRACTIVE SURGERY AT TILGANGA INSTITUTE OF OPHTHALMOLOGY?</strong><br />\r\nYou can call at the +977-1-4484574&nbsp; to book your appointment for initial screening. If you want to book you appointment through email you can always write to&nbsp;rsuappointment@tilganga.org&nbsp;</p>','.','.','.','Tilganga Refractive Surgery Unit (4).jpg','2023-08-04 10:48:42','2023-08-04 10:48:42'),(2,'Testimonials From Nepal National Level Basketball Player','testimonials-from-nepal-national-level-basketball-player','<p>National level basketball player Bikram Baniya shares his experience after undergoing refractive surgery (laser surgery to remove spectacles).</p>\r\n\r\n<p>National level basketball player Bikram Baniya shares his experience after undergoing refractive surgery (laser surgery to remove spectacles).National level basketball player Bikram Baniya shares his experience after undergoing refractive surgery (laser surgery to remove spectacles).</p>','.','.','.','maxresdefault (3).jpg','2023-08-04 10:49:14','2023-08-04 10:49:14');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (3,'Barsha','Mahat','info@attractivetravelnepal.com','9851048567','hidbxjhb','2023-08-30 16:08:58','2023-08-30 16:08:58');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counters`
--

DROP TABLE IF EXISTS `counters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counters`
--

LOCK TABLES `counters` WRITE;
/*!40000 ALTER TABLE `counters` DISABLE KEYS */;
INSERT INTO `counters` VALUES (1,'scanned.png',20937,'Refractive Patient Screened','2023-08-03 12:20:58','2023-08-30 13:29:07'),(2,'doctor.png',5,'Refractive Surgeons Trained','2023-08-03 12:21:21','2023-08-30 13:28:40'),(3,'winner.png',12,'Refractive Surgery Research','2023-08-03 12:21:37','2023-08-30 13:29:44'),(4,'laser eye.jpg',12350,'LASER Eye Surgery Performed','2023-08-03 12:22:00','2023-08-30 13:30:51');
/*!40000 ALTER TABLE `counters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_rows` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'What are different refractive surgeries performed at Tilganga Institute of Ophthalmology?','Currently TIO refractive surgery unit (RSU) is performing\r\n1. Femto LASIK (Laser assisted in situ Keratomelasia)\r\n2. SMILE Pro (Small Incision Lenticular Extraction)\r\n3. SMILE +\r\n4. LASIK +\r\n5. Trasn-PRK\r\n6. Topo-guided LASIK\r\n7. Wavefront-guided LASIK\r\n8. ICL','2023-08-30 12:26:29','2023-08-30 15:26:22'),(2,'What is the cost of LASIK/SMILE Laser eye surgery?','The current cost of the surgery in Tilganga Institute of Ophthalmology, Kathmandu, Nepal is 80,000 per person. Above this you will be charged NRS 110 as registration fee and Rs 3500 for Initial screening (consultation charges with surgeon, optometrist and all tests done within the department). If you need cross consultation, you will be charge as per the TIO price list.','2023-08-30 15:27:36','2023-08-30 15:27:36'),(3,'HOW LONG DOES IT TAKE TO COMPLETE THE LASER EYE SURGERY PROCEDURE?','Before the procedure is done in your eyes, you need go through a detail eye examination. Generally, if all is well you will complete these pre-tests in 2 appointments. The first appoint will be with the optometrist and the second one will be with the surgeon. These appoints are done on separate days. If you are found fit for the surgery in the pre-test, third appointment will be the surgery. We generally operate 3 days in a week. For now, it’s (Sunday, Tuesday and Thursday). So, from the first appointment date you can complete all the procedure in 3-6 days, depending upon the slots of appointment available.','2023-08-30 15:28:16','2023-08-30 15:28:16'),(4,'WHAT IS AGE LIMIT OF THE PROCEDURE TO BE CARRIED OUT?','These procedures (Surgery) can be carried out once an individual is above 18 years of age. There is no upper limit of the age\r\nas long as the eye health is suitable.','2023-08-30 15:28:38','2023-08-30 15:28:38'),(5,'HOW LONG SHOULD WE FOLLOW-UP AFTER THE SURGERY?','Follow-up examination is the regular eye examination procedure which is carried throughout the life. This can be done with\r\nyour local optometrist or ophthalmologist. But after surgery 1 week follow up with the clinic is compulsory (if we feel it’s necessary, we always extend this time period)','2023-08-30 15:29:30','2023-08-30 15:29:30'),(6,'WHAT IS THE POWER RANGE THAT CAN OPERATED AT TIO?','Currently we are operating Myopia from -0.50 to -14.00 Diopters, Hyperopia from +0.50 to +8.00 Dipters, Astigmatism from 0.25D till 6.00D., We also have the procedure for presbyopia. (There are other procedures where we can go beyond this range, this is explained during the consultation with the optometrist and the surgeon both. So people who have prescription out of these range can also book their appointment for other options)','2023-08-30 15:29:54','2023-08-30 15:29:54'),(7,'HOW CAN I BOOK AN APPOINTMENT FOR REFRACTIVE SURGERY AT TILGANGA INSTITUTE OF OPHTHALMOLOGY?','You can book vis this website or call at the +977-1-4484574  to book your appointment for initial screening. If you want to book you appointment through email you can always write to rsuappointment@tilganga.org ','2023-08-30 15:30:28','2023-08-30 15:30:28'),(8,'Which one is best Contoura Vision or SMILE?','The choice between Contoura Vision and SMILE depends on factors such as your refractive error, corneal thickness, and the specific characteristics of your eyes. It\'s essential to consult with a refractive surgeon who can conduct a thorough evaluation of your eyes and provide a personalized recommendation based on your unique needs and goals.','2023-08-30 15:32:21','2023-08-30 15:32:21');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images_name` json NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_albums`
--

DROP TABLE IF EXISTS `gallery_albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_albums` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_albums`
--

LOCK TABLES `gallery_albums` WRITE;
/*!40000 ALTER TABLE `gallery_albums` DISABLE KEYS */;
INSERT INTO `gallery_albums` VALUES (1,'Introducing SMILE Pro Laser Eye Surgery in Nepal','introducing-smile-pro-laser-eye-surgery-in-nepal',1,'202308281322_Dr Bandana Refractive Surgeon.jpg','2023-08-28 13:06:22','2023-08-28 13:06:22');
/*!40000 ALTER TABLE `gallery_albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES (1,'202308281322_Refractive surgery team.jpg','introducing-smile-pro-laser-eye-surgery-in-nepal','2023-08-28 13:06:22','2023-08-28 13:06:22'),(2,'202308281322_Refractive Surgery.jpg','introducing-smile-pro-laser-eye-surgery-in-nepal','2023-08-28 13:06:22','2023-08-28 13:06:22');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_tags`
--

DROP TABLE IF EXISTS `meta_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meta_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_tags`
--

LOCK TABLES `meta_tags` WRITE;
/*!40000 ALTER TABLE `meta_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `meta_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_voyager_user_fields',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_05_19_173453_create_menu_table',1),(6,'2016_10_21_190000_create_roles_table',1),(7,'2016_10_21_190000_create_settings_table',1),(8,'2016_11_30_135954_create_permission_table',1),(9,'2016_11_30_141208_create_permission_role_table',1),(10,'2016_12_26_201236_data_types__add__server_side',1),(11,'2017_01_13_000000_add_route_to_menu_items_table',1),(12,'2017_01_14_005015_create_translations_table',1),(13,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(14,'2017_03_06_000000_add_controller_to_data_types_table',1),(15,'2017_04_21_000000_add_order_to_data_rows_table',1),(16,'2017_07_05_210000_add_policyname_to_data_types_table',1),(17,'2017_08_05_000000_add_group_to_settings_table',1),(18,'2017_11_26_013050_add_user_role_relationship',1),(19,'2017_11_26_015000_create_user_roles_table',1),(20,'2018_03_11_000000_add_user_settings',1),(21,'2018_03_14_000000_add_details_to_data_types_table',1),(22,'2018_03_16_000000_make_settings_value_nullable',1),(23,'2019_08_19_000000_create_failed_jobs_table',1),(24,'2019_12_14_000001_create_personal_access_tokens_table',1),(25,'2022_11_02_073100_create_sliders_table',1),(28,'2022_11_04_090651_create_galleries_table',1),(29,'2022_11_08_073711_create_contacts_table',1),(30,'2022_12_17_041123_create_testimonials_table',1),(31,'2022_12_18_034211_create_teams_table',1),(32,'2023_01_18_053422_create_gallery_albums_table',1),(33,'2023_01_18_053640_create_gallery_images_table',1),(34,'2023_02_08_081410_create_meta_tags_table',1),(35,'2023_05_09_105856_create_counters_table',1),(36,'2023_05_09_170041_create_abouts_table',1),(37,'2023_05_11_110553_create_appointments_table',1),(38,'2023_05_11_121719_create_profiles_table',1),(39,'2023_05_16_135439_create_posts_table',1),(40,'2022_11_03_083019_create_services_table',2),(41,'2022_11_03_083235_create_blogs_table',3),(42,'2023_08_02_123218_create_profiles_table',4),(43,'2022_11_27_054039_create_faqs_table',5),(44,'2023_08_28_145532_add_linkdin_to_teams_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebookLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitterLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkdinlink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'Tilganga Logo.png','rsuappointment@tilganga.org','Gaushala, Bagmati Bridge','+977-1-4484574','https://www.facebook.com/tilgangainstituteofophthalmology','https://twitter.com/tilgangao?lang=en','https://rsu.tilganga.org/','2023-08-04 11:38:19','2023-08-28 13:15:21');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'LASIK EYE SURGERY','lasik-eye-surgery','<p>LASIK (laser in situ keratomileusis) is a form of outpatient corneal surgery in which a surgeon uses a specialised and precise flap- making instrument, to create a thin flap of corneal tissue. This flap is raised and laid back while still attached to the cornea. The surgeon then uses a state-of-the-art excimer laser to remove a pre- determined amount of corneal tissue from the exposed bed of the cornea. The amount of tissue to be removed is calculated based on the pre-operative determination of the power of your eye; these measurements are usually in agreement with recent prescriptions for your glasses and/or contact lenses. The flap is replaced and within minutes natural forces hold the flap down on the cornea. Usually, within a few hours, the surface epithelium of the cornea begins to grow over the cut edge of the flap to seal it into position. LASIK can be used to correct short-sightedness (myopia), long- sightedness (hyperopia), and astigmatism.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>PRK</p>\r\n\r\n<p>PRK (photorefractive keratectomy) is a form of outpatient corneal surgery in which a surgeon gently removes the surface covering layer of the cornea called the epithelium, and then reshapes the corneal bed with the laser in the same way as LASIK. This technique is usually used for people whose cornea may be too thin to allow for the creation of the corneal flap required for LASIK. The procedure is used to correct shortsightedness (myopia). Long-sightedness (hyperopia) and astigmatism.</p>\r\n\r\n<p>LASEK</p>\r\n\r\n<p>Like LASIK and PRK treatments, LASEK (Laser Epithelial Keratomileusis) is a clinically proven outpatient procedure for the treatment of a full range of sight problems, including myopia (short-sightedness), hyperopia (long-sightedness), presbyopia and astigmatism. LASEK combines the advantages of both LASIK and PRK, making it a viable alternative to those not suitable for LASIK.</p>','.','.','.','Tilganga Refractive Surgery Unit (4).jpg','2023-08-04 10:49:59','2023-08-04 10:49:59'),(2,'SMILE PRO','smile-pro','<p>In Femtorefractive LASIK (ReLEXT&quot;&quot;), the surgeon uses a specialised femtosecond laser to create a pocket of tissue within the cornea and delineate a lens of corneal tissue, which is then removed either through a tunnel or by lifting a flap of overlying corneal tissue. The tissue removed creates a shape change within the cornea and this leads to focusing of the vision. Within a few hours, the surface layer (epithelium) begins to grow over the edge to seal the tunnel or flap edge.</p>','.','.','.','relex smile surgery.jpg','2023-08-04 10:50:28','2023-08-30 14:53:13'),(3,'SMILE +','smile','<p>Increasing the corneal collagen cross-linking after SMILE surgery strengthens the weakened corneal tissue and minimizes side effects, such as keratoconus and vision regression. More than one hundred thousand procedures have been performed in 55 countries in Europe and North America.</p>','.','.','.','Smile +.png','2023-08-30 15:02:10','2023-08-30 15:02:10'),(4,'LASIK +','lasik','<p>Increasing the corneal collagen cross-linking after LASIK strengthens the weakened corneal tissue and minimizes side effects, such as keratoconus and vision regression. More than one hundred thousand procedures have been performed in 55 countries in Europe and North America.</p>','.','.','.','zeiss-visumax-800-motiv1.webp','2023-08-30 15:04:16','2023-08-30 15:04:16'),(5,'Trans-PRK','trans-prk','<p>Trans-PRK, short for Trans-Epithelial Photorefractive Keratectomy, is a revolutionary laser eye surgery designed to correct common vision issues like myopia (nearsightedness), hyperopia (farsightedness), and astigmatism. This procedure is a variant of the well-known PRK (Photorefractive Keratectomy) surgery, which has been used for decades to reshape the cornea and improve vision.</p>','.','.','.','PRK.jpg','2023-08-30 15:07:05','2023-08-30 15:07:05'),(6,'Topo-guided LASIK','topo-guided-lasik','<p>Topo-guided LASIK (Topography-guided Laser-Assisted In Situ Keratomileusis) is an advanced refractive eye surgery that combines the benefits of LASIK with topography-guided technology to provide highly customized vision correction</p>','.','.','.','topoguided lasik.jpg','2023-08-30 15:09:39','2023-08-30 15:09:39'),(7,'Wavefront-guided LASIK','wavefront-guided-lasik','<p>&nbsp;</p>\r\n\r\n<p>Wavefront-guided LASIK (WFG LASIK) is an advanced vision correction procedure that uses wavefront technology to provide highly customized and precise vision correction. It is designed to not only address common refractive errors like myopia, hyperopia, and astigmatism but also correct higher-order aberrations, which are subtle imperfections in the eye&#39;s optical system</p>','.','.','.','wavefront-guided-lasik.jpg','2023-08-30 15:11:32','2023-08-30 15:11:32'),(8,'ICL','icl','<p>ICL surgery is a type of eye surgery that implants an artificial lens in the eye to correct vision problems</p>','.','.','.','ICL.jpg','2023-08-30 15:13:24','2023-08-30 15:13:24'),(9,'C3R / CXL Eye Surgery','c3r-cxl-eye-surgery','<p>Corneal Collagen Cross-Linking with Riboflavin (also abbreviated as&nbsp;<em>C3R</em>) is a non-invasive corneal treatment shown to slow the progression of keratoconus.</p>','.','.','.','c3r.jpg','2023-08-30 15:15:30','2023-08-30 15:15:30');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'Introducing SMILE Pro Laser Eye Surgery','First time in Nepal with Zeiss Visumax 800, Made in Germany.','Refractive Surgery.jpg','2023-08-01 11:07:23','2023-08-28 13:15:49'),(2,'Introducing SMILE Pro Laser Eye Surgery','First time in Nepal with Zeiss Visumax 800, Made in Germany.','371071019_698089869002657_4454505114501753341_n.jpg','2023-08-01 12:59:03','2023-08-28 13:16:25');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `linkdin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Dr. Bandana Khanal','dr-bandana-khanal','MD, Ophthalmology, Cornea Specialist and Refractive Surgeon','Refractive Surgery Unit','Dr Bandana Khanal.png','active','2023-08-01 11:17:30','2023-08-30 13:10:44',NULL,0),(2,'Dr. Kaushal Pokhrel','dr-kaushal-pokhrel','MD Ophthalmology, Refractive Surgeon','Dr. Pokhrel completed his MBBS from Tribhuvan University and then did his MD in Ophthalmology from Tilganga Institute of Ophthalmology under the full scholarship of Ministry of Health and Population, Nepal. He then served for 2 years under the ministry before joining ASG eye hospital in Kathmandu. He is currently doing fellowship in refractive surgery at Tilganga.\r\n\r\n\r\nDr. Pokhrel is active in research and publications with many articles published in national and international journals, and has presented in many national and international conferences. He is a part of international RAAB survey. He is also active in many professional societies. He is the founding president of Young Ophthalmologist Society, immediate past joint-secretary of Nepal Ophthalmic Society, member of research wing of ISMSICS-Nepal Chapter (international society for manual small incision cataract surgery).','Dr. Kaushal Pokhrel, Refractive Surgeon Tilganga.png','active','2023-08-01 11:18:34','2023-08-30 15:22:13',NULL,0),(3,'Purushottam Dhungana','purushottam-dhungana','B. Optom, OD, FLVC, M. Optom, Consultant Optometrist','Purushottam Dhungana has more than 20 years of experience as an eye care provider, health educator, and consultant in eyewear. He has a special interest in Lasik Investigation, contact lenses and ophthalmic dispensing.\r\nHe is one of the most experienced optometrists practicing in Nepal. \r\n\r\nBachelor of Optometry (B. Optom):\r\nHis Optometry carrier started at BP koirala Lions Centre for Ophthalmic Studies(BPKLCOS).Tribhucan University Teaching Hospital (TUTH), Maharajgunj Campus, Tribhuvan University (TU). At this institution he was awarded with the degree of Bachelor of Optometry.\r\n\r\nDoctor of Optometry (OD)\r\nThis degree was awarded by School of Optometry, South western University (SWU), Cebu City, Phillipines\r\n\r\nFellowship In Low Vision Care (FLVC):\r\nDr. Dhungana has done Fellowship in Low Vision Care from LV Prasad Eye Institute, Hyderabad india.\r\n\r\nMaster\'s in clinical optometry (M Optom):\r\nMaster\'s in clinical optometry was awarded at Bhatati Vidyapeeth Deemed University, Pune, Maharashtra, India.','Purushottam Dhungana, OD.png','active','2023-08-01 11:19:23','2023-08-30 15:22:30',NULL,0),(4,'Rajeshwori Ngakhushi','rajeshwori-ngakhushi','Optometrist','Mrs Rajeshwori Ngakhushi: clinical optometrist of Refractive Surgery Unit.','Rajeshwori Ngakhushi.png','active','2023-08-30 13:21:19','2023-08-30 13:21:19',NULL,0),(5,'Gopal Krishna Karmacharya','gopal-krishna-karmacharya','Sr. Ophthalmic Supervisor','Gopal Krishna Karmacharya is Sr. Ophthalmic Supervisor of Refractive surgery unit.','Gopal Karmacharya.png','active','2023-08-30 14:31:09','2023-08-30 14:31:09',NULL,1),(6,'Abhishek Shrestha','abhishek-shrestha','Ophthalmic Officer','Refractive Surgery Unit','Abhishesk Shrestha.png','active','2023-08-30 14:38:44','2023-08-30 14:38:44',NULL,2),(7,'Shraeela Shrestha','shraeela-shrestha','Ophthalmic Officer','Refractive Surgery Unit','Shraeela Shrestha.png','active','2023-08-30 14:44:16','2023-08-30 14:44:16',NULL,3),(8,'Nirjana Dhoju','nirjana-dhoju','Ophthalmic Officer','Refractive Surgery Unit','Nirjana Dhoju.png','active','2023-08-30 14:45:25','2023-08-30 14:45:25',NULL,4),(9,'Laxmi Shrestha','laxmi-shrestha','Senior Ophthalmic Assistant','Refractive Surgery Unit','Laxmi Shrestha.png','active','2023-08-30 14:46:47','2023-08-30 14:46:47',NULL,5);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Shova Acharya','SMILE SURGERY PATIENT','I had smile surgery about 20 days ago at Tilganga Eye Hospital. I spent around Nrs. 85000 (current USD-670 ). I\'m over the moon and thrilled to be free of the glasses which  I worn for 14 years. Additionally, I am happy with the service I got from the entire staff from Refractive surgery team. Doctors are indeed very approachable, provides simple answers to any questions about surgery, and fully explains each phase of the surgery before, during, and post.\r\nI strongly hope that other hospitals and their employees will model this team’s approachable and welcoming behaviour towards patient.\r\nI wholeheartedly advise anyone national or foreign people  who wants to have smile surgery to go to the Tilganga Eye Hospital ,Refractive team.\r\nThanks to the whole team again . I appreciate all of your support and fully satisfied with the service provided.','R.png','active','2023-08-01 11:22:40','2023-08-01 11:22:40'),(2,'Pragati Dutta','Assam, India','I had been living with severe myopia for as long as I can remember, with a prescription of -14. It was a life-altering moment when I decided to undergo refractive surgery at Tilganga Institute of Ophthalmology. The entire team displayed a level of professionalism and competence that immediately put me at ease. Today, I am ecstatic to share that my vision is now a perfect 0, and I owe it all to the talented surgeons and staff at Tilganga. Thank you for giving me the gift of clear sight','-1-Facebook.png','active','2023-08-30 15:59:59','2023-08-30 15:59:59');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Isha Niraula','Isha.niraula57@gmail.com','users/default.png',NULL,'$2y$10$bGoCF6YwE.QlbPRQw8Hb/.09BSeQ7VoDLv7VdaYEfFjneNLe5dbHq',NULL,NULL,'2023-07-31 15:05:11','2023-07-31 15:05:11'),(2,NULL,'rsu','rsu@tilganga.org','users/default.png',NULL,'$2y$10$gqfsvzCdMWV6wRRGU36AN.zoFDRItIP6ydx8EqA6xCvDRWdTW6wSO',NULL,NULL,'2023-08-20 15:20:46','2023-08-20 15:20:46');
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

-- Dump completed on 2023-09-02 15:57:40
