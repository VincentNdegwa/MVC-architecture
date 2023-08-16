<?php
include("../../db.php");
session_start();
class UserDBO
{

    public $query;
    public $conn;
    public $lastInsertId;
    public $error;
    public $message;
    public $stmt;
    public $returnedData;
    public $numbOfRows;

    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->conn;
        if (!$this->conn) {
            $this->error = "failed to connect";
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
            $this->message = "Dear $obj->name you successfully logged in";
            return true;
        } catch (PDOException $th) {
            $this->message = "";
            $this->error = $th->getMessage();
            return false;
        }
    }

    public function select($obj)
    {
        $this->query = "SELECT * FROM users WHERE name = :name AND password = :password";
        try {
            $this->stmt = $this->conn->prepare($this->query);
            $this->stmt->bindParam(":name", $obj->name);
            $this->stmt->bindParam(":password", md5($obj->password));
            $this->stmt->execute();
            $this->returnedData = $this->stmt->fetch(PDO::FETCH_OBJ);
            if ($this->returnedData !== false) {
                $this->message = "Dear $obj->name you successfully logged in";
                $this->numbOfRows = $this->stmt->rowCount();
                return $this->returnedData;
            } else {
                $this->error = "User $obj->name not found";
                return false;
            }
        } catch (PDOException $th) {
            $this->error = $th->getMessage();
            return false;
        }
    }
}
