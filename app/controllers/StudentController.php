<?php
session_start();
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Classes.php';

class StudentController
{
    private $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function index()
    {
        $student = new Student();
        $students = $student->all();
        include __DIR__ . '/../views/students/index.php';
    }

    public function create()
    {
        $class = new Classes();  // Khởi tạo đúng lớp
        $classes = $class->getAllClasses();  // Lấy tất cả lớp học
        include __DIR__ . '/../views/students/add.php';
    }

    public function store()
    {

        $uploadPath = __DIR__ . '/../../public/assets/uploads/';
        $uploadedImages = [];
        $errors = [];

        if (!file_exists($uploadPath)) {
            @mkdir($uploadPath, 0777, true);
        }

        $maxFileSize = 5 * 1024 * 1024; // 5MB
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $originalName = $_FILES['images']['name'][$key];
            $fileSize = $_FILES['images']['size'][$key];
            $fileError = $_FILES['images']['error'][$key];
            $fileExtension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            if ($fileError !== UPLOAD_ERR_OK) {
                $errors[] = "Lỗi khi upload file: {$originalName}";
                continue;
            }

            // Kiểm tra định dạng file hợp lệ
            if (!in_array($fileExtension, $allowedExtensions)) {
                $errors[] = "Định dạng không hợp lệ cho file: {$originalName}";
                continue;
            }

            // Kiểm tra dung lượng file không vượt quá 5MB
            if ($fileSize > $maxFileSize) {
                $errors[] = "File quá lớn (quá 5MB): {$originalName}";
                continue;
            }

            // Đặt tên mới cho file để tránh trùng
            $filename = time() . '_' . basename($originalName);
            $target = $uploadPath . $filename;

            // Di chuyển file vào thư mục uploads
            if (move_uploaded_file($tmp_name, $target)) {
                $uploadedImages[] = 'assets/uploads/' . $filename;
            } else {
                $errors[] = "Không thể lưu file: {$originalName}";
            }
        }

        if (!empty($uploadedImages)) {
            echo "Đã upload thành công các file:<br>";
            foreach ($uploadedImages as $file) {
                echo htmlspecialchars($file) . "<br>";
            }
        }

        if (!empty($errors)) {
            $_SESSION['upload_errors'] = $errors;
            $_SESSION['old_input'] = $_POST;
            header("Location: index.php?controller=student&action=create");
            exit();
        } else {

            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'class_id' => $_POST['class_id'],
                'images' => implode(',', $uploadedImages)
            ];
            // Lưu dữ liệu vào cơ sở dữ liệu
            $student = new Student();
            $student->store($data);

            // Điều hướng về trang danh sách sinh viên
            header("Location: index.php?controller=student&action=index");
            exit();
        }
    }


    public function edit()
    {
        $id = $_GET['id'];
        $student = (new Student())->findById($id);
        $classes = (new Classes())->getAllClasses();
        include __DIR__ . '/../views/students/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $student = (new Student())->findById($id);
        $uploadedImages = [];

        $uploadPath = __DIR__ . '/../../public/assets/uploads/';
        if (!file_exists($uploadPath)) @mkdir($uploadPath, 0777, true);

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                $filename = time() . '_' . basename($_FILES['images']['name'][$key]);
                $target = $uploadPath . $filename;
                if (move_uploaded_file($tmp_name, $target)) {
                    $uploadedImages[] = 'assets/uploads/' . $filename;
                }
            }
        }

        $images = !empty($uploadedImages) ? implode(',', $uploadedImages) : $student['images'];

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'class_id' => $_POST['class_id'],
            'images' => $images
        ];

        (new Student())->update($id, $data);
        header("Location: index.php?controller=student&action=index");
        exit();
    }

    public function delete()
    {
        $id = $_GET['id'];
        (new Student())->delete($id);
        header("Location: index.php?controller=student&action=index");
        exit();
    }

}

