-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 06:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `4ps`
--

CREATE TABLE `4ps` (
  `fourps_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(255) DEFAULT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `4ps`
--

INSERT INTO `4ps` (`fourps_id`, `fullname`, `dob`, `pob`, `sex`, `civil_status`, `contact_number`) VALUES
(27, 'luya', '4000-02-05', 'naujan', 'Female', 'Married', '09123456789'),
(30, 'erich', '4000-02-05', 'naujan', 'Male', 'Single', '09123456789'),
(31, 'nyemas', '8122-02-10', 'naujan', 'Female', 'Married', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `first_name`, `last_name`, `email`, `contact_number`, `username`, `password`, `position`, `created_at`) VALUES
(2, 'Juan', 'Dela Cruz', 'juandelacruz@gmail.com', '09123456789', 'juandelacruz', 'adminpass123', 'Chairman', '2025-06-10 15:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `brgyofficials`
--

CREATE TABLE `brgyofficials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `status` enum('Appointed','Elected','Worker') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgyofficials`
--

INSERT INTO `brgyofficials` (`id`, `name`, `position`, `contact`, `dob`, `sex`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ae', 'kagawad', '0905154109', '2003-07-01', 'Female', '', '2025-06-15 23:13:51', '2025-06-15 23:13:51'),
(2, 'ae', 'kagawad', '0905154109', '2003-07-01', 'Female', '', '2025-06-15 23:13:51', '2025-06-15 23:13:51'),
(3, 'ariel', 'kagawad', '09522654', '2003-07-01', 'Female', '', '2025-06-15 23:13:51', '2025-06-15 23:13:51'),
(4, 'ariel', 'konsehal', '09522654', '2003-07-01', 'Female', '', '2025-06-15 23:13:51', '2025-06-15 23:13:51'),
(5, 'dessa\'', 'konsehal', '09522654', '2003-07-01', 'Female', '', '2025-06-15 23:13:51', '2025-06-15 23:13:51'),
(6, 'lyka', 'treasurer', '09522654', '2003-07-01', 'Female', '', '2025-06-15 23:13:51', '2025-06-15 23:13:51'),
(7, 'lyka', 'treasurer', '09522654', '2003-07-01', 'Female', '', '2025-06-15 23:13:51', '2025-06-15 23:13:51'),
(2225, 'lyka', 'treasurer', '09522654', '2003-07-01', 'Female', '', '2025-06-15 23:13:51', '2025-06-15 23:13:51'),
(2226, 'jo', 'kagawad', '0905154109', '2000-10-02', 'Female', '', '2025-06-15 23:13:51', '2025-06-15 23:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `log_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `name`, `position`, `day`, `time_in`, `time_out`, `log_by`) VALUES
(1, 'ae', 'kagawad', 'monday', '08:00:00', '08:00:00', 'secretary'),
(2, 'hakdogs', 'kagawad', 'monday', '08:00:00', '08:00:00', 'secretary'),
(3, 'awit', 'kagawad', 'monday', '08:00:00', '08:00:00', 'secretary'),
(4, 'ajo', 'kagawad', 'monday', '08:00:00', '08:00:00', 'secretary');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `schedule` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `name`, `position`, `status`, `contact`, `dob`, `sex`, `schedule`) VALUES
(1, 'ae', 'kagawad', 'Appointed Officials', '0905154109', '2003-07-01', 'Female', 'monday: 8:00 AM - 8:00 PM\n'),
(2, 'ae', 'kagawad', 'Appointed Officials', '0905154109', '2003-07-01', 'Female', ''),
(3, 'ariel', 'kagawad', 'Brgy Worker', '09522654', '2003-07-01', 'Female', 'wednesday: 8:00 AM - 10:00PM\n'),
(4, 'ariel', 'konsehal', 'Elected Officials', '09522654', '2003-07-01', 'Female', 'wednesday: 8:00 AM - 10:00PM\n'),
(5, 'dessa\'', 'konsehal', 'Elected Officials', '09522654', '2003-07-01', 'Female', ''),
(6, 'lyka', 'treasurer', 'Elected Officials', '09522654', '2003-07-01', 'Female', 'friday: 8:00 AM - 10:00PM\nsaturday: 8:00 AM - 8:00 PM\n'),
(7, 'lyka', 'treasurer', 'Appointed Officials', '09522654', '2003-07-01', 'Female', 'saturday: 8:00 AM - 10:00PM\nfriday: 8:00 AM - 8:00 PM\nsunday: 8:00 AM - 8:00 PM\nmonday: 8:00 AM - 10:00PM\n'),
(2225, 'lyka', 'treasurer', 'Appointed Officials', '09522654', '2003-07-01', 'Female', 'wednesday: 8:00 AM - 10:00PM\n'),
(2226, 'jo', 'kagawad', 'Brgy Worker', '0905154109', '2000-10-02', 'Female', 'wednesday: 8:00 AM - 10:00PM');

