-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 11:10 AM
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
(3, 2, '3', '3', '3', '3', '3', '2018-11-28 10:09:03', 3, '2018-11-28 06:10:11', 3, 0);

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
(2, 2, 2, 121314123, 'testcard12', 222, 22, 22, '222', '222', '22', '222', '222', 'daniellim314@gmail.com', '2018-11-28 09:27:20', 3, '2018-11-28 05:38:35', 3, 0),
(3, 2, 1, 987569900, 'Maybank', 123, 1, 11, '1', '1', '1', '1', '1', 'card2@card2', '2018-11-28 09:39:05', 3, '0000-00-00 00:00:00', 0, 0);

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
  `user_id` int(11) NOT NULL,
  `coupon` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `valid_date` date NOT NULL,
  `partner_coupon` int(11) NOT NULL DEFAULT '0',
  `used` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `coupon` (`coupon_id`, `store_id`, `user_id`, `coupon`, `description`, `valid_date`, `partner_coupon`, `used`, `number`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 1, 0, 'Discount Voucher', '10% Discount for All Beverage 10% Discount for All Beverage 10% Discount for All Beverage 10% Discount for All Beverage 10% Discount for All Beverage 10% Discount for All Beverage 10% Discount for All Beverage 10% Discount for All Beverage 10% Discount fo', '2018-11-18', 0, 0, 0, '2018-11-09 10:56:49', 1, '2018-11-21 04:47:53', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_category_id`, `store_id`, `food`, `description`, `image`, `price`, `discounted_price`, `discount`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 0, 6, 'Meal', 'DeliciousDeliciousDeliciousDeliciousDelicious', '/images/food/crisis-escalation-transparent1.png', '50.00', '30.00', 10, '2018-11-09 10:55:24', 1, '2018-11-21 05:32:32', 1, 1),
(2, 0, 1, 'xxx', 'xxx', '', '120.00', '20.00', 10, '2018-11-21 08:49:59', 3, '0000-00-00 00:00:00', 0, 1),
(3, 0, 1, 'asdxxxx', 'asd', '/images/food/car_accessories_improvedvisibility.jpg', '12.00', '2.00', 10, '2018-11-22 02:22:07', 3, '2018-11-23 08:56:16', 3, 1),
(4, 2, 1, 'a', 'a', '/images/store/car_accessories_31bandeq5.jpg', '999.99', '120.00', 90, '2018-11-23 00:28:13', 3, '0000-00-00 00:00:00', 0, 1),
(5, 2, 1, 'ss', 'ss', '/images/store/crisis-escalation-transparent1.png', '999.99', '12.00', 99, '2018-11-23 00:28:58', 3, '0000-00-00 00:00:00', 0, 1),
(6, 0, 1, 'ccxxxxx', 'cc', '/images/food/12-24.jpg', '999.99', '12.00', 99, '2018-11-23 00:31:36', 3, '2018-11-23 09:01:07', 3, 1),
(7, 2, 1, 'vv', 'vv', '', '999.99', '32.00', 99, '2018-11-23 00:35:23', 3, '0000-00-00 00:00:00', 0, 1),
(8, 2, 1, 'dd', 'dd', '', '999.99', '434.00', 87, '2018-11-23 00:36:11', 3, '0000-00-00 00:00:00', 0, 1),
(9, 2, 1, 'ggg', 'ggg', '/images/store/car_accessories_abundant_connectivity.jpg', '777.00', '8.00', 99, '2018-11-23 00:39:13', 3, '0000-00-00 00:00:00', 0, 1),
(10, 2, 1, 'zzzyyy', 'yyyzz', '/images/food/car_accessories_largesuismart.jpg', '999.99', '566.00', 99, '2018-11-23 00:40:41', 3, '2018-11-23 09:01:38', 3, 1),
(11, 0, 7, 'Burger Set', 'American Style Burger', '/images/food/1468282393529.jpg', '20.00', '18.90', 6, '2018-11-23 03:27:40', 3, '0000-00-00 00:00:00', 0, 0),
(12, 4, 7, 'xxx', 'xxx', '/images/store/27332477_409165236176720_1264135450474402744_n1.jpg', '19.90', '15.90', 20, '2018-11-26 03:40:00', 1, '0000-00-00 00:00:00', 0, 0),
(13, 5, 8, 'testfood', 'testfood', '/images/store/delivery.png', '110.00', '50.00', 55, '2018-11-28 09:10:48', 2, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `food_category_id` int(11) NOT NULL,
  `food_category` varchar(256) COLLATE utf8_bin NOT NULL,
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

INSERT INTO `food_category` (`food_category_id`, `food_category`, `parent_id`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'asd', 0, 1, '2018-11-22 01:48:53', 0, '0000-00-00 00:00:00', 0),
(2, 'asdx', 0, 1, '2018-11-22 01:50:38', 0, '0000-00-00 00:00:00', 0),
(3, 'ooo', 2, 1, '2018-11-23 01:44:11', 0, '0000-00-00 00:00:00', 0),
(4, 'Spicy', 0, 0, '2018-11-23 03:31:24', 0, '0000-00-00 00:00:00', 0),
(5, 'Noodles', 4, 0, '2018-11-23 03:31:35', 0, '0000-00-00 00:00:00', 0),
(6, 'asd', 4, 0, '2018-11-28 09:09:20', 0, '0000-00-00 00:00:00', 0);

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gourmet_type`
--

INSERT INTO `gourmet_type` (`gourmet_type_id`, `gourmet_type`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'Western', '2018-11-09 10:28:41', 1, '0000-00-00 00:00:00', 0, 0),
(2, 'zasd', '2018-11-23 02:06:16', 3, '2018-11-23 10:06:24', 3, 1),
(3, 'xxxzx', '2018-11-25 05:01:24', 3, '2018-11-25 13:03:08', 3, 0);

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
(25, 'Table_position', 'table_position', 0, '2018-11-22 00:39:20', 0, '0000-00-00 00:00:00', 0),
(26, 'Food Category', 'food_category', 0, '2018-11-22 01:44:43', 0, '0000-00-00 00:00:00', 0),
(27, 'Food Model', 'food_models', 0, '2018-11-22 02:50:04', 0, '0000-00-00 00:00:00', 0);

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`order_food_id`, `sales_id`, `food_id`, `created_date`, `created_by`, `deleted`) VALUES
(1, 3, 1, '2018-11-09 11:28:44', 0, 0),
(2, 4, 11, '2018-11-23 08:25:24', 0, 0);

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
(1, 'Above RM 50 got Discount', '2018-11-09 10:34:40', 3, '0000-00-00 00:00:00', 0, 0),
(2, 'yyy', '2018-11-23 02:43:55', 3, '2018-11-23 10:44:03', 3, 1),
(3, 'xxxc', '2018-11-25 04:56:13', 3, '2018-11-25 12:57:04', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `type` enum('USER','ADMIN','CLIENT','VENDOR') NOT NULL,
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
(1, 'ADMIN', 'superadmin', 1, '2018-10-03 08:49:04', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'ADMIN', 'admin', 2, '2018-10-03 08:49:26', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'USER', 'user', 1, '2018-10-31 08:45:37', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'VENDOR', 'vendor', 1, '2018-11-09 03:16:38', 0, '0000-00-00 00:00:00', 0, 0);

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
(82, 4, 27, 1, 1, 1, 1, 0, '2018-11-26 04:25:44', 0, '0000-00-00 00:00:00', 0);

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
  `take_away` int(11) NOT NULL DEFAULT '0',
  `sub_total` decimal(5,2) NOT NULL,
  `service_change` decimal(5,2) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `user_id`, `billing_address_id`, `card_id`, `store_id`, `take_away`, `sub_total`, `service_change`, `total`, `status`, `created_date`, `created_by`, `deleted`) VALUES
