<?php
session_start();
require_once "Dao.php";
$dao = new Dao();

$email = $_REQUEST["email"];
$email = filter_var($email,FILTER_SANITIZE_EMAIL); 
$password = $_REQUEST["password1"];
$password2 = $_REQUEST["password2"]; 
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
	$_SESSION["email_preset"] = $email;
}
if (strlen($password) < 8) {
	$messages[] = "PASSWORD MUST BE AT LEAST 8 CHARACTERS LONG";
	$valid = false;
	$_SESSION["email_preset"] = $email;
}
if ($password != $password2) {
	$messages[] = "PASSWORDS DO NOT MATCH";
	$valid = false;
	$_SESSION["email_preset"] = $email;
}
if (!$user && $valid) {
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
/* Email Validation and Sanitization */
if(!isset($error_message)) {
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	$error_message = "Invalid Email Address";
	}
	header("Location:index.php");
}

if (!$valid) {
	$_SESSION['sentiment'] = "bad";
	$_SESSION['messages'] = $messages;
	$_SESSION["email_preset"] = $email;
	header("Location: register.php");
	exit;
}
$_SESSION['sentiment'] = "good";
header("Location:index.php");
exit;
?>