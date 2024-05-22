<?php 
	include_once 'header.php';
	include_once 'css/login.css.php';
 ?>

<div class="login-page">
 <div class="form">
 	<center>
	 	<h2> Create New Branch</h2>
	 		<form class="register-form" action="includes/createBranch.inc.php" method="post">
		        <br>
	 			<input type="text" name="name" placeholder="Branch Name...">
	 			<br>
	 			<input type="text" name="address" placeholder="Address...">
	 			<br>
	 			<input type="text" maxlength="11 " name="contactNum" placeholder="Contact Number...">
	 			<br> 
	 			<input type="text" name="email" placeholder="Branch Email...">
	 			<br><br>
	 			<button class = "signbutton" type="submit" name="submit"> Sign Up </button>
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
		 	}
		 	else if ($_GET["error"] == "stmtfailed") {
		 		echo "<p> Something went wrong, try again </p>";
		 	}
		 	else if ($_GET["error"] == "none") {
		 		echo "<p> New Branch Created </p>";
		 	}
		 	else if ($_GET["error"] == "branchNameTaken") {
		 		echo "<p> Branch Name Exist </p>";
		 	}
		 	else if ($_GET["error"] == "invalidEmail") {
		 		echo "<p> invalid Email </p>";
		 	}
		 }
		 ?>
 	</div>
 </center>
 

<?php 
	include_once 'footer.php';
 ?>