(1, 1, 0, 0, 0, 0, '100.00', '4.00', '104.00', 0, '2018-11-09 11:16:18', 3, 1),
(2, 1, 0, 0, 0, 1, '200.00', '14.00', '214.00', 0, '2018-11-09 11:17:44', 3, 1),
(3, 1, 1, 1, 6, 0, '0.00', '0.00', '50.00', 0, '2018-11-09 11:28:44', 0, 0),
(4, 1, 1, 1, 7, 1, '0.00', '0.00', '20.00', 0, '2018-11-23 08:25:24', 0, 0);

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
  `store` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `social_media_link` varchar(256) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `latitude` varchar(255) COLLATE utf8_bin NOT NULL,
  `longitude` varchar(255) COLLATE utf8_bin NOT NULL,
  `business_hour` varchar(255) COLLATE utf8_bin NOT NULL,
  `take_away` int(11) NOT NULL DEFAULT '0',
  `dine_in` int(11) NOT NULL DEFAULT '0',
  `halal` int(11) NOT NULL DEFAULT '0',
  `vegetarian` int(11) NOT NULL DEFAULT '0',
  `favourite` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `gourmet_type_id`, `pricing_id`, `vendor_id`, `thumbnail`, `store`, `address`, `social_media_link`, `phone`, `latitude`, `longitude`, `business_hour`, `take_away`, `dine_in`, `halal`, `vegetarian`, `favourite`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 1, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n.jpg', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 1, 1, 1, 1, '2018-11-09 10:36:32', 1, '0000-00-00 00:00:00', 0, 1),
