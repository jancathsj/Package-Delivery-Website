<?php 
	include_once 'header.php';
	
 ?>



<!DOCTYPE html>
<html>

	<head>
	<style>
		input {
		    width: 60%;
		    padding: 1%;
		    margin: 1%;
		    font-size: 19px;
		  }

		  select{
		    width: 50%;
		    padding: 1%;
		    margin: 1%;
		    font-size: 14px;
		  }
			body{
				font-family:Arial, Geneva, Helvetica, sans-serif;
			}

	      table
	      { margin-top: 15px;
	        border-style:solid;
	        border-width:2px;
	        border-color:darkcyan;
	        text-align: center;
	        margin-left: 10%;
	        margin-right: 10%;
	        font-family:Arial, Geneva, Helvetica, sans-serif;
	        font-size: 0.85vw;
	     }
	     th, td {
 		 	padding: 5px;
 		 	width:2%;
		}
		#addbutton{
			margin-top: 15px;
	        border-style:solid;
	        border-width:2px;
	        border-color:darkcyan;
	        text-align: center;
	        margin-left: 45%;
	        margin-right: 45%;
		}
	      button {margin: 10px;
	      }

	      h1{
	        margin: auto;
	        width: 75%;
	        border: 3px solid black;
	        padding: 10px;
	        text-align: center;
	        font-family:Arial, Geneva, Helvetica, sans-serif;
	      }

	      h3{
	        width: 100%;
	        padding-top: 10px;
	        text-align: center;
	        font-family:Arial, Geneva, Helvetica, sans-serif;
	      }

	      #mySubmit, button {margin: 10px;
	      	width: 15%;
		    padding: 1%;
		    margin: 1%;
		    font-size: 16px;
	      }

			#myForm{
				text-align: center;
			}


	    </style>
 	
		<link rel="stylesheet" type="text/css" href="css/profile.css" />
		<script src="myjs.js" type="text/javascript"></script>
	</head>
	<body>
		
		
		<br>

		<h1 id="myShip">Shipping Details</h1>

		<?php
		$Username = $_SESSION['username'];
		if(!isset($_SESSION['Recipient_LastName'])){
		?>
			<div id ="actualform">
			<h3>Sender's Information:</h3>

				<table id="orderstable" class="orderstable">
					<tr>
						<th>LastName</th>
						<th>FirstName</th>
						<th>MiddleInitial</th>
						<th>Address</th>
						<th>ContactNum</th>
						<th>Email</th>
						<th>Username</th>


					</tr>
					<?php
						require 'includes\functions.inc.php';
						require 'includes\dbh.inc.php';
							
						$sql = "SELECT * FROM sender WHERE Username='".$Username."';";
						$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows < 1) {
									if ($_SESSION["entity"] === "rider"){


										$sql = "SELECT * FROM rider WHERE Username='".$Username."';";
										$result = $conn-> query($sql) or die($conn->error);

										while ($row = $result-> fetch_assoc()) {
											$Sender_LastName = $row["Rider_LastName"];
											$Sender_FirstName = $row["Rider_FirstName"];
											$Sender_MiddleInitial = $row["Rider_MiddleInitial"];
											$Sender_Address = $row["Rider_Address"];
											$Sender_ContactNum = $row["Rider_ContactNum"];
											$Sender_Email = $row["Rider_Email"];
										}
									}
									if ($_SESSION["entity"] === "staff"){


										$sql = "SELECT * FROM staff WHERE Username='".$Username."';";
										$result = $conn-> query($sql) or die($conn->error);

										while ($row = $result-> fetch_assoc()) {
											$Sender_LastName = $row["Staff_LastName"];
											$Sender_FirstName = $row["Staff_FirstName"];
											$Sender_MiddleInitial = $row["Staff_MiddleInitial"];
											$Sender_Address = $row["Staff_Address"];
											$Sender_ContactNum = $row["Staff_ContactNum"];
											$Sender_Email = $row["Staff_Email"];
										}
									}

									$SELECT = "Select Username From sender Where Username = ? Limit 1";
									$INSERT = "INSERT Into sender (Sender_LastName, Sender_FirstName, Sender_MiddleInitial, Sender_Address, Sender_ContactNum, Sender_Email, Username) values (?, ?, ?, ?, ?, ?, ?)";

									$stmt = $conn->prepare($SELECT);
									$stmt->bind_param("s", $Username);
									$stmt->execute();
									$stmt->bind_result($Username);
									$stmt->store_result();
									$rnum = $stmt->num_rows;

									
									$stmt->close();

									$stmt = $conn->prepare($INSERT);
									$stmt->bind_param("sssssss", $Sender_LastName, $Sender_FirstName, $Sender_MiddleInitial, $Sender_Address, $Sender_ContactNum, $Sender_Email, $Username);
									$stmt->execute();

									$stmt->close();
									$conn->close();
								}

						require 'includes\dbh.inc.php';
						
						$sql = "SELECT * FROM sender WHERE Username='".$Username."';";
							$result = $conn-> query($sql) or die($conn->error);

						if ($result-> num_rows >0) {
							while ($row = $result-> fetch_assoc()) {
								echo "<tr>
										<td>". $row["Sender_LastName"]."</td>
										<td>". $row["Sender_FirstName"]."</td>
										<td>". $row["Sender_MiddleInitial"]."</td>
										<td>". $row["Sender_Address"]."</td>
										<td>". $row["Sender_ContactNum"]."</td>
										<td>". $row["Sender_Email"]."</td>
										<td>". $row["Username"]."</td>
										
										</tr>";

							}
							echo "</table";
						}
						else {
							echo "0 result";
						}
						$conn -> close();
					?>
				</table>
				<?php
						echo "<center><button onclick=\"location.href='./profile.php'\">Edit Sender's Information</button></center>";
					
				?>
			
			<form action = "shippingSuccess.php" method="post" id="myForm">

			<h3>Recipient's Information:</h3>
				Last Name: <input type="text" name="Recipient_LastName"><br>
				First Name: <input type="text" name="Recipient_FirstName"><br>
				Middle Initial: <input type="text" name="Recipient_MiddleInitial"><br>
				Address: <input type="text" name="Recipient_Address"><br>
				Contact Number: <input type="text" name="Recipient_ContactNum"><br>
				Email: <input type="text" name="Recipient_Email"><br>
			<br>
			<br>
			<h3>Package Information:</h3>
			<br>
			<div class="desc">
				Base Price: Php120<br>
			</div>
			
			<br>
				Is the package fragile? 
				<select name="Package_Fragility" id="qtyFragile">
					<option value="No"> No </option>
					<option value="Yes"> Yes </option>
				</select>
				<br>
				<div class="desc">
				Php 30 if the package is Fragile<br>
				</div>
				<br>
				Package Size: 
				<select name="Package_size" id="qtySize">
					<option value="Small">Small</option>
					<option value="Medium">Medium</option>
					<option value="Large">Large</option>
					<option value="Extra Large">Extra Large</option>
				</select>
				<br>
				<div class="desc">
				Small (Php 0) - less than 10 kilograms<br>
				Medium (Php 20) - 10-19 kilograms<br>
				Large (Php 35) - 20-29 kilograms<br>
				Extra Large (Php 45) - 30+ kilograms<br>
			</div>
				<br>
				Package_Deal:
				<select name="Package_Deal" id="qtyDeal">
					<option value="Regular">Regular</option>
					<option value="Express">Express</option>
				</select>
				<br>
				<div class="desc">
				Regular (Php 0) - 4-8 days<br>
				Express (Php 50) - 1-2 days<br>
				</div>
				<br>
				
				Payment Method: 
				<select name="Payment_Method" id="qtyPayment">
					<option value="Cash on Delivery">Cash on Delivery</option>
					<option value="Gcash">Gcash</option>
					<option value="E-bank">E-bank</option>
					<option value="Dogecoin">Dogecoin</option>
				</select>
				<br>
				Choose nearest branch:
					 <?php
						 	require 'includes\dbh.inc.php';
						 	$query = "select * from branch";
							$result = mysqli_query($conn,$query);
							if(mysqli_num_rows($result) > 0){
								echo "<select name='Branch_Name'>";
								while($row = mysqli_fetch_assoc($result)){
									echo "<option value='".$row['Branch_Name']."'>"
									.$row['Branch_Name']."</option>";
								}
								echo "</select><br>";
							}
							mysqli_close($conn);
					?>

				<br>
				Additional Instructions: <input type="text" name="Additional_Instructions"><br>
				<input type="hidden" name="Amount" id="Amount" Size="6" readonly>
				<input type="hidden" name="ETA" id="ETA" Size="6" readonly>
				<br>


				<input type="submit" value="Confirm" onclick="myCompute()" id="mySubmit">
			<br>
			</form>
			<br>
		</div>
		<?php
			}

			else {
		?>


			<div id ="actualform">
				<h3>Sender's Information:</h3>

					<table id="orderstable">
						<tr>
							<th>LastName</th>
							<th>FirstName</th>
							<th>MiddleInitial</th>
							<th>Address</th>
							<th>ContactNum</th>
							<th>Email</th>
							<th>Username</th>


						</tr>
						<?php
							require 'includes\functions.inc.php';
							require 'includes\dbh.inc.php';

							
							
							
							$sql = "SELECT * FROM sender WHERE Username='".$Username."';";
								$result = $conn-> query($sql) or die($conn->error);

							if ($result-> num_rows >0) {
								while ($row = $result-> fetch_assoc()) {
									echo "<tr>
											<td>". $row["Sender_LastName"]."</td>
											<td>". $row["Sender_FirstName"]."</td>
											<td>". $row["Sender_MiddleInitial"]."</td>
											<td>". $row["Sender_Address"]."</td>
											<td>". $row["Sender_ContactNum"]."</td>
											<td>". $row["Sender_Email"]."</td>
											<td>". $row["Username"]."</td>
											
											</tr>";

								}
								echo "</table";
							}
							else {
								echo "0 result";
							}
							$conn -> close();
						?>
					</table>
					<?php
						if($Username === $_SESSION['username']){
							echo "<center><button onclick=\"location.href='./profile.php'\">Edit Sender's Information</button></center>";
						}
						
					?>
					<center>
					<button onclick="location.href='./myShippingAdmin.php?change=changesender.php'">Change Sender</button></center>
				
				<form action = "shippingSuccess.php" method="post" id="myForm">

				<h3>Recipient's Information:</h3>
				<?php
						echo "Last Name: <input type=\"text\" name=\"Recipient_LastName\" value='".$_SESSION['Recipient_LastName']."'><br>";
						echo "First Name: <input type=\"text\" name=\"Recipient_FirstName\" value='".$_SESSION['Recipient_FirstName']."'><br>";
						echo "Middle Initial: <input type=\"text\" name=\"Recipient_MiddleInitial\" value='".$_SESSION['Recipient_MiddleInitial']."'><br>";
						echo "Address: <input type=\"text\" name=\"Recipient_Address\" value='".$_SESSION['Recipient_Address']."'><br>";
						echo "Contact Number: <input type=\"text\" name=\"Recipient_ContactNum\" value='".$_SESSION['Recipient_ContactNum']."'><br>";
						echo "Email: <input type=\"text\" name=\"Recipient_Email\" value='".$_SESSION['Recipient_Email']."'><br>";
					echo"<br>
					<br>
					<h3>Package Information:</h3>
					<br>
					Base Price: Php120<br>
					<br>
						Is the package fragile? ";
						echo"<select name=\"Package_Fragility\" id=\"qtyFragile\">
							<option value=\"No\"";
							if($_SESSION['Package_Fragility'] == "No"){
								echo " selected";
							}
							echo "> No </option>";
							echo" <option value=\"Yes\"";
							if($_SESSION['Package_Fragility'] == "Yes"){
								echo " selected";
							}
							echo"> Yes </option>
						</select>
						<br>
						Php 30 if the package is Fragile<br>
						<br>
						Package Size: ";

						echo"<select name=\"Package_size\" id=\"qtySize\">
							<option value=\"Small\"";
							if($_SESSION['Package_size'] == "Small"){
								echo " selected";
							}
							echo">Small</option>";
							echo"<option value=\"Medium\"";
							if($_SESSION['Package_size'] == "Medium"){
								echo " selected";
							}
							echo">Medium</option>";
							echo"<option value=\"Large\"";
							if($_SESSION['Package_size'] == "Large"){
								echo " selected";
							}
							echo">Large</option>";
							echo"<option value=\"Extra Large\"";
							if($_SESSION['Package_size'] == "Extra Large"){
								echo " selected";
							}
							echo">Extra Large</option>
						</select>
						<br>
						Small (Php 0) - less than 10 kilograms<br>
						Medium (Php 20) - 10-19 kilograms<br>
						Large (Php 35) - 20-29 kilograms<br>
						Extra Large (Php 45) - 30+ kilograms<br>
						<br>
						Package_Deal:
						<select name=\"Package_Deal\" id=\"qtyDeal\">
							<option value=\"Regular\"";
							if($_SESSION['Package_Deal'] == "Regular"){
								echo " selected";
							}
							echo">Regular</option>";
							echo"<option value=\"Express\"";
							if($_SESSION['Package_Deal'] == "Express"){
								echo " selected";
							}
							echo">Express</option>
						</select>
						<br>
						Regular (Php 0) - 4-8 days<br>
						Express (Php 50) - 1-2 days<br>
						
						<br>
						
						Payment Method: ";
						echo"<select name=\"Payment_Method\" id=\"qtyPayment\">
							<option value=\"Cash on Delivery\"";
							if($_SESSION['Payment_Method'] == "Cash on Delivery"){
								echo " selected";
							}
							echo">Cash on Delivery</option>";
							echo"<option value=\"Gcash\"";
							if($_SESSION['Payment_Method'] == "Gcash"){
								echo " selected";
							}
							echo">Gcash</option>";
							echo"<option value=\"E-bank\"";
							if($_SESSION['Payment_Method'] == "E-bank"){
								echo " selected";
							}
							echo">E-bank</option>";
							echo"<option value=\"Dogecoin\"";
							if($_SESSION['Payment_Method'] == "Dogecoin"){
								echo " selected";
							}
							echo">Dogecoin</option>
						</select>
						<br>
						Choose nearest branch:";
						require 'includes\dbh.inc.php';
						 	$query = "select * from branch";
							$result = mysqli_query($conn,$query);
							if(mysqli_num_rows($result) > 0){
								echo "<select name='Branch_Name'>";
								while($row = mysqli_fetch_assoc($result)){
									echo "<option value='".$row['Branch_Name']."'";
									if($row['Branch_Name'] == $_SESSION['Branch_Name']){
										echo " selected";
									}
									echo ">".$row['Branch_Name']."</option>";

								}
								echo "</select><br>";
							}
							mysqli_close($conn);
						echo"
						<br>";
						echo"Additional Instructions: <input type=\"text\" name=\"Additional_Instructions\" value='".$_SESSION['Additional_Instructions']."'><br>
						<input type=\"hidden\" name=\"Amount\" id=\"Amount\" Size=\"6\" readonly>
						<input type=\"hidden\" name=\"ETA\" id=\"ETA\" Size=\"6\" readonly>
						<br>
					

					<input type=\"submit\" value=\"Confirm\" onclick=\"myCompute()\" id=\"mySubmit\">
				<br>
				</form>
				<br>
			</div>";

			
			unset($_SESSION['Recipient_LastName']);
			unset($_SESSION['Recipient_FirstName']);
			unset($_SESSION['Recipient_MiddleInitial']);
			unset($_SESSION['Recipient_Address']);
			unset($_SESSION['Recipient_ContactNum']);
			unset($_SESSION['Recipient_Email']);

					
			unset($_SESSION['Package_Fragility']);
			unset($_SESSION['Package_size']);
			unset($_SESSION['Package_Deal']);
			unset($_SESSION['Additional_Instructions']);
			unset($_SESSION['Branch_Name']);

			unset($_SESSION['Payment_Method']);



		
			
		}
		?>

		<center>
	 	<div>
		 	<?php 
			 if (isset($_GET["error"])) {
			 	if ($_GET["error"] == "emptyinput") {
			 		echo "<p> Fill in all Fields!</p>";
			 	}
			 	else if ($_GET["error"] == "invalidlastname") {
			 		echo "<p> Choose a proper last name for the Recipient! </p>";
			 	}
			 	else if ($_GET["error"] == "invalidfirstname") {
			 		echo "<p> Choose a proper first name for the Recipient! </p>";
			 	}
			 	else if ($_GET["error"] == "invalidmiddle") {
			 		echo "<p> Choose a proper middle initial for the Recipient! </p>";
			 	}
			 	else if ($_GET["error"] == "invalidemail") {
			 		echo "<p> Email invalid. </p>";
			 	}
			 	else if ($_GET["error"] == "invalidnumber") {
			 		echo "<p> Input a valid number. </p>";
			 	}
			 }
			 ?>
	 	</div>
	 </center>
	

	<?php 

		
		include_once 'footer.php';
	 ?>
	 </body>

</html>