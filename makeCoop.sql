/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `MemberId` smallint(3) NOT NULL AUTO_INCREMENT,
  `Name` char(25) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `CreditNum` int(16) DEFAULT NULL,
  PRIMARY KEY (`MemberId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `customer` VALUES (6,'test2','road way blvd','48585747',324234243);
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `ItemId` int(4) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Dept` varchar(15) DEFAULT NULL,
  `Price` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`ItemId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase` (
  `ReceiptId` int(6) NOT NULL,
  `ItemId` int(4) NOT NULL,
  PRIMARY KEY (`ReceiptId`,`ItemId`),
  KEY `ItemId` (`ItemId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `receipt` (
  `ReceiptId` int(6) NOT NULL AUTO_INCREMENT,
  `Total` decimal(6,2) DEFAULT NULL,
  `MemberId` smallint(3) NOT NULL,
  PRIMARY KEY (`ReceiptId`),
  KEY `MemberId` (`MemberId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
