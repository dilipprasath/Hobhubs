-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2014 at 09:17 AM
-- Server version: 5.5.33-31.1
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hobup_hobupdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Hob`
--

CREATE TABLE IF NOT EXISTS `Hob` (
  `Hob_id` int(4) NOT NULL AUTO_INCREMENT,
  `Hob_hobbylist` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Hob_image` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hob_currentts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Hob_updatedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Hob_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Hob`
--

INSERT INTO `Hob` (`Hob_id`, `Hob_hobbylist`, `Hob_image`, `Hob_currentts`, `Hob_updatedts`) VALUES
(1, 'Bike Riding', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:11:10'),
(2, 'Gym', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:11:19'),
(3, 'Running', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:11:27'),
(4, 'Chess', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:11:33'),
(5, 'Reading', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:11:41'),
(6, 'Dancing', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:11:51'),
(7, 'Hunting', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:12:01'),
(8, 'Fishing', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:12:12'),
(9, 'Football', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:12:19'),
(10, 'Yoga', 'logo1.png', '2013-10-08 13:57:06', '2014-03-29 13:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `User_id` bigint(8) NOT NULL AUTO_INCREMENT,
  `User_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `User_firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_dateofbirth` date DEFAULT NULL,
  `User_gender` tinyint(1) NOT NULL,
  `User_path` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `User_img` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Role_id` int(4) DEFAULT NULL,
  `User_Status_id` smallint(2) DEFAULT NULL,
  `User_Referrer_id` smallint(2) DEFAULT NULL,
  `User_salt` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_signup_token` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_createdts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_updatedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_id`),
  UNIQUE KEY `User_email` (`User_email`),
  UNIQUE KEY `User_path` (`User_path`),
  UNIQUE KEY `User_email_2` (`User_email`),
  KEY `User_fk1` (`User_Role_id`),
  KEY `User_fk2` (`User_Status_id`),
  KEY `User_fk3` (`User_Referrer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_id`, `User_email`, `User_firstname`, `User_lastname`, `User_password`, `User_dateofbirth`, `User_gender`, `User_path`, `User_img`, `User_Role_id`, `User_Status_id`, `User_Referrer_id`, `User_salt`, `User_signup_token`, `User_createdts`, `User_updatedts`) VALUES
(1, 'mnmdilip@gmail.com', 'Dilip', 'Prasath', 'c87fccbe7609b2cbc510abb5bcd79a68', '1987-12-26', 1, 'dilipprasath', '1.jpg', 1, 3, 1, '1207cee434433791feff671cec824655', '5f5ce1ca7ea2fda9a2d9dcb700eb768a', '0000-00-00 00:00:00', '2014-03-29 14:44:22'),
(2, 'dilipmnm@gmail.com', 'Dilip', 'Prasath', 'c87fccbe7609b2cbc510abb5bcd79a68', '1987-12-26', 1, 'dilipprasath1', '2.jpg', 1, 3, 2, 'e26ff98eed11513bba8be927a65a92d8', NULL, '0000-00-00 00:00:00', '2013-12-16 05:05:22'),
(3, 'vinu.mba10@gmail.com', 'Sudharsanam', 'R Naidu', '34f61b61ffb1b1ab537191d90b498c29', '1985-08-03', 1, 'sudharsanamrnaidu', '3.jpg', 1, 3, 2, '8c30160fd0b8092e3d8b7ab4020b12ef', '4a27242bd248840314fee686c77ee54d', '0000-00-00 00:00:00', '2014-02-10 04:58:28'),
(4, 'bibinjames2007@gmail.com', 'J Bibin', 'J ames M', 'a7ed6086d5f2c715ef103e44789eed6e', '1986-07-16', 1, 'jbibinjamesm', '4.jpg', 1, 3, 2, '254c24ce929a111b5ffa6a82549d0c57', '1e5d001362003e5d769a57375827442e', '0000-00-00 00:00:00', '2014-04-27 14:08:42'),
(5, 'sudharsanam.rathinam85@gmail.com', 'Sudharsanam', 'Rathinam', '56d539e76199ccf5731d9afa09a9e613', '1985-08-03', 1, 'sudharsanamrathinam', '5.jpg', 1, 3, 3, '56459c9d37373f8770bf69a3f68fdc0a', 'a36098bf883a9e86c6194ab87c249f5e', '0000-00-00 00:00:00', '2013-12-17 05:47:52'),
(7, 'test@gmail.com', 'test r', 'khj jh', 'a7ed6086d5f2c715ef103e44789eed6e', '1986-02-03', 1, 'testrkhjjh', '7.jpg', 1, 3, 1, 'c7017380118419f416b5670587b6f06b', NULL, '0000-00-00 00:00:00', '2013-12-22 08:55:48'),
(8, 'zak4avr@gmail.com', 'Zahid', 'Khan', 'f11a195bb63a10a2657965b2bc1deb4c', '1990-01-29', 1, 'zahidkhan', '8.jpg', 1, 3, 2, '7f5b6f591f8ddb3745055724ca064096', NULL, '0000-00-00 00:00:00', '2014-02-05 19:54:15'),
(9, 'santor42@outlook.it', 'Laa', 'Viola', 'dc28833aea7de6e065f2071371fb7c12', '1969-07-07', 2, 'laaviola', '9.jpg', 1, 3, 2, '63645d179b4846ed31c6abf8e49175f5', NULL, '0000-00-00 00:00:00', '2014-02-12 10:22:03'),
(10, 'ganeshram@gmail.com', 'Ganesh', 'Ram', '2d910845de292c5270e386de0d8f819c', '1953-01-01', 1, 'ganeshram', '10.jpg', 1, 3, 1, '0fd7cc41a61211facdaa07e72471d918', NULL, '0000-00-00 00:00:00', '2014-02-20 16:29:52'),
(11, 'satheesh@dreamstudio.in', 'Satheesh', 'kumar', '895645040e938d339d9373b1df2701ef', '1979-10-10', 1, 'satheeshkumar', '11.jpg', 1, 3, 3, 'f15a1015bed5530bc4081c40b8696857', NULL, '0000-00-00 00:00:00', '2014-03-05 13:49:24'),
(27, 'sdfsd@gmail.com', 'dffdf', 'sdf', 'a7ed6086d5f2c715ef103e44789eed6e', '1987-05-26', 1, 'dffdfsdf', NULL, 1, 3, 1, 'c617877ff2f61cab1617ed8352e6906e', NULL, '0000-00-00 00:00:00', '2014-03-25 17:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `User_Activity`
--

CREATE TABLE IF NOT EXISTS `User_Activity` (
  `User_Activity_id` int(4) NOT NULL AUTO_INCREMENT,
  `User_Activity_action` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Activity_createdts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_Activity_updatedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_Activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `User_Activity`
--

INSERT INTO `User_Activity` (`User_Activity_id`, `User_Activity_action`, `User_Activity_createdts`, `User_Activity_updatedts`) VALUES
(1, 'Login', '2013-10-08 10:35:27', '0000-00-00 00:00:00'),
(2, 'Logout', '2013-10-08 10:35:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `User_Hob`
--

CREATE TABLE IF NOT EXISTS `User_Hob` (
  `User_id` bigint(8) NOT NULL,
  `Hob_id` int(4) NOT NULL,
  `User_Hob_createdts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_Hob_updatedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `User_Hob_fk1` (`User_id`),
  KEY `User_Hob_fk2` (`Hob_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User_Hob`
--

INSERT INTO `User_Hob` (`User_id`, `Hob_id`, `User_Hob_createdts`, `User_Hob_updatedts`) VALUES
(4, 3, '0000-00-00 00:00:00', '2014-03-31 15:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `User_Log`
--

CREATE TABLE IF NOT EXISTS `User_Log` (
  `User_Log_id` bigint(8) NOT NULL AUTO_INCREMENT,
  `User_id` bigint(8) DEFAULT NULL,
  `User_Activity_id` int(4) DEFAULT NULL,
  `User_Log_timedate` datetime DEFAULT NULL,
  `User_Log_ipaddress` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Log_browser` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Log_createdts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_Log_upatedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_Log_id`),
  KEY `User_Log_fk1` (`User_id`),
  KEY `User_Log_fk2` (`User_Activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `Id` bigint(8) NOT NULL AUTO_INCREMENT,
  `User_id` bigint(8) DEFAULT NULL,
  `Profile_image_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Profile_image_comment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Profile_tag_comment` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `User_Profile_fk1` (`User_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`Id`, `User_id`, `Profile_image_name`, `Profile_image_comment`, `Profile_tag_comment`) VALUES
(1, 4, '8621940.jpg', 'hai bibin', 'Hi Albert'),
(2, 4, '5559625.jpg', 'TEsting', ''),
(3, 4, '4178051.jpg', NULL, NULL),
(4, 4, '5121306.jpg', 'hello is the comment', 'tagged sud and Vimal'),
(5, 4, '5245949.jpg', 'hello', ''),
(6, 4, '0', '0', '0'),
(7, 4, '0', '0', '0'),
(8, 4, '0', '0', '0'),
(9, 4, '0', '0', '0'),
(10, 4, '1673522.jpg', NULL, NULL),
(11, 4, '7665355.jpg', NULL, NULL),
(12, 4, '6148117.jpg', '', ''),
(13, 4, '1487086.jpg', NULL, NULL),
(14, 4, '5965573.png', 'I dream for living', ''),
(15, 4, '5853017.png', '', ''),
(16, 4, '4969823.jpg', 'heloooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooolkjbjbufbvufdvufbufuffubjbusvcue', 'iciecuecbub tagged'),
(17, 4, '2294133.jpg', NULL, NULL),
(18, 4, '6540534.jpg', '', ''),
(19, 4, '6272934.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `User_Referrer`
--

CREATE TABLE IF NOT EXISTS `User_Referrer` (
  `User_Referrer_id` smallint(2) NOT NULL AUTO_INCREMENT,
  `User_Referrer_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Referrer_createdts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_Referrer_updatedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_Referrer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `User_Referrer`
--

INSERT INTO `User_Referrer` (`User_Referrer_id`, `User_Referrer_name`, `User_Referrer_createdts`, `User_Referrer_updatedts`) VALUES
(1, 'Hobup', '2013-10-08 10:35:27', '0000-00-00 00:00:00'),
(2, 'Facebook', '2013-10-08 10:35:27', '0000-00-00 00:00:00'),
(3, 'Google plus', '2013-10-08 10:35:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `User_Role`
--

CREATE TABLE IF NOT EXISTS `User_Role` (
  `User_Role_id` int(4) NOT NULL AUTO_INCREMENT,
  `User_Role_desc` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Role_createdts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_Role_updatedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_Role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `User_Role`
--

INSERT INTO `User_Role` (`User_Role_id`, `User_Role_desc`, `User_Role_createdts`, `User_Role_updatedts`) VALUES
(1, 'Active', '2013-10-08 10:35:27', '0000-00-00 00:00:00'),
(2, 'Inactive', '2013-10-08 10:35:27', '0000-00-00 00:00:00'),
(3, 'Admin', '2013-11-17 06:00:00', '2013-11-17 06:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `User_Status`
--

CREATE TABLE IF NOT EXISTS `User_Status` (
  `User_Status_id` smallint(2) NOT NULL AUTO_INCREMENT,
  `User_Status_desc` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Status_createdts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_Status_updatedts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_Status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `User_Status`
--

INSERT INTO `User_Status` (`User_Status_id`, `User_Status_desc`, `User_Status_createdts`, `User_Status_updatedts`) VALUES
(1, 'Active User', '2013-10-08 10:35:27', '0000-00-00 00:00:00'),
(2, 'Inactive  User', '2013-10-08 10:35:27', '0000-00-00 00:00:00'),
(3, 'Pending User', '2013-10-08 10:35:27', '0000-00-00 00:00:00'),
(4, 'Banned  User', '2013-10-08 10:35:27', '2013-11-17 05:58:40');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_fk1` FOREIGN KEY (`User_Role_id`) REFERENCES `User_Role` (`User_Role_id`),
  ADD CONSTRAINT `User_fk2` FOREIGN KEY (`User_Status_id`) REFERENCES `User_Status` (`User_Status_id`),
  ADD CONSTRAINT `User_fk3` FOREIGN KEY (`User_Referrer_id`) REFERENCES `User_Referrer` (`User_Referrer_id`);

--
-- Constraints for table `User_Hob`
--
ALTER TABLE `User_Hob`
  ADD CONSTRAINT `User_Hob_fk1` FOREIGN KEY (`User_id`) REFERENCES `User` (`User_id`),
  ADD CONSTRAINT `User_Hob_fk2` FOREIGN KEY (`Hob_id`) REFERENCES `Hob` (`Hob_id`);

--
-- Constraints for table `User_Log`
--
ALTER TABLE `User_Log`
  ADD CONSTRAINT `User_Log_fk1` FOREIGN KEY (`User_id`) REFERENCES `User` (`User_id`),
  ADD CONSTRAINT `User_Log_fk2` FOREIGN KEY (`User_Activity_id`) REFERENCES `User_Activity` (`User_Activity_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
