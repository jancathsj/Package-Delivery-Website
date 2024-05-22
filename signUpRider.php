<?php 
	include_once 'header.php';
	include_once 'css/login.css.php';
 ?>

<div class="login-page">
<div class="form">
 	<center>
	 	<h2> Sign Up Worker</h2>
	 		<form class="register-form" action="includes/signupRider.inc.php" method="post">
			 	<select name = "workerType">
			 		echo("<option disabled selected>Type of Worker </option>");
		            <option value = "rider" >Rider</option>
		            <option value = "staff">Staff</option>
		         </select>

		         <br>
					 <?php
						 	require 'includes\dbh.inc.php';
						 	$query = "select * from branch";
							$result = mysqli_query($conn,$query);
							if(mysqli_num_rows($result) > 0){
								echo "<select name='branchName'>";
								echo("<option disabled selected>Branch </option>");
								while($row = mysqli_fetch_assoc($result)){
									echo "<option value='".$row['Branch_Name']."'>"
									.$row['Branch_Name']."</option>";
								}
								echo "</select><br>";
							}
							mysqli_close($conn);
					?>
		        
	 			<input type="text" name="lastName" placeholder="Last Name...">
	 			<br>
	 			<input type="text" name="firstName" placeholder="First Name...">
	 			<br>
	 			<input type="text" name="middleInitial" maxlength="2" placeholder="Middle Initial...">
	 			<br>
	 			<input type="text" name="address" placeholder="Complete Address...">
	 			<br>
	 			<input type="text" name="contactNum" maxlength="11" placeholder="Contact Number...">
	 			<br>
	 			<input type="text" name="email" placeholder="Email...">
				<br>
	 			<input type="text" name="username" placeholder="Username...">
	 			<br>
	 			<input type="password" name="pwd" placeholder="Password...">
	 			<br>
	 			<input type="password" name="pwdrepeat" placeholder="Repeat Password...">
	 			<br> <br>
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
		 	else if ($_GET["error"] == "invaliduid") {
		 		echo "<p> Choose a proper username! </p>";
		 	}
		 	else if ($_GET["error"] == "invalidemail") {
		 		echo "<p> Choose a proper email! </p>";
		 	}
		 	else if ($_GET["error"] == "passwordsdontmatch") {
		 		echo "<p> Passwords doesn't match! </p>";
		 	}
		 	else if ($_GET["error"] == "stmtfailed") {
		 		echo "<p> Something went wrong, try again </p>";
		 	}
		 	else if ($_GET["error"] == "invalidemail") {
		 		echo "<p> Email invalid </p>";
		 	}
		 	else if ($_GET["error"] == "invalidnumber") {
		 		echo "<p> Input a valid number </p>";
		 	}
		 	else if ($_GET["error"] == "usernametaken") {
		 		echo "<p> Username is already taken! </p>";
		 	}
		 	else if ($_GET["error"] == "none") {
		 		echo "<p> You have been signed up! </p>";
		 	}
		 }
		 ?>
 	</div>
 </center>
 

<?php 
	include_once 'footer.php';
 ?>