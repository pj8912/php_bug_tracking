<?php

namespace BugTracking\Models;


class ContactUs
{
    public $name, $email, $company, $mobile, $message;
    private $table = 'contacts';
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createContact()
    {
        $sql = "INSERT INTO {$this->table}(name, company,email, mobile, message) VALUES(:name, :company, :email, :mobile, :message)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":company", $this->company);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":message", $this->message);
        $stmt->execute();
        return $stmt;
    }
}
