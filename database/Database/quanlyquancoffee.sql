-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 08:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyquancoffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `sub_name`, `created_at`, `updated_at`) VALUES
(1, 'Khu vực 1', '2021-12-20 21:58:49', '2021-12-20 21:58:49'),
(2, 'Khu vực 2', '2021-12-20 21:59:06', '2021-12-20 21:59:06'),
(3, 'Khu vực 3', '2021-12-20 21:59:22', '2021-12-20 21:59:22'),
(4, 'Khu vực 4', '2021-12-20 21:59:30', '2021-12-20 21:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `date`, `user_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(28, '2021-12-20', 2, 4, '2021-12-20 22:14:07', '2021-12-20 22:14:07'),
(29, '2021-12-20', 3, 4, '2021-12-20 22:14:07', '2021-12-20 22:14:07'),
(30, '2021-12-20', 4, 4, '2021-12-20 22:14:07', '2021-12-20 22:14:07'),
(31, '2021-12-20', 2, 5, '2021-12-20 22:14:10', '2021-12-20 22:14:10'),
(32, '2021-12-20', 3, 5, '2021-12-20 22:14:10', '2021-12-20 22:14:10'),
(33, '2021-12-20', 4, 5, '2021-12-20 22:14:10', '2021-12-20 22:14:10'),
(34, '2021-12-20', 2, 6, '2021-12-20 22:14:12', '2021-12-20 22:14:12'),
(35, '2021-12-20', 3, 6, '2021-12-20 22:14:12', '2021-12-20 22:14:12'),
(36, '2021-12-20', 4, 6, '2021-12-20 22:14:12', '2021-12-20 22:14:12'),
(37, '2021-12-21', 2, 4, '2021-12-20 22:14:17', '2021-12-20 22:14:17'),
(38, '2021-12-21', 3, 4, '2021-12-20 22:14:17', '2021-12-20 22:14:17'),
(39, '2021-12-21', 4, 4, '2021-12-20 22:14:17', '2021-12-20 22:14:17'),
(40, '2021-12-21', 2, 5, '2021-12-20 22:14:20', '2021-12-20 22:14:20'),
(41, '2021-12-21', 3, 5, '2021-12-20 22:14:20', '2021-12-20 22:14:20'),
(42, '2021-12-21', 4, 5, '2021-12-20 22:14:20', '2021-12-20 22:14:20'),
(43, '2021-12-21', 2, 6, '2021-12-20 22:14:22', '2021-12-20 22:14:22'),
(44, '2021-12-21', 3, 6, '2021-12-20 22:14:22', '2021-12-20 22:14:22'),
(45, '2021-12-21', 4, 6, '2021-12-20 22:14:22', '2021-12-20 22:14:22'),
(46, '2021-12-22', 2, 4, '2021-12-20 22:14:28', '2021-12-20 22:14:28'),
(47, '2021-12-22', 3, 4, '2021-12-20 22:14:28', '2021-12-20 22:14:28'),
(48, '2021-12-22', 4, 4, '2021-12-20 22:14:28', '2021-12-20 22:14:28'),
(49, '2021-12-22', 2, 5, '2021-12-20 22:14:30', '2021-12-20 22:14:30'),
(50, '2021-12-22', 3, 5, '2021-12-20 22:14:30', '2021-12-20 22:14:30'),
(51, '2021-12-22', 4, 5, '2021-12-20 22:14:30', '2021-12-20 22:14:30'),
(52, '2021-12-22', 2, 6, '2021-12-20 22:14:34', '2021-12-20 22:14:34'),
(53, '2021-12-22', 3, 6, '2021-12-20 22:14:34', '2021-12-20 22:14:34'),
(54, '2021-12-22', 4, 6, '2021-12-20 22:14:34', '2021-12-20 22:14:34'),
(55, '2021-12-23', 2, 6, '2021-12-20 22:14:38', '2021-12-20 22:14:38'),
(56, '2021-12-23', 3, 6, '2021-12-20 22:14:38', '2021-12-20 22:14:38'),
(57, '2021-12-23', 4, 6, '2021-12-20 22:14:38', '2021-12-20 22:14:38'),
(58, '2021-12-23', 2, 5, '2021-12-20 22:14:40', '2021-12-20 22:14:40'),
(59, '2021-12-23', 3, 5, '2021-12-20 22:14:40', '2021-12-20 22:14:40'),
(60, '2021-12-23', 4, 5, '2021-12-20 22:14:40', '2021-12-20 22:14:40'),
(61, '2021-12-23', 2, 4, '2021-12-20 22:14:42', '2021-12-20 22:14:42'),
(62, '2021-12-23', 3, 4, '2021-12-20 22:14:42', '2021-12-20 22:14:42'),
(63, '2021-12-23', 4, 4, '2021-12-20 22:14:42', '2021-12-20 22:14:42'),
(64, '2021-12-24', 2, 4, '2021-12-20 22:14:47', '2021-12-20 22:14:47'),
(65, '2021-12-24', 3, 4, '2021-12-20 22:14:47', '2021-12-20 22:14:47'),
(66, '2021-12-24', 4, 4, '2021-12-20 22:14:47', '2021-12-20 22:14:47'),
(67, '2021-12-24', 2, 5, '2021-12-20 22:14:50', '2021-12-20 22:14:50'),
(68, '2021-12-24', 3, 5, '2021-12-20 22:14:50', '2021-12-20 22:14:50'),
(69, '2021-12-24', 4, 5, '2021-12-20 22:14:50', '2021-12-20 22:14:50'),
(70, '2021-12-24', 2, 6, '2021-12-20 22:14:53', '2021-12-20 22:14:53'),
(71, '2021-12-24', 3, 6, '2021-12-20 22:14:53', '2021-12-20 22:14:53'),
(72, '2021-12-24', 4, 6, '2021-12-20 22:14:53', '2021-12-20 22:14:53'),
(73, '2021-12-25', 2, 6, '2021-12-20 22:14:58', '2021-12-20 22:14:58'),
(74, '2021-12-25', 3, 6, '2021-12-20 22:14:58', '2021-12-20 22:14:58'),
(75, '2021-12-25', 4, 6, '2021-12-20 22:14:58', '2021-12-20 22:14:58'),
(76, '2021-12-25', 2, 5, '2021-12-20 22:15:00', '2021-12-20 22:15:00'),
(77, '2021-12-25', 3, 5, '2021-12-20 22:15:00', '2021-12-20 22:15:00'),
(78, '2021-12-25', 4, 5, '2021-12-20 22:15:00', '2021-12-20 22:15:00'),
(79, '2021-12-25', 2, 4, '2021-12-20 22:15:02', '2021-12-20 22:15:02'),
(80, '2021-12-25', 3, 4, '2021-12-20 22:15:02', '2021-12-20 22:15:02'),
(81, '2021-12-25', 4, 4, '2021-12-20 22:15:02', '2021-12-20 22:15:02'),
(82, '2021-12-26', 2, 4, '2021-12-20 22:15:07', '2021-12-20 22:15:07'),
(83, '2021-12-26', 3, 4, '2021-12-20 22:15:07', '2021-12-20 22:15:07'),
(84, '2021-12-26', 4, 4, '2021-12-20 22:15:07', '2021-12-20 22:15:07'),
(85, '2021-12-26', 2, 5, '2021-12-20 22:15:09', '2021-12-20 22:15:09'),
(86, '2021-12-26', 3, 5, '2021-12-20 22:15:09', '2021-12-20 22:15:09'),
(87, '2021-12-26', 4, 5, '2021-12-20 22:15:09', '2021-12-20 22:15:09'),
(88, '2021-12-26', 2, 6, '2021-12-20 22:15:12', '2021-12-20 22:15:12'),
(89, '2021-12-26', 3, 6, '2021-12-20 22:15:12', '2021-12-20 22:15:12'),
(90, '2021-12-26', 4, 6, '2021-12-20 22:15:12', '2021-12-20 22:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `drink_id` bigint(20) UNSIGNED NOT NULL,
  `drink_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` tinyint(4) NOT NULL,
  `menu_category_id` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`drink_id`, `drink_name`, `category`, `menu_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Sting', 1, 1, '2021-12-20 22:41:42', '2021-12-20 22:41:42'),
(3, 'Mirinda Thái', 1, 1, '2021-12-20 22:42:22', '2021-12-20 22:42:22'),
(4, 'Redbull', 1, 1, '2021-12-20 22:42:50', '2021-12-20 22:42:50'),
(5, 'Carabao', 1, 1, '2021-12-20 22:43:16', '2021-12-20 22:43:16'),
(6, 'Cafe đen đá', 2, 2, '2021-12-20 22:43:45', '2021-12-20 22:43:45'),
(7, 'Cafe đặc biệt', 2, 2, '2021-12-20 22:44:28', '2021-12-20 22:44:28'),
(8, 'Cappucino', 2, 2, '2021-12-20 22:44:50', '2021-12-20 22:44:50'),
(9, 'Trà đường', 2, 4, '2021-12-20 22:45:16', '2021-12-20 22:45:16'),
(11, 'Trà lipton', 2, 4, '2021-12-20 22:45:49', '2021-12-20 22:45:49'),
(12, 'Trà lipton nóng', 2, 4, '2021-12-20 22:46:04', '2021-12-20 22:46:04'),
(13, 'Trà lai', 2, 4, '2021-12-20 22:46:25', '2021-12-20 22:46:25'),
(14, 'Sinh tố bơ', 2, 3, '2021-12-20 22:46:48', '2021-12-20 22:46:48'),
(15, 'Sinh tố sabo', 2, 3, '2021-12-20 22:47:10', '2021-12-20 22:47:10'),
(16, 'Sinh tố xoài', 2, 3, '2021-12-20 22:47:25', '2021-12-20 22:47:25'),
(17, 'Sinh tố dâu', 2, 3, '2021-12-20 22:47:43', '2021-12-20 22:47:43'),
(18, 'Sinh tố đu đủ', 2, 3, '2021-12-20 22:47:59', '2021-12-20 22:47:59'),
(19, 'Cafe sữa đá', 2, 2, '2021-12-20 22:48:45', '2021-12-20 22:48:45'),
(20, 'Sting', 1, 1, '2021-12-21 00:25:41', '2021-12-21 00:25:41'),
(21, 'Mirinda Thái', 1, 1, '2021-12-21 00:25:59', '2021-12-21 00:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `drink_details`
--

CREATE TABLE `drink_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `drink_id` bigint(20) UNSIGNED NOT NULL,
  `drink_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `date_add` date DEFAULT NULL,
  `date_exp` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drink_details`
--

INSERT INTO `drink_details` (`id`, `drink_id`, `drink_name`, `price_id`, `provider_id`, `amount`, `date_add`, `date_exp`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sting', 1, 1, 100, '2021-12-21', '2021-12-23', 'images/5b6Tb8v9yOPZauCRzs1yEpogHyjTImdwT48CaBen.jpg', '2021-12-20 22:41:42', '2021-12-21 00:25:32'),
(3, 3, 'Mirinda Thái', 3, 1, 100, '2021-12-21', '2021-12-23', 'images/Sjd5FpC2xh0cijGTNylOEfqV0QD4XZBWta576RCX.jpg', '2021-12-20 22:42:22', '2021-12-21 00:26:22'),
(4, 4, 'Redbull', 4, 1, 100, '2021-12-21', '2021-12-30', 'images/WzSVU4uEzR2TXPzpcQgkgIjer1JGwsHUEK2llk2x.jpg', '2021-12-20 22:42:50', '2021-12-21 00:26:38'),
(5, 5, 'Carabao', 5, 2, 100, '2021-12-21', '2021-12-30', 'images/HOevsoPU7sKn71qIeRX10Lc82K2B8IzrBbGia2lB.jpg', '2021-12-20 22:43:16', '2021-12-21 00:26:46'),
(6, 6, 'Cafe đen đá', 6, NULL, 0, NULL, NULL, 'images/AJiksouBij9WAfuMwyaCECfWO55IkevOlhnAOGdx.jpg', '2021-12-20 22:43:45', '2021-12-20 22:43:45'),
(7, 7, 'Cafe đặc biệt', 7, NULL, 0, NULL, NULL, 'images/7LS0UhlKu1AEYswJqdIIPqlPrlcNJ5ikAWB7ZsRn.jpg', '2021-12-20 22:44:28', '2021-12-20 22:44:28'),
(8, 8, 'Cappucino', 8, NULL, 0, NULL, NULL, 'images/80oKFC8WSGKtwu9PuXf2HyEOZwYS6qxDAGaoFDmm.jpg', '2021-12-20 22:44:50', '2021-12-20 22:44:50'),
(9, 9, 'Trà đường', 9, NULL, 0, NULL, NULL, 'images/cGJUGqFZy7jWosOBED75EhdOTnsa5ASVOp5IrKVT.jpg', '2021-12-20 22:45:16', '2021-12-20 22:45:16'),
(11, 11, 'Trà lipton', 11, NULL, 0, NULL, NULL, 'images/3rZTfMwmA1xJ7P16NhKsf5ERDXn2SOeaZFQarpG2.jpg', '2021-12-20 22:45:49', '2021-12-20 22:45:49'),
(12, 12, 'Trà lipton nóng', 12, NULL, 0, NULL, NULL, 'images/9HbzXQeqHqfGX8NDLnxOC6cV8zTLTn9V4FeC6E3Z.jpg', '2021-12-20 22:46:04', '2021-12-20 22:46:04'),
(13, 13, 'Trà lai', 13, NULL, 0, NULL, NULL, 'images/GI1DslRQVaGTvoy5AbZWNws12lTQZWQAUSFHJQgv.jpg', '2021-12-20 22:46:25', '2021-12-20 22:46:25'),
(14, 14, 'Sinh tố bơ', 14, NULL, 0, NULL, NULL, 'images/jrTQq7qWgoERPlvkDQG4LpHVWaWccdYNOw4AoXbu.jpg', '2021-12-20 22:46:48', '2021-12-20 22:46:48'),
(15, 15, 'Sinh tố sabo', 15, NULL, 0, NULL, NULL, 'images/lfmEJQFgVxRILeMqH9N1ThLF5WegZ112eDjDR4d4.jpg', '2021-12-20 22:47:10', '2021-12-20 22:47:10'),
(16, 16, 'Sinh tố xoài', 16, NULL, 0, NULL, NULL, 'images/Uesn6dIEQnf8VKOrePdQF0MWmz0VorPCTC1AcvbO.jpg', '2021-12-20 22:47:25', '2021-12-20 22:47:25'),
(17, 17, 'Sinh tố dâu', 17, NULL, 0, NULL, NULL, 'images/pAmRHGpIGaREDnlvy4sx7gRcSxPNTbDAc0nT7FXe.jpg', '2021-12-20 22:47:43', '2021-12-20 22:47:43'),
(18, 18, 'Sinh tố đu đủ', 18, NULL, 0, NULL, NULL, 'images/X4qkTYGcKUiWhGNzgmTBkBdU0Vj74AoBS6LUQCon.jpg', '2021-12-20 22:47:59', '2021-12-20 22:47:59'),
(19, 19, 'Cafe sữa đá', 19, NULL, 0, NULL, NULL, 'images/pM49Zf5AaPYK0ddqSyDS0n8NFMI8SDLy1SgdIZ1h.jpg', '2021-12-20 22:48:45', '2021-12-20 22:48:45'),
(20, 20, 'Sting', 20, 1, 100, '2021-12-21', '2021-12-30', 'images/5b6Tb8v9yOPZauCRzs1yEpogHyjTImdwT48CaBen.jpg', '2021-12-21 00:25:41', '2021-12-21 00:25:41'),
(21, 21, 'Mirinda Thái', 21, 1, 100, '2021-12-23', '2021-12-30', 'images/Sjd5FpC2xh0cijGTNylOEfqV0QD4XZBWta576RCX.jpg', '2021-12-21 00:25:59', '2021-12-21 00:25:59');

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
-- Table structure for table `importgoods_drinks`
--

CREATE TABLE `importgoods_drinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `drink_id` bigint(20) UNSIGNED NOT NULL,
  `amount_add` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `importgoods_drinks`
--

INSERT INTO `importgoods_drinks` (`id`, `drink_id`, `amount_add`, `date_add`, `created_at`, `updated_at`) VALUES
(1, 1, 100, '2021-12-21', '2021-12-21 00:25:32', '2021-12-21 00:25:32'),
(2, 20, 100, '2021-12-21', '2021-12-21 00:25:41', '2021-12-21 00:25:41'),
(3, 21, 100, '2021-12-23', '2021-12-21 00:25:59', '2021-12-21 00:25:59'),
(4, 3, 100, '2021-12-21', '2021-12-21 00:26:22', '2021-12-21 00:26:22'),
(5, 4, 100, '2021-12-21', '2021-12-21 00:26:38', '2021-12-21 00:26:38'),
(6, 5, 100, '2021-12-21', '2021-12-21 00:26:46', '2021-12-21 00:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `importgoods_ingredents`
--

CREATE TABLE `importgoods_ingredents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ingredent_id` bigint(20) UNSIGNED NOT NULL,
  `amount_add` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `importgoods_ingredents`
--

INSERT INTO `importgoods_ingredents` (`id`, `ingredent_id`, `amount_add`, `date_add`, `created_at`, `updated_at`) VALUES
(1, 1, 20, '2021-12-21', '2021-12-21 00:27:28', '2021-12-21 00:27:28'),
(2, 2, 20, '2021-12-21', '2021-12-21 00:28:36', '2021-12-21 00:28:36'),
(3, 3, 20, '2021-12-21', '2021-12-21 00:28:42', '2021-12-21 00:28:42'),
(4, 4, 3, '2021-12-21', '2021-12-21 00:28:48', '2021-12-21 00:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `ingredents`
--

CREATE TABLE `ingredents` (
  `ingredent_id` bigint(20) UNSIGNED NOT NULL,
  `ingredent_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredents`
--

INSERT INTO `ingredents` (`ingredent_id`, `ingredent_name`, `created_at`, `updated_at`) VALUES
(1, 'Đường', '2021-12-21 00:27:13', '2021-12-21 00:27:13'),
(2, 'Bơ', '2021-12-21 00:27:59', '2021-12-21 00:27:59'),
(3, 'Dâu', '2021-12-21 00:28:16', '2021-12-21 00:28:16'),
(4, 'Sabo', '2021-12-21 00:28:23', '2021-12-21 00:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `ingredent_details`
--

CREATE TABLE `ingredent_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ingredent_id` bigint(20) UNSIGNED NOT NULL,
  `ingredent_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `date_add` date DEFAULT NULL,
  `date_exp` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredent_details`
--

INSERT INTO `ingredent_details` (`id`, `ingredent_id`, `ingredent_name`, `price_id`, `provider_id`, `amount`, `date_add`, `date_exp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Đường', 22, 2, 20, '2021-12-21', '2021-12-23', '2021-12-21 00:27:13', '2021-12-21 00:27:28'),
(2, 2, 'Bơ', 23, 2, 20, '2021-12-21', '2021-12-31', '2021-12-21 00:27:59', '2021-12-21 00:28:36'),
(3, 3, 'Dâu', 24, 2, 20, '2021-12-21', '2021-12-31', '2021-12-21 00:28:16', '2021-12-21 00:28:42'),
(4, 4, 'Sabo', 25, 2, 3, '2021-12-21', '2021-12-31', '2021-12-21 00:28:23', '2021-12-21 00:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `submoney` double NOT NULL DEFAULT 0,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `table_id`, `user_id`, `total`, `submoney`, `time_in`, `time_out`, `status`, `created_at`, `updated_at`) VALUES
(14, 14, 30, 1, 240000, 0, '2021-12-21 13:16:28', '2021-12-21 13:16:38', 1, '2021-12-20 23:16:22', '2021-12-20 23:16:38'),
(15, 15, 30, 1, 240000, 0, '2021-12-21 13:16:28', '2021-12-21 13:16:38', 1, '2021-12-20 23:16:23', '2021-12-20 23:16:38'),
(16, 16, 30, 1, 240000, 0, '2021-12-21 13:16:28', '2021-12-21 13:16:38', 1, '2021-12-20 23:16:26', '2021-12-20 23:16:38'),
(17, 17, 2, 1, 97000, 0, '2021-12-21 13:17:15', '2021-12-21 13:18:55', 1, '2021-12-20 23:17:11', '2021-12-20 23:18:55'),
(18, 18, 2, 1, 97000, 0, '2021-12-21 13:17:15', '2021-12-21 13:18:55', 1, '2021-12-20 23:17:13', '2021-12-20 23:18:55'),
(19, 19, 7, 1, 43000, 0, '2021-12-21 13:17:28', '2021-12-21 13:19:05', 1, '2021-12-20 23:17:24', '2021-12-20 23:19:05'),
(20, 20, 7, 1, 43000, 0, '2021-12-21 13:17:28', '2021-12-21 13:19:05', 1, '2021-12-20 23:17:26', '2021-12-20 23:19:05'),
(21, 21, 5, 1, 25000, 3000, '2021-12-21 13:17:46', '2021-12-21 13:30:30', 1, '2021-12-20 23:17:44', '2021-12-20 23:30:30'),
(22, 22, 10, 1, 40000, 3000, '2021-12-21 13:18:03', '2021-12-21 13:40:19', 1, '2021-12-20 23:17:56', '2021-12-20 23:40:19'),
(23, 23, 10, 1, 40000, 3000, '2021-12-21 13:18:03', '2021-12-21 13:40:19', 1, '2021-12-20 23:18:01', '2021-12-20 23:40:19'),
(28, 28, 2, 1, 50000, 2000, '2021-12-21 13:58:29', '2021-12-21 14:01:07', 1, '2021-12-20 23:58:26', '2021-12-21 00:01:07'),
(29, 29, 2, 1, 50000, 2000, '2021-12-21 13:58:29', '2021-12-21 14:01:07', 1, '2021-12-20 23:58:27', '2021-12-21 00:01:07'),
(30, 30, 2, 1, 104000, 0, '2021-12-21 14:02:58', '2021-12-21 14:03:19', 1, '2021-12-21 00:02:56', '2021-12-21 00:03:19'),
(31, 31, 23, 1, 210000, 6000, '2021-12-21 14:03:41', '2021-12-21 14:04:03', 1, '2021-12-21 00:03:39', '2021-12-21 00:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `drink_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `total` double NOT NULL DEFAULT 0,
  `submoney` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `drink_name`, `table_name`, `user_name`, `time_in`, `time_out`, `total`, `submoney`, `status`, `created_at`, `updated_at`) VALUES
(14, 14, 'Cafe đen đá', 'Bàn 30', 'Admin', '2021-12-21 13:16:28', '2021-12-21 13:16:38', 240000, 0, 1, '2021-12-20 23:16:22', '2021-12-20 23:16:38'),
(15, 15, 'Cafe đặc biệt', 'Bàn 30', 'Admin', '2021-12-21 13:16:28', '2021-12-21 13:16:38', 240000, 0, 1, '2021-12-20 23:16:23', '2021-12-20 23:16:38'),
(16, 16, 'Trà lipton nóng', 'Bàn 30', 'Admin', '2021-12-21 13:16:28', '2021-12-21 13:16:38', 240000, 0, 1, '2021-12-20 23:16:26', '2021-12-20 23:16:38'),
(17, 17, 'Sinh tố sabo', 'Bàn 2', 'Admin', '2021-12-21 13:17:15', '2021-12-21 13:18:55', 97000, 0, 1, '2021-12-20 23:17:11', '2021-12-20 23:18:55'),
(18, 18, 'Trà lai', 'Bàn 2', 'Admin', '2021-12-21 13:17:15', '2021-12-21 13:18:55', 97000, 0, 1, '2021-12-20 23:17:13', '2021-12-20 23:18:55'),
(19, 19, 'Cafe sữa đá', 'Bàn 7', 'Admin', '2021-12-21 13:17:28', '2021-12-21 13:19:05', 43000, 0, 1, '2021-12-20 23:17:24', '2021-12-20 23:19:05'),
(20, 20, 'Sinh tố đu đủ', 'Bàn 7', 'Admin', '2021-12-21 13:17:28', '2021-12-21 13:19:05', 43000, 0, 1, '2021-12-20 23:17:26', '2021-12-20 23:19:05'),
(21, 21, 'Cafe đen đá', 'Bàn 5', 'Admin', '2021-12-21 13:17:46', '2021-12-21 13:30:30', 25000, 3000, 1, '2021-12-20 23:17:44', '2021-12-20 23:30:30'),
(22, 22, 'Trà đường', 'Bàn 10', 'Admin', '2021-12-21 13:18:03', '2021-12-21 13:40:19', 40000, 3000, 1, '2021-12-20 23:17:56', '2021-12-20 23:40:19'),
(23, 23, 'Trà lai', 'Bàn 10', 'Admin', '2021-12-21 13:18:03', '2021-12-21 13:40:19', 40000, 3000, 1, '2021-12-20 23:18:01', '2021-12-20 23:40:19'),
(28, 28, 'Sinh tố sabo', 'Bàn 2', 'Admin', '2021-12-21 13:58:29', '2021-12-21 14:01:07', 50000, 2000, 1, '2021-12-20 23:58:26', '2021-12-21 00:01:07'),
(29, 29, 'Sinh tố xoài', 'Bàn 2', 'Admin', '2021-12-21 13:58:29', '2021-12-21 14:01:07', 50000, 2000, 1, '2021-12-20 23:58:27', '2021-12-21 00:01:07'),
(30, 30, 'Sinh tố xoài', 'Bàn 2', 'Admin', '2021-12-21 14:02:58', '2021-12-21 14:03:19', 104000, 0, 1, '2021-12-21 00:02:56', '2021-12-21 00:03:19'),
(31, 31, 'Cafe sữa đá', 'Bàn 23', 'Admin', '2021-12-21 14:03:41', '2021-12-21 14:04:03', 210000, 6000, 1, '2021-12-21 00:03:39', '2021-12-21 00:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `menu_categorys`
--

CREATE TABLE `menu_categorys` (
  `menu_category_id` bigint(20) UNSIGNED NOT NULL,
  `menu_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_categorys`
--

INSERT INTO `menu_categorys` (`menu_category_id`, `menu_category_name`, `created_at`, `updated_at`) VALUES
(1, 'Nước đóng chai', '2021-12-20 22:19:33', '2021-12-20 22:19:33'),
(2, 'Cafe', '2021-12-20 22:19:39', '2021-12-20 22:19:39'),
(3, 'Sinh tố', '2021-12-20 22:19:46', '2021-12-20 22:19:46'),
(4, 'Trà', '2021-12-20 22:19:50', '2021-12-20 22:19:50');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_08_26_022520_create_sessions_table', 1),
(7, '2021_09_04_071741_create_permission_tables', 1),
(8, '2021_09_12_072547_create_profiles_table', 1),
(9, '2021_09_27_043151_create_time_keepings_table', 1),
(10, '2021_10_04_152803_create_shifts_table', 1),
(11, '2021_10_06_121753_create_calendars_table', 1),
(12, '2021_10_20_164112_create_areas_table', 1),
(13, '2021_10_20_164604_create_tables_table', 1),
(14, '2021_11_02_024756_create_providers_table', 1),
(15, '2021_11_02_025135_create_prices_table', 1),
(16, '2021_11_02_031116_create_ingredents_table', 1),
(17, '2021_11_02_031333_create_ingredent_details_table', 1),
(18, '2021_11_08_060314_create_importgoods_ingredents_table', 1),
(19, '2021_11_15_034743_create_menu_categorys_table', 1),
(20, '2021_11_15_035330_create_drinks_table', 1),
(21, '2021_11_15_035419_create_drink_details_table', 1),
(22, '2021_11_15_035537_create_importgoods_drinks_table', 1),
(23, '2021_11_21_173640_create_orders_table', 1),
(24, '2021_11_21_175025_create_invoices_table', 1),
(25, '2021_11_21_180813_create_invoice_details_table', 1),
(26, '2021_11_21_180833_create_order_details_table', 1),
(27, '2021_12_12_071447_create_wages_table', 1),
(28, '2021_12_13_193935_create_statisticals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `drink_id` bigint(20) UNSIGNED NOT NULL,
  `drink_amount` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `status_bartending` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `table_id`, `user_id`, `drink_id`, `drink_amount`, `status`, `status_bartending`, `created_at`, `updated_at`) VALUES
(14, 30, 1, 6, 15, 2, 2, '2021-12-20 23:16:22', '2021-12-21 00:06:05'),
(15, 30, 1, 7, 1, 2, 2, '2021-12-20 23:16:23', '2021-12-21 00:06:07'),
(16, 30, 1, 12, 1, 2, 2, '2021-12-20 23:16:26', '2021-12-21 00:06:06'),
(17, 2, 1, 15, 2, 2, 2, '2021-12-20 23:17:11', '2021-12-21 00:06:08'),
(18, 2, 1, 13, 3, 2, 2, '2021-12-20 23:17:13', '2021-12-21 00:06:08'),
(19, 7, 1, 19, 1, 2, 2, '2021-12-20 23:17:24', '2021-12-21 00:06:10'),
(20, 7, 1, 18, 1, 2, 2, '2021-12-20 23:17:26', '2021-12-21 00:06:09'),
(21, 5, 1, 6, 2, 2, 2, '2021-12-20 23:17:44', '2021-12-21 00:06:11'),
(22, 10, 1, 9, 1, 2, 2, '2021-12-20 23:17:56', '2021-12-21 00:06:13'),
(23, 10, 1, 13, 2, 2, 2, '2021-12-20 23:18:01', '2021-12-21 00:06:13'),
(28, 2, 1, 15, 1, 2, 2, '2021-12-20 23:58:26', '2021-12-21 00:06:14'),
(29, 2, 1, 16, 1, 2, 2, '2021-12-20 23:58:27', '2021-12-21 00:06:15'),
(30, 2, 1, 16, 4, 2, 2, '2021-12-21 00:02:56', '2021-12-21 00:06:16'),
(31, 23, 1, 19, 12, 2, 2, '2021-12-21 00:03:38', '2021-12-21 00:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drink_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drink_amount` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `table_name`, `user_name`, `drink_name`, `drink_amount`, `price`, `status`, `created_at`, `updated_at`) VALUES
(14, 14, 'Bàn 30', 'Admin', 'Cafe đen đá', 15, 14000, 0, '2021-12-20 23:16:22', '2021-12-20 23:16:22'),
(15, 15, 'Bàn 30', 'Admin', 'Cafe đặc biệt', 1, 18000, 0, '2021-12-20 23:16:23', '2021-12-20 23:16:23'),
(16, 16, 'Bàn 30', 'Admin', 'Trà lipton nóng', 1, 13000, 0, '2021-12-20 23:16:26', '2021-12-20 23:16:26'),
(17, 17, 'Bàn 2', 'Admin', 'Sinh tố sabo', 2, 26000, 0, '2021-12-20 23:17:11', '2021-12-20 23:17:11'),
(18, 18, 'Bàn 2', 'Admin', 'Trà lai', 3, 15000, 0, '2021-12-20 23:17:13', '2021-12-20 23:17:13'),
(19, 19, 'Bàn 7', 'Admin', 'Cafe sữa đá', 1, 18000, 0, '2021-12-20 23:17:24', '2021-12-20 23:17:24'),
(20, 20, 'Bàn 7', 'Admin', 'Sinh tố đu đủ', 1, 26000, 0, '2021-12-20 23:17:26', '2021-12-20 23:17:26'),
(21, 21, 'Bàn 5', 'Admin', 'Cafe đen đá', 2, 14000, 0, '2021-12-20 23:17:44', '2021-12-20 23:17:44'),
(22, 22, 'Bàn 10', 'Admin', 'Trà đường', 1, 13000, 0, '2021-12-20 23:17:56', '2021-12-20 23:17:56'),
(23, 23, 'Bàn 10', 'Admin', 'Trà lai', 2, 15000, 0, '2021-12-20 23:18:01', '2021-12-20 23:18:01'),
(28, 28, 'Bàn 2', 'Admin', 'Sinh tố sabo', 1, 26000, 0, '2021-12-20 23:58:26', '2021-12-20 23:58:26'),
(29, 29, 'Bàn 2', 'Admin', 'Sinh tố xoài', 1, 26000, 0, '2021-12-20 23:58:27', '2021-12-20 23:58:27'),
(30, 30, 'Bàn 2', 'Admin', 'Sinh tố xoài', 4, 26000, 0, '2021-12-21 00:02:56', '2021-12-21 00:02:56'),
(31, 31, 'Bàn 23', 'Admin', 'Cafe sữa đá', 12, 18000, 0, '2021-12-21 00:03:39', '2021-12-21 00:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'system.permission.management', 'web', '2021-12-19 13:06:52', '2021-12-19 13:06:52'),
(2, 'system.configuration.management', 'web', '2021-12-19 13:06:52', '2021-12-19 13:06:52'),
(3, 'system.basic.management', 'web', '2021-12-19 13:06:52', '2021-12-19 13:06:52'),
(4, 'system.view.basic', 'web', '2021-12-19 13:06:52', '2021-12-19 13:06:52'),
(5, 'system.update', 'web', '2021-12-19 13:06:52', '2021-12-19 13:06:52'),
(6, 'system.create', 'web', '2021-12-19 13:06:53', '2021-12-19 13:06:53'),
(7, 'system.delete', 'web', '2021-12-19 13:06:53', '2021-12-19 13:06:53');

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

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` bigint(20) UNSIGNED NOT NULL,
  `price_cost` int(11) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `price_cost`, `category`, `created_at`, `updated_at`) VALUES
(1, 20000, 1, '2021-12-20 22:41:42', '2021-12-20 22:41:42'),
(2, 20000, 1, '2021-12-20 22:41:56', '2021-12-20 22:41:56'),
(3, 20000, 1, '2021-12-20 22:42:22', '2021-12-20 22:42:22'),
(4, 20000, 1, '2021-12-20 22:42:50', '2021-12-20 22:42:50'),
(5, 20000, 1, '2021-12-20 22:43:16', '2021-12-20 22:43:16'),
(6, 14000, 1, '2021-12-20 22:43:45', '2021-12-20 22:43:45'),
(7, 18000, 1, '2021-12-20 22:44:28', '2021-12-20 22:44:28'),
(8, 25000, 1, '2021-12-20 22:44:50', '2021-12-20 22:44:50'),
(9, 13000, 1, '2021-12-20 22:45:16', '2021-12-20 22:45:16'),
(10, 13000, 1, '2021-12-20 22:45:26', '2021-12-20 22:45:26'),
(11, 13000, 1, '2021-12-20 22:45:49', '2021-12-20 22:45:49'),
(12, 13000, 1, '2021-12-20 22:46:04', '2021-12-20 22:46:04'),
(13, 15000, 1, '2021-12-20 22:46:25', '2021-12-20 22:46:25'),
(14, 28000, 1, '2021-12-20 22:46:48', '2021-12-20 22:46:48'),
(15, 26000, 1, '2021-12-20 22:47:10', '2021-12-20 22:47:10'),
(16, 26000, 1, '2021-12-20 22:47:25', '2021-12-20 22:47:25'),
(17, 26000, 1, '2021-12-20 22:47:43', '2021-12-20 22:47:43'),
(18, 26000, 1, '2021-12-20 22:47:59', '2021-12-20 22:47:59'),
(19, 18000, 1, '2021-12-20 22:48:45', '2021-12-20 22:48:45'),
(20, 20000, 1, '2021-12-21 00:25:41', '2021-12-21 00:25:41'),
(21, 20000, 1, '2021-12-21 00:25:59', '2021-12-21 00:25:59'),
(22, 16000, 2, '2021-12-21 00:27:13', '2021-12-21 00:27:13'),
(23, 25000, 2, '2021-12-21 00:27:59', '2021-12-21 00:27:59'),
(24, 30000, 2, '2021-12-21 00:28:16', '2021-12-21 00:28:16'),
(25, 30000, 2, '2021-12-21 00:28:23', '2021-12-21 00:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `email`, `address`, `phone`, `birthday`, `created_at`, `updated_at`) VALUES
(1, 2, 'tinhb1706880@student.ctu.edu.vn', 'Cần Thơ', '0582812164', '1999-12-09', '2021-12-20 21:37:19', '2021-12-20 21:37:19'),
(2, 3, 'duongtrungtinh.19899@gmail.com', 'Cần Thơ', '0582812164', '1999-12-23', '2021-12-20 21:44:14', '2021-12-20 21:44:14'),
(3, 4, 'MuoiiPhamm@gmail.com', 'Cần Thơ', '0743889223', '1999-12-08', '2021-12-20 21:48:49', '2021-12-20 21:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `provider_name`, `phone`, `email`, `address`, `image`, `relationship`, `created_at`, `updated_at`) VALUES
(1, 'Vinsmart', 345767212, 'vinsmart@gmail.com', 'số 123 đường 3/2, Ninh Kiều, Cần Thơ', 'images/gELnGoywCXw9LXSNFF8yJoDVZnnvciXwd9pmrsSm.png', 1, '2021-12-20 22:21:18', '2021-12-20 22:39:56'),
(2, 'Lotte', 743212334, 'lotte@gmail.com', 'số 517đường 30/4, Ninh Kiều, Cần Thơ', 'images/d3AuWG8igxxH9LayS1UK6zxcxmM14A3qy16AJ3Jf.jpg', 2, '2021-12-20 22:22:15', '2021-12-20 22:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-12-19 13:06:53', '2021-12-19 13:06:53'),
(2, 'Quản lý', 'web', '2021-12-20 21:53:48', '2021-12-20 21:53:48'),
(3, 'Thu ngân', 'web', '2021-12-20 21:53:57', '2021-12-20 21:53:57'),
(4, 'Pha chế', 'web', '2021-12-20 21:54:19', '2021-12-20 21:54:19'),
(5, 'Nhân viên', 'web', '2021-12-20 21:54:43', '2021-12-20 21:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jO4CpBqUvf7ybKlW3om2alOmkd5AhkynNCK2HmbK', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiM2hGb1ZFRDdjZUNvTmZkYTU3S2tWbFNGS3pVZENjckY1R2xkUVRVNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5hZ2VtZW50L3RpbWVrZWVwaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHpHeE5rZlZHS3g2TXRVZ0VidEZ6RXVlWG8vZ3JQN29TV2lkbFR6Z1h0TmRzMFF5eDRYUnpXIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR6R3hOa2ZWR0t4Nk10VWdFYnRGekV1ZVhvL2dyUDdvU1dpZGxUemdYdE5kczBReXg0WFJ6VyI7fQ==', 1640070977),
('ZnT9yqwdT4tLlFK46vAU8No8OiwSITZwfSp00ffm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRFdrb1JERGx0VTl6SkdWZE8xczN0dlY0QWo5d1RVUnU2Y1RYbmdYcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5hZ2VtZW50L3N0YXRpc3RpY2FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHhhYU1KZlpoSFZHWlhhWGhMdEdZdy5IVjlZc0pPMlpTV3Y0bEUxcWZKeWx5eG1XVVBOS1plIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR4YWFNSmZaaEhWR1pYYVhoTHRHWXcuSFY5WXNKTzJaU1d2NGxFMXFmSnlseXhtV1VQTktaZSI7fQ==', 1640071815);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `time_start`, `time_end`, `color`, `created_at`, `updated_at`) VALUES
(4, 'Ca 1', '06:00', '12:00', 'bg-danger', '2021-12-20 22:13:13', '2021-12-20 22:13:13'),
(5, 'Ca 2', '12:00', '17:00', 'bg-success', '2021-12-20 22:13:24', '2021-12-20 22:13:24'),
(6, 'Ca 3', '17:00', '23:00', 'bg-primary', '2021-12-20 22:13:38', '2021-12-20 22:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `statisticals`
--

CREATE TABLE `statisticals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `turnover` double NOT NULL,
  `total_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statisticals`
--

INSERT INTO `statisticals` (`id`, `date`, `turnover`, `total_order`, `created_at`, `updated_at`) VALUES
(2, '2021-12-21', 809000, 14, '2021-12-20 23:15:55', '2021-12-21 00:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_name`, `sub_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bàn 1', 1, 0, '2021-12-20 21:56:52', '2021-12-20 22:56:26'),
(2, 'Bàn 2', 1, 0, '2021-12-20 21:56:53', '2021-12-21 00:03:19'),
(3, 'Bàn 3', 1, 0, '2021-12-20 21:56:54', '2021-12-20 23:05:16'),
(4, 'Bàn 4', 1, 0, '2021-12-20 21:56:56', '2021-12-20 21:58:49'),
(5, 'Bàn 5', 1, 0, '2021-12-20 21:56:57', '2021-12-20 23:40:31'),
(6, 'Bàn 6', 1, 0, '2021-12-20 21:56:58', '2021-12-20 23:15:55'),
(7, 'Bàn 7', 1, 0, '2021-12-20 21:56:59', '2021-12-20 23:19:05'),
(8, 'Bàn 8', 1, 0, '2021-12-20 21:57:00', '2021-12-20 21:58:49'),
(9, 'Bàn 9', 1, 0, '2021-12-20 21:57:01', '2021-12-20 21:58:49'),
(10, 'Bàn 10', 1, 0, '2021-12-20 21:57:04', '2021-12-20 23:40:37'),
(11, 'Bàn 11', 2, 0, '2021-12-20 21:57:06', '2021-12-20 21:59:06'),
(12, 'Bàn 12', 2, 0, '2021-12-20 21:57:07', '2021-12-20 21:59:06'),
(13, 'Bàn 13', 2, 0, '2021-12-20 21:57:09', '2021-12-20 23:16:01'),
(14, 'Bàn 14', 2, 0, '2021-12-20 21:57:11', '2021-12-20 21:59:06'),
(15, 'Bàn 15', 2, 0, '2021-12-20 21:57:13', '2021-12-20 21:59:06'),
(16, 'Bàn 16', 2, 0, '2021-12-20 21:57:14', '2021-12-20 23:16:04'),
(17, 'Bàn 17', 2, 0, '2021-12-20 21:57:15', '2021-12-20 21:59:06'),
(18, 'Bàn 18', 2, 0, '2021-12-20 21:57:16', '2021-12-20 21:59:06'),
(19, 'Bàn 19', 2, 0, '2021-12-20 21:57:17', '2021-12-20 21:59:06'),
(20, 'Bàn 20', 2, 0, '2021-12-20 21:57:22', '2021-12-20 21:59:06'),
(21, 'Bàn 21', 3, 0, '2021-12-20 21:57:24', '2021-12-20 21:59:22'),
(22, 'Bàn 22', 3, 0, '2021-12-20 21:57:25', '2021-12-20 21:59:22'),
(23, 'Bàn 23', 3, 0, '2021-12-20 21:57:26', '2021-12-21 00:04:03'),
(24, 'Bàn 24', 3, 0, '2021-12-20 21:57:28', '2021-12-20 21:59:22'),
(25, 'Bàn 25', 3, 0, '2021-12-20 21:57:29', '2021-12-20 21:59:22'),
(26, 'Bàn 26', 3, 0, '2021-12-20 21:57:30', '2021-12-20 21:59:22'),
(27, 'Bàn 27', 3, 0, '2021-12-20 21:57:32', '2021-12-20 21:59:22'),
(28, 'Bàn 28', 3, 0, '2021-12-20 21:57:33', '2021-12-20 21:59:22'),
(29, 'Bàn 29', 3, 0, '2021-12-20 21:57:34', '2021-12-20 21:59:22'),
(30, 'Bàn 30', 3, 0, '2021-12-20 21:57:39', '2021-12-20 23:16:38'),
(31, 'Bàn 31', NULL, 0, '2021-12-20 21:57:42', '2021-12-20 21:57:42'),
(32, 'Bàn 32', NULL, 0, '2021-12-20 21:57:44', '2021-12-20 21:57:44'),
(33, 'Bàn 33', NULL, 0, '2021-12-20 21:57:46', '2021-12-20 21:57:46'),
(34, 'Bàn 34', NULL, 0, '2021-12-20 21:57:47', '2021-12-20 21:57:47'),
(35, 'Bàn 35', NULL, 0, '2021-12-20 21:57:48', '2021-12-20 21:57:48'),
(36, 'Bàn 36', NULL, 0, '2021-12-20 21:57:49', '2021-12-20 21:57:49'),
(37, 'Bàn 37', NULL, 0, '2021-12-20 21:57:50', '2021-12-20 21:57:50'),
(38, 'Bàn 38', NULL, 0, '2021-12-20 21:57:51', '2021-12-20 21:57:51'),
(39, 'Bàn 39', NULL, 0, '2021-12-20 21:57:52', '2021-12-20 21:57:52'),
(40, 'Bàn 40', NULL, 0, '2021-12-20 21:57:55', '2021-12-20 21:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `time_keepings`
--

CREATE TABLE `time_keepings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `status_edit` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_keepings`
--

INSERT INTO `time_keepings` (`id`, `user_id`, `time_start`, `time_end`, `hour`, `status`, `status_edit`, `created_at`, `updated_at`) VALUES
(1, 3, '2021-12-21 12:02:57', '2021-12-21 12:07:53', '4', 3, NULL, '2021-12-20 22:02:57', '2021-12-20 22:08:09'),
(2, 3, '2021-12-21 12:07:56', '2021-12-21 12:18:39', '10', 3, NULL, '2021-12-20 22:07:56', '2021-12-21 00:22:57'),
(3, 3, '2021-12-21 12:18:41', '2021-12-21 12:56:05', '37', 3, NULL, '2021-12-20 22:18:41', '2021-12-21 00:23:09'),
(4, 3, '2021-12-21 12:56:06', '2021-12-21 14:16:17', '80', 2, NULL, '2021-12-20 22:56:06', '2021-12-21 00:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '2021-12-07 10:27:41', '$2y$10$xaaMJfZhHVGZXaXhLtGYw.HV9YsJO2ZSWv4lE1qfJylyxmWUPNKZe', NULL, NULL, 'Ryoz4F28EF', NULL, NULL, '2021-12-19 13:06:53', '2021-12-19 13:06:53', 1),
(2, 'Thu ngân', 'tinhb1706880@student.ctu.edu.vn', '2021-12-20 21:43:25', '$2y$10$B2AAegLFm2G8Sim790ZbZeshxBgeB6RZajwZnpddkzTHN8E0Sq7MC', NULL, NULL, NULL, NULL, NULL, '2021-12-20 21:37:19', '2021-12-20 21:55:02', 1),
(3, 'Pha chế', 'duongtrungtinh.19899@gmail.com', '2021-12-20 21:45:14', '$2y$10$zGxNkfVGKx6MtUgEbtFzEueXo/grP7oSWidlTzgXtNds0Qyx4XRzW', NULL, NULL, NULL, NULL, NULL, '2021-12-20 21:44:14', '2021-12-20 21:55:04', 1),
(4, 'Nhân viên', 'MuoiiPhamm@gmail.com', '2021-12-20 21:49:45', '$2y$10$o71Dpsl6mF04YakrumFg6OXGaw0PklEw3tMMjwNELoAiIEUgUuok6', NULL, NULL, NULL, NULL, NULL, '2021-12-20 21:48:49', '2021-12-20 21:49:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wages`
--

CREATE TABLE `wages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wage` double NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calendars_user_id_foreign` (`user_id`),
  ADD KEY `calendars_shift_id_foreign` (`shift_id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`drink_id`);

--
-- Indexes for table `drink_details`
--
ALTER TABLE `drink_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drink_details_drink_id_foreign` (`drink_id`),
  ADD KEY `drink_details_price_id_foreign` (`price_id`),
  ADD KEY `drink_details_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `importgoods_drinks`
--
ALTER TABLE `importgoods_drinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `importgoods_drinks_drink_id_foreign` (`drink_id`);

--
-- Indexes for table `importgoods_ingredents`
--
ALTER TABLE `importgoods_ingredents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `importgoods_ingredents_ingredent_id_foreign` (`ingredent_id`);

--
-- Indexes for table `ingredents`
--
ALTER TABLE `ingredents`
  ADD PRIMARY KEY (`ingredent_id`);

--
-- Indexes for table `ingredent_details`
--
ALTER TABLE `ingredent_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredent_details_ingredent_id_foreign` (`ingredent_id`),
  ADD KEY `ingredent_details_price_id_foreign` (`price_id`),
  ADD KEY `ingredent_details_provider_id_foreign` (`provider_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_order_id_foreign` (`order_id`),
  ADD KEY `invoices_table_id_foreign` (`table_id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_details_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `menu_categorys`
--
ALTER TABLE `menu_categorys`
  ADD PRIMARY KEY (`menu_category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_table_id_foreign` (`table_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_drink_id_foreign` (`drink_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisticals`
--
ALTER TABLE `statisticals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_sub_id_foreign` (`sub_id`);

--
-- Indexes for table `time_keepings`
--
ALTER TABLE `time_keepings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_keepings_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wages`
--
ALTER TABLE `wages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wages_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `drink_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `drink_details`
--
ALTER TABLE `drink_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `importgoods_drinks`
--
ALTER TABLE `importgoods_drinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `importgoods_ingredents`
--
ALTER TABLE `importgoods_ingredents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ingredents`
--
ALTER TABLE `ingredents`
  MODIFY `ingredent_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ingredent_details`
--
ALTER TABLE `ingredent_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `menu_categorys`
--
ALTER TABLE `menu_categorys`
  MODIFY `menu_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statisticals`
--
ALTER TABLE `statisticals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `time_keepings`
--
ALTER TABLE `time_keepings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wages`
--
ALTER TABLE `wages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendars`
--
ALTER TABLE `calendars`
  ADD CONSTRAINT `calendars_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calendars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `drink_details`
--
ALTER TABLE `drink_details`
  ADD CONSTRAINT `drink_details_drink_id_foreign` FOREIGN KEY (`drink_id`) REFERENCES `drinks` (`drink_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drink_details_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `prices` (`price_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drink_details_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `importgoods_drinks`
--
ALTER TABLE `importgoods_drinks`
  ADD CONSTRAINT `importgoods_drinks_drink_id_foreign` FOREIGN KEY (`drink_id`) REFERENCES `drinks` (`drink_id`) ON DELETE CASCADE;

--
-- Constraints for table `importgoods_ingredents`
--
ALTER TABLE `importgoods_ingredents`
  ADD CONSTRAINT `importgoods_ingredents_ingredent_id_foreign` FOREIGN KEY (`ingredent_id`) REFERENCES `ingredents` (`ingredent_id`) ON DELETE CASCADE;

--
-- Constraints for table `ingredent_details`
--
ALTER TABLE `ingredent_details`
  ADD CONSTRAINT `ingredent_details_ingredent_id_foreign` FOREIGN KEY (`ingredent_id`) REFERENCES `ingredents` (`ingredent_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ingredent_details_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `prices` (`price_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ingredent_details_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_drink_id_foreign` FOREIGN KEY (`drink_id`) REFERENCES `drinks` (`drink_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_sub_id_foreign` FOREIGN KEY (`sub_id`) REFERENCES `areas` (`id`);

--
-- Constraints for table `time_keepings`
--
ALTER TABLE `time_keepings`
  ADD CONSTRAINT `time_keepings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wages`
--
ALTER TABLE `wages`
  ADD CONSTRAINT `wages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
