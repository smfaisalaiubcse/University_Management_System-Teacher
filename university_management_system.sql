-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 06:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `assignment_title` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `assignment_marks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `course_id`, `assignment_title`, `due_date`, `assignment_marks`, `created_at`) VALUES
(1, 1, 'ass-1', '2023-12-15', 15, '2023-12-13 21:16:09'),
(50, 1, 'ass-2', '2023-12-20', 1, '2023-12-17 20:58:00'),
(51, 1, 'ass-3', '2023-12-19', 5, '2023-12-18 05:44:46'),
(52, 1, 'ass-4', '2023-12-21', 15, '2023-12-18 19:35:07'),
(53, 1, 'ass-5', '2023-12-21', 5, '2023-12-18 19:37:56'),
(54, 1, 'In proident reprehe', '1972-02-14', 44, '2023-12-18 19:41:41'),
(55, 1, 'ass-6', '2023-12-07', 5, '2023-12-18 20:13:55'),
(56, 1, 'ass-7', '2023-12-20', 5, '2023-12-19 11:58:26'),
(57, 1, 'ass-8', '2023-12-15', 5, '2023-12-19 13:51:32'),
(58, 1, 'ass-9', '2023-12-13', 5, '2023-12-19 17:07:55'),
(59, 1, 'ass-10', '2023-12-21', 15, '2023-12-20 04:05:03'),
(60, 1, 'ass-11', '2023-12-28', 5, '2023-12-20 04:07:20'),
(61, 1, 'ass-12', '2023-12-28', 15, '2023-12-20 04:09:26'),
(62, 1, 'ass-13', '2024-01-04', 15, '2023-12-20 06:33:50'),
(63, 1, 'ass-14', '2023-12-21', 1, '2023-12-23 06:17:40'),
(64, 1, 'ass-15', '2023-12-28', 2, '2023-12-23 06:54:18'),
(65, 1, 'ass-50', '2023-11-27', 5, '2023-12-25 06:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `userID` int(11) NOT NULL,
  `section` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_code`, `department`, `userID`, `section`) VALUES
