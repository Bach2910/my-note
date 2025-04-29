<?php
require_once 'model/Classes.php';
Class ClassesController {
    private $clasesModel;

    public function __construct() {
        $this->clasesModel = new Student();
    }
    public function index() {
        $students = $this->clasesModel->getAll();
        include 'view/students/create.php';
    }
}