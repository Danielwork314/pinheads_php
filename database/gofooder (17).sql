-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 11:35 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `role_id`, `username`, `password`, `salt`, `name`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(3, 1, 'emmwee', 'f8fe9650547bca0182a8ff6751d7e458c79276307522ca6db163dfe09133612d99d759e4ece5c052e7f0cdacdf7173819ba4b69241f8ceb4ea69ea86e07caf89', 459898, 'Emmanual', 0, '2018-10-03 08:47:43', 0, '0000-00-00 00:00:00', 0),
(4, 1, 'admin', '67511486a8c644373951db14ae725de651a42f7dadbe1d35b5a9a66409ef9ec082de13bfd7953ad5d89583ec09bc88913ebf9e4e4f06c8b4aafc88e227e62487', 457232, 'admin', 0, '2018-10-03 08:47:43', 0, '0000-00-00 00:00:00', 0),
(5, 1, 'asd', 'ca1e6841e2998e0cc38b3125f1452e763e7f93319fd0bb01598131521f64a8b4320957c3071ead62baf226596cd1cfcb8997d7b65b5d9ffe4c6c46d424caefe0', 592790, 'asd', 1, '2018-10-03 08:47:43', 0, '0000-00-00 00:00:00', 0),
(6, 2, 'test', '0eb8c838309510bbe0ef9bdabc8e9f088e72fcc56605f8719b0482650998cb00cc00d5d784b185e18747b85aadc6cc8373720f1d37a277220a67b203b92aa73d', 771074, 'test', 1, '2018-10-03 08:47:43', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `image` varchar(256) COLLATE utf8_bin NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `image`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, '/images/banner/banner_20181202213523.png', 0, '2018-12-02 20:35:23', 3, '2018-12-03 04:42:35', 3),
(2, '/images/banner/banner_20181204021105.jpg', 0, '2018-12-04 07:11:05', 3, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `billing_address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address1` varchar(256) COLLATE utf8_bin NOT NULL,
  `address2` varchar(256) COLLATE utf8_bin NOT NULL,
  `state` varchar(256) COLLATE utf8_bin NOT NULL,
  `postcode` varchar(256) COLLATE utf8_bin NOT NULL,
  `country` varchar(256) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`billing_address_id`, `user_id`, `address1`, `address2`, `state`, `postcode`, `country`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 1, 'xxx', 'xxx', 'xxx', '88888', 'xxx', '2018-11-09 11:12:05', 3, '0000-00-00 00:00:00', 0, 0),
