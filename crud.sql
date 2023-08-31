-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 08:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Katleen Gail Ancheta', 'kgrb@gmail.com', 'katkat', 'kat123'),
(2, 'admin', 'admin@gmail.com', 'admin', 'adminn');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_students`
--

CREATE TABLE `deleted_students` (
  `idno` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `stu_parent` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_students`
--

INSERT INTO `deleted_students` (`idno`, `name`, `gender`, `email`, `mobile`, `password`, `pwd`, `stu_parent`, `deleted_at`) VALUES
(1, 'Renz Brixter Santiago', 'renz10@gmail.com', '123456', 'Male', '09913219131', 'no', 'no', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gwa`
--

CREATE TABLE `gwa` (
  `id` int(255) NOT NULL,
  `units` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gwa`
--

INSERT INTO `gwa` (`id`, `units`, `subjects`) VALUES
(1, '3', 'Understanding the Self'),
(2, '3', 'Purposive Communication'),
(3, '3', 'Mathematics in the Modern World'),
(4, '3', 'Introduction to Computing'),
(5, '3', 'Computer Programming 1'),
(6, '3', 'Health and Wellness Science'),
(7, '3', 'Reading in Philippine History'),
(8, '3', 'The Contemporary World'),
(9, '3', 'Computer Programing 2'),
(10, '3', 'Human - Computer Interaction 1'),
(11, '3', 'Discrete Mathematics'),
(12, '3', 'Science, Technology and Society'),
(13, '3', 'Ethics'),
(14, '3', 'Art Appreciation'),
(15, '3', 'Data Structures and Algorithm'),
(16, '3', 'Platform Technologies'),
(17, '3', 'Object- Oriented Programming'),
(18, '3', 'Business Communication'),
(19, '3\r\n', 'Information Management'),
(20, '3', 'Networking 1'),
(21, '3\r\n', 'Quantitative Methods (including Modeling and Simulation)'),
(22, '3', 'Integrative Programming and Technologies'),
(23, '3', 'Accounting for Information Technology'),
(24, '3', 'Fundamentals of Mobile Technology'),
(25, '3', 'Applications Development and Emerging Technologies'),
(26, '3', 'Web Systems and Technologies'),
(27, '3', 'The Entrepreneurial Mind'),
(28, '3', 'Advanced Database Systems'),
(29, '3', 'Networking 2'),
(30, '3', 'System Integration and Architecture'),
(31, '3', 'Information Assurance and Security 1'),
(32, '3', 'Web Application'),
(33, '3', 'Mobile Application'),
(34, '3', 'The Life and Works of Rizal'),
(35, '3', 'Multicultural Education'),
(36, '3', 'Information Assurance and Security 2'),
(37, '3', 'Social and Professional Issues'),
(38, '3', 'Capstone Project and Research 1'),
(39, '3', 'Game Development'),
(40, '3', 'Cloud Computing'),
(41, '3', 'Leadership and Management in the Profession'),
(42, '3', 'Systems Administration and Maintenance'),
(43, '3', 'Human Computer Interaction 2'),
(44, '3', 'Capstone Project and Research 2'),
(45, '9', 'Intership/OJT/Practicum (486 hours)');

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `idno` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `stu_parent` varchar(255) NOT NULL,
  `deleted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`idno`, `name`, `email`, `password`, `gender`, `mobile`, `pwd`, `stu_parent`, `deleted`) VALUES
(2, 'Katleen Gail M. Ancheta', 'kgrb1316@gmail.com', 'kath', 'Female', '0916326707', 'no', 'no', '0'),
(3, 'kiwi S. Mojeca', 'kiwkiw@gmail.com', 'kiwkiw', 'Male', '09914538175', 'yes', 'yes', '0'),
(4, 'Ma Valen Dammay', 'valen@gmail.com', 'valen', 'Female', '09123456789', 'no', 'no', '0'),
(5, 'Juan dela Cruz', 'juan@gmail.com', 'juan', 'Male', '09123456789', 'yes', 'yes', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id`, `email`, `subject`, `grade`, `unit`) VALUES
(9, 'kgrb1316@gmail.com', '6', '2.75', '3'),
(10, 'kgrb1316@gmail.com', '2', '1.5', '3'),
(11, 'kiwkiw@gmail.com', '7', '1.0', '3'),
(12, 'kiwkiw@gmail.com', '4', '2.0', '3'),
(13, 'kgrb1316@gmail.com', '7', '2', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gwa`
--
ALTER TABLE `gwa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`idno`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gwa`
--
ALTER TABLE `gwa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `idno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
