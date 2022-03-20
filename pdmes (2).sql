-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 06:02 PM
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

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `lrn`, `full_name`, `grade`, `school_name`, `school_id`, `division`, `last_school_year_attended`, `date`, `name_of_principal`, `affix`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(13, '109857060083', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

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

--
-- Dumping data for table `eligibility_for_elementary_school_enrollment`
--

INSERT INTO `eligibility_for_elementary_school_enrollment` (`id`, `lrn`, `credential_presented`, `name_of_school`, `school_id`, `address_of_school`, `others`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(81, '987654321078', 'ECCD Checklist', 'Qcmc', 'qc', 'AQWE', '', '2022-03-20 11:59:00', '2022-03-20 11:59:00', 'none'),
(82, '109857060083', 'Kinder progress report, ECCD Checklist', 'Pdmes', '123123', 'QC', '', '2022-03-21 12:00:00', '2022-03-21 12:00:00', 'none');

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

--
-- Dumping data for table `learners_personal_infos`
--

INSERT INTO `learners_personal_infos` (`id`, `lrn`, `last_name`, `first_name`, `middle_name`, `suffix`, `birth_date`, `sex`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(120, '987654321078', 'Melendez', 'Dorothy', 'Jean', '', '2022-03-30', 'Female', '2022-03-20 11:59:00', '2022-03-20 11:59:00', 'none'),
(121, '109857060083', 'Melendez', 'Dorothy', 'Jean', '', '2022-03-15', 'Male', '2022-03-21 12:00:00', '2022-03-21 12:00:00', 'none');

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

--
-- Dumping data for table `remedial_classes`
--

INSERT INTO `remedial_classes` (`id`, `lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(157, '987654321078', '0000-00-00', '0000-00-00', '', '', 0, 0, 1, '', '2022-03-20 11:59:00', '2022-03-20 11:59:00'),
(158, '987654321078', '0000-00-00', '0000-00-00', '', '', 0, 0, 1, '', '2022-03-20 11:59:00', '2022-03-20 11:59:00'),
(159, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 1, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(160, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 1, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(161, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 2, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(162, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 2, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(163, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 3, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(164, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 3, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(165, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 4, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(166, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 4, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(167, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 5, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(168, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 5, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(169, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 6, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(170, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 6, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(171, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 7, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(172, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 7, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(173, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 8, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(174, '109857060083', '0000-00-00', '0000-00-00', '', '', 0, 0, 8, '', '2022-03-21 12:00:00', '2022-03-21 12:00:00');

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

--
-- Dumping data for table `scholastic_records`
--

INSERT INTO `scholastic_records` (`id`, `lrn`, `school`, `school_id`, `district`, `division`, `region`, `classified_as_grade`, `section`, `school_year`, `name_of_adviser`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(122, '987654321078', '', '', '', '', '', '', '', '', '', 1, 'none', '2022-03-20 11:59:00', '2022-03-20 11:59:00'),
(123, '109857060083', '', '', '', '', '', '', '', '', '', 1, 'none', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(124, '109857060083', '', '', '', '', '', '', '', '', '', 2, 'none', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(125, '109857060083', '', '', '', '', '', '', '', '', '', 3, 'none', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(126, '109857060083', '', '', '', '', '', '', '', '', '', 4, 'none', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(127, '109857060083', '', '', '', '', '', '', '', '', '', 5, 'none', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(128, '109857060083', '', '', '', '', '', '', '', '', '', 6, 'none', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(129, '109857060083', '', '', '', '', '', '', '', '', '', 7, 'none', '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(130, '109857060083', '', '', '', '', '', '', '', '', '', 8, 'none', '2022-03-21 12:00:00', '2022-03-21 12:00:00');

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
-- Dumping data for table `students_grades`
--

INSERT INTO `students_grades` (`id`, `lrn`, `mother_tounge`, `filipino`, `english`, `math`, `science`, `araling_panlipunan`, `epp_tle`, `mapeh`, `music`, `arts`, `p_e`, `health`, `edukasyon_sa_pagpapakatao`, `arabic_language`, `islamic_values`, `general_average`, `term`, `remarks`, `phase`, `date_time_created`, `date_time_updated`) VALUES
(384, '987654321078', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '1', 0, '2022-03-20 11:59:00', '2022-03-20 11:59:00'),
(385, '987654321078', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '1', 0, '2022-03-20 11:59:00', '2022-03-20 11:59:00'),
(386, '987654321078', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', 'Failed', 1, '2022-03-20 11:59:00', '2022-03-20 11:59:00'),
(387, '987654321078', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 'Failed', 1, '2022-03-20 11:59:00', '2022-03-20 11:59:00'),
(388, '987654321078', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5', 'Failed', 1, '2022-03-20 11:59:00', '2022-03-20 11:59:00'),
(389, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '1', 0, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(390, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '1', 0, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(391, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', 'Failed', 1, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(392, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 'Failed', 1, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(393, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5', 'Failed', 1, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(394, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 'Failed', 2, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(395, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', 'Failed', 2, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(396, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', 'Failed', 2, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(397, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 'Failed', 2, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(398, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5', 'Failed', 2, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(399, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 'Failed', 3, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(400, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', 'Failed', 3, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(401, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', 'Failed', 3, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(402, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 'Failed', 3, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(403, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5', 'Failed', 3, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(404, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', '', 4, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(405, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '', 4, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(406, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', '', 4, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(407, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', '', 4, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(408, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5', '', 4, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(409, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 'Failed', 5, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(410, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', 'Failed', 5, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(411, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', 'Failed', 5, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(412, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 'Failed', 5, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(413, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5', 'Failed', 5, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(414, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 'Failed', 6, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(415, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', 'Failed', 6, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(416, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', 'Failed', 6, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(417, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 'Failed', 6, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(418, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5', 'Failed', 6, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(419, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 'Failed', 7, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(420, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', 'Failed', 7, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(421, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', 'Failed', 7, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(422, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 'Failed', 7, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(423, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5', 'Failed', 7, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(424, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 'Failed', 8, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(425, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', 'Failed', 8, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(426, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', 'Failed', 8, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(427, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4', 'Failed', 8, '2022-03-21 12:00:00', '2022-03-21 12:00:00'),
(428, '109857060083', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '5', 'none', 8, '2022-03-21 12:00:00', '2022-03-21 12:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `eligibility_for_elementary_school_enrollment`
--
ALTER TABLE `eligibility_for_elementary_school_enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `learners_personal_infos`
--
ALTER TABLE `learners_personal_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `students_grades`
--
ALTER TABLE `students_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=429;

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
