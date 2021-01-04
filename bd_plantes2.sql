-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour bd_plantes2
CREATE DATABASE IF NOT EXISTS `bd_plantes2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_plantes2`;

-- Listage de la structure de la table bd_plantes2. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.failed_jobs : ~0 rows (environ)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table bd_plantes2. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.migrations : ~10 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_04_25_014619_create_partieUtilisees_table', 1),
	(5, '2020_04_25_014619_create_plante_zoneRencontree_table', 1),
	(6, '2020_04_25_014619_create_plantes_table', 1),
	(7, '2020_04_25_014619_create_regionPratiquees_table', 1),
	(8, '2020_04_25_014619_create_vertues_table', 1),
	(9, '2020_04_25_014619_create_zoneRencontrees_table', 1),
	(10, '2020_04_25_014629_create_foreign_keys', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table bd_plantes2. partieutilisees
CREATE TABLE IF NOT EXISTS `partieutilisees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nomPartie` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.partieutilisees : ~3 rows (environ)
/*!40000 ALTER TABLE `partieutilisees` DISABLE KEYS */;
INSERT INTO `partieutilisees` (`id`, `created_at`, `updated_at`, `deleted_at`, `nomPartie`) VALUES
	(1, '2020-05-02 22:16:52', '2020-05-02 22:16:52', NULL, 'Feuille'),
	(2, '2020-05-05 04:24:20', '2020-05-05 04:24:20', NULL, 'racines'),
	(3, '2020-05-05 04:24:40', '2020-05-05 04:24:40', NULL, 'écorce'),
	(4, '2020-05-05 04:24:54', '2020-05-05 04:24:54', NULL, 'Bourgeons');
/*!40000 ALTER TABLE `partieutilisees` ENABLE KEYS */;

-- Listage de la structure de la table bd_plantes2. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table bd_plantes2. plantes
CREATE TABLE IF NOT EXISTS `plantes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nomScientifique` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `espece` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `famille` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomMoore` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomDioula` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomFulfulde` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enDanger` tinyint(1) NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.plantes : ~4 rows (environ)
/*!40000 ALTER TABLE `plantes` DISABLE KEYS */;
INSERT INTO `plantes` (`id`, `created_at`, `updated_at`, `deleted_at`, `nomScientifique`, `espece`, `famille`, `nomMoore`, `nomDioula`, `nomFulfulde`, `enDanger`, `photo`) VALUES
	(1, '2020-05-05 04:28:17', '2020-05-08 23:03:07', NULL, 'Baobab', 'Baobab', 'Baobab', 'Toega', 'Baobab', 'Baobab', 1, '/uploads/images/1588978987.jpg'),
	(2, '2020-05-07 17:19:36', '2020-05-08 23:02:52', NULL, 'Neem', 'Neem', 'Ligneux', 'niim', 'niim', 'niimeer', 1, '/uploads/images/1588978972.jpg'),
	(3, '2020-05-08 22:24:49', '2020-05-08 23:02:22', NULL, 'Neem', 'Baobab', 'Neem', 'Neem', 'Baobab', 'Baobab', 1, '/uploads/images/1588978942.png'),
	(4, '2020-05-08 22:27:42', '2020-05-08 22:28:51', '2020-05-08 22:28:51', 'Baobab', 'Baobab', 'Baobab', 'Toega', 'Baobab', 'Baobab', 1, '/uploads/images/1588976862.jpg'),
	(5, '2020-05-08 22:29:12', '2020-05-08 22:29:12', NULL, 'Baobab', 'Neem', 'Baobab', 'Neem', 'Baobab', 'Neem', 1, '/uploads/images/1588976952.jpg');
/*!40000 ALTER TABLE `plantes` ENABLE KEYS */;

-- Listage de la structure de la table bd_plantes2. plante_zonerencontree
CREATE TABLE IF NOT EXISTS `plante_zonerencontree` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plante_id` bigint(20) unsigned NOT NULL,
  `zone_rencontree_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plante_zonerencontree_plante_id_foreign` (`plante_id`),
  KEY `plante_zonerencontree_zonerencontree_id_foreign` (`zone_rencontree_id`),
  CONSTRAINT `plante_zonerencontree_plante_id_foreign` FOREIGN KEY (`plante_id`) REFERENCES `plantes` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `plante_zonerencontree_zonerencontree_id_foreign` FOREIGN KEY (`zone_rencontree_id`) REFERENCES `zonerencontrees` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.plante_zonerencontree : ~8 rows (environ)
/*!40000 ALTER TABLE `plante_zonerencontree` DISABLE KEYS */;
INSERT INTO `plante_zonerencontree` (`id`, `plante_id`, `zone_rencontree_id`) VALUES
	(6, 4, 1),
	(7, 4, 2),
	(8, 4, 3),
	(9, 5, 1),
	(10, 5, 2),
	(11, 5, 3),
	(15, 3, 1);
/*!40000 ALTER TABLE `plante_zonerencontree` ENABLE KEYS */;

-- Listage de la structure de la table bd_plantes2. regionpratiquees
CREATE TABLE IF NOT EXISTS `regionpratiquees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nomRegion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.regionpratiquees : ~3 rows (environ)
/*!40000 ALTER TABLE `regionpratiquees` DISABLE KEYS */;
INSERT INTO `regionpratiquees` (`id`, `created_at`, `updated_at`, `deleted_at`, `nomRegion`, `latitude`, `longitude`) VALUES
	(1, '2020-05-02 22:15:14', '2020-05-02 22:15:14', NULL, 'Ouagadougou', NULL, NULL),
	(2, '2020-05-05 04:22:42', '2020-05-05 04:22:42', NULL, 'Dori', NULL, NULL),
	(3, '2020-05-05 04:23:01', '2020-05-05 04:23:01', NULL, 'Léo', NULL, NULL);
/*!40000 ALTER TABLE `regionpratiquees` ENABLE KEYS */;

-- Listage de la structure de la table bd_plantes2. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin admin', 'admin@admin.com', NULL, '$2y$10$6cJ.TsTJVU3sjm2dLyomR.d8Ru0yvsGLD9HZGDhBAAjfjtIztp9O6', NULL, '2020-05-02 22:01:08', '2020-05-02 22:01:08'),
	(2, 'Abdoul Kader Kaboré', 'derokabore@gmail.com', NULL, '$2y$10$x6fpvfKF6SM1VXc4wZ64k.wlAaw7rsJURLx7YHDIT0LCKPlxkFKbC', NULL, '2020-05-02 22:05:17', '2020-05-02 22:05:17'),
	(3, 'Niss', 'admin@admin1', NULL, '$2y$10$PkmDnx2VGkFuAc2XVTciMOwhQ5c5PCGMD3EtRMwFrMVtfcj8IScsi', NULL, '2020-05-02 22:11:50', '2020-05-02 22:11:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table bd_plantes2. vertues
CREATE TABLE IF NOT EXISTS `vertues` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nomVertue` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recette` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisation` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plante_id` bigint(20) unsigned NOT NULL,
  `regionPratiquee_id` bigint(20) unsigned NOT NULL,
  `partieUtilisee_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vertues_plante_id_foreign` (`plante_id`),
  KEY `vertues_regionpratiquee_id_foreign` (`regionPratiquee_id`),
  KEY `vertues_partieutilisee_id_foreign` (`partieUtilisee_id`),
  CONSTRAINT `vertues_partieutilisee_id_foreign` FOREIGN KEY (`partieUtilisee_id`) REFERENCES `partieutilisees` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `vertues_plante_id_foreign` FOREIGN KEY (`plante_id`) REFERENCES `plantes` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `vertues_regionpratiquee_id_foreign` FOREIGN KEY (`regionPratiquee_id`) REFERENCES `regionpratiquees` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.vertues : ~45 rows (environ)
/*!40000 ALTER TABLE `vertues` DISABLE KEYS */;
INSERT INTO `vertues` (`id`, `created_at`, `updated_at`, `deleted_at`, `nomVertue`, `recette`, `utilisation`, `plante_id`, `regionPratiquee_id`, `partieUtilisee_id`) VALUES
	(1, '2020-05-07 12:52:40', '2020-05-07 12:52:40', NULL, 'maux de tete', 'Faire bouillir', 'boire matin et soir', 1, 1, 1),
	(2, '2020-05-07 12:53:22', '2020-05-07 12:53:22', NULL, 'maux de tete', 'Faire bouillir', 'boire matin et soir', 1, 2, 2),
	(3, '2020-05-07 16:23:11', '2020-05-07 16:23:11', NULL, 'maux de ventre', 'test rectte', 'test utiliSATION', 1, 1, 1),
	(4, '2020-05-07 16:29:33', '2020-05-07 16:29:33', NULL, 'maux de dent', 'qsdkdpkd tfttgvtg tgvzyz', 'zeuzeize opopzpoppro zepozpoeo', 1, 2, 3),
	(5, '2020-05-07 16:30:19', '2020-05-07 16:36:08', '2020-05-07 16:36:08', 'maux de dent', 'qsdkdpkd tfttgvtg tgvzyz', 'zeuzeize opopzpoppro zepozpoeo', 1, 2, 3),
	(6, '2020-05-07 16:30:39', '2020-05-07 16:35:52', '2020-05-07 16:35:52', 'maux de dent', 'ddfdffff', 'ffffffff', 1, 1, 1),
	(7, '2020-05-07 16:31:36', '2020-05-07 16:35:56', '2020-05-07 16:35:56', 'maux de dent', 'ddfdffff', 'ffffffff', 1, 1, 1),
	(8, '2020-05-07 16:31:55', '2020-05-07 16:36:01', '2020-05-07 16:36:01', 'maux de dent', 'ddfdffff', 'ffffffff', 1, 1, 1),
	(9, '2020-05-07 16:32:04', '2020-05-07 16:35:48', '2020-05-07 16:35:48', 'maux de dent', 'ddfdffff', 'ffffffff', 1, 1, 1),
	(10, '2020-05-07 16:35:32', '2020-05-07 16:35:40', '2020-05-07 16:35:40', 'maux de dent', 'ddfdffff', 'ffffffff', 1, 1, 1),
	(11, '2020-05-07 16:38:38', '2020-05-07 16:38:38', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(12, '2020-05-07 16:41:04', '2020-05-07 16:41:04', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(13, '2020-05-07 16:44:00', '2020-05-07 16:44:00', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(14, '2020-05-07 16:48:37', '2020-05-07 16:48:37', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(15, '2020-05-07 16:48:52', '2020-05-07 16:48:52', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(16, '2020-05-07 16:50:02', '2020-05-07 16:50:02', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(17, '2020-05-07 16:50:53', '2020-05-07 16:50:53', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(18, '2020-05-07 16:51:32', '2020-05-07 16:51:32', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(19, '2020-05-07 16:53:03', '2020-05-07 16:53:03', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(20, '2020-05-07 16:59:47', '2020-05-07 16:59:47', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(21, '2020-05-07 17:07:49', '2020-05-07 17:07:49', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(22, '2020-05-07 17:09:44', '2020-05-07 17:09:44', NULL, 'maux de ventre', 'ilfjilfvn il,l  yudvd', 'riojfil oijfosfd trf flnfv', 1, 1, 1),
	(23, '2020-05-07 17:20:31', '2020-05-07 17:20:31', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 1, 1, 1),
	(24, '2020-05-07 17:22:47', '2020-05-07 17:22:47', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 1, 1, 1),
	(25, '2020-05-07 17:23:26', '2020-05-07 17:23:26', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 1, 1, 1),
	(26, '2020-05-07 17:26:18', '2020-05-07 17:26:18', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 1, 1, 1),
	(27, '2020-05-07 17:29:19', '2020-05-07 17:29:19', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 1, 1, 1),
	(28, '2020-05-07 17:29:47', '2020-05-07 17:29:47', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 1, 1, 1),
	(29, '2020-05-07 17:30:52', '2020-05-07 17:30:52', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 1, 1, 1),
	(30, '2020-05-07 17:31:56', '2020-05-07 17:31:56', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(31, '2020-05-07 17:32:07', '2020-05-07 17:32:07', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(32, '2020-05-07 17:32:32', '2020-05-07 17:32:32', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(33, '2020-05-07 17:33:29', '2020-05-07 17:33:29', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(34, '2020-05-07 17:37:50', '2020-05-07 17:37:50', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(35, '2020-05-07 17:38:12', '2020-05-07 17:38:12', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(36, '2020-05-07 17:38:39', '2020-05-07 17:38:39', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(37, '2020-05-07 17:39:01', '2020-05-07 17:39:01', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(38, '2020-05-07 17:40:06', '2020-05-07 17:40:06', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(39, '2020-05-07 17:40:52', '2020-05-07 17:40:52', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(40, '2020-05-07 17:43:55', '2020-05-07 17:43:55', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(41, '2020-05-07 17:45:45', '2020-05-07 17:45:45', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(42, '2020-05-07 17:46:09', '2020-05-07 17:46:09', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(43, '2020-05-07 17:49:00', '2020-05-07 17:49:00', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(44, '2020-05-07 17:49:56', '2020-05-07 17:49:56', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(45, '2020-05-07 17:50:33', '2020-05-07 17:50:33', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(46, '2020-05-07 17:50:53', '2020-05-07 17:50:53', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(47, '2020-05-07 17:54:30', '2020-05-07 17:54:30', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(48, '2020-05-07 17:55:27', '2020-05-07 17:55:27', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(49, '2020-05-07 17:55:48', '2020-05-07 17:55:48', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(50, '2020-05-07 17:57:32', '2020-05-07 17:57:32', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(51, '2020-05-07 17:57:59', '2020-05-07 17:57:59', NULL, 'maux de dent', 'ljsfilsjmilsfjl', 'fhosdjiojwsis', 2, 1, 1),
	(52, '2020-05-12 21:27:25', '2020-05-12 21:27:25', NULL, 'Palu dingue', 'Faire tamiser puis tremper de de l\'eau sallée', 'Boire un demi-litre 3 fois par jour (matin, midi et soir)', 5, 3, 3),
	(53, '2020-05-12 21:27:45', '2020-05-12 22:16:24', '2020-05-12 22:16:24', 'Palu dingue', 'Faire tamiser puis tremper de de l\'eau sallée', 'Boire un demi-litre 3 fois par jour (matin, midi et soir)', 5, 3, 3),
	(54, '2020-05-12 22:17:57', '2020-05-12 22:17:57', NULL, 'Maux de dents', 'Faire un mélange avec du vinaigre', 'appliquer sur la joue de la dent malade', 1, 1, 1),
	(55, '2020-05-12 22:47:14', '2020-05-12 22:47:14', NULL, 'Insomnies', 'Faire sécher puis broyer puis Mélanger a du vinaigre.', 'Boire au coucher', 1, 1, 1),
	(56, '2020-05-12 22:49:12', '2020-05-12 22:49:12', NULL, 'Insomnies', 'Faire sécher puis broyer puis Mélanger a du vinaigre.', 'Boire au coucher', 1, 1, 1);
/*!40000 ALTER TABLE `vertues` ENABLE KEYS */;

-- Listage de la structure de la table bd_plantes2. zonerencontrees
CREATE TABLE IF NOT EXISTS `zonerencontrees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nomzone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double(8,2) DEFAULT NULL,
  `longitude` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bd_plantes2.zonerencontrees : ~2 rows (environ)
/*!40000 ALTER TABLE `zonerencontrees` DISABLE KEYS */;
INSERT INTO `zonerencontrees` (`id`, `created_at`, `updated_at`, `deleted_at`, `nomzone`, `latitude`, `longitude`) VALUES
	(1, '2020-05-05 04:23:24', '2020-05-05 04:23:24', NULL, 'sahel', NULL, NULL),
	(2, '2020-05-05 04:23:40', '2020-05-05 04:23:40', NULL, 'sud-ouest', NULL, NULL),
	(3, '2020-05-05 04:23:53', '2020-05-05 04:23:53', NULL, 'Est', NULL, NULL);
/*!40000 ALTER TABLE `zonerencontrees` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
