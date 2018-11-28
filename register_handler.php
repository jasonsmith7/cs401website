<?php
session_start();
require_once "Dao.php";
$dao = new Dao();

$email = $_REQUEST["email"]; 
$password = $_REQUEST["password"]; 
$valid = true;
$messages = array();
$user = $dao->login($email);

if (empty($email)) {
	$messages[] = "PLEASE ENTER A VALID EMAIL ADDRESS";
	$valid = false;
}
if (empty($password)){
	$messages[] = "PLEASE ENTER A PASSWORD";
	$valid = false;
}
if (!$user) {
	$passhash = hash("sha256", $password . "fKd93Vmz!k*dAv5029Vkf9$3Aa");
	$dao->createUser($email, $passhash);
	$messages[] = "User $email Created";
	$_SESSION['currentUser'] = $email;
	$valid = true;
}else{
	$messages[] = "Account already associated with $email";
	$valid = false;
  }
/* Form Required Field Validation */
foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$error_message = "All Fields are required";
	break;
	}
}
/* Email Validation */
if(!isset($error_message)) {
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	$error_message = "Invalid Email Address";
	}
	header("Location:index.php");
}

if (!$valid) {
	$_SESSION['sentiment'] = "bad";
	$_SESSION['messages'] = $messages;
	header("Location: register.php");
	exit;
}
$_SESSION['sentiment'] = "good";
header("Location:index.php");
exit;
?>