-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2024 at 10:20 AM
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
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `health_status` varchar(100) DEFAULT 'Healthy',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `type_id`, `habitat_id`, `date_of_birth`, `health_status`, `created_at`) VALUES
(1, 'Lion', 1, 1, '2018-05-10', 'Healthy', '2024-11-26 09:14:25'),
(2, 'Elephant', 1, 1, '2015-03-22', 'Healthy', '2024-11-26 09:14:25'),
(3, 'Parrot', 2, 3, '2021-08-12', 'Healthy', '2024-11-26 09:14:25'),
(4, 'Snake', 3, 4, '2019-11-04', 'Healthy', '2024-11-26 09:14:25'),
(5, 'Crocodile', 5, 5, '2016-07-18', 'Healthy', '2024-11-26 09:14:25'),
(6, 'Penguin', 2, 2, '2020-01-15', 'Healthy', '2024-11-26 09:14:25'),
(7, 'Dolphin', 5, 5, '2017-09-10', 'Sick', '2024-11-26 09:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `animal_types`
--

CREATE TABLE `animal_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal_types`
--

INSERT INTO `animal_types` (`id`, `type_name`, `created_at`) VALUES
(1, 'Mammals', '2024-11-26 09:14:06'),
(2, 'Birds', '2024-11-26 09:14:06'),
(3, 'Reptiles', '2024-11-26 09:14:06'),
(4, 'Amphibians', '2024-11-26 09:14:06'),
(5, 'Aquatic', '2024-11-26 09:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL,
  `action_description` varchar(255) DEFAULT NULL,
  `action_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `action_description`, `action_time`) VALUES
(1, 'Feeding schedule updated for Lion', '2024-11-26 09:15:18'),
(2, 'Caretaker assigned to Elephant', '2024-11-26 09:15:18'),
(3, 'New habitat added: Rainforest Zone', '2024-11-26 09:15:18'),
(4, 'Ticket booked for Sarah Lee on 2024-11-27', '2024-11-26 09:15:18'),
(5, 'Feeding schedule updated for Dolphin', '2024-11-26 09:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `caretakers`
--

CREATE TABLE `caretakers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caretakers`
--

INSERT INTO `caretakers` (`id`, `name`, `contact_number`, `created_at`) VALUES
(1, 'John Doe', '1234567890', '2024-11-26 09:14:32'),
(2, 'Jane Smith', '9876543210', '2024-11-26 09:14:32'),
(3, 'Alice Johnson', '5556667777', '2024-11-26 09:14:32'),
(4, 'Robert Brown', '4445556666', '2024-11-26 09:14:32'),
(5, 'Emily Davis', '9998887777', '2024-11-26 09:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `caretaker_assignments`
--

CREATE TABLE `caretaker_assignments` (
  `id` int(11) NOT NULL,
  `caretaker_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `assigned_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caretaker_assignments`
--

INSERT INTO `caretaker_assignments` (`id`, `caretaker_id`, `animal_id`, `assigned_at`) VALUES
(1, 1, 1, '2024-11-26 09:14:46'),
(2, 2, 1, '2024-11-26 09:14:46'),
(3, 3, 2, '2024-11-26 09:14:46'),
(4, 4, 5, '2024-11-26 09:14:46'),
(5, 5, 7, '2024-11-26 09:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `feeding_schedules`
--

CREATE TABLE `feeding_schedules` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `feed_time` time NOT NULL,
  `food_type` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `recurrence_pattern` enum('Daily','Weekly','Monthly') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feeding_schedules`
--

INSERT INTO `feeding_schedules` (`id`, `animal_id`, `feed_time`, `food_type`, `quantity`, `recurrence_pattern`, `created_at`) VALUES
(1, 1, '08:00:00', 'Meat', '5 kg', 'Daily', '2024-11-26 09:14:55'),
(2, 2, '09:00:00', 'Vegetables', '50 kg', 'Daily', '2024-11-26 09:14:55'),
(3, 3, '07:30:00', 'Seeds', '200 grams', 'Daily', '2024-11-26 09:14:55'),
(4, 4, '12:00:00', 'Mice', '3 units', 'Weekly', '2024-11-26 09:14:55'),
(5, 5, '13:00:00', 'Fish', '6 kg', 'Daily', '2024-11-26 09:14:55'),
(6, 6, '10:00:00', 'Fish', '4 kg', 'Daily', '2024-11-26 09:14:55'),
(7, 7, '14:30:00', 'Fish', '8 kg', 'Daily', '2024-11-26 09:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `habitats`
--

CREATE TABLE `habitats` (
  `id` int(11) NOT NULL,
  `habitat_name` varchar(100) NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `habitats`
--

INSERT INTO `habitats` (`id`, `habitat_name`, `max_capacity`, `created_at`) VALUES
(1, 'Savanna Zone', 10, '2024-11-26 09:14:17'),
(2, 'Polar Zone', 5, '2024-11-26 09:14:17'),
(3, 'Rainforest Zone', 8, '2024-11-26 09:14:17'),
(4, 'Desert Zone', 6, '2024-11-26 09:14:17'),
(5, 'Aquatic Zone', 15, '2024-11-26 09:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_tickets`
--

CREATE TABLE `visitor_tickets` (
  `id` int(11) NOT NULL,
  `visitor_name` varchar(100) DEFAULT NULL,
  `ticket_date` date NOT NULL,
  `time_slot` time NOT NULL,
  `ticket_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_tickets`
--

INSERT INTO `visitor_tickets` (`id`, `visitor_name`, `ticket_date`, `time_slot`, `ticket_price`, `created_at`) VALUES
(1, 'Michael Clark', '2024-11-27', '10:00:00', 50.00, '2024-11-26 09:15:07'),
(2, 'Sarah Lee', '2024-11-27', '11:00:00', 55.00, '2024-11-26 09:15:07'),
(3, 'David Miller', '2024-11-28', '12:00:00', 60.00, '2024-11-26 09:15:07'),
(4, 'Emma Wilson', '2024-11-30', '10:00:00', 75.00, '2024-11-26 09:15:07'),
(5, 'Oliver Harris', '2024-12-01', '11:00:00', 75.00, '2024-11-26 09:15:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `habitat_id` (`habitat_id`);

--
-- Indexes for table `animal_types`
--
ALTER TABLE `animal_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caretakers`
--
ALTER TABLE `caretakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caretaker_assignments`
--
ALTER TABLE `caretaker_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caretaker_id` (`caretaker_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `feeding_schedules`
--
ALTER TABLE `feeding_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `habitats`
--
ALTER TABLE `habitats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_tickets`
--
ALTER TABLE `visitor_tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `animal_types`
--
ALTER TABLE `animal_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `caretakers`
--
ALTER TABLE `caretakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `caretaker_assignments`
--
ALTER TABLE `caretaker_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feeding_schedules`
--
ALTER TABLE `feeding_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `habitats`
--
ALTER TABLE `habitats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visitor_tickets`
--
ALTER TABLE `visitor_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `animal_types` (`id`),
  ADD CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`);

--
-- Constraints for table `caretaker_assignments`
--
ALTER TABLE `caretaker_assignments`
  ADD CONSTRAINT `caretaker_assignments_ibfk_1` FOREIGN KEY (`caretaker_id`) REFERENCES `caretakers` (`id`),
  ADD CONSTRAINT `caretaker_assignments_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

--
-- Constraints for table `feeding_schedules`
--
ALTER TABLE `feeding_schedules`
  ADD CONSTRAINT `feeding_schedules_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
