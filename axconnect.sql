-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 04:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_numbers`
--

CREATE TABLE `assigned_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `upload_assign_numbers_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'calling',
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_numbers`
--

INSERT INTO `assigned_numbers` (`id`, `users_id`, `upload_assign_numbers_id`, `status`, `type`, `remarks`, `created_at`, `updated_at`) VALUES
(107, 10, 186, 'completed', 'booking', NULL, '2022-06-08 08:50:43', '2022-06-08 08:51:08'),
(108, 10, 187, 'cancel', 'booking', NULL, '2022-06-08 08:50:43', '2022-06-08 08:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `company_requests`
--

CREATE TABLE `company_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_requests`
--

INSERT INTO `company_requests` (`id`, `name`, `email`, `company_type`, `address`, `country_id`, `phone`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'digtandigital', 'dig@gmail.com', 'Sole Proprietorships', 'gulshan4864694', 1, '+989889898765', 'http://localhost/axconnect/public/images/company/1655391841.jpg', '1', '2022-06-16 10:04:01', '2022-06-17 10:23:33'),
(2, 'digtandigitall', 'digtan@gmail.com', 'Sole Proprietorships', NULL, 1, '+987887878765', 'http://localhost/axconnect/public/images/company/1655392238.jpg', '1', '2022-06-16 10:10:38', '2022-06-22 06:25:12'),
(3, 'digtan', 'dig1@gmail.com', 'Partnerships', NULL, 2, '+912334565467', 'http://localhost/axconnect/public/images/company/1655392565.jpg', '1', '2022-06-16 10:16:05', '2022-06-17 10:21:15'),
(4, 'systems', 'system@gmail.com', 'Sole Proprietorships', NULL, 1, '+987887667876', 'http://localhost/axconnect/public/images/company/1655392688.jpg', '0', '2022-06-16 10:18:08', '2022-06-16 10:18:08'),
(5, 'venturedive', 'venture@gmail.com', 'Corporations', NULL, 1, '+923445356789', 'http://localhost/axconnect/public/images/company/1655392792.jpg', '0', '2022-06-16 10:19:52', '2022-06-16 10:19:52'),
(6, 'salsoft', 'salsoft@gmail.com', 'Sole Proprietorships', NULL, 1, '+923445678987', 'http://localhost/axconnect/public/images/company/1655392857.jpg', '0', '2022-06-16 10:20:57', '2022-06-16 10:20:57'),
(7, 'Catcos pvt ltd', 'catcos@gmail.com', 'Corporations', NULL, 1, '+923446578898', 'http://localhost/axconnect/public/images/company/1655393278.jpg', '1', '2022-06-16 10:27:58', '2022-06-17 06:53:15'),
(9, 'MMC wolrd', 'mmc@gmail.com', 'Corporations', 'usa karachi pakistan pesharwar', 5, '+090987876542', 'http://localhost/axconnect/public/images/company/1655479014.png', '1', '2022-06-17 10:16:54', '2022-06-17 10:20:41'),
(10, 'wwe', 'wwe@gmail.com', 'Corporations', 'asdsadasdsad', 5, '+123444555', 'http://localhost/axconnect/public/images/company/1655479908.png', '1', '2022-06-17 10:31:48', '2022-06-17 10:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `short_name`, `image`, `country_code`, `created_at`, `updated_at`) VALUES
(1, 'pakistan', 'PAK', 'http://localhost/axconnect/public/images/Country/1653663513.png', '+92', '2022-05-26 06:53:52', '2022-05-27 09:58:33'),
(2, 'India', 'ind', 'http://localhost/axconnect/public/images/country/1653566102.jpg', '+91', '2022-05-26 06:55:02', '2022-05-26 06:55:02'),
(3, 'United Arab Emirates', 'uae', 'http://localhost/axconnect/public/images/country/1653566153.png', '+971', '2022-05-26 06:55:53', '2022-05-26 06:55:53'),
(5, 'USA', 'USA', 'http://localhost/axconnect/public/images/country/1654099639.png', '+1', '2022-06-01 07:28:46', '2022-06-01 11:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `dialogues`
--

CREATE TABLE `dialogues` (
  `id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `upload_assign_numbers_id` bigint(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_statuses`
--

CREATE TABLE `meeting_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_statuses`
--

INSERT INTO `meeting_statuses` (`id`, `user_id`, `lead_id`, `created_at`, `updated_at`) VALUES
(2, 10, 184, NULL, NULL),
(3, 10, 185, NULL, NULL),
(11, 11, 182, NULL, NULL),
(12, 10, 181, '2022-06-13 08:22:40', '2022-06-13 08:22:40'),
(13, 10, 182, '2022-06-13 08:30:45', '2022-06-13 08:30:45'),
(14, 10, 183, '2022-06-14 05:11:14', '2022-06-14 05:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_05_09_125747_create_user_roles_table', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(7, '2022_05_10_084159_create_upload_assign_numbers_table', 3),
(8, '2022_05_10_084544_create_assigned_numbers_table', 3),
(9, '2022_05_20_134412_create_sliders_table', 4),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(17, '2016_06_01_000003_create_oauth_refresh_tokens_table', 6),
(18, '2016_06_01_000004_create_oauth_clients_table', 6),
(19, '2016_06_01_000005_create_oauth_personal_access_clients_table', 6),
(20, '2022_05_26_102815_create_countries_table', 6),
(21, '2022_06_07_141813_create_meeting_statuses_table', 7),
(22, '2022_06_13_100857_create_notifications_table', 8),
(23, '2022_06_15_120029_create_company_requests_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0e3a240a-8f77-4761-aab6-d8d60db0bff4', 'App\\Notifications\\UserLeadNotification', 'App\\Models\\User', 1, '{\"user_id\":10,\"message\":\"suraj gupta has pushed lead to backtoassign and status is approved\"}', NULL, '2022-06-26 19:00:00', '2022-06-27 03:43:31'),
('134e845f-484e-4430-95f0-4904d264b5ad', 'App\\Notifications\\UserLeadNotification', 'App\\Models\\User', 1, '{\"user_id\":10,\"message\":\"suraj gupta has pushed lead to meeting and status is approved\"}', '2022-06-28 10:40:20', '2022-06-27 19:00:00', '2022-06-28 10:40:20'),
('34c96d72-b656-48bb-a1c8-ffefbc87552d', 'App\\Notifications\\UserLeadNotification', 'App\\Models\\User', 1, '{\"user_id\":10,\"message\":\"suraj gupta has pushed lead to leads and status is approved\"}', NULL, '2022-06-27 19:00:00', '2022-06-28 10:11:32'),
('ac4eb2f2-88e5-4915-9191-0711d416d2f5', 'App\\Notifications\\UserLeadNotification', 'App\\Models\\User', 1, '{\"user_id\":10,\"message\":\"suraj gupta has pushed lead to backtoassign and status is approved\"}', NULL, '2022-06-27 19:00:00', '2022-06-27 03:43:26'),
('edc328e6-93f9-421e-a623-d72dc054b5d7', 'App\\Notifications\\UserLeadNotification', 'App\\Models\\User', 1, '{\"user_id\":10,\"message\":\"suraj gupta has pushed lead to backtoassign and status is approved\"}', '2022-06-28 10:35:13', '2022-06-27 19:00:00', '2022-06-28 10:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `otp`, `created_at`) VALUES
('suraj@gmail.com', '$2y$10$zBU9k.uKV3K0utc7xExsBuwhC9/tcndVFxjjdTJVColxi8UMBDAHK', NULL, '2022-05-19 09:00:03'),
('chandan@gmail.com', '$2y$10$45eSfZHq97dKVaucvBztee.uq9Qg/v6RcHdAoMruX6/OIC0udC8PC', NULL, '2022-05-19 09:24:26'),
('admin@admin.com', '$2y$10$ZV11jZnWYzwWuvfO48YFs.ABkD1ff9XAIZJvKERDg4PW9KC/lDlge', '9963', '2022-05-21 10:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '6ab2295f4d4385b5c9a71eb9657fa91dc0ef54e51b3c0b8ac51ec635335405c5', '[\"*\"]', NULL, '2022-05-19 06:24:46', '2022-05-19 06:24:46'),
(5, 'App\\Models\\User', 1, 'auth_token', '69e823e4437226d75d9a0b0d9bdeb3e22e2dc552017502e653a51a77de3d01fe', '[\"*\"]', NULL, '2022-05-20 14:14:08', '2022-05-20 14:14:08'),
(6, 'App\\Models\\User', 1, 'auth_token', '38c2c7a04cd661b58afefa65939d6449d4fa65a9187dc5e40aba320f30637b85', '[\"*\"]', NULL, '2022-05-21 04:28:29', '2022-05-21 04:28:29'),
(7, 'App\\Models\\User', 1, 'auth_token', '2bcc97375e6b3048bb9e7f163f32ba08302552e1bfa18fab7af95725580fe7b0', '[\"*\"]', NULL, '2022-05-21 04:47:35', '2022-05-21 04:47:35'),
(8, 'App\\Models\\User', 1, 'auth_token', '205d31d766d2bd2d11db5af1caa6e6c7e2f26f7b6113f88af5f704a7b458bf8d', '[\"*\"]', '2022-05-21 08:29:18', '2022-05-21 05:18:56', '2022-05-21 08:29:18'),
(9, 'App\\Models\\User', 1, 'auth_token', '4feac6baa8c53a0360cf2852aa3c054f73c1204a8e6bcd4dc0d1d62f0b015de6', '[\"*\"]', '2022-05-21 10:55:10', '2022-05-21 05:27:40', '2022-05-21 10:55:10'),
(10, 'App\\Models\\User', 1, 'auth_token', '05a68bb68e8a832a7e0c9d17a8ae09539c0d445070350efeeb741f033113c1ff', '[\"*\"]', NULL, '2022-05-21 05:42:11', '2022-05-21 05:42:11'),
(11, 'App\\Models\\User', 1, 'auth_token', 'ade784c1c89bb873311c9182d45cc57091278ee7c8538a85eda1b19cd8bbc003', '[\"*\"]', '2022-06-14 04:46:14', '2022-05-21 08:36:17', '2022-06-14 04:46:14'),
(12, 'App\\Models\\User', 1, 'auth_token', 'ba615e808c0206513a40490b21187b6857b587a4ebb018573b4089594001ddf3', '[\"*\"]', NULL, '2022-05-23 02:41:19', '2022-05-23 02:41:19'),
(13, 'App\\Models\\User', 1, 'auth_token', '1e095f6c6b0d536ac53dde585fdeeb25cf57e3b3ad1203dc0d5e99ffa7ea6831', '[\"*\"]', '2022-05-25 09:19:08', '2022-05-23 10:24:37', '2022-05-25 09:19:08'),
(14, 'App\\Models\\User', 1, 'auth_token', '4f19c5efd00be3119472d2b4ecbf117c9e2e64fbf29dfcc5203d36df84db0396', '[\"*\"]', NULL, '2022-05-25 05:35:20', '2022-05-25 05:35:20'),
(15, 'App\\Models\\User', 1, 'auth_token', '2ac81efb58d5ca58b69da181712f60127fd6c374cd947845cf45f20fab9762c8', '[\"*\"]', '2022-05-25 09:10:03', '2022-05-25 06:40:19', '2022-05-25 09:10:03'),
(16, 'App\\Models\\User', 1, 'auth_token', '8db37a7d6f4e85d94e0fa56887fb6ebc055f420db29ba0c930826ff9bb0b9138', '[\"*\"]', '2022-05-27 04:32:40', '2022-05-26 10:01:23', '2022-05-27 04:32:40'),
(17, 'App\\Models\\User', 10, 'auth_token', '623d6ecade8691850da5cf3592d76f9a7c32996df149d1c70fec7d61f3f82aba', '[\"*\"]', NULL, '2022-06-13 05:38:29', '2022-06-13 05:38:29'),
(18, 'App\\Models\\User', 10, 'auth_token', 'fb8d1ddd3115de709b3892b082ff9812acb360da653144798e88c0c944659c12', '[\"*\"]', NULL, '2022-06-13 08:17:16', '2022-06-13 08:17:16'),
(19, 'App\\Models\\User', 10, 'auth_token', '82d0622a691f274a90fbdb3ad9a49cb42eb603376e54bc24cfabe33dc9954eae', '[\"*\"]', NULL, '2022-06-14 04:47:30', '2022-06-14 04:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `images`, `path`, `status`, `created_at`, `updated_at`) VALUES
(1, '1653989352.jpg', 'C:\\xampp\\htdocs\\axconnect/public/images/slider/1653989352.jpg', 1, '2022-05-20 11:24:56', '2022-05-31 04:29:12'),
(4, '1653064596.jpg', NULL, 1, '2022-05-20 11:36:36', '2022-05-20 11:36:36'),
(5, '1653064714.jpg', NULL, 1, '2022-05-20 11:38:34', '2022-05-20 11:38:34'),
(6, '1653064821.jpg', NULL, 1, '2022-05-20 11:40:21', '2022-05-20 11:40:21'),
(7, '1653480515.jpg', 'C:\\xampp\\htdocs\\axconnect\\public\\/images/slider/1653480515.jpg', 1, '2022-05-25 06:10:37', '2022-05-25 07:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `upload_assign_numbers`
--

CREATE TABLE `upload_assign_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_assign_numbers`
--

INSERT INTO `upload_assign_numbers` (`id`, `name`, `phone`, `mobile`, `email`, `address`, `status`, `country_code`, `date`, `created_at`, `updated_at`) VALUES
(179, 'Shahrukh', '+923211234567', '+923211234567', 'Shahrukh@gmail.com', 'Meri Gali No 5, New york City, USA', 1, '+92', '06/08/22', '2022-06-08 08:50:26', '2022-06-08 08:51:17'),
(180, 'Abbas', '+923211234567', '+923211234567', 'Abbas@gmail.com', 'Meri Gali No 5, New york City, USA', 1, '+92', '06/08/22', '2022-06-08 08:50:26', '2022-06-13 07:15:50'),
(181, 'Farhan', '+923211234567', '+923211234567', 'Farhan@gmail.com', 'Meri Gali No 5, New york City, USA', 1, '+92', '06/08/22', '2022-06-08 08:50:26', '2022-06-13 08:29:43'),
(182, 'Hamza', '+913211234567', '+913211234567', 'Hamza@gmail.com', 'Meri Gali No 5, New york City, USA', 1, '+91', '06/08/22', '2022-06-08 08:50:26', '2022-06-13 08:36:31'),
(183, 'Mohit', '+913211234567', '+913211234567', 'Mohit@gmail.com', 'Meri Gali No 5, New york City, USA', 1, '+91', '06/08/22', '2022-06-08 08:50:26', '2022-06-14 05:11:41'),
(184, 'Amar', '+913211234567', '+913211234567', 'Amar@gmail.com', 'Meri Gali No 5, New york City, USA', 1, '+91', '06/08/22', '2022-06-08 08:50:26', '2022-06-14 05:49:32'),
(185, 'Rashid', '+9713211234567', '+9713211234567', 'Rashid@gmail.com', 'Meri Gali No 5, New york City, USA', 1, '+971', '06/08/22', '2022-06-08 08:50:26', '2022-06-14 07:38:50'),
(186, 'Ahsan', '+9713211234567', '+9713211234567', 'Ahsan@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+971', '06/08/22', '2022-06-08 08:50:26', '2022-06-08 08:50:43'),
(187, 'Arsalan', '+9713211234567', '+9713211234567', 'Arsalan@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+971', '06/08/22', '2022-06-08 08:50:26', '2022-06-08 08:50:43'),
(188, 'Shahrukh', '+923211234567', '+923211234567', 'Shahrukh@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+92', '06/23/22', '2022-06-23 07:20:21', '2022-06-23 07:20:21'),
(189, 'Abbas', '+923211234567', '+923211234567', 'Abbas@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+92', '06/23/22', '2022-06-23 07:20:21', '2022-06-23 07:20:21'),
(190, 'Farhan', '+923211234567', '+923211234567', 'Farhan@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+92', '06/23/22', '2022-06-23 07:20:21', '2022-06-23 07:20:21'),
(191, 'Hamza', '+913211234567', '+913211234567', 'Hamza@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+91', '06/23/22', '2022-06-23 07:20:21', '2022-06-23 07:20:21'),
(192, 'Mohit', '+913211234567', '+913211234567', 'Mohit@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+91', '06/23/22', '2022-06-23 07:20:21', '2022-06-23 07:20:21'),
(193, 'Amar', '+913211234567', '+913211234567', 'Amar@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+91', '06/23/22', '2022-06-23 07:20:21', '2022-06-23 07:20:21'),
(194, 'Rashid', '+9713211234567', '+9713211234567', 'Rashid@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+971', '06/23/22', '2022-06-23 07:20:21', '2022-06-23 07:20:21'),
(195, 'Ahsan', '+9713211234567', '+9713211234567', 'Ahsan@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+971', '06/23/22', '2022-06-23 07:20:21', '2022-06-23 07:20:21'),
(196, 'Arsalan', '+9713211234567', '+9713211234567', 'Arsalan@gmail.com', 'Meri Gali No 5, New york City, USA', 0, '+971', '06/23/22', '2022-06-23 07:20:21', '2022-06-23 07:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `linemanager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin_id`, `name`, `role_id`, `country_id`, `linemanager_id`, `phone`, `address`, `image`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', 1, 1, 1, '+090078601', 'r580/2', 'http://localhost/axconnect/public/images/profile/1655282818.jpg', 'admin', 'admin@admin.com', NULL, '$2y$10$5Jhl1IIb9nR1Iwb8ruYn9.W3ybNWy.TVb3uHFdcqhI6fFJXjsEl2a', NULL, '2022-05-13 09:31:39', '2022-06-15 03:46:58'),
(10, 1, 'suraj gupta', 2, 0, 1, '098765544', 'r580/2 , karachi', NULL, 'suraj1', 'suraj@gmail.com', NULL, '$2y$10$5Jhl1IIb9nR1Iwb8ruYn9.W3ybNWy.TVb3uHFdcqhI6fFJXjsEl2a', NULL, '2022-05-13 10:22:37', '2022-05-13 10:22:37'),
(11, 1, 'chandan', 3, 0, 10, '342343', 'a/343', NULL, 'chandan1', 'chandan@gmail.com', NULL, '$2y$10$jBD/Je2VdsDuQp91he1GEuIOC9Hj.J/mrDmQO9MZkNR0HzvRfSr8y', NULL, '2022-05-16 06:57:18', '2022-05-16 06:57:18'),
(12, 1, 'jafer', 5, 0, 11, '5435343', 'l/43', NULL, 'jafer1', 'jafer@gmail.com', NULL, '$2y$10$CBgt370IeKU88DoMOhE36.CiBqOEbo9OUBhXhv4ka.zOyI13d3G2O', NULL, '2022-05-16 07:01:32', '2022-05-20 08:42:05'),
(13, 1, 'sonal', 5, 0, 11, '432432', 'g/43', NULL, 'sonal1', 'sonal@gmail.com', NULL, '$2y$10$Q1P1WM/SmzIuAY4AgEZcaO.W3B1ZAcpvBmNVbEl0AWsTGzr0u1dDa', NULL, '2022-05-16 07:02:07', '2022-05-16 07:02:07'),
(14, 1, 'leena', 5, 0, 11, '2345322', 'g/42', NULL, 'leena1', 'leena@gmail.com', NULL, '$2y$10$YI0JiHRTTcaNoTFbieGbB.EPYQu4BrCpFJasJRrNO/uIIhrH8qloS', NULL, '2022-05-16 07:02:39', '2022-05-16 07:02:39'),
(15, 1, 'rehan', 6, 0, 12, '989876787', 'i/25', NULL, 'rehan1', 'rehan@gmail.com', NULL, '$2y$10$XAVawRITMPORZO6GTQ5pTO9p/KuwDBuwdm3jzqs/YRrXQRTPW.7Mu', NULL, '2022-05-16 07:03:09', '2022-05-16 07:03:09'),
(16, 1, 'sana', 6, 0, 12, '7384329', 'k/43', NULL, 'sana1', 'sana@gmail.com', NULL, '$2y$10$Mu647LbdtRSxg35.mWovS.Wq/VB1CS0JsWiftVEwgH4S3tJoTgh7K', NULL, '2022-05-16 07:04:58', '2022-05-16 07:04:58'),
(17, 1, 'alden', 6, 0, 12, '848529', 'e/54', NULL, 'alden1', 'alden@gmail.com', NULL, '$2y$10$DtQxPaHsNsnVXSIKVzPFFOjUTJN0XZzUMfGPwQ2rXpLQ5QFZLmeny', NULL, '2022-05-16 07:05:58', '2022-05-16 07:05:58'),
(18, 1, 'kajal', 6, 0, 12, '978343', 'f/54', NULL, 'kajal1', 'kajal@gmail.com', NULL, '$2y$10$CVIGwptHP7ArFw5T6mDjtuIS4EezqkTvtTb/NXeXDxMciUE61KKFy', NULL, '2022-05-16 07:06:37', '2022-05-16 07:06:37'),
(19, 1, 'saamla', 6, 0, 12, '8342890', 'e/23', NULL, 'saamla1', 'saamla@gmail.com', NULL, '$2y$10$OJDNbjCScRfMYtKUhS4w1e50osWGNhPNfkJ2ciXsWBAZP1uC3g5gy', NULL, '2022-05-16 07:07:07', '2022-05-16 07:07:07'),
(20, 1, 'angila', 6, 0, 12, '2389249', 'l/44', NULL, 'angila1', 'angila@gmail.com', NULL, '$2y$10$7UetD.j/dwneVkvwZLAtNefgffWISENsTN9Id02p79smC1Y.MK0sO', NULL, '2022-05-16 07:07:37', '2022-05-16 07:07:37'),
(21, 1, 'azhar', 6, 0, 12, '989390', 'd/343', NULL, 'azhar1', 'azhar@gmail.com', NULL, '$2y$10$sC1Ly1LK4RNhSWwWRs2gTuihlUQP13c1CvNitNrzSHe6TWD1F.jcK', NULL, '2022-05-16 07:08:06', '2022-05-16 07:08:06'),
(22, 1, 'umair', 6, 0, 13, '3243231', 'j/989', NULL, 'umair1', 'umair@gmail.com', NULL, '$2y$10$vxPsrkrLFRuSuaXt9n40seSJiLK5yNdtnHajLcOlSBRNAfjS8uzfO', NULL, '2022-05-16 07:08:37', '2022-05-16 07:08:37'),
(23, 1, 'shuraim', 6, 0, 13, '7838499', 'f/6789', NULL, 'shuraim1', 'shuraim@gmail.com', NULL, '$2y$10$gpRrB1kPsbex7ooBwEz68uPhbylj.zNrzE4Nt0lbt4hHgmVAeNu5u', NULL, '2022-05-16 07:09:26', '2022-05-16 07:09:26'),
(24, 1, 'raveena', 6, 0, 13, '3748329', 'a/42', NULL, 'raveena1', 'raveena@gmail.com', NULL, '$2y$10$D7Z4lXWAl8ePccYeHmYgJ.yBYyaCqrapHglCiENPMjoudzJuXHkPG', NULL, '2022-05-16 07:10:04', '2022-05-16 07:10:04'),
(25, 1, 'aniket', 6, 0, 13, '3422489', 't/342', NULL, 'aniket1', 'aniket@gmail.com', NULL, '$2y$10$y1n0HA3jsGQ9Osz57pWe0.xXvlZJHjxNaQkzMoARXHi75Yn3FFKOO', NULL, '2022-05-16 07:10:39', '2022-05-16 07:10:39'),
(26, 1, 'manjunder', 6, 0, 13, '934829', 'h/324', NULL, 'manjunder1', 'manjunder@gmail.com', NULL, '$2y$10$E8AgkcMznvCJiOC2GUgOruQVrnjvQJdb419cJASF2PboI6jADWEBe', NULL, '2022-05-16 07:11:13', '2022-05-16 07:11:13'),
(27, 1, 'khushi', 6, 0, 14, '394792', 'r/32', NULL, 'khushi1', 'khushi@gmail.com', NULL, '$2y$10$BRp.QjXHX8wm4DJ/PeWSL.yGQTA3.kAPfulcfJB3gF7vfYbAFe02a', NULL, '2022-05-16 07:11:59', '2022-05-16 07:11:59'),
(28, 0, 'guru', 6, 0, 14, '9374990', 'a/453', NULL, 'guru1', 'guru@gmail.com', NULL, '$2y$10$XSWMrlWfQ81xIkFxkkQ6JeFM9Okenrk4/20UKGlTLeBp6D6dd00eW', NULL, '2022-05-16 07:12:27', '2022-05-16 07:12:27'),
(29, 1, 'abdul', 6, 0, NULL, '+98776545643', 'j/43', NULL, 'abdul1', 'abdul@gmail.com', NULL, '$2y$10$UONn8HUnFM84q4CxZ0XCZubVLqbaOSoSbV2J0GE9OBzr2FbOuxWR.', NULL, '2022-05-16 07:12:58', '2022-06-20 07:21:54'),
(30, 0, 'samiuddin', 6, 0, 14, '4234232', 'd/879', NULL, 'samiuddin1', 'samiuddin@gmail.com', NULL, '$2y$10$J1BtkWTVwYFIPr5HZbGfLu0Yd55ctyKKuFKC8JbiLsdRXevht.pFK', NULL, '2022-05-16 07:13:28', '2022-05-16 07:13:28'),
(31, 0, 'khushboo', 6, 0, 14, '43414', 'e/343', NULL, 'khushboo1', 'khushboo@gmail.com', NULL, '$2y$10$2FE2wEsKuEUf/bO29mEzBOHKRagr5No47Ld.0pYcUPKiBagobK95a', NULL, '2022-05-16 07:13:50', '2022-05-16 07:13:50'),
(32, 1, 'arsalan', 2, 0, 1, '098999999999', 'r580/2', NULL, 'arsalan01', 'arsalan@gmail.com', NULL, '$2y$10$5vA8w7qJBrubRA9QROQS0ugQrdJXFYRUuRqpnDRfmjBk7bhl0a8ce', NULL, '2022-05-16 07:19:44', '2022-05-16 07:19:44'),
(33, 0, 'mohit', 6, 0, 14, '3423423', 'a/32', NULL, 'mk', 'mk98@gmail.com', NULL, '$2y$10$K8wl2/p8.OY0TmzQiJHd0udnUWnZPlW5Yhgn5OX4kTOcoJlpMbF2e', NULL, '2022-05-16 08:28:36', '2022-05-16 08:28:36'),
(34, 1, 'ghulam Rassol', 2, 0, 10, '987654321', 'sdasdasd', NULL, 'admin@admin.com', 'hui@gmail.com', NULL, '$2y$10$72ufGac2m/BpoQMK4w5Jje8AvMnPt2ulPn2D.3Tssz70b/xP87iuq', NULL, '2022-05-18 10:22:16', '2022-05-18 10:22:16'),
(35, 1, 'ghulam Rassol1', 6, 2, 10, '+923442464509', 'andheri gali', '1653903657.jpg', 'ghulam1', 'ghulam@gmail.com', NULL, '$2y$10$0ZJoRB1/WYVeURVXRXTWo.bN0dhZQmhlRrVkcQRxnPYFFL/3oco5S', NULL, '2022-05-30 04:40:57', '2022-05-30 04:40:57'),
(36, 0, 'haziq', 6, 1, 24, '++923442464509', 'aufheaifohifoh', NULL, 'haziq1', 'haziq@gmail.com', NULL, '$2y$10$lfLJTarp6tl1ygXoRSE/IeFhg2oFDlTrAVMvMng162yVb85wRtdwS', NULL, '2022-05-31 10:01:18', '2022-05-31 10:01:18'),
(37, 1, 'syed abbas jaffri', 6, 1, 12, '+923442464508', NULL, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_n8S7xL7Dj4kwLdYSN_Yg5Sut25gIoEqWCQ&usqp=CAU', 'abbas1', 'abbas1@gmail.com', NULL, '$2y$10$0HbAwWAgMbg42y6.TFgBluSSrtoa9GHcmOdVKrl7lQVOtBxT4lwki', NULL, '2022-06-02 05:33:37', '2022-06-02 05:33:37'),
(38, 0, 'superadmin', 11, 1, NULL, '+923445498790', 'asaas', 'http://localhost/axconnect/public/images/profile/1655971546.png', 'superadmin', 'superadmin@superadmin.com', NULL, '$2y$10$LJc44z5wY3DavIJ5ovPp5uZTM1j4ojYXEUwwOmTLsw5OSvcAQzEbO', NULL, '2022-06-15 06:05:54', '2022-06-23 03:05:46'),
(39, 0, 'Catcos pvt ltd', 1, 1, NULL, '+923446578898', NULL, 'http://localhost/axconnect/public/images/company/1655393278.jpg', 'catcos01', 'catcos@gmail.com', NULL, '$2y$10$zV43l4gvaYsalGLH3aS76uf3BXC2DnqKv5x2FSRCSSQly/KrmEK0K', NULL, '2022-06-17 06:53:15', '2022-06-17 06:53:15'),
(40, 0, 'MMC wolrd', 1, 5, NULL, '+090987876542', 'usa karachi pakistan pesharwar', 'http://localhost/axconnect/public/images/company/1655479014.png', 'mmc002', 'mmc@gmail.com', NULL, '$2y$10$E8PZhhSrACE1ihVf1LJASO8oG.D54uWPTCYRldZKDcDKBZ95r1RPm', NULL, '2022-06-17 10:20:41', '2022-06-17 10:20:41'),
(41, 0, 'digtan', 1, 2, NULL, '+912334565467', NULL, 'http://localhost/axconnect/public/images/company/1655392565.jpg', 'digtan001', 'dig1@gmail.com', NULL, '$2y$10$swBu5FpidJMwgxk667Wljuvil6a2aEF8OVPyNqeBD.GOJ2emvwlaq', NULL, '2022-06-17 10:21:15', '2022-06-17 10:21:15'),
(42, 0, 'digtandigital', 1, 1, NULL, '+989889898765', 'gulshan4864694', 'http://localhost/axconnect/public/images/company/1655391841.jpg', 'leap360', 'dig@gmail.com', NULL, '$2y$10$wLXSgECKYwJPyk2w2Jc8LOPrHrsQR12G8U7Bbx5HdduYHzCZXhkNm', NULL, '2022-06-17 10:23:33', '2022-06-17 10:23:33'),
(43, 0, 'wwe', 1, 5, NULL, '+123444555', 'asdsadasdsad', 'http://localhost/axconnect/public/images/company/1655479908.png', 'wwe1', 'wwe@gmail.com', NULL, '$2y$10$l48iTcFkTXak7qh39ydQZexKE3sorgYlb/qw29hwfThl.fElkwGVm', NULL, '2022-06-17 10:32:19', '2022-06-17 10:32:19'),
(44, 0, 'king', 3, 1, NULL, '+926678766363', 'orangi and korangi town', NULL, 'king', 'king@king.com', NULL, '$2y$10$a/cG6pAO6Uh.xD4mh0xINuIUCZgtIR17JrDbO93R7JmJ7YL8Mulqe', NULL, '2022-06-22 04:01:43', '2022-06-22 04:01:43'),
(45, 0, 'digtandigitall', 1, 1, NULL, '+987887878765', NULL, 'http://localhost/axconnect/public/images/company/1655392238.jpg', 'shapater', 'digtan@gmail.com', NULL, '$2y$10$mDhZUXKh5kzMzR7X6c8/6Op.MEeuSzObjiBPqnMAl/x0WLNTErNFK', NULL, '2022-06-22 06:25:12', '2022-06-22 06:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-05-12 19:00:00', '2022-05-12 19:00:00'),
(2, 'IT Manager', '2022-05-10 04:18:07', '2022-05-10 04:18:07'),
(3, 'Sales Manager', '2022-05-10 04:18:16', '2022-05-10 04:18:16'),
(4, 'Sub Manager', '2022-05-10 04:18:27', '2022-05-10 04:18:27'),
(5, 'Team Leader', '2022-05-10 04:20:55', '2022-05-10 04:20:55'),
(6, 'Sales Executive', '2022-05-10 04:27:19', '2022-05-10 04:27:19'),
(7, 'CEO', '2022-05-10 04:17:32', '2022-05-10 04:17:32'),
(10, 'Office Girl', '2022-05-16 09:30:00', '2022-05-16 10:32:59'),
(11, 'SuperAdmin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_numbers`
--
ALTER TABLE `assigned_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_numbers_users_id_foreign` (`users_id`),
  ADD KEY `assigned_numbers_upload_assign_numbers_id_foreign` (`upload_assign_numbers_id`);

--
-- Indexes for table `company_requests`
--
ALTER TABLE `company_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_requests_country_id_foreign` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dialogues`
--
ALTER TABLE `dialogues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `meeting_statuses`
--
ALTER TABLE `meeting_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_statuses_user_id_foreign` (`user_id`),
  ADD KEY `meeting_statuses_lead_id_foreign` (`lead_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_assign_numbers`
--
ALTER TABLE `upload_assign_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_linemanager_id_foreign` (`linemanager_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_numbers`
--
ALTER TABLE `assigned_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `company_requests`
--
ALTER TABLE `company_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dialogues`
--
ALTER TABLE `dialogues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_statuses`
--
ALTER TABLE `meeting_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `upload_assign_numbers`
--
ALTER TABLE `upload_assign_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_numbers`
--
ALTER TABLE `assigned_numbers`
  ADD CONSTRAINT `assigned_numbers_upload_assign_numbers_id_foreign` FOREIGN KEY (`upload_assign_numbers_id`) REFERENCES `upload_assign_numbers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assigned_numbers_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_requests`
--
ALTER TABLE `company_requests`
  ADD CONSTRAINT `company_requests_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meeting_statuses`
--
ALTER TABLE `meeting_statuses`
  ADD CONSTRAINT `meeting_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
