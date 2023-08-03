-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: webby.com.my    Database: webbygro_crm
-- ------------------------------------------------------
-- Server version	5.7.29

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_setting`
--

DROP TABLE IF EXISTS `tbl_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_slug` varchar(150) NOT NULL,
  `setting_value` varchar(150) NOT NULL,
  `setting_description` varchar(150) NOT NULL,
  `is_editable` int(1) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_setting`
--

LOCK TABLES `tbl_setting` WRITE;
/*!40000 ALTER TABLE `tbl_setting` DISABLE KEYS */;
INSERT INTO `tbl_setting` VALUES (4,'test','100','Setting',1);
/*!40000 ALTER TABLE `tbl_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_setting_country`
--

DROP TABLE IF EXISTS `tbl_setting_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_setting_country` (
  `setting_country_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_country_abb` varchar(45) NOT NULL DEFAULT '',
  `setting_country_name` varchar(45) NOT NULL DEFAULT '',
  `setting_country_dialcode` varchar(10) NOT NULL,
  PRIMARY KEY (`setting_country_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_setting_country`
--

LOCK TABLES `tbl_setting_country` WRITE;
/*!40000 ALTER TABLE `tbl_setting_country` DISABLE KEYS */;
INSERT INTO `tbl_setting_country` VALUES (1,'AF','Afghanistan','93'),(2,'AL','Albania','355'),(3,'DZ','Algeria','213'),(4,'AS','American Samoa','1684'),(5,'AD','Andorra','376'),(6,'AO','Angola','244'),(7,'AI','Anguilla','1264'),(8,'AQ','Antarctica','672'),(9,'AG','Antigua and Barbuda','1268'),(10,'AR','Argentina','54'),(11,'AM','Armenia','374'),(12,'AW','Aruba','297'),(13,'AU','Australia','61'),(14,'AT','Austria','43'),(15,'AZ','Azerbaijan','994'),(16,'BS','Bahamas','1242'),(17,'BH','Bahrain','973'),(18,'BD','Bangladesh','880'),(19,'BB','Barbados','1246'),(20,'BY','Belarus','375'),(21,'BE','Belgium','32'),(22,'BZ','Belize','501'),(23,'BJ','Benin','229'),(24,'BM','Bermuda','1441'),(25,'BT','Bhutan','975'),(26,'BO','Bolivia','591'),(27,'BA','Bosnia and Herzegovina','387'),(28,'BW','Botswana','267'),(29,'BV','Bouvet Island','55'),(30,'BR','Brazil','55'),(31,'IO','British Indian Ocean Territory','246'),(32,'BN','Brunei','673'),(33,'BG','Bulgaria','359'),(34,'BF','Burkina Faso','226'),(35,'BI','Burundi','257'),(36,'KH','Cambodia','855'),(37,'CM','Cameroon','237'),(38,'CA','Canada','1'),(39,'CV','Cape Verde','238'),(40,'KY','Cayman Islands','345'),(41,'CF','Central African Republic','236'),(42,'TD','Chad','235'),(43,'CL','Chile','56'),(44,'CN','China','86'),(45,'CX','Christmas Island','61'),(46,'CC','Cocos (Keeling) Islands','61'),(47,'CO','Colombia','57'),(48,'KM','Comoros','269'),(49,'CG','Congo','242'),(50,'CD','Congo (DRC)','243'),(51,'CK','Cook Islands','682'),(52,'CR','Costa Rica','506'),(53,'CI','Cote d\'Ivoire','225'),(54,'HR','Croatia','385'),(55,'CU','Cuba','53'),(56,'CY','Cyprus','537'),(57,'CZ','Czech Republic','420'),(58,'DK','Denmark','45'),(59,'DJ','Djibouti','253'),(60,'DM','Dominica','1767'),(61,'DO','Dominican Republic','1849'),(62,'EC','Ecuador','593'),(63,'EG','Egypt','20'),(64,'SV','El Salvador','503'),(65,'GQ','Equatorial Guinea','240'),(66,'ER','Eritrea','291'),(67,'EE','Estonia','372'),(68,'ET','Ethiopia','251'),(69,'FK','Falkland Islands (Islas Malvinas)','500'),(70,'FO','Faroe Islands','298'),(71,'FJ','Fiji Islands','679'),(72,'FI','Finland','358'),(73,'FR','France','33'),(74,'GF','French Guiana','594'),(75,'PF','French Polynesia','689'),(76,'TF','French Southern and Antarctic Lands','672'),(77,'GA','Gabon','241'),(78,'GM','Gambia, The','220'),(79,'GE','Georgia','995'),(80,'DE','Germany','49'),(81,'GH','Ghana','233'),(82,'GI','Gibraltar','350'),(83,'GR','Greece','30'),(84,'GL','Greenland','299'),(85,'GD','Grenada','1473'),(86,'GP','Guadeloupe','590'),(87,'GU','Guam','1671'),(88,'GT','Guatemala','502'),(89,'GG','Guernsey','44'),(90,'GN','Guinea','224'),(91,'GW','Guinea-Bissau','245'),(92,'GY','Guyana','595'),(93,'HT','Haiti','509'),(94,'HM','Heard Island and McDonald Islands','672'),(95,'HN','Honduras','504'),(96,'HK','Hong Kong','852'),(97,'HU','Hungary','36'),(98,'IS','Iceland','354'),(99,'IN','India','91'),(100,'ID','Indonesia','62'),(101,'IR','Iran','98'),(102,'IQ','Iraq','964'),(103,'IE','Ireland','353'),(104,'IM','Isle of Man','44'),(105,'IL','Israel','972'),(106,'IT','Italy','39'),(107,'JM','Jamaica','1876'),(108,'JP','Japan','81'),(109,'JE','Jersey','44'),(110,'JO','Jordan','962'),(111,'KZ','Kazakhstan','77'),(112,'KE','Kenya','254'),(113,'KI','Kiribati','686'),(114,'KR','Korea','82'),(115,'KW','Kuwait','965'),(116,'KG','Kyrgyzstan','996'),(117,'LA','Laos','856'),(118,'LV','Latvia','371'),(119,'LB','Lebanon','961'),(120,'LS','Lesotho','266'),(121,'LR','Liberia','231'),(122,'LY','Libya','218'),(123,'LI','Liechtenstein','423'),(124,'LT','Lithuania','370'),(125,'LU','Luxembourg','352'),(126,'MO','Macao SAR','853'),(127,'MK','Macedonia','389'),(128,'MG','Madagascar','261'),(129,'MW','Malawi','265'),(130,'MY','Malaysia','60'),(131,'MV','Maldives','960'),(132,'ML','Mali','223'),(133,'MT','Malta','356'),(134,'MH','Marshall Islands','692'),(135,'MQ','Martinique','596'),(136,'MR','Mauritania','222'),(137,'MU','Mauritius','230'),(138,'YT','Mayotte','262'),(139,'MX','Mexico','52'),(140,'FM','Micronesia','691'),(141,'MD','Moldova','373'),(142,'MC','Monaco','377'),(143,'MN','Mongolia','976'),(144,'ME','Montenegro','382'),(145,'MS','Montserrat','1664'),(146,'MA','Morocco','212'),(147,'MZ','Mozambique','258'),(148,'MM','Myanmar','95'),(149,'NA','Namibia','264'),(150,'NR','Nauru','674'),(151,'NP','Nepal','977'),(152,'NL','Netherlands','31'),(153,'AN','Netherlands Antilles','599'),(154,'NC','New Caledonia','687'),(155,'NZ','New Zealand','64'),(156,'NI','Nicaragua','505'),(157,'NE','Niger','227'),(158,'NG','Nigeria','234'),(159,'NU','Niue','683'),(160,'NF','Norfolk Island','672'),(161,'KP','North Korea','850'),(162,'MP','Northern Mariana Islands','1670'),(163,'NO','Norway','47'),(164,'OM','Oman','968'),(165,'PK','Pakistan','92'),(166,'PW','Palau','680'),(167,'PS','Palestinian Authority','970'),(168,'PA','Panama','507'),(169,'PG','Papua New Guinea','675'),(170,'PY','Paraguay','595'),(171,'PE','Peru','51'),(172,'PH','Philippines','63'),(173,'PN','Pitcairn Islands','872'),(174,'PL','Poland','48'),(175,'PT','Portugal','351'),(176,'PR','Puerto Rico','1939'),(177,'QA','Qatar','974'),(178,'RE','Reunion','262'),(179,'RO','Romania','40'),(180,'RU','Russia','7'),(181,'RW','Rwanda','250'),(182,'WS','Samoa','685'),(183,'SM','San Marino','378'),(184,'ST','Sao Tome','239'),(185,'SA','Saudi Arabia','966'),(186,'SN','Senegal','221'),(187,'RS','Serbia','381'),(188,'SC','Seychelles','248'),(189,'SL','Sierra Leone','232'),(190,'SG','Singapore','65'),(191,'SK','Slovakia','421'),(192,'SI','Slovenia','386'),(193,'SB','Solomon Islands','677'),(194,'SO','Somalia','252'),(195,'ZA','South Africa','27'),(196,'GS','South Georgia and the South Sandwich Islands','500'),(197,'ES','Spain','34'),(198,'LK','Sri Lanka','94'),(199,'SH','St. Helena','290'),(200,'KN','St. Kitts and Nevis','1869'),(201,'LC','St. Lucia','1758'),(202,'PM','St. Pierre and Miquelon','508'),(203,'VC','St. Vincent and the Grenadines','1784'),(204,'SD','Sudan','249'),(205,'SR','Suriname','597'),(206,'SJ','Svalbard and Jan Mayen','47'),(207,'SZ','Swaziland','268'),(208,'SE','Sweden','46'),(209,'CH','Switzerland','41'),(210,'SY','Syria','963'),(211,'TW','Taiwan','886'),(212,'TJ','Tajikistan','992'),(213,'TZ','Tanzania','255'),(214,'TH','Thailand','66'),(215,'TP','Timor-Leste (East Timor)','670'),(216,'TG','Togo','228'),(217,'TK','Tokelau','690'),(218,'TO','Tonga','676'),(219,'TT','Trinidad and Tobago','1868'),(220,'TN','Tunisia','216'),(221,'TR','Turkey','90'),(222,'TM','Turkmenistan','993'),(223,'TC','Turks and Caicos Islands','1649'),(224,'TV','Tuvalu','688'),(225,'UG','Uganda','256'),(226,'UA','Ukraine','380'),(227,'AE','United Arab Emirates','971'),(228,'UK','United Kingdom','44'),(229,'US','United States','1'),(230,'UM','United States Minor Outlying Islands','246'),(231,'UY','Uruguay','598'),(232,'UZ','Uzbekistan','998'),(233,'VU','Vanuatu','678'),(234,'VA','Vatican City','379'),(235,'VE','Venezuela','58'),(236,'VN','Vietnam','84'),(237,'VG','Virgin Islands, British','1284'),(238,'VI','Virgin Islands, U.S.','1340'),(239,'WF','Wallis and Futuna','681'),(240,'YE','Yemen','967'),(241,'ZM','Zambia','260'),(242,'ZW','Zimbabwe','263');
/*!40000 ALTER TABLE `tbl_setting_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_profile_photo` varchar(100) NOT NULL,
  `user_nric` varchar(100) NOT NULL,
  `user_nationality` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_address2` varchar(100) NOT NULL,
  `user_city` varchar(45) NOT NULL,
  `user_state` varchar(45) NOT NULL,
  `user_postcode` varchar(45) NOT NULL,
  `user_dob` date NOT NULL,
  `user_status` enum('active','pending','suspend') NOT NULL DEFAULT 'active',
  `user_logindate` datetime NOT NULL,
  `user_cdate` datetime NOT NULL,
  `user_udate` datetime NOT NULL,
  `user_ip` varchar(15) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `user_mobile` varchar(45) NOT NULL,
  `user_join_date` date NOT NULL,
  `user_remember_token` varchar(191) DEFAULT NULL,
  `user_admin_skin` tinyint(1) NOT NULL DEFAULT '0',
  `user_platform_id` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` datetime DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'george@webby.com.my','$2y$10$MwtGRBMh1aYP0aBwEZmiN.jhup.ADoeovNQ47d81RRK.OFA4pPHHC','George','','-','Malaysia','Male','2-3, Jalan Merbah 1, 12','Bandar Puchong Jaya','Puchong','Selangor','47100','2020-04-30','active','0000-00-00 00:00:00','0000-00-00 00:00:00','2020-04-23 06:27:40','',0,'0128899870','0000-00-00','iIA5KRMQJodSx25gJeMU0c9yfVEbDZ4rNfvaBOOk7QqwwWLpyc9Jg3yjeAYB',0,0,NULL,1);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_log`
--

DROP TABLE IF EXISTS `tbl_user_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_log` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_log_cdate` datetime NOT NULL,
  `user_log_ip` varchar(15) NOT NULL,
  `user_log_action` varchar(45) NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_log`
--

LOCK TABLES `tbl_user_log` WRITE;
/*!40000 ALTER TABLE `tbl_user_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_model_has_permission`
--

DROP TABLE IF EXISTS `tbl_user_model_has_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_model_has_permission` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_model_has_permission`
--

LOCK TABLES `tbl_user_model_has_permission` WRITE;
/*!40000 ALTER TABLE `tbl_user_model_has_permission` DISABLE KEYS */;
INSERT INTO `tbl_user_model_has_permission` VALUES (1,'App\\Model\\User',2);
/*!40000 ALTER TABLE `tbl_user_model_has_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_model_has_role`
--

DROP TABLE IF EXISTS `tbl_user_model_has_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_model_has_role` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_model_has_role`
--

LOCK TABLES `tbl_user_model_has_role` WRITE;
/*!40000 ALTER TABLE `tbl_user_model_has_role` DISABLE KEYS */;
INSERT INTO `tbl_user_model_has_role` VALUES (1,'App\\Model\\User',1);
/*!40000 ALTER TABLE `tbl_user_model_has_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_password_reset`
--

DROP TABLE IF EXISTS `tbl_user_password_reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_password_reset` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `tbl_user_password_reset_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_password_reset`
--

LOCK TABLES `tbl_user_password_reset` WRITE;
/*!40000 ALTER TABLE `tbl_user_password_reset` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_password_reset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_permission`
--

DROP TABLE IF EXISTS `tbl_user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_permission` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_permission`
--

LOCK TABLES `tbl_user_permission` WRITE;
/*!40000 ALTER TABLE `tbl_user_permission` DISABLE KEYS */;
INSERT INTO `tbl_user_permission` VALUES (1,'user_listing','web',NULL,NULL,'USER','User Listing'),(2,'user_manage','web',NULL,NULL,'USER','User Manage'),(3,'user_role_listing','web',NULL,NULL,'USER ROLE','User Role Listing'),(4,'user_role_manage','web',NULL,NULL,'USER ROLE','User Role Manage'),(5,'master_setting','web',NULL,NULL,'SETTING','Master Setting');
/*!40000 ALTER TABLE `tbl_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_platform`
--

DROP TABLE IF EXISTS `tbl_user_platform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_platform` (
  `user_platform_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_platform_name` varchar(45) NOT NULL,
  PRIMARY KEY (`user_platform_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_platform`
--

LOCK TABLES `tbl_user_platform` WRITE;
/*!40000 ALTER TABLE `tbl_user_platform` DISABLE KEYS */;
INSERT INTO `tbl_user_platform` VALUES (1,'Admin Panel');
/*!40000 ALTER TABLE `tbl_user_platform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_role`
--

DROP TABLE IF EXISTS `tbl_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_role`
--

LOCK TABLES `tbl_user_role` WRITE;
/*!40000 ALTER TABLE `tbl_user_role` DISABLE KEYS */;
INSERT INTO `tbl_user_role` VALUES (1,'Administrator','web','2020-04-22 08:35:53','2020-04-22 09:09:01'),(8,'Manager','web','2020-04-22 17:41:22','2020-04-22 17:41:22');
/*!40000 ALTER TABLE `tbl_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_role_has_permission`
--

DROP TABLE IF EXISTS `tbl_user_role_has_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_role_has_permission` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `tbl_role_has_permission_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_role_has_permission`
--

LOCK TABLES `tbl_user_role_has_permission` WRITE;
/*!40000 ALTER TABLE `tbl_user_role_has_permission` DISABLE KEYS */;
INSERT INTO `tbl_user_role_has_permission` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(5,8);
/*!40000 ALTER TABLE `tbl_user_role_has_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_type`
--

DROP TABLE IF EXISTS `tbl_user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(45) NOT NULL,
  `user_type_cdate` datetime NOT NULL,
  `user_type_udate` datetime NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_type`
--

LOCK TABLES `tbl_user_type` WRITE;
/*!40000 ALTER TABLE `tbl_user_type` DISABLE KEYS */;
INSERT INTO `tbl_user_type` VALUES (1,'Administrator','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-23 14:49:32
