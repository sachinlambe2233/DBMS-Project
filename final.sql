-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 28, 2026 at 07:40 PM
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
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$IElzRe3vNDhhoBbzJhqpZuKuI3N2Kn7fNlCdw.9Z8Y32FpKQl56BW');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(50) NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch`) VALUES
(1, 'Computer'),
(4, 'IT'),
(5, 'AIDS'),
(6, 'ENTC'),
(7, 'AI'),
(8, 'MECHANICAL'),
(9, 'ELECTRICAL');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(200) NOT NULL,
  `roll_no` int(200) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `sem_id` int(9) NOT NULL,
  `subj_id` int(200) NOT NULL,
  `marks` int(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `roll_no`, `branch_id`, `sem_id`, `subj_id`, `marks`) VALUES
(35, 51, 1, 4, 77, 91),
(36, 51, 1, 4, 74, 75),
(37, 51, 1, 4, 75, 85),
(38, 51, 1, 4, 72, 69),
(39, 51, 1, 4, 73, 88),
(40, 51, 1, 4, 81, 90),
(41, 51, 1, 4, 82, 81),
(42, 51, 1, 4, 78, 79),
(43, 51, 1, 4, 76, 74),
(44, 51, 1, 4, 80, 89),
(45, 51, 1, 4, 79, 95),
(46, 50, 1, 4, 77, 77),
(47, 50, 1, 4, 74, 88),
(48, 50, 1, 4, 75, 95),
(49, 50, 1, 4, 72, 87),
(50, 50, 1, 4, 73, 68),
(51, 50, 1, 4, 81, 72),
(52, 50, 1, 4, 82, 81),
(53, 50, 1, 4, 78, 93),
(54, 50, 1, 4, 76, 74),
(55, 50, 1, 4, 80, 79),
(56, 50, 1, 4, 79, 95),
(57, 45, 1, 4, 77, 95),
(58, 45, 1, 4, 74, 55),
(59, 45, 1, 4, 75, 74),
(60, 45, 1, 4, 72, 82),
(61, 45, 1, 4, 73, 76),
(62, 45, 1, 4, 81, 88),
(63, 45, 1, 4, 82, 83),
(64, 45, 1, 4, 78, 92),
(65, 45, 1, 4, 76, 86),
(66, 45, 1, 4, 80, 84),
(67, 45, 1, 4, 79, 89);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(9) NOT NULL,
  `semester` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `semester`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `reg_id` int(255) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Roll_No` int(160) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `branch_id` int(100) NOT NULL,
  `sem_id` int(8) NOT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`reg_id`, `Name`, `Roll_No`, `Email`, `Gender`, `DOB`, `branch_id`, `sem_id`, `Reg_date`, `status`) VALUES
(15, 'KATE  SARTHAK MADHUKAR', 32, 'sarthak@gmail.com', 'Male', '2006-06-14', 1, 4, '2026-04-28 17:05:20', 1),
(16, 'LAMBE SACHIN MACHHINDRA', 45, 'sachin@gmail.com', 'Male', '2006-03-22', 1, 4, '2026-04-28 17:05:59', 1),
(17, 'LOKHANDE TEJAS DNYANESHWAR', 50, 'tejas@gmail.com', 'Male', '2006-03-15', 1, 4, '2026-04-28 17:06:42', 1),
(18, 'LONDHE TEJAS RAMESH', 51, 'tejas@gmail.com', 'Male', '2006-07-13', 1, 4, '2026-04-28 17:07:15', 1),
(19, 'KADAM YASH DADARAO', 20, 'yash@gmail.com', 'Male', '2006-11-22', 1, 4, '2026-04-28 17:08:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subj_id` int(200) NOT NULL,
  `subj_name` varchar(200) NOT NULL,
  `subj_code` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subj_id`, `subj_name`, `subj_code`, `status`) VALUES
(72, 'Database Management systems', 'PCC-251- COM', 1),
(73, 'Discrete Mathematics', 'PCC-252- COM', 1),
(74, 'Computer Organization & Microprocessor', 'PCC-253- COM', 1),
(75, 'Database Management Laboratory', 'PCC-254- COM', 1),
(76, 'Microprocessor Laboratory', 'PCC-255- COM', 1),
(77, '*Open Elective - II', '0', 1),
(78, 'Internet of Things', 'MDM271- COM', 1),
(79, 'Web Development ', 'VSE281-COM', 1),
(80, 'Modern Indian Language (Marathi)', 'AEC-282- COM', 1),
(81, 'Engineering Product Design', 'EEM-283- COM', 1),
(82, 'Environmental Studies', 'VEC-284- COM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_comb`
--

