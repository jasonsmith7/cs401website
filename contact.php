<?php
//session_start();
  $email = "";
  if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
  }?>
<div class="second" id="contact">
	<p class="second">Leave a comment or request a product</p>
	<p class="second">Please leave a comment about Jay or his products. If there is a concern, Jay will
	get back to you promptly.</p>
	<p class="second">If you are requesting a product, please select the product from the drop-down.</p>
	</div>
	<div>

	<form align="center" width="100%" action="comment_handler.php" method="POST">
		<label for="email">Email</label>
		<br><input placeholder="email address:"name="email" type="email" value="<?php echo $email; ?>" /><br/>
		<label for="comment">Comment/Request</label>
		<br><textarea class="ta" rows="5" name="comment">Leave a comment or item request!!!</textarea></br>
		<input type="submit" value="SEND" class="submit" />
	</form>
	<div>If you need to pay Jay, please do so through Venmo! Here is his info:</div>
	
	<img class="inset" alt="venmo" src="images/venmo.jpg">
	</div>