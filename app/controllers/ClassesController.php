<?php
require_once __DIR__ . '/../models/Classes.php';
session_start();
class ClassesController
{
    private $classModel;

    public function __construct()
    {
        $this->classModel = new Classes();
    }

    // Hiển thị danh sách lớp
    public function index()
    {
        $classes = $this->classModel->getAllClasses();
        require_once __DIR__ . '/../views/classes/index.php';
    }

    // Hiển thị form thêm lớp
    public function create()
    {
        require_once __DIR__ . '/../views/classes/add.php';
    }

    // Lưu lớp mới
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'class_name' => $_POST['class_name'] ?? '',
                'description' => $_POST['description'] ?? ''
            ];
            $class_name = $data['class_name'];

            if ($this->classModel->classExists($class_name)) {
                $_SESSION['class_error'] = "Tên lớp đã tồn tại. Vui lòng chọn tên khác.";
                $_SESSION['old_input'] = $data;
                header("Location: index.php?controller=classes&action=create");
                exit();
            }
            $this->classModel->addClass($data);
            header("Location: index.php?controller=classes&action=index");
            exit();
        }
    }


    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $classes = $this->classModel->findById($id);
        require_once __DIR__ . '/../views/classes/edit.php';
    }

    // Cập nhật lớp
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $data = [
                'class_name' => $_POST['class_name'],
                'description' => $_POST['description']
            ];
            $class_name = $data['class_name'];
            if ($this->classModel->classExists($class_name)) {
                $_SESSION['class_error'] = "Tên lớp đã tồn tại. Vui lòng chọn tên khác.";
                $_SESSION['old_input'] = $data; // Lưu lại dữ liệu cũ để hiển thị lại
                header("Location: index.php?controller=classes&action=edit&id={$id}");
                exit();
            }
            $this->classModel->update($id, $data);
            header("Location: index.php?controller=classes&action=index");
            exit();
        }
    }

    // Xóa lớp
    public function delete()
    {
        $id = $_GET['id'];
        $this->classModel->deleteClass($id);
        header("Location: index.php?controller=classes&action=index");
        exit();
    }

}