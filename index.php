<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();
$users = $dao->getUsers();
$comments = $dao->getComments();
?>
<html>

<?php require_once "home_html.html"; 
if (!empty($_SESSION['sentiment'])) {
    		echo $_SESSION["sentiment"];
}?>
<head>
<link href="style_home.css">
<link href="home_html.html">
<link rel="icon" href="favi.png">
<title>Jay String Jewelry - Home</title>
<body>
<?php echo "<body style='background-color:black'>";?>
</body>
</html>