-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla movie.funciones_admin
CREATE TABLE IF NOT EXISTS `funciones_admin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `movieId` int(10) unsigned NOT NULL,
  `time` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `funciones_admin_movieid_foreign` (`movieId`),
  CONSTRAINT `funciones_admin_movieid_foreign` FOREIGN KEY (`movieId`) REFERENCES `movie` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla movie.funciones_admin: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `funciones_admin` DISABLE KEYS */;
INSERT INTO `funciones_admin` (`id`, `movieId`, `time`, `location`, `created_at`, `updated_at`) VALUES
	(1, 2, '2020-09-15 17:34:10', 'Calle Roncal, 26, 33210 Gijón, Asturias, España', '2020-09-18 22:34:16', '2020-09-18 22:34:16'),
	(2, 3, '2020-09-29 17:34:22', 'Calle Leopoldo Alas, 35, 33204 Gijón, Asturias, España', '2020-09-18 22:34:30', '2020-09-18 22:34:30');
/*!40000 ALTER TABLE `funciones_admin` ENABLE KEYS */;

-- Volcando estructura para tabla movie.funciones_user
CREATE TABLE IF NOT EXISTS `funciones_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned NOT NULL,
  `movieId` int(10) unsigned NOT NULL,
  `seatId` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `funciones_user_userid_foreign` (`userId`),
  KEY `funciones_user_movieid_foreign` (`movieId`),
  KEY `funciones_user_seatid_foreign` (`seatId`),
  CONSTRAINT `funciones_user_movieid_foreign` FOREIGN KEY (`movieId`) REFERENCES `movie` (`id`) ON DELETE CASCADE,
  CONSTRAINT `funciones_user_seatid_foreign` FOREIGN KEY (`seatId`) REFERENCES `seat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `funciones_user_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla movie.funciones_user: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `funciones_user` DISABLE KEYS */;
INSERT INTO `funciones_user` (`id`, `userId`, `movieId`, `seatId`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 5, '2020-09-18 22:34:45', '2020-09-18 22:34:45'),
	(2, 1, 2, 4, '2020-09-18 22:41:17', '2020-09-18 22:41:17');
/*!40000 ALTER TABLE `funciones_user` ENABLE KEYS */;

-- Volcando estructura para tabla movie.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla movie.migrations: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2020_09_18_035636_create_funciones_admin_table', 1),
	(3, '2020_09_18_222503_create_funciones_user_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla movie.movie
CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla movie.movie: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` (`id`, `name`, `img`) VALUES
	(1, 'Good Will Hunting', '1.jpg'),
	(2, 'The Dark Knight Rises', '2.jpg'),
	(3, 'The Hobbit: The Desolation of Smaug', '3.jpg');
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;

-- Volcando estructura para tabla movie.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla movie.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla movie.seat
CREATE TABLE IF NOT EXISTS `seat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seat` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla movie.seat: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `seat` DISABLE KEYS */;
INSERT INTO `seat` (`id`, `seat`) VALUES
	(1, 'A1'),
	(2, 'A2'),
	(3, 'A3'),
	(4, 'A4'),
	(5, 'A5'),
	(6, 'A6'),
	(7, 'A7'),
	(8, 'A8'),
	(9, 'A9'),
	(10, 'A10'),
	(11, 'B1'),
	(12, 'B2'),
	(13, 'B3'),
	(14, 'B4'),
	(15, 'B5'),
	(16, 'B6'),
	(17, 'B7'),
	(18, 'B8'),
	(19, 'B9'),
	(20, 'B10');
/*!40000 ALTER TABLE `seat` ENABLE KEYS */;

-- Volcando estructura para tabla movie.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `role` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla movie.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `role`) VALUES
	(1, 'Administrator', 'Lastname', 'admin@email.com', '$2y$10$xpWyfo5x8DjfeRU2NI5.UOWAMmhHPoNHEur7hHgI6/uHbT9zuFkXi', 1),
	(2, 'User1', 'Lastname1', 'test1@email.com', '$2y$10$xpWyfo5x8DjfeRU2NI5.UOWAMmhHPoNHEur7hHgI6/uHbT9zuFkXi', 2),
	(3, 'User2', 'Lastname2', 'test2@email.com', '$2y$10$xpWyfo5x8DjfeRU2NI5.UOWAMmhHPoNHEur7hHgI6/uHbT9zuFkXi', 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
