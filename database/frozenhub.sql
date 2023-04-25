-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 09:34 AM
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
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'fhbintern', '$2y$10$6OGylfvA5tOTsetJTN5cFeldBpbWTc.jk9y/uOwf36Cy5J/OuzOim'),
(2, 'fhbintern1', '$2y$10$Zy0d.yzgYqRUkyTrQV5hNe8Ko6uuY3xQhW0I8B3bQM/9ywLDQD9KG');

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
(43, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '3-4', 'Self-operate', 'helllooooooo!', 'Pending'),
(44, 'Princess Carl', 'Austria', 'stphnbyln15@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'PUP', '5-6', 'Self-operate', 'a', 'Pending'),
(45, 'Princess Carl', 'Austria', 'princesscarl975@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I am still looking for one.', 'PUP', '3-4', 'Self-operate', 'dito sa frozenhub', 'Pending'),
(46, 'Princess Carl', 'Austria', 'princesscarl975@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'ChowKins', '3-4', 'Self-operate', 'hello', 'Done'),
(47, 'Princess Carl', 'Austria', 'princesscarl975@gmail.com', 9633660818, 'Brgy. Milagrosa Calamba City, Laguna', 'I have an existing space.', 'ChowKins', '3-4', 'Self-operate', 'trete', 'Done'),
(48, 'PANDA', 'PANDA', 'PANDA@GMAIL.COM', 9178886883, 'CALAMBA', 'I have an existing space.', 'PANDA KITCHEN', '3-4', 'Self-operate', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `product_id`, `quantity`, `user_id`, `ip_address`) VALUES
(142, 11, 1, 11, ''),
(143, 12, 1, 11, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(25) NOT NULL,
  `category_title` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Top'),
(2, 'Promo'),
(3, 'None');

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
  `actions` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints_table`
--

INSERT INTO `complaints_table` (`com_id`, `firstname`, `lastname`, `email`, `phoneNum`, `proNo`, `comDate`, `proName`, `boughtOn`, `details`, `actions`, `status`, `picture`) VALUES
(1, 'PRINCESS CARL', 'AUSTRIA', 'princesscarl975@gmail.com', '09633660818', '1221312fdgr9', '2023-04-06', 'frozen berries', '2023-04-02', '', 'palitan niyo to', 'Done', '338744898_768250424622062_510732811627635182_n.jpg'),
(2, 'PRINCESS CARL', 'AUSTRIA', 'princesscarl975@gmail.com', '09633660818', '1221312fdgr9', '2023-04-06', 'frozen berries', '2023-04-02', 'bulok na', 'palitan niyo to', 'Pending', '338744898_768250424622062_510732811627635182_n.jpg'),
(3, 'asd', 'ads', 'its@gmail.com', '653653653', 'adsadad', '2023-04-25', 'asdasddas', '2023-04-11', 'asdasdas', 'asdasdas', 'Done', '338744898_768250424622062_510732811627635182_n.jpg'),
(4, 'asdasdsda', 'adsasd', 'adsadsasd@gmail.com', '54405405485', 'asdsaasddsa', '2023-04-13', 'asddadsasdasdas', '2023-04-20', 'asdasfaf', 'dfdsfsdf', 'Pending', 'Screenshot 2023-04-14 132253.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_table`
--

CREATE TABLE `feedback_table` (
  `feed_id` int(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `proName` varchar(50) NOT NULL,
  `ratings` varchar(20) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_table`
--

INSERT INTO `feedback_table` (`feed_id`, `firstName`, `lastName`, `email`, `phone`, `proName`, `ratings`, `feedback`, `picture`) VALUES
(1, 'wdasdsa', 'asdasd', 'a@iskolarngbayan.pup.edu.ph', '0955710556', '', 'Excellent', 'sdasdasdasd', 'logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `user_id`, `order_id`, `product_id`, `quantity`, `status`) VALUES
(1, 11, 63, 13, 1, ''),
(2, 11, 63, 11, 1, ''),
(3, 11, 63, 12, 1, ''),
(4, 11, 63, 9, 1, ''),
(5, 6, 64, 17, 8, ''),
(6, 6, 64, 11, 8, ''),
(7, 6, 64, 17, 8, ''),
(8, 6, 64, 11, 8, ''),
(9, 6, 64, 17, 8, ''),
(10, 6, 64, 11, 8, ''),
(11, 6, 64, 17, 8, ''),
(12, 6, 64, 11, 8, ''),
(13, 6, 64, 17, 8, ''),
(14, 6, 64, 11, 8, ''),
(15, 6, 64, 17, 8, ''),
(16, 6, 64, 11, 8, ''),
(17, 6, 70, 17, 8, ''),
(18, 6, 70, 11, 8, ''),
(19, 6, 70, 17, 8, ''),
(20, 6, 70, 11, 8, ''),
(21, 6, 72, 17, 8, ''),
(22, 6, 72, 11, 8, ''),
(23, 6, 72, 17, 8, ''),
(24, 6, 72, 11, 8, ''),
(25, 6, 72, 17, 8, ''),
(26, 6, 72, 11, 8, ''),
(27, 6, 72, 17, 8, ''),
(28, 6, 72, 11, 8, ''),
(29, 6, 72, 17, 8, ''),
(30, 6, 72, 11, 8, ''),
(31, 6, 72, 17, 8, ''),
(32, 6, 72, 11, 8, ''),
(33, 6, 72, 17, 8, ''),
(34, 6, 72, 11, 8, ''),
(35, 6, 72, 17, 8, ''),
(36, 6, 72, 11, 8, ''),
(37, 6, 72, 17, 8, ''),
(38, 6, 72, 11, 8, ''),
(39, 6, 81, 17, 8, ''),
(40, 6, 81, 11, 8, ''),
(41, 6, 81, 17, 8, ''),
(42, 6, 81, 11, 8, ''),
(43, 6, 83, 17, 8, ''),
(44, 6, 83, 11, 8, ''),
(45, 6, 83, 17, 8, ''),
(46, 6, 83, 11, 8, ''),
(47, 6, 85, 18, 5, ''),
(48, 6, 85, 19, 5, ''),
(49, 6, 85, 9, 7, ''),
(50, 6, 86, 18, 5, ''),
(51, 6, 86, 19, 5, ''),
(52, 6, 86, 9, 7, ''),
(53, 6, 87, 17, 8, ''),
(54, 6, 87, 9, 7, ''),
(55, 6, 87, 18, 5, ''),
(56, 6, 87, 19, 5, ''),
(57, 6, 88, 17, 1, ''),
(58, 6, 88, 23, 1, '');

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
  `position` varchar(50) NOT NULL,
  `interview` varchar(50) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `comName` varchar(50) NOT NULL,
  `comAddress` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_table`
--

INSERT INTO `job_table` (`job_id`, `firstname`, `lastname`, `email`, `phoneNum`, `address`, `position`, `interview`, `jobTitle`, `comName`, `comAddress`, `status`, `file`) VALUES
(1, 'Akechelaads', 'asdasda', 'a@iskolarngbayan.pup.edu.ph', '63653653', 'ddfdffd', 'front-end developer', 'asdassadads', 'adsadsdsa', 'dasad', 'adsasdads', 'Done', 'cs form 100.pdf'),
(2, 'Akechelaads', 'asdasda', 'a@iskolarngbayan.pup.edu.ph', '63653653', 'ddfdffd', 'back-end developer', 'asdassadads', 'adsadsdsa', 'dasad', 'adsasdads', 'Pending', 'cs form 100.pdf'),
(3, 'asdasd', 'asdasd', 'asdasd@gmail.com', '54545454', '#0156 Purok 1 brgy. turbina', 'HR', 'asdasdas', 'dsaasd', 'adsasd', 'adsadsasd', 'Done', 'creative.pdf'),
(4, 'asdasd', 'asdasd', 'a@iskolarngbayan.pup.edu.ph', '535843853', 'adsasddas', 'Marketing', 'dasdsadasdas', 'adsadsdas', 'adsadsdsa', 'adsadsads', 'Pending', 'ANGELJOY.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `items` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL DEFAULT '2023',
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(25) NOT NULL,
  `amount` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `items`, `invoice`, `date`, `status`, `amount`) VALUES
(63, 11, 3, '76824', '2023-04-25 14:58:14', 'Approved', '500'),
(86, 6, 3, '81771', '2023-04-25 14:45:45', 'For Delivery', '1750'),
(87, 6, 4, '34437', '2023-04-25 14:51:19', 'Cancel', '7050'),
(88, 6, 2, '93794', '2023-04-25 14:52:31', 'Received', '605');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(250) DEFAULT NULL,
  `product_description` varchar(250) DEFAULT NULL,
  `product_keyword` varchar(250) DEFAULT NULL,
  `product_price` bigint(250) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `product_price`, `product_image`, `category_id`, `date`) VALUES
(11, 'Meat 1', 'Ajasdjawheiuqhiuhqwuehqwuheqwiheqwiuh', NULL, 350, 'products4.jpg', 3, '2023-04-25 04:38:39'),
(12, 'Seafood', 'Ajasdjawheiuqhiuhqwuehqwuheqwiheqwiuh', NULL, 255, 'products1.jpg', 3, '2023-04-24 10:28:42'),
(19, 'aasd', 'asdasdasdas', NULL, 250, 'products4.jpg', 2, '2023-04-25 02:33:51'),
(20, 'Strawberry', 'Hello world asodasjdasjdkasjd', NULL, 350, '02.jpg', 3, '2023-04-25 02:50:05'),
(21, 'Strawberry', 'Hello world asodasjdasjdkasjd', NULL, 350, '02.jpg', 3, '2023-04-25 02:53:33'),
(22, 'Strawberry', 'Hello world asodasjdasjdkasjd', NULL, 350, '02.jpg', 3, '2023-04-25 02:53:49'),
(23, 'asdasdasd', 'asdasdasdasdadasdasdasxcsdfcewfrerwrewrwerwerewrewrewasdasdasdasdadasdasdasxcsdfcewfrerwrewrwerwerewrewrew\r\nasdasdasdasdadasdasdasxcsdfcewfrerwrewrwerwerewrewrew\r\nasdasdasdasdadasdasdasxcsdfcewfrerwrewrwerwerewrewrew\r\nasdasdasdasdadasdasdasxcsdfcewfr', NULL, 255, 'meat.jpg', 1, '2023-04-25 04:36:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_province` varchar(255) DEFAULT NULL,
  `user_city` varchar(255) DEFAULT NULL,
  `user_zip` int(100) DEFAULT NULL,
  `user_mobile` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `fname`, `lname`, `email`, `password`, `user_ip`, `user_address`, `user_province`, `user_city`, `user_zip`, `user_mobile`) VALUES
(6, 'Ariso', 'Catapang', 'itsmeakechel@gmail.com', '$2y$10$qE1UvHvAiSz9RBuVzs7J0O/o2pG5sfBA8Rz/ZYGcnSpYuHNBN1mRK', '::1', '#0156 Purok 1 brgy. turbina', 'Laguna', 'Calamba', 4027, 887979798),
(10, 'Ariso', 'Levi', 'arisolevi@gmail.com', '$2y$10$2mOfmNlOuEAUc4qyh2LdD.GZJFLz4v57p8MbFN0sV5PEdwr5PjlSq', '::1', '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9557105569),
(11, 'Ariso', 'Ariso', 'ariso@gmail.com', '$2y$10$v80quGCrzSrsgeVrV9MMq.y6J6R7mU7E5gjAFhQUDsrNCqhQh7qkC', '::1', '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9557105569),
(13, 'Ariso', 'CATAPANG', 'abc@gmail.com', '$2y$10$MzI6N7F7clTYBnDwZ4VpRO1SOhkFbY5RdEzzkfARZZM0VOFy2eKmC', NULL, '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9095604482),
(14, 'Danica Catapang', 'CATAPANG', 'a@iskolarngbayan.pup.edu.ph', '$2y$10$96zewaSyAIePZ78JiI.h4OqeuxVuqw06RmgeyeOKP4dbFuKrQUVva', NULL, '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9095604482),
(15, 'Danica Catapang', 'CATAPANG', '123itsmeakechel@gmail.com', '$2y$10$XAqwc41GPFTOU4x6S.hoxODol5e/UIf9OKmMWsGMMOHUk.mzY6Hoy', NULL, '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9095604482),
(16, 'Danica Catapang', 'CATAPANG', 'test@iskolarngbayan.pup.edu.ph', '$2y$10$QU/iUqHEONQhKYIgJ5/K8eTSK88c0uANmM0tqfVqpEmR84akvm8Ra', NULL, '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9095604482),
(17, 'Danica Catapang', 'CATAPANG', 'test@iskolarngbayan.pup.edu.ph123', '$2y$10$4997eqdW872mSr0VEZ8LkOoQIImOB9dcC8vZIe7AYeYavkK4IBjNS', NULL, '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9095604482),
(18, 'Danica Catapang', 'CATAPANG', 'test@iskolarngbayan.pup.edu.ph1234', '$2y$10$jzyBGD/xROP7obHCRbKe/OWlTliERzi0fD/BxPsBr.pSm8jmbSlQi', NULL, '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9095604482),
(19, 'asdasd', 'asdasdasd', 'aaariso@gmail.com', '$2y$10$fllZYLtJ4mYaga7nQ2Jh8OECUJy2qy70fcHipTh2.6R9c3rkNDE6m', NULL, '#0156 Purok 1 brgy. turbina', 'laguna', 'calamba', 4027, 9095604482);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `application_table`
--
ALTER TABLE `application_table`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `complaints_table`
--
ALTER TABLE `complaints_table`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `feedback_table`
--
ALTER TABLE `feedback_table`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `job_table`
--
ALTER TABLE `job_table`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_table`
--
ALTER TABLE `application_table`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaints_table`
--
ALTER TABLE `complaints_table`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback_table`
--
ALTER TABLE `feedback_table`
  MODIFY `feed_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `job_table`
--
ALTER TABLE `job_table`
  MODIFY `job_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
