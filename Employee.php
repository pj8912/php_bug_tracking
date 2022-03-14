<?php

class Employee
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public $name, $job_type, $email, $phone;

    private $table = "employees";
    public function createEmployee()
    {
        $sql = "INSERT INTO {$this->table}(e_name, job_type, email, phone_number)
        VALUES(:e_name, :job_type, :email, :phone_number)";

        $stmt = $this->conn->prepare($sql);


        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->job_type = htmlspecialchars(strip_tags($this->job_type));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));

        $stmt->bindParam(':e_name', $this->name);
        $stmt->bindParam(':job_type', $this->job_type);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone_number', $this->phone);

        $stmt->execute();
    }

    public function readAll()
    {
        $sql = "SELECT  * FROM employees";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }

    
}
