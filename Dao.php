<?php

class Dao{
	private $host = "us-cdbr-iron-east-04.cleardb.net";
	private $db = "heroku_5ce53bcbc28892a";
	private $user = "bec1928b829918";
	private $pass ="db21c0c4";
	
	public function getConnection(){
		
			$conn = new PDO("mysql:host={$this->host};dbname={$this->db}",$this->user,$this->pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
	}
	public function saveInfo($email, $password){
		
		$conn = $this->getConnection();
		$saveQuery = "INSERT INTO users
									(email, password)
									VALUES
									(:email,:password)";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":email", $email);
		$q->bindParam(":password", $password);
		$q->execute();
		
	}
	public function checkUser($email, $password){
		$conn = $this->getConnection();
		$getQuery = "SELECT * FROM users
									WHERE
									(email = :email AND password = :password)";
		$q = $conn->prepare($getQuery);
		$q->bindParam(":email", $email);
		$q->bindParam(":password", $password);
		$q->execute();
		$row = $q->fetch();
		return $row;
			
	}
	public function checkEmail($email){
		$conn = $this->getConnection();
		$getQuery = "SELECT * FROM users
									WHERE
									(email = :email)";
		$stmt = $conn->prepare($getQuery);
		$stmt->bindParam(":email", $email);
		$stmt->execute();
		$row = $stmt->fetch();
		return $row;				
	}
}
?>