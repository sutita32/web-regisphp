-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 05:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rg_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_ID` int(11) NOT NULL,
  `class_name` varchar(200) DEFAULT NULL,
  `Total_Rg_st` int(11) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `course_ID` varchar(10) DEFAULT NULL,
  `Teach_ID` varchar(200) DEFAULT NULL,
  `Total_Rg_st_max` int(11) NOT NULL,
  `day` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_ID`, `class_name`, `Total_Rg_st`, `time_start`, `time_end`, `course_ID`, `Teach_ID`, `Total_Rg_st_max`, `day`) VALUES
(1, '1', 1, '09:00:00', '12:00:00', '040203101', '00000', 45, 'M'),
(2, '2', 0, '09:00:00', '12:00:00', '040203101', '00453', 30, 'T'),
(3, '1', 1, '13:00:00', '16:00:00', '040313016', '11111', 60, 'M'),
(4, '1', 0, '13:00:00', '16:00:00', '040313018', '45123', 50, 'T'),
(5, '1', 0, '09:00:00', '12:00:00', '040313107', '02546', 60, 'W'),
(6, '1', 0, '13:00:00', '16:00:00', '040413001', '02546', 45, 'W'),
(7, '1', 0, '09:00:00', '12:00:00', '040613348', '79456', 50, 'H'),
(8, '1', 0, '13:00:00', '16:00:00', '040613348', '78945', 55, 'H'),
(9, '1', 1, '09:00:00', '16:00:00', '040613326', '12345', 45, 'F'),
(10, '1', 0, '13:00:00', '16:00:00', '040713101', '12345', 50, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_ID` varchar(10) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_ID`, `course_name`, `credit`) VALUES
('040203101', 'mathematic I', 3),
('040313016', 'physics in daily life', 3),
('040313018', 'human body and health', 3),
('040313107', 'digital and logic circuit', 3),
('040413001', 'biology in daily life', 3),
('040613326', 'web development', 3),
('040613348', 'software testing', 3),
('040713101', 'fundamental biology', 2);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_ID` int(11) NOT NULL,
  `class_ID` int(11) DEFAULT NULL,
  `std_ID` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_ID`, `class_ID`, `std_ID`) VALUES
(5, 1, '6204062636287'),
(6, 3, '6204062636287'),
(7, 9, '6204062636287');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_ID` varchar(13) NOT NULL,
  `std_password` varchar(200) DEFAULT NULL,
  `std_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`std_data`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_ID`, `std_password`, `std_data`) VALUES
('6204062636091', '11111', '{\"name\":\"ณัฐกนก รุ้งสิริเดชา\",\"Group\":\"วิทยาศาสตร์ประยุกต์\",\"Branch\":\"CS\",\"Sex\":\"female\"}'),
('6204062636112', '55555', '{\"name\":\"ธงทอง ผึ่งผาย\",\"Group\":\"วิทยาศาสตร์ประยุกต์\",\"Branch\":\"CS\",\"Sex\":\"male\"}'),
('6204062636287', '1639800270119', '{\"name\":\"วิชาญ ซากาอิ\",\"Group\":\"วิทยาศาสตร์ประยุกต์\",\"Branch\":\"CS\",\"Sex\":\"male\"}'),
('6204062636317', '00000', '{\"name\":\"สุธิตา ปรียากร\",\"Group\":\"วิทยาศาสตร์ประยุกต์\",\"Branch\":\"CS\",\"Sex\":\"female\"}');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teach_ID` varchar(100) NOT NULL,
  `Teach_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teach_ID`, `Teach_name`) VALUES
('00000', 'อ.กมลวัลย์ ล์อประเสริฐ'),
('00453', 'ดร. ณัฐสุดา สุมณศิริ'),
('02345', 'ดร. โดม โล่ห์เพ็ชร์'),
('02546', 'ดร. ชุลีวรรณ โชติวงษ์'),
('11111', 'นางสาว คันธรส แสนวงศ์'),
('12345', 'อ.กรองแก้ว หวังนิเวศน์กุล'),
('45123', 'ดร. ชลิตา สุวรรณ'),
('45698', 'ดร. ชนศักด์ บ่ายเที่ยง'),
('78945', 'นาย จิตกร กนกนัยการ'),
('79456', 'ดร. ณัฐพล ประยงค์พันธุ์');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teach_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
