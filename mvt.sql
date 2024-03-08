-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2024 at 10:46 AM
-- Server version: 8.0.35-0ubuntu0.20.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvt`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` bigint UNSIGNED NOT NULL,
  `aboutUsContent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `aboutUsContent`, `created_at`, `updated_at`) VALUES
(1, '<p class=\"highlighted\"><span style=\"font-size: 36px;\">coming soon.........</span><span>﻿</span><span style=\"font-size: 24px;\">﻿</span><br></p>', '2023-12-21 05:13:41', '2023-12-20 23:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogdetails`
--

CREATE TABLE `blogdetails` (
  `id` int UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(3000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '2000-01-01',
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tag` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `category` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `slug` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `tableContent` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `blogdetails`
--

INSERT INTO `blogdetails` (`id`, `deleted_at`, `created_at`, `updated_at`, `title`, `description`, `date`, `content`, `tag`, `category`, `image`, `slug`, `tableContent`) VALUES
(124, '2023-12-19 12:54:18', '2023-12-19 12:54:18', '2023-12-19 07:24:18', 'Yael Randall', 'Ut qui eu est molest', '1989-10-26', 'Dolor et quae esse d', 'Doloribus tenetur co', '1', 'http://127.0.0.1:8000/storage/public/uploads/1702735225_itit.jpeg', 'yael-randall', NULL),
(126, NULL, '2023-12-17 04:39:02', '2023-12-17 04:39:02', 'Doris Harrell', 'Anim qui cupiditate', '1971-09-10', 'Cillum doloribus quo', 'Possimus incididunt', 'Mobile App Development', 'http://127.0.0.1:8000/storage/public/uploads/1702807742_Screenshot_from_2023_12_15_19_52_12.png', 'doris-harrell', NULL),
(127, NULL, '2023-12-17 04:48:12', '2023-12-17 04:48:12', 'Jonah Patrick', 'Rerum illo culpa et', '1991-10-17', 'Velit est dolore seq', 'Itaque duis at place', 'IT Consulting', 'http://127.0.0.1:8000/storage/public/uploads/1702808292_kol.png', 'jonah-patrick', NULL),
(128, NULL, '2023-12-17 08:26:45', '2023-12-17 08:26:45', 'Brandon Clay', 'Esse dolor proident', '2005-12-16', 'Adipisicing quis pra', 'Consectetur aperiam', 'Sport Betting', 'http://127.0.0.1:8000/storage/public/uploads/1702821405_Screenshot_from_2023_12_15_19_52_12.png', 'brandon-clay', NULL),
(129, NULL, '2023-12-18 06:10:45', '2023-12-18 06:10:45', 'Idona Hicks', 'Elit laboris ut ad', '2004-11-18', 'Aspernatur nostrud e', 'Asperiores exercitat', 'ERP', 'http://127.0.0.1:8000/storage/public/uploads/1702899645_Screenshot_from_2023_12_13_11_13_15.png', 'idona-hicks', NULL),
(140, NULL, '2023-12-21 04:41:00', '2023-12-21 04:41:00', 'Orla Bishop', 'Inventore modi recus', '2017-09-10', 'Quia sint quibusdam', 'Quod quod sunt ea si', 'Managed IT', 'http://127.0.0.1:8000/storage/public/uploads/1703153460_kol.png', 'orla-bishop', NULL),
(141, NULL, '2023-12-21 04:42:00', '2023-12-21 04:42:00', 'Frances Burton', 'Nesciunt deserunt n', '2002-08-10', 'Accusamus delectus', 'Adipisicing necessit', 'Managed IT', 'http://127.0.0.1:8000/storage/public/uploads/1703153520_naturelogin.jpeg', 'frances-burton', NULL),
(142, NULL, '2023-12-21 04:58:20', '2023-12-21 04:58:20', 'Amos Townsend', 'Id et aspernatur qua', '1986-12-12', 'Dolor temporibus ame', 'Ducimus reprehender', 'Mobile App Development', 'http://127.0.0.1:8000/storage/public/uploads/1703154500_kol.png', 'amos-townsend', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(166, 'Justine Chambers', 'nijuje@mailinator.com', '+1 (776) 127-1825', 'Veniam in voluptas', 'Tempora nulla pariat', '2023-12-07 18:08:10', '2023-12-07 18:08:10'),
(188, 'Graiden Ballard', 'mibuhef@mailinator.com', '+1 (453) 891-7566', 'Omnis velit recusand', 'Fugit voluptatem E', '2023-12-18 03:22:54', '2023-12-18 03:22:54'),
(194, 'Whoopi Wiggins', 'jiculilafo@mailinator.com', '+1 (696) 686-2906', 'Et dolor vero eaque', 'Id quaerat ut cillum', '2023-12-19 01:17:40', '2023-12-19 01:17:40'),
(195, 'Damian Hill', 'gise@mailinator.com', '+1 (327) 203-7543', 'Expedita est iure s', 'Consectetur fugiat e', '2023-12-19 01:27:59', '2023-12-19 01:27:59'),
(196, 'Jeremy Fernandez', 'dedarefome@mailinator.com', '+1 (679) 405-1203', 'Ut provident sunt', 'Qui est iusto ut ame', '2023-12-19 01:30:43', '2023-12-19 01:30:43'),
(197, 'Evan Anderson', 'tepo@mailinator.com', '+1 (119) 711-2699', 'Nisi iure veniam ut', 'Illum et inventore', '2023-12-19 01:31:20', '2023-12-19 01:31:20'),
(198, 'Daphne Turner', 'gyxele@mailinator.com', '+1 (166) 523-6993', 'Proident amet quod', 'Nobis et sunt repre', '2023-12-21 01:53:37', '2023-12-21 01:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int UNSIGNED NOT NULL,
  `contacted_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `subject` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ip_address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Quibusdam necessitat', 'Et doloremque rerum', 3, '2023-12-18 11:57:10', '2023-12-18 06:27:10'),
(7, 'Sequi in consectetur', 'Tempor minus molesti', 2, '2023-12-18 12:17:03', '2023-12-18 12:17:03'),
(10, 'Architecto explicabo', 'Et corporis nostrum', 4, '2023-12-19 00:42:45', '2023-12-19 00:42:45'),
(13, 'VIvkmnbkjdsnzkjnsdkljgbkjlsbdgjisiu;odhgliu', 'Consequatur expeditakjnosvvidjoIJVOI:JSOID', 1, '2023-12-19 03:17:40', '2023-12-19 03:17:40'),
(22, 'ss', 'dd', 1, '2023-12-20 07:47:53', '2023-12-20 07:47:53'),
(23, 'Laborum est ut ipsu', 'Distinctio Quos qua', 2, '2023-12-20 08:37:26', '2023-12-20 08:37:26'),
(24, 'How can i play footbol game ?', 'dxxfcvb', 4, '2023-12-20 23:32:01', '2023-12-20 23:32:01'),
(25, 'How can i play boly boll game ?', 'sdcvbn jia', 2, '2023-12-20 23:36:51', '2023-12-20 23:36:51'),
(26, 'Est minim molestiae', 'Nam fugiat consequa', 4, '2023-12-21 03:20:39', '2023-12-21 03:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'general', '2023-12-18 10:38:43', '2023-12-18 10:38:43'),
(2, 'sports', '2023-12-18 10:38:50', '2023-12-18 10:38:50'),
(3, 'affiliate', '2023-12-18 10:38:57', '2023-12-18 10:38:57'),
(4, 'tournament', '2023-12-18 10:39:02', '2023-12-18 10:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(148, 'Bad', 'Inventore unde qui s', '2023-12-18 03:31:28', '2023-12-18 03:31:28'),
(149, 'Good', 'Laborum Tenetur ut', '2023-12-18 03:31:32', '2023-12-18 03:31:32'),
(152, 'Very Good', 'Fuga Dolore enim qu', '2023-12-18 23:37:02', '2023-12-18 23:37:02'),
(153, 'Very Bad', 'Voluptate recusandae', '2023-12-20 03:55:25', '2023-12-20 03:55:25'),
(154, 'Very Good', 'sdfgh', '2023-12-21 01:08:08', '2023-12-21 01:08:08'),
(155, 'Very Good', 'sdvfgn', '2023-12-21 04:55:47', '2023-12-21 04:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE `menu_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Historical Ratings', NULL, NULL),
(2, 'Annual Awards', NULL, NULL),
(3, 'All Time Performances', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(8, '2023_12_01_125905_create_team_types_table', 4),
(9, '2023_12_01_125915_create_player_types_table', 4),
(11, '2023_11_23_083750_create_teams_table', 5),
(12, '2023_11_21_091036_create_players_table', 6),
(13, '2023_12_17_105219_create_aboutus_table', 7),
(14, '2023_12_18_092126_create_categorie_table', 8),
(15, '2023_12_18_103734_create_faq_categories_table', 9),
(18, '2023_12_20_063253_create_about_us_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('digiprima.salesone@gmail.com', '$2y$10$fulgEjAar7auBCtknLepJOxBwLa36nJmjCgC3TMwtEZaaSJ4aWgsC', '2023-10-04 01:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint UNSIGNED NOT NULL,
  `ranking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_image_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `player` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_flag_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_type_id` bigint UNSIGNED NOT NULL,
  `team_type_id` bigint UNSIGNED NOT NULL,
  `points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matches` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_type_id` bigint UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `ranking`, `player_id`, `player_image_link`, `player`, `team_flag_link`, `team`, `player_type_id`, `team_type_id`, `points`, `ref`, `player_ref`, `team_ref`, `matches`, `menu_type_id`, `year`, `month`, `format`, `category`, `created_at`, `updated_at`) VALUES
(1, '1', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '85.0', 'Players_TestsBatsmen2023December_00001', 'p00001', 't001', '', 1, '2023', 'December', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(2, '2', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '84.0', 'Players_TestsBatsmen2023December_00002', 'p00002', 't002', '', 1, '2023', 'December', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(3, '3', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '83.0', 'Players_TestsBatsmen2023December_00003', 'p00003', 't003', '', 1, '2023', 'December', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(4, '4', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '82.0', 'Players_TestsBatsmen2023December_00004', 'p00004', 't004', '', 1, '2023', 'December', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(5, '5', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '81.0', 'Players_TestsBatsmen2023December_00005', 'p00005', 't005', '', 1, '2023', 'December', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(6, '6', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '80.0', 'Players_TestsBatsmen2023December_00006', 'p00006', 't006', '', 1, '2023', 'December', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(7, '7', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '79.0', 'Players_TestsBatsmen2023December_00007', 'p00007', 't007', '', 1, '2023', 'December', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(8, '8', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '78.0', 'Players_TestsBatsmen2023December_00008', 'p00008', 't008', '', 1, '2023', 'December', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(9, '9', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '84.2', 'Players_TestsBatsmen2023November_00009', 'p00001', 't001', '', 1, '2023', 'November', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(10, '10', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '83.2', 'Players_TestsBatsmen2023November_00010', 'p00002', 't002', '', 1, '2023', 'November', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(11, '11', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '82.2', 'Players_TestsBatsmen2023November_00011', 'p00003', 't003', '', 1, '2023', 'November', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(12, '12', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '81.2', 'Players_TestsBatsmen2023November_00012', 'p00004', 't004', '', 1, '2023', 'November', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(13, '13', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '80.2', 'Players_TestsBatsmen2023November_00013', 'p00005', 't005', '', 1, '2023', 'November', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(14, '14', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '79.2', 'Players_TestsBatsmen2023November_00014', 'p00006', 't006', '', 1, '2023', 'November', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(15, '15', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '78.2', 'Players_TestsBatsmen2023November_00015', 'p00007', 't007', '', 1, '2023', 'November', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(16, '16', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '77.2', 'Players_TestsBatsmen2023November_00016', 'p00008', 't008', '', 1, '2023', 'November', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(17, '17', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '83.3', 'Players_TestsBatsmen2023October_00017', 'p00001', 't001', '', 1, '2023', 'October', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(18, '18', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '82.3', 'Players_TestsBatsmen2023October_00018', 'p00002', 't002', '', 1, '2023', 'October', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(19, '19', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '81.3', 'Players_TestsBatsmen2023October_00019', 'p00003', 't003', '', 1, '2023', 'October', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(20, '20', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '80.4', 'Players_TestsBatsmen2023October_00020', 'p00004', 't004', '', 1, '2023', 'October', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(21, '21', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '79.4', 'Players_TestsBatsmen2023October_00021', 'p00005', 't005', '', 1, '2023', 'October', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(22, '22', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '78.4', 'Players_TestsBatsmen2023October_00022', 'p00006', 't006', '', 1, '2023', 'October', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(23, '23', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '77.4', 'Players_TestsBatsmen2023October_00023', 'p00007', 't007', '', 1, '2023', 'October', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(24, '24', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '76.4', 'Players_TestsBatsmen2023October_00024', 'p00008', 't008', '', 1, '2023', 'October', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(25, '25', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '82.5', 'Players_TestsBatsmen2023September_00025', 'p00001', 't001', '', 1, '2023', 'September', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(26, '26', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '81.5', 'Players_TestsBatsmen2023September_00026', 'p00002', 't002', '', 1, '2023', 'September', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(27, '27', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '80.5', 'Players_TestsBatsmen2023September_00027', 'p00003', 't003', '', 1, '2023', 'September', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(28, '28', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '79.6', 'Players_TestsBatsmen2023September_00028', 'p00004', 't004', '', 1, '2023', 'September', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(29, '29', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '78.6', 'Players_TestsBatsmen2023September_00029', 'p00005', 't005', '', 1, '2023', 'September', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(30, '30', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '77.6', 'Players_TestsBatsmen2023September_00030', 'p00006', 't006', '', 1, '2023', 'September', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(31, '31', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '76.7', 'Players_TestsBatsmen2023September_00031', 'p00007', 't007', '', 1, '2023', 'September', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(32, '32', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '75.7', 'Players_TestsBatsmen2023September_00032', 'p00008', 't008', '', 1, '2023', 'September', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(33, '33', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '81.7', 'Players_TestsBatsmen2023August_00033', 'p00001', 't001', '', 1, '2023', 'August', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(34, '34', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '80.7', 'Players_TestsBatsmen2023August_00034', 'p00002', 't002', '', 1, '2023', 'August', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(35, '35', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '79.7', 'Players_TestsBatsmen2023August_00035', 'p00003', 't003', '', 1, '2023', 'August', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(36, '36', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '78.8', 'Players_TestsBatsmen2023August_00036', 'p00004', 't004', '', 1, '2023', 'August', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(37, '37', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '77.8', 'Players_TestsBatsmen2023August_00037', 'p00005', 't005', '', 1, '2023', 'August', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(38, '38', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '76.8', 'Players_TestsBatsmen2023August_00038', 'p00006', 't006', '', 1, '2023', 'August', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(39, '39', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '75.9', 'Players_TestsBatsmen2023August_00039', 'p00007', 't007', '', 1, '2023', 'August', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(40, '40', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '74.9', 'Players_TestsBatsmen2023August_00040', 'p00008', 't008', '', 1, '2023', 'August', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(41, '41', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '80.8', 'Players_TestsBatsmen2023July_00041', 'p00001', 't001', '', 1, '2023', 'July', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(42, '42', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '79.9', 'Players_TestsBatsmen2023July_00042', 'p00002', 't002', '', 1, '2023', 'July', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(43, '43', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '78.9', 'Players_TestsBatsmen2023July_00043', 'p00003', 't003', '', 1, '2023', 'July', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(44, '44', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '78.0', 'Players_TestsBatsmen2023July_00044', 'p00004', 't004', '', 1, '2023', 'July', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(45, '45', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '77.0', 'Players_TestsBatsmen2023July_00045', 'p00005', 't005', '', 1, '2023', 'July', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(46, '46', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '76.1', 'Players_TestsBatsmen2023July_00046', 'p00006', 't006', '', 1, '2023', 'July', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(47, '47', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '75.1', 'Players_TestsBatsmen2023July_00047', 'p00007', 't007', '', 1, '2023', 'July', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(48, '48', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '74.2', 'Players_TestsBatsmen2023July_00048', 'p00008', 't008', '', 1, '2023', 'July', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(49, '49', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '80.0', 'Players_TestsBatsmen2023June_00049', 'p00001', 't001', '', 1, '2023', 'June', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(50, '50', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '79.1', 'Players_TestsBatsmen2023June_00050', 'p00002', 't002', '', 1, '2023', 'June', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(51, '51', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '78.1', 'Players_TestsBatsmen2023June_00051', 'p00003', 't003', '', 1, '2023', 'June', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(52, '52', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '77.2', 'Players_TestsBatsmen2023June_00052', 'p00004', 't004', '', 1, '2023', 'June', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(53, '53', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '76.3', 'Players_TestsBatsmen2023June_00053', 'p00005', 't005', '', 1, '2023', 'June', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(54, '54', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '75.3', 'Players_TestsBatsmen2023June_00054', 'p00006', 't006', '', 1, '2023', 'June', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(55, '55', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '74.4', 'Players_TestsBatsmen2023June_00055', 'p00007', 't007', '', 1, '2023', 'June', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(56, '56', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '73.4', 'Players_TestsBatsmen2023June_00056', 'p00008', 't008', '', 1, '2023', 'June', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(57, '57', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '79.2', 'Players_TestsBatsmen2023May_00057', 'p00001', 't001', '', 1, '2023', 'May', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(58, '58', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '78.3', 'Players_TestsBatsmen2023May_00058', 'p00002', 't002', '', 1, '2023', 'May', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(59, '59', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '77.4', 'Players_TestsBatsmen2023May_00059', 'p00003', 't003', '', 1, '2023', 'May', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(60, '60', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '76.4', 'Players_TestsBatsmen2023May_00060', 'p00004', 't004', '', 1, '2023', 'May', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(61, '61', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '75.5', 'Players_TestsBatsmen2023May_00061', 'p00005', 't005', '', 1, '2023', 'May', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(62, '62', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '74.6', 'Players_TestsBatsmen2023May_00062', 'p00006', 't006', '', 1, '2023', 'May', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(63, '63', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '73.6', 'Players_TestsBatsmen2023May_00063', 'p00007', 't007', '', 1, '2023', 'May', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(64, '64', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '72.7', 'Players_TestsBatsmen2023May_00064', 'p00008', 't008', '', 1, '2023', 'May', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(65, '65', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '78.4', 'Players_TestsBatsmen2023April_00065', 'p00001', 't001', '', 1, '2023', 'April', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(66, '66', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '77.5', 'Players_TestsBatsmen2023April_00066', 'p00002', 't002', '', 1, '2023', 'April', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(67, '67', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '76.6', 'Players_TestsBatsmen2023April_00067', 'p00003', 't003', '', 1, '2023', 'April', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(68, '68', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '75.7', 'Players_TestsBatsmen2023April_00068', 'p00004', 't004', '', 1, '2023', 'April', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(69, '69', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '74.7', 'Players_TestsBatsmen2023April_00069', 'p00005', 't005', '', 1, '2023', 'April', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(70, '70', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '73.8', 'Players_TestsBatsmen2023April_00070', 'p00006', 't006', '', 1, '2023', 'April', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(71, '71', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '72.9', 'Players_TestsBatsmen2023April_00071', 'p00007', 't007', '', 1, '2023', 'April', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(72, '72', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '72.0', 'Players_TestsBatsmen2023April_00072', 'p00008', 't008', '', 1, '2023', 'April', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(73, '73', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '77.6', 'Players_TestsBatsmen2023March_00073', 'p00001', 't001', '', 1, '2023', 'March', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(74, '74', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '76.7', 'Players_TestsBatsmen2023March_00074', 'p00002', 't002', '', 1, '2023', 'March', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(75, '75', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '75.8', 'Players_TestsBatsmen2023March_00075', 'p00003', 't003', '', 1, '2023', 'March', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(76, '76', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '74.9', 'Players_TestsBatsmen2023March_00076', 'p00004', 't004', '', 1, '2023', 'March', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(77, '77', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '74.0', 'Players_TestsBatsmen2023March_00077', 'p00005', 't005', '', 1, '2023', 'March', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(78, '78', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '73.1', 'Players_TestsBatsmen2023March_00078', 'p00006', 't006', '', 1, '2023', 'March', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(79, '79', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '72.2', 'Players_TestsBatsmen2023March_00079', 'p00007', 't007', '', 1, '2023', 'March', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(80, '80', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '71.3', 'Players_TestsBatsmen2023March_00080', 'p00008', 't008', '', 1, '2023', 'March', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(81, '81', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '76.9', 'Players_TestsBatsmen2023February_00081', 'p00001', 't001', '', 1, '2023', 'February', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(82, '82', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '76.0', 'Players_TestsBatsmen2023February_00082', 'p00002', 't002', '', 1, '2023', 'February', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(83, '83', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '75.1', 'Players_TestsBatsmen2023February_00083', 'p00003', 't003', '', 1, '2023', 'February', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(84, '84', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '74.2', 'Players_TestsBatsmen2023February_00084', 'p00004', 't004', '', 1, '2023', 'February', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(85, '85', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '73.3', 'Players_TestsBatsmen2023February_00085', 'p00005', 't005', '', 1, '2023', 'February', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(86, '86', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '72.4', 'Players_TestsBatsmen2023February_00086', 'p00006', 't006', '', 1, '2023', 'February', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(87, '87', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '71.4', 'Players_TestsBatsmen2023February_00087', 'p00007', 't007', '', 1, '2023', 'February', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(88, '88', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '70.5', 'Players_TestsBatsmen2023February_00088', 'p00008', 't008', '', 1, '2023', 'February', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(89, '89', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '76.1', 'Players_TestsBatsmen2023January_00089', 'p00001', 't001', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(90, '90', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '75.2', 'Players_TestsBatsmen2023January_00090', 'p00002', 't002', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(91, '91', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '74.3', 'Players_TestsBatsmen2023January_00091', 'p00003', 't003', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(92, '92', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '73.4', 'Players_TestsBatsmen2023January_00092', 'p00004', 't004', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(93, '93', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '72.5', 'Players_TestsBatsmen2023January_00093', 'p00005', 't005', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(94, '94', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '71.6', 'Players_TestsBatsmen2023January_00094', 'p00006', 't006', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(95, '95', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '70.7', 'Players_TestsBatsmen2023January_00095', 'p00007', 't007', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(96, '96', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '69.8', 'Players_TestsBatsmen2023January_00096', 'p00008', 't008', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(97, '97', 'p00009', '', 'Player9', '', 'Zimbabwe', 2, 1, '75.3', 'Players_TestsBatsmen2023January_00097', 'p00009', 't009', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(98, '98', 'p00010', '', 'Player10', '', 'Bangladesh', 2, 1, '74.5', 'Players_TestsBatsmen2023January_00098', 'p00010', 't010', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(99, '99', 'p00011', '', 'Player11', '', 'Afghanistan', 2, 1, '73.6', 'Players_TestsBatsmen2023January_00099', 'p00011', 't011', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(100, '100', 'p00012', '', 'Player12', '', 'Ireland', 2, 1, '72.7', 'Players_TestsBatsmen2023January_00100', 'p00012', 't012', '', 1, '2023', 'January', 'Tests', 'Batsmen', '2024-01-06 06:42:20', '2024-01-06 06:42:20'),
(101, '1', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '85', 'Players_TestsBatsmen2023_1', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(102, '2', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '84', 'Players_TestsBatsmen2023_2', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(103, '3', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '83', 'Players_TestsBatsmen2023_3', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(104, '4', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '82', 'Players_TestsBatsmen2023_4', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(105, '5', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '81', 'Players_TestsBatsmen2023_5', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(106, '6', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '80', 'Players_TestsBatsmen2023_6', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(107, '7', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '79', 'Players_TestsBatsmen2023_7', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(108, '8', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '78', 'Players_TestsBatsmen2023_8', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(109, '9', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '84.2', 'Players_TestsBatsmen2023_9', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(110, '10', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '83.2', 'Players_TestsBatsmen2023_10', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(111, '11', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '82.2', 'Players_TestsBatsmen2023_11', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(112, '12', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '81.2', 'Players_TestsBatsmen2023_12', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(113, '13', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '80.2', 'Players_TestsBatsmen2023_13', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(114, '14', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '79.2', 'Players_TestsBatsmen2023_14', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(115, '15', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '78.2', 'Players_TestsBatsmen2023_15', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(116, '16', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '77.2', 'Players_TestsBatsmen2023_16', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(117, '17', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '83.3', 'Players_TestsBatsmen2023_17', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(118, '18', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '82.3', 'Players_TestsBatsmen2023_18', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(119, '19', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '81.3', 'Players_TestsBatsmen2023_19', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(120, '20', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '80.4', 'Players_TestsBatsmen2023_20', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(121, '21', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '79.4', 'Players_TestsBatsmen2023_21', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(122, '22', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '78.4', 'Players_TestsBatsmen2023_22', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(123, '23', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '77.4', 'Players_TestsBatsmen2023_23', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(124, '24', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '76.4', 'Players_TestsBatsmen2023_24', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(125, '25', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '82.5', 'Players_TestsBatsmen2023_25', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(126, '26', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '81.5', 'Players_TestsBatsmen2023_26', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(127, '27', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '80.5', 'Players_TestsBatsmen2023_27', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(128, '28', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '79.6', 'Players_TestsBatsmen2023_28', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(129, '29', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '78.6', 'Players_TestsBatsmen2023_29', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(130, '30', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '77.6', 'Players_TestsBatsmen2023_30', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(131, '31', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '76.7', 'Players_TestsBatsmen2023_31', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(132, '32', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '75.7', 'Players_TestsBatsmen2023_32', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(133, '33', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '81.7', 'Players_TestsBatsmen2023_33', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(134, '34', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '80.7', 'Players_TestsBatsmen2023_34', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(135, '35', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '79.7', 'Players_TestsBatsmen2023_35', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(136, '36', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '78.8', 'Players_TestsBatsmen2023_36', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(137, '37', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '77.8', 'Players_TestsBatsmen2023_37', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(138, '38', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '76.8', 'Players_TestsBatsmen2023_38', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(139, '39', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '75.9', 'Players_TestsBatsmen2023_39', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(140, '40', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '74.9', 'Players_TestsBatsmen2023_40', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(141, '41', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '80.8', 'Players_TestsBatsmen2023_41', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(142, '42', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '79.9', 'Players_TestsBatsmen2023_42', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(143, '43', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '78.9', 'Players_TestsBatsmen2023_43', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(144, '44', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '78', 'Players_TestsBatsmen2023_44', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(145, '45', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '77', 'Players_TestsBatsmen2023_45', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(146, '46', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '76.1', 'Players_TestsBatsmen2023_46', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(147, '47', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '75.1', 'Players_TestsBatsmen2023_47', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(148, '48', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '74.2', 'Players_TestsBatsmen2023_48', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(149, '49', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '80', 'Players_TestsBatsmen2023_49', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(150, '50', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '79.1', 'Players_TestsBatsmen2023_50', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(151, '51', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '78.1', 'Players_TestsBatsmen2023_51', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(152, '52', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '77.2', 'Players_TestsBatsmen2023_52', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(153, '53', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '76.3', 'Players_TestsBatsmen2023_53', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(154, '54', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '75.3', 'Players_TestsBatsmen2023_54', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(155, '55', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '74.4', 'Players_TestsBatsmen2023_55', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(156, '56', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '73.4', 'Players_TestsBatsmen2023_56', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(157, '57', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '79.2', 'Players_TestsBatsmen2023_57', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(158, '58', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '78.3', 'Players_TestsBatsmen2023_58', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(159, '59', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '77.4', 'Players_TestsBatsmen2023_59', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(160, '60', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '76.4', 'Players_TestsBatsmen2023_60', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(161, '61', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '75.5', 'Players_TestsBatsmen2023_61', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(162, '62', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '74.6', 'Players_TestsBatsmen2023_62', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(163, '63', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '73.6', 'Players_TestsBatsmen2023_63', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(164, '64', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '72.7', 'Players_TestsBatsmen2023_64', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(165, '65', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '78.4', 'Players_TestsBatsmen2023_65', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(166, '66', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '77.5', 'Players_TestsBatsmen2023_66', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(167, '67', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '76.6', 'Players_TestsBatsmen2023_67', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(168, '68', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '75.7', 'Players_TestsBatsmen2023_68', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(169, '69', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '74.7', 'Players_TestsBatsmen2023_69', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(170, '70', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '73.8', 'Players_TestsBatsmen2023_70', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(171, '71', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '72.9', 'Players_TestsBatsmen2023_71', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(172, '72', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '72', 'Players_TestsBatsmen2023_72', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(173, '73', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '77.6', 'Players_TestsBatsmen2023_73', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(174, '74', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '76.7', 'Players_TestsBatsmen2023_74', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(175, '75', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '75.8', 'Players_TestsBatsmen2023_75', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(176, '76', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '74.9', 'Players_TestsBatsmen2023_76', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(177, '77', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '74', 'Players_TestsBatsmen2023_77', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(178, '78', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '73.1', 'Players_TestsBatsmen2023_78', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(179, '79', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '72.2', 'Players_TestsBatsmen2023_79', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(180, '80', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '71.3', 'Players_TestsBatsmen2023_80', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(181, '81', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '76.9', 'Players_TestsBatsmen2023_81', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(182, '82', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '76', 'Players_TestsBatsmen2023_82', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(183, '83', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '75.1', 'Players_TestsBatsmen2023_83', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(184, '84', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '74.2', 'Players_TestsBatsmen2023_84', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(185, '85', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '73.3', 'Players_TestsBatsmen2023_85', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(186, '86', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '72.4', 'Players_TestsBatsmen2023_86', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(187, '87', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '71.4', 'Players_TestsBatsmen2023_87', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(188, '88', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '70.5', 'Players_TestsBatsmen2023_88', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(189, '89', 'p00001', '', 'Steve Smith', '', 'Australia', 2, 1, '76.1', 'Players_TestsBatsmen2023_89', 'p00001', 't001', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(190, '90', 'p00002', '', 'Joe Root', '', 'England', 2, 1, '75.2', 'Players_TestsBatsmen2023_90', 'p00002', 't002', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(191, '91', 'p00003', '', 'Virat Kohli', '', 'India', 2, 1, '74.3', 'Players_TestsBatsmen2023_91', 'p00003', 't003', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(192, '92', 'p00004', '', 'Kane Williamson', '', 'New Zealand', 2, 1, '73.4', 'Players_TestsBatsmen2023_92', 'p00004', 't004', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(193, '93', 'p00005', '', 'Babar Azam', '', 'Pakistan', 2, 1, '72.5', 'Players_TestsBatsmen2023_93', 'p00005', 't005', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(194, '94', 'p00006', '', 'Tenda Bavuma', '', 'South Africa', 2, 1, '71.6', 'Players_TestsBatsmen2023_94', 'p00006', 't006', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(195, '95', 'p00007', '', 'Dasun Shanaka', '', 'Sri Lanka', 2, 1, '70.7', 'Players_TestsBatsmen2023_95', 'p00007', 't007', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(196, '96', 'p00008', '', 'Jason Holder', '', 'West Indies', 2, 1, '69.8', 'Players_TestsBatsmen2023_96', 'p00008', 't008', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(197, '97', 'p00009', '', 'Player9', '', 'Zimbabwe', 2, 1, '75.3', 'Players_TestsBatsmen2023_97', 'p00009', 't009', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(198, '98', 'p00010', '', 'Player10', '', 'Bangladesh', 2, 1, '74.5', 'Players_TestsBatsmen2023_98', 'p00010', 't010', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(199, '99', 'p00011', '', 'Player11', '', 'Afghanistan', 2, 1, '73.6', 'Players_TestsBatsmen2023_99', 'p00011', 't011', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58'),
(200, '100', 'p00012', '', 'Player12', '', 'Ireland', 2, 1, '72.7', 'Players_TestsBatsmen2023_100', 'p00012', 't012', '', 2, '2023', '', 'Tests', 'Batsmen', '2024-01-06 06:43:58', '2024-01-06 06:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `player_types`
--

CREATE TABLE `player_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_types`
--

INSERT INTO `player_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Teams', NULL, NULL),
(2, 'Batsmen', NULL, NULL),
(3, 'Bowlers', NULL, NULL),
(4, 'Fielders', NULL, NULL),
(5, 'Allrounders', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `ranking` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_flag_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matches` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `menu_type_id` bigint UNSIGNED NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `ranking`, `team_flag_link`, `team`, `points`, `matches`, `type_id`, `menu_type_id`, `ref`, `team_ref`, `year`, `month`, `format`, `created_at`, `updated_at`) VALUES
(1, '1', '', 'Australia', '85.0', '', 1, 1, 'Teams_Tests2023December_1', 't001', '2023', 'December', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(2, '2', '', 'England', '84.0', '', 1, 1, 'Teams_Tests2023December_2', 't002', '2023', 'December', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(3, '3', '', 'India', '83.0', '', 1, 1, 'Teams_Tests2023December_3', 't003', '2023', 'December', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(4, '4', '', 'New Zealand', '82.0', '', 1, 1, 'Teams_Tests2023December_4', 't004', '2023', 'December', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(5, '5', '', 'Pakistan', '81.0', '', 1, 1, 'Teams_Tests2023December_5', 't005', '2023', 'December', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(6, '6', '', 'South Africa', '80.0', '', 1, 1, 'Teams_Tests2023December_6', 't006', '2023', 'December', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(7, '7', '', 'Sri Lanka', '79.0', '', 1, 1, 'Teams_Tests2023December_7', 't007', '2023', 'December', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(8, '8', '', 'West Indies', '78.0', '', 1, 1, 'Teams_Tests2023December_8', 't008', '2023', 'December', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(9, '9', '', 'Australia', '84.2', '', 1, 1, 'Teams_Tests2023November_9', 't001', '2023', 'November', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(10, '10', '', 'England', '83.2', '', 1, 1, 'Teams_Tests2023November_10', 't002', '2023', 'November', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(11, '11', '', 'India', '82.2', '', 1, 1, 'Teams_Tests2023November_11', 't003', '2023', 'November', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(12, '12', '', 'New Zealand', '81.2', '', 1, 1, 'Teams_Tests2023November_12', 't004', '2023', 'November', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(13, '13', '', 'Pakistan', '80.2', '', 1, 1, 'Teams_Tests2023November_13', 't005', '2023', 'November', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(14, '14', '', 'South Africa', '79.2', '', 1, 1, 'Teams_Tests2023November_14', 't006', '2023', 'November', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(15, '15', '', 'Sri Lanka', '78.2', '', 1, 1, 'Teams_Tests2023November_15', 't007', '2023', 'November', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(16, '16', '', 'West Indies', '77.2', '', 1, 1, 'Teams_Tests2023November_16', 't008', '2023', 'November', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(17, '17', '', 'Australia', '83.3', '', 1, 1, 'Teams_Tests2023October_17', 't001', '2023', 'October', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(18, '18', '', 'England', '82.3', '', 1, 1, 'Teams_Tests2023October_18', 't002', '2023', 'October', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(19, '19', '', 'India', '81.3', '', 1, 1, 'Teams_Tests2023October_19', 't003', '2023', 'October', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(20, '20', '', 'New Zealand', '80.4', '', 1, 1, 'Teams_Tests2023October_20', 't004', '2023', 'October', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(21, '21', '', 'Pakistan', '79.4', '', 1, 1, 'Teams_Tests2023October_21', 't005', '2023', 'October', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(22, '22', '', 'South Africa', '78.4', '', 1, 1, 'Teams_Tests2023October_22', 't006', '2023', 'October', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(23, '23', '', 'Sri Lanka', '77.4', '', 1, 1, 'Teams_Tests2023October_23', 't007', '2023', 'October', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(24, '24', '', 'West Indies', '76.4', '', 1, 1, 'Teams_Tests2023October_24', 't008', '2023', 'October', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(25, '25', '', 'Australia', '82.5', '', 1, 1, 'Teams_Tests2023September_25', 't001', '2023', 'September', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(26, '26', '', 'England', '81.5', '', 1, 1, 'Teams_Tests2023September_26', 't002', '2023', 'September', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(27, '27', '', 'India', '80.5', '', 1, 1, 'Teams_Tests2023September_27', 't003', '2023', 'September', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(28, '28', '', 'New Zealand', '79.6', '', 1, 1, 'Teams_Tests2023September_28', 't004', '2023', 'September', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(29, '29', '', 'Pakistan', '78.6', '', 1, 1, 'Teams_Tests2023September_29', 't005', '2023', 'September', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(30, '30', '', 'South Africa', '77.6', '', 1, 1, 'Teams_Tests2023September_30', 't006', '2023', 'September', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(31, '31', '', 'Sri Lanka', '76.7', '', 1, 1, 'Teams_Tests2023September_31', 't007', '2023', 'September', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(32, '32', '', 'West Indies', '75.7', '', 1, 1, 'Teams_Tests2023September_32', 't008', '2023', 'September', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(33, '33', '', 'Australia', '81.7', '', 1, 1, 'Teams_Tests2023August_33', 't001', '2023', 'August', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(34, '34', '', 'England', '80.7', '', 1, 1, 'Teams_Tests2023August_34', 't002', '2023', 'August', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(35, '35', '', 'India', '79.7', '', 1, 1, 'Teams_Tests2023August_35', 't003', '2023', 'August', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(36, '36', '', 'New Zealand', '78.8', '', 1, 1, 'Teams_Tests2023August_36', 't004', '2023', 'August', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(37, '37', '', 'Pakistan', '77.8', '', 1, 1, 'Teams_Tests2023August_37', 't005', '2023', 'August', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(38, '38', '', 'South Africa', '76.8', '', 1, 1, 'Teams_Tests2023August_38', 't006', '2023', 'August', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(39, '39', '', 'Sri Lanka', '75.9', '', 1, 1, 'Teams_Tests2023August_39', 't007', '2023', 'August', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(40, '40', '', 'West Indies', '74.9', '', 1, 1, 'Teams_Tests2023August_40', 't008', '2023', 'August', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(41, '41', '', 'Australia', '80.8', '', 1, 1, 'Teams_Tests2023July_41', 't001', '2023', 'July', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(42, '42', '', 'England', '79.9', '', 1, 1, 'Teams_Tests2023July_42', 't002', '2023', 'July', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(43, '43', '', 'India', '78.9', '', 1, 1, 'Teams_Tests2023July_43', 't003', '2023', 'July', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(44, '44', '', 'New Zealand', '78.0', '', 1, 1, 'Teams_Tests2023July_44', 't004', '2023', 'July', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(45, '45', '', 'Pakistan', '77.0', '', 1, 1, 'Teams_Tests2023July_45', 't005', '2023', 'July', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(46, '46', '', 'South Africa', '76.1', '', 1, 1, 'Teams_Tests2023July_46', 't006', '2023', 'July', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(47, '47', '', 'Sri Lanka', '75.1', '', 1, 1, 'Teams_Tests2023July_47', 't007', '2023', 'July', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(48, '48', '', 'West Indies', '74.2', '', 1, 1, 'Teams_Tests2023July_48', 't008', '2023', 'July', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(49, '49', '', 'Australia', '80.0', '', 1, 1, 'Teams_Tests2023June_49', 't001', '2023', 'June', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(50, '50', '', 'England', '79.1', '', 1, 1, 'Teams_Tests2023June_50', 't002', '2023', 'June', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(51, '51', '', 'India', '78.1', '', 1, 1, 'Teams_Tests2023June_51', 't003', '2023', 'June', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(52, '52', '', 'New Zealand', '77.2', '', 1, 1, 'Teams_Tests2023June_52', 't004', '2023', 'June', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(53, '53', '', 'Pakistan', '76.3', '', 1, 1, 'Teams_Tests2023June_53', 't005', '2023', 'June', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(54, '54', '', 'South Africa', '75.3', '', 1, 1, 'Teams_Tests2023June_54', 't006', '2023', 'June', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(55, '55', '', 'Sri Lanka', '74.4', '', 1, 1, 'Teams_Tests2023June_55', 't007', '2023', 'June', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(56, '56', '', 'West Indies', '73.4', '', 1, 1, 'Teams_Tests2023June_56', 't008', '2023', 'June', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(57, '57', '', 'Australia', '79.2', '', 1, 1, 'Teams_Tests2023May_57', 't001', '2023', 'May', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(58, '58', '', 'England', '78.3', '', 1, 1, 'Teams_Tests2023May_58', 't002', '2023', 'May', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(59, '59', '', 'India', '77.4', '', 1, 1, 'Teams_Tests2023May_59', 't003', '2023', 'May', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(60, '60', '', 'New Zealand', '76.4', '', 1, 1, 'Teams_Tests2023May_60', 't004', '2023', 'May', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(61, '61', '', 'Pakistan', '75.5', '', 1, 1, 'Teams_Tests2023May_61', 't005', '2023', 'May', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(62, '62', '', 'South Africa', '74.6', '', 1, 1, 'Teams_Tests2023May_62', 't006', '2023', 'May', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(63, '63', '', 'Sri Lanka', '73.6', '', 1, 1, 'Teams_Tests2023May_63', 't007', '2023', 'May', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(64, '64', '', 'West Indies', '72.7', '', 1, 1, 'Teams_Tests2023May_64', 't008', '2023', 'May', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(65, '65', '', 'Australia', '78.4', '', 1, 1, 'Teams_Tests2023April_65', 't001', '2023', 'April', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(66, '66', '', 'England', '77.5', '', 1, 1, 'Teams_Tests2023April_66', 't002', '2023', 'April', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(67, '67', '', 'India', '76.6', '', 1, 1, 'Teams_Tests2023April_67', 't003', '2023', 'April', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(68, '68', '', 'New Zealand', '75.7', '', 1, 1, 'Teams_Tests2023April_68', 't004', '2023', 'April', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(69, '69', '', 'Pakistan', '74.7', '', 1, 1, 'Teams_Tests2023April_69', 't005', '2023', 'April', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(70, '70', '', 'South Africa', '73.8', '', 1, 1, 'Teams_Tests2023April_70', 't006', '2023', 'April', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(71, '71', '', 'Sri Lanka', '72.9', '', 1, 1, 'Teams_Tests2023April_71', 't007', '2023', 'April', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(72, '72', '', 'West Indies', '72.0', '', 1, 1, 'Teams_Tests2023April_72', 't008', '2023', 'April', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(73, '73', '', 'Australia', '77.6', '', 1, 1, 'Teams_Tests2023March_73', 't001', '2023', 'March', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(74, '74', '', 'England', '76.7', '', 1, 1, 'Teams_Tests2023March_74', 't002', '2023', 'March', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(75, '75', '', 'India', '75.8', '', 1, 1, 'Teams_Tests2023March_75', 't003', '2023', 'March', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(76, '76', '', 'New Zealand', '74.9', '', 1, 1, 'Teams_Tests2023March_76', 't004', '2023', 'March', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(77, '77', '', 'Pakistan', '74.0', '', 1, 1, 'Teams_Tests2023March_77', 't005', '2023', 'March', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(78, '78', '', 'South Africa', '73.1', '', 1, 1, 'Teams_Tests2023March_78', 't006', '2023', 'March', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(79, '79', '', 'Sri Lanka', '72.2', '', 1, 1, 'Teams_Tests2023March_79', 't007', '2023', 'March', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(80, '80', '', 'West Indies', '71.3', '', 1, 1, 'Teams_Tests2023March_80', 't008', '2023', 'March', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(81, '81', '', 'Australia', '76.9', '', 1, 1, 'Teams_Tests2023February_81', 't001', '2023', 'February', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(82, '82', '', 'England', '76.0', '', 1, 1, 'Teams_Tests2023February_82', 't002', '2023', 'February', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(83, '83', '', 'India', '75.1', '', 1, 1, 'Teams_Tests2023February_83', 't003', '2023', 'February', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(84, '84', '', 'New Zealand', '74.2', '', 1, 1, 'Teams_Tests2023February_84', 't004', '2023', 'February', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(85, '85', '', 'Pakistan', '73.3', '', 1, 1, 'Teams_Tests2023February_85', 't005', '2023', 'February', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(86, '86', '', 'South Africa', '72.4', '', 1, 1, 'Teams_Tests2023February_86', 't006', '2023', 'February', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(87, '87', '', 'Sri Lanka', '71.4', '', 1, 1, 'Teams_Tests2023February_87', 't007', '2023', 'February', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(88, '88', '', 'West Indies', '70.5', '', 1, 1, 'Teams_Tests2023February_88', 't008', '2023', 'February', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(89, '89', '', 'Australia', '76.1', '', 1, 1, 'Teams_Tests2023January_89', 't001', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(90, '90', '', 'England', '75.2', '', 1, 1, 'Teams_Tests2023January_90', 't002', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(91, '91', '', 'India', '74.3', '', 1, 1, 'Teams_Tests2023January_91', 't003', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(92, '92', '', 'New Zealand', '73.4', '', 1, 1, 'Teams_Tests2023January_92', 't004', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(93, '93', '', 'Pakistan', '72.5', '', 1, 1, 'Teams_Tests2023January_93', 't005', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(94, '94', '', 'South Africa', '71.6', '', 1, 1, 'Teams_Tests2023January_94', 't006', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(95, '95', '', 'Sri Lanka', '70.7', '', 1, 1, 'Teams_Tests2023January_95', 't007', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(96, '96', '', 'West Indies', '69.8', '', 1, 1, 'Teams_Tests2023January_96', 't008', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(97, '97', '', 'Zimbabwe', '75.3', '', 1, 1, 'Teams_Tests2023January_97', 't009', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(98, '98', '', 'Bangladesh', '74.5', '', 1, 1, 'Teams_Tests2023January_98', 't010', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(99, '99', '', 'Afghanistan', '73.6', '', 1, 1, 'Teams_Tests2023January_99', 't011', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(100, '100', '', 'Ireland', '72.7', '', 1, 1, 'Teams_Tests2023January_100', 't012', '2023', 'January', 'Tests', '2024-01-06 05:50:05', '2024-01-06 05:50:05'),
(101, '1', '', 'Australia', '85', '', 1, 2, 'Teams_Tests2023_00001', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(102, '2', '', 'England', '84', '', 1, 2, 'Teams_Tests2023_00002', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(103, '3', '', 'India', '83', '', 1, 2, 'Teams_Tests2023_00003', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(104, '4', '', 'New Zealand', '82', '', 1, 2, 'Teams_Tests2023_00004', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(105, '5', '', 'Pakistan', '81', '', 1, 2, 'Teams_Tests2023_00005', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(106, '6', '', 'South Africa', '80', '', 1, 2, 'Teams_Tests2023_00006', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(107, '7', '', 'Sri Lanka', '79', '', 1, 2, 'Teams_Tests2023_00007', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(108, '8', '', 'West Indies', '78', '', 1, 2, 'Teams_Tests2023_00008', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(109, '9', '', 'Australia', '84.2', '', 1, 2, 'Teams_Tests2023_00009', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(110, '10', '', 'England', '83.2', '', 1, 2, 'Teams_Tests2023_00010', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(111, '11', '', 'India', '82.2', '', 1, 2, 'Teams_Tests2023_00011', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(112, '12', '', 'New Zealand', '81.2', '', 1, 2, 'Teams_Tests2023_00012', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(113, '13', '', 'Pakistan', '80.2', '', 1, 2, 'Teams_Tests2023_00013', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(114, '14', '', 'South Africa', '79.2', '', 1, 2, 'Teams_Tests2023_00014', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(115, '15', '', 'Sri Lanka', '78.2', '', 1, 2, 'Teams_Tests2023_00015', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(116, '16', '', 'West Indies', '77.2', '', 1, 2, 'Teams_Tests2023_00016', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(117, '17', '', 'Australia', '83.3', '', 1, 2, 'Teams_Tests2023_00017', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(118, '18', '', 'England', '82.3', '', 1, 2, 'Teams_Tests2023_00018', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(119, '19', '', 'India', '81.3', '', 1, 2, 'Teams_Tests2023_00019', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(120, '20', '', 'New Zealand', '80.4', '', 1, 2, 'Teams_Tests2023_00020', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(121, '21', '', 'Pakistan', '79.4', '', 1, 2, 'Teams_Tests2023_00021', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(122, '22', '', 'South Africa', '78.4', '', 1, 2, 'Teams_Tests2023_00022', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(123, '23', '', 'Sri Lanka', '77.4', '', 1, 2, 'Teams_Tests2023_00023', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(124, '24', '', 'West Indies', '76.4', '', 1, 2, 'Teams_Tests2023_00024', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(125, '25', '', 'Australia', '82.5', '', 1, 2, 'Teams_Tests2023_00025', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(126, '26', '', 'England', '81.5', '', 1, 2, 'Teams_Tests2023_00026', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(127, '27', '', 'India', '80.5', '', 1, 2, 'Teams_Tests2023_00027', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(128, '28', '', 'New Zealand', '79.6', '', 1, 2, 'Teams_Tests2023_00028', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(129, '29', '', 'Pakistan', '78.6', '', 1, 2, 'Teams_Tests2023_00029', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(130, '30', '', 'South Africa', '77.6', '', 1, 2, 'Teams_Tests2023_00030', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(131, '31', '', 'Sri Lanka', '76.7', '', 1, 2, 'Teams_Tests2023_00031', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(132, '32', '', 'West Indies', '75.7', '', 1, 2, 'Teams_Tests2023_00032', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(133, '33', '', 'Australia', '81.7', '', 1, 2, 'Teams_Tests2023_00033', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(134, '34', '', 'England', '80.7', '', 1, 2, 'Teams_Tests2023_00034', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(135, '35', '', 'India', '79.7', '', 1, 2, 'Teams_Tests2023_00035', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(136, '36', '', 'New Zealand', '78.8', '', 1, 2, 'Teams_Tests2023_00036', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(137, '37', '', 'Pakistan', '77.8', '', 1, 2, 'Teams_Tests2023_00037', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(138, '38', '', 'South Africa', '76.8', '', 1, 2, 'Teams_Tests2023_00038', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(139, '39', '', 'Sri Lanka', '75.9', '', 1, 2, 'Teams_Tests2023_00039', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(140, '40', '', 'West Indies', '74.9', '', 1, 2, 'Teams_Tests2023_00040', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(141, '41', '', 'Australia', '80.8', '', 1, 2, 'Teams_Tests2023_00041', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(142, '42', '', 'England', '79.9', '', 1, 2, 'Teams_Tests2023_00042', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(143, '43', '', 'India', '78.9', '', 1, 2, 'Teams_Tests2023_00043', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(144, '44', '', 'New Zealand', '78', '', 1, 2, 'Teams_Tests2023_00044', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(145, '45', '', 'Pakistan', '77', '', 1, 2, 'Teams_Tests2023_00045', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(146, '46', '', 'South Africa', '76.1', '', 1, 2, 'Teams_Tests2023_00046', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(147, '47', '', 'Sri Lanka', '75.1', '', 1, 2, 'Teams_Tests2023_00047', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(148, '48', '', 'West Indies', '74.2', '', 1, 2, 'Teams_Tests2023_00048', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(149, '49', '', 'Australia', '80', '', 1, 2, 'Teams_Tests2023_00049', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(150, '50', '', 'England', '79.1', '', 1, 2, 'Teams_Tests2023_00050', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(151, '51', '', 'India', '78.1', '', 1, 2, 'Teams_Tests2023_00051', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(152, '52', '', 'New Zealand', '77.2', '', 1, 2, 'Teams_Tests2023_00052', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(153, '53', '', 'Pakistan', '76.3', '', 1, 2, 'Teams_Tests2023_00053', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(154, '54', '', 'South Africa', '75.3', '', 1, 2, 'Teams_Tests2023_00054', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(155, '55', '', 'Sri Lanka', '74.4', '', 1, 2, 'Teams_Tests2023_00055', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(156, '56', '', 'West Indies', '73.4', '', 1, 2, 'Teams_Tests2023_00056', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(157, '57', '', 'Australia', '79.2', '', 1, 2, 'Teams_Tests2023_00057', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(158, '58', '', 'England', '78.3', '', 1, 2, 'Teams_Tests2023_00058', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(159, '59', '', 'India', '77.4', '', 1, 2, 'Teams_Tests2023_00059', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(160, '60', '', 'New Zealand', '76.4', '', 1, 2, 'Teams_Tests2023_00060', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(161, '61', '', 'Pakistan', '75.5', '', 1, 2, 'Teams_Tests2023_00061', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(162, '62', '', 'South Africa', '74.6', '', 1, 2, 'Teams_Tests2023_00062', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(163, '63', '', 'Sri Lanka', '73.6', '', 1, 2, 'Teams_Tests2023_00063', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(164, '64', '', 'West Indies', '72.7', '', 1, 2, 'Teams_Tests2023_00064', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(165, '65', '', 'Australia', '78.4', '', 1, 2, 'Teams_Tests2023_00065', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(166, '66', '', 'England', '77.5', '', 1, 2, 'Teams_Tests2023_00066', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(167, '67', '', 'India', '76.6', '', 1, 2, 'Teams_Tests2023_00067', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(168, '68', '', 'New Zealand', '75.7', '', 1, 2, 'Teams_Tests2023_00068', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(169, '69', '', 'Pakistan', '74.7', '', 1, 2, 'Teams_Tests2023_00069', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(170, '70', '', 'South Africa', '73.8', '', 1, 2, 'Teams_Tests2023_00070', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(171, '71', '', 'Sri Lanka', '72.9', '', 1, 2, 'Teams_Tests2023_00071', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(172, '72', '', 'West Indies', '72', '', 1, 2, 'Teams_Tests2023_00072', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(173, '73', '', 'Australia', '77.6', '', 1, 2, 'Teams_Tests2023_00073', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(174, '74', '', 'England', '76.7', '', 1, 2, 'Teams_Tests2023_00074', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(175, '75', '', 'India', '75.8', '', 1, 2, 'Teams_Tests2023_00075', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(176, '76', '', 'New Zealand', '74.9', '', 1, 2, 'Teams_Tests2023_00076', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(177, '77', '', 'Pakistan', '74', '', 1, 2, 'Teams_Tests2023_00077', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(178, '78', '', 'South Africa', '73.1', '', 1, 2, 'Teams_Tests2023_00078', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(179, '79', '', 'Sri Lanka', '72.2', '', 1, 2, 'Teams_Tests2023_00079', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(180, '80', '', 'West Indies', '71.3', '', 1, 2, 'Teams_Tests2023_00080', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(181, '81', '', 'Australia', '76.9', '', 1, 2, 'Teams_Tests2023_00081', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(182, '82', '', 'England', '76', '', 1, 2, 'Teams_Tests2023_00082', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(183, '83', '', 'India', '75.1', '', 1, 2, 'Teams_Tests2023_00083', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(184, '84', '', 'New Zealand', '74.2', '', 1, 2, 'Teams_Tests2023_00084', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(185, '85', '', 'Pakistan', '73.3', '', 1, 2, 'Teams_Tests2023_00085', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(186, '86', '', 'South Africa', '72.4', '', 1, 2, 'Teams_Tests2023_00086', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(187, '87', '', 'Sri Lanka', '71.4', '', 1, 2, 'Teams_Tests2023_00087', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(188, '88', '', 'West Indies', '70.5', '', 1, 2, 'Teams_Tests2023_00088', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(189, '89', '', 'Australia', '76.1', '', 1, 2, 'Teams_Tests2023_00089', 't001', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(190, '90', '', 'England', '75.2', '', 1, 2, 'Teams_Tests2023_00090', 't002', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(191, '91', '', 'India', '74.3', '', 1, 2, 'Teams_Tests2023_00091', 't003', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(192, '92', '', 'New Zealand', '73.4', '', 1, 2, 'Teams_Tests2023_00092', 't004', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(193, '93', '', 'Pakistan', '72.5', '', 1, 2, 'Teams_Tests2023_00093', 't005', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(194, '94', '', 'South Africa', '71.6', '', 1, 2, 'Teams_Tests2023_00094', 't006', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(195, '95', '', 'Sri Lanka', '70.7', '', 1, 2, 'Teams_Tests2023_00095', 't007', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(196, '96', '', 'West Indies', '69.8', '', 1, 2, 'Teams_Tests2023_00096', 't008', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(197, '97', '', 'Zimbabwe', '75.3', '', 1, 2, 'Teams_Tests2023_00097', 't009', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(198, '98', '', 'Bangladesh', '74.5', '', 1, 2, 'Teams_Tests2023_00098', 't010', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(199, '99', '', 'Afghanistan', '73.6', '', 1, 2, 'Teams_Tests2023_00099', 't011', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43'),
(200, '100', '', 'Ireland', '72.7', '', 1, 2, 'Teams_Tests2023_00100', 't012', '2023', '', 'Tests', '2024-01-06 06:00:43', '2024-01-06 06:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `team_types`
--

CREATE TABLE `team_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_types`
--

INSERT INTO `team_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tests', NULL, NULL),
(2, 'One Day Internationals', NULL, NULL),
(3, 'T20 Internationals', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `extension` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `caption` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '1',
  `hash` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `context_id` int UNSIGNED NOT NULL DEFAULT '0',
  `email` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'Employee',
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `context_id`, `email`, `password`, `type`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'admin@gmail.com', '$2y$10$EFoSPuBL4Ox5Nb6XW1/tt.iLWTwfvj3knmWz/euFGVNHb5XmoF.Fy', 'admin', 'otZ55uIVSs2topxx3XiSpAtjTHUDVTTa3ClDXbwQ2QRuuUGjdg5NakxmwkRd', NULL, '2020-09-19 05:18:07', '2023-04-13 06:56:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogdetails`
--
ALTER TABLE `blogdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_player_type_id_foreign` (`player_type_id`),
  ADD KEY `players_team_type_id_foreign` (`team_type_id`),
  ADD KEY `menu_type_id_foreign` (`menu_type_id`) USING BTREE;

--
-- Indexes for table `player_types`
--
ALTER TABLE `player_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_type_id_foreign` (`type_id`),
  ADD KEY `meun_type_id_foreign` (`menu_type_id`) USING BTREE;

--
-- Indexes for table `team_types`
--
ALTER TABLE `team_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogdetails`
--
ALTER TABLE `blogdetails`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `player_types`
--
ALTER TABLE `player_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `team_types`
--
ALTER TABLE `team_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_player_type_id_foreign` FOREIGN KEY (`player_type_id`) REFERENCES `player_types` (`id`),
  ADD CONSTRAINT `players_team_type_id_foreign` FOREIGN KEY (`team_type_id`) REFERENCES `team_types` (`id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `meun_type_id_foreign` FOREIGN KEY (`menu_type_id`) REFERENCES `menu_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `teams_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `team_types` (`id`);

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
