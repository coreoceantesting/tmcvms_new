-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 02:46 PM
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
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Table structure for table `special_pass_visitors`
--

CREATE TABLE `special_pass_visitors` (
  `special_pass_visitors_id` int(11) NOT NULL,
  `special_pass_visitor_unique_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mob_no` varchar(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `pass_validity` varchar(255) DEFAULT NULL,
  `pass_made_for_type` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `approval_status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  `created_by` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` timestamp NOT NULL DEFAULT current_timestamp(),
  `valid_from` varchar(255) DEFAULT NULL,
  `valid_till` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_pass_visitors`
--

INSERT INTO `special_pass_visitors` (`special_pass_visitors_id`, `special_pass_visitor_unique_id`, `first_name`, `middle_name`, `last_name`, `age`, `email`, `address`, `mob_no`, `organization_name`, `department_name`, `pass_validity`, `pass_made_for_type`, `photo`, `approval_status`, `created_by`, `updated_by`, `valid_from`, `valid_till`) VALUES
(1, 'TMC-2023-10', 'Ramesh', 'Ganpat', 'Kadam', 25, 'ramesh@gmail.com', 'Sion', '8569845856', 'Core', 'Management', '30', '2', 'love-1895159_640.png', 'pending', '2023-10-09 11:10:06', '2023-10-09 11:10:06', '09-10-2023', '08-11-2023'),
(2, 'TMC-2023-10', 'Rakesh', 'Ramesh', 'Kadam', 30, 'rakesh@gmail.com', 'Mulund', '8569854858', 'Core', 'Management', '60', '1', 'love-1895159_640.png', 'pending', '2023-10-09 11:31:04', '2023-10-09 11:31:04', '09-10-2023', '08-12-2023'),
(3, 'TMC-2023-10', 'sachin', 'ganesh', 'kadam', 45, 'sachin@gmail.com', 'Bhandup', '8695848575', 'Core', 'HR', '90', '1', 'love-1895159_640.png', 'pending', '2023-10-09 11:33:20', '2023-10-09 11:33:20', '09-10-2023', '07-01-2024'),
(4, 'TMC-2023-10', 'Raj', 'Ram', 'Kadam', 50, 'raj@gmail.com', 'Dadar', '8695748589', 'Core', 'Management', '30', '2', 'love-1895159_640.png', 'pending', '2023-10-09 11:37:21', '2023-10-09 11:37:21', '09-10-2023', '08-11-2023'),
(5, 'TMC-2023-10', 'rahul', 'ramesh', 'kadam', 22, 'rahul@gmail.com', 'Navi Mumbai', '8457896584', 'Police', 'Management', '30', '2', 'love-1895159_640.png', 'pending', '2023-10-09 11:40:27', '2023-10-09 11:40:27', '09-10-2023', '08-11-2023'),
(6, 'TMC-2023-10', 'xyz', 'xyz', 'xyz', 26, 'xyz@gmail.com', 'xyz', '8569847589', 'xyz', 'Account', '30', '1', NULL, 'pending', '2023-10-09 11:44:06', '2023-10-09 11:44:06', '09-10-2023', '08-11-2023'),
(7, 'TMC-2023-10', 'abc', 'abc', 'abc', 28, 'abc@gmail.com', 'abc', '8569847771', 'abc', 'Management', '60', '2', 'admin/img/1696852616.png', 'pending', '2023-10-09 11:56:56', '2023-10-09 11:56:56', '09-10-2023', '08-12-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `special_pass_visitors`
--
ALTER TABLE `special_pass_visitors`
  ADD PRIMARY KEY (`special_pass_visitors_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `special_pass_visitors`
--
ALTER TABLE `special_pass_visitors`
  MODIFY `special_pass_visitors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
