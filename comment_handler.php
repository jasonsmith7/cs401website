<?php
session_start();
require_once "Dao.php";
$dao = new Dao();
$email = $_REQUEST["email"];
$comment = $_REQUEST["comment"];


$valid = true;
$messages = array();
#$user = $dao->login($email);
if (empty($email)) {
	$messages[] = "PLEASE ENTER A COMMENT";
	$valid = false;
}
if (empty($comment)) {
	$messages[] = "PLEASE ENTER A COMMENT";
	$valid = false;
}
if ($valid) {
	$dao->saveComment ($email, $comment);
	$messages[] = "Your Comment Has Been Submitted";
	$_SESSION['currentUser'] = $email;
	$valid = true;
}else{
	#$messages[] = "YOU MUST ENTER YOUR EMAIL AND A COMMENT TO SUBMIT";
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