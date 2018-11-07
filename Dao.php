<?php
require_once 'KLogger.php';
class Dao {
	private $host = "us-cdbr-iron-east-01.cleardb.net";
	private $db = "heroku_d7e41e479b812b2";
	private $user = "bba680437f68c5";
	private $pass = "c36e0393";
	protected $logger;
	
	public function __construct () {
		$this->logger = new KLogger("log.txt", KLogger::INFO);
	}
	public function getConnection () {
		return new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
	}
	
	public function saveComment ($comment) {
		$conn = $this->getConnection();
		$saveQuery = "INSERT INTO comments (comment) VALUES (:comment)";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":comment", $comment);
		$q->execute();
	}
	public function login($email){
		#$this->logger->LogInfo("checking login for [{$email}]");
		$conn = $this->getConnection();
		$q = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$q->bindParam(':email', $email);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$q->execute();
		$ret = $q->fetchAll();
		
		#$this->logger->logInfo(__FUNCTION__ . " " . print_r($ret,1));
		$temp = !empty($ret);
		$this->logger->LogInfo("/nbool returned [{$temp}]");
		return !empty($ret);
	 }
	 public function getUser($email){
	 $conn = $this->getConnection();
     $query = $conn->prepare("select email from Users where email = :email");
	 $query->bindParam(':email', $email);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     $results = $query->fetch();
		 
     //$this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
	 error_log(" GET UserID REsult: " . print_r($results,true));
     return $results['email'];
	  
  }
	public function getPassword($email){
		$conn = $this->getConnection();
		$query = $conn->prepare("SELECT password from Users where email = :email");
		$query->bindParam(':email', $email);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
		$results = $query->fetch();
		$this->logger->LogInfo(" GET Password REsult: " . print_r($results,true));
		return $results['password'];
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