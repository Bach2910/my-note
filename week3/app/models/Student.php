<?php
require_once __DIR__ . '/../../config/config.php';

class Student {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT students.*, classes.class_name FROM students LEFT JOIN classes ON students.class_id = classes.id");
        return $stmt->fetchAll();
    }

    public function store($data) {
        $stmt = $this->pdo->prepare("INSERT INTO students (name, email, phone, address,student_code, class_id, images) VALUES (?, ?, ?, ?, ?, ?,?)");
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['address'],
            $data['student_code'],
            $data['class_id'],
            $data['images']
        ]);
    }
    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE students SET name = ?, email = ?, phone = ?, address = ?,student_code = ?, class_id = ?, images = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['address'],$data['student_code'], $data['class_id'], $data['images'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM students WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function studentExists($studentCode, $id = null)
    {
        $query = "SELECT COUNT(*) FROM students WHERE student_code = :student_code";
        if ($id !== null) {
            $query .= " AND id != :id";
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':student_code', $studentCode);

        if ($id !== null) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    public function emailExists($email) {
        $query = "SELECT COUNT(*) FROM students WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
