-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2020 at 12:29 PM
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
-- Database: `rollingp_hrmdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `saluation` int(11) DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverletter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temporary_address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_of` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trash` int(11) NOT NULL DEFAULT '0',
  `validation_token` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_verification` int(2) NOT NULL DEFAULT '0',
  `written_exam` int(2) NOT NULL DEFAULT '0',
  `group_discussion` int(2) NOT NULL DEFAULT '0',
  `final_interview` int(2) NOT NULL DEFAULT '0',
  `final_selection` int(2) NOT NULL DEFAULT '0',
  `age` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_experience` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu_marks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_marks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_marks` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participation` tinyint(2) DEFAULT '0',
  `message_text` text COLLATE utf8mb4_unicode_ci,
  `tracking_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_address`
--

CREATE TABLE `employee_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `permanent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temporary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_category`
--

CREATE TABLE `employee_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `job_category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_coverletter`
--

CREATE TABLE `employee_coverletter` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_education`
--

CREATE TABLE `employee_education` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `faculty_id` int(10) DEFAULT NULL,
  `status` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marksystem` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_experience`
--

CREATE TABLE `employee_experience` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(11) DEFAULT NULL,
  `sn` int(11) DEFAULT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeofemployment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_type_id` int(10) UNSIGNED NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `currently_working` int(11) DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duties` text COLLATE utf8mb4_unicode_ci,
  `experience` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_extra_data`
--

CREATE TABLE `employee_extra_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `employee_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strategic_paper` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `presentation_paper` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_files`
--

CREATE TABLE `employee_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_language`
--

CREATE TABLE `employee_language` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(11) DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `understand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_t` int(2) DEFAULT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_location`
--

CREATE TABLE `employee_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `job_location_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_organization`
--

CREATE TABLE `employee_organization` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `org_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_password_resets`
--

CREATE TABLE `employee_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_reference`
--

CREATE TABLE `employee_reference` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(11) DEFAULT NULL,
  `sn` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_registration`
--

CREATE TABLE `employee_registration` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_setting`
--

CREATE TABLE `employee_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `travel` int(11) DEFAULT NULL,
  `license` int(11) DEFAULT NULL,
  `licenseof` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relocation` int(11) DEFAULT NULL,
  `have_vehical` int(11) DEFAULT NULL,
  `vehical` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `searchable` int(11) DEFAULT NULL,
  `confidention` int(11) DEFAULT NULL,
  `alertable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_training`
--

CREATE TABLE `employee_training` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees_id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_history`
--

