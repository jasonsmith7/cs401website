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
<link rel="icon" type="image/png" href="https://png2.kisspng.com/sh/75e87d654446d3e2298e60f4dd619c15/L0KzQYm3U8IxN5R2fZH0aYP2gLBuTfNwdaF6jNd7LXnmf7B6Tfd2caVmip9tb4fxfLFohL1ncZ1qi59wdXn3ccO0hwJmbV46edQ6MEi0QoO6VsI6O182UaUDNkOzR4K8UsE2PWI4T6o6NEWxgLBu/kisspng-computer-icons-guitar-download-files-guitar-free-5ab10812236293.193863071521551378145.png">
<title>Jay String Jewelry - Log In</title>
</head>
<body>

</body>
<footer class="footer"> 
	<p class="copyright">© 2018 Jay String Jewelry, LLC</p>
	</footer>
</html>