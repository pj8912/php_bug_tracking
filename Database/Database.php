<?php


class Database
{
    private $host = "localhost", $uname = "root", $pwd = "", $dbname = "php_bug_tracking";
    protected $conn;


    public function connect()
    {
        try {

            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->uname, $this->pwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "DB_ERR:" . $e->getMessage();
        }
        return $this->conn;
    }
}


