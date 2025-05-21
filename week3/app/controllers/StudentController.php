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
                if ($fileError == UPLOAD_ERR_NO_FILE) {
                    $errors[] = "Vui lòng chọn hình ảnh";
                    continue;
                } else {
                    $errors[] = "Lỗi khi upload file: {$originalName}";
                    continue;
                }
            }
            // Kiểm tra định dạng file hợp lệ
            if (!in_array($fileExtension, $allowedExtensions)) {
                $errors[] = "Định dạng không hợp lệ cho file: {$originalName}";
                continue;
            }

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
        $fields = [
            'name' => 'Enter your name',
            'email' => 'Enter your email',
            'phone' => 'Enter your phone',
            'address' => 'Enter your address',
            'student_code' => 'Enter your student_code',
            'class_id' => 'Enter your class_id',
        ];
        foreach ($fields as $field => $message) {
            if (empty($_POST[$field])) {
                $_SESSION['errors'][$field] = $message;
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
                'student_code' => $_POST['student_code'],
                'class_id' => $_POST['class_id'],
                'images' => implode(',', $uploadedImages)
            ];
            $student_code = $data['student_code'];
            $email = $data['email'];
            $student = new Student();
            if($student->studentExists($student_code)){
                $_SESSION['old_input'] = $_POST;
                $_SESSION['exits'] = 'Student code already exists';
                header("Location: index.php?controller=student&action=create");
                exit();
            }
            if($student->emailExists($email)){
                $_SESSION['old_input'] = $_POST;
                $_SESSION['exitEmail'] = 'Email already exists';
                header("Location: index.php?controller=student&action=create");
                exit();
            }
            if ($student->store($data)) {
                unset($_SESSION['old_input']);
                header("Location: index.php?controller=student&action=index");
                exit();
            };
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $student = $this->student->findById($id);
        $classes = (new Classes())->getAllClasses();
        include __DIR__ . '/../views/students/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $student = (new Student())->findById($id);
        $uploadedImages = [];
        $errors = [];

        $uploadPath = __DIR__ . '/../../public/assets/uploads/';
        if (!file_exists($uploadPath)) @mkdir($uploadPath, 0777, true);

        $maxFileSize = 5 * 1024 * 1024;
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
            if (!in_array($fileExtension, $allowedExtensions)) {
                $errors[] = "Định dạng không hợp lệ cho file: {$originalName}";
                continue;
            }
            if ($fileSize > $maxFileSize) {
                $errors[] = "File quá lớn (quá 5MB): {$originalName}";
                continue;
            }

            $filename = time() . '_' . basename($originalName);
            $target = $uploadPath . $filename;

            if (move_uploaded_file($tmp_name, $target)) {
                $uploadedImages[] = 'assets/uploads/' . $filename;
            } else {
                $errors[] = "Không thể lưu file: {$originalName}";
            }
        }

        if (!empty($errors)) {
            $_SESSION['upload_errors'] = $errors;
            $_SESSION['old_input'] = $_POST;
            header("Location: index.php?controller=student&action=edit&id={$id}");
            exit();
        }

        if (!empty($uploadedImages)) {
            if (!empty($student['images'])) {
                $oldImages = explode(',', $student['images']);
                foreach ($oldImages as $oldImage) {
                    $oldPath = __DIR__ . '/../../public/' . $oldImage;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }
        }

        $images = !empty($uploadedImages) ? implode(',', $uploadedImages) : $student['images'];

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'student_code' => $_POST['student_code'],
            'address' => $_POST['address'],
            'class_id' => $_POST['class_id'],
            'images' => $images
        ];

        $_SESSION['errors'] = [];
        $fields = [
            'name' => 'Enter your name',
            'email' => 'Enter your email',
            'phone' => 'Enter your phone',
            'address' => 'Enter your address',
            'student_code' => 'Enter your student_code',
            'class_id' => 'Enter your class_id',
        ];
        foreach ($fields as $field => $message) {
            if (empty($_POST[$field])) {
                $_SESSION['errors'][$field] = $message;
            }
        }
        $studentModel = new Student();
        if ($studentModel->studentExists($data['student_code'], $id)) {
            $_SESSION['old_input'] = $_POST;
            $_SESSION['exits'] = 'Student code already exists';
            header("Location: index.php?controller=student&action=edit&id={$id}");
            exit();
        }

        if (!empty($_SESSION['errors'])) {
            $_SESSION['old_input'] = $_POST;
            header("Location: index.php?controller=student&action=edit&id={$id}");
            exit();
        }

        $studentModel->update($id, $data);
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
