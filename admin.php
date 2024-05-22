
<html>
	<head>
		<?php 
			include_once 'header.php'; 
			include_once 'css/editRider.css.php';



		 ?>
		
		
	    <style>
	    	body{
				font-family:Arial, Geneva, Helvetica, sans-serif;
			}


	      table
	      { border: 5px solid white;
		  	border-collapse: collapse;
		    border-radius: 5px;
		    
		    font-weight: normal;
		    border: none;
		    border-collapse: collapse;
		    width: 100%;
		    max-width: 80%;
		    background-color: #67B7D1;

	      	margin-top: 15px;
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
		th{
			color: #ffffff;
    		background: #338BA8;
		}

		.orderstable td, .orderstable th {
		    text-align: center;
		    
		}

		.orderstable th {
		    color: #ffffff;
		    background: #338BA8;
		}


		.orderstable th:nth-child(odd) {
		    color: #ffffff;
		    background: #67B7D1;
		}

		.orderstable tr:nth-child(even) {
		    background: #F8F8F8;
		}

	      button {
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

	       h1{
	        margin: auto;
	        width: 75%;
	        padding: 10px;
	        text-align: center;
	        font-family:Arial, Geneva, Helvetica, sans-serif;
	        color: #ffffff;
    		background: #338BA8;
    		border: none;
	      }
	      h2{
	        margin: auto;
	        width: 75%;
	        background-color: #67B7D1;
	        padding: 10px;
	        text-align: center;
	        font-family:Arial, Geneva, Helvetica, sans-serif;
	      }

	      h3{
	        width: 100%;
	        padding-top: 5px;
	        text-align: center;
	        font-family:Arial, Geneva, Helvetica, sans-serif;
	        color: #338BA8;

	      }


			#myForm{
				text-align: center;
			}

			#mySubmit{
			margin: 10px;
	      	width: 10%;
		    padding: 1%;
		    margin: 1%;
		    font-size: 16px;
	        }
	        #accounts {
	        	margin-left: 10%;
	        }
	        #account, #add {
	        	margin: 10px;
		      	width: 20%;
			    padding: 1%;
			    margin: 1%;
			    font-size: 16px;
	        }

	        #filterselect, #filtertxt {
	        	margin: 10px;
		      	width: 11%;
			    padding: 5px;
			    margin: 0.5%;
			    font-size: 12px;
	        }
	        #FilterSubmit {
	        	margin: 10px;
		      	width: 5%;
			    padding: 5px;
			    margin: 0.5%;
			    font-size: 12px;

			  font-family: "Roboto", sans-serif;
			  text-transform: uppercase;
			  outline: 0;
			  background:#338BA8 ;
			  border: 0;
			  color: #FFFFFF;
			  -webkit-transition: all 0.3 ease;
			  transition: all 0.3 ease;
			  cursor: pointer;
	        }

	        #head {        
	        	margin:auto;
	        	width:100%;  
	        	white-space:nowrap;
    			overflow:hidden; 

	        }

	        #accounts{
	        	display:inline-block;
	        	width: 70%;
	        }

	        #filter{

	        	display:inline-block;
	        	width:100%;
	        	margin-left:-25%;
	        	
	        	
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
 
	</head>
	<body>

		<br>
		<h1>ADMIN PAGE</h1>
		<h2>ORDERS AND CUSTOMERS</h2>
		<div id="head">
			<div id="accounts">
				<button onclick="location.href='./adminaccounts.php'" id="account">View Worker Profiles</button></div>
			<div id="filter">

			<?php $filternow=0;
				if(!isset($_POST["filter"]) || isset($_POST["filter"])){
					if(!isset($_POST["filter"]) || $_POST["filter"] == "None"){
						$filternow=0;?>
					<form method="post" action="./admin.php">
								Filter by:
								<select name="filter" id="filterselect">
									<option value="None" selected>None</option>
									<option value="Sender_ID">Sender_ID</option>
									<option value="Sender_LastName">Sender_LastName</option>
									<option value="Sender_FirstName">Sender_FirstName</option>
									<option value="Sender_MiddleInitial">Sender_MiddleInitial</option>
									<option value="Sender_Address">Sender_Address</option>
									<option value="Sender_ContactNum">Sender_ContactNum</option>
									<option value="Sender_Email">Sender_Email</option>
									<option value="Username">Username</option>
									<option value="Recipient_ID">Recipient_ID</option>
									<option value="Recipient_LastName">Recipient_LastName</option>
									<option value="Recipient_FirstName">Recipient_FirstName</option>
									<option value="Recipient_MiddleInitial">Recipient_MiddleInitial</option>
									<option value="Recipient_Address">Recipient_Address</option>
									<option value="Recipient_ContactNum">Recipient_ContactNum</option>
									<option value="Recipient_Email">Recipient_Email</option>
									<option value="Package_ID">Package_ID</option>
									<option value="Package_Fragility">Package_Fragility</option>
									<option value="Package_size">Package_size</option>
									<option value="Package_Deal">Package_Deal</option>
									<option value="Additional_Instructions">Additional_Instructions</option>
									<?php if($_SESSION["entity"] === "SuperAdmin"){
										echo "<option value=\"Branch_Name\">Branch_Name</option>";
									} ?>
									<option value="Payment_Method">Payment_Method</option>
									<option value="Amount">Amount</option>
									<option value="Tracking_Number">Tracking_Number</option>
									<option value="Tracker_Date">Tracker_Date</option>
									<option value="ETA">ETA</option>
									<option value="Tracker_Status">Tracker_Status</option>
								</select>
							<?php if(isset($_POST['filtertxt']) && $_POST['filter'] == "None"){
								if(!empty($_POST['filtertxt'])){
									echo"<input type=\"text\" name=\"filtertxt\" id=\"filtertxt\" value='".$_POST['filtertxt']."'>";
								
									 echo"<input type=\"submit\" value=\"Search\" id=\"FilterSubmit\"><br>";
									 echo"Please choose an attribute from the dropdown list.";
								}
								else{
							 		echo"<input type=\"text\" name=\"filtertxt\" id=\"filtertxt\">";
							
								 	echo"<input type=\"submit\" value=\"Search\" id=\"FilterSubmit\"><br>";
							 }

							 }
							 else{
							 	echo"<input type=\"text\" name=\"filtertxt\" id=\"filtertxt\">";
							
								 echo"<input type=\"submit\" value=\"Search\" id=\"FilterSubmit\"><br>";
							 }
							
							?>					
					</form>
				</div>
			<?php
			}
			}
			if(isset($_POST["filter"])){
				if($_POST["filter"] !== "None"){
					
				echo"<form method=\"post\" action=\"./admin.php\">
							Filter by:
							<select name=\"filter\" id=\"filterselect\">
								<option value=\"None\">None</option>";
								echo"<option value=\"Sender_ID\"";
								if($_POST["filter"] == "Sender_ID"){
									echo " selected";
								}
								echo">Sender_ID</option>";
								echo"<option value=\"Sender_LastName\"";
								if($_POST["filter"] == "Sender_LastName"){
									echo " selected";
								}
								echo">Sender_LastName</option>";
								echo"<option value=\"Sender_FirstName\"";
								if($_POST["filter"] == "Sender_FirstName"){
									echo " selected";
								}
								echo">Sender_FirstName</option>";
								echo"<option value=\"Sender_MiddleInitial\"";
								if($_POST["filter"] == "Sender_MiddleInitial"){
									echo " selected";
								}
								echo">Sender_MiddleInitial</option>";
								echo"<option value=\"Sender_Address\"";
								if($_POST["filter"] == "Sender_Address"){
									echo " selected";
								}
								echo">Sender_Address</option>";
								echo"<option value=\"Sender_ContactNum\"";
								if($_POST["filter"] == "Sender_ContactNum"){
									echo " selected";
								}
								echo">Sender_ContactNum</option>";
								echo"<option value=\"Sender_Email\"";
								if($_POST["filter"] == "Sender_Email"){
									echo " selected";
								}

								echo">Sender_Email</option>";
								echo"<option value=\"Username\"";
								if($_POST["filter"] == "Username"){
									echo " selected";
								}

								echo">Username</option>";
								echo"<option value=\"Recipient_ID\"";
								if($_POST["filter"] == "Recipient_ID"){
									echo " selected";
								}

								echo">Recipient_ID</option>";
								echo"<option value=\"Recipient_LastName\"";
								if($_POST["filter"] == "Recipient_LastName"){
									echo " selected";
								}

								echo">Recipient_LastName</option>";
								echo"<option value=\"Recipient_FirstName\"";
								if($_POST["filter"] == "Recipient_FirstName"){
									echo " selected";
								}

								echo">Recipient_FirstName</option>";
								echo"<option value=\"Recipient_MiddleInitial\"";
								if($_POST["filter"] == "Recipient_MiddleInitial"){
									echo " selected";
								}

								echo">Recipient_MiddleInitial</option>";
								echo"<option value=\"Recipient_Address\"";
								if($_POST["filter"] == "Recipient_Address"){
									echo " selected";
								}

								echo">Recipient_Address</option>";
								echo"<option value=\"Recipient_ContactNum\"";
								if($_POST["filter"] == "Recipient_ContactNum"){
									echo " selected";
								}

								echo">Recipient_ContactNum</option>";
								echo"<option value=\"Recipient_Email\"";
								if($_POST["filter"] == "Recipient_Email"){
									echo " selected";
								}

								echo">Recipient_Email</option>";
								echo"<option value=\"Package_ID\"";
								if($_POST["filter"] == "Package_ID"){
									echo " selected";
								}

								echo">Package_ID</option>";
								echo"<option value=\"Package_Fragility\"";
								if($_POST["filter"] == "Package_Fragility"){
									echo " selected";
								}

								echo">Package_Fragility</option>";
								echo"<option value=\"Package_size\"";
								if($_POST["filter"] == "Package_size"){
									echo " selected";
								}

								echo">Package_size</option>";
								echo"<option value=\"Package_Deal\"";
								if($_POST["filter"] == "Package_Deal"){
									echo " selected";
								}

								echo">Package_Deal</option>";
								echo"<option value=\"Additional_Instructions\"";
								if($_POST["filter"] == "Additional_Instructions"){
									echo " selected";
								}

								echo">Additional_Instructions</option>";
								if($_SESSION["entity"] === "SuperAdmin"){
									echo "<option value=\"Branch_Name\"";
									if($_POST["filter"] == "Branch_Name"){
										echo " selected";
									}
									echo">Branch_Name</option>";
								}
								echo"<option value=\"Payment_Method\"";
								if($_POST["filter"] == "Payment_Method"){
									echo " selected";
								}
								echo">Payment_Method</option>";

								echo"<option value=\"Amount\"";
								if($_POST["filter"] == "Amount"){
									echo " selected";
								}
								echo">Amount</option>";

								echo"<option value=\"Tracking_Number\"";
								if($_POST["filter"] == "Tracking_Number"){
									echo " selected";
								}
								echo">Tracking_Number</option>";

								echo"<option value=\"Tracker_Date\"";
								if($_POST["filter"] == "Tracker_Date"){
									echo " selected";
								}
								echo">Tracker_Date</option>";

								echo"<option value=\"ETA\"";
								if($_POST["filter"] == "ETA"){
									echo " selected";
								}
								echo">ETA</option>";

								echo"<option value=\"Tracker_Status\"";
								if($_POST["filter"] == "Tracker_Status"){
									echo " selected";
								}
								echo">Tracker_Status</option>
							</select>";
							if(empty($_POST['filtertxt'])){
								echo"<input type=\"text\" name=\"filtertxt\" id=\"filtertxt\">";
						 		echo"<input type=\"submit\" value=\"Search\" id=\"FilterSubmit\"><br>";
						 		echo"Please write a proper input in the textbox.";
						 		$filternow=0;
							}else
							{
								echo"<input type=\"text\" name=\"filtertxt\" id=\"filtertxt\" value='".$_POST['filtertxt']."''>";
						 		echo"<input type=\"submit\" value=\"Search\" id=\"FilterSubmit\">";
							}
													
				echo"</form>
			</div>";
			}
			}
			?>

		</div>
		<?php
			

			if(isset($_POST['filter']) && isset($_POST['filtertxt'])){
				if($_POST['filter'] !== "None"){
					if(!empty($_POST['filtertxt'])){
						$filternow=1;

						if($_POST['filter'] == "Sender_ID" || $_POST['filter'] == "Sender_LastName" || $_POST['filter'] == "Sender_FirstName" || $_POST['filter'] == "Sender_MiddleInitial" || $_POST['filter'] == "Sender_Address" || $_POST['filter'] == "Sender_ContactNum" || $_POST['filter'] == "Sender_Email" || $_POST['filter'] == "Username"){
								$Sender_ID=array();

								require 'includes\dbh.inc.php';
								$sql = "SELECT Sender_ID FROM sender WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
									array_push($Sender_ID, $row["Sender_ID"]);
									}
								}
								else{
										array_push($Sender_ID, "0");
								}		
								$Package_ID=array();
								$Recipient_ID=array();

								mysqli_close($conn);

								
								foreach ($Sender_ID as $x){
									require 'includes\dbh.inc.php';
									$sql = "SELECT Package_ID, Recipient_ID FROM tracker WHERE Sender_ID='".$x."';";
									$result = $conn-> query($sql) or die($conn->error);

									if ($result-> num_rows >0) {
										while ($row = $result-> fetch_assoc()) {
											array_push($Package_ID, $row["Package_ID"]);
											array_push($Recipient_ID, $row["Recipient_ID"]);
										}		
									}
									else{
										array_push($Package_ID, "0");
										array_push($Recipient_ID, "0");
									
									}
									mysqli_close($conn);
								}
				

						}

						if($_POST['filter'] == "Recipient_ID" || $_POST['filter'] == "Recipient_LastName" || $_POST['filter'] == "Recipient_FirstName" || $_POST['filter'] == "Recipient_MiddleInitial" || $_POST['filter'] == "Recipient_Address" || $_POST['filter'] == "Recipient_ContactNum" ||$_POST['filter'] == "Recipient_Email" ){
							$Recipient_ID=array();

								require 'includes\dbh.inc.php';
								$sql = "SELECT Recipient_ID FROM recipient WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
									array_push($Recipient_ID, $row["Recipient_ID"]);
									}
								}
								else{
										array_push($Recipient_ID, "0");
								}		
								$Package_ID=array();
								$Sender_ID=array();

								mysqli_close($conn);

								
								foreach ($Recipient_ID as $x){
									require 'includes\dbh.inc.php';
									$sql = "SELECT Package_ID, Sender_ID FROM tracker WHERE Recipient_ID='".$x."';";
									$result = $conn-> query($sql) or die($conn->error);

									if ($result-> num_rows >0) {
										while ($row = $result-> fetch_assoc()) {
											array_push($Package_ID, $row["Package_ID"]);
											array_push($Sender_ID, $row["Sender_ID"]);
										}		
									}
									else{
										array_push($Package_ID, "0");
										array_push($Sender_ID, "0");
									
									}
									mysqli_close($conn);
								}
						}
						if($_POST['filter'] == "Package_ID" || $_POST['filter'] == "Package_Fragility" || $_POST['filter'] == "Package_size" || $_POST['filter'] == "Package_Deal" ||$_POST['filter'] == "Additional_Instructions" ||$_POST['filter'] == "Branch_Name" || $_POST['filter'] == "Payment_Method" || $_POST['filter'] == "Amount"){
							$Package_ID=array();

								require 'includes\dbh.inc.php';
								$sql = "SELECT Package_ID FROM package WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
									array_push($Package_ID, $row["Package_ID"]);
									}
								}
								else{
										array_push($Package_ID, "0");
								}		
								$Recipient_ID=array();
								$Sender_ID=array();

								mysqli_close($conn);

								
								foreach ($Package_ID as $x){
									require 'includes\dbh.inc.php';
									$sql = "SELECT Recipient_ID, Sender_ID FROM tracker WHERE Package_ID='".$x."';";
									$result = $conn-> query($sql) or die($conn->error);

									if ($result-> num_rows >0) {
										while ($row = $result-> fetch_assoc()) {
											array_push($Recipient_ID, $row["Recipient_ID"]);
											array_push($Sender_ID, $row["Sender_ID"]);
										}		
									}
									else{
										array_push($Recipient_ID, "0");
										array_push($Sender_ID, "0");
									
									}
									mysqli_close($conn);
								}
						}
						if($_POST['filter'] == "Tracking_Number" || $_POST['filter'] == "ETA" || $_POST['filter'] == "Tracker_Date" || $_POST['filter'] == "Tracker_Status"){
								$Package_ID=array();
								$Recipient_ID=array();
								$Sender_ID=array();

								require 'includes\dbh.inc.php';
								$sql = "SELECT Package_ID, Recipient_ID, Sender_ID FROM tracker WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										array_push($Package_ID, $row["Package_ID"]);
										array_push($Recipient_ID, $row["Recipient_ID"]);
										array_push($Sender_ID, $row["Sender_ID"]);
									}
								}
								else{
										array_push($Package_ID, "0");
										array_push($Recipient_ID, "0");
										array_push($Sender_ID, "0");
								}		
								

								mysqli_close($conn);

							
						}


					}

				}
			
		}


		?>
		


	<?php if ( ($_SESSION["entity"] === "SuperAdmin") ){ ?>
		<div id="Sender">
			<h3>Sender</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Sender_ID</th>
					<th>Sender_LastName</th>
					<th>Sender_FirstName</th>
					<th>Sender_MiddleInitial</th>
					<th>Sender_Address</th>
					<th>Sender_ContactNum</th>
					<th>Sender_Email</th>
					<th>Username</th>
					<th colspan=2></th>
					


				</tr>
				<?php

					
						
							require 'includes\dbh.inc.php';

							if($filternow ==1){
								$sql = "SELECT * from Sender where Sender_ID IN (".implode(',', $Sender_ID).")";
							}else{
								$sql = "SELECT * from Sender";
							}
							$result = $conn-> query($sql) or die($conn->error);

							if ($result-> num_rows >0) {
								while ($row = $result-> fetch_assoc()) {
									echo "<tr>
											<td>". $row["Sender_ID"]."</td>
											<td>". $row["Sender_LastName"]."</td>
											<td>". $row["Sender_FirstName"]."</td>
											<td>". $row["Sender_MiddleInitial"]."</td>
											<td>". $row["Sender_Address"]."</td>
											<td>". $row["Sender_ContactNum"]."</td>
											<td>". $row["Sender_Email"]."</td>
											<td>". $row["Username"]."</td>
											
											<td><button onclick=\"location.href='./editprofile.php?Sender_ID=".$row['Sender_ID']."'\">Edit</button></td>
											<td><button onclick=\"location.href='./deleteorder.php?Sender_ID=".$row['Sender_ID']."'\">Delete</button></td>
											</tr>";

								}
								echo "</table";
							}
							else {
								echo "<tr><td colspan=\"9\">There are 0 results.</td></tr>";
							}
							$conn -> close();
						
				?>
			</table>
		</div>

		

		<div id="Recipient">
			<h3>Recipient</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Recipient_ID</th>
					<th>Recipient_LastName</th>
					<th>Recipient_FirstName</th>
					<th>Recipient_MiddleInitial</th>
					<th>Recipient_Address</th>
					<th>Recipient_ContactNum</th>
					<th>Recipient_Email</th>
					<th colspan=2></th>
					


				</tr>
				<?php
					
						
							require 'includes\dbh.inc.php';
							if($filternow ==1){
								$sql = "SELECT * from Recipient where Recipient_ID IN (" . implode(',', $Recipient_ID) . ")";
							}else{
								$sql = "SELECT * from Recipient";
							}
							$result = $conn-> query($sql) or die($conn->error);

							if ($result-> num_rows >0) {
								while ($row = $result-> fetch_assoc()) {
									echo "<tr>
											<td>". $row["Recipient_ID"]."</td>
											<td>". $row["Recipient_LastName"]."</td>
											<td>". $row["Recipient_FirstName"]."</td>
											<td>". $row["Recipient_MiddleInitial"]."</td>
											<td>". $row["Recipient_Address"]."</td>
											<td>". $row["Recipient_ContactNum"]."</td>
											<td>". $row["Recipient_Email"]."</td>

											
											<td><button onclick=\"location.href='./editorder.php?Recipient_ID=".$row['Recipient_ID']."'\">Edit</button></td>
											<td><button onclick=\"location.href='./deleteorder.php?Recipient_ID=".$row['Recipient_ID']."'\">Delete</button></td>
											</tr>";

								}
								echo "</table>";
							}
							else {
								echo "<tr><td colspan=\"8\">There are 0 results.</td></tr>";
							}
							$conn -> close();
						

				?>
			</table>
		</div>

		<div id="Package">
			<h3>Packages</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Package_ID</th>
					<th>Package_Fragility</th>
					<th>Package_size</th>
					<th>Package_Deal</th>
					<th>Additional_Instructions</th>
					<th>Branch_Name</th>
					<th>Payment_Method</th>
					<th>Amount</th>
					<th colspan=2></th>
					
				</tr>
				<?php
					
						
							require 'includes\dbh.inc.php';
							if($filternow ==1){
								$sql = "SELECT * from Package where Package_ID IN (" . implode(',', $Package_ID) . ")";
							}else{
								$sql = "SELECT * from Package";
							}
							$result = $conn-> query($sql) or die($conn->error);

							if ($result-> num_rows >0) {
								while ($row = $result-> fetch_assoc()) {
									echo "<tr>
										<td>". $row["Package_ID"]."</td>
										<td>". $row["Package_Fragility"]."</td>
										<td>". $row["Package_size"]."</td>
										<td>". $row["Package_Deal"] ."</td>
										<td>". $row["Additional_Instructions"] ."</td>
										<td>". $row["Branch_Name"] ."</td>
										<td>". $row["Payment_Method"] ."</td>
										<td>". $row["Amount"] ."</td>

											
											<td><button onclick=\"location.href='./editorder.php?Package_ID=".$row['Package_ID']."'\">Edit</button></td>
											<td><button onclick=\"location.href='./deleteorder.php?Package_ID=".$row['Package_ID']."'\">Delete</button></td>
											</tr>";

								}
								echo "</table";
							}
							else {
								echo "<tr><td colspan=\"9\">There are 0 results.</td></tr>";
							}
							$conn -> close();
						
					
				?>
			</table>
		</div>


		<div id="Tracker">
			<h3>Tracker</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Package_ID</th>
					<th>Sender_ID</th>
					<th>Recipient_ID</th>
					<th>Rider_ID</th>
					<th>Tracking_Number</th>
					<th>ETA</th>
					<th>Tracker_Date</th>
					<th>Tracker_Status</th>
					<th colspan=2></th>
					
					

				</tr>
				<?php
					
					
							require 'includes\dbh.inc.php';
	 						if($filternow ==1){
								$sql = "SELECT * from tracker where Package_ID IN (" . implode(',', $Package_ID) . ")";
							}else{
								$sql = "SELECT * from tracker";
							}
							$result = $conn-> query($sql) or die($conn->error);

							if ($result-> num_rows >0) {
								while ($row = $result-> fetch_assoc()) {
									echo "<tr>
											<td>". $row["Package_ID"]."</td>
											<td>". $row["Sender_ID"]."</td>
											<td>". $row["Recipient_ID"]."</td>
											<td>". $row["Rider_ID"]."</td>
											<td>". $row["Tracking_Number"]."</td>
											<td>". $row["ETA"]."</td>
											<td>". $row["Tracker_Date"]."</td>
											<td>". $row["Tracker_Status"]."</td>

											
											<td><button onclick=\"location.href='./editorder.php?Package_ID=".$row['Package_ID']."'\">Edit</button></td>
											<td><button onclick=\"location.href='./deleteorder.php?Package_ID=".$row['Package_ID']."'\">Delete</button></td>
											</tr>";

								}
								echo "</table";
							}
							else {
								echo "<tr><td colspan=\"9\">There are 0 results.</td></tr>";
							}
							$conn -> close();
						
				?>
			</table>
		</div>

	

			
			<center>
				<button onclick="location.href='./myShippingAdmin.php'" id="add">Add new order</button>
			</center>
			
	<?php } 



	//-------------------------------------------------------------------------------------------------------------------------------------------------
	//Admin page (Manager)

	else{
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
		require 'includes\dbh.inc.php';

		$Package_IDa = array();
		$Sender_IDa = array();
		$Recipient_IDa = array();
	

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
		require 'includes\dbh.inc.php';
		

		foreach ($Package_IDa as $x){
			require 'includes\dbh.inc.php';
			$sql = "SELECT Sender_ID, Recipient_ID FROM tracker WHERE Package_ID='".$x."';";;
			$result = $conn-> query($sql) or die($conn->error);

			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
					array_push($Sender_IDa, $row["Sender_ID"]);
					array_push($Recipient_IDa, $row["Recipient_ID"]);
					
				}		
			}
			else{
				array_push($Sender_IDa, "0");
				array_push($Recipient_IDa, "0");
			}
			mysqli_close($conn);



		}
			$Sender_IDarr = array();
			$Recipient_IDarr = array();
			$Package_IDarr = array();

		if($filternow == 1){

			if($_POST['filter'] == "Sender_ID" || $_POST['filter'] == "Sender_LastName" || $_POST['filter'] == "Sender_FirstName" || $_POST['filter'] == "Sender_MiddleInitial" || $_POST['filter'] == "Sender_Address" || $_POST['filter'] == "Sender_ContactNum" || $_POST['filter'] == "Sender_Email" || $_POST['filter'] == "Username"){

				if(in_array("0", $Sender_ID)){
					array_push($Sender_IDarr, "0");
				}else{
					$Sender_IDarr = array_intersect($Sender_IDa, $Sender_ID);
					if(empty($Sender_IDarr)){
						array_push($Sender_IDarr, "0");
					}
				}
				if(in_array("0", $Recipient_ID)){
					array_push($Recipient_IDarr, "0");
				}else{
					$Recipient_IDarr = array_intersect($Recipient_IDa, $Recipient_ID);
					if(empty($Recipient_IDarr)){
						array_push($Recipient_IDarr, "0");
					}
				}
				if(in_array("0", $Package_ID)){
					array_push($Package_IDarr, "0");
				}else{
					$Package_IDarr = array_intersect($Package_IDa, $Package_ID);
					if(empty($Package_IDarr)){
						array_push($Package_IDarr, "0");
					}
				}

			}else{

				if(in_array("0", $Package_ID)){
					array_push($Package_IDarr, "0");
				}else{
					$Package_IDarr = array_intersect($Package_IDa, $Package_ID);
					if(empty($Package_IDarr)){
						array_push($Package_IDarr, "0");
					}
				}

				if(in_array("0", $Package_IDarr)){
					array_push($Sender_IDarr, "0");
					array_push($Recipient_IDarr, "0");
				}
				else{
					if(in_array("0", $Sender_ID)){
						array_push($Sender_IDarr, "0");
					}else{
						$Sender_IDarr = array_intersect($Sender_IDa, $Sender_ID);
						if(empty($Sender_IDarr)){
							array_push($Sender_IDarr, "0");
						}
					}
					if(in_array("0", $Recipient_ID)){
						array_push($Recipient_IDarr, "0");
					}else{
						$Recipient_IDarr = array_intersect($Recipient_IDa, $Recipient_ID);
						if(empty($Recipient_IDarr)){
							array_push($Recipient_IDarr, "0");
						}
					}
				}

			}
		
			
		}else{
			$Sender_IDarr = $Sender_IDa;
			$Recipient_IDarr = $Recipient_IDa;
			$Package_IDarr = $Package_IDa;
		}
		
		


	?>
		<div id="Sender">
			<h3>Sender</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Sender_ID</th>
					<th>Sender_LastName</th>
					<th>Sender_FirstName</th>
					<th>Sender_MiddleInitial</th>
					<th>Sender_Address</th>
					<th>Sender_ContactNum</th>
					<th>Sender_Email</th>
					<th>Username</th>
					<th colspan=2></th>
					


				</tr>
				<?php


					require 'includes\dbh.inc.php';
					
					$sql = "SELECT * from sender where Sender_ID IN (" . implode(',', $Sender_IDarr). ")";
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							echo "<tr>
									<td>". $row["Sender_ID"]."</td>
									<td>". $row["Sender_LastName"]."</td>
									<td>". $row["Sender_FirstName"]."</td>
									<td>". $row["Sender_MiddleInitial"]."</td>
									<td>". $row["Sender_Address"]."</td>
									<td>". $row["Sender_ContactNum"]."</td>
									<td>". $row["Sender_Email"]."</td>
									<td>". $row["Username"]."</td>
									
									<td><button onclick=\"location.href='./editprofile.php?Sender_ID=".$row['Sender_ID']."'\">Edit</button></td>
									<td><button onclick=\"location.href='./deleteorder.php?Sender_ID=".$row['Sender_ID']."'\">Delete</button></td>
									</tr>";

						}
						echo "</table";
					}
					else {
						echo "<tr><td colspan=\"9\">There are 0 results.</td></tr>";
					}
					$conn -> close();
				?>
			</table>
		</div>

		

		<div id="Recipient">
			<h3>Recipient</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Recipient_ID</th>
					<th>Recipient_LastName</th>
					<th>Recipient_FirstName</th>
					<th>Recipient_MiddleInitial</th>
					<th>Recipient_Address</th>
					<th>Recipient_ContactNum</th>
					<th>Recipient_Email</th>
					<th colspan=2></th>
					


				</tr>
				<?php


					require 'includes\dbh.inc.php';

					$sql = "SELECT * from Recipient where Recipient_ID IN (" . implode(',', $Recipient_IDarr) . ")";
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							echo "<tr>
									<td>". $row["Recipient_ID"]."</td>
									<td>". $row["Recipient_LastName"]."</td>
									<td>". $row["Recipient_FirstName"]."</td>
									<td>". $row["Recipient_MiddleInitial"]."</td>
									<td>". $row["Recipient_Address"]."</td>
									<td>". $row["Recipient_ContactNum"]."</td>
									<td>". $row["Recipient_Email"]."</td>

									
									<td><button onclick=\"location.href='./editorder.php?Recipient_ID=".$row['Recipient_ID']."'\">Edit</button></td>
									<td><button onclick=\"location.href='./deleteorder.php?Recipient_ID=".$row['Recipient_ID']."'\">Delete</button></td>
									</tr>";

						}
						echo "</table>";
					}
					else {
						echo "<tr><td colspan=\"8\">There are 0 results.</td></tr>";
					}
					$conn -> close();
				?>
			</table>
		</div>

		<div id="Package">
			<h3>Packages</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Package_ID</th>
					<th>Package_Fragility</th>
					<th>Package_size</th>
					<th>Package_Deal</th>
					<th>Additional_Instructions</th>
					<th>Branch_Name</th>
					<th>Payment_Method</th>
					<th>Amount</th>
					<th colspan=2></th>
					
				</tr>
				<?php


					require 'includes\dbh.inc.php';

					$sql = "SELECT * from Package where Package_ID IN (" . implode(',', $Package_IDarr) . ")";
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							echo "<tr>
								<td>". $row["Package_ID"]."</td>
								<td>". $row["Package_Fragility"]."</td>
								<td>". $row["Package_size"]."</td>
								<td>". $row["Package_Deal"] ."</td>
								<td>". $row["Additional_Instructions"] ."</td>
								<td>". $row["Branch_Name"] ."</td>
								<td>". $row["Payment_Method"] ."</td>
								<td>". $row["Amount"] ."</td>

									
									<td><button onclick=\"location.href='./editorder.php?Package_ID=".$row['Package_ID']."'\">Edit</button></td>
									<td><button onclick=\"location.href='./deleteorder.php?Package_ID=".$row['Package_ID']."'\">Delete</button></td>
									</tr>";

						}
						echo "</table";
					}
					else {
						echo "<tr><td colspan=\"9\">There are 0 results.</td></tr>";
					}
					$conn -> close();
				?>
			</table>
		</div>


		<div id="Tracker">
			<h3>Tracker</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Package_ID</th>
					<th>Sender_ID</th>
					<th>Recipient_ID</th>
					<th>Rider_ID</th>
					<th>Tracking_Number</th>
					<th>ETA</th>
					<th>Tracker_Date</th>
					<th>Tracker_Status</th>
					<th colspan=2></th>
					
					

				</tr>
				<?php


					require 'includes\dbh.inc.php';

					$sql = "SELECT * from tracker where Package_ID IN (" . implode(',', $Package_IDarr) . ");";
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							echo "<tr>
									<td>". $row["Package_ID"]."</td>
									<td>". $row["Sender_ID"]."</td>
									<td>". $row["Recipient_ID"]."</td>
									<td>". $row["Rider_ID"]."</td>
									<td>". $row["Tracking_Number"]."</td>
									<td>". $row["ETA"]."</td>
									<td>". $row["Tracker_Date"]."</td>
									<td>". $row["Tracker_Status"]."</td>

									
									<td><button onclick=\"location.href='./editorder.php?Package_ID=".$row['Package_ID']."'\">Edit</button></td>
									<td><button onclick=\"location.href='./deleteorder.php?Package_ID=".$row['Package_ID']."'\">Delete</button></td>
									</tr>";

						}
						echo "</table";
					}
					else {
						echo "<tr><td colspan=\"9\">There are 0 results.</td></tr>";
					}
					$conn -> close();
				?>
			</table>
		</div>


			
			<center>
				<button onclick="location.href='./myShippingAdmin.php'" id="add">Add new order</button>
			</center>



	</body>

	<?php 
		}
		}
		
		include_once 'footer.php';

	 ?>

</html>
