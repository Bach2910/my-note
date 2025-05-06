<?php
require_once 'vendor/autoload.php';

// Kết nối DB
$pdo = new PDO("mysql:host=localhost;dbname=student_management;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$faker = Faker\Factory::create();

for ($i = 0; $i < 10; $i++) {
    $class_name = $faker->randomElement(['CNTT', 'QTKD', 'Kế toán', 'Luật', 'Marketing']) . ' ' . $faker->numberBetween(1, 10);
    $description = $faker->sentence();

    $stmt = $pdo->prepare("INSERT INTO classes (class_name, description) VALUES (?, ?)");
    $stmt->execute([$class_name, $description]);
}

echo "Đã thêm 10 dòng dữ liệu vào bảng classes.\n";