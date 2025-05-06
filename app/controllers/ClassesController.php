<?php
require_once __DIR__ . '/../models/Classes.php';

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

            $this->classModel->addClass($data);
            header("Location: index.php?controller=classes&action=index");
            exit();
        }
    }


    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $classes = $this->classModel->findById($id); // Lấy lớp theo ID
        require_once __DIR__ . '/../views/classes/edit.php'; // Hiển thị form chỉnh sửa
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