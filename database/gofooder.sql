-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2018 at 06:06 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `salt`, `role_id`, `name`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(3, 'emmwee', 'f8fe9650547bca0182a8ff6751d7e458c79276307522ca6db163dfe09133612d99d759e4ece5c052e7f0cdacdf7173819ba4b69241f8ceb4ea69ea86e07caf89', 459898, 1, 'Emmanual', 0, '2018-09-26 06:21:32', 0, '0000-00-00 00:00:00', 0),
(5, 'admin', '0021d6f2e7291097ecdf7c1ee9308d8ff0d9509bd30d6b215255e6cc97e00667a494940334479f2a570fe830863bcb61c05336b98c2577c54544ea2e78b1f380', 381158, 1, 'Admin', 0, '2018-09-26 07:06:59', 0, '0000-00-00 00:00:00', 0),
(6, 'test', '17076901b6892d32d36e0870942811afa98914a18e2e302adcfd928bee0dccfcf9d134a8c59785dc959cc92c038da81055af7888f51f7c4be2817da2fd4d0ed0', 335514, 1, 'test', 1, '2018-09-26 08:22:55', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module` varchar(256) CHARACTER SET utf8 NOT NULL,
  `url` varchar(256) CHARACTER SET utf8 NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module`, `url`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(19, 'User', 'user', 0, '2018-09-26 07:04:07', 0, '0000-00-00 00:00:00', 0),
(20, 'Admin', 'admin', 0, '2018-09-26 07:04:07', 0, '0000-00-00 00:00:00', 0),
(21, 'Role Access', 'role_access', 0, '2018-09-26 07:04:07', 0, '0000-00-00 00:00:00', 0),
(22, 'Product Category', 'product_category', 0, '2018-09-26 08:59:52', 0, '0000-00-00 00:00:00', 0),
(23, 'Product', 'product', 0, '2018-09-27 08:00:33', 0, '0000-00-00 00:00:00', 0),
(24, 'Product Model', 'product_model', 0, '2018-09-27 12:11:57', 0, '0000-00-00 00:00:00', 0),
(25, 'Product Models', 'product_models', 0, '2018-09-27 12:13:03', 0, '0000-00-00 00:00:00', 0),
(26, 'Product Images', 'product_images', 0, '2018-09-27 12:26:03', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product` varchar(256) NOT NULL,
  `thumbnail` varchar(256) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` longtext NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_category_id`, `product`, `thumbnail`, `price`, `description`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 3, 'Spiderman', '/images/product/product_20180927132210.jpg', '209.00', 'Be Spider-Man\r\nAfter eight years behind the mask, Peter Parker is a crime-fighting master. Feel the full power of a more experienced Spider-Man with improvisational combat, dynamic acrobatics, fluid urban traversal, and environmental interactions. A rookie no longer, this is the most masterful Spider-Man you’ve ever played.\r\n\r\nWorlds Collide\r\nThe worlds of Peter Parker and Spider-Man collide in an original action-packed story. In this new Spider-Man universe, iconic characters from Peter and Spider-Man’s lives have been reimagined, placing familiar characters in unique roles.\r\n\r\nMarvel’s New York is Your Playground\r\nThe Big Apple comes to life as Insomniac’s most expansive and interactive world yet. Swing through vibrant neighborhoods and catch breathtaking views of iconic Marvel and Manhattan landmarks. Use the environment to defeat villains with epic takedowns in true blockbuster action.', 0, '2018-09-27 11:22:11', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category` varchar(256) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category`, `parent_id`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'Games', 0, 0, '2018-09-26 09:13:49', 0, '0000-00-00 00:00:00', 0),
(2, 'Sony', 1, 0, '2018-09-26 09:15:18', 0, '0000-00-00 00:00:00', 0),
(3, 'PS4', 2, 0, '2018-09-26 09:16:31', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(256) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `product_image`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 1, '/images/product_images/product_images_20180927132210.jpg', 0, '2018-09-27 11:22:11', 0, '0000-00-00 00:00:00', 0),
(2, 1, '/images/product_images/product_images_201809271322101.jpg', 0, '2018-09-27 11:22:11', 0, '0000-00-00 00:00:00', 0),
(3, 1, '/images/product_images/product_images_20180927132211.jpg', 0, '2018-09-27 11:22:11', 0, '0000-00-00 00:00:00', 0),
(4, 1, '/images/product_images/product_images_20180927143248.jpg', 0, '2018-09-27 12:32:48', 0, '0000-00-00 00:00:00', 0),
(5, 1, '/images/product_images/product_images_201809271432481.jpg', 0, '2018-09-27 12:32:48', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_model`
--

CREATE TABLE `product_model` (
  `product_model_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_model` varchar(256) NOT NULL,
  `SKU` varchar(256) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_model`
--

INSERT INTO `product_model` (`product_model_id`, `product_id`, `product_model`, `SKU`, `quantity`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 1, 'Standard Edition', 'SPM001', 0, 0, '2018-09-27 11:22:11', 0, '0000-00-00 00:00:00', 0),
(2, 1, 'Special Edition', 'SPM002', 0, 0, '2018-09-27 11:22:11', 0, '0000-00-00 00:00:00', 0),
(3, 1, 'Collector''s Edition', 'SPM003', 0, 0, '2018-09-27 11:22:11', 0, '0000-00-00 00:00:00', 0),
(4, 1, 'Super Edition', 'SPM004', 0, 0, '2018-09-27 12:21:57', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(256) CHARACTER SET utf8 NOT NULL,
  `type` enum('USER','ADMIN') COLLATE utf8_bin NOT NULL,
  `level` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `type`, `level`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'Superadmin', 'ADMIN', 1, 0, '2018-09-26 06:25:42', 0, '0000-00-00 00:00:00', 0),
(2, 'Admin', 'ADMIN', 2, 0, '2018-09-26 06:25:42', 0, '0000-00-00 00:00:00', 0),
(3, 'User', 'USER', 1, 0, '2018-09-26 08:25:25', 0, '0000-00-00 00:00:00', 0);

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
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role_access`
--

INSERT INTO `role_access` (`role_access_id`, `role_id`, `module_id`, `create_control`, `read_control`, `update_control`, `delete_control`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 1, 19, 1, 1, 1, 1, 0, '2018-09-26 07:04:07', 0, '0000-00-00 00:00:00', 0),
(2, 2, 19, 0, 1, 0, 0, 0, '2018-09-26 07:04:07', 0, '0000-00-00 00:00:00', 0),
(3, 1, 20, 1, 1, 1, 1, 0, '2018-09-26 07:04:07', 0, '0000-00-00 00:00:00', 0),
(4, 2, 20, 0, 1, 0, 0, 0, '2018-09-26 07:04:07', 0, '0000-00-00 00:00:00', 0),
(5, 1, 21, 1, 1, 1, 1, 0, '2018-09-26 07:04:07', 0, '0000-00-00 00:00:00', 0),
(6, 2, 21, 0, 1, 0, 0, 0, '2018-09-26 07:04:07', 0, '0000-00-00 00:00:00', 0),
(7, 1, 22, 1, 1, 1, 1, 0, '2018-09-26 08:59:52', 0, '0000-00-00 00:00:00', 0),
(8, 2, 22, 0, 1, 0, 0, 0, '2018-09-26 08:59:52', 0, '0000-00-00 00:00:00', 0),
(9, 3, 22, 0, 1, 0, 0, 0, '2018-09-26 08:59:52', 0, '0000-00-00 00:00:00', 0),
(10, 1, 23, 1, 1, 1, 1, 0, '2018-09-27 08:00:33', 0, '0000-00-00 00:00:00', 0),
(11, 2, 23, 0, 1, 0, 0, 0, '2018-09-27 08:00:33', 0, '0000-00-00 00:00:00', 0),
(12, 3, 23, 0, 1, 0, 0, 0, '2018-09-27 08:00:33', 0, '0000-00-00 00:00:00', 0),
(13, 1, 24, 1, 1, 1, 1, 0, '2018-09-27 12:11:57', 0, '0000-00-00 00:00:00', 0),
(14, 2, 24, 0, 1, 0, 0, 0, '2018-09-27 12:11:57', 0, '0000-00-00 00:00:00', 0),
(15, 3, 24, 0, 1, 0, 0, 0, '2018-09-27 12:11:57', 0, '0000-00-00 00:00:00', 0),
(16, 1, 25, 1, 1, 1, 1, 0, '2018-09-27 12:13:03', 0, '0000-00-00 00:00:00', 0),
(17, 2, 25, 0, 1, 0, 0, 0, '2018-09-27 12:13:03', 0, '0000-00-00 00:00:00', 0),
(18, 3, 25, 0, 1, 0, 0, 0, '2018-09-27 12:13:03', 0, '0000-00-00 00:00:00', 0),
(19, 1, 26, 1, 1, 1, 1, 0, '2018-09-27 12:26:03', 0, '0000-00-00 00:00:00', 0),
(20, 2, 26, 0, 1, 0, 0, 0, '2018-09-27 12:26:03', 0, '0000-00-00 00:00:00', 0),
(21, 3, 26, 0, 1, 0, 0, 0, '2018-09-27 12:26:03', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_details_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_model_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `sub_total` decimal(11,0) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(256) CHARACTER SET utf8 NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `salt`, `role_id`, `name`, `email`, `contact`, `deleted`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 'emmuser', '33b31bae80cc8497aba922524c873d069269d115aa515fd2c03f9768a58db66e988fd3f215c8cbcd9032b88e6c0a44857a533a86a7aaf58bd7b81ac34cec4f71', 666830, 3, 'Emmanual', 'emmwee96@gmail.com', '0149151084', 0, '2018-09-26 08:48:10', 0, '0000-00-00 00:00:00', 0);

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
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_model`
--
ALTER TABLE `product_model`
  ADD PRIMARY KEY (`product_model_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_details_id`),
  ADD KEY `sales_id` (`sales_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_model_id` (`product_model_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
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
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_model`
--
ALTER TABLE `product_model`
  MODIFY `product_model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `role_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_access`
--
ALTER TABLE `role_access`
  ADD CONSTRAINT `role_access_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_access_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
