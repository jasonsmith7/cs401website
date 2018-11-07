<?php
session_start();
require_once "Dao.php";

$dao = new Dao();
echo 'made it 1';
$email = $_REQUEST["email"]; 
$password = $_REQUEST["password"]; 
  $valid = true;
  $messages = array();
  if (empty($email)) {
    $messages[] = "PLEASE ENTER A VALID EMAIL ADDRESS";
    $valid = false;
  }
  
  if (empty($password)){
	$messages[] = "PLEASE ENTER A PASSWORD";
    $valid = false;
  }
  
  $dao->createUser($email, $password);
	$messages[] = "User $username Created";
	$_SESSION['currentUser'] = $username;
	$valid = true;


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
header("Location:index.php");
exit;

?>