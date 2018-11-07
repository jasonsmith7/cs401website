<?php session_start();
 ?>
 
<html>
	<link rel="stylesheet" type="text/css" href="style_home.css">
	LOGGED OUT	
	
	<?php
		$_SESSION['sentiment'] = "bad";
		$_SESSION['currentUser'] = "";
		echo '<a href="index.php">return</a>';
	?>
	
	
	<footer class="footer">
    <div class="footerContainer">
        <p class="copyright">© 2018 Jay String Jewelry, LLC</p>
    </div>
	</footer>
	
</html>