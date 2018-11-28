<?php
//login_handler.php
session_start();
require_once "Dao.php";

$dao = new Dao();
$email = $_REQUEST["email"]; 
$password = $_REQUEST["password"];
$user = $dao->login($email);
$_SESSION["email_preset"] = $_POST["email"];
$valid = true;
$messages = array();

if ((empty($email)) && (empty($password))) {
	$messages[] = "EMAIL AND PASSWORD MUST BE ENTERED";
	$valid = false;
	echo "Please enter a valid email address";
}
if (empty($email)) {
	$messages[] = "PLEASE ENTER A VALID EMAIL";
	$valid = false;
	echo "Please enter a valid email address";
}
if (empty($password)){
	$messages[] = "PLEASE ENTER A PASSWORD";
	$valid = false;
	echo "Please enter a password";
}
if (!$user){
	$messages[] = "User does not exist";
	$valid = false;
}else{
	$user = $dao->getUser($email);
	$pass = $dao->getPassword($email);
	error_log(" UserID from Dao: " . $email);
	#error_log(" Password from Post: " . $password);
	error_log(" Password from Post: " . $password);
	error_log(" Password from Dao: " . $pass);
	$passhash = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
	
	if($passhash != $pass){
		$messages[] = "Incorrect Password";
		echo "bad password";
		$valid = false;
		$_SESSION["email_preset"] = $email;
	} else{
		$messages[] = "Welcome $email";
		$_SESSION['currentUser'] = $email;
		$valid = true;
	}
}
  if (!$valid) {
    $_SESSION['sentiment'] = "Incorrect Email/Password";
    $_SESSION['messages'] = $messages;
	header("Location: login.php");
    exit;
  }
  
  $_SESSION['sentiment'] = "good";
  header("Location: index.php");
  exit;
  ?>



