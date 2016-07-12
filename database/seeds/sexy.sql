-- MySQL dump 10.13  Distrib 5.6.29, for Linux (x86_64)
--
-- Host: localhost    Database: sexy
-- ------------------------------------------------------
-- Server version	5.6.29

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
-- Table structure for table `me_channel`
--

DROP TABLE IF EXISTS `me_channel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(255) NOT NULL,
  `create_user` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_channel`
--

LOCK TABLES `me_channel` WRITE;
/*!40000 ALTER TABLE `me_channel` DISABLE KEYS */;
INSERT INTO `me_channel` VALUES (41,'图片1',6,'2016-03-20 13:30:30','2016-03-27 18:42:00',0),(42,'视频123',6,'2016-03-20 13:30:30','2016-03-27 18:43:35',1),(43,'1231111',6,'2016-03-27 18:38:58','2016-03-27 18:45:28',1),(44,'11111',6,'2016-03-27 18:40:30','2016-03-27 18:41:20',0),(45,'123123',6,'2016-03-27 18:42:17','2016-03-27 18:42:17',1),(46,'123',6,'2016-03-27 18:42:22','2016-03-27 19:27:10',0),(47,'www123123',6,'2016-03-27 18:42:30','2016-03-27 19:27:05',0),(48,'123',6,'2016-03-27 18:42:50','2016-03-27 18:42:50',1),(49,'123123',6,'2016-03-27 18:42:55','2016-03-27 18:42:55',1),(50,'123',6,'2016-03-27 18:43:57','2016-03-27 18:43:57',1),(51,'123123',6,'2016-03-27 18:44:01','2016-03-27 18:44:01',1),(52,'111231231',6,'2016-03-27 18:45:00','2016-07-06 00:40:57',0),(53,'123',6,'2016-03-27 19:26:28','2016-07-06 00:40:50',0),(54,'wwwwwwwwwww',6,'2016-03-27 19:26:34','2016-03-27 19:26:34',1);
/*!40000 ALTER TABLE `me_channel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_channel_content`
--

DROP TABLE IF EXISTS `me_channel_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_channel_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_user` int(10) NOT NULL,
  `content` text NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_type` int(2) NOT NULL DEFAULT '1' COMMENT '1:文字,2:图文,3:纯图片',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_channel_content`
--

LOCK TABLES `me_channel_content` WRITE;
/*!40000 ALTER TABLE `me_channel_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `me_channel_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_content_label`
--

DROP TABLE IF EXISTS `me_content_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_content_label` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(10) NOT NULL,
  `label_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_content_label`
--

LOCK TABLES `me_content_label` WRITE;
/*!40000 ALTER TABLE `me_content_label` DISABLE KEYS */;
/*!40000 ALTER TABLE `me_content_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_label`
--

DROP TABLE IF EXISTS `me_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_label` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `create_user` int(10) NOT NULL,
  `label_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_label`
--

LOCK TABLES `me_label` WRITE;
/*!40000 ALTER TABLE `me_label` DISABLE KEYS */;
INSERT INTO `me_label` VALUES (45,6,'123','2016-03-27 15:03:09','2016-03-27 15:03:09',1),(46,6,'123213','2016-03-27 15:03:12','2016-03-27 15:03:12',1),(47,6,'12312312','2016-03-27 15:03:20','2016-03-27 15:03:20',1),(48,6,'1213123','2016-03-27 15:04:17','2016-03-27 15:04:17',1),(49,6,'123123','2016-03-27 15:04:20','2016-03-27 15:04:20',1),(50,6,'卧槽！！！！','2016-03-27 15:04:27','2016-03-27 15:04:27',1),(51,6,'123123123','2016-03-27 15:04:31','2016-03-27 15:04:31',1),(52,6,'asdadas','2016-03-27 15:04:34','2016-03-27 15:04:34',1),(53,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(54,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(55,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(56,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(57,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(58,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(59,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(60,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(61,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(62,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(63,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(64,6,'mlgbs','2016-03-27 15:04:39','2016-03-27 15:07:39',1),(65,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(66,6,'mlgb123','2016-03-27 15:04:39','2016-03-27 19:57:42',1),(67,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(68,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(69,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(70,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(71,6,'mlgb','2016-03-27 15:04:39','2016-03-27 15:04:39',1),(72,6,'adadaasd11','2016-03-27 15:04:39','2016-03-27 19:16:31',0);
/*!40000 ALTER TABLE `me_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_migrations`
--

DROP TABLE IF EXISTS `me_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Laravel生成数据库表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_migrations`
--

LOCK TABLES `me_migrations` WRITE;
/*!40000 ALTER TABLE `me_migrations` DISABLE KEYS */;
INSERT INTO `me_migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_03_20_203812_create_sessions_table',2),('2015_01_15_105324_create_roles_table',3),('2015_01_15_114412_create_role_user_table',3),('2015_01_26_115212_create_permissions_table',3),('2015_01_26_115523_create_permission_role_table',3),('2015_02_09_132439_create_permission_user_table',3);
/*!40000 ALTER TABLE `me_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_password_resets`
--

DROP TABLE IF EXISTS `me_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户密码找回表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_password_resets`
--

LOCK TABLES `me_password_resets` WRITE;
/*!40000 ALTER TABLE `me_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `me_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_permission_role`
--

DROP TABLE IF EXISTS `me_permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `me_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `me_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_permission_role`
--

LOCK TABLES `me_permission_role` WRITE;
/*!40000 ALTER TABLE `me_permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `me_permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_permission_user`
--

DROP TABLE IF EXISTS `me_permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `me_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `me_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_permission_user`
--

LOCK TABLES `me_permission_user` WRITE;
/*!40000 ALTER TABLE `me_permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `me_permission_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_permissions`
--

DROP TABLE IF EXISTS `me_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_permissions`
--

LOCK TABLES `me_permissions` WRITE;
/*!40000 ALTER TABLE `me_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `me_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_role_user`
--

DROP TABLE IF EXISTS `me_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `me_roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `me_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_role_user`
--

LOCK TABLES `me_role_user` WRITE;
/*!40000 ALTER TABLE `me_role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `me_role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_roles`
--

DROP TABLE IF EXISTS `me_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_roles`
--

LOCK TABLES `me_roles` WRITE;
/*!40000 ALTER TABLE `me_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `me_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_sessions`
--

DROP TABLE IF EXISTS `me_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_sessions`
--

LOCK TABLES `me_sessions` WRITE;
/*!40000 ALTER TABLE `me_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `me_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_user_type`
--

DROP TABLE IF EXISTS `me_user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_user_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户类型表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_user_type`
--

LOCK TABLES `me_user_type` WRITE;
/*!40000 ALTER TABLE `me_user_type` DISABLE KEYS */;
INSERT INTO `me_user_type` VALUES (1,1,'超级管理员','2016-03-19 09:47:37','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `me_user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_users`
--

DROP TABLE IF EXISTS `me_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_users`
--

LOCK TABLES `me_users` WRITE;
/*!40000 ALTER TABLE `me_users` DISABLE KEYS */;
INSERT INTO `me_users` VALUES (6,'root','路人甲','13333333333','$2y$10$YZbDOM7fl9Uy1AmgFVHG.uhyzzg29mPwP/af70YVYNxCwJMmvvIqe',1,'2016-03-17 10:57:41','2016-03-17 10:57:41',1);
/*!40000 ALTER TABLE `me_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sexy'
--

--
-- Dumping routines for database 'sexy'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-12 14:43:06
