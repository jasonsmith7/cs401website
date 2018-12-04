<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();
$users = $dao->getUsers();
$comments = $dao->getComments();
?>
<html>
<?php require_once "home_html.html";?>
<head>
<link href="style_home.css">
<link href="home_html.html">
<link rel="icon" href="favicon.ico">
<title>Jay String Jewelry - Home</title>
<body>
<?php echo "<body style='background-color:black'>";?>
</body>
</html>