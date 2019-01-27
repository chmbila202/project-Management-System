-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 03:14 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `affiliated`
--
CREATE DATABASE IF NOT EXISTS `affiliated` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `affiliated`;

-- --------------------------------------------------------

--
-- Table structure for table `ajax_chat_bans`
--

CREATE TABLE IF NOT EXISTS `ajax_chat_bans` (
  `userID` int(10) unsigned NOT NULL,
  `userName` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dateTime` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ajax_chat_invitations`
--

CREATE TABLE IF NOT EXISTS `ajax_chat_invitations` (
  `userID` int(10) unsigned NOT NULL,
  `channel` int(10) unsigned NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ajax_chat_messages`
--

CREATE TABLE IF NOT EXISTS `ajax_chat_messages` (
  `id` int(11) NOT NULL,
  `userID` int(10) unsigned NOT NULL,
  `userName` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `userRole` int(1) NOT NULL,
  `channel` int(10) unsigned NOT NULL,
  `dateTime` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajax_chat_messages`
--

INSERT INTO `ajax_chat_messages` (`id`, `userID`, `userName`, `userRole`, `channel`, `dateTime`, `ip`, `text`) VALUES
(0, 2147483647, 'ChatBot', 4, 0, '2017-06-09 04:21:12', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login admin'),
(0, 2147483647, 'ChatBot', 4, 0, '2017-06-09 04:21:19', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/logout admin'),
(0, 2147483647, 'ChatBot', 4, 0, '2017-06-09 04:28:52', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', '/login admin'),
(0, 1, 'admin', 3, 0, '2017-06-09 04:28:58', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'assad'),
(0, 1, 'admin', 3, 0, '2017-06-09 04:29:04', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `ajax_chat_online`
--

CREATE TABLE IF NOT EXISTS `ajax_chat_online` (
  `userID` int(11) unsigned NOT NULL,
  `userName` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `userRole` int(1) NOT NULL,
  `channel` int(10) unsigned NOT NULL,
  `dateTime` datetime NOT NULL,
  `ip` varbinary(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajax_chat_online`
--

INSERT INTO `ajax_chat_online` (`userID`, `userName`, `userRole`, `channel`, `dateTime`, `ip`) VALUES
(1, 'admin', 3, 0, '2017-06-09 04:28:55', '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `msg` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `name`, `msg`) VALUES
(1, 1, 'Admin', '  Hellow');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `college` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `college`) VALUES
(1, 'Summit Group of Colleges'),
(2, 'Tips College'),
(3, 'Shibli College'),
(4, 'Govt Postgraduate College Samanabad');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE IF NOT EXISTS `proposal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `p_title` varchar(50) NOT NULL,
  `p_des` varchar(500) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE IF NOT EXISTS `timer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`id`, `time`) VALUES
(2, '2017-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reg` varchar(50) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `reg`, `name`, `email`, `pass`, `role`, `status`, `img`, `college`) VALUES
(1, '2014-GCUF-012314', 'Admin', 'admin@gmail.com', 'admin', 'Head', 'Active', 'uploads/admin.png', ''),
(10, '1122', 'user', 'user@gmail.com', 'user', 'Focal Person', 'Active', 'uploads/1103859803-2.gif', 'gcuf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
