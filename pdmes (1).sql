-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 05:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdmes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$/r6yuEzPzmCvI1KXHKS/WuT4qd.d0W0s2I8dTVuLC4i'),
(2, 'dalisay', '$2y$10$rbZ/tpeqcz7YyJ44oO4OAeC2KDRr2ihnMI.jhAo6UiG'),
(3, 'dalisay', '$2y$10$7s/k/vYxa29uUhPrH3Of.OK0hDLnARsH.YQvr2bDhhqwQFsQa1jsS');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(11) NOT NULL,
  `lrn` int(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `division` datetime NOT NULL,
  `last_school_year_attended` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `name_of_principal` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eligibility_for_elementary_school_enrollment`
--

CREATE TABLE `eligibility_for_elementary_school_enrollment` (
  `id` int(11) NOT NULL,
  `credential_presented` varchar(50) NOT NULL,
  `name_of_school` varchar(50) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `address_of_school` varchar(255) NOT NULL,
  `others` varchar(50) NOT NULL,
  `lrn` int(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eligibility_for_elementary_school_enrollment`
--

INSERT INTO `eligibility_for_elementary_school_enrollment` (`id`, `credential_presented`, `name_of_school`, `school_id`, `address_of_school`, `others`, `lrn`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(1, 'Kinder progress report', '1123123', 'asdasd', 'asdad', 'asd', 111231234, '2022-03-03 05:05:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `learners_personal_infos`
--

CREATE TABLE `learners_personal_infos` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `lrn` int(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `learners_personal_infos`
--

INSERT INTO `learners_personal_infos` (`id`, `last_name`, `first_name`, `middle_name`, `suffix`, `lrn`, `birth_date`, `sex`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(1, 'Gamit', 'Jancecar', '', '', 0, '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 'Gamit', 'Jancecar', 'Angeles', '', 0, '0000-00-00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(3, 'Gamit', 'Jancecar', 'Angeles', 'none', 123, '2022-03-10', 'Male', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(4, 'dasda', 'ddasd', 'dasdas', '', 123, '0000-00-00', '', '2003-03-22 03:02:00', '0000-00-00 00:00:00', ''),
(5, 'Gamit', 'Thaddeus ', 'daasd', 'dasd', 23123, '0000-00-00', '', '2022-03-03 00:00:00', '0000-00-00 00:00:00', ''),
(6, 'Gamit', 'Thaddeus ', 'Angeles', 'none', 131, '0000-00-00', 'Male', '2022-03-03 03:04:00', '0000-00-00 00:00:00', ''),
(7, 'Gamit', 'Thaddeus ', 'Angeles', 'none', 131, '0000-00-00', 'Male', '2022-03-03 03:12:00', '0000-00-00 00:00:00', ''),
(8, 'Gamit', 'Thaddeus ', 'Angeles', 'none', 131, '0000-00-00', 'Male', '2022-03-03 03:13:00', '0000-00-00 00:00:00', ''),
(9, 'Gamit', 'Thaddeus ', 'Angeles', 'none', 131, '0000-00-00', 'Male', '2022-03-03 03:15:00', '0000-00-00 00:00:00', ''),
(10, 'Gamit', 'Thaddeus ', 'Angeles', 'none', 131, '0000-00-00', 'Male', '2022-03-03 03:16:00', '0000-00-00 00:00:00', ''),
(11, 'Gamit', 'Thaddeus ', 'Angeles', 'none', 131, '0000-00-00', 'Male', '2022-03-03 03:17:00', '0000-00-00 00:00:00', ''),
(12, 'sd', 'adsa', 'Angeles', 'none', 121231, '2022-03-29', 'Male', '2022-03-03 03:17:00', '0000-00-00 00:00:00', ''),
(13, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 03:18:00', '0000-00-00 00:00:00', ''),
(14, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 04:33:00', '0000-00-00 00:00:00', ''),
(15, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 04:35:00', '0000-00-00 00:00:00', ''),
(16, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 04:35:00', '0000-00-00 00:00:00', ''),
(17, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 04:36:00', '0000-00-00 00:00:00', ''),
(18, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(19, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 04:39:00', '0000-00-00 00:00:00', ''),
(20, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 04:40:00', '0000-00-00 00:00:00', ''),
(21, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 04:41:00', '0000-00-00 00:00:00', ''),
(22, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 04:47:00', '0000-00-00 00:00:00', ''),
(23, 'LAJARA', 'Jasmine Nicole', 'fadfadfds', 'jr', 123123, '2022-03-29', 'Female', '2022-03-03 04:56:00', '0000-00-00 00:00:00', ''),
(24, 'saad', 'sad12', 'Angeles', 'none', 111231234, '2022-03-03', 'Female', '2022-03-03 04:58:00', '0000-00-00 00:00:00', ''),
(25, 'saad', 'sad12', 'Angeles', 'none', 111231234, '2022-03-03', 'Female', '2022-03-03 05:01:00', '0000-00-00 00:00:00', ''),
(26, 'saad', 'sad12', 'Angeles', 'none', 111231234, '2022-03-03', 'Female', '2022-03-03 05:03:00', '0000-00-00 00:00:00', ''),
(27, 'saad', 'sad12', 'Angeles', 'none', 111231234, '2022-03-03', 'Female', '2022-03-03 05:03:00', '0000-00-00 00:00:00', ''),
(28, 'saad', 'sad12', 'Angeles', 'none', 111231234, '2022-03-03', 'Female', '2022-03-03 05:04:00', '0000-00-00 00:00:00', ''),
(29, 'saad', 'sad12', 'Angeles', 'none', 111231234, '2022-03-03', 'Female', '2022-03-03 05:05:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `remedial_classes`
--

CREATE TABLE `remedial_classes` (
  `id` int(11) NOT NULL,
  `lrn` int(11) NOT NULL,
  `final_rating` int(11) NOT NULL,
  `remedial_class_remark` int(11) NOT NULL,
  `recomputed_final_grade` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholastic_records`
--

CREATE TABLE `scholastic_records` (
  `id` int(11) NOT NULL,
  `lrn` int(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `school_id` int(50) NOT NULL,
  `district` text NOT NULL,
  `division` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `classified_as_grade` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `name_of_adviser` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students_grades`
--

CREATE TABLE `students_grades` (
  `id` int(11) NOT NULL,
  `lrn` int(50) NOT NULL,
  `mother_tounge` int(11) NOT NULL,
  `filipino` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `araling_panlipunan` int(11) NOT NULL,
  `epp_tle` int(11) NOT NULL,
  `music` int(11) NOT NULL,
  `arts` int(11) NOT NULL,
  `p_e` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `edukasyon_sa_pagpapakatao` int(11) NOT NULL,
  `arabic_language` int(11) NOT NULL,
  `islamic_values` int(11) NOT NULL,
  `general_average` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `first_grading` varchar(50) NOT NULL,
  `second_grading` varchar(50) NOT NULL,
  `third_grading` varchar(50) NOT NULL,
  `fourth_grading` varchar(50) NOT NULL,
  `final_grading` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `first_grading`, `second_grading`, `third_grading`, `fourth_grading`, `final_grading`) VALUES
(1, 'first grading', 'second grading', 'third grading', 'fourth grading', 'final grading');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `eligibility_for_elementary_school_enrollment`
--
ALTER TABLE `eligibility_for_elementary_school_enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `learners_personal_infos`
--
ALTER TABLE `learners_personal_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `students_grades`
--
ALTER TABLE `students_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `term` (`term`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eligibility_for_elementary_school_enrollment`
--
ALTER TABLE `eligibility_for_elementary_school_enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learners_personal_infos`
--
ALTER TABLE `learners_personal_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_grades`
--
ALTER TABLE `students_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eligibility_for_elementary_school_enrollment`
--
ALTER TABLE `eligibility_for_elementary_school_enrollment`
  ADD CONSTRAINT `eligibility_for_elementary_school_enrollment_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  ADD CONSTRAINT `remedial_classes_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  ADD CONSTRAINT `scholastic_records_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_grades`
--
ALTER TABLE `students_grades`
  ADD CONSTRAINT `students_grades_ibfk_1` FOREIGN KEY (`term`) REFERENCES `terms` (`id`),
  ADD CONSTRAINT `students_grades_ibfk_2` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
