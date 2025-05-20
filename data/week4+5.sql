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

-- Dumping data for table laravel03.cache: ~1 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel_cache_spatie.permission.cache', 'a:3:{s:5:"alias";a:4:{s:1:"a";s:2:"id";s:1:"b";s:4:"name";s:1:"c";s:10:"guard_name";s:1:"r";s:5:"roles";}s:11:"permissions";a:5:{i:0;a:4:{s:1:"a";i:1;s:1:"b";s:6:"create";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:"a";i:2;s:1:"b";s:4:"edit";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:"a";i:3;s:1:"b";s:6:"delete";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:"a";i:4;s:1:"b";s:4:"view";s:1:"c";s:3:"web";s:1:"r";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:4;a:4:{s:1:"a";i:5;s:1:"b";s:5:"admin";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}}s:5:"roles";a:3:{i:0;a:3:{s:1:"a";i:1;s:1:"b";s:5:"admin";s:1:"c";s:3:"web";}i:1;a:3:{s:1:"a";i:2;s:1:"b";s:7:"teacher";s:1:"c";s:3:"web";}i:2;a:3:{s:1:"a";i:3;s:1:"b";s:7:"student";s:1:"c";s:3:"web";}}}', 1747792453);

-- Dumping data for table laravel03.cache_locks: ~0 rows (approximately)

-- Dumping data for table laravel03.classrooms: ~11 rows (approximately)
INSERT INTO `classrooms` (`id`, `department_id`, `class_code`, `name`, `course_year`, `max_students`, `created_at`, `updated_at`) VALUES
	(1, 3, 'Dr. June Rodriguez', 'CNTT0', '1979', 49, NULL, NULL),
	(2, 3, 'Lamar Bednar', 'CNTT1', '2020', 37, NULL, NULL),
	(3, 3, 'Marjolaine Abbott', 'CNTT2', '2018', 48, NULL, NULL),
	(4, 2, 'Dr. Zola Beier', 'CNTT3', '1987', 45, NULL, NULL),
	(5, 2, 'Casandra Tromp', 'CNTT4', '2018', 34, NULL, NULL),
	(6, 5, 'Luz Johnson', 'CNTT5', '2020', 34, NULL, NULL),
	(7, 5, 'Twila West III', 'CNTT6', '2022', 40, NULL, NULL),
	(8, 1, 'Desmond Hudson', 'CNTT7', '1983', 30, NULL, NULL),
	(9, 1, 'Mr. Cyril Hammes', 'CNTT8', '2014', 44, NULL, NULL),
	(10, 1, 'Destinee Tillman', 'CNTT9', '2005', 30, NULL, NULL),
	(11, 4, 'Frieda Orn', 'CNTT10', '2003', 43, NULL, NULL);

-- Dumping data for table laravel03.departments: ~5 rows (approximately)
INSERT INTO `departments` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
	(1, 'Công nghệ thông tin', 'CNTT', NULL, NULL),
	(2, 'Quản trị kinh doanh', 'QTKD', NULL, NULL),
	(3, 'Khoa học máy tính', 'KHTN', NULL, NULL),
	(4, 'Hệ thống thông tin', 'HTTT', NULL, NULL),
	(5, 'An ninh mạng', 'ANM', NULL, NULL);

-- Dumping data for table laravel03.failed_jobs: ~0 rows (approximately)

-- Dumping data for table laravel03.jobs: ~0 rows (approximately)

-- Dumping data for table laravel03.job_batches: ~0 rows (approximately)

-- Dumping data for table laravel03.migrations: ~8 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_05_06_013457_create_departments_table', 1),
	(5, '2025_05_06_025021_create_classrooms_table', 1),
	(6, '2025_05_07_021444_create_students_table', 1),
	(7, '2025_05_12_060430_create_permission_tables', 1),
	(8, '2025_05_14_092525_create_personal_access_tokens_table', 1);

-- Dumping data for table laravel03.model_has_permissions: ~0 rows (approximately)

-- Dumping data for table laravel03.model_has_roles: ~3 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(1, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 3);

-- Dumping data for table laravel03.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table laravel03.permissions: ~5 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'create', 'web', '2025-05-19 18:52:51', '2025-05-19 18:52:51'),
	(2, 'edit', 'web', '2025-05-19 18:52:51', '2025-05-19 18:52:51'),
	(3, 'delete', 'web', '2025-05-19 18:52:51', '2025-05-19 18:52:51'),
	(4, 'view', 'web', '2025-05-19 18:52:51', '2025-05-19 18:52:51'),
	(5, 'admin', 'web', '2025-05-19 18:52:51', '2025-05-19 18:52:51');

-- Dumping data for table laravel03.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table laravel03.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2025-05-19 18:52:51', '2025-05-19 18:52:51'),
	(2, 'teacher', 'web', '2025-05-19 18:52:51', '2025-05-19 18:52:51'),
	(3, 'student', 'web', '2025-05-19 18:52:51', '2025-05-19 18:52:51');

-- Dumping data for table laravel03.role_has_permissions: ~10 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(4, 3);

