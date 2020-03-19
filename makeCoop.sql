CREATE TABLE `customer` (
  `MemberId` smallint(3) NOT NULL AUTO_INCREMENT,
  `Name` char(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreditNum` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MemberId`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Glarb','0001 The Swamp','1010101010','5253546235768798'),(3,'Troy','4','7801231231','1231231231231231'),(5,'Neil','asdf','7891234123','1273819283172839'),(10,'Billy Bob','Booboo Avenue','7382937492','9393939393939393'),(11,'Gill Fish','Coral Link','7839274928','3737373737373737'),(13,'Troy','ahahahahah','7802141214','hahahah'),(14,'Gary','myhouse','1234566789','1234123412341234'),(15,'gary2','90jk',';lkj','lkjkl'),(16,'gary2','90jk',';lkj','lkjkl'),(17,'yoo','House','123','12345');
