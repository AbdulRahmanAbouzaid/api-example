-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2017 at 01:07 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ApiExample`
--

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(2, 3, 'consequuntur', 'Libero asperiores rerum consequatur.', '2017-11-28 13:41:58', '2017-11-28 13:41:58'),
(3, 2, 'quia', 'Tempore consectetur pariatur dolore laudantium.', '2017-11-28 13:41:58', '2017-11-28 13:41:58'),
(4, 2, 'sunt', 'Dolorem voluptatem deserunt eos blanditiis.', '2017-11-28 13:41:58', '2017-11-28 13:41:58'),
(5, 2, 'similique', 'Beatae earum deleniti repellendus dolorem laborum aut pariatur.', '2017-11-28 13:41:58', '2017-11-28 13:41:58'),
(6, 1, 'New Title', 'Beatae earum deleniti repellendus dolorem laborum aut pariatur.', '2017-11-29 07:41:19', '2017-11-29 07:41:19'),
(7, 1, 'Another Lesson', 'Beatae earum deleniti repellendus dolorem laborum aut pariatur.', '2017-11-29 07:42:51', '2017-11-29 07:42:51'),
(8, NULL, 'Hello Swagger', 'Swagger And Laravel are Great!', '2017-11-30 12:08:15', '2017-11-30 12:08:15'),
(9, NULL, 'First Title', 'Your Text ..', '2017-11-30 13:13:04', '2017-11-30 13:13:04'),
(10, 1, 'First Title', 'Your Text ..', '2017-12-02 20:05:58', '2017-12-02 20:05:58'),
(11, 1, 'Word', 'Sentences', '2017-12-02 20:13:47', '2017-12-02 20:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_11_27_105839_create_lessons_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abdo', 'abdo@mail.com', '$2y$10$/P6KM/GxxVDTiue3/y6sguIkvETj9yZ79UxtQiRWhbmkUlqaBjmtq', NULL, NULL, NULL),
(2, 'Ahmed', 'ahmed@mail.com', '$2y$10$/P6KM/GxxVDTiue3/y6sguIkvETj9yZ79UxtQiRWhbmkUlqaBjmtq', NULL, NULL, NULL),
(3, 'ali', 'ali@mail.com', '$2y$10$/P6KM/GxxVDTiue3/y6sguIkvETj9yZ79UxtQiRWhbmkUlqaBjmtq', NULL, NULL, NULL),
(4, 'Kareem', 'kareem@mail.com', '$2y$10$wEZwSs8e8j5/IIKQHSuyUOiCtTAFaWG/7QKn3PI02OtE.j1KOMvwe', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
