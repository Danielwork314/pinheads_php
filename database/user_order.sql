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
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `user_order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `take_away` int(11) NOT NULL DEFAULT '0',
  `sub_total` decimal(5,2) NOT NULL,
  `service_change` decimal(5,2) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `billing_address_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`user_order_id`, `user_id`, `store_id`, `take_away`, `sub_total`, `service_change`, `total`, `status`, `billing_address_id`, `payment_id`, `created_date`, `created_by`, `deleted`) VALUES
(1, 1, 2, 1, '0.00', '0.00', '12.00', 0, 0, 0, '2018-11-09 08:59:50', 0, 0),
(2, 3, 2, 1, '0.00', '0.00', '22.00', 0, 0, 0, '2018-11-09 09:01:09', 0, 0),
(3, 1, 2, 0, '0.00', '0.00', '40.00', 0, 0, 0, '2018-11-09 09:02:33', 0, 0),
(4, 1, 2, 0, '0.00', '0.00', '27.99', 0, 0, 0, '2018-11-09 09:19:24', 0, 0),
(5, 1, 2, 0, '0.00', '0.00', '27.99', 0, 0, 0, '2018-11-09 09:19:27', 0, 0),
(6, 1, 2, 0, '0.00', '0.00', '27.99', 0, 0, 0, '2018-11-09 09:20:25', 0, 0),
(7, 1, 2, 0, '0.00', '0.00', '354.00', 0, 0, 0, '2018-11-09 09:20:49', 0, 0),
(8, 1, 2, 0, '0.00', '0.00', '265.00', 0, 0, 0, '2018-11-09 09:21:49', 0, 0),
(9, 1, 2, 0, '0.00', '0.00', '262.99', 0, 1, 1, '2018-11-09 09:39:03', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`user_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `user_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
