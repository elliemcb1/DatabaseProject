
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 02:22 AM
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
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(1, 'HNDWEBEN-F231A-L'),
(2, 'HNDWEBEN-F232A-L'),
(3, 'HNDCOMPSD-F232A-L'),
(4, 'HNDCOMSD-F232A-L'),
(5, 'HNDCNETWORK-F232A-L'),
(6, 'HNDCCYBER-F232A-L');

-- --------------------------------------------------------

--
-- Table structure for table `enrolment`
--

CREATE TABLE `enrolment` (
  `enrolment_id` int(11) NOT NULL,
  `fk_course` int(11) DEFAULT NULL,
  `fk_student` int(11) NOT NULL,
  `enrolment_date` date DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolment`
--

INSERT INTO `enrolment` (`enrolment_id`, `fk_course`, `fk_student`, `enrolment_date`, `active`) VALUES
(1, 1, 1, '2025-01-01', 1),
(2, 2, 2, '2025-01-01', 1),
(3, 4, 5, '2025-01-01', 1),
(4, 1, 6, '2025-01-01', 1),
(5, 3, 4, '2025-01-01', 1),
(6, 2, 2, '2025-01-01', 1),
(7, 6, 1, '2025-01-01', 1),
(8, 2, 5, '2025-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(64) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `dob`, `address`, `tel`) VALUES
(1, 'Eric Cartman', '2000-09-11', 'Southpark', '01410000000'),
(2, 'Bart Simpson', '2000-09-04', 'Springfield', '07656876545'),
(3, 'Lisa Simpson', '2002-06-01', 'springfield', '022345235'),
(4, 'Marge Simpson', '2002-06-01', 'springfield', '022345235'),
(5, 'Homer Simpson', '2002-06-01', 'springfield', '022345235'),
(6, 'Maggie Simpson', '2002-06-01', 'springfield', '022345235');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD PRIMARY KEY (`enrolment_id`),
  ADD KEY `fk_course` (`fk_course`),
  ADD KEY `fk_student` (`fk_student`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrolment`
--
ALTER TABLE `enrolment`
  MODIFY `enrolment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD CONSTRAINT `enrolment_ibfk_1` FOREIGN KEY (`fk_course`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `fk_student` FOREIGN KEY (`fk_student`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
