<?php
session_start();

	$login = $_POST['login'];
	$password = $_POST['password'];
	
	if ($login == 'jason' && $password == 'abc123') {
	  $_SESSION['logged_in'] = true;
	  header('Location: http://cs401/comments/index.php');
	  exit;
	}
	$_SESSION['logged_in'] = false;
	$_SESSION['message'] = "Username or password invalid";
	header('Location: login.php');
	exit;