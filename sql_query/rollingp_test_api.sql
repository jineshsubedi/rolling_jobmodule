-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 08:14 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rolling_access`
--

-- --------------------------------------------------------

--
-- Table structure for table `dropbox_api`
--

CREATE TABLE `dropbox_api` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `access_token` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dropbox_api`
--

INSERT INTO `dropbox_api` (`id`, `staff_id`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 1436, 'mPVXSRfwQFAAAAAAAAAAL6s6P5FrSB9VvYEgqiYWgQplI3BclCRTRGYLbUHejkLF', '2020-06-10 11:08:36', '2020-06-12 14:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee_meeting`
--

CREATE TABLE `employee_meeting` (
  `id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `zoom_id` varchar(20) NOT NULL,
  `zoom_password` varchar(20) NOT NULL,
  `zoom_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_meeting`
--

INSERT INTO `employee_meeting` (`id`, `tab_id`, `job_id`, `employee_id`, `topic`, `start_time`, `zoom_id`, `zoom_password`, `zoom_url`) VALUES
(3, 5, 3, '[\"59\",\"74\"]', 'Delectus odio qui s', '2020-05-26 05:08:00', '73357426422', 'Aute44', 'https://us04web.zoom.us/j/73357426422?pwd=TmFEMTNjYnBIOUdKb1lhQ1hJY0RGdz09'),
(8, 4, 3, '58', 'Delectus odio qui s', '2020-05-27 06:29:12', '72655178223', 'Aute44', 'https://us04web.zoom.us/j/72655178223?pwd=eThxNnZBYmFpMFNRMVBydU5WK05xdz09'),
(9, 2, 3, '58', 'Aliquid fugit enim ', '2020-05-26 06:38:38', '79104129498', 'Aut5599', 'https://us04web.zoom.us/j/79104129498?pwd=S0Q3RGthK3paa0xCb2tISEVucURyQT09'),
(10, 3, 3, '58', 'Delectus odio qui s', '2020-05-26 06:42:12', '72965525133', 'Aute44', 'https://us04web.zoom.us/j/72965525133?pwd=ZGsxa2F5TjN0RDdtZUhyTnVkeE9QZz09'),
(11, 1, 3, '58', 'Delectus odio qui s', '2020-05-26 06:45:06', '71013373479', '5555555', 'https://us04web.zoom.us/j/71013373479?pwd=cCtmSk5hRC9BZjRFNE5lVmRwQzQwZz09'),
(13, 1, 3, '[\"59\",\"60\",\"74\"]', 'Natus cillum animi ', '2020-05-24 07:59:05', '79010755316', 'rolling999', 'https://us04web.zoom.us/j/79010755316?pwd=RWdPN0MyMEhHTUlkbllPall3c2hadz09'),
(14, 2, 3, '[\"60\",\"74\",\"95\"]', 'Ad aut ipsa tempor ', '2020-05-24 08:03:15', '75639746619', '986tdhfbk', 'https://us04web.zoom.us/j/75639746619?pwd=NW5iTjRxVjkzZHJLZmZvWmlKUDd3Zz09'),
(15, 4, 3, '[\"59\",\"74\",\"95\"]', 'reeeweq', '2020-05-24 08:18:25', '76894630590', '9hello33', 'https://us04web.zoom.us/j/76894630590?pwd=NHpQNTkrUTdQeWRxNjVNL2JKK1JTUT09'),
(17, 1, 3, '58', 'Delectus odio qui s', '2020-05-25 10:00:00', '71722134287', 'Aute44', 'https://us04web.zoom.us/j/71722134287?pwd=NHF0bDU3WDFKVFBKeUxqV29lNlh2QT09'),
(18, 3, 3, '[\"59\",\"74\",\"95\"]', 'Ad aut ipsa tempor ', '2020-05-26 10:00:00', '73511045514', 'Aute44', 'https://us04web.zoom.us/j/73511045514?pwd=K3UrVVpHK0VqZ2RwK0ZpeVBadXpTZz09'),
(19, 1, 3, '58', 'hjkhogihih', '2020-06-12 10:00:00', '74737162413', 'rolling22', 'https://us04web.zoom.us/j/74737162413?pwd=SnJnc3hVZ1QrOWZhRGhtSnZxbm1rZz09');

-- --------------------------------------------------------

--
-- Table structure for table `gmail_api`
--

CREATE TABLE `gmail_api` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `project_id` varchar(200) NOT NULL,
  `client_id` text NOT NULL,
  `client_secret` varchar(200) NOT NULL,
  `redirect_url` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gmail_api`
--

INSERT INTO `gmail_api` (`id`, `staff_id`, `project_id`, `client_id`, `client_secret`, `redirect_url`, `created_at`, `updated_at`) VALUES
(1, 1436, 'quickstart-1591002130010', '927795286649-5tnke7c9fle71d560lpficppvbs60dm8.apps.googleusercontent.com', 'Ew-rBT84fv2M7BEPN5dE6f78', 'http://localhost/rolling_jobmodule/oauth/gmail/callback', '2020-06-12 12:46:18', '2020-06-12 14:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `googledrive_api`
--

CREATE TABLE `googledrive_api` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `client_id` text NOT NULL,
  `client_secret` varchar(200) NOT NULL,
  `refresh_token` text NOT NULL,
  `drive_folder_id` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `googledrive_api`
--

INSERT INTO `googledrive_api` (`id`, `staff_id`, `client_id`, `client_secret`, `refresh_token`, `drive_folder_id`, `created_at`, `updated_at`) VALUES
(2, 1436, '216951765229-fhfruohpa8del47gjoadqnqurg7c3ku2.apps.googleusercontent.com', 'zkmTHYw5wr6sxMtgz5lStBNz', '1//03mM5DoYKfZwwCgYIARAAGAMSNwF-L9IrU9oRFPTJ3XN8zj3r6SwZ4YR_Ot-VN4b1WHsBQ3nXs00Ur4HISeYLiTbTilLKTZD9t8M', '1uSA386lPj6eHGH_fzj0iuphouozGi66p', '2020-06-09 16:57:39', '2020-06-12 14:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `zoom_api`
--

CREATE TABLE `zoom_api` (
  `id` int(11) NOT NULL,
  `refresh_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zoom_api`
--

INSERT INTO `zoom_api` (`id`, `refresh_token`) VALUES
(1, 'eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiJhMGQzNzFiOC0xYzMxLTQ5NTctYmQxNy0xZGRmMjdmM2JhNzkifQ.eyJ2ZXIiOiI2IiwiY2xpZW50SWQiOiJ1UVF1YklmT1Q4ZU5vX2txR1M0VlFnIiwiY29kZSI6Ikl4SzJWOXBLdU1fTjR5bkFkZVRTUk80a2c0RW52Uk1sdyIsImlzcyI6InVybjp6b29tOmNvbm5lY3Q6Y2xpZW50aWQ6dVFRdWJJZk9UOGVOb19rcUdTNFZRZyIsImF1dGhlbnRpY2F0aW9uSWQiOiJjMzNkMjZiMWY5OTlkNjc0NGIzNzkwZGNiMDEzY2VlMSIsInVzZXJJZCI6Ik40eW5BZGVUU1JPNGtnNEVudlJNbHciLCJncm91cE51bWJlciI6MCwiYXVkIjoiaHR0cHM6Ly9vYXV0aC56b29tLnVzIiwiYWNjb3VudElkIjoiSzYzZ09Ma3ZSamVEV28wX01tQWJzQSIsIm5iZiI6MTU5MTk1NDUxMywiZXhwIjoyMDY0OTk0NTEzLCJ0b2tlblR5cGUiOiJyZWZyZXNoX3Rva2VuIiwiaWF0IjoxNTkxOTU0NTEzLCJqdGkiOiIyZjBiMjU5Mi1mNTJiLTQxN2QtODIxNi02OWNjYTRjMjg2N2QiLCJ0b2xlcmFuY2VJZCI6MzJ9.SUhQqu2sQ03cG7VlaTxqHdDjiQmoW9GHbVZSQBYGLk7NpAmAp6AnqEWa2UlS3DFheGyTFPK5r1Hz-HRNz8SbzA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dropbox_api`
--
ALTER TABLE `dropbox_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_meeting`
--
ALTER TABLE `employee_meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gmail_api`
--
ALTER TABLE `gmail_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `googledrive_api`
--
ALTER TABLE `googledrive_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zoom_api`
--
ALTER TABLE `zoom_api`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dropbox_api`
--
ALTER TABLE `dropbox_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_meeting`
--
ALTER TABLE `employee_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gmail_api`
--
ALTER TABLE `gmail_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `googledrive_api`
--
ALTER TABLE `googledrive_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zoom_api`
--
ALTER TABLE `zoom_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
