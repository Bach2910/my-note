<?php
require_once __DIR__ . '/../../config/config.php';

class Classes {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    // Lấy tất cả lớp
    public function getAllClasses() {
        $stmt = $this->pdo->query("SELECT * from classes");
        return $stmt->fetchAll();
    }

    // Thêm lớp
    public function addClass($data) {
        $stmt = $this->pdo->prepare("INSERT INTO classes (class_name, description) VALUES (?, ?)");
        return $stmt->execute([
            $data['class_name'],
            $data['description'],
        ]);
    }
    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM classes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE classes SET class_name = ?, description = ? WHERE id = ?");
        return $stmt->execute([$data['class_name'], $data['description'], $id]);
    }

    // Xóa lớp
    public function deleteClass($id) {
        $stmt = $this->pdo->prepare("DELETE FROM classes WHERE id = ?");
        return $stmt->execute([$id]);
    }

}