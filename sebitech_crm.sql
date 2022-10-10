-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 05:14 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sebitech_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies_db_table`
--

CREATE TABLE `companies_db_table` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies_db_table`
--

INSERT INTO `companies_db_table` (`id`, `company_name`, `email`, `filename`, `website`) VALUES
(1, 'SebiTechnologies, Inc.', 'sebitech@gmail.com', 'sebitech.png', 'sebitechnologies.com'),
(2, 'University of the Philippines', 'helpdesk@upd.edu.ph', 'up.ico', 'up.edu.ph'),
(3, 'Ateneo de Manila University', 'info@ateneo.edu', 'ateneo.png', 'ateneo.edu');

-- --------------------------------------------------------

--
-- Table structure for table `employees_db_table`
--

CREATE TABLE `employees_db_table` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees_db_table`
--

INSERT INTO `employees_db_table` (`id`, `firstname`, `lastname`, `company_id`, `company_name`, `email`, `username`, `phone`, `user_type`, `password`) VALUES
(1, 'Admin1', 'Admin1', 1, 'SebiTechnologies, Inc.', 'admin1@gmail.com', 'admin1', '', 'employee', 'admin123'),
(2, 'Admin2', 'Admin2', 1, 'SebiTechnologies, Inc.', 'admin2@gmail.com', 'admin2', '', 'employee', 'admin1234'),
(3, 'User1', 'User1', 2, 'University of the Philippines', 'user1@gmail.com', 'user1', '', 'user', 'user123'),
(4, 'User2', 'User2', 2, 'University of the Philippines', 'user2@gmail.com', 'user2', '', 'user', 'user1234'),
(5, 'User3', 'User3', 3, 'Ateneo de Manila University', 'user3@gmail.com', 'user3', '', 'user', 'user12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies_db_table`
--
ALTER TABLE `companies_db_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_db_table`
--
ALTER TABLE `employees_db_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies_db_table`
--
ALTER TABLE `companies_db_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees_db_table`
--
ALTER TABLE `employees_db_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees_db_table`
--
ALTER TABLE `employees_db_table`
  ADD CONSTRAINT `company_constraint` FOREIGN KEY (`company_id`) REFERENCES `companies_db_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
