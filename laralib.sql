-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2022 at 01:44 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laralib`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_user_id_foreign` (`user_id`),
  KEY `books_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `info`, `file`, `image`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(9, 'يوتيوبيا', 'على محمد علي', 'ننننننن', '1659010756-IS2.pdf.pdf', '1659010756-0H9Vj.png.png', 7, 2, '2022-07-28 10:19:16', '2022-07-28 10:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Novels', '2022-07-24 10:38:16', '2022-07-24 10:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `book_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_book_id_foreign` (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(1, 'that\'s really what i need', 7, 2, '2022-07-26 07:22:44', '2022-07-26 07:22:44'),
(3, ',,', 7, 9, '2022-07-28 10:21:45', '2022-07-28 10:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_07_16_155218_create_books_table', 1),
(5, '2022_07_16_155241_create_categories_table', 1),
(6, '2022_07_16_155311_create_comments_table', 1),
(7, '2022_07_16_225456_create_roles_table', 1),
(8, '2022_07_16_230014_create_roles_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE IF NOT EXISTS `roles_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_users_user_id_foreign` (`user_id`),
  KEY `roles_users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(9, 7, 1, NULL, NULL),
(8, 7, 2, '2022-07-23 01:12:48', '2022-07-23 01:12:48'),
(10, 9, 2, '2022-07-23 02:02:20', '2022-07-23 02:02:20'),
(13, 10, 2, '2022-07-24 09:34:42', '2022-07-24 09:34:42'),
(14, 11, 2, '2022-07-24 10:17:07', '2022-07-24 10:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `email_verified_at`, `password`, `img`, `ban`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'omar', 'omarabdelwahhabkishk2000@gmail.com', '01028689567', NULL, '$2y$10$zb3agmpJXr2H55ZXCHK/7uBs/PqnGh/1XVfRlFq4vULYw9FUSW4aS', 'user.png', 0, NULL, '2022-07-23 01:12:48', '2022-07-24 11:29:29'),
(11, 'omar10000f', 'OmarUsevr@gmail.com', '01028689567', NULL, '$2y$10$nP6XFb19dfos0G10IH4fC.ZJeSWzhZzn6u3sAhaatZpnc6xXZfVyO', '1658665026-115768673_1263790467293110_7273553530941759522_o.jpg.jpg', 0, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
