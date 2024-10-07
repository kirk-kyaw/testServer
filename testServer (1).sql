-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2024 at 06:20 PM
-- Server version: 5.1.56
-- PHP Version: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testServer`
--

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE IF NOT EXISTS `commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` varchar(50) NOT NULL,
  `m_id` varchar(10) NOT NULL,
  `y_id` varchar(10) NOT NULL,
  `cocktail` varchar(10) NOT NULL,
  `spy` varchar(10) NOT NULL,
  `flower` varchar(10) NOT NULL,
  `flower_1` varchar(10) NOT NULL,
  `liquor` varchar(10) NOT NULL,
  `ktv` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(255) NOT NULL,
  `e_salary` varchar(50) NOT NULL,
  `e_days` varchar(50) NOT NULL DEFAULT '28',
  `gender` enum('Male','Female','','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `e_name`, `e_salary`, `e_days`, `gender`) VALUES
(1, 'Nyein Chan', '2000', '28', 'Male'),
(2, 'Robin', '2000', '28', 'Male'),
(3, 'Chef', '2000', '28', 'Male'),
(4, 'Wai Phyo', '1600', '28', 'Male'),
(5, 'ALwan', '1700', '28', 'Female'),
(6, 'War War', '1700', '28', 'Female'),
(7, 'Ma Myint', '1600', '28', 'Female'),
(8, 'Su Naing', '1500', '28', 'Female'),
(9, 'Shwe Sin', '1400', '28', 'Female'),
(10, 'Su Su', '1400', '28', 'Female'),
(11, 'Cho Cho', '1300', '28', 'Female'),
(12, 'Thu Thu', '1300', '28', 'Female'),
(13, 'Jue Jue', '1300', '28', 'Female'),
(14, 'Snow', '1300', '28', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE IF NOT EXISTS `months` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` varchar(11) NOT NULL,
  `m_name` enum('Jan','Feb','Mar','Apr','Mar','Jun','July','Aug','Sep','Oct','Nov','Dec') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `m_id`, `m_name`) VALUES
(1, '1', 'Jan'),
(2, '2', 'Feb'),
(3, '3', 'Mar'),
(4, '4', 'Apr'),
(5, '5', 'Mar'),
(6, '6', 'Jun'),
(7, '7', 'July'),
(8, '8', 'Aug'),
(9, '9', 'Sep'),
(10, '10', 'Oct'),
(11, '11', 'Nov'),
(12, '12', 'Dec');

-- --------------------------------------------------------

--
-- Table structure for table `summery`
--

CREATE TABLE IF NOT EXISTS `summery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` varchar(10) NOT NULL,
  `m_id` varchar(10) NOT NULL,
  `y_id` varchar(10) NOT NULL,
  `w_days` varchar(10) NOT NULL,
  `leaves` varchar(10) NOT NULL,
  `ot` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `summery`
--

INSERT INTO `summery` (`id`, `e_id`, `m_id`, `y_id`, `w_days`, `leaves`, `ot`) VALUES
(1, '1', '1', '1', '28', '0', '2');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `y_name` varchar(20) NOT NULL,
  `y_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `y_name`, `y_id`) VALUES
(1, '2024', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
