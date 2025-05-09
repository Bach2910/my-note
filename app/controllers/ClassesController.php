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

      public function index()
    {
        $classes = $this->classModel->getAllClasses();
        require_once __DIR__ . '/../views/classes/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/classes/add.php';
    }

     public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'class_name' => $_POST['class_name'] ?? '',
                'description' => $_POST['description'] ?? ''
            ];
            $class_name = $data['class_name'];
            if (empty($_POST['description'])) {
                $_SESSION['errors']['description'] = 'Enter your description';
            }
            if (empty($_POST['class_name'])) {
                $_SESSION['errors']['class_name'] = 'Enter your class name';
            }
            if (!empty($_SESSION['errors'])) {
                $_SESSION['old_input'] = $data;
                header("Location: index.php?controller=classes&action=create");
                exit();
            }
            if ($this->classModel->classExists($class_name)) {
                $_SESSION['class_error'] = "Tên lớp đã tồn tại. Vui lòng chọn tên khác.";
                $_SESSION['old_input'] = $data;
                header("Location: index.php?controller=classes&action=create");
                exit();
            }
            $classes = new Classes();
            if($classes->addClass($data)){
                unset($_SESSION['old_input']);
                header("Location: index.php?controller=classes&action=index");
                exit();
            };

        }
    }

    public function edit($id)
    {
        $classes = $this->classModel->findById($id);
        require_once __DIR__ . '/../views/classes/edit.php';
    }
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
                $_SESSION['old_input'] = $data;
                header("Location: index.php?controller=classes&action=edit&id={$id}");
                exit();
            }
            $this->classModel->update($id, $data);
            header("Location: index.php?controller=classes&action=index");
            exit();
        }
    }
        public function delete()
    {
        $id = $_GET['id'];
        $this->classModel->deleteClass($id);
        header("Location: index.php?controller=classes&action=index");
        exit();
    }
    public function show($class_id){
        $students = $this->classModel->listStudent($class_id);
        require_once __DIR__ . '/../views/classes/show.php';
    }
}