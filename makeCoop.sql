-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: makeCoop
-- ------------------------------------------------------
-- Server version	8.0.18
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,ANSI' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table "customer"
--

DROP TABLE IF EXISTS "customer";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE "customer" (
  "MemberId" smallint(3) NOT NULL AUTO_INCREMENT,
  "Name" char(25) DEFAULT NULL,
  "Address" varchar(100) DEFAULT NULL,
  "Phone" varchar(10) DEFAULT NULL,
  "CreditNum" int(16) DEFAULT NULL,
  PRIMARY KEY ("MemberId")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "customer"
--

LOCK TABLES "customer" WRITE;
/*!40000 ALTER TABLE "customer" DISABLE KEYS */;
INSERT INTO "customer" VALUES (8,'troy','109301','3993391',3024902),(6,'test2','road way blvd','48585747',324234243),(7,'neil','393939o st','39399393',493839);
/*!40000 ALTER TABLE "customer" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "item"
--

DROP TABLE IF EXISTS "item";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE "item" (
  "ItemId" int(4) NOT NULL AUTO_INCREMENT,
  "Name" varchar(100) NOT NULL,
  "Dept" varchar(15) DEFAULT NULL,
  "Price" decimal(6,2) DEFAULT NULL,
  PRIMARY KEY ("ItemId")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "item"
--

LOCK TABLES "item" WRITE;
/*!40000 ALTER TABLE "item" DISABLE KEYS */;
/*!40000 ALTER TABLE "item" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "purchase"
--

DROP TABLE IF EXISTS "purchase";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE "purchase" (
  "ReceiptId" int(6) NOT NULL,
  "ItemId" int(4) NOT NULL,
  PRIMARY KEY ("ReceiptId","ItemId"),
  KEY "ItemId" ("ItemId")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "purchase"
--

LOCK TABLES "purchase" WRITE;
/*!40000 ALTER TABLE "purchase" DISABLE KEYS */;
/*!40000 ALTER TABLE "purchase" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "receipt"
--

DROP TABLE IF EXISTS "receipt";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE "receipt" (
  "ReceiptId" int(6) NOT NULL AUTO_INCREMENT,
  "Total" decimal(6,2) DEFAULT NULL,
  "MemberId" smallint(3) NOT NULL,
  PRIMARY KEY ("ReceiptId"),
  KEY "MemberId" ("MemberId")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "receipt"
--

LOCK TABLES "receipt" WRITE;
/*!40000 ALTER TABLE "receipt" DISABLE KEYS */;
/*!40000 ALTER TABLE "receipt" ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-01 13:13:32
