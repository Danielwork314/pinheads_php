-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2018 at 09:40 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

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
-- Table structure for table `food_model`
--

CREATE TABLE `food_model` (
  `food_model_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_model` varchar(256) COLLATE utf8_bin NOT NULL,
  `SKU` varchar(256) COLLATE utf8_bin NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_model`
--

INSERT INTO `food_model` (`food_model_id`, `food_id`, `food_model`, `SKU`, `quantity`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 3, 'dxxx', 'ttt', 0, '2018-11-22 03:24:28', 0, '0000-00-00 00:00:00', 0, 0),
(2, 0, 'asdx', '', 0, '2018-11-22 03:55:24', 0, '0000-00-00 00:00:00', 0, 0),
(3, 3, 'hyhy', 'oo9', 56, '2018-11-22 04:30:54', 0, '0000-00-00 00:00:00', 0, 0),
(4, 3, 'asd', 'asdd', 0, '2018-11-22 06:02:37', 0, '0000-00-00 00:00:00', 0, 0),
(5, 3, 'qqq', 'qqq', 0, '2018-11-22 06:02:51', 0, '0000-00-00 00:00:00', 0, 0),
(6, 3, 'www', 'www', 0, '2018-11-22 06:02:51', 0, '0000-00-00 00:00:00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_model`
--
ALTER TABLE `food_model`
  ADD PRIMARY KEY (`food_model_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_model`
--
ALTER TABLE `food_model`
  MODIFY `food_model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
