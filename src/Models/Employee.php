<?php

namespace BugTracking\Models;


class Employee
{




    public function __construct($db)
    {
        $this->conn = $db;
    }
    public $name, $role, $email, $phone, $description;

    private $table = "employees";

    public $eid;

    public function createEmployee()
    {
        $sql = "INSERT INTO {$this->table}(e_name,e_roles,e_description,e_email,e_phone)  VALUES(:e_name,:e_roles,:e_description,:e_email,:e_phone	)";

        $stmt = $this->conn->prepare($sql);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->description = htmlspecialchars(strip_tags($this->description));

        $stmt->bindParam(':e_name', $this->name);
        $stmt->bindParam(':e_roles', $this->role);
        $stmt->bindParam(':e_description', $this->description);
        $stmt->bindParam(':e_email', $this->email);
        $stmt->bindParam(':e_phone', $this->phone);
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function readAll()
    {
        $sql = "SELECT  * FROM employees";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }

    public function deleteEmployee()
    {
        $sql = "DELETE FROM {$this->table} WHERE e_id = :e_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':e_id', $this->eid);
        $stmt->execute();
    }

    public function getDevs()
    {
        $sql = "SELECT * FROM {$this->table} WHERE e_roles ='dev' OR e_roles ='php dev' OR e_roles='developer' ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }


    public function updateEmployee(){
        $sql = "UPDATE {$this->table }
        SET
        e_name = :e_name,
        e_roles = :e_roles,
        e_description = :e_description ,
        e_email  = :e_email,
        e_phone = :e_phone

        WHERE e_id = :e_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':e_name', $this->name);
        $stmt->bindParam(':e_roles', $this->role);
        $stmt->bindParam(':e_description', $this->description);
        $stmt->bindParam(':e_email', $this->email);
        $stmt->bindParam(':e_phone', $this->phone);

        $stmt->bindParam(':e_id', $this->eid);

        if($stmt->execute()){
            return true;
        }
        return false;        
    }

    public function getName(){

        $sql = "SELECT e_name FROM {$this->table} WHERE e_id = :e_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':e_id', $this->eid);
        if($stmt->execute()){
            return $stmt;
        }
        return false;
    }

    public function getEmail(){

        $sql = "SELECT e_email FROM {$this->table} WHERE e_id = :e_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':e_id', $this->eid);
        if($stmt->execute()){
            return $stmt;
        }
        return false;
    }
    public function getDesc(){

        $sql = "SELECT e_description FROM {$this->table} WHERE e_id = :e_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':e_id', $this->eid);
        if($stmt->execute()){
            return $stmt;
        }
        return false;
    }

    public function getPhone(){
        
        $sql = "SELECT e_phone FROM {$this->table} WHERE e_id = :e_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':e_id', $this->eid);
        if($stmt->execute()){
            return $stmt;
        }
        return false;
    }
    public function getRoles(){

        $sql = "SELECT e_roles FROM {$this->table} WHERE e_id = :e_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':e_id', $this->eid);
        if($stmt->execute()){
            return $stmt;
        }
        return false;
    }
}
