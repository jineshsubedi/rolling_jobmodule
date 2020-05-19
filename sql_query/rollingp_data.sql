-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2020 at 10:22 AM
-- Server version: 5.7.30
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
-- Database: `rollingp_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staffs` int(11) NOT NULL,
  `parent_branch` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `staffs`, `parent_branch`, `created_at`, `updated_at`) VALUES
(1, 'Thapathali Branch Office', 227, 0, '2018-10-03 05:35:52', '2020-05-19 04:30:21'),
(2, 'Rolling Plans Pvt. Ltd.', 54, 1, '2019-02-14 17:24:00', '2020-05-19 04:30:22'),
(3, 'Samsung Rolling Call Center', 14, 0, '2019-05-26 09:40:54', '2020-05-19 04:30:22'),
(4, 'Subisu Rolling Call Center', 24, 0, '2019-05-26 09:41:07', '2020-05-19 04:30:22'),
(5, 'Reliance Rolling Call Center', 12, 0, '2019-05-26 09:41:19', '2020-05-19 04:30:22'),
(6, 'World Bank -Administrative Service', 15, 0, '2019-05-26 09:41:35', '2020-05-19 04:30:22'),
(7, 'Global Health Supply Chain', 7, 0, '2019-05-26 09:41:56', '2020-05-19 04:30:22'),
(8, 'Nabil -Rolling Call Center', 19, 0, '2019-05-26 09:42:08', '2020-05-19 04:30:22'),
(9, 'BM Oversease', 23, 0, '2019-06-12 10:58:31', '2020-05-19 04:30:22'),
(10, 'UNOPS', 33, 0, '2019-07-16 07:22:10', '2020-05-19 04:30:22'),
(11, 'RPPL Samsung', 195, 0, '2019-08-23 04:52:39', '2020-05-19 04:30:23'),
(12, 'Cipla Rolling Plans', 13, 0, '2019-11-03 09:35:46', '2020-05-19 04:30:23'),
(13, 'MetLife-Rolling Contact Center', 8, 0, '2020-01-20 04:18:08', '2020-05-19 04:30:23'),
(14, 'Demo', 3, 0, '2020-02-13 06:34:10', '2020-05-19 04:30:23'),
(15, 'Rolling Nexus', 8, 0, '2020-03-04 06:53:41', '2020-05-19 04:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `branch_setting`
--

CREATE TABLE `branch_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `revenue` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `performance_rater` int(11) NOT NULL,
  `performance` text COLLATE utf8_unicode_ci NOT NULL,
  `client_comment` int(2) NOT NULL,
  `comment_type` int(2) NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `salary_calculate` tinyint(1) NOT NULL,
  `canteen` int(11) NOT NULL,
  `performance_rating_type` int(11) NOT NULL DEFAULT '0',
  `attendance_handler` int(11) DEFAULT NULL,
  `account_handler` int(11) DEFAULT NULL,
  `account_handler_signature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hr_handler` int(11) DEFAULT NULL,
  `staff_handler` int(11) DEFAULT NULL,
  `survey_handler` int(11) DEFAULT NULL,
  `training_handler` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch_setting`
--

INSERT INTO `branch_setting` (`id`, `branch_id`, `revenue`, `client`, `performance_rater`, `performance`, `client_comment`, `comment_type`, `email`, `salary_calculate`, `canteen`, `performance_rating_type`, `attendance_handler`, `account_handler`, `account_handler_signature`, `hr_handler`, `staff_handler`, `survey_handler`, `training_handler`, `created_at`, `updated_at`) VALUES
(3, 2, 795, 10, 786, '', 1, 2, 'jangam@rollingplans.com.np', 1, 0, 1, 805, 789, 'signature/RkUahT5EFa.png', 805, 1028, 805, 805, '2019-06-11 07:45:25', '2020-03-19 10:44:18'),
(4, 1, 0, 0, 761, '', 0, 1, 'info@rollingplans.com.np', 0, 25, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 07:45:25', '2019-08-13 09:10:45'),
(5, 3, 3, 3, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 07:45:25', '2019-06-11 07:47:12'),
(6, 4, 3, 3, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 07:45:25', '2019-06-11 07:47:12'),
(7, 5, 3, 3, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 07:45:25', '2019-06-11 07:47:12'),
(8, 6, 3, 3, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 07:45:25', '2019-06-11 07:47:12'),
(9, 7, 3, 3, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 07:45:25', '2019-06-11 07:47:12'),
(10, 8, 925, 20, 925, '', 0, 1, 'rojesh-nabil@rollingplans.com.np', 2, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-11 07:45:25', '2020-02-20 05:14:34'),
(11, 9, 0, 0, 879, '', 0, 1, 'jangam@rollingplans.com.np', 1, 0, 0, 1340, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-12 10:58:31', '2020-02-27 10:52:46'),
(12, 10, 0, 0, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-16 07:22:10', '2019-07-16 07:22:10'),
(13, 11, 0, 0, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-23 04:52:39', '2019-08-23 04:52:39'),
(14, 12, 0, 0, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03 09:35:46', '2019-11-03 09:35:46'),
(15, 13, 0, 0, 1390, '', 0, 1, '', 1, 0, 0, 1390, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-20 04:18:08', '2020-02-12 16:52:11'),
(16, 14, 0, 0, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 06:34:10', '2020-02-13 06:34:10'),
(17, 15, 0, 0, 0, '', 0, 0, '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-13 06:34:10', '2020-02-13 06:34:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_setting`
--
ALTER TABLE `branch_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_setting_branch_id_index` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `branch_setting`
--
ALTER TABLE `branch_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch_setting`
--
ALTER TABLE `branch_setting`
  ADD CONSTRAINT `branch_setting_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
