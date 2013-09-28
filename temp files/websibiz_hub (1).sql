-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2013 at 06:41 AM
-- Server version: 5.1.70-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `websibiz_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(68) COLLATE utf8_unicode_ci NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `groupname`, `ctime`) VALUES
(1, 'group1', '2013-09-25 08:37:01'),
(2, 'group2', '2013-09-25 08:37:01'),
(3, 'group3', '2013-09-25 08:37:01'),
(4, 'group4', '2013-09-26 03:34:17'),
(5, 'group5', '2013-09-26 03:34:17'),
(6, 'group6', '2013-09-26 03:34:50'),
(7, 'group7', '2013-09-26 03:34:50'),
(8, 'group8', '2013-09-26 03:35:06'),
(9, 'group9', '2013-09-26 03:35:06'),
(10, 'group10', '2013-09-26 03:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `group_list`
--

CREATE TABLE IF NOT EXISTS `group_list` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`list_id`),
  UNIQUE KEY `user_id_2` (`user_id`,`group_id`),
  UNIQUE KEY `user_id_3` (`user_id`,`group_id`),
  KEY `user_id` (`user_id`,`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `group_list`
--

INSERT INTO `group_list` (`list_id`, `user_id`, `group_id`, `ctime`) VALUES
(1, 9, 2, '2013-09-26 05:39:04'),
(2, 9, 9, '2013-09-26 05:39:04'),
(3, 9, 1, '2013-09-26 05:39:20'),
(4, 9, 3, '2013-09-26 05:39:20'),
(5, 9, 8, '2013-09-26 06:05:09'),
(6, 9, 6, '2013-09-26 07:22:12'),
(7, 9, 5, '2013-09-26 07:24:23'),
(8, 9, 4, '2013-09-28 05:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `tempuser`
--

CREATE TABLE IF NOT EXISTS `tempuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `salt` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tempuser`
--

INSERT INTO `tempuser` (`id`, `firstname`, `lastname`, `email`, `password`, `gender`, `birth`, `salt`, `ctime`) VALUES
(1, 'vimal', 'kumar', 'vmlwebjob@gmail.com', '5b2fb44d8bb5cd8186ca2f9383fb707c', 'male', '1989-02-02', 'ac94cb31cb1f41c102d6f17b7f66abd0', '2013-09-18 13:57:42'),
(2, 'satheesh', 'kumar', 'zzqweqwe@gmail.com', '196f54aef3ee1033fe346ed2956c492e', 'male', '1997-04-09', '312df9eaa38d7d76882ab0f79b259f3e', '2013-09-22 05:08:28'),
(5, 'satheesh', 'kumar', 'satheesh@dreamstudio.in', '196f54aef3ee1033fe346ed2956c492e', 'male', '1988-10-10', 'cd85dffaa8f11dcfebdb180cc7bdd2f6', '2013-09-25 08:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` int(11) DEFAULT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `salt` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fb_id`, `firstname`, `lastname`, `email`, `password`, `gender`, `birth`, `salt`, `ctime`) VALUES
(1, 2147483647, 'Satheesh', 'Kumar', 'satheeshpdh@gmail.com', '', NULL, NULL, 'f0c22e5e3e7101a325d03dc127d10894', '2013-09-18 12:58:33'),
(2, 2147483647, 'Jackson', 'Vimal', 'vimalring@gmail.com', '69a212933971d4633e2cce10bc654011', NULL, NULL, 'b98e7ddfb0f77acb149782b08ec20a68', '2013-09-18 13:53:01'),
(3, 2147483647, 'Santhosh', 'Kumar', 'santhosh.hicas@gmail.com', '', NULL, NULL, '9dc87a5cc6d7ec78c277ffee44411770', '2013-09-18 14:04:11'),
(10, 641955137, 'Vijayaraj', 'Muthukrishnan', 'vijayarajceg@gmail.com', '', NULL, NULL, '46e857fcbb707340438029ba7755e91b', '2013-09-25 17:32:40'),
(5, 1835495970, 'Tom', 'Jerry', 'dhool_vinu@yahoo.co.in', '56d539e76199ccf5731d9afa09a9e613', NULL, NULL, 'd9a7d0693f0a53eb9cdd3bf5cf9fb382', '2013-09-20 12:39:43'),
(6, 581341524, 'Sudharsanam', 'R Naidu', 'vinu.mba10@gmail.com', '835f98e73722d8b9670c001fba06e378', NULL, NULL, '9cf380e09bd312c0eefb114fd6742377', '2013-09-22 01:53:14'),
(7, 2147483647, 'Satheesh', 'Kumar', 'dreamstudio.co.in@gmail.com', '', NULL, NULL, 'cd148f92bb8b3b6961551743b0add7e9', '2013-09-22 05:07:46'),
(9, 2147483647, 'Satheesh', 'Kumar', 'satheesh@dreamstudio.in', '281554569f87af55307d8978d8a2ef63', NULL, NULL, '08dccbfdd5c1f8dbae9e414504d5b421', '2013-09-25 08:28:08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         