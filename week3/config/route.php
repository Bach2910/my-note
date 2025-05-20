<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'student';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

require_once "../app/controllers/" . ucfirst($controller) . "Controller.php";
$className = ucfirst($controller) . "Controller";

$instance = new $className();

if (isset($_GET['id'])) {
    $instance->$action($_GET['id']);
} else {
    $instance->$action();
}
?>