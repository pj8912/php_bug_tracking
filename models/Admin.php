<?php
class Admin
{
    public $table1 = "types";
    public $table2 = "statuses";
    public $table3 = "priorities";

    public $priority, $status, $type;
    private $conn;

    public $pid, $sid, $tid;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createType()
    {
        $sql = "INSERT INTO {$this->table1}(ticket_type) VALUES(:ticket_type)";
        $stmt = $this->conn->prepare($sql);
        $this->type = htmlspecialchars($this->type);
        $stmt->bindParam(':ticket_type', $this->type);
        $stmt->execute();
        return true;
    }
    public function createStatus()
    {
        $sql = "INSERT INTO {$this->table2}(ticket_status) VALUES(:ticket_status)";
        $stmt = $this->conn->prepare($sql);
        $this->status = htmlspecialchars($this->status);
        $stmt->bindParam(':ticket_status', $this->status);
        $stmt->execute();
        return true;
    }
    public function createPriority()
    {
        $sql = "INSERT INTO {$this->table3}(ticket_priority) VALUES(:ticket_priority)";
        $stmt = $this->conn->prepare($sql);
        $this->priority = htmlspecialchars($this->priority);
        $stmt->bindParam(':ticket_priority', $this->priority);
        $stmt->execute();
        return true;
    }

    public function getAllTypes()
    {
        $sql = "SELECT * FROM {$this->table1}";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }
    public function getAllStatues()
    {
        $sql = "SELECT * FROM {$this->table2}";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }
    public function getAllPriorities()
    {
        $sql = "SELECT * FROM {$this->table3}";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }

    public function deleteType()
    {
        $sql = "DELETE FROM {$this->table1} WHERE t_id = :t_id";
        $stmt = $this->conn->prepare($sql);
        $this->tid = (int) $this->tid;
        $stmt->bindParam(':t_id', $this->tid);
        $stmt->execute();
    }
    public function deleteStatus()
    {
        $sql = "DELETE FROM {$this->table2} WHERE s_id = :s_id";
        $stmt = $this->conn->prepare($sql);
        $this->sid = (int) $this->sid;
        $stmt->bindParam(':s_id', $this->sid);

        $stmt->execute();
    }

    public function deletePriority()
    {
        $sql = "DELETE FROM {$this->table3} WHERE p_id = :p_id";
        $stmt = $this->conn->prepare($sql);
        $this->pid = (int) $this->pid;
        $stmt->bindParam(':p_id', $this->pid);

        $stmt->execute();
    }
}
