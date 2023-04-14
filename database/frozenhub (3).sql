-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 10:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
(41, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '3-4', 'Self-operate', 'sdsadsadasdsadsads', 'Done'),
(42, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '3-4', 'Self-operate', 'akdsdsa', 'Pending'),
(43, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '3-4', 'Self-operate', 'helllooooooo!', 'Done'),
(44, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '5-6', 'Self-operate', 'a', 'Done'),
(45, 'Princess Carl', 'Austria', 'princesscarl975@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I am still looking for one.', 'PUP', '3-4', 'Self-operate', 'dito sa frozenhub', 'Pending'),
(46, 'Princess Carl', 'Austria', 'princesscarl975@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'ChowKins', '3-4', 'Self-operate', 'hello', 'Pending'),
(47, 'Princess Carl', 'Austria', 'princesscarl975@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'ChowKins', '3-4', 'Self-operate', 'trete', 'Pending'),
(48, 'PANDA', 'PANDA', 'PANDA@GMAIL.COM', 9178886883, 'CALAMBA', 'I have an existing space.', 'PANDA KITCHEN', '3-4', 'Self-operate', '', 'Pending'),
(53, 'Princess Carl', 'Austria', 'princesscarl975@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I am still looking for one.', 'Mingyu', '3-4', 'Self-operate', 'KIMKIM', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `complaints_table`
--

CREATE TABLE `complaints_table` (
  `com_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNum` varchar(30) NOT NULL,
  `proNo` varchar(30) NOT NULL,
  `comDate` date NOT NULL,
  `proName` varchar(30) NOT NULL,
  `boughtOn` date NOT NULL,
  `details` varchar(100) NOT NULL,
  `actions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints_table`
--

INSERT INTO `complaints_table` (`com_id`, `firstname`, `lastname`, `email`, `phoneNum`, `proNo`, `comDate`, `proName`, `boughtOn`, `details`, `actions`) VALUES
(1, 'PRINCESS CARL', 'AUSTRIA', 'princesscarl975@gmail.com', '09633660818', '1221312fdgr9', '2023-04-06', 'frozen berries', '2023-04-02', '', 'palitan niyo to'),
(2, 'PRINCESS CARL', 'AUSTRIA', 'princesscarl975@gmail.com', '09633660818', '1221312fdgr9', '2023-04-06', 'frozen berries', '2023-04-02', 'bulok na', 'palitan niyo to');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_table`
--

CREATE TABLE `feedback_table` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `ratings` varchar(15) NOT NULL,
  `feedback` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_table`
--

INSERT INTO `feedback_table` (`id`, `firstName`, `lastName`, `email`, `phone`, `ratings`, `feedback`) VALUES
(1, 'PRINCESS CARL', 'AUSTRIA', 'princesscarl975@gmai', '09633660818', 'Excellent', 'sasasasasa'),
(2, 'Mingyu', 'Kim', 'kiMingyu97@gmail.com', '09633660818', 'Very Good', 'ang galing, masarap.');

-- --------------------------------------------------------

--
-- Table structure for table `job_table`
--

CREATE TABLE `job_table` (
  `job_id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNum` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `interview` varchar(50) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `comName` varchar(50) NOT NULL,
  `comAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_table`
--

INSERT INTO `job_table` (`job_id`, `firstname`, `lastname`, `email`, `phoneNum`, `address`, `interview`, `jobTitle`, `comName`, `comAddress`) VALUES
(1, 'princess', 'lastname', 'email@gmail.com', '09633660818', '#67 Purok 4, Brgy. Milagrosa Calamba City', 'feb 22,2023', 'web developer', 'frozenhub', 'margimel building, halang'),
(2, 'princess', 'austria', 'email@gmail.com', '09633660818', 'assaa', 'asasasa', 'asdeds', 'asassas', 'sdsdsdsd'),
(3, 'PRINCESS CARL', 'AUSTRIA', 'princesscarl975@gmail.com', '09633660818', 'Brgy. milagrosa', 'awdasdsda', 'adas', 'frozenhub', 'asdadsadsa');

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
-- Indexes for table `complaints_table`
--
ALTER TABLE `complaints_table`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `feedback_table`
--
ALTER TABLE `feedback_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_table`
--
ALTER TABLE `job_table`
  ADD PRIMARY KEY (`job_id`);

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
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `complaints_table`
--
ALTER TABLE `complaints_table`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback_table`
--
ALTER TABLE `feedback_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_table`
--
ALTER TABLE `job_table`
  MODIFY `job_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