CREATE TABLE `employment_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(10) UNSIGNED NOT NULL,
  `department` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `promoted_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employment_history`
--

INSERT INTO `employment_history` (`id`, `staff_id`, `department`, `designation`, `promoted_date`, `created_at`, `updated_at`) VALUES
(1, 1224, 'Informantion Technology (IT)', 'Junior Officer-Java Developer', '2019-09-19', '2019-09-19 06:00:16', '2019-09-19 06:00:16'),
(2, 995, 'Human Resource', 'Senior Officer-Group HR', '2019-09-20', '2019-09-20 05:37:18', '2019-09-20 05:37:18'),
(3, 578, 'Rolling Contact Center', 'Contact Center Associate', '2019-09-20', '2019-09-20 05:43:24', '2019-09-20 05:43:24'),
(4, 811, 'Human Resource', 'Junior Officer- HR Service', '2019-09-20', '2019-09-20 06:12:44', '2019-09-20 06:12:44'),
(5, 877, 'Rolling Contact Center ( Business Office, Thapathali)', 'Officer-IT', '2019-09-20', '2019-09-20 06:17:08', '2019-09-20 06:17:08'),
(6, 994, 'Quality Assurance Department', 'Senior Officer-Quality Assurance Analyst', '2019-09-20', '2019-09-20 06:26:39', '2019-09-20 06:26:39'),
(7, 991, 'Human Resource', 'Senior Officer-Group HR', '2019-09-20', '2019-09-20 06:36:24', '2019-09-20 06:36:24'),
(8, 988, 'Account and Finance', 'Assistant-Procurement', '2019-09-20', '2019-09-20 06:50:17', '2019-09-20 06:50:17'),
(9, 990, 'Business Development', 'Officer-Business Development', '2019-09-20', '2019-09-20 06:55:04', '2019-09-20 06:55:04'),
(10, 1097, 'Business Development', 'Junior Officer-CRO', '2019-09-20', '2019-09-20 07:11:44', '2019-09-20 07:11:44'),
(11, 989, 'Human Resource', 'Assistant HR & Admin', '2019-09-20', '2019-09-20 07:15:00', '2019-09-20 07:15:00'),
(12, 987, 'Human Resource', 'Jr.Officer-Customer Service Desk', '2019-09-20', '2019-09-20 07:17:49', '2019-09-20 07:17:49'),
(13, 1028, 'Informantion Technology (IT)', 'Officer-PHP Programmer', '2019-09-20', '2019-09-20 07:21:04', '2019-09-20 07:21:04'),
(14, 992, 'Informantion Technology (IT)', 'Web-Designer-Part Time', '2019-09-20', '2019-09-20 07:23:03', '2019-09-20 07:23:03'),
(15, 644, 'Rolling Contact Center', 'Contact Center Associate', '2019-09-20', '2019-09-20 08:06:00', '2019-09-20 08:06:00'),
(16, 1226, 'Informantion Technology (IT)', 'Intern', '2019-09-23', '2019-09-23 03:52:12', '2019-09-23 03:52:12'),
(17, 677, 'B2C', 'Agents', '2019-09-24', '2019-09-24 05:15:50', '2019-09-24 05:15:50'),
(18, 777, 'B2C', 'Agents', '2019-09-24', '2019-09-24 05:16:20', '2019-09-24 05:16:20'),
(19, 500, 'B2C', 'Agents', '2019-09-24', '2019-09-24 06:30:47', '2019-09-24 06:30:47'),
(20, 814, 'B2C', 'Agents', '2019-09-24', '2019-09-24 06:31:56', '2019-09-24 06:31:56'),
(21, 1227, 'Human Resource', 'Assistant HR & Admin', '2019-09-24', '2019-09-24 07:03:24', '2019-09-24 07:03:24'),
(23, 1236, 'General Service Department', 'Office Assistant', '2019-09-25', '2019-09-25 05:53:52', '2019-09-25 05:53:52'),
(25, 1229, 'B2C', 'Agents', '2019-09-25', '2019-09-25 06:48:12', '2019-09-25 06:48:12'),
(26, 1230, 'B2C', 'Agents', '2019-09-25', '2019-09-25 06:49:51', '2019-09-25 06:49:51'),
(27, 1231, 'B2C', 'Agents', '2019-09-25', '2019-09-25 06:51:26', '2019-09-25 06:51:26'),
(28, 1232, 'B2C', 'Agents', '2019-09-25', '2019-09-25 06:53:26', '2019-09-25 06:53:26'),
(29, 1233, 'B2C', 'Agents', '2019-09-25', '2019-09-25 06:55:12', '2019-09-25 06:55:12'),
(30, 1238, 'B2C', 'Agents', '2019-09-25', '2019-09-25 07:03:05', '2019-09-25 07:03:05'),
(31, 1240, 'B2C', 'Agents', '2019-09-25', '2019-09-25 07:24:42', '2019-09-25 07:24:42'),
(32, 1241, 'B2C', 'Agents', '2019-09-25', '2019-09-25 07:28:37', '2019-09-25 07:28:37'),
(33, 1242, 'B2C', 'Agents', '2019-09-25', '2019-09-25 07:32:02', '2019-09-25 07:32:02'),
(34, 1243, 'B2C', 'Agents', '2019-09-25', '2019-09-25 07:36:55', '2019-09-25 07:36:55'),
(35, 1244, 'B2C', 'Agents', '2019-09-25', '2019-09-25 07:40:46', '2019-09-25 07:40:46'),
(36, 1245, 'B2C', 'Agents', '2019-09-25', '2019-09-25 07:49:14', '2019-09-25 07:49:14'),
(37, 786, 'Senior Management Team', 'Chairman', '2019-09-25', '2019-09-25 07:50:12', '2019-09-25 07:50:12'),
(38, 1246, 'B2C', 'Agents', '2019-09-25', '2019-09-25 07:53:35', '2019-09-25 07:53:35'),
(39, 1228, 'B2C', 'Agents', '2019-09-25', '2019-09-25 07:59:10', '2019-09-25 07:59:10'),
(40, 1247, 'B2C', 'Agents', '2019-09-25', '2019-09-25 08:24:42', '2019-09-25 08:24:42'),
(41, 1249, 'B2C', 'Agents', '2019-09-25', '2019-09-25 08:31:01', '2019-09-25 08:31:01'),
(42, 1250, 'B2C', 'Agents', '2019-09-25', '2019-09-25 08:36:09', '2019-09-25 08:36:09'),
(43, 1251, 'B2C', 'Agents', '2019-09-25', '2019-09-25 08:40:29', '2019-09-25 08:40:29'),
(44, 525, 'Supervisors/Quality Team', 'Supervisor', '2019-09-27', '2019-09-27 07:48:54', '2019-09-27 07:48:54'),
(45, 817, 'Nabil Customer Care Center', 'Senior Officer-Call Center Operations Head', '2019-10-01', '2019-10-01 07:23:49', '2019-10-01 07:23:49'),
(46, 1248, 'B2C', 'Agents', '2019-10-01', '2019-10-01 07:56:04', '2019-10-01 07:56:04'),
(47, 1167, 'Valley', 'HR Officer', '2019-10-02', '2019-10-02 06:17:02', '2019-10-02 06:17:02'),
(48, 1196, 'Valley', 'SEC', '2019-10-02', '2019-10-02 06:53:37', '2019-10-02 06:53:37'),
(49, 1167, 'Valley', 'SEC', '2019-10-02', '2019-10-02 06:55:15', '2019-10-02 06:55:15'),
(50, 1100, 'Western Region', 'Supervisor', '2019-10-02', '2019-10-02 09:30:54', '2019-10-02 09:30:54'),
(51, 1125, 'Valley', 'Supervisor', '2019-10-02', '2019-10-02 09:32:08', '2019-10-02 09:32:08'),
(52, 1056, 'Western Region', 'Supervisor', '2019-10-02', '2019-10-02 09:33:03', '2019-10-02 09:33:03'),
(53, 1000, 'B2C', 'Agents', '2019-10-02', '2019-10-02 11:59:40', '2019-10-02 11:59:40'),
(54, 789, 'Account and Finance', 'Manager-Account and Finance', '2019-10-03', '2019-10-03 08:55:16', '2019-10-03 08:55:16'),
(55, 993, 'General Service Department', 'Office Assistant', '2019-10-04', '2019-10-04 04:34:10', '2019-10-04 04:34:10'),
(56, 1239, 'Rolling Contact Center', 'Contact Center Associate', '2019-10-10', '2019-10-10 10:38:51', '2019-10-10 10:38:51'),
(57, 944, 'B2C', 'Agents', '2019-10-15', '2019-10-15 06:43:36', '2019-10-15 06:43:36'),
(58, 529, 'Rolling Contact Center', 'Contact Center Associate', '2019-10-15', '2019-10-15 06:58:08', '2019-10-15 06:58:08'),
(59, 947, 'B2C', 'Agents', '2019-10-15', '2019-10-15 07:09:42', '2019-10-15 07:09:42'),
(60, 827, 'Rolling Contact Center', 'Contact Center Associate', '2019-10-15', '2019-10-15 07:16:32', '2019-10-15 07:16:32'),
(61, 581, 'Rolling Contact Center', 'Contact Center Associate', '2019-10-15', '2019-10-15 07:26:02', '2019-10-15 07:26:02'),
(62, 663, 'Rolling Contact Center', 'Contact Center Associate', '2019-10-15', '2019-10-15 08:01:05', '2019-10-15 08:01:05'),
(63, 689, 'Rolling Contact Center', 'Contact Center Associate', '2019-10-15', '2019-10-15 08:09:08', '2019-10-15 08:09:08'),
(64, 863, 'B2C', 'Agents', '2019-10-15', '2019-10-15 08:17:49', '2019-10-15 08:17:49'),
(65, 828, 'Rolling Contact Center', 'Contact Center Associate', '2019-10-22', '2019-10-22 04:50:03', '2019-10-22 04:50:03'),
(66, 960, 'B2C', 'Agents', '2019-10-22', '2019-10-22 04:50:45', '2019-10-22 04:50:45'),
(67, 696, 'Rolling Contact Center', 'Contact Center Associate', '2019-10-22', '2019-10-22 04:52:10', '2019-10-22 04:52:10'),
(68, 1252, 'Norway School Project', 'Associate District Engineer', '2019-10-24', '2019-10-24 04:12:23', '2019-10-24 04:12:23'),
(69, 783, 'Senior Management Team', 'General Manager-HR & Operations', '2019-10-25', '2019-10-25 04:08:19', '2019-10-25 04:08:19'),
(70, 935, 'Call Centre Representative', 'CCR', '2019-10-30', '2019-10-30 04:28:12', '2019-10-30 04:28:12'),
(71, 926, 'Customer Service Representative', 'Supervisor', '2019-10-31', '2019-10-31 08:51:37', '2019-10-31 08:51:37'),
(72, 1226, 'Information Technology (IT)', 'Intern', '2019-11-03', '2019-11-03 10:31:07', '2019-11-03 10:31:07'),
(73, 1224, 'Information Technology (IT)', 'Junior Officer-Java Developer', '2019-11-04', '2019-11-04 06:47:23', '2019-11-04 06:47:23'),
(74, 804, 'Information Technology (IT)', 'Manager-IT', '2019-11-05', '2019-11-05 09:13:56', '2019-11-05 09:13:56'),
(75, 1295, 'B2C', 'Agents', '2019-11-06', '2019-11-06 05:44:21', '2019-11-06 05:44:21'),
(76, 1296, 'B2C', 'Agents', '2019-11-06', '2019-11-06 05:50:26', '2019-11-06 05:50:26'),
(77, 1297, 'B2C', 'Agents', '2019-11-06', '2019-11-06 06:04:06', '2019-11-06 06:04:06'),
(78, 1298, 'B2C', 'Agents', '2019-11-06', '2019-11-06 06:15:21', '2019-11-06 06:15:21'),
(79, 1299, 'B2C', 'Agents', '2019-11-06', '2019-11-06 06:19:45', '2019-11-06 06:19:45'),
(80, 1300, 'B2C', 'Agents', '2019-11-06', '2019-11-06 06:25:46', '2019-11-06 06:25:46'),
(81, 1301, 'B2C', 'Agents', '2019-11-06', '2019-11-06 06:31:20', '2019-11-06 06:31:20'),
(82, 1314, 'B2C', 'Agents', '2019-11-08', '2019-11-08 05:26:39', '2019-11-08 05:26:39'),
(83, 1315, 'B2C', 'Agents', '2019-11-08', '2019-11-08 05:30:44', '2019-11-08 05:30:44'),
(84, 1305, 'BM', 'Snr. Manager', '2019-11-08', '2019-11-08 06:36:39', '2019-11-08 06:36:39'),
(85, 1317, 'B2C', 'Agents', '2019-11-08', '2019-11-08 06:52:02', '2019-11-08 06:52:02'),
(86, 1318, 'B2C', 'Agents', '2019-11-08', '2019-11-08 06:55:26', '2019-11-08 06:55:26'),
(87, 1319, 'B2C', 'Agents', '2019-11-08', '2019-11-08 07:03:47', '2019-11-08 07:03:47'),
(88, 1320, 'B2C', 'Agents', '2019-11-08', '2019-11-08 07:08:37', '2019-11-08 07:08:37'),
(89, 1004, 'B2C', 'Agents', '2019-11-08', '2019-11-08 07:11:54', '2019-11-08 07:11:54'),
(90, 1322, 'B2C', 'Agents', '2019-11-08', '2019-11-08 07:15:38', '2019-11-08 07:15:38'),
(91, 937, 'Call Centre Representative', 'CCR', '2019-11-08', '2019-11-08 08:17:19', '2019-11-08 08:17:19'),
(92, 792, 'Rolling Contact Center ( Business Office, Thapathali)', 'Senior Officer-IT Supervisor', '2019-11-10', '2019-11-10 06:05:08', '2019-11-10 06:05:08'),
(93, 797, 'Rolling Contact Center ( Business Office, Thapathali)', 'Officer-IT', '2019-11-10', '2019-11-10 06:08:32', '2019-11-10 06:08:32'),
(94, 1325, 'B2C', 'Agents', '2019-11-10', '2019-11-10 09:18:07', '2019-11-10 09:18:07'),
(95, 1326, 'B2C', 'Agents', '2019-11-10', '2019-11-10 09:21:06', '2019-11-10 09:21:06'),
(96, 1327, 'B2C', 'Agents', '2019-11-10', '2019-11-10 09:26:13', '2019-11-10 09:26:13'),
(97, 1328, 'B2C', 'Agents', '2019-11-10', '2019-11-10 09:49:18', '2019-11-10 09:49:18'),
(98, 1329, 'B2C', 'Agents', '2019-11-10', '2019-11-10 09:53:28', '2019-11-10 09:53:28'),
(99, 1330, 'B2C', 'Agents', '2019-11-10', '2019-11-10 09:56:32', '2019-11-10 09:56:32'),
(100, 1331, 'B2C', 'Agents', '2019-11-11', '2019-11-11 09:14:57', '2019-11-11 09:14:57'),
(101, 1323, 'Call Centre Representative', 'CCR', '2019-11-12', '2019-11-12 11:15:45', '2019-11-12 11:15:45'),
(102, 1324, 'Call Centre Representative', 'CCR', '2019-11-12', '2019-11-12 11:16:40', '2019-11-12 11:16:40'),
(103, 1287, '', 'Admin Officer', '2019-11-13', '2019-11-13 05:54:08', '2019-11-13 05:54:08'),
(104, 1288, '', 'Admin Officer', '2019-11-13', '2019-11-13 06:05:07', '2019-11-13 06:05:07'),
(105, 1289, '', 'Admin Officer', '2019-11-13', '2019-11-13 06:07:13', '2019-11-13 06:07:13'),
(106, 1290, '', 'Admin Officer', '2019-11-13', '2019-11-13 06:22:22', '2019-11-13 06:22:22'),
(107, 1291, '', 'Admin Officer', '2019-11-13', '2019-11-13 06:28:43', '2019-11-13 06:28:43'),
(108, 1292, '', 'Admin Officer', '2019-11-13', '2019-11-13 06:30:13', '2019-11-13 06:30:13'),
(109, 1293, '', 'Admin Officer', '2019-11-13', '2019-11-13 06:42:39', '2019-11-13 06:42:39'),
(110, 1294, '', 'Admin Officer', '2019-11-13', '2019-11-13 06:45:24', '2019-11-13 06:45:24'),
(111, 892, 'B2C', 'Agents', '2019-11-14', '2019-11-14 05:49:41', '2019-11-14 05:49:41'),
(112, 794, 'Rolling Contact Center ( Business Office, Thapathali)', 'Senior Officer-HR', '2019-11-14', '2019-11-14 06:57:30', '2019-11-14 06:57:30'),
(113, 803, 'Rolling Contact Center ( Business Office, Thapathali)', 'Manager-Operations', '2019-11-14', '2019-11-14 07:03:39', '2019-11-14 07:03:39'),
(114, 795, 'Account and Finance', 'Senior Manager-Account and Finance', '2019-11-14', '2019-11-14 07:33:25', '2019-11-14 07:33:25'),
(115, 807, 'Information Technology (IT)', 'Senior Officer-Web Developer', '2019-11-14', '2019-11-14 07:35:04', '2019-11-14 07:35:04'),
(116, 793, 'Rolling Contact Center ( Business Office, Thapathali)', 'Senior Manager-Call Center Operations (Unit Head)', '2019-11-14', '2019-11-14 07:37:40', '2019-11-14 07:37:40'),
(117, 790, 'Nabil Customer Care Center', 'Senior Officer-Quality and Admin', '2019-11-14', '2019-11-14 07:40:37', '2019-11-14 07:40:37'),
(118, 809, 'Human Resource', 'Jr.Officer-Customer Service Desk', '2019-11-14', '2019-11-14 07:41:50', '2019-11-14 07:41:50'),
(119, 802, 'General Service Department', 'Senior Officer-Procurement', '2019-11-14', '2019-11-14 07:42:23', '2019-11-14 07:42:23'),
(120, 800, 'Business Development', 'Manager-Business Development', '2019-11-14', '2019-11-14 08:33:06', '2019-11-14 08:33:06'),
(121, 801, 'Human Resource', 'Senior Officer-Administrator', '2019-11-14', '2019-11-14 08:35:13', '2019-11-14 08:35:13'),
(122, 805, 'Human Resource', 'Senior Officer-HR', '2019-11-14', '2019-11-14 08:35:40', '2019-11-14 08:35:40'),
(123, 791, 'General Service Department', 'Junior Officer-Procurement', '2019-11-15', '2019-11-15 08:42:17', '2019-11-15 08:42:17'),
(124, 927, 'Customer Service Representative', 'CSR', '2019-11-17', '2019-11-17 07:02:24', '2019-11-17 07:02:24'),
(125, 928, 'Customer Service Representative', 'CSR', '2019-11-17', '2019-11-17 07:03:39', '2019-11-17 07:03:39'),
(126, 929, 'Customer Service Representative', 'CSR', '2019-11-17', '2019-11-17 07:04:22', '2019-11-17 07:04:22'),
(127, 930, 'Customer Service Representative', 'CSR', '2019-11-17', '2019-11-17 07:05:12', '2019-11-17 07:05:12'),
(128, 931, 'Customer Service Representative', 'CSR', '2019-11-17', '2019-11-17 07:05:47', '2019-11-17 07:05:47'),
(129, 932, 'Customer Service Representative', 'CSR', '2019-11-17', '2019-11-17 07:07:53', '2019-11-17 07:07:53'),
(130, 933, 'Customer Service Representative', 'CSR', '2019-11-17', '2019-11-17 07:08:28', '2019-11-17 07:08:28'),
(131, 934, 'Customer Service Representative', 'CSR', '2019-11-17', '2019-11-17 07:09:20', '2019-11-17 07:09:20'),
(132, 810, 'Human Resource', 'Assistant HR & Admin', '2019-11-19', '2019-11-19 03:54:22', '2019-11-19 03:54:22'),
(133, 798, 'Rolling Contact Center ( Business Office, Thapathali)', 'Officer-Electrician', '2019-11-20', '2019-11-20 09:30:26', '2019-11-20 09:30:26'),
(134, 1308, 'BM', 'Snr. PRO', '2019-11-21', '2019-11-21 10:29:57', '2019-11-21 10:29:57'),
(135, 1337, 'BM', 'Officer-Documentation', '2019-11-21', '2019-11-21 14:23:36', '2019-11-21 14:23:36'),
(136, 1307, 'BM', 'Manager', '2019-11-21', '2019-11-21 14:26:07', '2019-11-21 14:26:07'),
(137, 1310, 'BM', 'Senior Officer-PR', '2019-11-21', '2019-11-21 14:26:39', '2019-11-21 14:26:39'),
(138, 880, 'BM', 'Officer-Documentation', '2019-11-21', '2019-11-21 14:27:22', '2019-11-21 14:27:22'),
(139, 1312, 'BM', 'Officer-PR', '2019-11-21', '2019-11-21 14:28:17', '2019-11-21 14:28:17'),
(140, 1308, 'BM', 'Senior Officer-PR', '2019-11-21', '2019-11-21 14:29:06', '2019-11-21 14:29:06'),
(141, 1305, 'BM', 'General Manager', '2019-11-21', '2019-11-21 14:43:17', '2019-11-21 14:43:17'),
(142, 1338, 'BM', 'Receptionist', '2019-11-21', '2019-11-21 14:43:48', '2019-11-21 14:43:48'),
(143, 1309, 'BM', 'Senior Officer-PR', '2019-11-21', '2019-11-21 14:44:33', '2019-11-21 14:44:33'),
(144, 1311, 'BM', 'Senior Officer-PR', '2019-11-21', '2019-11-21 14:45:00', '2019-11-21 14:45:00'),
(145, 653, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-22', '2019-11-22 07:21:33', '2019-11-22 07:21:33'),
(146, 588, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-22', '2019-11-22 07:43:22', '2019-11-22 07:43:22'),
(147, 666, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-22', '2019-11-22 08:20:31', '2019-11-22 08:20:31'),
(148, 654, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-22', '2019-11-22 08:30:39', '2019-11-22 08:30:39'),
(149, 583, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-22', '2019-11-22 08:40:12', '2019-11-22 08:40:12'),
(150, 695, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-22', '2019-11-22 08:49:14', '2019-11-22 08:49:14'),
(151, 760, 'Rolling Contact Center', 'Quality Coach', '2019-11-24', '2019-11-24 09:12:45', '2019-11-24 09:12:45'),
(152, 759, 'Rolling Contact Center', 'Quality Associates', '2019-11-24', '2019-11-24 09:13:30', '2019-11-24 09:13:30'),
(153, 716, 'Rolling Contact Center', 'Quality Associates', '2019-11-24', '2019-11-24 09:16:03', '2019-11-24 09:16:03'),
(154, 1340, 'BM', 'Chairman', '2019-11-25', '2019-11-25 04:29:57', '2019-11-25 04:29:57'),
(155, 1339, 'Supervisors/Quality Team', 'Quality Coach', '2019-11-25', '2019-11-25 06:35:28', '2019-11-25 06:35:28'),
(156, 1339, 'Supervisors/Quality Team', 'Supervisor', '2019-11-25', '2019-11-25 06:38:47', '2019-11-25 06:38:47'),
(157, 788, 'Senior Management Team', 'CEO', '2019-11-27', '2019-11-27 05:07:38', '2019-11-27 05:07:38'),
(158, 1, 'Information Technology (IT)', 'Intern', '2019-11-27', '2019-11-27 07:33:19', '2019-11-27 07:33:19'),
(159, 556, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 04:20:43', '2019-11-28 04:20:43'),
(160, 688, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 04:30:18', '2019-11-28 04:30:18'),
(161, 564, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 04:40:46', '2019-11-28 04:40:46'),
(162, 660, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 04:53:24', '2019-11-28 04:53:24'),
(163, 627, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 05:07:56', '2019-11-28 05:07:56'),
(164, 702, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 05:25:02', '2019-11-28 05:25:02'),
(165, 569, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 05:33:52', '2019-11-28 05:33:52'),
(166, 593, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 05:41:15', '2019-11-28 05:41:15'),
(167, 636, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 05:50:05', '2019-11-28 05:50:05'),
(168, 712, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 06:16:46', '2019-11-28 06:16:46'),
(169, 504, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 06:46:00', '2019-11-28 06:46:00'),
(170, 522, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 06:54:16', '2019-11-28 06:54:16'),
(171, 671, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 07:09:47', '2019-11-28 07:09:47'),
(172, 672, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 07:18:49', '2019-11-28 07:18:49'),
(173, 681, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 07:56:26', '2019-11-28 07:56:26'),
(174, 704, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 08:05:26', '2019-11-28 08:05:26'),
(175, 705, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 08:13:43', '2019-11-28 08:13:43'),
(176, 515, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 08:20:58', '2019-11-28 08:20:58'),
(177, 669, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-28', '2019-11-28 08:24:03', '2019-11-28 08:24:03'),
(178, 512, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-29', '2019-11-29 07:25:46', '2019-11-29 07:25:46'),
(179, 537, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-29', '2019-11-29 07:35:06', '2019-11-29 07:35:06'),
(180, 555, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-29', '2019-11-29 07:43:46', '2019-11-29 07:43:46'),
(181, 690, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-29', '2019-11-29 07:57:10', '2019-11-29 07:57:10'),
(182, 706, 'Rolling Contact Center', 'Contact Center Associate', '2019-11-29', '2019-11-29 08:08:31', '2019-11-29 08:08:31'),
(183, 841, 'Rolling Contact Center', 'Back Office - TT Call Back', '2019-11-29', '2019-11-29 12:09:58', '2019-11-29 12:09:58'),
(184, 1321, 'B2C', 'Agents', '2019-11-30', '2019-11-30 11:03:13', '2019-11-30 11:03:13'),
(185, 755, 'Supervisors/Quality Team', 'Supervisor', '2019-12-07', '2019-12-07 13:10:01', '2019-12-07 13:10:01'),
(186, 756, 'Supervisors/Quality Team', 'Supervisor', '2019-12-07', '2019-12-07 13:10:30', '2019-12-07 13:10:30'),
(187, 992, 'Information Technology (IT)', 'Web-Designer-Part Time', '2019-12-09', '2019-12-09 09:57:53', '2019-12-09 09:57:53'),
(188, 1028, 'Information Technology (IT)', 'Officer-PHP Programmer', '2019-12-09', '2019-12-09 10:16:16', '2019-12-09 10:16:16'),
(189, 552, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-10', '2019-12-10 08:34:09', '2019-12-10 08:34:09'),
(190, 683, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-10', '2019-12-10 08:34:50', '2019-12-10 08:34:50'),
(191, 842, 'B2C', 'Agents', '2019-12-10', '2019-12-10 08:35:15', '2019-12-10 08:35:15'),
(192, 575, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-10', '2019-12-10 08:37:27', '2019-12-10 08:37:27'),
(193, 635, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-10', '2019-12-10 08:37:56', '2019-12-10 08:37:56'),
(194, 711, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-10', '2019-12-10 08:38:20', '2019-12-10 08:38:20'),
(195, 881, 'B2C', 'Agents', '2019-12-10', '2019-12-10 08:40:20', '2019-12-10 08:40:20'),
(196, 895, 'B2C', 'Agents', '2019-12-10', '2019-12-10 08:41:16', '2019-12-10 08:41:16'),
(197, 1020, 'B2C', 'Agents', '2019-12-12', '2019-12-12 05:30:28', '2019-12-12 05:30:28'),
(198, 590, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-12', '2019-12-12 06:10:34', '2019-12-12 06:10:34'),
(199, 607, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-12', '2019-12-12 06:31:34', '2019-12-12 06:31:34'),
(200, 659, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-12', '2019-12-12 06:43:34', '2019-12-12 06:43:34'),
(201, 553, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-12', '2019-12-12 07:07:41', '2019-12-12 07:07:41'),
(202, 617, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-12', '2019-12-12 07:17:16', '2019-12-12 07:17:16'),
(203, 592, 'Rolling Contact Center', 'Contact Center Associate', '2019-12-12', '2019-12-12 07:21:57', '2019-12-12 07:21:57'),
(204, 873, 'Information Technology (IT)', 'Junior Officer-Designer', '2020-01-08', '2020-01-08 05:55:49', '2020-01-08 05:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `title`, `created_at`, `updated_at`) VALUES
(4, 'nervous', '2020-01-03 04:58:21', '2020-01-03 04:58:21'),
(5, 'style', '2020-01-03 04:58:21', '2020-01-03 04:58:21'),
(6, 'skill', '2020-01-03 04:58:21', '2020-01-03 04:58:21'),
(7, 'timing', '2020-01-03 04:58:21', '2020-01-03 04:58:21'),
(8, 'Overall Performance ', '2020-01-03 04:58:21', '2020-01-03 04:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `event_evaluator`
--

CREATE TABLE `event_evaluator` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_evaluator`
--

