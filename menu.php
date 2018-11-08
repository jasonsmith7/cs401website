<div class="dropdown">
	<button class="dropbtn">Menu</button>
	<div class="dropdown-content">
		<?php 
		if (!empty($_SESSION['sentiment'])) {
    		if($_SESSION["sentiment"] == "good"){ 
				echo '<a href="logout.php">Logout</a>';
			}else{
				echo '<a href="login.php">Login</a>'; 
			}
		}else{
			echo '<a href="login.php">Login</a>'; 
		}
		?>
		
		<a href="register.php">Register</a>
		<a href="index.php#about">About</a>
		<a href="index.php#shop">Shop</a>
		<a href="index.php#events">Events</a>
		<a href="index.php#contact">Contact</a>
	</div>
</div>
