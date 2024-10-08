-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2024 at 09:41 AM
-- Server version: 8.3.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

DROP TABLE IF EXISTS `commission`;
CREATE TABLE IF NOT EXISTS `commission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `e_id` varchar(50) NOT NULL,
  `cocktail` varchar(10) NOT NULL DEFAULT '0',
  `spy` varchar(10) NOT NULL DEFAULT '0',
  `flower` varchar(10) NOT NULL DEFAULT '0',
  `flower_1` varchar(10) NOT NULL DEFAULT '0',
  `liquor` varchar(10) NOT NULL DEFAULT '0',
  `ktv` varchar(10) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `e_id` (`e_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `e_id`, `cocktail`, `spy`, `flower`, `flower_1`, `liquor`, `ktv`, `date`) VALUES
(1, '5', '51', '51', '1', '1', '10', '7', '2024-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `e_name` varchar(255) NOT NULL,
  `e_salary` varchar(50) NOT NULL,
  `e_days` varchar(50) NOT NULL DEFAULT '28',
  `e_leave` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ot` varchar(10) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `e_name`, `e_salary`, `e_days`, `e_leave`, `ot`, `date`) VALUES
(1, 'Nyein Chan', '2000', '28', '0', '2', '0000-00-00'),
(2, 'Robin', '2000', '28', '', NULL, '2024-10-31'),
(3, 'Chef', '2000', '28', '', NULL, '2024-10-31'),
(4, 'Wai Phyo', '1600', '28', '', NULL, '2024-10-31'),
(5, 'ALwan', '1700', '28', '', NULL, '2024-10-31'),
(6, 'War War', '1700', '28', '', NULL, '2024-10-31'),
(7, 'Ma Myint', '1600', '28', '', NULL, '2024-10-31'),
(8, 'Su Naing', '1500', '28', '', NULL, '2024-10-31'),
(9, 'Shwe Sin', '1400', '28', '', NULL, '2024-10-31'),
(10, 'Su Su', '1400', '28', '', NULL, '2024-10-31'),
(11, 'Cho Cho', '1300', '28', '', NULL, '2024-10-31'),
(12, 'Thu Thu', '1300', '28', '', NULL, '2024-10-31'),
(13, 'Jue Jue', '1300', '28', '', NULL, '2024-10-31'),
(14, 'Snow', '1300', '28', '', NULL, '2024-10-31'),
(15, 'kyaw gyi', '3000', '28', '0', '0', '2024-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `e_id` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `e_id`, `name`, `amount`, `date`) VALUES
(1, '2', 'ကြွေးကျန်', '200', '2024-10-08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
