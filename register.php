<?php
session_start();

$thisPage = "register";


if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
    header("Location:granted.php");
  }

  $email = "";
  if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
  }
?>

<html>
<?php require_once "register_html.html"; ?>
<head>
<link href="style_home.css">
<link href="register_html.html">
<link rel="icon" href="favi.png">
<title>Jay String Jewelry - Register</title>
</head>
<body>
</body>
</html>