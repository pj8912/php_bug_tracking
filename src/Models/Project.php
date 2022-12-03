<?php

namespace BugTracking\Models;

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
    public $project_id;

    private $table = 'projects';


    public function createProject()
    {
        $sql = "INSERT INTO {$this->table}(project_title,project_type,project_description,project_manager,frontend,backend,client_name)
        VALUES(:project_title,:project_type,:project_description,	:project_manager,:frontend,:backend,:client_name)";

        $stmt = $this->conn->prepare($sql);

        $this->project_title = htmlspecialchars(strip_tags($this->project_title));
        $this->type  = htmlspecialchars(strip_tags($this->type));
        $this->manager  = htmlspecialchars(strip_tags($this->manager));
        $this->frontend  = htmlspecialchars(strip_tags($this->frontend));
        $this->backend  = htmlspecialchars(strip_tags($this->backend));
        $this->client_name  = htmlspecialchars(strip_tags($this->client_name));
        $this->description  = htmlspecialchars(strip_tags($this->description));


        $stmt->bindParam(':project_title', $this->project_title);
        $stmt->bindParam(':project_type', $this->type);
        $stmt->bindParam(':project_description', $this->description);
        $stmt->bindParam(':project_manager', $this->manager);
        $stmt->bindParam(':frontend', $this->frontend);
        $stmt->bindParam(':backend', $this->backend);
        $stmt->bindParam(':client_name', $this->client_name);

        $stmt->execute();
    }

    public function editProject()
    {
        $sql = "UPDATE {$this->tabsle} SET project_title = :project_title, type=:type, manager=:manager, 
        frontend=: frontend, backend= :backend,
        client_name=:client_name, 
        description=:description WHERE project_id=:project_id";

        $stmt = $this->conn->prepare($sql);

        $this->project_title = htmlspecialchars(strip_tags($this->project_title));
        $this->type  = htmlspecialchars(strip_tags($this->type));
        $this->manager  = htmlspecialchars(strip_tags($this->manager));
        $this->frontend  = htmlspecialchars(strip_tags($this->frontend));
        $this->backend  = htmlspecialchars(strip_tags($this->backend));
        $this->client_name  = htmlspecialchars(strip_tags($this->client_name));
        $this->description  = htmlspecialchars(strip_tags($this->description));
        $this->project_id  = htmlspecialchars(strip_tags($this->project_id));

        $stmt->bindParam(':project_title', $this->project_title);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':manager', $this->manager);
        $stmt->bindParam(':client_name', $this->client_name);
        $stmt->bindParam(':front_end', $this->frontend);
        $stmt->bindParam(':backend', $this->backend);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':project_id', $this->project_id);

        $stmt->execute();
    }

    public function readAll()
    {
        $sql = "SELECT project_id,project_title,project_type,project_description,project_manager,frontend,backend,client_name FROM {$this->table}";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }

    public function deleteProject()
    {
        $sql = "DELETE FROM {$this->table} WHERE project_id = :project_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':project_id', $this->project_id);
        $stmt->execute();
    }

    public function viewProject()
    {
        $sql = "SELECT project_id, project_title, type, manager, frontend, backend, client_name, description FROM {$this->table}
		    WHERE project_id  = :project_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':project_id', $this->project_id);
        $stmt->execute();
        return $stmt;
    }
    public function getProjectTitles()
    {
        $sql = "SELECT project_id, project_title  FROM {$this->table}";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }

    public function getProjectName()
    {
        $sql = "SELECT project_title FROM {$this->table} where project_id = :project_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':project_id', $this->project_id);
        $stmt->execute();
        return $stmt;
    }
}
