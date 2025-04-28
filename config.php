<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "student_manager";
    public $conn;
    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->exec("set names utf8");

        }catch(PDOException $e){
            echo "Connection". $e->getMessage();
        }
        return $this->conn;
    }
}