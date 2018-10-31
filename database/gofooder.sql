-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2018 at 01:55 AM
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

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`billing_address_id`, `user_id`, `address1`, `address2`, `state`, `postcode`, `country`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 0, 'qwer', 'qwe', 'qwe', '81800', 'qwe', '2018-10-30 08:08:42', 3, '2018-10-30 04:11:40', 3, 0);

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
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `store_id`, `user_id`, `coupon`, `description`, `valid_date`, `partner_coupon`, `used`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 2, 1, 'asd', 'asd', '2018-10-28', 1, 1, '2018-10-28 08:00:14', 1, '0000-00-00 00:00:00', 0, 0),
(2, 1, 1, 'wqwqwqw', 'qqw', '2018-10-30', 0, 0, '2018-10-30 08:19:25', 0, '0000-00-00 00:00:00', 0, 1),
(3, 1, 1, 'ewewe', 'eeew', '2018-10-31', 0, 0, '2018-10-30 08:21:12', 3, '0000-00-00 00:00:00', 0, 1),
(4, 2, 0, 'cxcx', 'xxccv', '2018-10-31', 0, 0, '2018-10-30 08:23:13', 3, '2018-10-30 04:26:27', 3, 0),
(5, 2, 1, 'wew', 'ew', '2001-12-12', 0, 0, '2018-10-30 08:27:20', 3, '0000-00-00 00:00:00', 0, 1),
(6, 2, 1, 'www', 'www', '1998-03-31', 0, 0, '2018-10-30 08:27:50', 3, '0000-00-00 00:00:00', 0, 0);

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
  `discount` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food`, `description`, `image`, `price`, `discount`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`, `store_id`) VALUES
(1, 'vv', 'qq', '/images/food/1(11).jpg', '0.00', 'qqxxxeeee', '2018-10-26 03:21:34', 3, '2018-10-26 07:09:30', 3, 0, 2),
(2, 'aa', 'qqpp', '/images/food/_-34.jpg', '0.00', 'qq', '2018-10-26 04:04:53', 3, '2018-10-26 06:23:12', 3, 0, 2),
(3, 'aa', 'qq', '/images/food/_-4.jpg', '0.00', 'qq', '2018-10-26 04:05:59', 3, '0000-00-00 00:00:00', 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `food_ingredient`
--

CREATE TABLE `food_ingredient` (
  `food_ingredient_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
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

--
-- Dumping data for table `gourmet_type`
--

INSERT INTO `gourmet_type` (`gourmet_type_id`, `gourmet_type_title`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'Western', '2018-10-24 07:44:13', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'Local', '2018-10-24 07:44:13', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'asdoo', '2018-10-26 05:14:16', 3, '2018-10-26 01:24:59', 3, 0),
(4, 'qwertyuiop', '2018-10-26 05:22:26', 3, '2018-10-26 01:24:15', 3, 0),
(5, 'qwer', '2018-10-26 05:22:37', 3, '2018-10-26 01:22:37', 3, 1),
(6, 'ccc', '2018-10-28 04:13:04', 3, '0000-00-00 00:00:00', 0, 0);

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
(3, 'milk', '2018-10-30 06:56:47', 3, '2018-10-30 03:45:05', 3, 0);

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `store_id`, `image`, `menu`, `description`, `price`, `discount`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 2, '', 'qqq', 'qqq', '12.00', '2', '2018-10-29 06:23:18', 1, '0000-00-00 00:00:00', 0, 1),
(2, 2, '/images/food/_-15.jpg', 'oo', 'oo', '54.00', '5', '2018-10-29 08:24:23', 3, '0000-00-00 00:00:00', 0, 1),
(3, 2, '/images/food/_-36.jpg', 'ee', 'ee', '534.00', '5', '2018-10-29 08:26:29', 3, '0000-00-00 00:00:00', 0, 1),
(4, 2, '/images/food/1_(1)1.jpg', 'e4xcc', 'e4', '33.00', '3', '2018-10-29 08:35:03', 3, '2018-10-30 08:57:55', 3, 0),
(5, 2, '/images/food/_-342.jpg', 'uu', 'uu', '888.00', '888', '2018-10-29 08:42:00', 3, '0000-00-00 00:00:00', 0, 0);

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
(21, 'Menu', 'menu', 0, '2018-10-29 06:12:37', 0, '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification`, `description`, `end_date`, `user_id`, `created_date`, `created_by`, `deleted`) VALUES
(1, 'asd', 'asd', '2018-10-28 00:00:00', 1, '2018-10-28 03:56:32', 1, 0);

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

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pricing_id`, `pricing_title`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 'Below RM10', '2018-10-24 07:44:37', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'asdx', '2018-10-26 05:47:07', 3, '2018-10-26 01:47:29', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `type` enum('USER','ADMIN','CLIENT','') NOT NULL,
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
(2, 'ADMIN', 'admin', 2, '2018-10-03 08:49:26', 0, '0000-00-00 00:00:00', 0, 0);

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
(42, 2, 21, 0, 1, 0, 0, 0, '2018-10-29 06:13:10', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_bin NOT NULL,
  `store` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
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
  `pricing_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `thumbnail`, `store`, `address`, `phone`, `latitude`, `longitude`, `business_hour`, `take_away`, `dine_in`, `halal`, `vegetarian`, `favourite`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`, `gourmet_type_id`, `pricing_id`) VALUES
(2, '/images/store/default_no.jpg', 'test', 'testtest', 'test', 'test', 'test', 'test', 1, 1, 1, 1, 1, '2018-10-24 08:00:54', 0, '0000-00-00 00:00:00', 0, 0, 2, 1);

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
  `name` varchar(256) NOT NULL,
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
  `take_away` int(11) NOT NULL DEFAULT '0',
  `sub_total` decimal(5,2) NOT NULL,
  `service_change` decimal(5,2) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
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
  MODIFY `billing_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `gourmet_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_food`
--
ALTER TABLE `order_food`
  MODIFY `order_food_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `role_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
