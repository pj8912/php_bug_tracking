<?php
class Roles
{
    private $conn;
    private $table = "roles";
    
    public $r_id, $roles;
    
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createRole()
    {
        $sql  = "INSERT INTO {$this->table}(roles) VALUES(:roles)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':roles', $this->roles);
        $stmt->execute();
    }

    public function deleteRole(){
        $sql = "DELETE FROM {$this->table} WHERE r_id=:r_id";
        $stmt = $this->conn->prepare($sql);
        $this->r_id = (int) htmlspecialchars(strip_tags($this->r_id));
        $stmt->bindParam(':r_id', $this->r_id);
        $stmt->execute();
    }

    public function readAll(){
        $sql = "SELECT roles FROM {$this->table}";
        $stmt =  $this->conn->query($sql);
        return $stmt;
    }
    
}
