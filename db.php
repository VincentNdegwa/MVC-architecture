<?php
class Connection
{
    private $host = 'localhost';
    private $db = 'MVC';
    private $user = 'vincent-pc';
    private $password = 'vincent-pc';
    public $conn;
    public $dbError;

    private $dsn;

    public function __construct()
    {
        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=UTF8";
        // print_r($this->dsn. "<br>");
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            return true;
        } catch (PDOException $th) {
            $this->dbError = $th;
            // echo $this->dbError;
            return false;
        }
    }
}
