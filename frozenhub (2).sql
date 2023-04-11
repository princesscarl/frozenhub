-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 07:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frozenhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_table`
--

CREATE TABLE `application_table` (
  `application_id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` bigint(255) DEFAULT NULL,
  `temporary_location` varchar(255) NOT NULL,
  `isLookingForSpace` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `years` varchar(255) NOT NULL,
  `typeOfBusiness` varchar(255) NOT NULL,
  `inputMessage` longtext NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_table`
--

INSERT INTO `application_table` (`application_id`, `firstName`, `lastName`, `email`, `contact_number`, `temporary_location`, `isLookingForSpace`, `business_name`, `years`, `typeOfBusiness`, `inputMessage`, `status`) VALUES
(41, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '3-4', 'Self-operate', 'sdsadsadasdsadsads', 'Pending'),
(42, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '3-4', 'Self-operate', 'akdsdsa', 'Pending'),
(43, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '3-4', 'Self-operate', 'helllooooooo!', 'Done'),
(44, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '5-6', 'Self-operate', 'a', 'Pending'),
(45, 'Princess Carl', 'Austria', 'princesscarl975@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I am still looking for one.', 'PUP', '3-4', 'Self-operate', 'dito sa frozenhub', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'frozen_hub', 'frozenhubAdmin'),
(2, 'frozen_hub', 'frozenhubAdmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_table`
--
ALTER TABLE `application_table`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_table`
--
ALTER TABLE `application_table`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
