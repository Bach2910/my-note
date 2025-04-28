<?php
require_once __DIR__ . "/../config.php";

class Student
{
    private $conn;
    private $table_name = "students";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll()
    {
        $query = "SELECT students.*, classes.class_name 
                  FROM {$this->table_name} 
                  LEFT JOIN classes ON students.class_id = classes.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = "INSERT INTO {$this->table_name} (name, email, class_id, images) VALUES (:name, :email, :class_id, :images)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':class_id' => $data['class_id'],
            ':images' => $data['images'] // ❗ Bỏ json_encode ở đây
        ]);
    }

    public function find($id)
    {
        $query = "SELECT * FROM {$this->table_name} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $query = "UPDATE {$this->table_name} 
                  SET name = :name, email = :email, class_id = :class_id, images = :images
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':class_id' => $data['class_id'],
            ':images' => $data['images'], // ❗ Bỏ json_encode ở đây
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    public function uploadImages($files)
    {
        $uploadedImages = [];
        $allowedSize = 2 * 1024 * 1024; // 2MB

        foreach ($files['name'] as $key => $name) {
            $tmpName = $files['tmp_name'][$key];
            $size = $files['size'][$key];

            if ($size > $allowedSize) {
                continue;
            }

            $targetDir = __DIR__ . "/../uploads/"; // ✅ Sửa đúng thư mục 'uploads/' như bạn muốn
            if (!is_dir($targetDir)) {
                @mkdir($targetDir, 0777, true);
            }

            $filename = time() . '_' . basename($name);
            $targetFile = $targetDir . $filename;

            if (move_uploaded_file($tmpName, $targetFile)) {
                $uploadedImages[] = "uploads/" . $filename; // ✅ Lưu đường dẫn tương đối luôn
            }
        }

        return $uploadedImages;
    }
}
?>
