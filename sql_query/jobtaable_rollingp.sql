-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2020 at 02:05 PM
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_level` int(11) DEFAULT NULL,
  `job_availability` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `min_experience` int(11) DEFAULT NULL,
  `education_level` int(11) DEFAULT NULL,
  `faculty` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `vacancy_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negotiable` int(11) NOT NULL DEFAULT '0',
  `minimum_salary` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `max_age` int(11) DEFAULT NULL,
  `seo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `assignment_handeler` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line_manager` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_status` int(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `setting` int(2) DEFAULT '0',
  `apply_type` int(2) DEFAULT NULL,
  `emails` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trash` int(2) NOT NULL DEFAULT '0',
  `formfields` text COLLATE utf8mb4_unicode_ci,
  `education_levels` text COLLATE utf8mb4_unicode_ci,
  `emanual` int(2) NOT NULL DEFAULT '0',
  `job_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertise_link` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertise_detail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu_marks` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_marks` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `location_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `branch_id`, `title`, `job_level`, `job_availability`, `deadline`, `min_experience`, `education_level`, `faculty`, `position`, `vacancy_code`, `external_link`, `gender`, `salary_unit`, `negotiable`, `minimum_salary`, `min_age`, `max_age`, `seo_url`, `status`, `publish_date`, `assignment_handeler`, `line_manager`, `process_status`, `created_at`, `updated_at`, `setting`, `apply_type`, `emails`, `trash`, `formfields`, `education_levels`, `emanual`, `job_file`, `advertise_link`, `advertise_detail`, `image`, `edu_marks`, `exp_marks`, `sort_order`, `location_title`) VALUES
