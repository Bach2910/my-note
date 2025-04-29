<?php
require_once __DIR__ . "/../config.php";

Class Classes {
    private $conn;
    private $table_name = "classes";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }
    public function getAll(){
        $sql = "SELECT * FROM $this->table_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}