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
		
		if($thisPage == "register") {
			echo '<a id="current-page" href="register.php">Register</a>';
			echo '<a href="index.php#about">About</a>';
			echo '<a href="index.php#shop">Shop</a>';
			echo '<a href="index.php#events">Events</a>';
			echo '<a href="index.php">Home</a>';
		} else if ($thisPage == "login") {
			echo '<a href="register.php">Register</a>';
			echo '<a id="current-page" href="login.php">Login</a>';
			echo '<a href="index.php#about">About</a>';
			echo '<a href="index.php#shop">Shop</a>';
			echo '<a href="index.php#events">Events</a>';
			echo '<a href="index.php">Home</a>';
		}
		else {
			echo '<a href="register.php">Register</a>';
			echo '<a href="index.php#about">About</a>';
			echo '<a href="index.php#shop">Shop</a>';
			echo '<a href="index.php#events">Events</a>';
			echo '<a id="current-page" href="index.php">Home</a>}';
			}
		#<a href="index.php#contact">Contact</a>-->
		?>
	</div>
</div>
