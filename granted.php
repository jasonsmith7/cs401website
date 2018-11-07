<?php
// granted.php
session_start();

if (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"] ||
   !isset($_SESSION["access_granted"])) {
  $_SESSION["sentiment"] = "You need to log in first";
  header("Location:login.php");
}

echo "ACCESS GRANTED";
?>
  
<a href="logout.php">Logout</a>