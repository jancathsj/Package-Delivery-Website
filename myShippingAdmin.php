<?php 
	include_once 'header.php';
	
 ?>



<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="css/profile.css" />
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

 		h1{
	        margin: auto;
	        width: 75%;
	        border: 3px solid black;
	        padding: 10px;
	        text-align: center;
	        font-family:Arial, Geneva, Helvetica, sans-serif;
	      }

			#editbutton {
	      	margin: auto;
	      	font-family: "Roboto", sans-serif;
			  text-transform: uppercase;
			  outline: 0;
			  background:#338BA8 ;
			  width: 100%;
			  border: 0;
			  padding: 8px;
			  color: #FFFFFF;
			  font-size: 14px;
			  -webkit-transition: all 0.3 ease;
			  transition: all 0.3 ease;
			  cursor: pointer;

	      }
		
			#askusername{
				margin: 35%;
				margin-top: 1%;
				margin-bottom: 1%;
				position: relative;
				z-index: 1;
				background: #8AC7DB;
				max-width: 660px;
				padding: 45px;
				box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

			}
			#actualform{
				margin: auto;
			}

			.container {
			  display: block;
			  position: relative;
			  padding-left: 35px;
			  margin-bottom: 12px;
			  cursor: pointer;
			  font-size: 22px;
			  -webkit-user-select: none;
			  -moz-user-select: none;
			  -ms-user-select: none;
			  user-select: none;

			}

			/* Hide the browser's default radio button */
			.container input {
			  position: absolute;
			  opacity: 0;
			  cursor: pointer;
			}

			/* Create a custom radio button */
			.checkmark {
			  position: absolute;
			  top: 0;
			  left: 0;
			  height: 25px;
			  width: 25px;
			  background-color: #eee;
			  border-radius: 50%;

			}

			/* On mouse-over, add a grey background color */
			.container:hover input ~ .checkmark {
			  background-color: #ccc;
			}

			/* When the radio button is checked, add a blue background */
			.container input:checked ~ .checkmark {
			  background-color: #2196F3;
			}

			/* Create the indicator (the dot/circle - hidden when not checked) */
			.checkmark:after {
			  content: "";
			  position: absolute;
			  display: none;
			}

			/* Show the indicator (dot/circle) when checked */
			.container input:checked ~ .checkmark:after {
			  display: block;
			}

			/* Style the indicator (dot/circle) */
			.container .checkmark:after {
			 	top: 9px;
				left: 9px;
				width: 8px;
				height: 8px;
				border-radius: 50%;
				background: white;

			}

			.askusername {
				text-align:left
			}
			#senderUsername{
				width:100%;
			}


			#mySubmit2 {
				font-family: "Roboto", sans-serif;
				text-transform: uppercase;
				outline: 0;
				background:#338BA8 ;
				width: 30%;
				border: 0;
				padding: 10px;
				color: #FFFFFF;
				font-size: 14px;
				-webkit-transition: all 0.3 ease;
				transition: all 0.3 ease;
				cursor: pointer;
			 }

			#mySubmit2:hover{
				width: 30%;
				font-weight: bold; 
				background: #43A6C6;
				color: white;
			}
			h1{
				width:75%;
			}
			

	    </style>
 
	
		
		<script src="myjs.js" type="text/javascript"></script>
	</head>
	<body>
	

		<br>
			<?php if(isset($_POST['usernameChoice'])){?>
			<h1>Shipping Details</h1>
			<?php } 
			if(isset($_GET["change"])){
				unset($_SESSION['orderusername']);
			}
			if(!isset($_POST['usernameChoice']) && !isset($_GET["error"])){

			?>
			
			<div id="askusername">
				

						
						<form method="post" action="./myShippingAdmin.php">
							<h3 class="askusername">Add order as:</h3>
							
							<label for="adminChoice" class="container">Admin
							<input type="radio" id="adminChoice"name="usernameChoice" value="admin" checked>
							 <span class="checkmark"></span></label><br>
							<label for="senderChoice" class="container">One of the existing senders
							<input type="radio" id="senderChoice"name="usernameChoice" value="sender">
							 <span class="checkmark"></span></label><br> 

							 <h3 class="askusername">If you chose one of the existing senders, choose one sender:</h3>
							 <?php
							 	if($_SESSION["entity"] === "manager"){
								 	require 'includes\dbh.inc.php';
									$Username = $_SESSION['username'];
									

									$sql = "SELECT Branch_Name FROM manager WHERE Username='".$Username."';";

									$result = $conn-> query($sql) or die($conn->error);

									if ($result-> num_rows >0) {
										while ($row = $result-> fetch_assoc()) {
											$Branch_Name = $row["Branch_Name"];
										}		
									}
									mysqli_close($conn);

									$Package_IDa = array();
									$Sender_IDa = array();
									require 'includes\dbh.inc.php';
									$sql = "SELECT Package_ID FROM package WHERE Branch_Name='".$Branch_Name."';";
									$result = $conn-> query($sql) or die($conn->error);

									if ($result-> num_rows >0) {
										while ($row = $result-> fetch_assoc()) {
											array_push($Package_IDa, $row["Package_ID"]);
										}		
									}
									else{
										array_push($Package_IDa, "0");
									}
									mysqli_close($conn);

									foreach ($Package_IDa as $x){
										require 'includes\dbh.inc.php';
										$sql = "SELECT Sender_ID FROM tracker WHERE Package_ID='".$x."';";;
										$result = $conn-> query($sql) or die($conn->error);

										if ($result-> num_rows >0) {
											while ($row = $result-> fetch_assoc()) {
												array_push($Sender_IDa, $row["Sender_ID"]);
																	
											}		
										}
										else{
											array_push($Sender_IDa, "0");
											
										}
										mysqli_close($conn);

									}

								 	require 'includes\dbh.inc.php';
								 	$query = "select * from sender where Sender_ID IN (" . implode(',', $Sender_IDa). ")";
									$result = mysqli_query($conn,$query);
									if(mysqli_num_rows($result) > 0){
										echo "<select name='senderUsername' id='senderUsername'>";
										while($row = mysqli_fetch_assoc($result)){
											echo "<option value='".$row['Username']."'>"
											.$row['Username']."</option>";
										}
										echo "</select><br>";
									}
									else{
										echo"There are no existing senders.<br>";
									}
									mysqli_close($conn);
								}
								else{
									require 'includes\dbh.inc.php';

									$query = "select * from sender";
									$result = mysqli_query($conn,$query);
									if(mysqli_num_rows($result) > 0){
										echo "<select name='senderUsername' id='senderUsername'>";
										while($row = mysqli_fetch_assoc($result)){
											echo "<option value='".$row['Username']."'>"
											.$row['Username']."</option>";
										}
										echo "</select><br>";
									}
									else{
										echo"There are no existing senders.<br>";
									}
									mysqli_close($conn);
								}
							 ?>

							 <br>
							 <center><input type="submit" value="Confirm" id="mySubmit2"></center>

							
						</form>
					</div>
				
				<?php
					}
					else{
						if(isset($_POST['usernameChoice'])){
							if($_POST['usernameChoice'] === "admin"){
								$Username = $_SESSION['username'];
								$_SESSION['orderusername'] = $_SESSION['username'];

								require 'includes\dbh.inc.php';
							
								$sql = "SELECT * FROM sender WHERE Username='".$Username."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows < 1) {

									$sql = "SELECT * FROM manager WHERE Username='".$Username."';";
									$result = $conn-> query($sql) or die($conn->error);

									while ($row = $result-> fetch_assoc()) {
										$Sender_LastName = $row["Manager_LastName"];
										$Sender_FirstName = $row["Manager_FirstName"];
										$Sender_MiddleInitial = $row["Manager_MiddleInitial"];
										$Sender_Address = $row["Manager_Address"];
										$Sender_ContactNum = $row["Manager_ContactNum"];
										$Sender_Email = $row["Manager_Email"];
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
							}
							elseif($_POST['usernameChoice'] === "sender") {

								$Username = $_POST['senderUsername'];
								$_SESSION['orderusername'] = $_POST['senderUsername'];
							}

						}


					

				?>

			

			<?php
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
						<th></th>


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

										<td>";
										if($Username === $_SESSION['username']){
											echo "<center><button onclick=\"location.href='./profile.php'\" id=\"editbutton\">Edit</button></center>";
										}else{
											echo "<center><button onclick=\"location.href='./editprofile.php?Sender_ID=".$row['Sender_ID']."'\" id=\"editbutton\">Edit</button></center>";
										}
										
									echo"</td>
										
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
				<br>
				<center>
				<button onclick="location.href='./myShippingAdmin.php?change=changesender.php'">Change Sender</button></center>
				<br>
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
			Base Price: Php120<br>
			<br>
				Is the package fragile? 
				<select name="Package_Fragility" id="qtyFragile">
					<option value="No"> No </option>
					<option value="Yes"> Yes </option>
				</select>
				<br>
				Php 30 if the package is Fragile<br>
				<br>
				Package Size: 
				<select name="Package_size" id="qtySize">
					<option value="Small">Small</option>
					<option value="Medium">Medium</option>
					<option value="Large">Large</option>
					<option value="Extra Large">Extra Large</option>
				</select>
				<br>
				Small (Php 0) - less than 10 kilograms<br>
				Medium (Php 20) - 10-19 kilograms<br>
				Large (Php 35) - 20-29 kilograms<br>
				Extra Large (Php 45) - 30+ kilograms<br>
				<br>
				Package_Deal:
				<select name="Package_Deal" id="qtyDeal">
					<option value="Regular">Regular</option>
					<option value="Express">Express</option>
				</select>
				<br>
				Regular (Php 0) - 4-8 days<br>
				Express (Php 50) - 1-2 days<br>
				
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
				<button type='button' onclick="location.href='./admin.php'" id="mySubmit">Go Back to Admin Page</button>
					
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

					<table id="orderstable" class="orderstable">
						<tr>
							<th>LastName</th>
							<th>FirstName</th>
							<th>MiddleInitial</th>
							<th>Address</th>
							<th>ContactNum</th>
							<th>Email</th>
							<th>Username</th>
							<th></th>


						</tr>
						<?php
							require 'includes\functions.inc.php';
							require 'includes\dbh.inc.php';

							$Username = $_SESSION['orderusername'];
							
							
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
											<td>";
										if($Username === $_SESSION['username']){
											echo "<center><button onclick=\"location.href='./profile.php'\" id=\"editbutton\">Edit</button></center>";
										}else{
											echo "<center><button onclick=\"location.href='./editprofile.php?Sender_ID=".$row['Sender_ID']."'\" id=\"editbutton\">Edit</button></center>";
										}
										
									echo"</td>
											
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
					<br>
					<center>
					<button onclick="location.href='./myShippingAdmin.php?change=changesender.php'">Change Sender</button></center>
					<br>
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
					

					<input type=\"submit\" value=\"Confirm\" onclick=\"myCompute()\" id=\"mySubmit\">";
					echo "<button type='button' onclick=\"location.href='./admin.php'\" id=\"mySubmit\">Go Back to Admin Page</button>";
					echo"
				
				</form>
				
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

		}
		include_once 'footer.php';
	 ?>
	 </body>

</html>