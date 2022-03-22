-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 04:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
  `c_school_id` varchar(50) NOT NULL,
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

INSERT INTO `certifications` (`id`, `lrn`, `full_name`, `grade`, `school_name`, `c_school_id`, `division`, `last_school_year_attended`, `date`, `name_of_principal`, `affix`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(20, '123456789012', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `eligibility_for_elementary_school_enrollment`
--

CREATE TABLE `eligibility_for_elementary_school_enrollment` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `credential_presented` varchar(100) NOT NULL,
  `name_of_school` varchar(50) NOT NULL,
  `efese_school_id` varchar(50) NOT NULL,
  `address_of_school` varchar(255) NOT NULL,
  `others` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eligibility_for_elementary_school_enrollment`
--

INSERT INTO `eligibility_for_elementary_school_enrollment` (`id`, `lrn`, `credential_presented`, `name_of_school`, `efese_school_id`, `address_of_school`, `others`, `date_time_created`, `date_time_updated`, `remarks`) VALUES
(98, '123456789012', 'Kinder progress report, ECCD Checklist', 'Sadboi', '299183', 'CUTIE LANG', '', '2022-03-22 04:00:00', '2022-03-22 04:00:00', 'none'),
(104, '987634568729', 'Kinder progress report, ECCD Checklist', 'Iasjhd', '98123', 'JS', '', '2022-03-22 10:48:00', '2022-03-22 10:48:00', 'none');

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
(137, '123456789012', 'Cutiepie', 'Sugarplum', 'Honeybunch', '', '2022-03-22', 'Male', '2022-03-22 04:00:00', '2022-03-22 04:00:00', 'none'),
(143, '987634568729', 'Lapore', 'Jade mark', 'Hundsum', '', '2022-03-22', 'Male', '2022-03-22 10:48:00', '2022-03-22 10:48:00', 'none');

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
(313, '123456789012', '2020-07-08', '2020-08-08', '88', '87', 0, 88, 1, '', '2022-03-22 04:02:00', '2022-03-22 04:02:00'),
(314, '123456789012', '2020-07-08', '2020-08-08', '87', '78', 0, 87, 1, '', '2022-03-22 04:02:00', '2022-03-22 04:02:00'),
(315, '123456789012', '2022-03-29', '2022-04-07', '77', '77', 0, 77, 2, '', '2022-03-22 04:03:00', '2022-03-22 04:03:00'),
(316, '123456789012', '2022-03-29', '2022-04-07', '77', '77', 0, 77, 2, '', '2022-03-22 04:03:00', '2022-03-22 04:03:00'),
(317, '123456789012', '2001-07-09', '2022-03-30', '88', '78', 0, 77, 3, '', '2022-03-22 04:05:00', '2022-03-22 04:05:00'),
(318, '123456789012', '2001-07-09', '2022-03-30', '87', '87', 0, 78, 3, '', '2022-03-22 04:05:00', '2022-03-22 04:05:00'),
(319, '123456789012', '2022-03-22', '2022-03-22', '88', '88', 0, 89, 4, '', '2022-03-22 04:06:00', '2022-03-22 04:06:00'),
(320, '123456789012', '2022-03-22', '2022-03-22', '98', '98', 0, 98, 4, '', '2022-03-22 04:06:00', '2022-03-22 04:06:00'),
(321, '123456789012', '2002-07-08', '2022-03-22', '70', '70', 0, 99, 5, '', '2022-03-22 04:07:00', '2022-03-22 04:07:00'),
(322, '123456789012', '2002-07-08', '2022-03-22', '88', '88', 0, 88, 5, '', '2022-03-22 04:07:00', '2022-03-22 04:07:00'),
(323, '123456789012', '2022-03-22', '2022-03-22', '77', '77', 0, 77, 6, '', '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(324, '123456789012', '2022-03-22', '2022-03-22', '77', '77', 0, 77, 6, '', '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(325, '123456789012', '2022-03-22', '2022-03-22', '76', '76', 0, 76, 7, '', '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(326, '123456789012', '2022-03-22', '2022-03-22', '76', '76', 0, 76, 7, '', '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(327, '123456789012', '2022-03-22', '2022-03-22', '76', '76', 0, 87, 8, '', '2022-03-22 04:14:00', '2022-03-22 04:14:00'),
(328, '123456789012', '2022-03-22', '2022-03-22', '87', '78', 0, 87, 8, '', '2022-03-22 04:14:00', '2022-03-22 04:14:00');

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
  `sr_school_id` varchar(50) NOT NULL,
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

INSERT INTO `scholastic_records` (`id`, `lrn`, `school`, `sr_school_id`, `district`, `division`, `region`, `classified_as_grade`, `section`, `school_year`, `name_of_adviser`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(200, '123456789012', 'Sceret ', '29929', '2', '8', '7', '6', '4', '2022', 'qiwey', 1, 'none', '2022-03-22 04:02:00', '2022-03-22 04:02:00'),
(201, '123456789012', 'Tite', '219398', '3', '8', '7', '6', '4', '2021', 'iuyew', 2, 'none', '2022-03-22 04:03:00', '2022-03-22 04:03:00'),
(202, '123456789012', 'Birat', '517', '2', '8', '7', '2', '7', '2012', 'ariau', 3, 'none', '2022-03-22 04:05:00', '2022-03-22 04:05:00'),
(203, '123456789012', 'Kopal', '28819', '8', '7', '6', '1', '6', '2001', 'dsouf', 4, 'none', '2022-03-22 04:06:00', '2022-03-22 04:06:00'),
(204, '123456789012', 'tite', '77', '5', '3', '9', '5', '3', '2011', 'pihfs', 5, 'none', '2022-03-22 04:07:00', '2022-03-22 04:07:00'),
(205, '123456789012', 'inutil', '88', '6', '5', '8', '3', '8', '2009', 'oasjd', 6, 'none', '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(206, '123456789012', 'mangmang', '65', '7', '6', '8', '8', '9', '2013', 'hasoidh', 7, 'none', '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(207, '123456789012', 'Ratttt', '129481', '8', '4', '5', '9', '8', '2022', 'iaufh', 8, 'none', '2022-03-22 04:14:00', '2022-03-22 04:14:00');

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
(774, '123456789012', 78, 78, 87, 87, 87, 87, 87, 87, 87, 87, 98, 87, 87, 87, 78, 87, '1', 'Passed', 1, '2022-03-22 04:02:00', '2022-03-22 04:02:00'),
(775, '123456789012', 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, '2', 'Passed', 1, '2022-03-22 04:02:00', '2022-03-22 04:02:00'),
(776, '123456789012', 87, 87, 87, 87, 87, 88, 88, 87, 87, 87, 87, 87, 87, 87, 87, 87, '3', 'Passed', 1, '2022-03-22 04:02:00', '2022-03-22 04:02:00'),
(777, '123456789012', 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, '4', 'Passed', 1, '2022-03-22 04:02:00', '2022-03-22 04:02:00'),
(778, '123456789012', 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, '5', 'Passed', 1, '2022-03-22 04:02:00', '2022-03-22 04:02:00'),
(779, '123456789012', 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, '1', 'Passed', 2, '2022-03-22 04:03:00', '2022-03-22 04:03:00'),
(780, '123456789012', 88, 88, 88, 88, 88, 88, 88, 0, 88, 88, 88, 88, 88, 88, 88, 88, '2', 'Passed', 2, '2022-03-22 04:03:00', '2022-03-22 04:03:00'),
(781, '123456789012', 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, '3', 'Passed', 2, '2022-03-22 04:03:00', '2022-03-22 04:03:00'),
(782, '123456789012', 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, '4', 'Passed', 2, '2022-03-22 04:03:00', '2022-03-22 04:03:00'),
(783, '123456789012', 88, 88, 88, 88, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, '5', 'Passed', 2, '2022-03-22 04:03:00', '2022-03-22 04:03:00'),
(784, '123456789012', 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 85, 98, 97, 97, '1', 'Passed', 3, '2022-03-22 04:05:00', '2022-03-22 04:05:00'),
(785, '123456789012', 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 79, 97, 97, 97, 97, 97, '2', 'Passed', 3, '2022-03-22 04:05:00', '2022-03-22 04:05:00'),
(786, '123456789012', 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, '3', 'Passed', 3, '2022-03-22 04:05:00', '2022-03-22 04:05:00'),
(787, '123456789012', 97, 97, 97, 97, 97, 97, 86, 97, 97, 97, 97, 97, 97, 97, 97, 97, '4', 'Passed', 3, '2022-03-22 04:05:00', '2022-03-22 04:05:00'),
(788, '123456789012', 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, 97, '5', 'Passed', 3, '2022-03-22 04:05:00', '2022-03-22 04:05:00'),
(789, '123456789012', 90, 90, 90, 90, 90, 90, 90, 0, 90, 90, 90, 90, 90, 90, 90, 90, '1', 'Passed', 4, '2022-03-22 04:06:00', '2022-03-22 04:06:00'),
(790, '123456789012', 90, 90, 90, 90, 90, 90, 90, 0, 90, 90, 90, 90, 90, 90, 90, 90, '2', 'Passed', 4, '2022-03-22 04:06:00', '2022-03-22 04:06:00'),
(791, '123456789012', 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 98, 98, 98, 98, 98, 98, '3', 'Passed', 4, '2022-03-22 04:06:00', '2022-03-22 04:06:00'),
(792, '123456789012', 98, 98, 98, 98, 98, 98, 98, 98, 98, 98, 98, 98, 98, 98, 98, 98, '4', 'Passed', 4, '2022-03-22 04:06:00', '2022-03-22 04:06:00'),
(793, '123456789012', 98, 98, 98, 98, 98, 98, 98, 99, 88, 98, 98, 98, 98, 98, 98, 98, '5', 'Passed', 4, '2022-03-22 04:06:00', '2022-03-22 04:06:00'),
(794, '123456789012', 88, 88, 98, 89, 89, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, '1', 'Passed', 5, '2022-03-22 04:07:00', '2022-03-22 04:07:00'),
(795, '123456789012', 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, '2', 'Passed', 5, '2022-03-22 04:07:00', '2022-03-22 04:07:00'),
(796, '123456789012', 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, 78, '3', 'Passed', 5, '2022-03-22 04:07:00', '2022-03-22 04:07:00'),
(797, '123456789012', 78, 77, 78, 78, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, 87, '4', 'Passed', 5, '2022-03-22 04:07:00', '2022-03-22 04:07:00'),
(798, '123456789012', 87, 87, 88, 87, 87, 87, 87, 99, 99, 99, 99, 88, 98, 88, 88, 78, '5', 'Passed', 5, '2022-03-22 04:07:00', '2022-03-22 04:07:00'),
(799, '123456789012', 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, 88, '1', 'Passed', 6, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(800, '123456789012', 87, 87, 87, 78, 87, 87, 87, 87, 77, 77, 77, 77, 77, 77, 77, 77, '2', 'Passed', 6, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(801, '123456789012', 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, '3', 'Passed', 6, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(802, '123456789012', 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, '4', 'Passed', 6, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(803, '123456789012', 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, 77, '5', 'Passed', 6, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(804, '123456789012', 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, '1', 'Failed', 7, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(805, '123456789012', 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, '2', 'Failed', 7, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(806, '123456789012', 65, 65, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, '3', 'Passed', 7, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(807, '123456789012', 76, 76, 76, 76, 76, 76, 76, 0, 76, 76, 76, 76, 76, 76, 76, 76, '4', 'Passed', 7, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(808, '123456789012', 76, 76, 76, 76, 76, 76, 76, 0, 76, 76, 76, 76, 76, 76, 76, 76, '5', 'Passed', 7, '2022-03-22 04:10:00', '2022-03-22 04:10:00'),
(809, '123456789012', 98, 88, 87, 87, 88, 87, 78, 87, 87, 87, 77, 67, 76, 67, 76, 76, '1', 'Passed', 8, '2022-03-22 04:14:00', '2022-03-22 04:14:00'),
(810, '123456789012', 76, 76, 76, 67, 67, 67, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, '2', 'Passed', 8, '2022-03-22 04:14:00', '2022-03-22 04:14:00'),
(811, '123456789012', 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, '3', 'Passed', 8, '2022-03-22 04:14:00', '2022-03-22 04:14:00'),
(812, '123456789012', 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, '4', 'Passed', 8, '2022-03-22 04:14:00', '2022-03-22 04:14:00'),
(813, '123456789012', 77, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, 76, '5', 'Passed', 8, '2022-03-22 04:14:00', '2022-03-22 04:14:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `eligibility_for_elementary_school_enrollment`
--
ALTER TABLE `eligibility_for_elementary_school_enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `learners_personal_infos`
--
ALTER TABLE `learners_personal_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `students_grades`
--
ALTER TABLE `students_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=824;

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