CREATE TABLE `subject_comb` (
  `comb_id` int(200) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `sem_id` int(9) NOT NULL,
  `subj_id` int(200) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_comb`
--

INSERT INTO `subject_comb` (`comb_id`, `branch_id`, `sem_id`, `subj_id`, `status`) VALUES
(1, 1, 1, 65, 1),
(2, 1, 1, 66, 1),
(3, 1, 1, 67, 1),
(4, 1, 1, 68, 1),
(5, 1, 1, 69, 1),
(6, 1, 1, 70, 1),
(7, 1, 1, 71, 1),
(8, 1, 2, 56, 1),
(9, 1, 2, 57, 1),
(10, 1, 2, 58, 1),
(11, 1, 2, 59, 1),
(13, 1, 2, 60, 1),
(14, 1, 2, 61, 1),
(15, 1, 2, 63, 1),
(16, 1, 2, 64, 1),
(17, 1, 3, 1, 1),
(18, 1, 3, 2, 1),
(19, 1, 3, 3, 1),
(20, 1, 3, 4, 1),
(21, 1, 3, 5, 1),
(23, 1, 3, 6, 1),
(24, 1, 3, 7, 1),
(25, 1, 3, 8, 1),
(26, 1, 3, 9, 1),
(27, 1, 4, 10, 1),
(28, 1, 4, 11, 1),
(29, 1, 4, 12, 1),
(30, 1, 4, 13, 1),
(31, 1, 4, 14, 1),
(32, 1, 4, 15, 1),
(33, 1, 4, 16, 1),
(34, 1, 4, 17, 1),
(35, 1, 4, 18, 1),
(36, 1, 4, 19, 1),
(37, 1, 5, 20, 1),
(38, 1, 5, 21, 1),
(39, 1, 5, 22, 1),
(40, 1, 5, 23, 1),
(41, 1, 5, 24, 1),
(42, 1, 5, 25, 1),
(43, 1, 5, 26, 1),
(44, 1, 5, 27, 1),
(45, 1, 5, 28, 1),
(46, 1, 5, 29, 1),
(47, 1, 5, 30, 1),
(48, 1, 6, 31, 1),
(49, 1, 6, 32, 1),
(50, 1, 6, 33, 1),
(51, 1, 6, 34, 1),
(52, 1, 6, 35, 1),
(53, 1, 6, 36, 1),
(54, 1, 6, 37, 1),
(55, 1, 6, 38, 1),
(56, 1, 7, 39, 1),
(57, 1, 7, 40, 1),
(58, 1, 7, 41, 1),
(59, 1, 7, 44, 1),
(60, 1, 7, 47, 1),
(61, 1, 7, 48, 1),
(62, 2, 4, 50, 1),
(63, 2, 4, 51, 1),
(64, 2, 4, 1, 1),
(65, 2, 4, 2, 1),
(66, 2, 4, 5, 1),
(67, 2, 5, 70, 1),
(68, 2, 5, 11, 1),
(69, 2, 5, 8, 1),
(70, 2, 5, 44, 1),
(71, 2, 5, 3, 1),
(72, 3, 5, 1, 1),
(73, 3, 5, 2, 1),
(74, 3, 5, 5, 1),
(75, 3, 5, 8, 1),
(76, 3, 5, 31, 1),
(77, 1, 4, 72, 1),
(78, 1, 4, 73, 1),
(80, 1, 4, 74, 1),
(81, 1, 4, 75, 1),
(82, 1, 4, 76, 1),
(83, 1, 4, 77, 1),
(84, 1, 4, 78, 1),
(85, 1, 4, 79, 1),
(87, 1, 4, 80, 1),
(88, 1, 4, 81, 1),
(89, 1, 4, 82, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `subject_comb`
--
ALTER TABLE `subject_comb`
  ADD PRIMARY KEY (`comb_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `reg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subj_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `subject_comb`
--
ALTER TABLE `subject_comb`
  MODIFY `comb_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
