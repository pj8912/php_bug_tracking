<?php


class Database
{
    private $host = "localhost", $uname = "root", $pwd = "", $dbname = "php_bug_tracking";

    private $pdo;

    public function connect()
    {
        try {

            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->uname, $this->pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "DB_ERR:" . $e->getMessage();
        }
    }
}


