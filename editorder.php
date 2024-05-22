
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/profile.css" />
		<?php 
			include_once 'header.php'; 
		 ?>
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
		    background:white;
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


	      #mySubmit, button {
	      	margin: 10px;
	      	color:white;

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
	        padding-top: 5px;
	        text-align: center;
	        font-family:Arial, Geneva, Helvetica, sans-serif;
	      }


			#error-cont{
				display: flex;
				justify-content: center;
				align-items: center;
			}

			#error{
				text-align: center;
				width: 40%;
				padding: 10px;
				border: 5px solid #f03e3e;
				margin: 0;	
				color: #f03e3e;



			}


	    </style>
	    
	     <?php
	    	$myAdminCheck=0;

	    	if(!isset($_SESSION["entity"])){
					$myAdminCheck=1;
			}
	    	else if ( ($_SESSION["entity"] !== "manager") ) {
	    		if ( ($_SESSION["entity"] !== "SuperAdmin") ) {
	    			
	    			$myAdminCheck=1;

				}
				else{
					$myAdminCheck=0;
				}

			}

			if ($myAdminCheck == 1) {
				echo "<center><h3>You are not allowed access to this page.</h3>";
				echo "<button class=\"signbutton\"onclick=\"location.href='homepage.php'\">Go back to homepage</button></center>";
			}
			else{
	    ?>
 
 

	<script src="myjs.js" type="text/javascript"></script>
	</head>
	<body>
		
		<br>
		
		<h1>Edit Shipping Details</h1>
		<br>
		<?php
		$success = 0;

		if(isset($_POST["Recipient_LastName"]) && !isset($_GET["error"])){
			require 'includes\dbh.inc.php';

				
				$_SESSION['Recipient_LastName'] = $_POST['Recipient_LastName'];
				$_SESSION['Recipient_FirstName'] = $_POST['Recipient_FirstName'];
				$_SESSION['Recipient_MiddleInitial'] = $_POST['Recipient_MiddleInitial'];
				$_SESSION['Recipient_Address'] = $_POST['Recipient_Address'];
				$_SESSION['Recipient_ContactNum'] = $_POST['Recipient_ContactNum'];
				$_SESSION['Recipient_Email'] = $_POST['Recipient_Email'];

				
				$_SESSION['Package_Fragility'] = $_POST['Package_Fragility'];
				$_SESSION['Package_size'] = $_POST['Package_size'];
				$_SESSION['Package_Deal'] = $_POST['Package_Deal'];
				$_SESSION['Additional_Instructions'] = $_POST['Additional_Instructions'];
				$_SESSION['Branch_Name'] = $_POST['Branch_Name'];

				$_SESSION['Payment_Method'] = $_POST['Payment_Method'];
				$_SESSION['Tracking_Number'] = $_POST['Tracking_Number'];

				if( empty($_POST['Recipient_FirstName']) || empty($_POST['Recipient_LastName']) || empty($_POST['Recipient_MiddleInitial']) || empty($_POST['Recipient_Address']) || empty($_POST['Recipient_ContactNum']) || empty($_POST['Recipient_Address']) || empty($_POST['Recipient_Email']) ||  empty($_POST['Package_Fragility']) || empty($_POST['Package_size']) || empty($_POST['Package_Deal']) || empty($_POST['Payment_Method']) || empty($_POST['Branch_Name'])){

			
					if($_SESSION["entity"] === "manager"){
						header("location:./editorder.php?error=emptyinput");
					}
					elseif($_SESSION["entity"] === "SuperAdmin"){
						header("location:./editorder.php?error=emptyinput");
					}
					
					exit();	
					

				}else{

					

					if(!preg_match("/^[a-zA-Z. ]+$/",$_POST['Recipient_LastName'])){
						if($_SESSION["entity"] === "manager" ){
							header("location: ./editorder.php?error=invalidlastname");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location:./editorder.php?error=invalidlastname");
						}
	
						exit();	
					}
					elseif(!preg_match("/^[a-zA-Z. ]+$/",$_POST['Recipient_FirstName'])){
						if($_SESSION["entity"] === "manager" ){
							header("location:./editorder.php?error=invalidfirstname");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location:./editorder.php?error=invalidfirstname");
						}


						exit();	

					}
					elseif(!preg_match("/^[a-zA-Z. ]+$/",$_POST['Recipient_MiddleInitial'])){
						if($_SESSION["entity"] === "manager" ){
							header("location:./editorder.php?error=invalidmiddle");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location:./editorder.php?error=invalidmiddle");
						}


						exit();	
						
					}
					elseif(!preg_match("/^[0-9 ()-]+$/",$_POST['Recipient_ContactNum'])){
						if($_SESSION["entity"] === "manager" ){
							header("location:./editorder.php?error=invalidnumber");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location:./editorder.php?error=invalidnumber");
						}


						exit();	
					}
					elseif (!filter_var($_POST['Recipient_Email'], FILTER_VALIDATE_EMAIL)) {
						if($_SESSION["entity"] === "manager" ){
							header("location:./editorder.php?error=invalidemail");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location:./editorder.php?error=invalidemail");
						}

						exit();		
					}else{	ob_start();
							require 'includes\dbh.inc.php';

							$sql = "SELECT * from recipient";
							$result = $conn-> query($sql) or die($conn->error);

							$query = "update recipient set Recipient_LastName = '".$_SESSION['Recipient_LastName']."', Recipient_FirstName = '".$_SESSION['Recipient_FirstName']."', Recipient_MiddleInitial = '".$_SESSION['Recipient_MiddleInitial']."', Recipient_Address = '".$_SESSION['Recipient_Address']."', Recipient_ContactNum = '".$_SESSION['Recipient_ContactNum']."', Recipient_Email = '".$_SESSION['Recipient_Email']."' where Recipient_ID = '".$_SESSION['Recipient_ID']."';";

							mysqli_query($conn, $query);
							mysqli_close($conn);
							require 'includes\dbh.inc.php';


							$sql = "SELECT * from package";
							$result = $conn-> query($sql) or die($conn->error);

							$query = "update package set Package_Fragility = '".$_SESSION['Package_Fragility']."', Package_size = '".$_SESSION['Package_size']."', Package_Deal = '".$_SESSION['Package_Deal']."', Additional_Instructions = '".$_SESSION['Additional_Instructions']."', Branch_Name = '".$_SESSION['Branch_Name']."', Payment_Method = '".$_SESSION['Payment_Method']."', Amount = '".$_SESSION['Amount']."' where Package_ID = '".$_SESSION['Package_ID']."';";

							mysqli_query($conn, $query);
							mysqli_close($conn);
							require 'includes\dbh.inc.php';

							$sql = "SELECT * from tracker";
							$result = $conn-> query($sql) or die($conn->error);

							$query = "update tracker set ETA = '".$_POST["ETA"]."' where Tracker_Number = '".$_SESSION['Tracker_Number']."';";

							mysqli_query($conn, $query);
							mysqli_close($conn);

							$success=1;

							unset($_SESSION['Recipient_ID']);
							unset($_SESSION['Recipient_LastName']);
							unset($_SESSION['Recipient_FirstName']);
							unset($_SESSION['Recipient_MiddleInitial']);
							unset($_SESSION['Recipient_Address']);
							unset($_SESSION['Recipient_ContactNum']);
							unset($_SESSION['Recipient_Email']);

							unset($_SESSION['Package_ID']);
							unset($_SESSION['Package_Fragility']);
							unset($_SESSION['Package_size']);
							unset($_SESSION['Package_Deal']);
							unset($_SESSION['Additional_Instructions']);
							unset($_SESSION['Branch_Name']);

							unset($_SESSION['Payment_Method']);
							unset($_SESSION['Sender_ID']);
							unset($_SESSION['Tracking_Number']);

							
						 	header('Location: ./admin.php');
							ob_end_flush();
							die();


					}			
				
				}

				mysqli_close($conn);
			

			}
		}

		
		if (!isset($_GET["error"]) && $success == 0){
		
			if(isset($_GET['Package_ID'])){
				$Package_ID = $_GET['Package_ID'];

			}
			else if(isset($_GET['Recipient_ID'])){
				require 'includes\dbh.inc.php';
				$sql = "SELECT Package_ID FROM receives WHERE Recipient_ID='".$_GET['Recipient_ID']."';";
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							$Package_ID = $row['Package_ID'];
						}		
					}
				mysqli_close($conn);

			}
			else if(isset($_GET['Tracking_Number'])){
				require 'includes\dbh.inc.php';
				$sql = "SELECT Package_ID FROM tracks WHERE Tracking_Number='".$_GET['Tracking_Number']."';";
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							$Package_ID = $row['Package_ID'];
						}		
					}
					mysqli_close($conn);
			}

			$_SESSION['Package_ID'] = $Package_ID;
			
			require 'includes\dbh.inc.php';

			$sql = "SELECT Sender_ID FROM sends WHERE Package_ID='".$Package_ID."';";
			$result = $conn-> query($sql) or die($conn->error);

			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
					$Sender_ID = $row['Sender_ID'];
				}		
			}
			$_SESSION['Sender_ID'] = $Sender_ID;

			mysqli_close($conn);
			require 'includes\dbh.inc.php';

			$sql = "SELECT Recipient_ID FROM receives WHERE Package_ID='".$Package_ID."';";
			$result = $conn-> query($sql) or die($conn->error);

			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
					$Recipient_ID = $row['Recipient_ID'];
				}		
			}

			$_SESSION['Recipient_ID'] = $Recipient_ID;

			mysqli_close($conn);
			require 'includes\dbh.inc.php';

			$sql = "SELECT Tracking_Number FROM tracks WHERE Package_ID='".$Package_ID."';";
			$result = $conn-> query($sql) or die($conn->error);

			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
				$Tracking_Number = $row['Tracking_Number'];
				}		
			}

			$_SESSION['Tracking_Number'] = $Tracking_Number;
			mysqli_close($conn);
			require 'includes\dbh.inc.php';

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

							
							
							
							$sql = "SELECT * FROM sender WHERE Sender_ID='".$Sender_ID."';";
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
						echo "<center><button onclick=\"location.href='./editprofile.php?Sender_ID=".$Sender_ID."'\">Edit Sender's Information</button></center>";
						
						
					?>
					<center>
					
				
				<form action = "./editorder.php" method="post" id="myForm">

				<h3>Recipient's Information:</h3>
				<?php
					require 'includes\dbh.inc.php';

						$query = "select * from Recipient where Recipient_ID='".$Recipient_ID."'";
						$result = mysqli_query($conn, $query);
						$orig = mysqli_fetch_assoc($result);

						echo "Last Name: <input type=\"text\" name=\"Recipient_LastName\" value='".$orig['Recipient_LastName']."'><br>";
						echo "First Name: <input type=\"text\" name=\"Recipient_FirstName\" value='".$orig['Recipient_FirstName']."'><br>";
						echo "Middle Initial: <input type=\"text\" name=\"Recipient_MiddleInitial\" value='".$orig['Recipient_MiddleInitial']."'><br>";
						echo "Address: <input type=\"text\" name=\"Recipient_Address\" value='".$orig['Recipient_Address']."'><br>";
						echo "Contact Number: <input type=\"text\" name=\"Recipient_ContactNum\" value='".$orig['Recipient_ContactNum']."'><br>";
						echo "Email: <input type=\"text\" name=\"Recipient_Email\" value='".$orig['Recipient_Email']."'><br>";

					$query = "select * from Package where Package_ID='".$Package_ID."'";
					$result = mysqli_query($conn, $query);
					$orig = mysqli_fetch_assoc($result);

					echo"<br>
					<br>
					<h3>Package Information:</h3>
					<br>
					Base Price: Php120<br>
					<br>
						Is the package fragile? ";
						echo"<select name=\"Package_Fragility\" id=\"qtyFragile\">
							<option value=\"No\"";
							if($orig['Package_Fragility'] == "No"){
								echo " selected";
							}
							echo "> No </option>";
							echo" <option value=\"Yes\"";
							if($orig['Package_Fragility'] == "Yes"){
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
							if($orig['Package_size'] == "Small"){
								echo " selected";
							}
							echo">Small</option>";
							echo"<option value=\"Medium\"";
							if($orig['Package_size'] == "Medium"){
								echo " selected";
							}
							echo">Medium</option>";
							echo"<option value=\"Large\"";
							if($orig['Package_size'] == "Large"){
								echo " selected";
							}
							echo">Large</option>";
							echo"<option value=\"Extra Large\"";
							if($orig['Package_size'] == "Extra Large"){
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
							if($orig['Package_Deal'] == "Regular"){
								echo " selected";
							}
							echo">Regular</option>";
							echo"<option value=\"Express\"";
							if($orig['Package_Deal'] == "Express"){
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
							if($orig['Payment_Method'] == "Cash on Delivery"){
								echo " selected";
							}
							echo">Cash on Delivery</option>";
							echo"<option value=\"Gcash\"";
							if($orig['Payment_Method'] == "Gcash"){
								echo " selected";
							}
							echo">Gcash</option>";
							echo"<option value=\"E-bank\"";
							if($orig['Payment_Method'] == "E-bank"){
								echo " selected";
							}
							echo">E-bank</option>";
							echo"<option value=\"Dogecoin\"";
							if($orig['Payment_Method'] == "Dogecoin"){
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
									if($row['Branch_Name'] == $orig['Branch_Name']){
										echo " selected";
									}
									echo ">".$row['Branch_Name']."</option>";

								}
								echo "</select><br>";
							}
							mysqli_close($conn);
						echo"
						<br>";
						echo"Additional Instructions: <input type=\"text\" name=\"Additional_Instructions\" value='".$orig['Additional_Instructions']."'><br>
						<input type=\"hidden\" name=\"Amount\" id=\"Amount\" Size=\"6\" readonly>
						<input type=\"hidden\" name=\"ETA\" id=\"ETA\" Size=\"6\" readonly>
						<br>
					

					<input type=\"submit\" value=\"Confirm\" onclick=\"myCompute()\" id=\"mySubmit\">";
					echo "<button type='button' class='goBack' onclick=\"location.href='./admin.php'\">Go Back to Admin Page</button>";
				echo"<br>
				</form>
				<br>
			</div>";
			}


			else {

				$Package_ID = $_SESSION['Package_ID'];
				
				$Recipient_ID = $_SESSION['Recipient_ID'];

				
				$Tracking_Number = $_SESSION['Tracking_Number'];

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

								
								
								
								$sql = "SELECT * FROM sender WHERE Sender_ID='".$_SESSION['Sender_ID']."';";
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
							echo "<center><button onclick=\"location.href='./editsender.php?Sender_ID=".$_SESSION['Sender_ID']."'\">Edit Sender's Information</button></center>";
							
							
						?>
						<center>
						
					
					<form action = "./editorder.php" method="post" id="myForm">

					<h3>Recipient's Information:</h3>
					<?php
						require 'includes\dbh.inc.php';
						$query = "select * from Recipient where Recipient_ID='".$Recipient_ID."'";
						$result = mysqli_query($conn, $query);

							echo "Last Name: <input type=\"text\" name=\"Recipient_LastName\" value='".$_SESSION['Recipient_LastName']."'><br>";
							echo "First Name: <input type=\"text\" name=\"Recipient_FirstName\" value='".$_SESSION['Recipient_FirstName']."'><br>";
							echo "Middle Initial: <input type=\"text\" name=\"Recipient_MiddleInitial\" value='".$_SESSION['Recipient_MiddleInitial']."'><br>";
							echo "Address: <input type=\"text\" name=\"Recipient_Address\" value='".$_SESSION['Recipient_Address']."'><br>";
							echo "Contact Number: <input type=\"text\" name=\"Recipient_ContactNum\" value='".$_SESSION['Recipient_ContactNum']."'><br>";
							echo "Email: <input type=\"text\" name=\"Recipient_Email\" value='".$_SESSION['Recipient_Email']."'><br>";

						$query = "select * from Package where Package_ID='".$Package_ID."'";
						$result = mysqli_query($conn, $query);
						$orig = mysqli_fetch_assoc($result);

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
					echo"<br>
					</form>
					<br>
				</div>";
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
		include_once 'footer.php';?>
	</body>


</html>