-- Dumping data for table laravel03.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('OxE3Y3rGahJ1JFqSZQKDJTPfp6qIcsxeF8gebOP7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUEw4aERuTlBuN2VOU0p1SnNUN0ZSOUh2VmRVSGVoMDVlNmtYdFlJTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1747737497);

-- Dumping data for table laravel03.students: ~11 rows (approximately)
INSERT INTO `students` (`id`, `classroom_id`, `student_code`, `full_name`, `gender`, `birth_date`, `email`, `phone`, `image`, `address`, `created_at`, `updated_at`) VALUES
	(1, 3, '4087', 'Mrs. Olga Mitchell I', 'male', '1997-02-12', 'kjakubowski@yahoo.com', '1-512-582-9028', 'https://via.placeholder.com/640x480.png/0055cc?text=fuga', '919 Dach Junction Suite 646\nPort Reynamouth, OH 65400-8001', NULL, NULL),
	(2, 3, '6996', 'Keira Morar PhD', 'female', '1986-09-13', 'beulah21@gmail.com', '870-858-8410', 'https://via.placeholder.com/640x480.png/0011dd?text=ut', '3253 Elisha Via Apt. 340\nWolfberg, OR 24939-0404', NULL, NULL),
	(3, 9, '1520', 'Dr. Corbin Prosacco', 'female', '1986-07-27', 'wswaniawski@hamill.net', '+1 (754) 330-2319', 'https://via.placeholder.com/640x480.png/002299?text=doloribus', '4039 Keira Summit\nNorth Eve, NY 00137', NULL, NULL),
	(4, 8, '6118', 'Miss Sonya Hessel', 'female', '1994-06-22', 'rstreich@hotmail.com', '872-413-7089', 'https://via.placeholder.com/640x480.png/00aacc?text=numquam', '2596 Lynch Shores Apt. 662\nMcLaughlinport, ME 85220', NULL, NULL),
	(5, 4, '9417', 'Marcos Purdy MD', 'male', '2010-10-13', 'borer.nyah@hotmail.com', '508-646-1111', 'https://via.placeholder.com/640x480.png/004488?text=illum', '8843 Naomie Mountains Apt. 913\nSouth Jameson, SC 76156-2452', NULL, NULL),
	(6, 5, '5899', 'Prof. Erika Miller Jr.', 'female', '2024-05-02', 'rmcdermott@goyette.com', '513.357.5475', 'https://via.placeholder.com/640x480.png/007733?text=nobis', '3191 Sabina Point Suite 151\nNoemibury, MI 68265-5143', NULL, NULL),
	(7, 4, '9204', 'Ms. Bethel Trantow I', 'female', '2009-09-10', 'logan54@gmail.com', '781-638-3154', 'https://via.placeholder.com/640x480.png/0044ff?text=sed', '2720 Ankunding Gateway\nVictoriastad, PA 65840-7097', NULL, NULL),
	(8, 9, '4320', 'Laura Davis Jr.', 'male', '2011-12-17', 'kristopher27@orn.org', '347.948.2728', 'https://via.placeholder.com/640x480.png/00aa55?text=reiciendis', '9648 Gleason Forge\nPort Imeldaside, AL 22373', NULL, NULL),
	(9, 1, '8907', 'Magdalena Tillman PhD', 'male', '2014-08-18', 'rjohns@mueller.com', '+1 (540) 805-0064', 'https://via.placeholder.com/640x480.png/0022aa?text=mollitia', '778 Chance Common\nEichmannfort, NH 22486', NULL, NULL),
	(10, 4, '7095', 'Ms. Maxie Brown', 'male', '1972-01-26', 'ibaumbach@yahoo.com', '743.462.9699', 'uploads/1747710591_682bf27f2c671.jpg', '93684 Katherine BrooksLucianoborough, UT 31853-4259', NULL, '2025-05-19 20:09:51'),
	(11, 4, '9469', 'Toby Labadie DDS', 'female', '2008-10-06', 'cjacobi@gmail.com', '+1-727-937-6214', 'uploads/1747712482_682bf9e2f1a61.jpg,uploads/1747712482_682bf9e2f1d64.jpg', '1428 Mathias Turnpike Suite 241South Victoriahaven, WI 35802-0002', NULL, '2025-05-19 20:41:22');

-- Dumping data for table laravel03.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@example.com', NULL, '$2y$12$aEO4eXNL/asdT5oQsrSD9.0SEVwWvzPNbN0DG8WxIm9pCkq89zoA.', NULL, '2025-05-19 18:53:00', '2025-05-19 18:53:00'),
	(2, 'student', 'student@example.com', NULL, '$2y$12$PzEh/U6wo3frwX/LFMhzeuWDfWHrdx5MATsjRu4zRI3rFDjH/QQgu', NULL, '2025-05-19 18:53:01', '2025-05-19 18:53:01'),
	(3, 'teacher', 'teacher@example.com', NULL, '$2y$12$2ab1NWG1bZi4usYjP9gPHeguax7qO7KNziCTfpkBoTbj9WUO0gBYK', NULL, '2025-05-19 18:53:01', '2025-05-19 18:53:01');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