INSERT INTO `event_evaluator` (`id`, `branch_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Gyan Raj Panti', '2020-01-03 04:59:01', '2020-01-03 04:59:01'),
(2, 2, 'Purna Bahadur Dangal', '2020-01-03 04:59:01', '2020-01-03 04:59:01'),
(3, 2, 'anup jangam', '2020-01-03 04:59:01', '2020-01-03 04:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `event_mark`
--

CREATE TABLE `event_mark` (
  `id` int(10) UNSIGNED NOT NULL,
  `participant_id` int(10) UNSIGNED NOT NULL,
  `evaluator_id` int(10) UNSIGNED NOT NULL,
  `markOnCategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `average` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_mark`
--

INSERT INTO `event_mark` (`id`, `participant_id`, `evaluator_id`, `markOnCategory`, `average`, `total`, `created_at`, `updated_at`) VALUES
(14, 1, 3, '[{\"category_id\":\"4\",\"point\":\"20\"},{\"category_id\":\"8\",\"point\":\"20\"},{\"category_id\":\"6\",\"point\":\"20\"},{\"category_id\":\"5\",\"point\":\"20\"},{\"category_id\":\"7\",\"point\":\"20\"}]', 20.00, 100.00, '2020-01-03 05:00:29', '2020-01-03 05:00:29'),
(15, 1, 1, '[{\"category_id\":\"4\",\"point\":\"20\"},{\"category_id\":\"8\",\"point\":\"20\"},{\"category_id\":\"6\",\"point\":\"20\"},{\"category_id\":\"5\",\"point\":\"20\"},{\"category_id\":\"7\",\"point\":\"20\"}]', 20.00, 100.00, '2020-01-03 05:18:09', '2020-01-03 05:21:43'),
(16, 2, 1, '[{\"category_id\":\"4\",\"point\":\"20\"},{\"category_id\":\"8\",\"point\":\"20\"},{\"category_id\":\"6\",\"point\":\"20\"},{\"category_id\":\"5\",\"point\":\"20\"},{\"category_id\":\"7\",\"point\":\"20\"}]', 20.00, 100.00, '2020-01-03 05:22:20', '2020-01-03 05:22:20'),
(17, 4, 1, '[{\"category_id\":\"4\",\"point\":\"20\"},{\"category_id\":\"8\",\"point\":\"20\"},{\"category_id\":\"6\",\"point\":\"20\"},{\"category_id\":\"5\",\"point\":\"20\"},{\"category_id\":\"7\",\"point\":\"20\"}]', 20.00, 100.00, '2020-01-03 05:23:48', '2020-01-03 05:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `event_participant`
--

CREATE TABLE `event_participant` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vote` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_participant`
--

INSERT INTO `event_participant` (`id`, `branch_id`, `name`, `vote`, `created_at`, `updated_at`) VALUES
(1, 2, 'raju', 2, '2020-01-03 04:58:44', '2020-01-03 11:10:32'),
(2, 2, 'purna', 3, '2020-01-03 04:58:44', '2020-01-03 10:43:12'),
(3, 2, 'jinesh', 2, '2020-01-03 04:58:44', '2020-01-03 10:51:21'),
(4, 2, 'obyesh', 4, '2020-01-03 04:58:44', '2020-01-03 10:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `exam_syllabus`
--

CREATE TABLE `exam_syllabus` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `syllabus` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_syllabus`
--

INSERT INTO `exam_syllabus` (`id`, `jobs_id`, `syllabus`, `created_at`, `updated_at`) VALUES
(3, 22, '<table align=\"left\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"height:202px; width:494px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:21px; text-align:center; width:238px\"><strong>Date of Registration</strong></td>\r\n			<td style=\"height:21px; width:308px\"><strong>&nbsp;July 2, 2018 &ndash; Monday</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:21px; text-align:center; width:238px\"><strong>&nbsp;Date of Written Examination</strong></td>\r\n			<td style=\"height:21px; width:308px\"><strong>&nbsp;July 2, 2018 &ndash; Monday</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:19px; width:238px\"><strong>&nbsp;Registration and document verification time</strong></td>\r\n			<td style=\"height:19px; width:308px\"><strong>&nbsp;8:00 AM- 9:00 AM</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:21px; width:238px\"><strong>&nbsp;Written Examination time</strong></td>\r\n			<td style=\"height:21px; width:308px\"><strong>&nbsp;9:00 AM &ndash; 10:30 AM (90 mins)</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:21px; width:238px\"><strong>&nbsp;Presentation time</strong></td>\r\n			<td style=\"height:21px; width:308px\"><strong>&nbsp;10:30 AM&ndash; 11:00 AM&nbsp; (30 mins)</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:40px; width:238px\"><strong>&nbsp;Venue of Examination</strong></td>\r\n			<td style=\"height:40px; width:308px\"><strong>&nbsp;Head Office - Rolling Plans Pvt. Ltd- Bijulibazar-10, Kathmandu (Near NB Bank)</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div style=\"text-align: justify;\"><br />\r\n<br />\r\n<br />\r\n<br />\r\n&nbsp;<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\nFor the registration to attend in Written Examination, you should be present with the following documents&nbsp;<strong>(photo copies as well as originals) </strong>mandatory:&nbsp;</div>\r\n1. Curriculum Vitae (CV)<br />\r\n2. 2 pp. size photographs<br />\r\n3. Bachelor&rsquo;s &amp; Master&rsquo;s Transcripts and Character Certificate<br />\r\n4. Citizenship certificate<br />\r\n5. All experience letters and testimonials supporting to job application', '2018-06-28 22:13:41', '2018-06-28 22:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `exit_interview`
--

CREATE TABLE `exit_interview` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `staffs_id` int(11) NOT NULL,
  `staffs_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interview_date` date NOT NULL,
  `service_tenure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `received_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exit_interview`
--

INSERT INTO `exit_interview` (`id`, `branch_id`, `staffs_id`, `staffs_name`, `interview_date`, `service_tenure`, `received_by`, `description`, `created_at`, `updated_at`) VALUES
(3, 1, 547, 'DILIP KHADAYAT', '2019-05-20', '0 years, 7 months, 6 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Further Studies\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory \"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Salary Increment\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Friend Circle\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"No Comment\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comments\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comments\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-06-22 12:00:42', '2019-06-22 12:14:00'),
(4, 1, 662, 'SAPANA PAUDYAL', '2019-05-20', '1 years, 2 months, 2 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Job Switch\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory \"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Satisfying\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Working Environment\\/ Team Work\\/ Friendly Environment\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"No Comment\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-06-22 12:06:32', '2019-06-22 12:06:32'),
(5, 1, 549, 'DIPEN LIMBU', '2019-05-20', '1 years, 10 months, 22 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Further Studies\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory \"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Satisfying \"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Friendly Environment\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Need Improvement on Supervisors  Behavior\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-06-22 12:10:37', '2019-06-22 12:10:37'),
(6, 1, 638, 'SABINA THAPA MAGAR', '2019-06-10', '0 years, 8 months, 4 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Further Studies\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory \"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Satisfying\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Friends\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"No Comment\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"Its employee  decision to quit\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comments\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-06-22 12:13:42', '2019-06-22 12:14:38'),
(7, 1, 599, 'NISCHAL TAMANG', '2019-06-12', '2017 years, 0 months, 14 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Further Studies\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Overall Satisfying \"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Timing\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till Date\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment \"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"If Quality Team from Ncell would provide time for entire working agents as a feedback session that would be more fruitful rather than coordinating with only selective agents. That will help agents to know where they need to improve and achieve the target set by company as well as self target related to quality score.\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-19 11:55:09', '2019-08-19 11:55:09'),
(8, 1, 752, 'SABINA BHELE', '2019-06-13', '5 years, 10 months, 11 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Job Switch\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory \"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Its Satisfying \"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Motivation plans and support by entire teams. \"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"Self choice. So no comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"Focus more motivational plans for agents.\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-19 11:58:30', '2019-08-19 11:58:30'),
(9, 1, 506, 'AMAN KHADKA', '2019-06-14', '0 years, 7 months, 10 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Abroad apply.\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfying.\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"If Possible request with management team to increase break hours for part timer.\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Friend circle and working environment\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Overtime pressure by supervisor.\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes.\"}]', '2019-08-19 12:01:47', '2019-08-19 12:01:47'),
(10, 1, 647, 'SAMJHANA MOKTAN', '2019-06-24', '0 years, 8 months, 24 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Family Issues\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Overall Satisfying.\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\" On time salary payment \\/ Friend circle.\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Supervisors loud voice for controlling the AUX.\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No comment. \"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No comment. \"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-19 12:04:58', '2019-08-19 12:04:58'),
(11, 1, 523, 'BEEMA KHADKA', '2019-06-24', '0 years, 7 months, 9 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Health Issues\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"If Management could request supervisor to provide short session regarding new products after lunched by the Ncell than that would be more fruitful rather than sharing information via mail. It will help agents to understand exactly what they need to deliver with customers. \"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Friendly Environment\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment because its my self decisions to leave the organisation.\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"Salary structure. \"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes.\"}]', '2019-08-19 12:10:10', '2019-08-19 12:10:10'),
(12, 1, 601, 'NISHAN KHADKA', '2019-07-04', '1 years, 10 months, 14 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Job Switch\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"It would be better if floor monitoring regarding PCs, Headset, chair are checked and maintained regular basis.  \"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Friend Circle\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"No comment\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"Salary Increment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"Fix of PCs and chairs ASAP on regular basis and if we could manage headcount and provide leave for sick agents with priority .\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-19 12:26:48', '2019-08-19 12:26:48'),
(13, 1, 613, 'PUJA BHANDARI', '2019-07-05', '0 years, 8 months, 22 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Health Issues\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"No Comment\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Time Value\\/ Rules & Regulation and working environment.\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes.\"}]', '2019-08-19 12:35:01', '2019-08-19 12:35:01'),
(14, 1, 624, 'RAMILA KUMARI BOHORA', '2019-07-05', '1 years, 1 months, 23 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Health Issuse\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Overall Satisfying\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Working Environment.\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"Nothing, Because its my self choice.\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"NO need of changes its working fine.\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes.\"}]', '2019-08-19 12:39:06', '2019-08-19 12:39:06'),
(15, 1, 602, 'PARBATI DOLMA LAMA', '2019-07-05', '1 years, 1 months, 20 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Mother Health Issues\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory.\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Satisfactory\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Rules & Regulation\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date.\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"NO Comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-19 12:47:15', '2019-08-19 12:47:15'),
(16, 1, 539, 'CHIRANJIVI BHANDARI', '2019-07-05', '0 years, 11 months, 8 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Further Studies\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"AUX need to be granted. 20 min is too short for part timer.\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Got change to work with such reputed company. \"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Supervisor shouting at floor.\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-19 12:51:58', '2019-08-19 12:51:58'),
(17, 1, 605, 'PRADIP BHATT', '2019-07-05', '1 years, 2 months, 11 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Further Studies\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"If possible increment with salary.\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Dealing with customers.\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-19 12:59:22', '2019-08-19 12:59:22'),
(18, 1, 647, 'SAMJHANA MOKTAN', '2019-08-05', '0 years, 8 months, 24 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Family Issues\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Satisfactory\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Dealing with customers\\/ Work Experience\\r\\n\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"No Comment\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"Everything is fine.\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes.\"}]', '2019-08-19 13:03:29', '2019-08-19 13:03:29'),
(19, 1, 502, 'AKSHAY KUMAR CHAUDHARY', '2019-07-11', '1 years, 0 months, 1 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Job Switch\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"They are performing well with phase of time.\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"It\\u2019s a good platform for fresher. They get change to groom themselves and working environment.\\r\\n\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date.\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment.\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment.\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-20 05:29:14', '2019-08-20 05:29:14'),
(20, 1, 658, 'SANTOSH RANA BHAT', '2019-07-12', '0 years, 9 months, 2 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Further Studies\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"No Comment\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Got change to develop self skills\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date.\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No comment.\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-20 05:33:38', '2019-08-20 05:33:38'),
(21, 1, 532, 'BIMALA SHRESTHA ', '2019-07-19', '1 years, 6 months, 8 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Further Studies\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"No Comment\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Customer Experience\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment because its my self choice.\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-20 05:37:00', '2019-08-20 05:37:00'),
(22, 1, 639, 'SABINA TITUNG', '2019-07-22', '1 years, 2 months, 11 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Self Business\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Management is supportive with agents.\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Handling Customers, Self grooming.\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date.\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"PCs.\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-20 05:40:52', '2019-08-20 05:40:52'),
(23, 1, 514, 'ANKIT RAI', '2019-07-22', '1 years, 2 months, 5 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Applying Abroad\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory.\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"No Comment\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Friendly Environment.\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Holiday Management. Its very tough to manage shift with agents for leave request.\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"Its my self choice so no comment.\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"Managing the head counts which will help agents with work load.\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"yes.\"}]', '2019-08-20 05:45:59', '2019-08-20 05:45:59'),
(24, 1, 621, 'RAJINA BHATTARAI', '2019-07-22', '1 years, 9 months, 14 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Further Studies.\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Satisfactory\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Customer Handling.\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Nothing till date.\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No Comment.\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"Nothing its perfect.\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-20 05:47:56', '2019-08-20 05:47:56'),
(25, 1, 545, 'DEVIN JIMBA', '2019-07-22', '1 years, 3 months, 5 days ', 'Adhya Acharya', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Family Issues\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"Satisfactory\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"No\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Satisfactory\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Team Work\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"PCs Issues\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"Self Choice\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No Comment\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes\"}]', '2019-08-20 05:49:42', '2019-08-20 05:49:42'),
(26, 2, 810, 'Anuska Khadka', '2019-12-13', '0 years, 10 months, 26 days ', 'Gyan Raj Panthi', '[{\"question\":\"What was your main reason for leaving the organization or the job?\",\"answer\":\"Primary Reason: Further abroad study\\r\\nSecondary Reason: Gained experience and now lacks growth opportunities\"},{\"question\":\"What was the quality of the supervision you received? Your thoughts about your immediate supervisors?\",\"answer\":\"The Supervisor was supportive and friendly\"},{\"question\":\"Did any company policy or procedure make your job more difficult?\",\"answer\":\"Yes, leave policies like sandwich leave made me a bit uncomfortable\\r\\n\"},{\"question\":\"Did your job turn into what was described to you during the job interview process and induction?\",\"answer\":\"Yes, it was\"},{\"question\":\"Did you receive adequate support to do your job?\",\"answer\":\"Yes\"},{\"question\":\"Your thoughts about the management?\",\"answer\":\"Positive:Like the way management team has invested in its employees for retention.\\r\\nNegative: A meeting shall be conducted once an employee completes his\\/her probation period, which was not done.\"},{\"question\":\"What did you like most about working for this organization?\",\"answer\":\"Working environment of the organization\"},{\"question\":\"What did you like least about working for this organization?\",\"answer\":\"Lengthy Sunday meetings and presentations. The Sunday meetings and updates could be once a month\"},{\"question\":\"What, if anything, could have been done to keep you with the company?\",\"answer\":\"No\"},{\"question\":\"Provided a chance to change few things in the organization, what would that be?\",\"answer\":\"No comments\"},{\"question\":\"Would you recommend others to work for this company?\",\"answer\":\"Yes, of course\"}]', '2019-12-15 11:19:56', '2019-12-15 11:19:56');

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_jobs_id_index` (`jobs_id`);

--
-- Indexes for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_address_employee_id_index` (`employees_id`);

--
-- Indexes for table `employee_category`
--
ALTER TABLE `employee_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_category_employee_id_index` (`employees_id`),
  ADD KEY `employee_category_job_category_id_index` (`job_category_id`);

--
-- Indexes for table `employee_coverletter`
--
ALTER TABLE `employee_coverletter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_coverletter_employee_id_index` (`employees_id`);

--
-- Indexes for table `employee_education`
--
ALTER TABLE `employee_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_education_employee_id_index` (`employees_id`),
  ADD KEY `employee_education_level_id_index` (`level_id`),
  ADD KEY `employee_education_faculty_id_index` (`faculty_id`);

--
-- Indexes for table `employee_experience`
--
ALTER TABLE `employee_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_experience_employee_id_index` (`employees_id`),
  ADD KEY `employee_experience_org_type_index` (`org_type_id`);

--
-- Indexes for table `employee_extra_data`
--
ALTER TABLE `employee_extra_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_extra_data_employees_id_index` (`employees_id`);

--
-- Indexes for table `employee_files`
--
ALTER TABLE `employee_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_files_employees_id_index` (`employees_id`);

--
-- Indexes for table `employee_language`
--
ALTER TABLE `employee_language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_language_employee_id_index` (`employees_id`);

--
-- Indexes for table `employee_location`
--
ALTER TABLE `employee_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_location_employee_id_index` (`employees_id`),
  ADD KEY `employee_location_location_id_index` (`job_location_id`);

--
-- Indexes for table `employee_organization`
--
ALTER TABLE `employee_organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_organization_employee_id_index` (`employees_id`),
  ADD KEY `employee_organization_org_type_id_index` (`org_type_id`);

--
-- Indexes for table `employee_password_resets`
--
ALTER TABLE `employee_password_resets`
  ADD KEY `employee_password_resets_email_index` (`email`);

--
-- Indexes for table `employee_reference`
--
ALTER TABLE `employee_reference`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_reference_employee_id_index` (`employees_id`);

--
-- Indexes for table `employee_registration`
--
ALTER TABLE `employee_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_setting`
--
ALTER TABLE `employee_setting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_setting_employee_id_index` (`employees_id`);

--
-- Indexes for table `employee_training`
--
ALTER TABLE `employee_training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_training_employees_id_index` (`employees_id`);

--
-- Indexes for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employment_history_staff_id_index` (`staff_id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_evaluator`
--
ALTER TABLE `event_evaluator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_mark`
--
ALTER TABLE `event_mark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_mark_participant_id_index` (`participant_id`),
  ADD KEY `event_mark_evaluator_id_index` (`evaluator_id`);

--
-- Indexes for table `event_participant`
--
ALTER TABLE `event_participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_syllabus`
--
ALTER TABLE `exam_syllabus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_syllabus_jobs_id_index` (`jobs_id`);

--
-- Indexes for table `exit_interview`
--
ALTER TABLE `exit_interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_address`
--
ALTER TABLE `employee_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_category`
--
ALTER TABLE `employee_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_coverletter`
--
ALTER TABLE `employee_coverletter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_education`
--
ALTER TABLE `employee_education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_experience`
--
ALTER TABLE `employee_experience`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_extra_data`
--
ALTER TABLE `employee_extra_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_files`
--
ALTER TABLE `employee_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_language`
--
ALTER TABLE `employee_language`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_location`
--
ALTER TABLE `employee_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_organization`
--
ALTER TABLE `employee_organization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_reference`
--
ALTER TABLE `employee_reference`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_registration`
--
ALTER TABLE `employee_registration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_setting`
--
ALTER TABLE `employee_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_training`
--
ALTER TABLE `employee_training`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_history`
--
ALTER TABLE `employment_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_evaluator`
--
ALTER TABLE `event_evaluator`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_mark`
--
ALTER TABLE `event_mark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `event_participant`
--
ALTER TABLE `event_participant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_syllabus`
--
ALTER TABLE `exam_syllabus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exit_interview`
--
ALTER TABLE `exit_interview`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_address`
--
ALTER TABLE `employee_address`
  ADD CONSTRAINT `employee_address_employee_id_foreign` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
