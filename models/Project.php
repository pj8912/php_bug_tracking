<?php
class Project
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public
        $project_title,
        $type,
        $manager,
        $frontend,
        $backend,
        $client_name,
        $description;

    private $table = 'projects';
    
    
    public function createProject()
    {

        $sql = "INSERT INTO {$this->table}(project_title, type, manager,
        frontend, backend, client_name, description )";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
    }
}
