-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for student_management
CREATE DATABASE IF NOT EXISTS `student_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `student_management`;

-- Dumping structure for table student_management.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table student_management.classes: ~10 rows (approximately)
INSERT INTO `classes` (`id`, `class_name`, `description`, `created_at`) VALUES
	(2, 'CNTT K21B', 'Lớp Công nghệ thông tin khóa 21B', '2025-05-09 04:33:57'),
	(3, 'QTKD K22A', 'Lớp Quản trị kinh doanh khóa 22A', '2025-05-09 04:33:57'),
	(5, 'KT K20A', 'Lớp Kế toán khóa 20A', '2025-05-09 04:33:57'),
	(6, 'KT K20B', 'Lớp Kế toán khóa 20B', '2025-05-09 04:33:57'),
	(7, 'SP Toán K23', 'Lớp Sư phạm Toán khóa 23', '2025-05-09 04:33:57'),
	(8, 'SP Văn K23', 'Lớp Sư phạm Văn khóa 23', '2025-05-09 04:33:57'),
	(9, 'CNTT K22C', 'Lớp Công nghệ thông tin khóa 22C', '2025-05-09 04:33:57'),
	(10, 'QTKD K23A', 'Lớp Quản trị kinh doanh khóa 23A', '2025-05-09 04:33:57'),
	(11, 'QTKD 323', 'sadadwdwadasdadwad', '2025-05-09 05:53:32'),
	(12, 'QTKD 32242', 'ds', '2025-05-19 08:21:47');

-- Dumping structure for table student_management.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `student_code` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `class_id` int DEFAULT NULL,
  `images` text COMMENT 'Danh sách ảnh, cách nhau bởi dấu phẩy',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table student_management.students: ~14 rows (approximately)
INSERT INTO `students` (`id`, `name`, `email`, `phone`, `address`, `student_code`, `class_id`, `images`, `created_at`) VALUES
	(1, 'Nguyễn Văn A', 'nguyenvana@example.com', 'Hà Nội', '0901234567', 'SV001', NULL, 'assets/uploads/1746769982_IMG_E5951.JPG,assets/uploads/1746769982_DSC03686-2.jpg', '2025-05-09 05:52:50'),
	(2, 'Trần Thị B', 'tranthib@example.com', '0912345678', 'TP.HCM', 'SV002', 2, 'b1.jpg,b2.jpg', '2025-05-09 05:52:50'),
	(3, 'Lê Văn C', 'levanc@example.com', '0923456789', 'Đà Nẵng', 'SV003', 3, 'c1.jpg', '2025-05-09 05:52:50'),
	(4, 'Phạm Thị D', 'phamthid@example.com', '0934567890', 'Cần Thơ', 'SV004', NULL, 'd1.jpg,d2.jpg,d3.jpg', '2025-05-09 05:52:50'),
	(5, 'Hoàng Văn E', 'hoangvane@example.com', '0945678901', 'Hải Phòng', 'SV005', 5, 'e1.jpg', '2025-05-09 05:52:50'),
	(6, 'Đỗ Thị F', 'dothif@example.com', '0956789012', 'Huế', 'SV006', 6, 'f1.jpg,f2.jpg', '2025-05-09 05:52:50'),
	(7, 'Vũ Văn G', 'vuvang@example.com', '0967890123', 'Nghệ An', 'SV007', 7, 'g1.jpg', '2025-05-09 05:52:50'),
	(8, 'Ngô Thị H', 'ngothih@example.com', '0978901234', 'Thanh Hóa', 'SV008', 8, 'h1.jpg,h2.jpg', '2025-05-09 05:52:50'),
	(9, 'Bùi Văn I', 'buivani@example.com', '0989012345', 'Quảng Ninh', 'SV009', 9, 'i1.jpg,i2.jpg', '2025-05-09 05:52:50'),
	(10, 'Đặng Thị K', 'dangthik@example.com', '0990123456', 'Bình Dương', 'SV010', 10, 'k1.jpg', '2025-05-09 05:52:50'),
	(11, 'Nguyễn Văn A', 'lucas40@hotmail.com', '12333333333333333', 'Elwyn Dibbert', '1225', NULL, 'assets/uploads/1746771224_IMG_E5951.JPG,assets/uploads/1746771224_DSC03686-2.jpg', '2025-05-09 06:13:44'),
	(12, 'Nguyễn Văn A', 'a@gmail.com', '12333333333333333', 'dsadadasdsa', '4312', 3, 'assets/uploads/1746772222_IMG_E5951.JPG', '2025-05-09 06:30:22'),
	(13, 'Nguyễn Văn A', 'emsamdamd111@gmail.com', '0904186901', 'Ha noi', '1423', 5, 'assets/uploads/1747643325_IMG_E5951.JPG', '2025-05-19 08:28:45'),
	(14, 'bach', 'emsamdamd1a11@gmail.com', '0904186901', 'Ha noi', '4143', 5, 'assets/uploads/1747643459_IMG_E5951.JPG', '2025-05-19 08:30:59');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
