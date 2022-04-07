-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 18, 2022 at 12:31 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_pastpaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_classes`
--

CREATE TABLE `exam_classes` (
  `exam_class_id` tinyint(4) NOT NULL,
  `exam_class` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `exam_classes`
--

INSERT INTO `exam_classes` (`exam_class_id`, `exam_class`) VALUES
(1, 'Std Four'),
(2, 'Std Six'),
(3, 'Form Two'),
(4, 'Form Four'),
(5, 'Form Six');

-- --------------------------------------------------------

--
-- Table structure for table `exam_level`
--

CREATE TABLE `exam_level` (
  `school_level_id` tinyint(4) NOT NULL,
  `school_level_name` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `exam_subjects`
--

CREATE TABLE `exam_subjects` (
  `exam_subject_id` tinyint(4) NOT NULL,
  `exam_subject_name` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_subjects`
--

INSERT INTO `exam_subjects` (`exam_subject_id`, `exam_subject_name`) VALUES
(0, 'ENG'),
(1, 'KISW'),
(2, 'DINI'),
(3, 'KIAR'),
(4, 'GEOG'),
(5, 'CIVICS'),
(6, 'HIST'),
(7, 'CHEM'),
(8, 'PHY'),
(9, 'BIOL'),
(10, 'MATH'),
(11, 'URAIA'),
(12, 'SCIENCE'),
(13, 'ICT'),
(14, 'SAYANSI'),
(15, 'HISABATI');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `exam_type_id` tinyint(4) NOT NULL,
  `exam_type_name` char(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`exam_type_id`, `exam_type_name`) VALUES
(1, 'ZEC'),
(2, 'NECTA'),
(3, 'MOCK');

-- --------------------------------------------------------

--
-- Table structure for table `exam_year`
--

CREATE TABLE `exam_year` (
  `exam_year_id` tinyint(4) NOT NULL,
  `exam_year` varchar(16) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `exam_year`
--

INSERT INTO `exam_year` (`exam_year_id`, `exam_year`) VALUES
(1, '2010'),
(2, '2011'),
(3, '2012'),
(4, '2013'),
(5, '2014'),
(6, '2015'),
(7, '2016'),
(8, '2017'),
(9, '2018'),
(10, '2019'),
(11, '2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_classes`
--
ALTER TABLE `exam_classes`
  ADD PRIMARY KEY (`exam_class_id`);

--
-- Indexes for table `exam_level`
--
ALTER TABLE `exam_level`
  ADD PRIMARY KEY (`school_level_id`);

--
-- Indexes for table `exam_subjects`
--
ALTER TABLE `exam_subjects`
  ADD PRIMARY KEY (`exam_subject_id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`exam_type_id`);

--
-- Indexes for table `exam_year`
--
ALTER TABLE `exam_year`
  ADD PRIMARY KEY (`exam_year_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