(2, 1, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n1.jpg', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 1, 1, 1, 1, '2018-11-09 10:36:47', 1, '0000-00-00 00:00:00', 0, 1),
(3, 1, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n2.jpg', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 1, 1, 1, 1, '2018-11-09 10:37:14', 1, '0000-00-00 00:00:00', 0, 1),
(4, 1, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n3.jpg', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 1, 1, 1, 1, '2018-11-09 10:39:56', 1, '0000-00-00 00:00:00', 0, 1),
(5, 1, 1, 0, '/images/store/15101639_340838102960574_2760845376331186176_n4.jpg', 'Noodles\'s Stall', 'HOUGANG STREET 21 Blk 202 Hougang Street 21, #01-00, Singapore 530202', 'www.instagram.com', '01111450665', '13.465343', '14.346363', '10.00 am', 1, 1, 1, 1, 1, '2018-11-09 10:42:28', 1, '0000-00-00 00:00:00', 0, 1),
(6, 1, 1, 1, '/images/store/3f729a04dadea20cd875852fef2c276e4.jpg', 'Western Stall', 'xxx', 'xxx', '01111450665', '13.34424', '1.657544', '10.00 am', 1, 1, 1, 1, 1, '2018-11-09 10:51:24', 1, '0000-00-00 00:00:00', 0, 1),
(7, 1, 1, 3, '/images/store/27332477_409165236176720_1264135450474402744_n.jpg', 'ROI Spoon Restaurant', '01-20, Menara Hartamas, Block B, Jalan Austin Heights 8/4, Taman Mount Austin', 'https://www.facebook.com/pages/category/Restaurant/Roi-Spoon-Restaurant-Mount-Austin-408431062916804/', '07-351 6783', '1.563548', '103.77780800000005', '11.30 am - 11.00pm', 1, 1, 1, 1, 1, '2018-11-23 03:19:37', 3, '0000-00-00 00:00:00', 0, 0),
(8, 1, 1, 2, '/images/store/home1.jpg', 'teststore', 'teststore', '', '123142', '000', '22', '10.00 - 12.00', 0, 0, 0, 0, 1, '2018-11-28 09:07:54', 2, '0000-00-00 00:00:00', 0, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `table_position`
--

CREATE TABLE `table_position` (
  `table_position_id` int(11) NOT NULL,
  `table_position` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `table_position`
--

INSERT INTO `table_position` (`table_position_id`, `table_position`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 55, '2018-11-25 05:43:38', 3, '2018-11-25 22:48:33', 3, 0);

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
  `deleted` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `user`, `username`, `password`, `salt`, `image`, `name`, `gender_id`, `dob`, `email`, `contact`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 3, 0, 'vernuser', '173ffbf5e2cce197a62ef4f5eae6db7e17f5c0cc65d10e7fcc5b72d779671f70d43db9f457fe7c14c2b31a7b68ba8026a2491c9f76f3ed2fcb28b7d4f7b84cfd', 521308, '/images/user/26612967874_849e90a848_h.jpg', 'zzz', 0, '1996-04-28', 'verndarrien0428@gmail.com', '0123456789', 0, '2018-11-09 11:00:08', 0, '0000-00-00 00:00:00', 0),
(2, 3, 0, 'testing', '2b9e8c83c606894c8a8352be227d2aaba0b45340fd9e9b6977f3215ad9e625a28f2dde544d22cd9ea423a188f5d8cbce830f7dea2145f3905dab3620de273d33', 992731, '/images/user/user_20181128100152.jpg', 'testing user', 2, '2018-11-20', 'daniellim314@gmail.com', '000', 0, '2018-11-28 09:01:52', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `vendor` varchar(256) COLLATE utf8_bin NOT NULL,
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

INSERT INTO `vendor` (`vendor_id`, `role_id`, `vendor`, `username`, `password`, `salt`, `image`, `name`, `email`, `contact`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 4, '', 'vern', 'ecc4e67ada7b413b4b9c70acf3b980f7fcfd271a86a393212f87429e0aacfdc48f07c203f96486e26ae7f9f350f17bff6636c9ac73c3b1b0bd5bd10faeda96a9', 274254, '/images/vendor/82812-200.png', 'Darrien Goh Han Vern', 'verndarrien0428@gmail.com', '01111450665', 0, '2018-11-09 10:26:24', 0, '0000-00-00 00:00:00', 0),
(2, 4, '', 'testvendor', 'a7f9a13121d3dc5ed40a36b27719b3d920fd794c0d73c5254bfee8f406d898bec8499c9afc54d11e2984ce44f3bc048c0b623e192b405688168f7f75a3ca8dbc', 790530, '/images/vendor/unnamed.jpg', 'testvendor', 'daniellim314@gmail.com', '000', 0, '2018-11-28 09:04:41', 0, '0000-00-00 00:00:00', 0);

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
  ADD KEY `store_id` (`store_id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `food_id` (`food_id`);

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
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `gourmet_type_id` (`gourmet_type_id`),
  ADD KEY `pricing_id` (`pricing_id`),
  ADD KEY `vendor_id` (`vendor_id`);

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
-- Indexes for table `table_position`
--
ALTER TABLE `table_position`
  ADD PRIMARY KEY (`table_position_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

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
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `billing_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `card_type`
--
ALTER TABLE `card_type`
  MODIFY `card_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `food_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `gourmet_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_food`
--
ALTER TABLE `order_food`
  MODIFY `order_food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `role_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store_gourmet_type`
--
ALTER TABLE `store_gourmet_type`
  MODIFY `store_gourmet_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_image`
--
ALTER TABLE `store_image`
  MODIFY `store_image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_position`
--
ALTER TABLE `table_position`
  MODIFY `table_position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
