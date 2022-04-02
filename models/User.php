<?php
class User
{
    public $table = "users";

    private $conn;

    public $email;
    public $user_name;
    public $user_mobile;
    public $user_pwd;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function checkIfUserAlreadyExist()
    {
        $sql = "SELECT * FROM  {$this->table } WHERE email = :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        return $stmt;
    }

    public function createUser(){
        
        $sql = "INSERT INTO {$this->table}(user_name, user_mobile, email, user_pwd) VALUES(:user_name, :user_mobile, :email, :user_pwd)";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':user_name', $this->user_name);
        $stmt->bindParam(':user_mobile', $this->user_mobile);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':user_pwd', $this->user_pwd);
        
        $stmt->execute();
    }
}
