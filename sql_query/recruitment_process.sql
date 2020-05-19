-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2020 at 10:30 AM
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
-- Table structure for table `recruitment_process`
--

CREATE TABLE `recruitment_process` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruitment_process`
--

INSERT INTO `recruitment_process` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Electronic Recruitment Application (ERA) Receiving Process Ongoing', '', '2018-05-06 04:47:03', '2019-05-09 17:40:25'),
(3, 'Screening, Sorting, and Shortlisting Process Ongoing', '', '2018-05-06 05:56:32', '2019-01-06 19:48:25'),
(4, 'Publish list of shortlisted candidates', NULL, '2018-05-06 05:57:00', '2018-05-06 05:57:00'),
(5, 'Informed the shortlisted candidates for registration/document verification process (which will be followed by Written Exam)', '', '2018-05-06 05:57:21', '2019-01-18 00:43:29'),
(6, 'Document Verification', NULL, '2018-05-06 05:57:35', '2018-05-06 05:57:35'),
(7, 'Email sent to shortlisted candidates for the written examination.', '', '2018-05-06 05:57:51', '2018-06-10 21:42:40'),
(8, 'Detail of venue for written exam', NULL, '2018-05-06 05:59:53', '2018-05-06 05:59:53'),
(9, 'Evaluation of answer sheet', NULL, '2018-05-06 06:00:09', '2018-05-06 06:00:09'),
(10, 'Written examination schedule published', '', '2018-05-06 06:00:24', '2018-06-10 21:29:15'),
(11, 'Inform the shortlisted candidates for the group discussion', NULL, '2018-05-06 06:01:04', '2018-05-06 06:01:04'),
(12, 'Conduct group discussion', NULL, '2018-05-06 06:01:19', '2018-05-06 06:01:19'),
(13, 'Publish result of group discussion', NULL, '2018-05-06 06:01:34', '2018-05-06 06:01:34'),
(14, 'Inform shortlisted candidates for final interview', '', '2018-05-06 06:01:58', '2018-06-01 15:20:48'),
(15, ' Final Interview Conducted', '', '2018-05-06 06:02:14', '2018-12-12 16:20:02'),
(16, 'Publish Selected Candidate', NULL, '2018-05-06 06:02:36', '2018-05-06 06:02:36'),
(17, 'Written Examination for the Shortlisted Candidates Conducted.', '', '2018-05-24 13:06:24', '2018-05-24 13:06:24'),
(18, 'Interview Result Published !!!!', '', '2018-05-27 12:23:53', '2018-07-03 19:14:52'),
(19, 'Result Published and Interview Scheduled !!!', '<span style=\"background-color:rgb(223, 240, 216); color:rgb(60, 118, 61); font-family:roboto,raleway,open sans,arial,sans-serif; font-size:13px\">With reference to the Written Examination held on 26th January, 2019 for the post of Junior Assistant, the list of shortlisted candidates for interview for the post of Junior Assistant has been placed in Bank&#39;s official website&nbsp;</span><a href=\"http://www.nepalsbi.com.np/\" rel=\"nofollow\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; background-color: rgb(223, 240, 216); color: rgb(51, 51, 51); text-decoration: none; transition: all 0.25s linear 0s; outline: 0px !important; font-family: Roboto, Raleway, &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\" target=\"_blank\">www.nepalsbi.com.np</a><span style=\"background-color:rgb(223, 240, 216); color:rgb(60, 118, 61); font-family:roboto,raleway,open sans,arial,sans-serif; font-size:13px\">&nbsp;or&nbsp;directly click&nbsp;the&nbsp;link&nbsp;</span><a href=\"https://nepalsbi.com.np/content/shortlisted-candidates-for-ja-interview-2019.cfm\" rel=\"nofollow\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; background-color: rgb(223, 240, 216); color: rgb(51, 51, 51); text-decoration: none; transition: all 0.25s linear 0s; outline: 0px !important; font-family: Roboto, Raleway, &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\" target=\"_blank\">https://nepalsbi.com.np/content/shortlisted-candidates-for-ja-interview-2019.cfm</a><span style=\"background-color:rgb(223, 240, 216); color:rgb(60, 118, 61); font-family:roboto,raleway,open sans,arial,sans-serif; font-size:13px\">.&nbsp;</span><br />\r\n<br />\r\n<span style=\"background-color:rgb(223, 240, 216); color:rgb(60, 118, 61); font-family:roboto,raleway,open sans,arial,sans-serif; font-size:13px\">The&nbsp;interview&nbsp;will&nbsp;be&nbsp;held&nbsp;on&nbsp;Bank&#39;s Corporate Office&nbsp;located&nbsp;at&nbsp;Kesharmahal,&nbsp;Kathmandu.&nbsp;</span><br />\r\n<br />\r\n<span style=\"background-color:rgb(223, 240, 216); color:rgb(60, 118, 61); font-family:roboto,raleway,open sans,arial,sans-serif; font-size:13px\">All&nbsp;the shortlisted&nbsp;candidates&nbsp;are&nbsp;hereby&nbsp;notified&nbsp;to visit&nbsp;the&nbsp;Bank&#39;s&nbsp;website&nbsp;and&nbsp;appear in the&nbsp;interview&nbsp;on the&nbsp;given&nbsp;date&nbsp;and&nbsp;time&nbsp;as&nbsp;detailed&nbsp;in&nbsp;the&nbsp;list.&nbsp;Also&nbsp;the&nbsp;candidates&nbsp;are&nbsp;advised&nbsp;to&nbsp;carry&nbsp;their&nbsp;Admit Card&nbsp;along&nbsp; while&nbsp;appearing&nbsp;for&nbsp;the&nbsp;interview.&nbsp;</span><br />\r\n<br />\r\n<span style=\"background-color:rgb(223, 240, 216); color:rgb(60, 118, 61); font-family:roboto,raleway,open sans,arial,sans-serif; font-size:13px\">Candidates&nbsp;will be&nbsp;automatically&nbsp;disqualified&nbsp;for the&nbsp;selection&nbsp;if&nbsp;any&nbsp;kind&nbsp;of&nbsp;canvassing&nbsp;at&nbsp;any&nbsp;stage&nbsp;of&nbsp;selection&nbsp;process&nbsp;is&nbsp;attempted.&nbsp;</span>', '2018-05-28 11:46:45', '2019-02-20 14:35:32'),
(20, 'Email sent to shortlisted candidates for the written examination & interview', '', '2018-06-01 15:16:31', '2018-12-04 21:37:30'),
(21, 'Email & SMS sent to shortlisted candidates for the written examination', '', '2018-06-01 15:27:28', '2018-06-01 15:27:28'),
(22, 'Email sent to shortlisted candidates for the Interview', '', '2018-06-12 19:37:08', '2018-10-15 23:00:15'),
(23, 'Candidate Selected', '', '2018-07-16 20:55:39', '2018-07-16 20:55:39'),
(24, 'Shortlisting process completed. ', '', '2018-09-23 18:10:14', '2018-09-23 18:10:14'),
(25, 'Presentation & Interview  Successfully Conducted', '', '2018-09-30 15:21:50', '2019-01-03 20:57:32'),
(26, 'Sorting & Shortlisting Process Ongoing', '', '2018-10-01 18:06:08', '2018-10-01 18:06:08'),
(27, 'Written Examination and Interview Conducted', '', '2018-12-04 21:34:55', '2018-12-04 21:34:55'),
(28, 'Successful Applicant has been offered the job', '', '2019-01-11 01:19:54', '2019-01-11 01:19:54'),
(29, 'Final Interview has been successfully Conducted', '<span style=\"color:#FF0000\"><span style=\"background-color:rgb(255, 255, 255); font-family:gill sans mt,sans-serif; font-size:14.66px\">(The selection process after the final interview is on-going.&nbsp; Further communication will be made by MCA-Nepal for any final process. &nbsp;Once the process is finalized, this notice will be updated.&nbsp; Please check back for updated information.)</span></span>', '2019-02-05 19:32:51', '2019-02-05 19:38:41'),
(30, 'The vacancy for the job position has been re-advertised', 'You may check The Himalayan Times, English Daily dated 13th February, 2019', '2019-02-13 19:10:25', '2019-02-13 19:10:25'),
(31, 'Email sent to shortlisted candidates for first round of interview', '', '2019-03-29 16:08:14', '2019-03-29 16:08:14'),
(32, 'Pre Screening Interview Sucessfully conducted and e-mail sent to shortlisted candidates for Final Presentation and Interview', '', '2019-04-09 03:55:28', '2019-04-09 03:55:28'),
(33, 'Presentation Topic Sent to the Shortlisted Candidates for Presentation and Interview', '', '2019-05-01 01:26:58', '2019-05-01 01:26:58'),
(34, 'Pre Screening Interview Sucessfully Conducted', '', '2019-05-01 01:29:05', '2019-05-01 01:29:05'),
(35, ' Extension of Vacancy Deadline and Electronic Recrtuitment Applications (ERA) Receiving', '', '2019-05-04 00:40:08', '2019-05-04 06:36:38'),
(37, 'Email sent to shortlisted candidates for Written Assessment and First Round of Interview', '', '2019-05-06 21:59:11', '2019-05-06 21:59:11'),
(38, 'Written Assessment (WA) and Preliminary Formative Interview (PFI) Sucessfully Conducted', '', '2019-05-10 22:05:11', '2019-05-10 22:05:11'),
(39, 'Email sent to the shortlisted candidates from Written Assessment and Preliminary Formative Interview for Final Interview', '', '2019-05-11 02:35:47', '2019-05-11 02:35:47'),
(40, 'Written Assessment (WA) Successfully Conducted', '', '2019-05-25 05:36:45', '2019-05-25 05:36:45'),
(41, 'Email sent to shortlisted candidates for Final Presentation and Interview', '', '2019-05-31 16:30:12', '2019-05-31 16:30:12'),
(42, 'Email Sent to the Shortlisted Candidates for Written Assessment (WA)', '', '2019-06-04 09:25:04', '2019-06-04 09:25:04'),
(43, 'Selected candidate has been offered the job', '', '2019-06-09 04:35:45', '2019-06-09 04:35:45'),
(44, 'Presentation topic sent to shortlisted candidates for Presentation (Oral Test) and Interview', '', '2019-06-13 04:30:54', '2019-06-13 04:30:54'),
(45, 'Contacted the shortlisted candidates for final web interview', '', '2019-06-22 16:55:01', '2019-06-22 16:55:01'),
(46, 'Email sent to shortlisted candidates for Driving/Technical Test', '', '2019-06-28 07:51:18', '2019-06-28 07:51:18'),
(47, 'Candidates shortlisted for Final Structured Interview will be contacted by tomorrow morning  July 2, 2019 before 8:00 AM ', '', '2019-07-01 11:56:21', '2019-07-01 11:56:21'),
(48, 'Contacted shortlisted candidates for Presentation and Interview', '', '2020-02-05 22:11:49', '2020-02-05 22:11:49'),
(49, 'Interview Results Published', 'COngratula', '2020-02-17 05:31:24', '2020-02-17 05:31:24'),
(50, 'Certificate Design', '', '2020-02-17 05:32:13', '2020-02-17 05:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recruitment_process`
--
ALTER TABLE `recruitment_process`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recruitment_process`
--
ALTER TABLE `recruitment_process`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
