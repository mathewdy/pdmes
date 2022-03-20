-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 02:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
  `lrn` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL,
  `last_school_year_attended` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `name_of_principal` varchar(50) NOT NULL,
  `affix` varchar(50) NOT NULL,
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
  `lrn` varchar(50) NOT NULL,
  `credential_presented` varchar(100) NOT NULL,
  `name_of_school` varchar(50) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `address_of_school` varchar(255) NOT NULL,
  `others` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `learners_personal_infos`
--

CREATE TABLE `learners_personal_infos` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `remedial_classes`
--

CREATE TABLE `remedial_classes` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `learning_areas` varchar(50) NOT NULL,
  `final_rating` varchar(50) NOT NULL,
  `remedial_class_mark` int(11) NOT NULL,
  `recomputed_final_grade` int(11) NOT NULL,
  `phase` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `quarter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholastic_records`
--

CREATE TABLE `scholastic_records` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `district` text NOT NULL,
  `division` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `classified_as_grade` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `name_of_adviser` varchar(50) NOT NULL,
  `phase` int(11) NOT NULL,
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
  `lrn` varchar(50) NOT NULL,
  `mother_tounge` int(11) NOT NULL,
  `filipino` int(11) NOT NULL,
  `english` int(11) NOT NULL,
  `math` int(11) NOT NULL,
  `science` int(11) NOT NULL,
  `araling_panlipunan` int(11) NOT NULL,
  `epp_tle` int(11) NOT NULL,
  `mapeh` int(11) NOT NULL,
  `music` int(11) NOT NULL,
  `arts` int(11) NOT NULL,
  `p_e` int(11) NOT NULL,
  `health` int(11) NOT NULL,
  `edukasyon_sa_pagpapakatao` int(11) NOT NULL,
  `arabic_language` int(11) NOT NULL,
  `islamic_values` int(11) NOT NULL,
  `general_average` int(11) NOT NULL,
  `term` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `phase` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `lrn` (`lrn`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `eligibility_for_elementary_school_enrollment`
--
ALTER TABLE `eligibility_for_elementary_school_enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `learners_personal_infos`
--
ALTER TABLE `learners_personal_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `students_grades`
--
ALTER TABLE `students_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

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
  ADD CONSTRAINT `remedial_classes_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `scholastic_records` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  ADD CONSTRAINT `scholastic_records_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_grades`
--
ALTER TABLE `students_grades`
  ADD CONSTRAINT `students_grades_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `scholastic_records` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
