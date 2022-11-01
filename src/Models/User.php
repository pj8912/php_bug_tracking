<?php

namespace BugTracking\Models;

class User
{


	private $conn;


	private $table = "users";

	public function __construct($db)
	{
		$this->conn = $db;
	}

	public $fullname, $email, $pwd;

	public function check_user()
	{

		$sql = "SELECT * FROM {$this->table} WHERE user_email = :user_email";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_email', $this->email);
		$stmt->execute();
		return $stmt;
	}


	public function getUser()
	{

		$sql = "SELECT * FROM {$this->table} WHERE user_email = :user_email";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_email', $this->email);
		$stmt->execute();
		return $stmt;
	}

	public function getUserById()
	{
		$sql = "SELECT * FROM users WHERE user_id = :user_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_id', $this->user_id);
		$stmt->execute();
		return $stmt;
	}


	public function create_user()
	{
		$sql = "INSERT INTO {$this->table}(user_fullname, user_email, user_pwd, created_at)
		 VALUES(:user_fullname, :user_email, :user_pwd, NOW())";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':user_fullname', $this->fullname);
		$stmt->bindParam(':user_email', $this->email);
		$stmt->bindParam(':user_pwd', $this->pwd);
		$stmt->execute();
	}


	public function update_last_seen($uid)
	{

		$sql = "UPDATE users SET last_seen = NOW() WHERE user_id = '$uid' ";
		$stmt = $this->conn->query($sql);
		$stmt->execute();
	}







	public static function test()
	{
		return "User Model working";
	}
}
