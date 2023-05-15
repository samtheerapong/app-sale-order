-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2023 at 08:38 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-order-link`
--

-- --------------------------------------------------------

--
-- Table structure for table `counting_unit`
--

DROP TABLE IF EXISTS `counting_unit`;
CREATE TABLE IF NOT EXISTS `counting_unit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(100) NOT NULL,
  `actived` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `counting_unit`
--

INSERT INTO `counting_unit` (`id`, `unit`, `actived`) VALUES
(1, 'ขวด', 1),
(2, 'ลิตร', 1),
(3, 'ปี๊บ', 1),
(4, 'ถัง', 1),
(5, 'กล่อง', 1),
(6, 'พาเลท', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(45) NOT NULL COMMENT 'รหัสลูกค้า',
  `customer_name` varchar(200) NOT NULL COMMENT 'ชื่อลูกค้า',
  `customer_en_name` varchar(200) DEFAULT NULL COMMENT 'ชื่อภาษาอังกฤษ',
  `customer_type_id` int DEFAULT NULL COMMENT 'ประเภทลูกค้า',
  `customer_addr` text COMMENT 'ที่อยู่ลูกค้า',
  `customer_tel` varchar(45) DEFAULT NULL COMMENT 'เบอร์ติดต่อ',
  `customer_fax` varchar(45) DEFAULT NULL COMMENT 'เบอร์ fax',
  `customer_email` varchar(45) DEFAULT NULL COMMENT 'อีเมลลูกค้า',
  `active` int DEFAULT NULL COMMENT 'เปิดใช้งาน',
  PRIMARY KEY (`id`),
  KEY `fk_customer_customer_type1_idx` (`customer_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_code`, `customer_name`, `customer_en_name`, `customer_type_id`, `customer_addr`, `customer_tel`, `customer_fax`, `customer_email`, `active`) VALUES
(1, 'A00001', 'ยามาโมริ เทรดดิ้ง จำกัด', 'YAMAMORI ', 1, 'ชั้น 17 อาคารมณียา  ', '02-6520561,02-6520562', NULL, NULL, 1),
(2, 'B00001', 'บริษํท บุญรอดบริวเวอรี่ จำกัด', 'BUNROD BREWVERY', 2, 'สาขาเชียงราย 99 หมู่  1 ต.แม่กรณ์  อ.เมือง  เชียงราย', '-', NULL, NULL, 1),
(3, 'D00001', 'บริษํท เกียรตินิยม ขนส่ง', 'KAITOIYOMs', 4, '180/15 ม. 12 ถ.ซุปเปอร์ไฮเวย์ อ.เมือง จ.เชียงราย', '0532714811', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

DROP TABLE IF EXISTS `customer_type`;
CREATE TABLE IF NOT EXISTS `customer_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(45) NOT NULL COMMENT 'รหัสลูกค้า',
  `customer_type` varchar(100) NOT NULL COMMENT 'ประเภทลูกค้า',
  `actived` varchar(45) DEFAULT NULL COMMENT 'เปิดใช้งาน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`id`, `customer_code`, `customer_type`, `actived`) VALUES
(1, 'A', 'ภายในประเทศ', '1'),
(2, 'B', 'นอกประเทศ', '1'),
(3, 'C', 'อุตสาหกรรม', '1'),
(4, 'D', 'ภัตตาคาร', '1'),
(5, 'E', 'ร้านขายส่ง', '1'),
(6, 'F', 'ร้านขายปลีก', '1'),
(7, 'G', 'ทั่วไป', '1');

-- --------------------------------------------------------

--
-- Table structure for table `deliver`
--

DROP TABLE IF EXISTS `deliver`;
CREATE TABLE IF NOT EXISTS `deliver` (
  `id` int NOT NULL AUTO_INCREMENT,
  `warehouse_id` int DEFAULT NULL,
  `deliver_details` text,
  PRIMARY KEY (`id`),
  KEY `fk_deliver_warehouse1_idx` (`warehouse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department_code` varchar(20) NOT NULL COMMENT 'รหัสแผนก',
  `department_name` varchar(100) NOT NULL COMMENT 'ชื่อแผนก',
  `department_details` text COMMENT 'รายละเอียดแผนก',
  `department_color` varchar(20) DEFAULT NULL COMMENT 'สีของแผนก',
  `department_manager` varchar(45) DEFAULT NULL COMMENT 'ผู้จัดการแผนก',
  `department_head` varchar(45) DEFAULT NULL COMMENT 'หัวหน้าแผนก',
  `department_email` varchar(45) DEFAULT NULL COMMENT 'อีเมลของแผนก',
  `department_tel` varchar(45) DEFAULT NULL COMMENT 'เบอร์โทรของแผนก',
  `department_token` varchar(45) DEFAULT NULL COMMENT 'รหัสโทเค่น',
  `actived` int DEFAULT NULL COMMENT 'เปิดใช้งาน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `location_name` varchar(200) NOT NULL COMMENT 'สถานที่',
  `actived` int DEFAULT NULL COMMENT 'เปิดใช้งาน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`, `actived`) VALUES
(1, 'ท่าเรือสินธนโชติ', 1),
(2, 'สนามบินสุวรรณภูมิ', 1),
(3, 'ไทย นิปปอน', 1),
(4, 'สิงห์คามิดะ', 1),
(5, 'Kameda', 1),
(6, 'คลังนวนคร', 1),
(7, 'รับเองหน้าโรงงาน', 1),
(8, 'ท่าเรือ', 1),
(9, 'ไทยนิคเคน ระยอง', 1),
(10, 'EHI TOKAI รับระหว่างทาง', 1),
(11, 'สินวารี ระยอง', 1);

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sale_order_id` int DEFAULT NULL COMMENT 'เลขที่ใบสั่งขาย',
  `planning_details` text,
  PRIMARY KEY (`id`),
  KEY `fk_planning_sale_order1_idx` (`sale_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_code` varchar(45) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_details` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_code`, `product_name`, `product_details`) VALUES
(1, 'FJEX-K0001', 'JOHIN EXTRA 1,000 L', NULL),
(2, 'FJEX-K0002', 'JOHIN EXTRA 1,000 L (For Thai Nikken Foods)', NULL),
(3, 'FJEX-A2003', 'Johin Extra soy sauce (gluten free) 200 Liter', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

DROP TABLE IF EXISTS `production`;
CREATE TABLE IF NOT EXISTS `production` (
  `id` int NOT NULL AUTO_INCREMENT,
  `planning_id` int DEFAULT NULL,
  `production_details` text,
  PRIMARY KEY (`id`),
  KEY `fk_production_planning1_idx` (`planning_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

DROP TABLE IF EXISTS `product_list`;
CREATE TABLE IF NOT EXISTS `product_list` (
  `sale_order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `delivery_start` varchar(45) DEFAULT NULL COMMENT 'วันที่ส่ง',
  `delivery_end` varchar(45) DEFAULT NULL COMMENT 'วันที่ถึง',
  `quantity` int DEFAULT NULL COMMENT 'จำนวน',
  `counting_unit_id` int DEFAULT NULL COMMENT 'หน่วยนับ',
  `location_id` int DEFAULT NULL COMMENT 'สถานที่',
  `ref` varchar(45) DEFAULT NULL COMMENT 'อ้างอิง',
  KEY `fk_sale_order_has_product_location1_idx` (`location_id`),
  KEY `fk_sale_order_has_product_counting_unit1_idx` (`counting_unit_id`),
  KEY `fk_product_list_product1_idx` (`product_id`),
  KEY `fk_product_list_sale_order1_idx` (`sale_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

DROP TABLE IF EXISTS `sale_order`;
CREATE TABLE IF NOT EXISTS `sale_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status_id` int NOT NULL,
  `created_at` varchar(45) DEFAULT NULL COMMENT 'วันที่',
  `updated_at` varchar(45) DEFAULT NULL COMMENT 'ปรับปรุง',
  `created_by` varchar(45) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_by` varchar(45) DEFAULT NULL COMMENT 'ปรับปรุงโดย',
  `order_number` varchar(45) DEFAULT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `customer_id` int DEFAULT NULL COMMENT 'ลูกค้า',
  `title` varchar(255) DEFAULT NULL COMMENT 'หัวเรื่อง',
  `details` text COMMENT 'รายละเอียด',
  `ref` varchar(45) DEFAULT NULL COMMENT 'อ้างอิง',
  `remask` text COMMENT 'หมายเหตุ',
  PRIMARY KEY (`id`),
  KEY `fk_sale_order_status1_idx` (`status_id`),
  KEY `fk_sale_order_customer1_idx` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sale_order`
--

INSERT INTO `sale_order` (`id`, `status_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `order_number`, `customer_id`, `title`, `details`, `ref`, `remask`) VALUES
(1, 1, '1643267082', '1643267082', '1', '1', 'SO-6601-0001', 1, 'การทดสอบใบสั่งขาย ซีอิ้ว', 'รายละเอียดการทดสอบใบสั่งขาย', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status_code` varchar(20) NOT NULL COMMENT 'รหัสสถานะ',
  `status_name` varchar(100) NOT NULL COMMENT 'ชื่อสถานะ',
  `status_details` text COMMENT 'รายละเอียดสถานะ',
  `status_color` varchar(20) DEFAULT NULL COMMENT 'สีของสถานะ',
  `actived` int DEFAULT NULL COMMENT 'เปิดใช้งาน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_code`, `status_name`, `status_details`, `status_color`, `actived`) VALUES
(1, 'New Order', 'ใหม่', NULL, NULL, NULL),
(2, 'Planning', 'วางแผน', NULL, NULL, NULL),
(3, 'Production', 'ผลิต', NULL, NULL, NULL),
(4, 'Waiting Result', 'รอผลเชื้อ', NULL, NULL, NULL),
(5, 'Result Pass', 'ผลเชื้อผ่าน', NULL, NULL, NULL),
(6, 'Result Not Pass', 'ผลเชื้อไม่ผ่าน', NULL, NULL, NULL),
(7, 'On Hold', 'ระงับ', NULL, NULL, NULL),
(8, 'Reject', 'ทิ้ง', NULL, NULL, NULL),
(9, 'Reprocess', 'นำมาผลิตใหม่', NULL, NULL, NULL),
(10, 'Warehouse', 'คลังสินค้า', NULL, NULL, NULL),
(11, 'Deliver', 'ส่งมอบ', NULL, NULL, NULL),
(12, 'Success', 'ส่งมอบสำเร็จ', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE IF NOT EXISTS `warehouse` (
  `id` int NOT NULL AUTO_INCREMENT,
  `production_id` int DEFAULT NULL,
  `warehouse_details` text,
  PRIMARY KEY (`id`),
  KEY `fk_warehouse_production1_idx` (`production_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_customer_type1` FOREIGN KEY (`customer_type_id`) REFERENCES `customer_type` (`id`);

--
-- Constraints for table `deliver`
--
ALTER TABLE `deliver`
  ADD CONSTRAINT `fk_deliver_warehouse1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`);

--
-- Constraints for table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `fk_planning_sale_order1` FOREIGN KEY (`sale_order_id`) REFERENCES `sale_order` (`id`);

--
-- Constraints for table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `fk_production_planning1` FOREIGN KEY (`planning_id`) REFERENCES `planning` (`id`);

--
-- Constraints for table `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `fk_product_list_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_product_list_sale_order1` FOREIGN KEY (`sale_order_id`) REFERENCES `sale_order` (`id`),
  ADD CONSTRAINT `fk_sale_order_has_product_counting_unit1` FOREIGN KEY (`counting_unit_id`) REFERENCES `counting_unit` (`id`),
  ADD CONSTRAINT `fk_sale_order_has_product_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD CONSTRAINT `fk_sale_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_sale_order_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `fk_warehouse_production1` FOREIGN KEY (`production_id`) REFERENCES `production` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
