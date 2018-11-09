<?php
session_start();
if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
    header("Location:granted.php");
  }

  $email = "";
  if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
  }
if (!empty($_SESSION['sentiment'])) {
    		echo $_SESSION["sentiment"];
}
?>


<html>
<?php require_once "login_html.html"; ?>

<head>
<link href="style_home.css">
<link href="login_html.html">
<link rel="icon" href="favi.png">
<title>Jay String Jewelry - Log In</title>
</head>
<body>

</body>
<footer class="footer"> 
	<p class="copyright">© 2018 Jay String Jewelry, LLC</p>
	</footer>
</html>