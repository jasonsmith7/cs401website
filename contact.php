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
		<br><input placeholder="email address:"name="email" type="email" value="<?php echo $email; ?>" /><br/>
		<br><textarea class="ta" rows="5" name="comment">Leave a comment!!!</textarea></br>
		<input type="submit" value="SEND" class="submit" />
	</form>
	<div>If you need to pay Jay, please do so through Venmo! Here is his info:</div>
	<img src="images/venmo.png">
	</div>
	<!--<table><?php
	#session_start();
	#require_once "Dao.php";
	#$dao = new Dao();
   # foreach ($contact as $comment) {
   # echo "<tr><td>" . ($comment['email']) . "  </td><td>" . ($comment['comment']) . "</td></tr>";
   # }
    //if(isset($_SESSION['messages'])){
		//	echo "<strong class='exists'>" . $_SESSION['messages'][0] . "</strong>";
			//unset($_SESSION['messages']);
	//}
	
?></table>-->