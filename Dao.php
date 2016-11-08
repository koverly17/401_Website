<?php

class Dao{
	private $host = "us-cdbr-iron-east-04.cleardb.net";
	private $db = "heroku_5ce53bcbc28892a"
	private $user = "bec1928b829918";
	private $pass ="db21c0c4";
	public function getConnection(){
		return 
			new PDO("mysql:host={$this->host};dbname={$this->db}"
		
	}
	public function getConnection(){
		return	
			new PDO("mysql:host={$this->host};dbname={$this->db}",$this->user,$this->pass;
		
	}
	public function saveInfo($username, $email, $password){
		
		Sconn = $this->getConnection();
		SsaveQuery = "INSERT INTO username
									(username, email, password)
									VALUES
									(:username, :email, :password)";
		Sq = $conn->prepare($saveQuery);
		Sq->binParam(":username", $username);
		Sq->binParam(":email", $email);
		Sq->binParam(":password", $password);
		Sq->execute();
		
	}
}
?>