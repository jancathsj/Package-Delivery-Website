<?php 

	include_once 'header.php';
	
	include_once 'css/login.css.php';

	if(isset($_SESSION["attempt_again"])){
		$now = time();
		if($now > $_SESSION["attempt_again"]){
			unset($_SESSION["attempt"]);
			unset($_SESSION["attempt_again"]);
		}
	}
 ?>



	<div class="login-page">
		<div class="form">
		 	<center>
			 	<h2> Log In</h2>
			 		<form  class="register-form" action="includes/login.inc.php" method="post">
			 			<input type="text" name="username" placeholder="Username...">
			 			<br>
			 			<input type="password" name="pwd" placeholder="Password...">
			 			<br> 
			 			<button type="submit" name="submit"> Log In </button>
			 			<br>
			 		</form>
		 	</center>
	 	</div>
	</div>

	<center>
	 	<div>
		 	<?php 
			 if (isset($_GET["error"])) {
			 	if ($_GET["error"] == "emptyinput") {
			 		echo "<p> Fill in all Fields!</p>";
			 		if (isset($_SESSION["attempt"])) {
			 			echo "Attempt Remaining:";
			 			echo(5-$_SESSION["attempt"]);
			 		}
			 		if (isset($_SESSION["attempt_again"])) {
			 			echo("<br>");
			 			echo "Try again in: ";
			 			echo($_SESSION["attempt_again"]-time());
			 		}


			 		
			 	}
			 	else if ($_GET["error"] == "wronglogin") {
			 		echo "<p> Incorrect Username or Password! </p>";
			 		if (isset($_SESSION["attempt"])) {
			 			echo "Attempt Remaining:";
			 			echo(5-$_SESSION["attempt"]);
			 		}
			 		if (isset($_SESSION["attempt_again"])) {
			 			echo("<br>");
			 			echo "Try again in: ";
			 			echo($_SESSION["attempt_again"]-time());
			 		}

			 	}
			 }
			 ?>
	 	</div>
	 </center>



<?php
/*
	if(isset($_SESSION["error"])){
		?>
		<div class="alert alert-danger text-center" style="margin-top:20px;">
			<?php echo $_SESSION["error"]; ?>
		</div>
		<?php
			unset($_SESSION["error"]);
	}

	if(isset($_SESSION["success"])){
		?>
		<div class="alert alert-success text-center" style="margin-top:20px;">
			<?php echo $_SESSION["success"]; ?>
		</div>
		<?php
 			unset($_SESSION["success"]);
	}
*/
?>


<?php 
	include_once 'footer.php';
 ?>
