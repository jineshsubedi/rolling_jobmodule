-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2020 at 02:01 PM
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
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Finance Manager', '2018-05-28 01:35:56', '2018-05-28 01:35:56'),
(2, 'Rural Water Supply and Sanitation', '2018-06-01 13:31:11', '2018-06-01 13:31:11'),
(3, 'Water and Sanitation Sector', '2018-06-01 13:31:24', '2018-06-01 13:31:24'),
(4, 'communications', '2018-10-14 17:50:38', '2018-10-14 17:50:38'),
(5, 'Communications or  Marketing  or Public relations', '2018-10-14 17:50:49', '2018-10-14 18:03:05'),
(6, 'Marketing', '2018-10-14 17:51:00', '2018-10-14 17:51:00'),
(7, 'Public relations', '2018-10-14 17:51:28', '2018-10-14 17:51:28'),
(8, 'Gender Analysis and Programming ', '2018-10-14 18:09:39', '2018-10-14 18:09:39'),
(9, 'Direct Assistance through Case Management Process', '2018-10-14 18:10:21', '2018-10-14 18:10:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