-- --------------------------------------------------------

--
-- Table structure for table `pwd`
--

CREATE TABLE `pwd` (
  `pwd_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pob` varchar(100) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `house_no` varchar(20) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `municipality` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `length_of_stay` varchar(50) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `place_of_work` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `father_contact` varchar(15) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `mother_contact` varchar(15) DEFAULT NULL,
  `emergency_name` varchar(100) DEFAULT NULL,
  `emergency_relationship` varchar(50) DEFAULT NULL,
  `emergency_contact` varchar(15) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `voters` enum('Yes','No') DEFAULT 'No',
  `pwd` enum('Yes','No') DEFAULT 'No',
  `senior` enum('Yes','No') DEFAULT 'No',
  `household_name` varchar(100) DEFAULT NULL,
  `age_member` int(11) DEFAULT NULL,
  `sex_householdmember` enum('Male','Female','Other') DEFAULT NULL,
  `civil_status_member` varchar(50) DEFAULT NULL,
  `occupation_member` varchar(100) DEFAULT NULL,
  `education_attain` varchar(100) DEFAULT NULL,
  `place_of_work_or_school` varchar(150) DEFAULT NULL,
  `resident_type` enum('HomeOwner','Renters') NOT NULL DEFAULT 'HomeOwner',
  `four_ps` enum('Yes','No') DEFAULT NULL,
  `fourps_id` int(10) UNSIGNED DEFAULT NULL,
  `pwd_id` int(10) UNSIGNED DEFAULT NULL,
  `senior_id` int(10) UNSIGNED DEFAULT NULL,
  `voters_id` varchar(50) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `fullname`, `dob`, `pob`, `sex`, `civil_status`, `nationality`, `religion`, `contact_number`, `house_no`, `barangay`, `municipality`, `province`, `length_of_stay`, `occupation`, `place_of_work`, `education`, `father_name`, `father_occupation`, `father_contact`, `mother_name`, `mother_occupation`, `mother_contact`, `emergency_name`, `emergency_relationship`, `emergency_contact`, `email_address`, `voters`, `pwd`, `senior`, `household_name`, `age_member`, `sex_householdmember`, `civil_status_member`, `occupation_member`, `education_attain`, `place_of_work_or_school`, `resident_type`, `four_ps`, `fourps_id`, `pwd_id`, `senior_id`, `voters_id`, `last_updated`) VALUES
