-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 11:21 AM
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
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `role_id` int(11) NOT NULL,
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

INSERT INTO `admin` (`admin_id`, `username`, `password`, `salt`, `role_id`, `name`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(3, 'emmwee', 'f8fe9650547bca0182a8ff6751d7e458c79276307522ca6db163dfe09133612d99d759e4ece5c052e7f0cdacdf7173819ba4b69241f8ceb4ea69ea86e07caf89', 459898, 1, 'Emmanual', 0, '2018-10-03 08:47:43', 0, '0000-00-00 00:00:00', 0),
(4, 'admin', '67511486a8c644373951db14ae725de651a42f7dadbe1d35b5a9a66409ef9ec082de13bfd7953ad5d89583ec09bc88913ebf9e4e4f06c8b4aafc88e227e62487', 457232, 1, 'admin', 0, '2018-10-03 08:47:43', 0, '0000-00-00 00:00:00', 0),
(5, 'asd', 'ca1e6841e2998e0cc38b3125f1452e763e7f93319fd0bb01598131521f64a8b4320957c3071ead62baf226596cd1cfcb8997d7b65b5d9ffe4c6c46d424caefe0', 592790, 1, 'asd', 0, '2018-10-03 08:47:43', 0, '0000-00-00 00:00:00', 0),
(6, 'test', '0eb8c838309510bbe0ef9bdabc8e9f088e72fcc56605f8719b0482650998cb00cc00d5d784b185e18747b85aadc6cc8373720f1d37a277220a67b203b92aa73d', 771074, 2, 'test', 0, '2018-10-03 08:47:43', 0, '0000-00-00 00:00:00', 0);

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `discounted_price` decimal(5,2) NOT NULL,
  `discount` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
-- Table structure for table `gourmet_type`
--

CREATE TABLE `gourmet_type` (
  `gourmet_type_id` int(11) NOT NULL,
  `gourmet_type_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(22, 'Payment', 'payment', 0, '2018-10-31 14:14:27', 0, '0000-00-00 00:00:00', 0),
(23, 'User_order', 'user_order', 0, '2018-11-01 03:53:56', 0, '0000-00-00 00:00:00', 0),
(24, 'Vendor', 'vendor', 0, '2018-11-09 03:50:48', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
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
  `user_order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_no` int(20) NOT NULL,
  `bank` varchar(256) COLLATE utf8_bin NOT NULL,
  `card_type` varchar(256) COLLATE utf8_bin NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int(11) NOT NULL,
  `pricing_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(73, 4, 4, 0, 1, 0, 0, 0, '2018-11-09 10:00:23', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
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
  `deleted` int(11) NOT NULL DEFAULT '0',
  `gourmet_type_id` int(11) NOT NULL,
  `pricing_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` int(8) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `email` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `salt` int(8) NOT NULL,
  `role_id` int(11) NOT NULL,
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
  ADD PRIMARY KEY (`billing_address_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_ingredient`
--
ALTER TABLE `food_ingredient`
  ADD PRIMARY KEY (`food_ingredient_id`);

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
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `order_food`
--
ALTER TABLE `order_food`
  ADD PRIMARY KEY (`order_food_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

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
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `store_gourmet_type`
--
ALTER TABLE `store_gourmet_type`
  ADD PRIMARY KEY (`store_gourmet_type_id`);

--
-- Indexes for table `store_image`
--
ALTER TABLE `store_image`
  ADD PRIMARY KEY (`store_image_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`user_order_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

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
  MODIFY `billing_address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_ingredient`
--
ALTER TABLE `food_ingredient`
  MODIFY `food_ingredient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gourmet_type`
--
ALTER TABLE `gourmet_type`
  MODIFY `gourmet_type_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_food`
--
ALTER TABLE `order_food`
  MODIFY `order_food_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `role_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `user_order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
