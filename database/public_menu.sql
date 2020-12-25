-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2020 at 04:51 PM
-- Server version: 5.7.31-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phong297_dangtuyen`
--

-- --------------------------------------------------------

--
-- Table structure for table `public_menu`
--

CREATE TABLE `public_menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(255) NOT NULL DEFAULT '0',
  `model` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `public_menu`
--

INSERT INTO `public_menu` (`id`, `parent_id`, `model`, `link`, `sort`, `active`, `type`, `user_function`, `class_name`, `controller`, `action`) VALUES
(1, 0, 'public_menu', '/', 5, 'Y', 'simple', '', '', 'home', 'index'),
(2, 0, 'public_menu', '/gioi-thieu', 10, 'Y', 'nav_simple', 'get_menu', 'page', 'pages', 'index'),
(7, 0, 'public_menu', '/contact', 100, 'Y', 'simple', '', 'page', 'pages', 'contact'),
(8, 0, 'public_menu', '', 25, 'Y', 'nav_simple', 'get_menu', 'service', NULL, NULL),
(9, 0, 'public_menu', '/tin-tuc', 50, 'Y', 'nav_megamenu', 'get_mega_menu', 'category', NULL, NULL),
(11, 0, 'public_menu', '/faq', 90, 'N', 'simple', '', '', NULL, NULL),
(12, 0, 'public_menu', '/bac-si', 30, 'N', 'simple', '', '', NULL, NULL),
(13, 0, 'public_menu', '/chuyen-khoa', 20, 'Y', 'nav_2_columns', 'get_menu', 'specialist', NULL, NULL),
(14, 0, 'public_menu', '', 26, 'Y', 'nav_simple', '', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `public_menu`
--
ALTER TABLE `public_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `public_menu`
--
ALTER TABLE `public_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
