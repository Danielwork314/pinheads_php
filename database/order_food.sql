-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 11:09 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gofooder`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE `order_food` (
  `order_food_id` int(11) NOT NULL,
  `user_order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`order_food_id`, `user_order_id`, `food_id`, `created_date`, `created_by`, `deleted`) VALUES
(1, 7, 5, '2018-11-09 08:54:12', 0, 0),
(2, 7, 7, '2018-11-09 08:54:12', 0, 0),
(3, 1, 5, '2018-11-09 08:59:50', 0, 0),
(4, 2, 4, '2018-11-09 09:01:09', 0, 0),
(5, 3, 4, '2018-11-09 09:02:33', 0, 0),
(6, 6, 3, '2018-11-09 09:20:25', 0, 0),
(7, 7, 4, '2018-11-09 09:20:49', 0, 0),
(8, 8, 4, '2018-11-09 09:21:49', 0, 0),
(9, 8, 6, '2018-11-09 09:21:49', 0, 0),
(10, 8, 11, '2018-11-09 09:21:49', 0, 0),
(11, 9, 4, '2018-11-09 09:39:03', 0, 0),
(12, 9, 5, '2018-11-09 09:39:03', 0, 0),
(13, 9, 7, '2018-11-09 09:39:03', 0, 0),
(14, 9, 6, '2018-11-09 09:39:03', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_food`
--
ALTER TABLE `order_food`
  ADD PRIMARY KEY (`order_food_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_food`
--
ALTER TABLE `order_food`
  MODIFY `order_food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