(1, 2, 'java developer', 5, 'Full Time', '2020-03-28', 2, NULL, NULL, 2, 'jd-7813-20', 'http://rollingplans.com.np/', 'Any', '2', 0, '19000', 18, 25, 'java-developer', 1, '2020-03-04', NULL, '', 1, '2020-03-04 07:18:53', '2020-03-04 07:18:53', 4, 0, 'jinesh@rollingplans.com.np', 0, '[\"saluation\",\"first_name\",\"middle_name\",\"last_name\",\"gender\",\"marital_status\",\"permanent_address\",\"temporary_address\",\"home_phone\",\"mobile_phone\",\"email\",\"citizenship\",\"fax\",\"website\",\"dob\",\"nationality\",\"license_of\",\"vehicle\",\"pp_photo\",\"resume\",\"cover_letter\",\"education\",\"experience\",\"training\",\"language\",\"reference\",\"location\"]', 'null', 0, '', '', NULL, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_location`
--

CREATE TABLE `jobs_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs_location`
--

INSERT INTO `jobs_location` (`id`, `jobs_id`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_report`
--

CREATE TABLE `jobs_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `application_detail` text COLLATE utf8_unicode_ci,
  `application_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `written_detail` text COLLATE utf8_unicode_ci,
  `written_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_detail` text COLLATE utf8_unicode_ci,
  `group_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interview_detail` text COLLATE utf8_unicode_ci,
  `interview_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `final_detail` text COLLATE utf8_unicode_ci,
  `final_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `afile_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wfile_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gfile_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ifile_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ffile_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `name`) VALUES
(1, 'Accounting/Finance'),
(3, 'Internship'),
(4, 'Contact Center Representative'),
(5, 'Research and Development '),
(6, 'Technical'),
(7, 'Executive Level'),
(8, 'HR and  Administration'),
(9, 'Call Center Department');

-- --------------------------------------------------------

--
-- Table structure for table `job_detail`
--

CREATE TABLE `job_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `detail_type` int(11) NOT NULL,
  `detail_date` date DEFAULT NULL,
  `detail_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail_venue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `success_message` text COLLATE utf8_unicode_ci,
  `error_message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_education`
--

CREATE TABLE `job_education` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `education_level_id` int(10) UNSIGNED NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `exp_format` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cgpa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `others` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_education`
--

INSERT INTO `job_education` (`id`, `jobs_id`, `education_level_id`, `faculty_id`, `experience`, `exp_format`, `percent`, `cgpa`, `others`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 106, 1, 'Year', '50', '3', '', '2020-03-04 07:18:53', '2020-03-04 07:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `job_experience`
--

CREATE TABLE `job_experience` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `experience_id` int(10) UNSIGNED NOT NULL,
  `experience` int(11) DEFAULT NULL,
  `exp_format` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_experience`
--

INSERT INTO `job_experience` (`id`, `jobs_id`, `experience_id`, `experience`, `exp_format`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 'Year', '2020-03-04 07:18:53', '2020-03-04 07:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `job_form`
--

CREATE TABLE `job_form` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `f_lable` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `list_menu` text COLLATE utf8_unicode_ci,
  `requ` tinyint(1) DEFAULT NULL,
  `marks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fe_lable` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_level`
--

CREATE TABLE `job_level` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sortOrder` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_level`
--

INSERT INTO `job_level` (`id`, `name`, `sortOrder`, `created_at`, `updated_at`) VALUES
(1, 'Entry Level', 0, '2018-04-19 09:09:04', '2018-09-03 20:27:33'),
(2, 'Mid Level', 2, '2018-04-19 09:09:13', '2018-09-03 20:29:10'),
(4, 'Senior Level', 3, '2018-07-22 21:55:23', '2018-09-03 20:29:19'),
(5, 'Executive Level', 4, '2018-08-21 22:42:17', '2018-09-03 20:29:24'),
(6, 'Junior Level', 1, '2018-08-29 00:59:27', '2018-09-03 20:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `job_location`
--

CREATE TABLE `job_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_location`
--

INSERT INTO `job_location` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kathmandu', '2018-04-10 04:26:07', '2018-04-10 04:26:07'),
(2, 'Bhaktapur', '2018-04-20 07:37:09', '2018-04-20 07:37:09'),
(3, 'Lalitpur', '2018-04-20 07:37:16', '2018-04-20 07:37:16'),
(4, 'Hills of Nepal', '2018-05-27 10:11:48', '2018-05-27 10:11:48'),
(5, 'Sindhuli', '2018-05-28 10:39:01', '2018-05-28 10:39:01'),
(6, 'PMO, Butwal ', '2018-06-08 20:19:42', '2018-06-08 20:19:42'),
(7, 'Based in Province 6', '2018-06-12 13:24:58', '2018-06-12 13:24:58'),
(8, 'National Tuberculosis Center (NTC), Bhaktapur', '2018-07-26 21:42:01', '2018-07-26 21:42:01'),
(9, 'Kathmandu, Nepal, with visits to 12 districts in central, mid-west and far-west Nepal', '2018-10-14 17:00:58', '2018-10-14 17:02:07'),
(10, 'Kathmandu, Nepal, with travel to districts', '2018-10-14 17:34:55', '2018-10-14 17:34:55'),
(11, 'Tamagadi', '2019-07-05 09:27:59', '2019-07-05 09:27:59'),
(12, 'Tarahara-Belbari/Tikapur/Kathmandu', '2019-07-08 09:39:44', '2019-07-08 09:39:44'),
(13, 'Belbari', '2019-07-08 09:56:45', '2019-07-08 09:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `job_requirements`
--

CREATE TABLE `job_requirements` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobs_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `specification` text COLLATE utf8_unicode_ci,
  `education_description` text COLLATE utf8_unicode_ci,
  `specific_requirement` text COLLATE utf8_unicode_ci,
  `specific_instruction` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_requirements`
--

INSERT INTO `job_requirements` (`id`, `jobs_id`, `description`, `specification`, `education_description`, `specific_requirement`, `specific_instruction`, `created_at`, `updated_at`) VALUES
(1, 1, '', '', '', '', '<span style=\"color:#0033cc\"><strong>&ldquo;Protocols for the confidentiality&rdquo;</strong></span> is designed to collect and maintain identifiable information about applicants. Data will be collected anonymously by the specified person and will be removed and destroyed as soon as possible by the completion of this specific assignment. No access to any other organizations/ person and shall be based on a &ldquo;need to know&rdquo; and &quot;minimum necessary&quot; standard.<br />\r\n<br />\r\n<span style=\"color:#FF0000\"><strong>CONFIDENTIALITY PROTOCOL&mdash; PROTECTION OF INFORMATION OF APPLICANTS</strong></span><br />\r\n<br />\r\n<strong>STRICTLY CONFIDENTIAL</strong><br />\r\n<br />\r\nInformation, applications and documents that are deemed to be of a highly sensitive nature or to be inadequately protected by the CONFI&not;DENTIAL classification shall be classified as STRICTLY CONFIDENTIAL and access to them shall be restricted solely to persons with a specific need for specific assignment only.<br />\r\n<br />\r\nThe staffs of the Rolling Plans including client institution shall establish a control and tracking system for documents classified as STRICTLY CONFIDENTIAL, including the maintenance of control logs. Documents classified as STRICTLY CONFIDENTIAL shall be (i) maintained by only specific staff with written commitment; (ii) kept under security key or given equivalent protection when not in use; and (iii) in the case of physical documents, transmitted by an inner envelope indicating the classification marking and an outer envelope indicating no classification, or, in the case of documents in electronic form, transmitted by encrypted or password-secured system.<br />\r\n<br />\r\nFor purposes of this protocol, the following individuals are deemed to have a specific need to know: (i) the executive consultant; (ii) the project manager/recruitment and selection consultant; (iii) the international consultant of Rolling Plans and; (v) the respective designated representatives of Government of Nepal.<br />\r\n<br />\r\nConfidentiality pertains to the treatment of information that an individual has disclosed in any documents/files of trust and with the expectation that it will not be divulged to others/ process without permission in ways that are inconsistent with the understanding of the original disclosure. Rolling Plans assure that the information shall be used for specific purpose published in this system and service only.<br />\r\n<br />\r\nWhen it is necessary to collect and maintain identifiable data, Rolling Plans will ensure that the protocol includes the necessary safeguards to maintain confidentiality of identifiable data and data security appropriate to the degree of risk from disclosure.', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobs_vacancy_code_unique` (`vacancy_code`);

--
-- Indexes for table `jobs_location`
--
ALTER TABLE `jobs_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_location_jobs_id_index` (`jobs_id`),
  ADD KEY `jobs_location_location_id_index` (`location_id`);

--
-- Indexes for table `jobs_report`
--
ALTER TABLE `jobs_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_report_jobs_id_index` (`jobs_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_detail`
--
ALTER TABLE `job_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_detail_jobs_id_index` (`jobs_id`);

--
-- Indexes for table `job_education`
--
ALTER TABLE `job_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_education_jobs_id_index` (`jobs_id`),
  ADD KEY `job_education_education_level_id_index` (`education_level_id`);

--
-- Indexes for table `job_experience`
--
ALTER TABLE `job_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_experience_jobs_id_index` (`jobs_id`),
  ADD KEY `job_experience_experience_id_index` (`experience_id`);

--
-- Indexes for table `job_form`
--
ALTER TABLE `job_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_form_jobs_id_index` (`jobs_id`);

--
-- Indexes for table `job_level`
--
ALTER TABLE `job_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_location`
--
ALTER TABLE `job_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_requirements`
--
ALTER TABLE `job_requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_requirements_jobs_id_index` (`jobs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs_location`
--
ALTER TABLE `jobs_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs_report`
--
ALTER TABLE `jobs_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_detail`
--
ALTER TABLE `job_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_education`
--
ALTER TABLE `job_education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_experience`
--
ALTER TABLE `job_experience`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_form`
--
ALTER TABLE `job_form`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_level`
--
ALTER TABLE `job_level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_location`
--
ALTER TABLE `job_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_requirements`
--
ALTER TABLE `job_requirements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs_location`
--
ALTER TABLE `jobs_location`
  ADD CONSTRAINT `jobs_location_jobs_id_foreign` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_location_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `job_location` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs_report`
--
ALTER TABLE `jobs_report`
  ADD CONSTRAINT `jobs_report_jobs_id_foreign` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_detail`
--
ALTER TABLE `job_detail`
  ADD CONSTRAINT `job_detail_jobs_id_foreign` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_education`
--
ALTER TABLE `job_education`
  ADD CONSTRAINT `job_education_education_level_id_foreign` FOREIGN KEY (`education_level_id`) REFERENCES `education_level` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_education_jobs_id_foreign` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_experience`
--
ALTER TABLE `job_experience`
  ADD CONSTRAINT `job_experience_experience_id_foreign` FOREIGN KEY (`experience_id`) REFERENCES `experience` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_experience_jobs_id_foreign` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_form`
--
ALTER TABLE `job_form`
  ADD CONSTRAINT `job_form_jobs_id_foreign` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_requirements`
--
ALTER TABLE `job_requirements`
  ADD CONSTRAINT `job_requirements_jobs_id_foreign` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
