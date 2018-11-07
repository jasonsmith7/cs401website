<?php
class Dao {
	private $host = "us-cdbr-iron-east-01.cleardb.net";
	private $db = "heroku_d7e41e479b812b2";
	private $user = "bba680437f68c5";
	private $pass = "c36e0393";
	public function getConnection () {
	return
	new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
	}

	public function saveComment ($comment) {
		$conn = $this->getConnection();
		$saveQuery = "INSERT INTO comments (comment) VALUES (:comment)";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":comment", $comment);
		$q->execute();
	}
	public function getComments () {
		$conn = $this->getConnection();
		return $conn->query("SELECT * FROM comment");
	}
	public function getUsers () {
		$conn = $this->getConnection();
		return $conn->query("SELECT * FROM users");
	}
	
	public function createUser ($email, $password) {
		$conn = $this->getConnection();
		$query = $conn->prepare("INSERT INTO Users (email, password) values (:email, :password)");
		$query->bindParam(":email", $email);
		$query->bindParam(":password", $password);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
	}
	
	public function validateCreds ($email,$password) {
		$conn = $this->getConnection();
		$check = $conn->query("SELECT email, password FROM users WHERE email = :email AND  password = :password");
		
		return $check;
	}
}