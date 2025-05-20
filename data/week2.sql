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

-- Dumping data for table student.classes: ~13 rows (approximately)
INSERT INTO `classes` (`id`, `name`) VALUES
	(1, 'Lớp CNTT 5'),
	(2, 'Lớp CNTT 2'),
	(3, 'Lớp CNTT 3'),
	(4, 'Lớp Kế Toán 1'),
	(5, 'Lớp Kế Toán 2'),
	(6, 'Lớp Quản Trị KD 1'),
	(7, 'Lớp Quản Trị KD 2'),
	(8, 'Lớp Marketing 1'),
	(9, 'Lớp Marketing 2'),
	(10, 'Lớp Điện Tử 1'),
	(11, 'Nguyễn Văn A'),
	(12, 'QTKD 32'),
	(15, 'QTKD 3223');

-- Dumping data for table student.students: ~3 rows (approximately)
INSERT INTO `students` (`id`, `name`, `email`, `class_id`) VALUES
	(1, 'Nguyễn Văn F', 'emsamdamd111@gmail.com', 6),
	(2, 'Nguyễn Văn A', 'emsamdamd111@gmail.com', 5),
	(3, 'dsdasd', 'admin@example.com', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
