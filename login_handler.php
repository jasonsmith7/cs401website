<?php
session_start();

// For simplification Lets pretend I got these login credentials from an SQL table.
require_once "Dao.php";

$dao = new Dao();

if(isset($_POST["email"], $_POST["password"])) 
    {     
		 echo 'made it 1';
        $email = $_POST["email"]; 
        $password = $_POST["password"]; 

        

        if(mysqli_num_rows($dao->validateCreds($email,$password)) > 0 )
        { 
             echo 'made it 2';
			$_SESSION["logged_in"] = true; 
            header('Location: contact.php');
			exit;
        }
        else
        {
            echo 'The username or password are incorrect!';
			$status = "Invalid username or password";
			$_SESSION["status"] = $status;
			$_SESSION["email_preset"] = $_POST["email"];
			$_SESSION["access_granted"] = false;
			exit;
        }
}
 echo 'no';
 exit;