(1, 'ESTERON ARVIN T.', '2003-07-01', 'naujan', 'Female', 'Single', 'filipino', 'catholic', '09859876024', '22171', 'San gab', 'san pablo', 'laguna', '1 year', 'none', 'none', 'collage', 'ariel', 'nogf', '', 'hugyigv', 'nkhugyg', '', 'nhnhugy', 'i8y7y', 'jhuyg', NULL, 'Yes', 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(7, 'Juan Dela Cruz', '1990-01-01', 'Manila', 'Male', 'Single', 'Filipino', 'Catholic', '09171234567', '123', 'Barangay 1', 'Makati', 'Metro Manila', '10 years', 'Engineer', 'ABC Corp', 'College Graduate', 'Pedro Dela Cruz', 'Farmer', '09181234567', 'Maria Dela Cruz', 'Teacher', '09191234567', 'Ana Santos', 'Sister', '09201234567', 'juan@example.com', 'Yes', 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(12, 'dessa', '2000-01-04', 'jihugyvb', 'Female', 'Single', 'filipino', 'catholic', '09507702589', '1412', 'San gab', 'san pablo city', 'laguna', '1 year', 'none', 'none', 'collage', 'ariel', 'nogf', '09859870624', 'hugyigv', 'nkhugyg', '09507702589', 'Array', 'Array', 'Array', 'esteronjakexariel@gmail.com', '', 'Yes', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(13, 'lyka', '2000-01-04', 'jihugyvb', 'Female', 'Single', 'filipino', 'catholic', '09507702589', '1412', 'San gab', 'san pablo city', 'laguna', '1 year', 'none', 'none', 'collage', 'ariel', 'nogf', '09859870624', 'hugyigv', 'nkhugyg', '09507702589', 'Array', 'Array', 'Array', 'esteronjakexariel@gmail.com', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(15, 'ella', '2000-01-04', 'jihugyvb', 'Male', 'Widowed', 'filipino', 'catholic', '09507702589', '1412', 'San gab', 'san pablo city', 'laguna', '1 year', 'none', 'none', 'collage', 'ariel', 'nogf', '09859870624', 'hugyigv', 'nkhugyg', '09123456789', 'Array', 'Array', 'Array', 'esteronjakexariel@gmail.com', '', 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(17, 'herm', '2000-01-04', 'jihugyvb', 'Male', 'Single', 'filipino', 'catholic', '09507702589', '1412', 'San gab', 'san pablo city', 'laguna', '1 year', 'none', 'none', 'collage', 'ariel', 'nogf', '09507702589', 'hugyigv', 'nkhugyg', '09123456789', 'Array', 'Array', 'Array', 'esteronjakexariel@gmail.com', '', 'Yes', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(19, 'jonard', '2000-01-04', 'jihugyvb', 'Female', 'Separated', 'filipino', 'catholic', '09507702589', '1412', 'San gab', 'san pablo city', 'laguna', '1 year', 'none', 'none', 'collage', 'ariel', 'nogf', '09507702589', 'hugyigv', 'nkhugyg', '09859870624', 'Array', 'Array', 'Array', 'esteronjakexariel@gmail.com', '', 'Yes', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(20, 'ella', '2003-02-20', 'jihugyvb', 'Female', 'Separated', 'filipino', 'catholic', '09507702589', '1412', 'San gab', 'san pablo city', 'laguna', '1 year', 'none', 'sa kanto', 'collage', 'ariel', 'mag babalot', '09507702589', 'josefa kantohan', 'yakulura', '09123456789', 'hugyigv', 'i8y7y', '09123456789', 'esteronjakexariel@gmail.com', 'No', 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(21, 'herm', '2000-01-04', 'jihugyvb', 'Female', 'Married', 'filipino', 'catholic', '09507702589', '1412', 'San gab', 'san pablo city', 'laguna', '', 'none', 'none', 'collage', '', '', '', '', '', '', '', '', '', 'esteronjakexariel@gmail.com', 'Yes', 'No', 'No', '0', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(22, 'jo', '2000-01-04', 'jihugyvb', 'Male', 'Married', 'filipino', 'catholic', '09507702589', '1412', 'San gab', 'san pablo city', 'laguna', '1 year', 'none', 'none', 'collage', 'ariel', 'nogf', '', 'hugyigv', 'nkhugyg', '', 'Array', 'Array', 'Array', 'esteronjakexariel@gmail.com', 'No', 'No', 'No', '0', 0, '', '', '', '', '', 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(23, 'xariel', '2003-01-07', 'naujan', 'Male', 'Married', 'filipino', 'catholic', '09507702589', '606511', '2F', 'san pablo city', 'laguna', 'none', 'none', 'sa kanto', 'collage', 'ariel', 'nogf', '09859870624', 'hugyigv', 'nkhugyg', '09507702589', 'Array', 'Array', 'Array', 'esteronjakexariel@gmail.com', 'Yes', 'No', 'No', '23380', 21, '', 'Single', 'none', 'collage', 'uhyg', 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(24, 'calisha', '2003-01-07', 'naujan', 'Female', 'Married', 'filipino', 'catholic', '09507702589', '606511', '2F', 'san pablo city', 'laguna', 'none', 'none', 'sa kanto', 'collage', 'ariel', 'nogf', '09507702589', 'hugyigv', 'nkhugyg', '09859870624', '', '', '', 'esteronjakexariel@gmail.com', 'No', 'No', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(25, 'jow', '2000-01-02', 'naujan', 'Female', 'Widowed', 'filipino', 'catholic', '09507702589', '', '', 'san pablo city', 'laguna', '1 year', 'none', 'none', 'collage', 'ariel', 'nogf', '92263841', 'josefa kantohan', 'nkhugyg', '09859876024', 'arianne paula tayag esteron', 'sister', '09859876024', 'esteronjakexariel@gmail.com', 'No', 'No', 'No', '23380', 21, '', 'Single', 'none', 'collage', 'uhyg', 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(26, 'aj', '4000-02-05', 'naujan', 'Female', 'Single', 'filipino', 'catholic', '09123456789', '1412', 'San gab', 'san pablo city', 'laguna', 'no', 'none', 'none', 'collage', 'ariel', 'nogf', '09507702589', 'hugyigv', 'nkhugyg', '09123456789', 'adada', 'sister', '09123456789', 'sampleemaol@fake.com', 'Yes', 'No', 'No', '23380', 21, '', 'Single', 'none', 'collage', 'uhyg', 'HomeOwner', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(27, 'luya', '4000-02-05', 'naujan', 'Female', 'Married', 'filipino', 'catholic', '09123456789', '1412', 'San gab', 'san pablo city', 'laguna', 'no', 'none', 'none', 'collage', 'ariel', 'nogf', '', 'hugyigv', 'nkhugyg', '', 'adada', 'sister', '09123456789', 'sampleemaol@fake.com', 'Yes', 'No', 'Yes', '23380', 21, '', '', 'none', 'collage', 'uhyg', '', 'Yes', NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(28, 'luya', '4000-02-05', 'naujan', '', '', 'filipino', 'catholic', '09123456789', '1412', 'San gab', 'san pablo city', 'laguna', 'no', 'none', 'none', 'collage', 'ariel', 'nogf', '', 'hugyigv', 'nkhugyg', '', 'adada', 'sister', '09123456789', 'sampleemaol@fake.com', '', '', '', '23380', 21, '', '', 'none', 'collage', 'uhyg', '', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(29, 'lyka', '4000-02-05', 'naujan', 'Female', 'Single', 'filipino', 'catholic', '09123456789', '1412', 'San gab', 'san pablo city', 'laguna', 'no', 'none', 'none', 'collage', 'ariel', 'nogf', '', 'hugyigv', 'nkhugyg', '09859876024', 'adada', 'sister', '09123456789', 'sampleemaol@fake.com', '', '', '', '23380', 21, '', 'Single', 'none', 'collage', 'uhyg', '', NULL, NULL, NULL, NULL, NULL, '2025-06-15 07:23:40'),
(30, 'erich', '4000-02-05', 'naujan', 'Male', 'Single', 'filipino', 'catholic', '09123456789', '1412', 'San gab', 'san pablo city', 'laguna', 'no', 'none', 'none', 'collage', 'ariel', 'nogf', '09859876024', 'hugyigv', 'nkhugyg', 'LIUI', 'adada', 'sister', '09123456789', 'sampleemaol@fake.com', 'Yes', 'No', 'Yes', '23380', 21, '', 'Single', 'none', 'collage', 'uhyg', 'Renters', 'Yes', 8710, 222, 354006, NULL, '2025-06-15 07:23:40'),
(31, 'nyemas', '8122-02-10', 'naujan', 'Female', 'Married', 'filipino', 'catholic', '09123456789', '1412', 'San gab', 'san pablo city', 'laguna', 'no', 'none', 'none', 'collage', 'ariel', 'nogf', '09859876024', 'hugyigv', 'nkhugyg', '2502918', 'adada', 'sister', '09123456789', 'sampleemaol@fake.com', 'Yes', 'Yes', 'Yes', '23380', 21, '', 'Single', 'none', 'collage', 'uhyg', 'HomeOwner', 'Yes', 8710, 222, 354006, '28812', '2025-06-15 07:23:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `4ps`
--
ALTER TABLE `4ps`
  ADD PRIMARY KEY (`fourps_id`);

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `brgyofficials`
--
ALTER TABLE `brgyofficials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwd`
--
ALTER TABLE `pwd`
  ADD PRIMARY KEY (`pwd_id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `4ps`
--
ALTER TABLE `4ps`
  MODIFY `fourps_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brgyofficials`
--
ALTER TABLE `brgyofficials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2227;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2227;

--
-- AUTO_INCREMENT for table `pwd`
--
ALTER TABLE `pwd`
  MODIFY `pwd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brgyofficials`
--
ALTER TABLE `brgyofficials`
  ADD CONSTRAINT `brgyofficials_ibfk_1` FOREIGN KEY (`id`) REFERENCES `officials` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
