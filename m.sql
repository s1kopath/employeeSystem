-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 03:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

CREATE TABLE `attendance_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `is_present` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`id`, `user_id`, `date`, `month`, `year`, `is_present`) VALUES
(1, 1004, '2023-01-20', 1, 2023, 1),
(2, 50, '2023-01-10', 1, 2023, 1),
(3, 51, '2023-01-20', 1, 2023, 1),
(4, 50, '2023-01-11', 1, 2023, 1),
(5, 50, '2023-01-12', 1, 2023, 1),
(6, 50, '2023-01-13', 1, 2023, 1),
(7, 50, '2023-01-20', 1, 2023, 1),
(8, 50, '2023-01-14', 1, 2023, 1),
(9, 50, '2023-01-15', 1, 2023, 1),
(10, 50, '2023-01-16', 1, 2023, 1),
(11, 50, '2023-01-17', 1, 2023, 1),
(12, 50, '2023-01-18', 1, 2023, 1),
(13, 50, '2023-01-19', 1, 2023, 1),
(14, 50, '2022-11-01', 11, 2022, 1),
(15, 50, '2022-11-02', 11, 2022, 1),
(16, 50, '2022-11-03', 11, 2022, 1),
(17, 50, '2022-11-05', 11, 2022, 1),
(18, 50, '2022-11-06', 11, 2022, 1),
(19, 50, '2022-11-07', 11, 2022, 1),
(20, 50, '2022-11-08', 11, 2022, 1),
(21, 50, '2022-11-09', 11, 2022, 1),
(22, 50, '2022-11-10', 11, 2022, 1),
(23, 50, '2022-11-12', 11, 2022, 1),
(24, 50, '2022-11-13', 11, 2022, 1),
(25, 50, '2022-11-14', 11, 2022, 1),
(26, 50, '2022-11-15', 11, 2022, 1),
(27, 50, '2022-11-16', 11, 2022, 1),
(28, 50, '2022-11-17', 11, 2022, 1),
(29, 50, '2022-11-19', 11, 2022, 1),
(30, 50, '2022-11-20', 11, 2022, 1),
(31, 50, '2022-11-21', 11, 2022, 1),
(32, 50, '2022-11-22', 11, 2022, 1),
(33, 50, '2022-11-23', 11, 2022, 1),
(34, 50, '2022-11-24', 11, 2022, 1),
(35, 50, '2022-11-26', 11, 2022, 1),
(36, 50, '2022-11-27', 11, 2022, 1),
(37, 50, '2022-11-28', 11, 2022, 1),
(38, 50, '2022-11-29', 11, 2022, 1),
(39, 50, '2022-11-30', 11, 2022, 1),
(40, 50, '2022-12-01', 12, 2022, 0),
(41, 50, '2022-12-03', 12, 2022, 0),
(42, 50, '2022-12-04', 12, 2022, 0),
(43, 50, '2022-12-05', 12, 2022, 0),
(44, 50, '2022-12-06', 12, 2022, 0),
(45, 50, '2022-12-07', 12, 2022, 0),
(46, 50, '2022-12-08', 12, 2022, 0),
(47, 50, '2022-12-10', 12, 2022, 0),
(48, 50, '2022-12-11', 12, 2022, 0),
(49, 50, '2022-12-12', 12, 2022, 0),
(50, 50, '2022-12-13', 12, 2022, 0),
(51, 50, '2022-12-14', 12, 2022, 0),
(52, 50, '2022-12-15', 12, 2022, 0),
(53, 50, '2022-12-17', 12, 2022, 0),
(54, 50, '2022-12-18', 12, 2022, 0),
(55, 50, '2022-12-19', 12, 2022, 0),
(56, 50, '2022-12-20', 12, 2022, 0),
(57, 50, '2022-12-21', 12, 2022, 0),
(58, 50, '2022-12-22', 12, 2022, 0),
(59, 50, '2022-12-24', 12, 2022, 0),
(60, 50, '2022-12-25', 12, 2022, 0),
(61, 50, '2022-12-26', 12, 2022, 0),
(62, 50, '2022-12-27', 12, 2022, 0),
(63, 50, '2022-12-28', 12, 2022, 0),
(64, 50, '2022-12-29', 12, 2022, 0),
(65, 50, '2022-12-31', 12, 2022, 0),
(66, 55, '2023-01-01', 1, 2023, 0),
(67, 55, '2023-01-02', 1, 2023, 0),
(68, 55, '2023-01-03', 1, 2023, 0),
(69, 55, '2023-01-04', 1, 2023, 0),
(70, 55, '2023-01-05', 1, 2023, 0),
(71, 55, '2023-01-07', 1, 2023, 0),
(72, 55, '2023-01-08', 1, 2023, 0),
(73, 55, '2023-01-09', 1, 2023, 0),
(74, 55, '2023-01-10', 1, 2023, 0),
(75, 55, '2023-01-11', 1, 2023, 0),
(76, 55, '2023-01-12', 1, 2023, 0),
(77, 55, '2023-01-14', 1, 2023, 0),
(78, 55, '2023-01-15', 1, 2023, 0),
(79, 55, '2023-01-16', 1, 2023, 0),
(80, 55, '2023-01-17', 1, 2023, 0),
(81, 55, '2023-01-18', 1, 2023, 0),
(82, 55, '2023-01-19', 1, 2023, 0),
(83, 50, '2023-01-01', 1, 2023, 0),
(84, 50, '2023-01-02', 1, 2023, 0),
(85, 50, '2023-01-03', 1, 2023, 0),
(86, 50, '2023-01-04', 1, 2023, 0),
(87, 50, '2023-01-05', 1, 2023, 0),
(88, 50, '2023-01-07', 1, 2023, 0),
(89, 50, '2023-01-08', 1, 2023, 0),
(90, 50, '2023-01-09', 1, 2023, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `working_day` int(11) NOT NULL,
  `absent` int(11) NOT NULL,
  `total_salary` int(11) NOT NULL,
  `attended` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 0,
  `provident_fund` int(11) NOT NULL,
  `professional_tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `employee_id`, `month`, `year`, `working_day`, `absent`, `total_salary`, `attended`, `bonus`, `is_paid`, `provident_fund`, `professional_tax`) VALUES
