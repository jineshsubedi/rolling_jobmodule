-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2020 at 02:02 PM
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
-- Table structure for table `temporary_job_form`
--

CREATE TABLE `temporary_job_form` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `session_id` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_lable` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_menu` text COLLATE utf8mb4_unicode_ci,
  `requ` tinyint(1) DEFAULT NULL,
  `marks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_job_form`
--

INSERT INTO `temporary_job_form` (`id`, `parent_id`, `session_id`, `f_lable`, `f_type`, `list_menu`, `requ`, `marks`, `extra`) VALUES
(98, 0, '20180814035508', 'Experience Letter', 'file', '', 1, '', ''),
(99, 0, '20180814035508', 'Do you belong to Dalit or Ethnic/Marginalized/Disadvantaged caste group ?* (Madheshi, Terai Middle Caste Groups, Terai Janajatis and Religious Minorities)', 'select', 'Yes,No', 1, '5,0', ''),
(176, 0, '20190108025952', 'Type of Business', 'select', 'Propritership,Firm,Partnership', 1, '', ''),
(177, 0, '20190108025952', 'Upload your company registration', 'file', '', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `temp_file`
--

CREATE TABLE `temp_file` (
  `id` int(11) NOT NULL,
  `session_id` varchar(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `images` varchar(100) NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `others` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temporary_job_form`
--
ALTER TABLE `temporary_job_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_form_jobs_id_index` (`session_id`(191));

--
-- Indexes for table `temp_file`
--
ALTER TABLE `temp_file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temporary_job_form`
--
ALTER TABLE `temporary_job_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `temp_file`
--
ALTER TABLE `temp_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
