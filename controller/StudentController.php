<?php
require_once 'model/Student.php';

class StudentController {
    private $studentModel;

    public function __construct() {
        $this->studentModel = new Student();
    }

    public function index() {
        $students = $this->studentModel->getAll();
        include 'view/students/index.php';
    }

    public function create() {
        include 'view/students/create.php';
    }

    public function store() {
        $uploadedImages = $this->uploadImages($_FILES['images']);

        if (empty($uploadedImages)) {
            echo "Không upload được ảnh nào!";
            exit;
        }

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'class_id' => $_POST['class_id'],
            'images' => json_encode($uploadedImages)
        ];

        $this->studentModel->create($data);
        header('Location: index.php');
    }

    public function edit($id) {
        $student = $this->studentModel->find($id);
        include 'view/students/edit.php';
    }

    public function update($id) {
        $student = $this->studentModel->find($id); // 👈 Tìm dữ liệu cũ trước

        $uploadedImages = $this->uploadImages($_FILES['images']);

        if (!empty($uploadedImages)) {
            // Có upload ảnh mới
            $images = $uploadedImages;
        } else {
            // Không upload ảnh mới => dùng ảnh cũ
            $images = json_decode($student['images'], true);
        }

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'class_id' => $_POST['class_id'],
            'images' => json_encode($images)
        ];

        $this->studentModel->update($id, $data);
        header('Location: index.php');
    }

    public function delete($id) {
        $this->studentModel->delete($id);
        header('Location: index.php');
    }

    private function uploadImages($files) {
        $uploadedImages = [];
        $allowedSize = 2 * 1024 * 1024; // 2MB

        if (!isset($files['name']) || empty($files['name'][0])) {
            return []; // Không có file nào upload
        }

        foreach ($files['name'] as $key => $name) {
            $tmpName = $files['tmp_name'][$key];
            $size = $files['size'][$key];

            if ($size > $allowedSize || empty($tmpName)) {
                continue;
            }

            $targetDir = "uploads/";
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $filename = time() . '_' . basename($name);
            $targetFile = $targetDir . $filename;

            if (move_uploaded_file($tmpName, $targetFile)) {
                $uploadedImages[] = $targetFile; // lưu luôn đường dẫn uploads/xxx
            }
        }
        return $uploadedImages;
    }
}
?>
