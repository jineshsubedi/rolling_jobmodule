-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 10:55 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_module`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjustment_staff`
--

CREATE TABLE `adjustment_staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` int(11) DEFAULT '0',
  `employee_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staffType` int(11) NOT NULL,
  `nature_of_employment` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employmentType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salaryType` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `shiftTime` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `age` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenure` decimal(10,2) NOT NULL,
  `joindate` date DEFAULT NULL,
  `probation_end_date` date DEFAULT NULL,
  `district` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `temporary_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_number` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_group` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marital_status` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `grade` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer_letter` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `appointment_letter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contract` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dynamic_formData` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_proof` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education_level` int(11) DEFAULT NULL,
  `faculty` int(11) DEFAULT NULL,
  `institute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `university` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education_year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_institute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_period` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_id` int(11) DEFAULT '0',
  `phone` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT '0.00',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pan` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pf` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_mode` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `business_department` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personal_email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `citizenship_number` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_contact_number` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resign_date` date NOT NULL,
  `resign_reason` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supervisor` int(11) NOT NULL DEFAULT '0',
  `weekend` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SATURDAY',
  `primary_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person_number` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `assets_taken` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `home_location` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `imei` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `app_token` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `on_board` tinyint(1) NOT NULL DEFAULT '1',
  `on_board_date` date DEFAULT NULL,
  `agrement` int(10) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adjustment_staff`
--

INSERT INTO `adjustment_staff` (`id`, `branch`, `department`, `employee_id`, `staffType`, `nature_of_employment`, `name`, `f_name`, `gender`, `email`, `password`, `employmentType`, `salaryType`, `shiftTime`, `dob`, `age`, `tenure`, `joindate`, `probation_end_date`, `district`, `permanent_address`, `temporary_address`, `account_number`, `bank_name`, `blood_group`, `marital_status`, `designation`, `grade`, `image`, `resume`, `offer_letter`, `appointment_letter`, `contract`, `dynamic_formData`, `id_proof`, `education_level`, `faculty`, `institute`, `university`, `education_year`, `work_institute`, `work_designation`, `work_period`, `device_id`, `phone`, `salary`, `remember_token`, `pan`, `pf`, `work_mode`, `status`, `business_department`, `personal_email`, `citizenship_number`, `emergency_contact_number`, `resign_date`, `resign_reason`, `supervisor`, `weekend`, `primary_location`, `secondary_location`, `contact_person`, `contact_person_number`, `assets_taken`, `home_location`, `imei`, `app_token`, `on_board`, `on_board_date`, `agrement`, `created_at`, `updated_at`) VALUES
(1028, '2', 5, 'RPPL-0054', 3, 1, 'Jinesh Subedi', 'Krishna Prasad Subedi', 'Male', 'jinesh@rollingplans.com.np', '$2y$10$XziTnByvbMlJwZBl.8dNZefpgVpxTrpsRuUdIf0tWjY2koEvhIZ9G', '1', '1', 18, '1996-04-07', '24.1315068', '9.00', '2019-08-18', '2020-01-18', 'Morang', 'Bhatta Chowk, Pokhariya, Biratnagar', 'American Embassy, Maharajgunj, Kathmandu', '3110017522483', 'Nabil Bank', 'A+', '2', 140, NULL, 'catalog/staffs/1028/IMG_20191026_114829_516.jpg', 'file/staffs/716492123.pdf', 'file/staffs/1328385361.jpg', NULL, 'file/staffs/PwXz5zIgR2.docx', '[]', 'file/staffs/990061220.jpg', 4, 105, 'nihareeka', 'TU', '2018', NULL, NULL, NULL, 0, '9842089687', '25.00', 'lBaEIlTJQyeBoJdI4ErfapC5PKT4wVXmMqaugbmJeHpLWOka3RyLCI7h3Ckc', '115783867', '', NULL, 1, 'B2B', 'jinesh1094@gmail.com', '05-01-69-05995', '9842089687', '0000-00-00', '', 804, 'SATURDAY', '27.690604,85.329743', '', 'Sapin Subedi', '9842191804', 'Desktop set', '27.674699057822192,85.34570388156737', '352950071294680', 'eO-cTPXx6S0:APA91bFN5CzAW_M2eQKyBehrnVDaV-CXzLYkAP113A1XDT0nHDDgbkOcCFe2VHDhEe4IyLqAoAIZnq8oj-U81iAQAcjCoINqA3jvjUN_gPIHu-bRXVQ1FFhDB3DNGa4-IpkU0eyzMOx3', 1, '2020-04-13', 1, '2019-08-25 11:54:15', '2020-05-19 03:15:58'),
(1436, '2', 5, '', 3, 1, 'Dipesh khatiwada', 'Damodar Khatiwada', 'Male', 'dipesh@rollingplans.com.np', '$2y$10$dW8rfd1wYGByNfsnVmZQleVKm7Aq1wnNNochxYq1hyP10Mtku.s22', '1', '1', 18, '1998-10-02', '21.6438356', '0.00', '2020-05-19', '2020-08-19', 'Other Country', 'buddhasanti-1, Jhapa', 'koteshwor kathmandu', '3787647786524001', 'NIC ASIA', NULL, '2', NULL, NULL, 'catalog/staffs/1436/me.png', '', '', NULL, '', '[]', '', 4, 190, '', '', '', NULL, NULL, NULL, 0, '9842629952', '30000.00', '4d75xDZiFrvchADAeX3RbeMojepkdzzvl1uz8U36YzXL9sKEaGXEgBReV7t9', '', '', NULL, 1, '', '', '', '', '0000-00-00', NULL, 804, 'SATURDAY', '27.690604,85.329743', '27.690604,85.329743', '', '', '', '', '', NULL, 1, NULL, 0, '2020-05-18 07:47:49', '2020-05-19 03:45:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjustment_staff`
--
ALTER TABLE `adjustment_staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjustment_staff`
--
ALTER TABLE `adjustment_staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1437;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
