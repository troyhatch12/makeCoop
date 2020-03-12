-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 12, 2020 at 07:03 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makecoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `MemberId` smallint(3) NOT NULL AUTO_INCREMENT,
  `Name` char(25) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `CreditNum` int(16) DEFAULT NULL,
  PRIMARY KEY (`MemberId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`MemberId`, `Name`, `Address`, `Phone`, `CreditNum`) VALUES
(2, 'troy', '69 ayy lmao', '1010101010', 2147483647),
(3, 'troy', '69 ayy lmao', '1010101010', 2147483647),
(4, 'troy', '69 ayy lmao', '1010101010', 2147483647);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
