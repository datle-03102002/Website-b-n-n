-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: btl
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `cart_id` char(10) NOT NULL,
  `customer_id` char(10) NOT NULL,
  `food_id` char(10) NOT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`cart_id`,`customer_id`,`food_id`),
  KEY `food_id` (`food_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `foods` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES ('CT01','CS02','FOOD010',1),('CT01','CS02','FOOD011',1),('CT01','CS02','FOOD02',1),('CT01','CS02','FOOD05',1),('CT01','CS02','FOOD07',9),('CT02','CS01','FOOD011',3),('CT02','CS01','FOOD02',1),('CT02','CS01','FOOD06',1);
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customer_id` char(10) NOT NULL,
  `fullName` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` char(30) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES ('CS01','Nguyễn Văn A','0867687695','Việt Tiến, Việt Yên, Bắc Giang','abc123@gmail.com','abc123!'),('CS02','Nguyễn Văn B','0867687695','Việt Tiến, Việt Yên, Bắc Giang','abc1234@gmail.com','abc123!');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detaildinnertable`
--

DROP TABLE IF EXISTS `detaildinnertable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detaildinnertable` (
  `order_id` char(10) NOT NULL,
  `dinnerTable_id` char(5) NOT NULL,
  `orderDate` datetime NOT NULL,
  `time` datetime NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`order_id`,`dinnerTable_id`),
  KEY `dinnerTable_id` (`dinnerTable_id`),
  CONSTRAINT `detaildinnertable_ibfk_1` FOREIGN KEY (`dinnerTable_id`) REFERENCES `dinnertable` (`dinnerTable_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detaildinnertable_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detaildinnertable`
--

LOCK TABLES `detaildinnertable` WRITE;
/*!40000 ALTER TABLE `detaildinnertable` DISABLE KEYS */;
/*!40000 ALTER TABLE `detaildinnertable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinnertable`
--

DROP TABLE IF EXISTS `dinnertable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dinnertable` (
  `dinnerTable_id` char(5) NOT NULL,
  `tableNumber` bigint NOT NULL,
  `seat` bigint DEFAULT NULL,
  `price` decimal(8,1) DEFAULT NULL,
  `type` bit(1) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`dinnerTable_id`),
  UNIQUE KEY `tableNumber` (`tableNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinnertable`
--

LOCK TABLES `dinnertable` WRITE;
/*!40000 ALTER TABLE `dinnertable` DISABLE KEYS */;
INSERT INTO `dinnertable` VALUES ('TB01',1,6,100000.0,_binary '\0',1),('TB02',2,4,100000.0,_binary '\0',1),('TB03',3,4,100000.0,_binary '\0',1),('TB04',4,8,100000.0,_binary '',1),('TB05',5,10,100000.0,_binary '',1),('TB06',6,12,100000.0,_binary '',1),('TB07',7,6,100000.0,_binary '\0',1),('TB08',8,4,100000.0,_binary '\0',1),('TB09',9,4,100000.0,_binary '\0',1),('TB10',10,8,100000.0,_binary '',1),('TB11',11,2,100000.0,_binary '\0',1),('TB12',12,2,100000.0,_binary '\0',1),('TB13',13,2,100000.0,_binary '\0',1);
/*!40000 ALTER TABLE `dinnertable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `employee_id` char(10) NOT NULL,
  `fullName` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `id_card` char(12) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `password` char(30) DEFAULT NULL,
  `permission` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES ('NV01','Đoàn Văn Quân','Nam','2023023093','2002-05-21 00:00:00','0867687695','admin@gmail.com','1234567','Quản lý'),('NV02','Nguyễn Văn Nam','Nam','2023023093','2004-04-21 00:00:00','0867687695','admin1@gmail.com','1234567','Nhân viên');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foods`
--

DROP TABLE IF EXISTS `foods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `foods` (
  `food_id` char(10) NOT NULL,
  `menu_id` char(10) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `images` char(100) DEFAULT NULL,
  `descriptions` text,
  `vote` decimal(2,1) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`food_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foods`
--

LOCK TABLES `foods` WRITE;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
INSERT INTO `foods` VALUES ('FOOD010','menu03','Thịt kho tàu','imgs/menu/menu-item-5.png','',5.0,100000,100),('FOOD011','menu03','Cá kho gừng','imgs/menu/menu-item-2.png','',5.0,100000,100),('FOOD02','menu02','Nước cam','imgs/menu/menu-item-1.png','',4.0,100000,20),('FOOD03','menu03','Lẩu bốn mùa','imgs/menu/menu-item-1.png','',5.0,100000,10),('FOOD04','menu01','Cam','imgs/menu/menu-item-2.png','',5.0,100000,120),('FOOD05','menu01','Lê','imgs/menu/menu-item-1.png','',5.0,100000,180),('FOOD06','menu03','Thị bò nướng đá','imgs/menu/menu-item-1.png','',5.0,100000,180),('FOOD07','menu02','Nước ép táo','imgs/menu/menu-item-2.png','',5.0,100000,10),('FOOD08','menu03','Cua hoàng đế','imgs/menu/menu-item-3.png','',5.0,100000,100),('FOOD09','menu03','Thịt lợn cháy cạnh','imgs/menu/menu-item-4.png','',5.0,100000,100);
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `menu_id` char(10) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('menu01','Trái cây',''),('menu02','Đồ uống',''),('menu03','Đồ ăn',''),('MN01','Đồ uống','Giải khát'),('MN02','Hoa quả','Giải khát'),('MN03','Đồ chín','Giải khát'),('MN04','Tráng miệng','Giải khát'),('MN05','Đồ hải sản','Giải khát');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `new_id` char(10) NOT NULL,
  `title` text NOT NULL,
  `detail` text NOT NULL,
  `author` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `dateSubmitted` datetime NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`new_id`),
  KEY `name` (`name`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`name`) REFERENCES `restaurant` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES ('N01','Món ngon trong tuần 1','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N02','Món ngon trong tuần 2','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N03','Món ngon trong tuần 3','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N04','Món ngon trong tuần 4','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N05','Món ngon trong tuần 5','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N06','Món ngon trong tuần 6','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N07','Món ngon trong tuần 7','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N08','Món ngon trong tuần 8','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N09','Món ngon trong tuần 9','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N10','Món ngon trong tuần 10','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N11','Món ngon trong tuần 11','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua'),('N12','Món ngon trong tuần 12','Chưa có gì','Đoàn Văn Quân','2023-05-11 00:00:00','Nhà hàng ShinQua');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_`
--

DROP TABLE IF EXISTS `order_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_` (
  `order_id` char(10) NOT NULL,
  `customer_id` char(10) NOT NULL,
  `cart_id` char(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `order_status` int DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`),
  KEY `cart_id` (`cart_id`),
  CONSTRAINT `order__ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order__ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_`
--

LOCK TABLES `order_` WRITE;
/*!40000 ALTER TABLE `order_` DISABLE KEYS */;
INSERT INTO `order_` VALUES ('OR01','CS01','CT02','2023-06-18','10:34:18',200000,0),('OR02','CS02','CT01','2023-06-18','15:18:35',900000,0),('OR03','CS01','CT02','2023-06-18','22:07:16',300000,0),('OR04','CS01','CT02','2023-06-18','22:09:07',300000,0),('OR05','CS01','CT02','2023-06-18','23:02:34',400000,0),('OR06','CS01','CT02','2023-06-19','13:19:55',500000,0),('OR07','CS01','CT02','2023-06-19','13:24:53',500000,0);
/*!40000 ALTER TABLE `order_` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderdetail` (
  `order_id` char(10) NOT NULL,
  `food_id` char(10) NOT NULL,
  `order_state` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `ship` bit(1) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`food_id`),
  KEY `food_id` (`food_id`),
  CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `foods` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdetail`
--

LOCK TABLES `orderdetail` WRITE;
/*!40000 ALTER TABLE `orderdetail` DISABLE KEYS */;
INSERT INTO `orderdetail` VALUES ('OR06','FOOD011','Chờ xử lý',3,1000,_binary '\0'),('OR06','FOOD02','Chờ xử lý',1,1000,_binary '\0'),('OR06','FOOD06','Chờ xử lý',1,1000,_binary '\0'),('OR07','FOOD011','Chờ xử lý',3,1000,_binary '\0'),('OR07','FOOD02','Chờ xử lý',1,1000,_binary '\0'),('OR07','FOOD06','Chờ xử lý',1,1000,_binary '\0');
/*!40000 ALTER TABLE `orderdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restaurant` (
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` char(10) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` char(50) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
INSERT INTO `restaurant` VALUES ('Nhà hàng ShinQua','0867687695','Kim Chung, Hoài Đức, Hà Nội','dvquan210502@gmail.com');
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-19 13:25:54
