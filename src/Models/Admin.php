<?php

namespace BugTracking\Models;

class Admin
{

	public $t1 = "types";
	public $t2 = "statuses";
	public $t3 = "priorities";
	public $t4 = "users";

	public $priority, $status, $type;
	public $userid;

	//db connection
	private $conn;

	//priorityId, statusId, typesId
	public $pid, $sid, $tid;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function getAdmin(){
		$sql = "SELECT user_fullname FROM {$this->t4} WHERE user_id = :user_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_id', $this->userid);
		if($stmt->execute()){
			return $stmt;
		}
		return false;
	}

	public function createType()
	{
		$sql = "INSERT INTO {$this->t1}(ticket_type) VALUES(:ticket_type)";
		$stmt = $this->conn->prepare($sql);
		$this->type = strip_tags($this->type);
		$stmt->bindParam(':ticket_type', $this->type);
		if($stmt->execute()){
			return true;
		}
		return false;
	}

	public function createStatus()
	{
		$sql = "INSERT INTO {$this->t2}(ticket_status) VALUES(:ticket_status)";
		$stmt  = $this->conn->prepare($sql);
		$stmt->bindParam(':ticket_status', $this->status);
		if($stmt->execute()){
			return true;
		}
		return false;
	}

	public function createPriority()
	{
		$sql = "INSERT INTO {$this->t3}(ticket_priority) VALUES(:ticket_priority)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':ticket_priority', $this->priority);
		if($stmt->execute()){
			return true;
		}
		return false;
	}


	public function getAllTypes()
	{
		$sql = "SELECT * FROM {$this->t1}";
		$stmt = $this->conn->query($sql);
		if($stmt->execute()){
			return $stmt;
		}
		return false;
	}
	public function getAllStatues()
	{
		$sql = "SELECT * FROM {$this->t2}";
		$stmt = $this->conn->query($sql);
		if($stmt->execute()){
			return $stmt;
		}
		return false;
	}
	public function getAllPriorities()
	{
		$sql = "SELECT * FROM {$this->t3}";
		$stmt = $this->conn->query($sql);
		if($stmt->execute()){
			return $stmt;
		}
		return false;
	}




	public function deleteType()
	{
		$sql = "DELETE FROM {$this->t1} WHERE t_id = :t_id";
		$stmt = $this->conn->prepare($sql);
		$this->tid = (int) $this->tid;
		$stmt->bindParam(':t_id', $this->tid);
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	public function deleteStatus()
	{
		$sql = "DELETE FROM {$this->t2} WHERE s_id = :s_id";
		$stmt = $this->conn->prepare($sql);
		$this->sid = (int) $this->sid;
		$stmt->bindParam(':s_id', $this->sid);
		if($stmt->execute()){
			return true;
		}
		return false;
	}

	public function deletePriority()
	{
		$sql = "DELETE FROM {$this->t3} WHERE p_id = :p_id";
		$stmt = $this->conn->prepare($sql);
		$this->pid = (int) $this->pid;
		$stmt->bindParam(':p_id', $this->pid);
		if($stmt->execute()){
			return true;
		}
		return false;
	}
}