(1, 51, '02', '2022', 24, 1, 38667, 23, 0, 0, 0, 0),
(2, 36, '02', '2022', 25, 1, 3867, 24, 0, 0, 0, 0),
(3, 51, '04', '2022', 24, 0, 40000, 24, 0, 0, 0, 0),
(4, 36, '04', '2022', 25, 0, 4000, 25, 0, 0, 0, 0),
(5, 50, '04', '2022', 25, 0, 400000, 25, 0, 1, 0, 0),
(6, 51, '05', '2022', 24, 0, 40000, 24, 0, 1, 0, 0),
(7, 36, '05', '2022', 25, 0, 4000, 25, 0, 0, 0, 0),
(8, 50, '05', '2022', 25, 0, 3679578, 25, 0, 0, 0, 0),
(9, 51, '12', '2022', 24, 2, 37334, 22, 0, 0, 0, 0),
(10, 36, '12', '2022', 25, 2, 3734, 23, 0, 0, 0, 0),
(11, 50, '12', '2022', 26, 0, 4000, 26, 0, 1, 900, 450),
(12, 51, '11', '2022', 24, 0, 40000, 24, 0, 0, 0, 0),
(13, 36, '11', '2022', 25, 0, 4000, 25, 0, 0, 0, 0),
(14, 50, '11', '2022', 26, 0, 4000, 26, 0, 1, 900, 450);

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date NOT NULL,
  `reason` text CHARACTER SET utf8 NOT NULL,
  `is_approve` int(11) NOT NULL,
  `leave_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`id`, `emp_id`, `start_date`, `end_date`, `reason`, `is_approve`, `leave_days`) VALUES
(13, '47', '2022-04-25', '2022-04-28', 'family issue', 1, 3),
(14, '36', '2022-08-09', '2022-08-10', 'Sick', 0, 1),
(15, '36', '2022-08-17', '2022-08-18', 'uygyg', 0, 1),
(16, '36', '2022-08-26', '2022-08-29', 'uytr6r6', 1, 3),
(17, '50', '2022-08-29', '2022-08-30', 'None', 0, 1),
(18, '49', '2022-08-21', '2022-08-24', 'sick', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `employee_id` int(128) NOT NULL,
  `project_name` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `project_file` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_completed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `employee_id`, `project_name`, `date`, `project_file`, `remarks`, `created_at`, `updated_at`, `is_completed`) VALUES
(2, 49, 'Project1', '2022-08-18', '1660836950.pdf', NULL, '2022-08-18 15:35:49', '2022-08-18 15:35:49', 0),
(3, 48, 'First', '2022-08-18', '1660837188.txt', NULL, '2022-08-18 15:39:48', '2022-08-18 15:39:48', 0),
(4, 51, 'Lols', '2022-08-19', '1660881972.pdf', 'read it ', '2022-08-19 04:06:11', '2022-08-19 04:06:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `employee_id` int(128) NOT NULL,
  `expire_date` date DEFAULT NULL,
  `total_salary` int(11) NOT NULL,
  `join_date` date DEFAULT current_timestamp(),
  `medical_allowance` int(255) NOT NULL,
  `house_rent` int(255) NOT NULL,
  `travel_allowance` int(255) NOT NULL,
  `basic_salary` int(255) NOT NULL,
  `working_days` int(255) NOT NULL,
  `deduction_rate` int(11) NOT NULL,
  `status` enum('active','cancel') CHARACTER SET utf8 NOT NULL DEFAULT 'active',
  `bonus` int(11) NOT NULL,
  `provident_fund` int(11) NOT NULL,
  `professional_tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee_id`, `expire_date`, `total_salary`, `join_date`, `medical_allowance`, `house_rent`, `travel_allowance`, `basic_salary`, `working_days`, `deduction_rate`, `status`, `bonus`, `provident_fund`, `professional_tax`) VALUES
(40, 51, '2023-07-01', 31000, '2022-07-12', 10000, 10000, 1000, 10000, 24, 1033, 'cancel', 10000, 0, 0),
(41, 51, '2023-07-01', 27000, '2022-07-12', 5000, 10000, 2000, 10000, 20, 900, 'cancel', 10000, 0, 0),
(42, 51, '2023-01-05', 40000, '2022-07-12', 10000, 10000, 10000, 10000, 24, 1333, 'active', 10000, 0, 0),
(43, 36, '2022-12-31', 4000, '2022-07-22', 1000, 1000, 1000, 1000, 25, 133, 'active', 1000, 0, 0),
(44, 50, '2022-08-31', 400000, '2022-08-19', 100000, 100000, 100000, 100000, 25, 13333, 'cancel', 0, 0, 0),
(45, 50, '2022-08-19', 3679578, '2022-08-19', 132154, 215, 3546544, 665, 25, 122653, 'cancel', 0, 0, 0),
(46, 50, '2022-08-25', 4000, '2022-08-25', 1000, 1000, 1000, 1000, 26, 133, 'active', 100, 900, 450);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `phone_number` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `role` varchar(128) NOT NULL DEFAULT 'employee',
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone_number`, `username`, `email`, `password`, `created_at`, `updated_at`, `role`, `address`) VALUES
(36, 'kazi', 'nahid', '01990346764', 'neom', 'kazineom@gmail.com', '1234', '2022-04-20 08:35:29', '2022-04-20 08:35:29', 'admin', NULL),
(46, 'abir', 'jaman', '01926635576', 'abirp', 'abir@gmail.com', '1234', NULL, NULL, 'employee', NULL),
(47, 'asif', 'shanto', '01956634543', 'shanto', 'asif@gmail.com', '1234', NULL, NULL, 'employee', NULL),
(48, 'kazi', 'leon', '01913665853', 'leon', 'leon@gmail.com', '1234', NULL, NULL, 'employee', NULL),
(49, 'bijoy', 'khannn', '01765434565', 'bijoy', 'bijoy@gmail.com', '1234', NULL, NULL, 'employee', NULL),
(50, 'K1', 'H1', '0123456761', 'Admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-07-01 16:49:06', '2022-07-01 12:49:05', 'admin', 'Dhaka'),
(51, 'Moinul', 'Hasan', '+8801624032690', 'Moin', 'moin360@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-07-12 07:13:00', '2022-07-12 11:13:56', 'employee', 'Dhaka'),
(52, 'Mana', 'Ger', '+8801624032691', 'dms', 'abc@dmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2022-08-12 15:32:00', '2022-08-12 19:32:30', 'manager', 'Dhaka'),
(53, 'a', 's', '+8801624032691', '10a', 's@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-08-18 11:37:00', '2022-08-18 15:37:04', 'employee', 'Dhaka'),
(55, 'Mr', 'Steave', '+8801624032692', '10b', 'emp@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-08-18 11:37:00', '2022-08-18 15:37:04', 'employee', 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `in_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_details`
--
ALTER TABLE `attendance_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
