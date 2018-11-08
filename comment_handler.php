<?php
session_start();
require_once "Dao.php";
$dao = new Dao();

$name = $_REQUEST["name"];
$email = $_REQUEST["email"]; 
$product = $_REQUEST["product"]; 
$comment = $_REQUEST["comment"];

$valid = true;
$messages = array();
#$user = $dao->login($email);

if (empty($name)) {
	$messages[] = "PLEASE ENTER AN ALIAS";
	#$valid = false;
}
if (empty($email)) {
	$messages[] = "PLEASE ENTER A VALID EMAIL ADDRESS";
	#$valid = false;
}
if (empty($password)){
	$messages[] = "PLEASE ENTER A PASSWORD";
	#$valid = false;
}
if (empty($comment)) {
	$messages[] = "PLEASE ENTER A COMMENT";
	#$valid = false;
}
if ($valid) {
	$dao->saveComment ($name, $email, $product, $comment);
	$messages[] = "User $email Created";
	$_SESSION['currentUser'] = $email;
	$valid = true;
}else{
	#$messages[] = "Account already associated with $username";
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
	header("Location: index.php");
	exit;
}
$_SESSION['sentiment'] = "good";
header("Location:index.php");
exit;
?>