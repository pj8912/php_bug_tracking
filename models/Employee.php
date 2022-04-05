<?php

class Employee
{
    private $conn;


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public $name, $role, $email, $phone;

    private $table = "employees";

    public $eid;


    public function createEmployee()
    {
        $sql = "INSERT INTO {$this->table}(e_name, role, email, phone_number)
        VALUES(:e_name, :role, :email, :phone_number)";

        $stmt = $this->conn->prepare($sql);


        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));

        $stmt->bindParam(':e_name', $this->name);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone_number', $this->phone);
        // $stmt->execute();
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    //view all employee
    public function readAll()
    {
        $sql = "SELECT  * FROM employees";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name = $row['e_name'];
        $this->role = $row['role'];
        $this->email = $row['email'];
        $this->phone = $row['phone_number'];
    }

    public function deleteEmployee()
    {
        $sql = "DELETE FROM {$this->table} WHERE e_id = :e_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':e_id', $this->eid);
        $stmt->execute();
    }
}