(2, 2, '2', '2', '2', '2', '2', '2018-11-28 09:49:50', 3, '2018-11-28 06:10:04', 3, 0),
(3, 2, '3', '3', '3', '3', '3', '2018-11-28 10:09:03', 3, '2018-11-28 06:10:11', 3, 0),
(4, 2, 'wqq', 'wqq', 'wqq', 'wqq', 'wqq', '2018-12-04 07:09:55', 3, '2018-12-04 03:10:06', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_type_id` int(11) NOT NULL,
  `card` int(20) NOT NULL,
  `bank` varchar(256) COLLATE utf8_bin NOT NULL,
  `cvv` int(3) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `firstname` varchar(256) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(256) COLLATE utf8_bin NOT NULL,
  `address` varchar(256) COLLATE utf8_bin NOT NULL,
  `region` varchar(256) COLLATE utf8_bin NOT NULL,
  `phone` varchar(256) COLLATE utf8_bin NOT NULL,
  `email` varchar(256) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `user_id`, `card_type_id`, `card`, `bank`, `cvv`, `month`, `year`, `firstname`, `lastname`, `address`, `region`, `phone`, `email`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 1, 0, 2147483647, 'xxx', 888, 88, 888, 'xxx', 'xxx', 'xxx', 'xxx', '8888888888', 'xxx@xxx', '2018-11-09 11:12:50', 3, '0000-00-00 00:00:00', 0, 0),
(2, 2, 1, 2147483647, '3', 33, 3, 3, '3', '3', '3', '3', '3', '33@33', '2018-11-28 09:27:20', 3, '2018-12-04 03:09:29', 3, 0),
(3, 2, 1, 2147483647, '3', 33, 3, 3, '3', '3', '3', '3', '3', '33@33', '2018-11-28 09:39:05', 3, '2018-12-04 03:09:29', 3, 0),
(4, 2, 1, 2147483647, '3', 33, 3, 3, '3', '3', '3', '3', '3', '33@33', '2018-12-04 07:08:14', 3, '2018-12-04 03:09:29', 3, 0),
(5, 2, 1, 2147483647, '3', 33, 3, 3, '3', '3', '3', '3', '3', '33@33', '2018-12-04 07:09:19', 3, '2018-12-04 03:09:29', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--

CREATE TABLE `card_type` (
  `card_type_id` int(11) NOT NULL,
  `card_type` varchar(256) COLLATE utf8_bin NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `card_type`
--

INSERT INTO `card_type` (`card_type_id`, `card_type`, `deleted`) VALUES
(1, 'VISA', 0),
(2, 'MASTER', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `coupon` varchar(255) COLLATE utf8_bin NOT NULL,
  `discount_rate` int(11) NOT NULL,
  `valid_date` date NOT NULL,
  `partner_coupon` int(11) NOT NULL DEFAULT '0',
  `number` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `store_id`, `coupon`, `discount_rate`, `valid_date`, `partner_coupon`, `number`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 14, 'Discount Voucher', 10, '2018-11-18', 0, 0, '2018-11-09 10:56:49', 1, '2018-11-21 04:47:53', 3, 0),
(2, 13, 'Sugar on Top', 20, '2018-12-21', 1, 0, '2018-12-20 03:45:09', 0, '0000-00-00 00:00:00', 0, 0),
(3, 14, 'XXXXSSSS1231', 5, '2018-12-28', 0, 0, '2018-12-20 05:58:16', 0, '0000-00-00 00:00:00', 0, 0),
(4, 15, 'ZENTO12314', 10, '2019-01-02', 0, 0, '2018-12-21 11:03:25', 3, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customize`
--

CREATE TABLE `customize` (
  `customize_id` int(11) NOT NULL,
  `customize` varchar(256) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customize`
--

INSERT INTO `customize` (`customize_id`, `customize`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'Ice', '2018-12-14 03:14:29', 0, '2018-12-14 13:25:12', 3, 0),
(2, 'Sugar', '2018-12-14 03:14:29', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'Toppping', '2018-12-14 04:47:12', 3, '0000-00-00 00:00:00', 0, 1),
(4, 'Toppping', '2018-12-14 04:47:35', 3, '0000-00-00 00:00:00', 0, 0),
(5, 'Suagar', '2018-12-14 06:21:52', 3, '0000-00-00 00:00:00', 0, 1),
(6, 'Cheese', '2018-12-14 07:59:56', 3, '0000-00-00 00:00:00', 0, 0),
(7, 'Noodles', '2018-12-21 10:39:27', 3, '2018-12-21 18:39:40', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customize_dressing`
--

CREATE TABLE `customize_dressing` (
  `customize_dressing_id` int(11) NOT NULL,
  `customize_id` int(11) NOT NULL,
  `dressing_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customize_dressing`
--

INSERT INTO `customize_dressing` (`customize_dressing_id`, `customize_id`, `dressing_id`, `created_date`, `created_by`, `modified_by`, `modified_date`, `deleted`) VALUES
(5, 2, 3, '2018-12-14 03:15:29', 0, 0, '0000-00-00 00:00:00', 0),
(6, 2, 4, '2018-12-14 03:15:29', 0, 0, '0000-00-00 00:00:00', 0),
(7, 2, 5, '2018-12-14 03:15:29', 0, 0, '0000-00-00 00:00:00', 0),
(8, 4, 7, '2018-12-14 04:47:35', 3, 0, '0000-00-00 00:00:00', 0),
(9, 4, 8, '2018-12-14 04:47:35', 3, 0, '0000-00-00 00:00:00', 0),
(10, 4, 9, '2018-12-14 04:47:35', 3, 0, '0000-00-00 00:00:00', 0),
(11, 1, 1, '2018-12-14 05:25:12', 3, 0, '0000-00-00 00:00:00', 0),
(12, 1, 2, '2018-12-14 05:25:13', 3, 0, '0000-00-00 00:00:00', 0),
(13, 1, 6, '2018-12-14 05:25:13', 3, 0, '0000-00-00 00:00:00', 0),
(14, 5, 3, '2018-12-14 06:21:52', 3, 0, '0000-00-00 00:00:00', 0),
(15, 5, 4, '2018-12-14 06:21:52', 3, 0, '0000-00-00 00:00:00', 0),
(16, 5, 5, '2018-12-14 06:21:52', 3, 0, '0000-00-00 00:00:00', 0),
(17, 6, 10, '2018-12-14 07:59:56', 3, 0, '0000-00-00 00:00:00', 0),
(18, 6, 11, '2018-12-14 07:59:56', 3, 0, '0000-00-00 00:00:00', 0),
(19, 7, 12, '2018-12-21 10:39:40', 3, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dressing`
--

CREATE TABLE `dressing` (
  `dressing_id` int(11) NOT NULL,
  `dressing` varchar(256) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dressing`
--

INSERT INTO `dressing` (`dressing_id`, `dressing`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'Less Ice', '2018-12-14 03:13:42', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'More Ice', '2018-12-14 03:13:42', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'No Sugar', '2018-12-14 03:14:01', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'Less Sugar', '2018-12-14 03:14:01', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'More Sugar', '2018-12-14 03:14:09', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'No Ice', '2018-12-14 04:45:57', 3, '0000-00-00 00:00:00', 0, 0),
(7, 'Popping Boba', '2018-12-14 04:46:33', 3, '0000-00-00 00:00:00', 0, 0),
(8, 'Coconut Jelly', '2018-12-14 04:46:44', 3, '0000-00-00 00:00:00', 0, 0),
(9, 'Mini Mochi', '2018-12-14 04:46:56', 3, '0000-00-00 00:00:00', 0, 0),
(10, 'No Cheese', '2018-12-14 07:59:19', 3, '0000-00-00 00:00:00', 0, 0),
(11, 'Extra Cheese', '2018-12-14 07:59:28', 3, '0000-00-00 00:00:00', 0, 0),
(12, 'More Noodles', '2018-12-21 10:38:50', 3, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `feature_id` int(11) NOT NULL,
  `feature` varchar(256) COLLATE utf8_bin NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`feature_id`, `feature`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'Halal', 0, '2018-12-01 16:34:17', 3, '2018-12-02 00:35:16', 3),
(2, 'Vegetarian', 0, '2018-12-19 06:15:57', 0, '0000-00-00 00:00:00', 0),
(3, 'Take Away', 0, '2018-12-19 06:15:57', 0, '0000-00-00 00:00:00', 0),
(4, 'Delivery', 0, '2018-12-19 06:16:24', 0, '0000-00-00 00:00:00', 0),
(5, 'Dine In', 0, '2018-12-27 02:13:07', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(256) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `food` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` longtext COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `discounted_price` decimal(5,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_category_id`, `store_id`, `food`, `description`, `image`, `price`, `discounted_price`, `discount`, `inventory`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 0, 6, 'Meal', 'DeliciousDeliciousDeliciousDeliciousDelicious', '/images/food/crisis-escalation-transparent1.png', '50.00', '30.00', 10, 0, '2018-11-09 10:55:24', 1, '2018-11-21 05:32:32', 1, 1),
(2, 0, 1, 'xxx', 'xxx', '', '120.00', '20.00', 10, 0, '2018-11-21 08:49:59', 3, '0000-00-00 00:00:00', 0, 1),
(3, 0, 1, 'asdxxxx', 'asd', '/images/food/car_accessories_improvedvisibility.jpg', '12.00', '2.00', 10, 0, '2018-11-22 02:22:07', 3, '2018-11-23 08:56:16', 3, 1),
(4, 2, 1, 'a', 'a', '/images/store/car_accessories_31bandeq5.jpg', '999.99', '120.00', 90, 0, '2018-11-23 00:28:13', 3, '0000-00-00 00:00:00', 0, 1),
(5, 2, 1, 'ss', 'ss', '/images/store/crisis-escalation-transparent1.png', '999.99', '12.00', 99, 0, '2018-11-23 00:28:58', 3, '0000-00-00 00:00:00', 0, 1),
(6, 0, 1, 'ccxxxxx', 'cc', '/images/food/12-24.jpg', '999.99', '12.00', 99, 0, '2018-11-23 00:31:36', 3, '2018-11-23 09:01:07', 3, 1),
(7, 2, 1, 'vv', 'vv', '', '999.99', '32.00', 99, 0, '2018-11-23 00:35:23', 3, '0000-00-00 00:00:00', 0, 1),
(8, 2, 1, 'dd', 'dd', '', '999.99', '434.00', 87, 0, '2018-11-23 00:36:11', 3, '0000-00-00 00:00:00', 0, 1),
(9, 2, 1, 'ggg', 'ggg', '/images/store/car_accessories_abundant_connectivity.jpg', '777.00', '8.00', 99, 0, '2018-11-23 00:39:13', 3, '0000-00-00 00:00:00', 0, 1),
(10, 2, 1, 'zzzyyy', 'yyyzz', '/images/food/car_accessories_largesuismart.jpg', '999.99', '566.00', 99, 0, '2018-11-23 00:40:41', 3, '2018-11-23 09:01:38', 3, 1),
(11, 4, 7, 'Burger Set', 'American Style Burger', '/images/food/1468282393529.jpg', '20.00', '18.90', 6, 0, '2018-11-23 03:27:40', 3, '2018-12-17 11:00:25', 3, 1),
(12, 4, 7, 'xxx', 'xxx', '/images/store/27332477_409165236176720_1264135450474402744_n1.jpg', '19.90', '15.90', 20, 0, '2018-11-26 03:40:00', 1, '0000-00-00 00:00:00', 0, 1),
(13, 5, 8, 'testfood', 'testfood', '/images/store/delivery.png', '110.00', '50.00', 55, 0, '2018-11-28 09:10:48', 2, '0000-00-00 00:00:00', 0, 1),
(14, 0, 11, 'test', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '/images/food/lab-series-logo-7C72C81CFF-seeklogo_com.png', '10.00', '8.00', 20, 0, '2018-12-01 20:06:34', 3, '0000-00-00 00:00:00', 0, 1),
(15, 4, 7, '123', 'asd', '/images/food/pr_food21.jpg', '11.00', '11.00', 0, 0, '2018-12-14 05:55:49', 3, '2018-12-14 03:58:51', 3, 1),
(16, 4, 13, 'Rendang  Ayam Burger', 'Special  rendang sauce  mix with chicken', '/images/store/rendang.jpg', '18.00', '16.00', 11, 0, '2018-12-20 12:45:13', 3, '2018-12-21 11:35:43', 3, 0),
(17, 5, 13, 'Pasta', 'Pasta', '/images/store/pasta.jpg', '20.00', '15.00', 25, 0, '2018-12-20 12:50:41', 3, '2018-12-21 03:51:15', 3, 0),
(18, 6, 13, 'Soup', 'Delicious', '/images/store/19424566_1431075713639241_4925280138859670063_n.jpg', '12.00', '10.00', 17, 0, '2018-12-20 12:53:03', 3, '0000-00-00 00:00:00', 0, 0),
(19, 4, 14, '抹茶牛奶口味的黑糖鹿丸', 'Milk Tea', '/images/store/MG_4849_合成-小鹿出抹LOGO-750x1125.jpg', '6.90', '0.00', 100, 0, '2018-12-21 08:15:28', 3, '0000-00-00 00:00:00', 0, 1),
(20, 6, 14, '鹿角巷黑糖鹿丸鲜奶', 'Brown Sugar Bubble Latte', '/images/food/20180709110851446.jpg', '6.90', '6.00', 13, 0, '2018-12-21 08:20:10', 3, '2018-12-21 04:49:40', 3, 0),
(21, 4, 14, '抹茶牛奶口味的黑糖鹿丸', 'Milk TEA', '/images/store/MG_4849_合成-小鹿出抹LOGO-750x11252.jpg', '6.90', '6.00', 13, 0, '2018-12-21 08:21:26', 3, '0000-00-00 00:00:00', 0, 1),
(22, 6, 14, '鹿角巷无惑纯茶', 'Tea', '/images/store/1-1P61316033M21.jpg', '12.90', '12.00', 7, 0, '2018-12-21 08:46:02', 3, '2018-12-21 04:49:51', 3, 0),
(23, 7, 15, 'Tuna Poke ​Salad', 'Diced Tuna, Shishimi 7 Spices, Soy Sesame oil Dressing, Mixed Salad, Avocado, Wasabi Cream Sauce', '/images/store/o-8_orig.jpg', '37.90', '37.00', 2, 0, '2018-12-21 10:08:47', 3, '2018-12-21 06:13:39', 3, 0),
(24, 4, 15, 'Gyu Don', 'Simmered  beef and onion in mildly sweet Dashi sauce, pickled ginger, scallions', '/images/store/img-0021gyu-don_orig.jpg', '18.90', '18.00', 5, 0, '2018-12-21 10:13:24', 3, '0000-00-00 00:00:00', 0, 0),
(25, 5, 15, 'Chashu Pork Ramen', 'Japanese Ramen Noodles w in Soy- Miso broth, seaweed,  spinach,  bamboo shoot, corn, egg scallion, Sesame seed', '/images/store/img-0032chashu-pork-ramen1.jpg', '17.90', '16.90', 6, 0, '2018-12-21 10:19:48', 3, '0000-00-00 00:00:00', 0, 0),
(26, 5, 17, 'Mee Rebus', 'Mi rebus, mie rebus or mee rebus literally \"boiled noodles\" in English is a noodle soup dish popular in Malaysia.', '/images/store/Screenshot_2018-12-21_at_6_39_42_PM.png', '6.90', '6.00', 13, 0, '2018-12-21 10:37:28', 3, '2018-12-21 06:39:53', 3, 0),
(27, 4, 17, 'Nasi Lemak', 'Nasi lemak is a Malay fragrant rice dish cooked in coconut milk and pandan leaf. It is commonly found in Malaysia, where it is considered the national dish.', '/images/store/Screenshot_2018-12-21_at_6_43_48_PM.png', '5.90', '5.00', 15, 0, '2018-12-21 10:41:18', 3, '0000-00-00 00:00:00', 0, 0),
(28, 4, 17, 'Black Pepper Chicken Chop', 'Chicken Chop with Black Pepper Sauce. Delicious grilled or pan-fried marinated chicken covered in a rich, bold black pepper sauce.', '/images/store/Screenshot_2018-12-21_at_6_45_40_PM.png', '18.90', '18.00', 5, 0, '2018-12-21 10:44:13', 3, '0000-00-00 00:00:00', 0, 0),
(29, 4, 18, 'Korean traditional pancake', 'Korean traditional pancake with spring onion, various seafood\'s with soy sauce dipping', '/images/store/pancake.jpg', '20.00', '18.00', 10, 0, '2018-12-21 11:34:27', 3, '0000-00-00 00:00:00', 0, 0),
(30, 4, 18, 'Burger', 'Flavorful and kid-friendly, our pork, hamburger steak made of fresh ground pork and spices', '/images/store/burger.jpg', '18.00', '15.00', 17, 0, '2018-12-21 11:36:04', 3, '0000-00-00 00:00:00', 0, 0),
(31, 6, 18, 'Bingsu', 'BINGSU is a popular Korean dessert made of shaved ice with sweet toppings that include chopped fresh fruit, condensed milk, fresh milk, fresh syrup and with your choice of flavor.', '/images/store/bingsu.jpg', '12.00', '10.00', 17, 0, '2018-12-21 11:37:51', 3, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `food_category_id` int(11) NOT NULL,
  `food_category` varchar(256) COLLATE utf8_bin NOT NULL,
  `thumbnail` varchar(256) COLLATE utf8_bin NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`food_category_id`, `food_category`, `thumbnail`, `parent_id`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'asd', '', 0, 1, '2018-11-22 01:48:53', 0, '0000-00-00 00:00:00', 0),
(2, 'asdx', '', 0, 1, '2018-11-22 01:50:38', 0, '0000-00-00 00:00:00', 0),
(3, 'ooo', '', 2, 1, '2018-11-23 01:44:11', 0, '0000-00-00 00:00:00', 0),
(4, 'Spicy', '/images/food_category/food_category_20181221191620.png', 0, 0, '2018-11-23 03:31:24', 0, '0000-00-00 00:00:00', 0),
(5, 'Noodles', '/images/food_category/food_category_20181221191658.png', 4, 0, '2018-11-23 03:31:35', 0, '0000-00-00 00:00:00', 0),
(6, 'Beverage', '/images/food_category/food_category_20181221191807.png', 4, 0, '2018-11-28 09:09:20', 0, '0000-00-00 00:00:00', 0),
(7, 'test', '/images/food_category/food_category_20181201164523.png', 0, 0, '2018-12-01 15:45:23', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_combo`
--

CREATE TABLE `food_combo` (
  `food_combo_id` int(11) NOT NULL,
  `food_category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `food_combo` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` longtext COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `discounted_price` decimal(5,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_combo`
--

INSERT INTO `food_combo` (`food_combo_id`, `food_category_id`, `store_id`, `food_combo`, `description`, `image`, `price`, `discounted_price`, `discount`, `inventory`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 5, 13, 'asd', 'asd', '/images/store/collection_carousel_mood31.jpg', '111.00', '11.00', 90, 0, '2018-12-27 10:06:33', 3, '0000-00-00 00:00:00', 0, 0),
(2, 5, 13, 'asd', 'asd', '/images/food/collection_disneypooh_mood23.jpg', '111.00', '11.00', 90, 0, '2018-12-27 10:27:47', 3, '2018-12-27 06:34:47', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_combo_customize`
--

CREATE TABLE `food_combo_customize` (
  `food_combo_customize_id` int(11) NOT NULL,
  `food_combo_id` int(11) NOT NULL,
  `customize_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_combo_customize`
--

INSERT INTO `food_combo_customize` (`food_combo_customize_id`, `food_combo_id`, `customize_id`, `created_date`, `created_by`, `modified_by`, `modified_date`, `deleted`) VALUES
(1, 1, 6, '2018-12-27 10:06:33', 0, 0, '0000-00-00 00:00:00', 0),
(5, 2, 6, '2018-12-27 10:34:48', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_combo_food`
--

CREATE TABLE `food_combo_food` (
  `food_combo_food_id` int(11) NOT NULL,
  `food_combo_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_combo_food`
--

INSERT INTO `food_combo_food` (`food_combo_food_id`, `food_combo_id`, `food_id`) VALUES
(1, 1, 16),
(2, 1, 17),
(9, 2, 16),
(10, 2, 18),
(11, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `food_customize`
--

CREATE TABLE `food_customize` (
  `food_customize_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `customize_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food_customize`
--

INSERT INTO `food_customize` (`food_customize_id`, `food_id`, `customize_id`, `created_date`, `created_by`, `modified_by`, `modified_date`, `deleted`) VALUES
(25, 15, 1, '2018-12-14 07:58:51', 0, 0, '0000-00-00 00:00:00', 0),
(27, 11, 6, '2018-12-17 03:00:25', 0, 0, '0000-00-00 00:00:00', 0),
(28, 11, 4, '2018-12-17 03:00:25', 0, 0, '0000-00-00 00:00:00', 0),
(29, 16, 6, '2018-12-21 03:35:43', 0, 0, '0000-00-00 00:00:00', 0),
(36, 20, 1, '2018-12-21 08:49:40', 0, 0, '0000-00-00 00:00:00', 0),
(37, 20, 2, '2018-12-21 08:49:40', 0, 0, '0000-00-00 00:00:00', 0),
(38, 22, 1, '2018-12-21 08:49:51', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_ingredient`
--

CREATE TABLE `food_ingredient` (
  `food_ingredient_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(5, 3, 'qqq', 'qqq', 0, '2018-11-22 06:02:51', 0, '0000-00-00 00:00:00', 0, 1),
(6, 3, 'www', 'www', 0, '2018-11-22 06:02:51', 0, '0000-00-00 00:00:00', 0, 1),
(7, 10, 'uouo', 'qw', 50, '2018-11-23 01:08:55', 0, '0000-00-00 00:00:00', 0, 0),
(8, 3, 'hhh', 'hhh', 70, '2018-11-23 01:35:13', 0, '0000-00-00 00:00:00', 0, 0),
(9, 11, 'asd', 'asd', 50, '2018-11-23 07:51:30', 0, '0000-00-00 00:00:00', 0, 0),
(10, 12, 'asdx', 'asd', 100, '2018-11-26 04:09:27', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender` varchar(256) COLLATE utf8_bin NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender`, `deleted`) VALUES
(1, 'Male', 0),
(2, 'Female', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gourmet_type`
--

CREATE TABLE `gourmet_type` (
  `gourmet_type_id` int(11) NOT NULL,
  `gourmet_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `thumbnail` varchar(256) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gourmet_type`
--

INSERT INTO `gourmet_type` (`gourmet_type_id`, `gourmet_type`, `thumbnail`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'Local', '/images/gourmet_type/gourmet_type_20181221190709.png', '2018-11-09 10:28:41', 3, '2018-12-21 19:07:09', 3, 0),
(2, 'Western', '', '2018-11-23 02:06:16', 3, '2018-11-23 10:06:24', 3, 1),
(3, 'Cafe', '/images/gourmet_type/gourmet_type_20181221190546.png', '2018-11-25 05:01:24', 3, '2018-12-21 19:05:46', 3, 0),
(4, 'Japanese', '/images/gourmet_type/gourmet_type_20181221190653.png', '2018-12-01 16:17:03', 3, '2018-12-21 19:06:54', 3, 0),
(5, 'Korean', '/images/gourmet_type/gourmet_type_20181221190844.png', '2018-12-19 04:00:46', 3, '2018-12-21 19:08:45', 3, 0),
(6, 'Beverage', '/images/gourmet_type/gourmet_type_20181221190951.png', '2018-12-19 04:00:46', 3, '2018-12-21 19:09:52', 3, 0),
(7, 'Italian', '', '2018-12-19 04:01:07', 0, '0000-00-00 00:00:00', 0, 1),
(8, 'Western', '/images/gourmet_type/gourmet_type_20181221190346.png', '2018-12-21 11:03:46', 3, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`ingredient_id`, `ingredient`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'meat', '2018-10-26 06:06:41', 3, '2018-10-30 03:44:55', 3, 0),
(2, 'egg', '2018-10-30 04:34:07', 3, '2018-10-30 03:45:47', 3, 0),
(3, 'milk', '2018-10-30 06:56:47', 3, '2018-10-30 03:45:05', 3, 0),
(4, 'flour', '2018-10-31 02:06:58', 3, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `image` varchar(256) COLLATE utf8_bin NOT NULL,
  `menu` varchar(256) COLLATE utf8_bin NOT NULL,
  `description` varchar(256) COLLATE utf8_bin NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `discount` varchar(256) COLLATE utf8_bin NOT NULL,
  `discounted_price` decimal(5,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module` varchar(256) CHARACTER SET utf8 NOT NULL,
  `url` varchar(256) CHARACTER SET utf8 NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module`, `url`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'Admin', 'admin', 0, '2018-10-03 09:01:25', 0, '0000-00-00 00:00:00', 0),
(2, 'Customer', 'customer', 0, '2018-10-03 09:01:25', 0, '0000-00-00 00:00:00', 0),
(3, 'Item', 'item', 0, '2018-10-03 09:01:25', 0, '0000-00-00 00:00:00', 0),
(4, 'Order', 'order', 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(5, 'Outlet', 'outlet', 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(6, 'Project', 'project', 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(7, 'Project Outlet', 'project_outlet', 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(8, 'Project Report', 'project_report', 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(9, 'Quotation', 'quotation', 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(10, 'Role Access', 'role_access', 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(11, 'User', 'user', 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(12, 'Store', 'store', 0, '2018-10-24 04:49:42', 0, '0000-00-00 00:00:00', 0),
(13, 'Food', 'food', 0, '2018-10-24 04:55:45', 0, '0000-00-00 00:00:00', 0),
(14, 'Gourmet_type', 'gourmet_type', 0, '2018-10-24 08:30:03', 0, '0000-00-00 00:00:00', 0),
(15, 'Pricing', 'pricing', 0, '2018-10-24 08:30:03', 0, '0000-00-00 00:00:00', 0),
(16, 'Ingredient', 'ingredient', 0, '2018-10-24 08:30:28', 0, '0000-00-00 00:00:00', 0),
(17, 'Notification', 'notification', 0, '2018-10-29 02:17:10', 0, '0000-00-00 00:00:00', 0),
(18, 'Feedback', 'feedback', 0, '2018-10-29 02:39:32', 0, '0000-00-00 00:00:00', 0),
(19, 'Coupon', 'coupon', 0, '2018-10-29 02:41:49', 0, '0000-00-00 00:00:00', 0),
(20, 'Billing_address', 'billing_address', 0, '2018-10-29 03:26:37', 0, '0000-00-00 00:00:00', 0),
(21, 'Menu', 'menu', 0, '2018-10-29 06:12:37', 0, '0000-00-00 00:00:00', 0),
(22, 'Card', 'card', 0, '2018-10-31 14:14:27', 0, '0000-00-00 00:00:00', 0),
(23, 'Sales', 'sales', 0, '2018-11-01 03:53:56', 0, '0000-00-00 00:00:00', 0),
(24, 'Vendor', 'vendor', 0, '2018-11-09 03:50:48', 0, '0000-00-00 00:00:00', 0),
(25, 'Table_no', 'table_no', 0, '2018-11-22 00:39:20', 0, '0000-00-00 00:00:00', 0),
(26, 'Food Category', 'food_category', 0, '2018-11-22 01:44:43', 0, '0000-00-00 00:00:00', 0),
(27, 'Food Model', 'food_models', 0, '2018-11-22 02:50:04', 0, '0000-00-00 00:00:00', 0),
(28, 'Order Food', 'order_food', 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(29, 'Product Images', 'product_images', 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(30, 'Product', 'product', 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(31, 'Payment', 'payment', 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(32, 'User Order', 'user_order', 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(33, 'Store Category', 'store_category', 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(34, 'API', 'api', 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(35, 'Product Models', 'product_models', 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(36, 'Product Category', 'product_category', 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(37, 'Feature', 'feature', 0, '2018-12-01 16:32:07', 0, '0000-00-00 00:00:00', 0),
(38, 'Store Images', 'store_images', 0, '2018-12-01 19:28:28', 0, '0000-00-00 00:00:00', 0),
(39, 'Banner', 'banner', 0, '2018-12-02 20:27:29', 0, '0000-00-00 00:00:00', 0),
(40, 'Social_media', 'social_media', 0, '2018-12-04 07:05:09', 0, '0000-00-00 00:00:00', 0),
(41, 'Social_media_link', 'social_media_link', 0, '2018-12-04 07:05:27', 0, '0000-00-00 00:00:00', 0),
(42, 'Customize', 'customize', 0, '2018-12-14 03:16:12', 0, '0000-00-00 00:00:00', 0),
(43, 'Dressing', 'dressing', 0, '2018-12-14 03:16:12', 0, '0000-00-00 00:00:00', 0),
(44, 'Food_combo', 'food_combo', 0, '2018-12-27 09:29:14', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` longtext COLLATE utf8_bin NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE `order_food` (
  `order_food_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `customize_id` int(11) NOT NULL,
  `dressing_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`order_food_id`, `sales_id`, `food_id`, `customize_id`, `dressing_id`, `order_status_id`, `quantity`, `created_date`, `created_by`, `deleted`) VALUES
(1, 3, 1, 0, 0, 1, 0, '2018-11-09 11:28:44', 0, 0),
(2, 4, 11, 0, 0, 1, 0, '2018-11-23 08:25:24', 0, 0),
(3, 5, 11, 0, 0, 1, 3, '2018-12-03 05:47:58', 0, 0),
(4, 6, 11, 0, 0, 1, 1, '2018-12-03 05:51:07', 0, 0),
(5, 7, 11, 0, 0, 1, 2, '2018-12-04 02:19:16', 0, 0),
(6, 8, 11, 0, 0, 1, 4, '2018-12-04 05:59:01', 0, 0),
(7, 9, 11, 0, 0, 1, 2, '2018-12-04 06:37:56', 0, 0),
(8, 9, 13, 0, 0, 1, 1, '2018-12-04 06:37:56', 0, 0),
(9, 9, 11, 0, 0, 1, 0, '2018-12-04 07:01:16', 0, 0),
(10, 9, 11, 0, 0, 1, 0, '2018-12-04 07:01:16', 0, 0),
(11, 10, 11, 0, 0, 1, 0, '2018-12-04 07:10:16', 0, 0),
(12, 10, 11, 0, 0, 1, 0, '2018-12-04 07:10:16', 0, 0),
(13, 11, 11, 0, 0, 1, 0, '2018-12-04 07:10:45', 0, 0),
(14, 11, 11, 0, 0, 1, 0, '2018-12-04 07:10:45', 0, 0),
(15, 11, 11, 0, 0, 1, 0, '2018-12-04 07:10:45', 0, 0),
(16, 11, 11, 0, 0, 1, 0, '2018-12-04 07:10:45', 0, 0),
(17, 11, 11, 0, 0, 1, 0, '2018-12-04 07:10:45', 0, 0),
(18, 11, 11, 0, 0, 1, 0, '2018-12-04 07:10:45', 0, 0),
(19, 11, 11, 0, 0, 1, 0, '2018-12-04 07:10:45', 0, 0),
(20, 12, 11, 0, 0, 2, 1, '2018-12-09 05:29:16', 0, 0),
(21, 13, 11, 0, 0, 2, 2, '2018-12-17 05:21:45', 0, 0),
(22, 14, 11, 0, 0, 3, 5, '2018-12-17 05:50:59', 0, 0),
(23, 15, 11, 0, 0, 2, 1, '2018-12-17 06:55:21', 0, 0),
(24, 16, 12, 0, 0, 1, 1, '2018-12-17 06:55:45', 0, 0),
(25, 17, 11, 0, 0, 3, 1, '2018-12-17 10:25:53', 0, 0),
(26, 17, 12, 0, 0, 2, 1, '2018-12-17 10:25:53', 0, 0),
(27, 17, 15, 0, 0, 2, 1, '2018-12-17 10:25:53', 0, 0),
(28, 18, 11, 6, 11, 2, 1, '2018-12-17 10:42:26', 0, 0),
(29, 21, 11, 0, 0, 1, 1, '2018-12-19 02:46:29', 0, 0),
(30, 22, 11, 0, 0, 1, 1, '2018-12-19 02:59:35', 0, 0),
(31, 23, 15, 0, 0, 1, 1, '2018-12-19 03:16:39', 0, 0),
(32, 24, 12, 0, 0, 1, 4, '2018-12-19 03:19:28', 0, 0),
(33, 25, 12, 0, 0, 1, 1, '2018-12-19 03:37:18', 0, 0),
(34, 26, 11, 0, 0, 1, 1, '2018-12-19 03:38:30', 0, 0),
(35, 27, 11, 0, 0, 1, 1, '2018-12-19 03:39:48', 0, 0),
(36, 28, 11, 0, 0, 1, 1, '2018-12-19 03:41:46', 0, 0),
(37, 29, 11, 0, 0, 1, 1, '2018-12-19 03:43:51', 0, 0),
(38, 30, 11, 0, 0, 1, 1, '2018-12-19 03:45:29', 0, 0),
(39, 31, 11, 0, 0, 1, 1, '2018-12-19 03:45:31', 0, 0),
(40, 32, 11, 0, 0, 1, 1, '2018-12-19 03:46:58', 0, 0),
(41, 33, 15, 0, 0, 1, 1, '2018-12-19 03:47:24', 0, 0),
(42, 34, 11, 6, 11, 1, 1, '2018-12-20 08:58:47', 0, 0),
(43, 35, 11, 0, 0, 1, 1, '2018-12-20 09:42:10', 0, 0),
(44, 35, 12, 0, 0, 1, 1, '2018-12-20 09:42:10', 0, 0),
(45, 35, 15, 0, 0, 1, 1, '2018-12-20 09:42:10', 0, 0),
(46, 36, 16, 6, 11, 1, 4, '2018-12-21 09:17:54', 0, 0),
(47, 37, 16, 0, 0, 1, 1, '2018-12-21 09:21:34', 0, 0),
(48, 38, 20, 0, 0, 1, 1, '2018-12-21 09:40:03', 0, 0),
(49, 38, 22, 0, 0, 1, 1, '2018-12-21 09:40:03', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_food_dressing`
--

CREATE TABLE `order_food_dressing` (
  `order_food_dressing_id` int(11) NOT NULL,
  `order_food_id` int(11) NOT NULL,
  `dressing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_food_dressing`
--

INSERT INTO `order_food_dressing` (`order_food_dressing_id`, `order_food_id`, `dressing_id`) VALUES
(1, 48, 1),
(2, 48, 3),
(3, 49, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `order_status` varchar(256) COLLATE utf8_bin NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `order_status`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'Order Placed', 0, '2018-12-04 02:48:24', 0, '0000-00-00 00:00:00', 0),
(2, 'Served', 0, '2018-12-04 02:48:24', 0, '0000-00-00 00:00:00', 0),
(3, 'Cancelled', 0, '2018-12-04 02:48:38', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int(11) NOT NULL,
  `pricing` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pricing_id`, `pricing`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'lower price', '2018-11-09 10:34:40', 3, '0000-00-00 00:00:00', 0, 0),
(2, 'average', '2018-11-23 02:43:55', 3, '2018-11-23 10:44:03', 3, 0),
(3, 'above average', '2018-11-25 04:56:13', 3, '2018-11-25 12:57:04', 3, 0),
(4, 'expensive', '2018-12-19 07:32:48', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'very expensive', '2018-12-19 07:32:48', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `type` enum('USER','ADMIN','CLIENT','VENDOR','STAFF') NOT NULL,
  `role` varchar(256) NOT NULL,
  `level` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `type`, `role`, `level`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'ADMIN', 'Superadmin', 1, '2018-10-03 08:49:04', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'ADMIN', 'Admin', 2, '2018-10-03 08:49:26', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'USER', 'User', 1, '2018-10-31 08:45:37', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'VENDOR', 'Vendor', 1, '2018-11-09 03:16:38', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'STAFF', 'Management', 1, '2018-12-27 09:53:05', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'STAFF', 'Cashier', 2, '2018-12-27 09:53:05', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_access`
--

CREATE TABLE `role_access` (
  `role_access_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `create_control` tinyint(1) NOT NULL DEFAULT '0',
  `read_control` tinyint(1) NOT NULL DEFAULT '0',
  `update_control` tinyint(1) NOT NULL DEFAULT '0',
  `delete_control` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` int(11) DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role_access`
--

INSERT INTO `role_access` (`role_access_id`, `role_id`, `module_id`, `create_control`, `read_control`, `update_control`, `delete_control`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, '2018-10-03 09:01:25', 0, '0000-00-00 00:00:00', 0),
(2, 2, 1, 0, 1, 0, 0, 0, '2018-10-03 09:01:25', 0, '0000-00-00 00:00:00', 0),
(3, 1, 2, 1, 1, 1, 1, 0, '2018-10-03 09:01:25', 0, '0000-00-00 00:00:00', 0),
(4, 2, 2, 0, 1, 0, 0, 0, '2018-10-03 09:01:25', 0, '0000-00-00 00:00:00', 0),
(5, 1, 3, 1, 1, 1, 1, 0, '2018-10-03 09:01:25', 0, '0000-00-00 00:00:00', 0),
(6, 2, 3, 0, 1, 0, 0, 0, '2018-10-03 09:01:25', 0, '0000-00-00 00:00:00', 0),
(7, 1, 4, 1, 1, 1, 1, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(8, 2, 4, 0, 1, 0, 0, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(9, 1, 5, 1, 1, 1, 1, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(10, 2, 5, 0, 1, 0, 0, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(11, 1, 6, 1, 1, 1, 1, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(12, 2, 6, 0, 1, 0, 0, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(13, 1, 7, 1, 1, 1, 1, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(14, 2, 7, 0, 1, 0, 0, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(15, 1, 8, 1, 1, 1, 1, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(16, 2, 8, 0, 1, 0, 0, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(17, 1, 9, 1, 1, 1, 1, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(18, 2, 9, 0, 1, 0, 0, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(19, 1, 10, 1, 1, 1, 1, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(20, 2, 10, 0, 1, 0, 0, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(21, 1, 11, 1, 1, 1, 1, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(22, 2, 11, 0, 1, 0, 0, 0, '2018-10-03 09:01:26', 0, '0000-00-00 00:00:00', 0),
(23, 1, 12, 1, 1, 1, 1, 0, '2018-10-24 04:51:55', 0, '0000-00-00 00:00:00', 0),
(24, 2, 12, 0, 1, 0, 0, 0, '2018-10-24 04:51:55', 0, '0000-00-00 00:00:00', 0),
(25, 1, 13, 1, 1, 1, 1, 0, '2018-10-24 04:56:06', 0, '0000-00-00 00:00:00', 0),
(26, 2, 13, 0, 1, 0, 0, 0, '2018-10-24 04:56:06', 0, '0000-00-00 00:00:00', 0),
(27, 1, 14, 1, 1, 1, 1, 0, '2018-10-24 08:31:03', 0, '0000-00-00 00:00:00', 0),
(28, 2, 14, 0, 1, 0, 0, 0, '2018-10-24 08:31:03', 0, '0000-00-00 00:00:00', 0),
(29, 1, 15, 1, 1, 1, 1, 0, '2018-10-24 08:31:18', 0, '0000-00-00 00:00:00', 0),
(30, 2, 15, 0, 1, 0, 0, 0, '2018-10-24 08:31:18', 0, '0000-00-00 00:00:00', 0),
(31, 1, 16, 1, 1, 1, 1, 0, '2018-10-24 08:31:32', 0, '0000-00-00 00:00:00', 0),
(32, 2, 16, 0, 1, 0, 0, 0, '2018-10-24 08:31:32', 0, '0000-00-00 00:00:00', 0),
(33, 1, 17, 1, 1, 1, 1, 0, '2018-10-29 02:18:36', 0, '0000-00-00 00:00:00', 0),
(34, 2, 17, 0, 1, 0, 0, 0, '2018-10-29 02:18:58', 0, '0000-00-00 00:00:00', 0),
(35, 1, 18, 1, 1, 1, 1, 0, '2018-10-29 02:39:59', 0, '0000-00-00 00:00:00', 0),
(36, 2, 18, 0, 1, 0, 0, 0, '2018-10-29 02:40:25', 0, '0000-00-00 00:00:00', 0),
(37, 1, 19, 1, 1, 1, 1, 0, '2018-10-29 02:42:06', 0, '0000-00-00 00:00:00', 0),
(38, 2, 19, 0, 1, 0, 0, 0, '2018-10-29 02:42:19', 0, '0000-00-00 00:00:00', 0),
(39, 1, 20, 1, 1, 1, 1, 0, '2018-10-29 03:27:01', 0, '0000-00-00 00:00:00', 0),
(40, 2, 20, 0, 1, 0, 0, 0, '2018-10-29 03:27:10', 0, '0000-00-00 00:00:00', 0),
(41, 1, 21, 1, 1, 1, 1, 0, '2018-10-29 06:12:54', 0, '0000-00-00 00:00:00', 0),
(42, 2, 21, 0, 1, 0, 0, 0, '2018-10-29 06:13:10', 0, '0000-00-00 00:00:00', 0),
(43, 1, 22, 1, 1, 1, 1, 0, '2018-10-31 14:14:47', 0, '0000-00-00 00:00:00', 0),
(44, 2, 22, 0, 1, 0, 0, 0, '2018-10-31 14:15:00', 0, '0000-00-00 00:00:00', 0),
(45, 1, 23, 1, 1, 1, 1, 0, '2018-11-01 03:55:01', 0, '0000-00-00 00:00:00', 0),
(46, 2, 23, 0, 1, 0, 0, 0, '2018-11-01 03:55:12', 0, '0000-00-00 00:00:00', 0),
(47, 4, 12, 1, 1, 1, 0, 0, '2018-11-09 03:57:20', 0, '0000-00-00 00:00:00', 0),
(48, 4, 13, 1, 1, 1, 0, 0, '2018-11-09 03:57:20', 0, '0000-00-00 00:00:00', 0),
(49, 4, 14, 1, 1, 1, 0, 0, '2018-11-09 03:57:20', 0, '0000-00-00 00:00:00', 0),
(50, 4, 15, 0, 1, 0, 0, 0, '2018-11-09 03:57:20', 0, '0000-00-00 00:00:00', 0),
(51, 4, 19, 1, 1, 1, 0, 0, '2018-11-09 03:57:20', 0, '0000-00-00 00:00:00', 0),
(52, 4, 23, 0, 1, 0, 0, 0, '2018-11-09 03:57:20', 0, '0000-00-00 00:00:00', 0),
(53, 4, 24, 0, 1, 1, 0, 0, '2018-11-09 03:57:20', 0, '0000-00-00 00:00:00', 0),
(54, 1, 24, 1, 1, 1, 1, 0, '2018-11-09 03:58:43', 0, '0000-00-00 00:00:00', 0),
(55, 2, 24, 0, 1, 0, 0, 0, '2018-11-09 03:58:43', 0, '0000-00-00 00:00:00', 0),
(56, 4, 1, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(57, 4, 2, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(58, 4, 3, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(59, 4, 4, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(60, 4, 5, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(61, 4, 6, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(62, 4, 7, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(63, 4, 8, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(64, 4, 9, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(65, 4, 10, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(66, 4, 11, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(67, 4, 16, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(68, 4, 17, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(69, 4, 18, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(70, 4, 20, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(71, 4, 21, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(72, 4, 22, 0, 0, 0, 0, 0, '2018-11-09 04:16:58', 0, '0000-00-00 00:00:00', 0),
(73, 4, 4, 0, 1, 0, 0, 0, '2018-11-09 10:00:23', 0, '0000-00-00 00:00:00', 0),
(74, 1, 25, 1, 1, 1, 1, 0, '2018-11-22 00:39:54', 0, '0000-00-00 00:00:00', 0),
(75, 2, 25, 1, 1, 0, 0, 0, '2018-11-22 00:40:21', 0, '0000-00-00 00:00:00', 0),
(76, 1, 26, 1, 1, 1, 1, 0, '2018-11-22 01:45:15', 0, '0000-00-00 00:00:00', 0),
(77, 2, 26, 0, 1, 0, 0, 0, '2018-11-22 01:45:33', 0, '0000-00-00 00:00:00', 0),
(78, 1, 27, 1, 1, 1, 1, 0, '2018-11-22 02:50:27', 0, '0000-00-00 00:00:00', 0),
(79, 2, 27, 1, 1, 1, 1, 0, '2018-11-22 02:50:55', 0, '0000-00-00 00:00:00', 0),
(80, 4, 25, 1, 1, 1, 1, 0, '2018-11-26 04:24:28', 0, '0000-00-00 00:00:00', 0),
(81, 4, 26, 1, 1, 1, 1, 0, '2018-11-26 04:25:27', 0, '0000-00-00 00:00:00', 0),
(82, 4, 27, 1, 1, 1, 1, 0, '2018-11-26 04:25:44', 0, '0000-00-00 00:00:00', 0),
(83, 1, 28, 1, 1, 1, 1, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(84, 2, 28, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(85, 3, 28, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(86, 4, 28, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(87, 1, 29, 1, 1, 1, 1, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(88, 2, 29, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(89, 3, 29, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(90, 4, 29, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(91, 1, 30, 1, 1, 1, 1, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(92, 2, 30, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(93, 3, 30, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(94, 4, 30, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(95, 1, 31, 1, 1, 1, 1, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(96, 2, 31, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(97, 3, 31, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(98, 4, 31, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(99, 1, 32, 1, 1, 1, 1, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(100, 2, 32, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(101, 3, 32, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(102, 4, 32, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(103, 1, 33, 1, 1, 1, 1, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(104, 2, 33, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(105, 3, 33, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(106, 4, 33, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(107, 1, 34, 1, 1, 1, 1, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(108, 2, 34, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(109, 3, 34, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(110, 4, 34, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(111, 1, 35, 1, 1, 1, 1, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(112, 2, 35, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(113, 3, 35, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(114, 4, 35, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(115, 1, 36, 1, 1, 1, 1, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(116, 2, 36, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(117, 3, 36, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(118, 4, 36, 0, 1, 0, 0, 0, '2018-12-01 16:03:32', 0, '0000-00-00 00:00:00', 0),
(119, 1, 37, 1, 1, 1, 1, 0, '2018-12-01 16:32:07', 0, '0000-00-00 00:00:00', 0),
(120, 2, 37, 0, 1, 0, 0, 0, '2018-12-01 16:32:07', 0, '0000-00-00 00:00:00', 0),
(121, 3, 37, 0, 1, 0, 0, 0, '2018-12-01 16:32:07', 0, '0000-00-00 00:00:00', 0),
(122, 4, 37, 0, 1, 0, 0, 0, '2018-12-01 16:32:07', 0, '0000-00-00 00:00:00', 0),
(123, 1, 38, 1, 1, 1, 1, 0, '2018-12-01 19:28:28', 0, '0000-00-00 00:00:00', 0),
(124, 2, 38, 0, 1, 0, 0, 0, '2018-12-01 19:28:28', 0, '0000-00-00 00:00:00', 0),
(125, 3, 38, 0, 1, 0, 0, 0, '2018-12-01 19:28:28', 0, '0000-00-00 00:00:00', 0),
(126, 4, 38, 0, 1, 0, 0, 0, '2018-12-01 19:28:28', 0, '0000-00-00 00:00:00', 0),
(127, 1, 39, 1, 1, 1, 1, 0, '2018-12-02 20:27:29', 0, '0000-00-00 00:00:00', 0),
(128, 2, 39, 0, 1, 0, 0, 0, '2018-12-02 20:27:29', 0, '0000-00-00 00:00:00', 0),
(129, 3, 39, 0, 1, 0, 0, 0, '2018-12-02 20:27:29', 0, '0000-00-00 00:00:00', 0),
(130, 4, 39, 0, 1, 0, 0, 0, '2018-12-02 20:27:29', 0, '0000-00-00 00:00:00', 0),
(131, 1, 31, 1, 1, 1, 1, 0, '2018-12-04 07:05:42', 0, '0000-00-00 00:00:00', 0),
(132, 1, 32, 1, 1, 1, 1, 0, '2018-12-04 07:05:59', 0, '0000-00-00 00:00:00', 0),
(133, 1, 40, 1, 1, 1, 1, 0, '2018-12-14 02:59:04', 0, '0000-00-00 00:00:00', 0),
(134, 1, 42, 1, 1, 1, 1, 0, '2018-12-14 03:18:29', 0, '0000-00-00 00:00:00', 0),
(135, 2, 42, 1, 1, 1, 1, 0, '2018-12-14 03:18:29', 0, '0000-00-00 00:00:00', 0),
(136, 4, 42, 1, 1, 0, 0, 0, '2018-12-14 03:18:29', 0, '0000-00-00 00:00:00', 0),
(137, 1, 43, 1, 1, 1, 1, 0, '2018-12-14 03:18:29', 0, '0000-00-00 00:00:00', 0),
(138, 2, 43, 1, 1, 1, 1, 0, '2018-12-14 03:18:29', 0, '0000-00-00 00:00:00', 0),
(139, 4, 43, 1, 1, 0, 0, 0, '2018-12-14 03:18:29', 0, '0000-00-00 00:00:00', 0),
(140, 1, 41, 1, 1, 1, 1, 0, '2018-12-20 13:49:21', 0, '0000-00-00 00:00:00', 0),
(141, 1, 44, 1, 1, 1, 1, 0, '2018-12-27 09:30:43', 0, '0000-00-00 00:00:00', 0),
(142, 2, 44, 1, 1, 1, 0, 0, '2018-12-27 09:30:43', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `take_away` int(11) NOT NULL DEFAULT '0',
  `sub_total` decimal(5,2) NOT NULL,
  `service_change` decimal(5,2) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `order_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `user_id`, `billing_address_id`, `card_id`, `store_id`, `coupon_id`, `take_away`, `sub_total`, `service_change`, `total`, `status`, `created_date`, `created_by`, `deleted`, `order_status_id`) VALUES
(1, 1, 0, 0, 0, 1, 0, '100.00', '4.00', '104.00', 0, '2018-11-09 11:16:18', 3, 1, 3),
(2, 1, 0, 0, 0, 1, 1, '200.00', '14.00', '214.00', 0, '2018-11-09 11:17:44', 3, 1, 3),
(3, 1, 1, 1, 6, 0, 0, '0.00', '0.00', '50.00', 0, '2018-11-09 11:28:44', 0, 0, 3),
(4, 1, 1, 1, 7, 0, 1, '0.00', '0.00', '20.00', 0, '2018-11-23 08:25:24', 0, 0, 3),
(5, 2, 3, 3, 8, 0, 1, '0.00', '0.00', '330.00', 1, '2018-11-28 11:14:39', 0, 0, 3),
(6, 2, 2, 3, 7, 1, 0, '0.00', '0.00', '39.90', 0, '2018-12-03 03:28:08', 0, 0, 3),
(7, 1, 1, 1, 7, 1, 0, '0.00', '0.00', '20.00', 0, '2018-12-03 06:48:43', 0, 0, 3),
(8, 2, 2, 2, 7, 1, 0, '0.00', '0.00', '100.00', 0, '2018-12-03 06:50:19', 0, 0, 3),
(9, 1, 1, 1, 7, 1, 0, '0.00', '0.00', '40.00', 0, '2018-12-04 07:01:16', 0, 0, 3),
(10, 1, 1, 1, 7, 1, 0, '0.00', '0.00', '40.00', 0, '2018-12-04 07:10:16', 0, 0, 3),
(11, 1, 1, 1, 7, 1, 0, '0.00', '0.00', '140.00', 0, '2018-12-04 07:10:45', 0, 0, 3),
(12, 10, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-09 05:29:16', 0, 0, 2),
(13, 2, 0, 0, 7, 0, 0, '40.00', '4.00', '44.00', 1, '2018-12-17 05:21:45', 0, 0, 2),
(14, 2, 0, 0, 7, 0, 0, '100.00', '10.00', '110.00', 1, '2018-12-17 05:50:59', 0, 0, 2),
(15, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-17 06:55:21', 0, 0, 2),
(16, 2, 0, 0, 7, 0, 0, '19.90', '1.99', '21.89', 1, '2018-12-17 06:55:45', 0, 0, 2),
(17, 2, 0, 0, 7, 0, 0, '50.90', '5.09', '55.99', 1, '2018-12-17 10:25:53', 0, 0, 1),
(18, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-17 10:42:26', 0, 0, 1),
(19, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 02:42:51', 0, 0, 1),
(20, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 02:42:53', 0, 0, 1),
(21, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 02:46:29', 0, 0, 1),
(22, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 02:59:35', 0, 0, 1),
(23, 2, 0, 0, 7, 0, 0, '11.00', '1.10', '12.10', 1, '2018-12-19 03:16:39', 0, 0, 1),
(24, 2, 0, 0, 7, 0, 0, '79.60', '7.96', '87.56', 1, '2018-12-19 03:19:28', 0, 0, 1),
(25, 2, 0, 0, 7, 0, 0, '19.90', '1.99', '21.89', 1, '2018-12-19 03:37:18', 0, 0, 1),
(26, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 03:38:30', 0, 0, 1),
(27, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 03:39:48', 0, 0, 1),
(28, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 03:41:46', 0, 0, 1),
(29, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 03:43:51', 0, 0, 1),
(30, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 03:45:29', 0, 0, 1),
(31, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 03:45:31', 0, 0, 1),
(32, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-19 03:46:58', 0, 0, 1),
(33, 2, 0, 0, 7, 0, 0, '11.00', '1.10', '12.10', 1, '2018-12-19 03:47:24', 0, 0, 1),
(34, 2, 0, 0, 7, 0, 0, '20.00', '2.00', '22.00', 1, '2018-12-20 08:58:47', 0, 0, 1),
(35, 2, 0, 0, 7, 0, 0, '50.90', '5.09', '55.99', 1, '2018-12-20 09:42:10', 0, 0, 1),
(36, 2, 0, 0, 13, 0, 0, '104.00', '10.40', '114.40', 1, '2018-12-21 09:17:54', 0, 0, 1),
(37, 2, 0, 0, 13, 0, 0, '18.00', '1.80', '19.80', 1, '2018-12-21 09:21:34', 0, 0, 1),
(38, 2, 0, 0, 14, 0, 0, '19.80', '1.98', '21.78', 1, '2018-12-21 09:40:03', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `social_media_id` int(11) NOT NULL,
  `social_media` varchar(256) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`social_media_id`, `social_media`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'Facebook', '2018-12-03 10:51:54', 3, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_media_link`
--

CREATE TABLE `social_media_link` (
  `social_media_link_id` int(11) NOT NULL,
  `social_media_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `social_media_link` varchar(256) COLLATE utf8_bin NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `social_media_link`
--

INSERT INTO `social_media_link` (`social_media_link_id`, `social_media_id`, `store_id`, `social_media_link`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 1, 7, 'www.facebook.com/Roi-Spoon-Restaurant-Mount-Austin-408431062916804/', 0, '2018-12-04 00:31:04', 3, '2018-12-21 19:02:29', 3),
(2, 1, 8, 'ffs', 0, '2018-12-04 01:40:46', 3, '2018-12-04 09:41:59', 3),
(3, 1, 13, 'https://www.facebook.com/anmour/', 0, '2018-12-20 13:53:36', 3, '0000-00-00 00:00:00', 0),
(4, 1, 14, 'https://www.facebook.com/thealleymalaysia/', 0, '2018-12-21 09:15:21', 3, '0000-00-00 00:00:00', 0),
(5, 1, 15, 'https://www.facebook.com/sushizentomountaustinjb/', 0, '2018-12-21 09:52:41', 3, '0000-00-00 00:00:00', 0),
(6, 1, 17, 'https://www.facebook.com/teagardenmsia/', 0, '2018-12-21 10:29:47', 3, '0000-00-00 00:00:00', 0),
(7, 1, 18, 'https://www.facebook.com/thankumomaustin/', 0, '2018-12-21 11:32:35', 3, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `gourmet_type_id` int(11) NOT NULL,
  `pricing_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_bin NOT NULL,
  `banner` varchar(256) COLLATE utf8_bin NOT NULL,
  `service_charge` decimal(5,2) NOT NULL,
  `store` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` longtext COLLATE utf8_bin NOT NULL,
  `social_media_link` varchar(256) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `latitude` varchar(255) COLLATE utf8_bin NOT NULL,
  `longitude` varchar(255) COLLATE utf8_bin NOT NULL,
  `business_hour` varchar(255) COLLATE utf8_bin NOT NULL,
  `favourite` int(11) NOT NULL DEFAULT '0',
  `recommended` int(11) NOT NULL DEFAULT '0',
  `new` int(11) NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `gourmet_type_id`, `pricing_id`, `vendor_id`, `thumbnail`, `banner`, `service_charge`, `store`, `address`, `social_media_link`, `phone`, `latitude`, `longitude`, `business_hour`, `favourite`, `recommended`, `new`, `description`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 1, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n.jpg', '', '0.00', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 0, 0, '', '2018-11-09 10:36:32', 1, '0000-00-00 00:00:00', 0, 1),
(2, 2, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n1.jpg', '', '0.00', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 0, 0, '', '2018-11-09 10:36:47', 1, '0000-00-00 00:00:00', 0, 1),
(3, 3, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n2.jpg', '', '0.00', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 0, 0, '', '2018-11-09 10:37:14', 1, '0000-00-00 00:00:00', 0, 1),
(4, 4, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n3.jpg', '', '0.00', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 0, 0, '', '2018-11-09 10:39:56', 1, '0000-00-00 00:00:00', 0, 1),
(5, 5, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n4.jpg', '', '0.00', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 0, 0, '', '2018-11-09 10:42:28', 1, '0000-00-00 00:00:00', 0, 1),
(6, 6, 1, 1, '/images/store/3f729a04dadea20cd875852fef2c276e4.jpg', '', '0.00', 'Western Stall', 'xxx', 'xxx', '01111450665', '13.34424', '1.657544', '10.00 am', 1, 0, 0, '', '2018-11-09 10:51:24', 1, '0000-00-00 00:00:00', 0, 1),
(7, 1, 1, 3, '/images/store/27332477_409165236176720_1264135450474402744_n.jpg', '/images/store/27332477_409165236176720_1264135450474402744_n.jpg', '0.00', 'ROI Spoon Restaurant', '01-20, Menara Hartamas, Block B, Jalan Austin Heights 8/4, Taman Mount Austin', 'https://www.facebook.com/pages/category/Restaurant/Roi-Spoon-Restaurant-Mount-Austin-408431062916804/', '07-351 6783', '1.563548', '103.77780800000005', '11.30 am - 11.00pm', 1, 0, 0, '', '2018-11-23 03:19:37', 3, '0000-00-00 00:00:00', 3, 1),
(8, 3, 5, 2, '/images/store/home1.jpg', '', '0.00', 'teststore', 'teststore', '', '123142', '000', '22', '10.00 - 12.00', 1, 0, 0, '', '2018-11-28 09:07:54', 2, '0000-00-00 00:00:00', 3, 1),
(9, 4, 3, 1, '/images/store/store_20181219122013.jpg', '', '0.00', 'asdasd', 'asdas', '', '12312', '123', '123', 'asdas', 0, 0, 0, '', '2018-12-01 16:53:22', 3, '0000-00-00 00:00:00', 3, 1),
(10, 5, 2, 1, '/images/store/store_20181201200237.png', '', '0.00', 'asd', 'asd', '', '123', '123', '123', '10am - 12am', 1, 0, 0, '', '2018-12-01 19:02:37', 3, '0000-00-00 00:00:00', 3, 1),
(11, 6, 4, 1, '/images/store/store_20181219122024.jpg', '', '0.00', 'asd', 'asd', '', '123', '123', '123', '10am - 12am', 1, 0, 0, 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '2018-12-01 19:02:56', 3, '0000-00-00 00:00:00', 3, 1),
(12, 1, 1, 1, '/images/store/store_20181204021210.jpg', '', '0.00', 'qdedede', 'q', '', 'q', 'q', 'q', 'q', 1, 0, 0, '', '2018-12-04 07:12:10', 3, '0000-00-00 00:00:00', 3, 1),
(13, 3, 2, 1, '/images/store/store_20181220204112.jpg', '/images/store/download1.png', '10.00', 'Anmour Cafe', '34, Jalan Sutera Tanjung 8/3, Taman Sutera Utama, 81300 Johor Bahru, Johor', '', '07-5563420', '1.51631', '103.667666', '12pm-10pm', 1, 0, 0, 'Anmour Cafe is at Mount Austin in Johor Bahru. It is an average restaurant in Johor Bahru, Malaysia. It is an American style restaurant and has branches in Malaysia. It does not specialise in any specific kind of dish but the food is good and the price of dishes is affordable. Perhaps, that is why the place is usually crowded. The interior decoration is simple and minimalist. There are varieties of dishes available at the restaurant but the staffs ruin what could be a decent restaurant. Staffs tend to avoid guests and seem to pretend.', '2018-12-20 12:41:12', 3, '0000-00-00 00:00:00', 3, 0),
(14, 6, 3, 1, '/images/store/store_20181221160245.png', '/images/store_banner/attachment_blank.png', '0.00', 'The Alley', '49-GF, Jalan Austin Heights 8/1, Taman Austin Heights, Johor Bahru, Johor, Malaysia', '', '073648276', '1.557700', '103.775640', '11am - 1am', 1, 0, 0, 'The Alley is proud to offer tapioca pearls made by hand and with heart. The Alley welcomes you to watch as we prepare our tapioca from scratch: from the measuring, sifting, and mixing of ingredients to the formation of the pearl-shaped tapioca. Through this manual performance, we deliver soft, chewy tapioca available in various unique flavours. 用心職人手做鹿丸珍珠。 限定手作實演的自信，透明製作的過程。 從量粉、篩粉、調配，純手工製做鹿丸珍珠， 咬的是彈勁 吃的是獨特口味 健康安於心。', '2018-12-21 08:02:45', 3, '0000-00-00 00:00:00', 3, 0),
(15, 4, 4, 1, '/images/store/store_20181221174208.jpg', '/images/store_banner/1937115_753105094795001_3501644718943085664_n.jpg', '0.00', 'Sushi Zento', ' 1, 3 & 5,  Jalan Austin Heights 8/4, Taman Mount Austin, 81100 Johor Bahru, Johor\r\n', '', '07-363 0061', '1.557570', '103.774140', '11.30am - 10.15pm', 1, 0, 0, 'Sushi Zento Group of Companies was established since 2011, Our Companies operate Retail Japanese Restaurant - Sushi Zento.', '2018-12-21 09:42:09', 3, '0000-00-00 00:00:00', 3, 0),
(16, 4, 4, 1, '/images/store/store_20181221174223.jpg', '/images/store_banner/1937115_753105094795001_3501644718943085664_n1.jpg', '0.00', 'Sushi Zento', ' 1, 3 & 5,  Jalan Austin Heights 8/4, Taman Mount Austin, 81100 Johor Bahru, Johor\r\n', '', '07-363 0061', '1.557570', '103.774140', '11.30am - 10.15pm', 1, 0, 0, 'Sushi Zento Group of Companies was established since 2011, Our Companies operate Retail Japanese Restaurant - Sushi Zento.', '2018-12-21 09:42:23', 3, '0000-00-00 00:00:00', 0, 1),
(17, 1, 1, 1, '/images/store/store_20181221182901.jpg', '/images/store_banner/21191954_830420940450256_2754151282403398311_n.jpg', '0.00', 'Tea Garden', ' 26, Jalan Austin Heights 2/8, Taman Mount Austin, 81100 Johor Bahru, Johor', '', '07-350 3277', '1.560440', '103.777267', '7.30am–11.30pm', 1, 0, 0, 'We are a team of people passionate and devoted about traditional Nan Yang food and beverages, not only in preserving the origin of these delicacies, and also persevere in promoting traditional Nan Yang dishes to the public, and passing down this unique heritage to our future generations.', '2018-12-21 10:29:01', 3, '0000-00-00 00:00:00', 3, 0),
(18, 5, 2, 2, '/images/store/store_20181221193121.jpg', '/images/store/thankumom.jpg', '0.00', 'Thank U Mom', '15, Jalan Austin Heights 8/4, Taman Mount Austin, 81100 Johor Bahru, Johor, Malaysia', '', '07-364 7885', '1.562389', '103.778042', '12pm-12am', 1, 0, 0, 'An organic restaurant chain based in Korea. Founded in 2009, Thank U mom operates more than 80 domestic outlets and started to expand internationally. ', '2018-12-21 11:31:21', 3, '0000-00-00 00:00:00', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_category`
--

CREATE TABLE `store_category` (
  `store_category_id` int(11) NOT NULL,
  `store_category` varchar(256) COLLATE utf8_bin NOT NULL,
  `thumbnail` varchar(256) COLLATE utf8_bin NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `store_category`
--

INSERT INTO `store_category` (`store_category_id`, `store_category`, `thumbnail`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'spicy', '/images/store_category/store_category_20181201170816.png', 0, '2018-12-01 16:08:16', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_feature`
--

CREATE TABLE `store_feature` (
  `store_feature_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `store_feature`
--

INSERT INTO `store_feature` (`store_feature_id`, `store_id`, `feature_id`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(6, 12, 1, 0, '2018-12-04 07:20:22', 0, '0000-00-00 00:00:00', 0),
(9, 7, 1, 0, '2018-12-19 06:26:06', 0, '0000-00-00 00:00:00', 0),
(10, 7, 2, 0, '2018-12-19 06:26:06', 0, '0000-00-00 00:00:00', 0),
(11, 7, 3, 0, '2018-12-19 06:26:06', 0, '0000-00-00 00:00:00', 0),
(12, 7, 4, 0, '2018-12-19 06:26:06', 0, '0000-00-00 00:00:00', 0),
(21, 8, 1, 0, '2018-12-19 07:40:59', 0, '0000-00-00 00:00:00', 0),
(22, 8, 2, 0, '2018-12-19 07:40:59', 0, '0000-00-00 00:00:00', 0),
(23, 9, 1, 0, '2018-12-19 07:41:18', 0, '0000-00-00 00:00:00', 0),
(24, 9, 3, 0, '2018-12-19 07:41:18', 0, '0000-00-00 00:00:00', 0),
(25, 10, 2, 0, '2018-12-19 07:41:37', 0, '0000-00-00 00:00:00', 0),
(26, 10, 4, 0, '2018-12-19 07:41:37', 0, '0000-00-00 00:00:00', 0),
(27, 11, 1, 0, '2018-12-19 07:41:52', 0, '0000-00-00 00:00:00', 0),
(28, 11, 4, 0, '2018-12-19 07:41:52', 0, '0000-00-00 00:00:00', 0),
(47, 14, 1, 0, '2018-12-21 09:12:30', 0, '0000-00-00 00:00:00', 0),
(48, 14, 3, 0, '2018-12-21 09:12:30', 0, '0000-00-00 00:00:00', 0),
(49, 14, 4, 0, '2018-12-21 09:12:30', 0, '0000-00-00 00:00:00', 0),
(52, 16, 3, 0, '2018-12-21 09:42:23', 0, '0000-00-00 00:00:00', 0),
(53, 16, 4, 0, '2018-12-21 09:42:23', 0, '0000-00-00 00:00:00', 0),
(54, 15, 3, 0, '2018-12-21 09:51:50', 0, '0000-00-00 00:00:00', 0),
(55, 15, 4, 0, '2018-12-21 09:51:50', 0, '0000-00-00 00:00:00', 0),
(57, 17, 3, 0, '2018-12-21 10:30:00', 0, '0000-00-00 00:00:00', 0),
(60, 18, 1, 0, '2018-12-21 11:32:07', 0, '0000-00-00 00:00:00', 0),
(61, 18, 3, 0, '2018-12-21 11:32:07', 0, '0000-00-00 00:00:00', 0),
(68, 13, 1, 0, '2018-12-27 08:08:27', 0, '0000-00-00 00:00:00', 0),
(69, 13, 3, 0, '2018-12-27 08:08:27', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_gourmet_type`
--

CREATE TABLE `store_gourmet_type` (
  `store_gourmet_type_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `gourmet_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `store_image`
--

CREATE TABLE `store_image` (
  `store_image_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `store_image`
--

INSERT INTO `store_image` (`store_image_id`, `store_id`, `image`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 11, '/images/store_images/store_images_20181201200256.png', '2018-12-01 19:02:56', 0, '0000-00-00 00:00:00', 0, 0),
(4, 11, '/images/store_images/store_images_20181201203001.png', '2018-12-01 19:30:01', 0, '0000-00-00 00:00:00', 0, 0),
(5, 12, '/images/store_images/store_images_20181204021210.jpg', '2018-12-04 07:12:10', 0, '0000-00-00 00:00:00', 0, 0),
(11, 13, '/images/store_images/store_images_20181221131640.jpg', '2018-12-27 05:16:40', 0, '0000-00-00 00:00:00', 0, 0),
(12, 13, '/images/store_images/store_images_20181221131645.jpg', '2018-12-27 05:16:45', 0, '0000-00-00 00:00:00', 0, 0),
(13, 13, '/images/store_images/store_images_20181221134157.JPG', '2018-12-27 05:41:57', 0, '0000-00-00 00:00:00', 0, 0),
(14, 14, '/images/store_images/store_images_20181221165649.jpeg', '2018-12-24 08:56:49', 0, '0000-00-00 00:00:00', 0, 0),
(15, 14, '/images/store_images/store_images_20181221165649.jpg', '2018-12-24 08:56:49', 0, '0000-00-00 00:00:00', 0, 0),
(17, 16, '/images/store_images/store_images_20181221174223.jpg', '2018-12-21 09:42:23', 0, '0000-00-00 00:00:00', 0, 0),
(18, 15, '/images/store_images/store_images_20181221175746.jpg', '2018-12-21 09:57:46', 0, '0000-00-00 00:00:00', 0, 0),
(19, 15, '/images/store_images/store_images_20181221180014.jpg', '2018-12-21 10:00:14', 0, '0000-00-00 00:00:00', 0, 0),
(20, 15, '/images/store_images/store_images_201812211800141.jpg', '2018-12-21 10:00:14', 0, '0000-00-00 00:00:00', 0, 0),
(21, 15, '/images/store_images/store_images_201812211800142.jpg', '2018-12-21 10:00:14', 0, '0000-00-00 00:00:00', 0, 0),
(23, 17, '/images/store_images/store_images_20181221183202.png', '2018-12-21 10:32:02', 0, '0000-00-00 00:00:00', 0, 0),
(24, 17, '/images/store_images/store_images_20181221183443.png', '2018-12-21 10:34:43', 0, '0000-00-00 00:00:00', 0, 0),
(25, 17, '/images/store_images/store_images_201812211834431.png', '2018-12-21 10:34:43', 0, '0000-00-00 00:00:00', 0, 0),
(26, 18, '/images/store_images/store_images_20181221193121.jpg', '2018-12-21 11:31:21', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_no`
--

CREATE TABLE `table_no` (
  `table_no_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `table_no` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `table_no`
--

INSERT INTO `table_no` (`table_no_id`, `store_id`, `table_no`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 0, 55, '2018-11-25 05:43:38', 3, '2018-11-25 22:48:33', 3, 0),
(2, 13, 1, '2018-12-27 08:33:35', 3, '0000-00-00 00:00:00', 0, 0),
(4, 13, 2, '2018-12-27 08:36:50', 3, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` int(8) NOT NULL,
  `image` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `email` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  `token` varchar(256) DEFAULT NULL,
  `login_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `user`, `username`, `password`, `salt`, `image`, `name`, `gender_id`, `dob`, `email`, `contact`, `token`, `login_time`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 3, 0, 'vernuser', '173ffbf5e2cce197a62ef4f5eae6db7e17f5c0cc65d10e7fcc5b72d779671f70d43db9f457fe7c14c2b31a7b68ba8026a2491c9f76f3ed2fcb28b7d4f7b84cfd', 521308, '/images/user/26612967874_849e90a848_h.jpg', 'zzz', 0, '1996-04-28', 'verndarrien0428@gmail.com', '0123456789', NULL, '0000-00-00 00:00:00', 1, '2018-11-09 11:00:08', 0, '0000-00-00 00:00:00', 0),
(2, 3, 0, 'testing', '2b9e8c83c606894c8a8352be227d2aaba0b45340fd9e9b6977f3215ad9e625a28f2dde544d22cd9ea423a188f5d8cbce830f7dea2145f3905dab3620de273d33', 992731, '/images/user/user_20181128100152.jpg', 'testing user', 2, '2018-11-20', 'daniellim314@gmail.com', '000', 'dc0009610ff6cb47d3f733aece2b8012', '2018-12-27 08:24:05', 0, '2018-11-28 09:01:52', 0, '0000-00-00 00:00:00', 0),
(3, 3, 0, 'emmanual@cysoft.co', '53e9594a1c9d37b372e31ebd930c4f978f378dff298801975826b1c7b65ec102ef7216eeb2ec297fa831ab476230a4d0e21b62a907a83c5e079f6aaf116bfd72', 632314, '', 'emmanual@cysoft.co', 0, '0000-00-00', 'emmanual@cysoft.co', '0149151084', 'f4b83c7dbd8d404954451055d5615493', '2018-12-14 06:41:05', 1, '2018-12-01 15:27:46', 0, '0000-00-00 00:00:00', 0),
(4, 3, 0, 'test@test.com', '641bba7ee3053fc1fe5f8f33bebf7f7463d16ed53409da0206208ad32108efef3ad574ef95a1d43b8a4c8b6b99d82a0855a61a34e7f53dca4e29ca029919188d', 303802, '', 'test@test.com', 0, '0000-00-00', 'test@test.com', '0198765432', '98a43c4ce89d0e79f8f457648f59dcb3', '2018-12-02 03:52:44', 1, '2018-12-02 20:52:44', 0, '0000-00-00 00:00:00', 0),
(5, 3, 0, '123@123,com', 'c74d7e6ea8a575045be81eff817d6d226687f5fd23b3d6d6721c3f781f3a7ddba05e658c3da37b6020d0daf819854aecc0b50bfcca0c35843d515b7ecda662af', 765076, '', '123@123,com', 0, '0000-00-00', '123@123,com', '123123', 'c7d719f6dad34fb4113e2365a17e67b8', '2018-12-03 12:53:29', 1, '2018-12-02 21:36:45', 0, '0000-00-00 00:00:00', 0),
(6, 3, 0, 'cy', '57ec8da93219dff9dd86b0dfe81652fff3ee473b495d7535693e24053dbb7ae6e74f7caf807d0a9b1f5f04310a46370ac6bbc21f7f7d647678cfdec76f90728d', 826209, '', 'cy', 0, '0000-00-00', 'cy', ' 60167780275', '0a66bc0795199a1626d451d18c839a69', '2018-12-04 01:39:14', 1, '2018-12-04 02:19:06', 0, '0000-00-00 00:00:00', 0),
(7, 3, 0, 'Asd,', '3b59d1113a82d7b028d61c139c5934dcee1fc5fd0267ef33ab36dd005b983df5ed8d5da51259ea088681cc08066e0c7623fa540094c91bc1d2abd40c80decb38', 749741, '', 'Asd,', 0, '0000-00-00', 'Asd,', '123123123', '84eb354c9c9e5e713a881c4af8d306b8', '2018-12-04 02:16:52', 1, '2018-12-04 05:58:52', 0, '0000-00-00 00:00:00', 0),
(8, 3, 0, 'Asd@asd.com', 'e266a3daa18a8db32c92273f739c4556fc6a65df7e0d22ac5f6903b45f481547a4832a00757939f2a1a26481d5dbedd673d1fb8b64e1f00d518ca521b81cca67', 385483, '', 'Asd@asd.com', 0, '0000-00-00', 'Asd@asd.com', '1234', '36aad93e392d3e7162891442eb52756c', '2018-12-04 02:18:55', 1, '2018-12-04 07:17:42', 0, '0000-00-00 00:00:00', 0),
(9, 3, 0, 'Aaa@aaa.com', '097c121013a844da37e181ee7a712ee38d2c700484f492ae7a2bff1ce9e5fd002877e29b0ab1f639dbb24b9b4afce3d6289d842f04da24180db6e6636227a6ca', 119203, '', 'Aaa@aaa.com', 0, '0000-00-00', 'Aaa@aaa.com', '12345', 'ae7c67c6f90420f2145a363fb9e2e2f1', '2018-12-04 02:20:08', 1, '2018-12-04 07:19:39', 0, '0000-00-00 00:00:00', 0),
(10, 3, 0, '123@123.com', '915d251e7a2d42b1d40d8494637fd9b2e6ee77976f871438a97e02678de406da99b2175676c3aaa2dbee97f158f5d70476f77440e42f84e0c79551e1705654cb', 587672, '', '123@123.com', 0, '0000-00-00', '123@123.com', '123456', '1178e1de2536fd6720151f63cedb5dcf', '2018-12-09 12:28:40', 1, '2018-12-04 07:22:18', 0, '0000-00-00 00:00:00', 0),
(11, 3, 0, 'Qwert@asd.con', '69b8d8f0a06df05dd971ac694d7a53a015d2afb62f89436103612790d71ab623f0e044428120ce88fda4d7196016f4c4375c1b27024c025bb601d0b93bee927d', 144808, '', 'Qwert@asd.con', 0, '0000-00-00', 'Qwert@asd.con', '12345678', 'f4a006d5b75839c420cd43cb833c8d77', '2018-12-12 10:24:53', 1, '2018-12-04 07:32:42', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_coupon`
--

CREATE TABLE `user_coupon` (
  `user_coupon_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `used` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_coupon`
--

INSERT INTO `user_coupon` (`user_coupon_id`, `user_id`, `coupon_id`, `used`, `deleted`) VALUES
(1, 2, 1, 0, 0),
(2, 2, 1, 0, 0),
(3, 2, 2, 1, 0),
(4, 2, 2, 0, 0),
(5, 2, 3, 0, 0),
(6, 2, 3, 0, 0),
(7, 1, 4, 0, 0),
(8, 2, 4, 0, 0),
(9, 3, 4, 0, 0),
(10, 4, 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `salt` int(8) NOT NULL,
  `image` varchar(256) COLLATE utf8_bin NOT NULL,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `email` varchar(256) COLLATE utf8_bin NOT NULL,
  `contact` varchar(256) COLLATE utf8_bin NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `role_id`, `username`, `password`, `salt`, `image`, `name`, `email`, `contact`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 4, 'vernd', 'ecc4e67ada7b413b4b9c70acf3b980f7fcfd271a86a393212f87429e0aacfdc48f07c203f96486e26ae7f9f350f17bff6636c9ac73c3b1b0bd5bd10faeda96a9', 274254, '/images/vendor/27332477_409165236176720_1264135450474402744_n.jpg', 'Darrien Goh Han Vern', 'verndarrien0428@gmail.com', '01111450665', 0, '2018-11-09 10:26:24', 0, '0000-00-00 00:00:00', 0),
(2, 4, 'testvendor', 'a7f9a13121d3dc5ed40a36b27719b3d920fd794c0d73c5254bfee8f406d898bec8499c9afc54d11e2984ce44f3bc048c0b623e192b405688168f7f75a3ca8dbc', 790530, '/images/vendor/unnamed.jpg', 'testvendor', 'daniellim314@gmail.com', '000', 0, '2018-11-28 09:04:41', 0, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`billing_address_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `card_type`
--
ALTER TABLE `card_type`
  ADD PRIMARY KEY (`card_type_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `customize`
--
ALTER TABLE `customize`
  ADD PRIMARY KEY (`customize_id`);

--
-- Indexes for table `customize_dressing`
--
ALTER TABLE `customize_dressing`
  ADD PRIMARY KEY (`customize_dressing_id`),
  ADD KEY `customize_id` (`customize_id`),
  ADD KEY `dressing_id` (`dressing_id`);

--
-- Indexes for table `dressing`
--
ALTER TABLE `dressing`
  ADD PRIMARY KEY (`dressing_id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `food_category_id` (`food_category_id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`food_category_id`);

--
-- Indexes for table `food_combo`
--
ALTER TABLE `food_combo`
  ADD PRIMARY KEY (`food_combo_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `food_category_id` (`food_category_id`);

--
-- Indexes for table `food_combo_customize`
--
ALTER TABLE `food_combo_customize`
  ADD PRIMARY KEY (`food_combo_customize_id`),
  ADD KEY `food_id` (`food_combo_id`),
  ADD KEY `customize_id` (`customize_id`);

--
-- Indexes for table `food_combo_food`
--
ALTER TABLE `food_combo_food`
  ADD PRIMARY KEY (`food_combo_food_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `food_combo_id` (`food_combo_id`);

--
-- Indexes for table `food_customize`
--
ALTER TABLE `food_customize`
  ADD PRIMARY KEY (`food_customize_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `customize_id` (`customize_id`);

--
-- Indexes for table `food_ingredient`
--
ALTER TABLE `food_ingredient`
  ADD PRIMARY KEY (`food_ingredient_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Indexes for table `food_model`
--
ALTER TABLE `food_model`
  ADD PRIMARY KEY (`food_model_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `gourmet_type`
--
ALTER TABLE `gourmet_type`
  ADD PRIMARY KEY (`gourmet_type_id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_food`
--
ALTER TABLE `order_food`
  ADD PRIMARY KEY (`order_food_id`),
  ADD KEY `user_order_id` (`sales_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `customize_id` (`customize_id`),
  ADD KEY `dressing_id` (`dressing_id`);

--
-- Indexes for table `order_food_dressing`
--
ALTER TABLE `order_food_dressing`
  ADD PRIMARY KEY (`order_food_dressing_id`),
  ADD KEY `dressing_id` (`dressing_id`),
  ADD KEY `order_food_id` (`order_food_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_access`
--
ALTER TABLE `role_access`
  ADD PRIMARY KEY (`role_access_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `billing_address_id` (`billing_address_id`),
  ADD KEY `payment_id` (`card_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`social_media_id`);

--
-- Indexes for table `social_media_link`
--
ALTER TABLE `social_media_link`
  ADD PRIMARY KEY (`social_media_link_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `gourmet_type_id` (`gourmet_type_id`),
  ADD KEY `pricing_id` (`pricing_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `store_category`
--
ALTER TABLE `store_category`
  ADD PRIMARY KEY (`store_category_id`);

--
-- Indexes for table `store_feature`
--
ALTER TABLE `store_feature`
  ADD PRIMARY KEY (`store_feature_id`);

--
-- Indexes for table `store_gourmet_type`
--
ALTER TABLE `store_gourmet_type`
  ADD PRIMARY KEY (`store_gourmet_type_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `gourmet_type_id` (`gourmet_type_id`);

--
-- Indexes for table `store_image`
--
ALTER TABLE `store_image`
  ADD PRIMARY KEY (`store_image_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `table_no`
--
ALTER TABLE `table_no`
  ADD PRIMARY KEY (`table_no_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_coupon`
--
ALTER TABLE `user_coupon`
  ADD PRIMARY KEY (`user_coupon_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `billing_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `card_type`
--
ALTER TABLE `card_type`
  MODIFY `card_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customize`
--
ALTER TABLE `customize`
  MODIFY `customize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customize_dressing`
--
ALTER TABLE `customize_dressing`
  MODIFY `customize_dressing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dressing`
--
ALTER TABLE `dressing`
  MODIFY `dressing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `food_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food_combo`
--
ALTER TABLE `food_combo`
  MODIFY `food_combo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_combo_customize`
--
ALTER TABLE `food_combo_customize`
  MODIFY `food_combo_customize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_combo_food`
--
ALTER TABLE `food_combo_food`
  MODIFY `food_combo_food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `food_customize`
--
ALTER TABLE `food_customize`
  MODIFY `food_customize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `food_ingredient`
--
ALTER TABLE `food_ingredient`
  MODIFY `food_ingredient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_model`
--
ALTER TABLE `food_model`
  MODIFY `food_model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gourmet_type`
--
ALTER TABLE `gourmet_type`
  MODIFY `gourmet_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_food`
--
ALTER TABLE `order_food`
  MODIFY `order_food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `order_food_dressing`
--
ALTER TABLE `order_food_dressing`
  MODIFY `order_food_dressing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `role_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `social_media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media_link`
--
ALTER TABLE `social_media_link`
  MODIFY `social_media_link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `store_category`
--
ALTER TABLE `store_category`
  MODIFY `store_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_feature`
--
ALTER TABLE `store_feature`
  MODIFY `store_feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `store_gourmet_type`
--
ALTER TABLE `store_gourmet_type`
  MODIFY `store_gourmet_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_image`
--
ALTER TABLE `store_image`
  MODIFY `store_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `table_no`
--
ALTER TABLE `table_no`
  MODIFY `table_no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_coupon`
--
ALTER TABLE `user_coupon`
  MODIFY `user_coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customize_dressing`
--
ALTER TABLE `customize_dressing`
  ADD CONSTRAINT `customize_dressing_ibfk_1` FOREIGN KEY (`customize_id`) REFERENCES `customize` (`customize_id`),
  ADD CONSTRAINT `customize_dressing_ibfk_2` FOREIGN KEY (`dressing_id`) REFERENCES `dressing` (`dressing_id`);

--
-- Constraints for table `food_combo_food`
--
ALTER TABLE `food_combo_food`
  ADD CONSTRAINT `food_combo_food_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `food_combo_food_ibfk_3` FOREIGN KEY (`food_combo_id`) REFERENCES `food_combo` (`food_combo_id`);

--
-- Constraints for table `food_customize`
--
ALTER TABLE `food_customize`
  ADD CONSTRAINT `food_customize_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `food_customize_ibfk_2` FOREIGN KEY (`customize_id`) REFERENCES `customize` (`customize_id`);

--
-- Constraints for table `order_food`
--
ALTER TABLE `order_food`
  ADD CONSTRAINT `order_food_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`),
  ADD CONSTRAINT `order_food_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`);

--
-- Constraints for table `order_food_dressing`
--
ALTER TABLE `order_food_dressing`
  ADD CONSTRAINT `order_food_dressing_ibfk_1` FOREIGN KEY (`dressing_id`) REFERENCES `dressing` (`dressing_id`),
  ADD CONSTRAINT `order_food_dressing_ibfk_2` FOREIGN KEY (`order_food_id`) REFERENCES `order_food` (`order_food_id`);

--
-- Constraints for table `role_access`
--
ALTER TABLE `role_access`
  ADD CONSTRAINT `role_access_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `role_access_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
