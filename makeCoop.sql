CREATE TABLE IF NOT EXISTS `customer` (
  `MemberId` smallint(3) NOT NULL AUTO_INCREMENT,
  `Name` char(25) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `CreditNum` int(16) DEFAULT NULL,
  PRIMARY KEY (`MemberId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT;

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
