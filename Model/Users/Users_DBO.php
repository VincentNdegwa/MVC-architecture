<?php
include("../../db.php");
class UserDBO
{

    public $query;
    public $conn;
    public $lastInsertId;
    public $error;
    public $stmt;

    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->conn;
        if (!$this->conn) {
            $this->error="failed to connect";
        }
    }
    
    public function insert($obj)
    {
        $this->query = "INSERT INTO users(name,age,password)VALUES(:name,:age,:password)";

        try {
            $this->stmt = $this->conn->prepare($this->query);
            $this->stmt->bindParam(':name', $obj->name);
            $this->stmt->bindParam(':age', $obj->age);
            $this->stmt->bindParam(':password', md5($obj->password));

            $this->stmt->execute();
            $this->lastInsertId = $this->conn->lastInsertId();
            return true;
        } catch (PDOException $th) {
            $this->error = $th->getMessage();
            return false;
        }
    }
}