(1, 'webtech', '1100', 'CSE', 36, 'A'),
(2, 'Compiler', '1101', 'CSE', 36, 'A'),
(3, 'OOP-1', '1102', 'CSE', 36, 'A'),
(4, 'Compiler', '1100', 'CSE', 36, 'B'),
(5, 'Chemistry', '1120', 'FST', 47, 'A'),
(6, 'Chemistry Lab', '1121', 'FST', 47, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(11) NOT NULL,
  `notice_text` text NOT NULL,
  `notice_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `notice_text`, `notice_date`) VALUES
(1, 'Next friday is off day', '2023-12-25'),
(2, 'From monday to thursday all class will be online.', '2023-12-25'),
(3, 'University will close on sunday', '2023-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `email`) VALUES
(1, 'S M Faisal', 'smf@gmail.com'),
(2, 'Sajib Ghosh', 'sajib@gmail.com'),
(3, 'Mahsetab Hasan', 'mahsetab@gmail.com'),
(4, 'Rokon Ahmed', 'rokom@gmail.com'),
(5, 'Suraia Akter Samia', 'suraia@gmail.com'),
(6, 'S M Fahim', 'fahim@gmail.com'),
(7, 'S M Sobuz', 'sobuz@gmail.com'),
(8, 'S M Shakil', 'shakil@gmail.com'),
(9, 'MD Ali Sun', 'sun@gmail.com'),
(10, 'MD Moon', 'moon@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_enrollments`
--

CREATE TABLE `student_course_enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_course_enrollments`
--

INSERT INTO `student_course_enrollments` (`enrollment_id`, `student_id`, `course_id`) VALUES
(17, 2, 1),
(18, 1, 1),
(20, 4, 1),
(21, 3, 1),
(22, 9, 1),
(23, 10, 1),
(24, 6, 1),
(25, 8, 1),
(27, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_course_marks`
--

CREATE TABLE `student_course_marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `midterm_marks` float DEFAULT NULL,
  `finalterm_marks` float DEFAULT NULL,
  `total_marks` float GENERATED ALWAYS AS (`midterm_marks` * 0.4 + `finalterm_marks` * 0.6) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `userID` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `FathersName` varchar(30) NOT NULL,
  `MothersName` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `bloodGroup` text NOT NULL,
  `religion` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(100) NOT NULL,
  `country` varchar(200) NOT NULL,
  `division` varchar(200) NOT NULL,
  `rsc` varchar(200) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `sq1` varchar(100) NOT NULL,
  `sq2` varchar(100) NOT NULL,
  `sq3` varchar(100) NOT NULL,
  `sq4` varchar(100) NOT NULL,
  `sq5` varchar(100) NOT NULL,
  `sq6` varchar(100) NOT NULL,
  `SSCScName` varchar(100) NOT NULL,
  `SSCGPA` varchar(100) NOT NULL,
  `SSCPY` varchar(100) NOT NULL,
  `HSCClgName` varchar(100) NOT NULL,
  `HSCGPA` varchar(100) NOT NULL,
  `HSCPY` varchar(100) NOT NULL,
  `BScUnName` varchar(100) NOT NULL,
  `BScCGPA` varchar(100) NOT NULL,
  `BScPY` varchar(100) NOT NULL,
  `MScUnName` varchar(100) NOT NULL,
  `MScCGPA` varchar(100) NOT NULL,
  `MScPY` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`userID`, `userName`, `password`, `firstName`, `lastName`, `FathersName`, `MothersName`, `gender`, `bloodGroup`, `religion`, `email`, `phone`, `website`, `country`, `division`, `rsc`, `postcode`, `image`, `sq1`, `sq2`, `sq3`, `sq4`, `sq5`, `sq6`, `SSCScName`, `SSCGPA`, `SSCPY`, `HSCClgName`, `HSCGPA`, `HSCPY`, `BScUnName`, `BScCGPA`, `BScPY`, `MScUnName`, `MScCGPA`, `MScPY`) VALUES
(36, 'faisal', 'sub=&gt;cse', 'S M', 'Faisal', 'MD Sultan Ali', 'MST Fatema Akter', 'male', 'O+', 'Muslim', 'smf48406@gmail.com', '+8801305619071', '', 'Bangladesh', 'Dhaka', 'ECB Chattar', '1221', 'faisal-12.jpg', 'Thakurgaon', '', 'Cricket', '', 'Cricketer', '', 'CPSCS', '5.00', '2017', 'CPSCS', '5.00', '2019', 'AIUB', '3.86', '2024', 'AIUB', '3.90', '2026'),
(43, 'shakil', 'shakil123', 'S M', 'Shakil', 'MD Suruj Jaman', 'MST Parvin Akter', 'male', 'AB+', 'Muslim', 'shakil@gmail.com', '', '', 'Bangladesh', 'Rangpur', 'Choto Balia', '1111', '324590010_1342110306584613_5650110888623843921_n.jpg', 'Choto Balia', '', 'Football', '', '', 'Thakurgaon', 'BMBSC', '4.25', '2017', 'BMBSC', '4.10', '2019', 'Ruhiya Degree College', '3.00', '2024', 'Ruhiya Degree College', '3.30', '2026'),
(44, 'fahim', '01914023379', 'S M', 'Fahim', 'MD Sultan Ali', 'MST Fatema Akter', 'male', 'O+', 'Muslim', 'fahim@gmail.com', '01914023379', '', 'Bangladesh', 'Dhaka', 'manikdi', '1221', 'logo.png', 'Dhaka, Bangladesh', '', '', 'Mr. Beast', 'Techno Gamer', 'Jessore', 'CPSCS', '4.25', '2017', 'CPSCS', '5.00', '2019', 'AIUB', '3.86', '2024', 'AIUB', '3.85', '2026'),
(45, 'suraia', '12345678', 'Suraia', 'Akter Samia', 'MD Sultan Ali', 'MST Fatema Akter', 'female', 'O+', 'Muslim', 'suraiasamia@gmail.com', '01601237784', '', 'Bangladesh', 'Dhaka', 'Manikdi, ecb', '1200', 'samia.jpg', 'thakurgaon', '', '', 'Spider Man', 'Doctor', '', 'CPSCS', '5.00', '2018', 'CPSCS', '5.00', '2020', 'AFMC', '3.45', '2025', 'AFMC', '3.30', '2027'),
(46, 'sabuj', 'sabuj123', 'S M', 'Sabuj', 'MD Suruj Jaman', 'MST Parvin Akter', 'male', 'A+', 'Muslim', 'sabuj@gmail.com', '01298387980', '', 'Bangladesh', 'Dhaka', 'manikdi', '1300', 'sabuj.jpg', 'Balia', '', 'Cricket', 'Salman Shah', '', '', 'BMBSC', '3.95', '2012', 'BMBSC', '4.10', '2014', 'Thakurgaon Govt. College', '2.84', '2018', 'Thakurgaon Govt. College', '2.90', '2020'),
(47, 'shayla', 'shayla123', 'Shayla', 'Akhi', 'xyz', 'xyz', 'female', 'AB+', 'Muslim', 'shayla06@gmail.com', '01810354817', '', 'Bangladesh', 'Rangpur', 'RAMC', '3500', 'shayla.jpg', 'Dinajpur', 'Kabir Singh', '', '', 'Dinajpur', '', 'Amena Baki Residential School and College', '5.00', '2019', 'Amena Baki Residential School and College', '5.00', '2021', 'AMCR', '3.45', '2023', 'AMCR', '3.42', '2023'),
(48, 'sun', '12345678', 'MD Ali', 'Sun', 'MD Babu', 'MST Najma Khatun', 'male', 'O+', 'Muslim', 'sun@gmail.com', '01601237784', '', 'Bangladesh', 'Dhaka', 'Rampura', '1200', 'sun.jpg', 'Thakurgaon', '', '', '', 'Maolana', 'Thakurgaon', 'CPSCS', '5.00', '2018', 'SGSC', '5.00', '2020', 'Ruhiya Degree College', '3.86', '2023', 'Ruhiya Degree College', '3.85', '2023'),
(49, 'sultan', '12345678', 'MD', 'Sultan Ali', 'Abu Bakkar Siddik', 'Null', 'male', 'O+', 'Muslim', 'mdsultanali@gmail.com', '01716418708', '', 'Bangladesh', 'Dhaka', 'Manikdi', '1200', 'Screenshot 2023-11-19 215205.png', 'Thakurgaon', '', 'Football', '', 'Army', 'Thakurgaon', 'BMBSCHC', '4.89', '1993', 'BMBSCHC', '4.45', '1995', 'Saidpur Govt. College', '3.39', '2010', 'Saidpur Govt. College', '3.20', '2013'),
(50, 'sultan1', '12345678', 'MD', 'Sultan Ali', 'Abu Bakkar Siddik', 'Null', 'male', 'O+', 'Muslim', 'mdsultanali@gmail.com', '01716418708', '', 'Bangladesh', 'Dhaka', 'Manikdi', '1200', 'Screenshot 2023-11-25 210826.png', 'Thakurgaon', '', 'Football', '', 'Army', '', 'BMBSCHC', '3.50', '2018', 'Thakurgaon Govt. College', '4.45', '2041', 'Saidpur Govt. College', '3.39', '2043', 'Saidpur Govt. College', '3.20', '2043'),
(51, 'sultan2', '12345678', 'MD', 'Sultan Ali', 'Abu Bakkar Siddik', 'Null', 'male', 'A+', 'Muslim', 'mdsultanali@gmail.com', '01716418708', '', 'Bangladesh', 'Dhaka', 'Manikdi', '1200', 'Screenshot 2023-11-19 215205.png', 'Thakurgaon', 'Kabir Singh', 'Football', 'Father', 'Army', 'Thakurgaon', 'BMBSCHC', '3.50', '2043', 'BMBSCHC', '4.45', '2043', 'Saidpur Govt. College', '3.39', '2043', 'Saidpur Govt. College', '3.20', '2043'),
(52, 'fadfsd', '12345678', 'MD', 'Sultan Ali', 'Abu Bakkar Siddik', 'Null', 'male', 'A+', 'Hindu', 'mdsultanali@gmail.com', '01716418708', '', 'Bangladesh', 'Chottogram', 'Manikdi', '1200', 'Screenshot 2023-11-19 215205.png', 'Thakurgaon', '', 'Football', '', 'Army', '', 'BMBSCHC', '3.50', '2043', 'BMBSCHC', '4.45', '2043', 'Saidpur Govt. College', '3.39', '2043', 'Saidpur Govt. College', '3.20', '2043'),
(53, 'faisal1212', '12345678', 'S M', 'Faisal', 'MD Sultan Ali', 'MST Fatema Akter', 'male', 'O+', 'Muslim', '20-44367-3@student.aiub.edu', '+8801723778408', '', 'Bangladesh', 'Dhaka', 'Dhaka', '1344', 'Screenshot 2023-11-20 194043.png', 'Dhaka', 'Pireates of the carribieans', 'Cricket', '', '', '', 'BMBSC', '5.00', '2043', 'BMBSC', '5.00', '2041', 'AIUB', '3.86', '2024', 'AMCR', '3.42', '2043'),
(54, 'faisal12122', '12345678', 'S M', 'Faisal', 'MD Sultan Ali', 'MST Fatema Akter', 'male', 'O+', 'Muslim', '20-44367-3@student.aiub.edu', '+8801723778408', '', 'Bangladesh', 'Dhaka', 'Dhaka', '1344', 'Screenshot 2023-11-20 194043.png', 'Dhaka', 'Pireates of the carribieans', 'Cricket', '', '', '', 'BMBSC', '5.00', '2043', 'BMBSC', '5.00', '2041', 'AIUB', '3.86', '2024', 'AMCR', '3.42', '2043'),
(55, 'faisal121223', '12345678', 'S M', 'Faisal', 'MD Sultan Ali', 'MST Fatema Akter', 'male', 'O+', 'Muslim', '20-44367-3@student.aiub.edu', '+8801723778408', '', 'Bangladesh', 'Dhaka', 'Dhaka', '1344', 'Screenshot 2023-11-20 194043.png', 'Dhaka', 'Pireates of the carribieans', 'Cricket', '', '', '', 'BMBSC', '5.00', '2043', 'BMBSC', '5.00', '2041', 'AIUB', '3.86', '2024', 'AMCR', '3.42', '2043'),
(56, 'faisal1212234', '12345678', 'S M', 'Faisal', 'MD Sultan Ali', 'MST Fatema Akter', 'male', 'O+', 'Muslim', '20-44367-3@student.aiub.edu', '+8801723778408', '', 'Bangladesh', 'Dhaka', 'Dhaka', '1344', 'Screenshot 2023-11-20 194043.png', 'Dhaka', 'Pireates of the carribieans', 'Cricket', '', '', '', 'BMBSC', '5.00', '2043', 'BMBSC', '5.00', '2041', 'AIUB', '3.86', '2024', 'AMCR', '3.42', '2043'),
(57, 'faisal12122345', '12345678', 'S M', 'Faisal', 'MD Sultan Ali', 'MST Fatema Akter', 'male', 'O+', 'Muslim', '20-44367-3@student.aiub.edu', '+8801723778408', '', 'Bangladesh', 'Dhaka', 'Dhaka', '1344', 'Screenshot 2023-11-20 194043.png', 'Dhaka', 'Pireates of the carribieans', 'Cricket', '', '', '', 'BMBSC', '5.00', '2043', 'BMBSC', '5.00', '2041', 'AIUB', '3.86', '2024', 'AMCR', '3.42', '2043'),
(58, 'faisal121223456', '12345678', 'S M', 'Faisal', 'MD Sultan Ali', 'MST Fatema Akter', 'male', 'O+', 'Muslim', '20-44367-3@student.aiub.edu', '+8801723778408', '', 'Bangladesh', 'Dhaka', 'Dhaka', '1344', 'Screenshot 2023-11-20 194043.png', 'Dhaka', 'Pireates of the carribieans', 'Cricket', '', '', '', 'BMBSC', '5.00', '2043', 'BMBSC', '5.00', '2041', 'AIUB', '3.86', '2024', 'AMCR', '3.42', '2043');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `teacher` (`userID`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_course_enrollments`
--
ALTER TABLE `student_course_enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student_course_marks`
--
ALTER TABLE `student_course_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_course_enrollments`
--
ALTER TABLE `student_course_enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_course_marks`
--
ALTER TABLE `student_course_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `teacher` FOREIGN KEY (`userID`) REFERENCES `teacher` (`userID`);

--
-- Constraints for table `student_course_enrollments`
--
ALTER TABLE `student_course_enrollments`
  ADD CONSTRAINT `student_course_enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `student_course_enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `student_course_marks`
--
ALTER TABLE `student_course_marks`
  ADD CONSTRAINT `student_course_marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `student_course_marks_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
