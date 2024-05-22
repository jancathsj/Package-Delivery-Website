
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
		      	width: 26%;
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
				echo "<button class=\"signbutton\"onclick=\"location.href='index.php'\">Go back to homepage</button></center>";
			}
			else{
	    ?>
 
	</head>
	<body>

		<br>
		<h1>ADMIN PAGE</h1>
		<h2>WORKERS</h2>
		<div id="head">
			<div id="accounts">
				<button onclick="location.href='./admin.php'" id="account">View Orders and Customers</button>
			</div>
			<div id="filter">

			<?php $filternow=0;
				if(!isset($_POST["filter"]) || isset($_POST["filter"])){
					if(!isset($_POST["filter"]) || $_POST["filter"] == "None"){
						$filternow=0;?>
					<form method="post" action="./adminaccounts.php">
								Filter by:
								<select name="filter" id="filterselect">
									<option value="None" selected>None</option>
									<option value="Username">Username</option>
									<?php if($_SESSION["entity"] === "SuperAdmin"){
										echo "<option value=\"Branch_Name\">Branch_Name</option>";
									} ?>
									<option value="Staff_ID">Staff_ID</option>
									<option value="Staff_LastName">Staff_LastName</option>
									<option value="Staff_FirstName">Staff_FirstName</option>
									<option value="Staff_MiddleInitial">Staff_MiddleInitial</option>
									<option value="Staff_Address">Staff_Address</option>
									<option value="Staff_ContactNum">Staff_ContactNum</option>
									<option value="Staff_Email">Staff_Email</option>
									<option value="Rider_ID">Rider_ID</option>
									<option value="Rider_LastName">Rider_LastName</option>
									<option value="Rider_FirstName">Rider_FirstName</option>
									<option value="Rider_MiddleInitial">Rider_MiddleInitial</option>
									<option value="Recipient_Address">Rider_Address</option>
									<option value="Recipient_ContactNum">Rider_ContactNum</option>
									<option value="Recipient_Email">Rider_Email</option>
									<option value="Manager_ID">Rider_ID</option>
									<option value="Manager_LastName">Rider_LastName</option>
									<option value="Manager_FirstName">Rider_FirstName</option>
									<option value="Manager_MiddleInitial">Rider_MiddleInitial</option>
									<option value="Manager_Address">Rider_Address</option>
									<option value="Manager_ContactNum">Rider_ContactNum</option>
									<option value="Manager_Email">Rider_Email</option>
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
					
				echo"<form method=\"post\" action=\"./adminaccounts.php\">
							Filter by:
							<select name=\"filter\" id=\"filterselect\">
								<option value=\"None\">None</option>";
								
									echo"<option value=\"Username\"";
									if($_POST["filter"] == "Username"){
										echo " selected";
									}
									echo">Username</option>";
									if($_SESSION["entity"] === "SuperAdmin"){
										echo "<option value=\"Branch_Name\"";
										echo">Branch_Name</option>";
									}
									echo"<option value=\"Staff_ID\"";
									if($_POST["filter"] == "Staff_ID"){
										echo " selected";
									}
									echo">Staff_ID</option>";
									echo"<option value=\"Staff_LastName\"";
									if($_POST["filter"] == "Staff_LastName"){
										echo " selected";
									}
									echo">Staff_LastName</option>";
									echo"<option value=\"Staff_FirstName\"";
									if($_POST["filter"] == "Staff_FirstName"){
										echo " selected";
									}
									echo">Staff_FirstName</option>";
									echo"<option value=\"Staff_MiddleInitial\"";
									if($_POST["filter"] == "Staff_MiddleInitial"){
										echo " selected";
									}
									echo">Staff_MiddleInitial</option>";
									echo"<option value=\"Staff_Address\"";
									if($_POST["filter"] == "Staff_Address"){
										echo " selected";
									}
									echo">Staff_Address</option>";
									echo"<option value=\"Staff_ContactNum\"";
									if($_POST["filter"] == "Staff_ContactNum"){
										echo " selected";
									}
									echo">Staff_ContactNum</option>";
									echo"<option value=\"Staff_Email\"";
									if($_POST["filter"] == "Staff_Email"){
										echo " selected";
									}
									echo">Staff_Email</option>";
									echo"<option value=\"Rider_ID\"";
									if($_POST["filter"] == "Rider_ID"){
										echo " selected";
									}
									echo">Rider_ID</option>";
									echo"<option value=\"Rider_LastName\"";
									if($_POST["filter"] == "Rider_LastName"){
										echo " selected";
									}
									echo">Rider_LastName</option>";
									echo"<option value=\"Rider_FirstName\"";
									if($_POST["filter"] == "Rider_FirstName"){
										echo " selected";
									}
									echo">Rider_FirstName</option>";
									echo"<option value=\"Rider_MiddleInitial\"";
									if($_POST["filter"] == "Rider_MiddleInitial"){
										echo " selected";
									}
									echo">Rider_MiddleInitial</option>";
									echo"<option value=\"Rider_Address\"";
									if($_POST["filter"] == "Rider_Address"){
										echo " selected";
									}
									echo">Rider_Address</option>";
									echo"<option value=\"Rider_ContactNum\"";
									if($_POST["filter"] == "Rider_ContactNum"){
										echo " selected";
									}
									echo">Rider_ContactNum</option>";
									echo"<option value=\"Rider_Email\"";
									if($_POST["filter"] == "Rider_Email"){
										echo " selected";
									}
									echo">Rider_Email</option>";
									echo"<option value=\"Manager_ID\"";
									if($_POST["filter"] == "Manager_ID"){
										echo " selected";
									}
									echo">Rider_ID</option>";
									echo"<option value=\"Manager_LastName\"";
									if($_POST["filter"] == "Manager_LastName"){
										echo " selected";
									}
									echo">Rider_LastName</option>";
									echo"<option value=\"Manager_FirstName\"";
									if($_POST["filter"] == "Manager_FirstName"){
										echo " selected";
									}
									echo">Rider_FirstName</option>";
									echo"<option value=\"Manager_MiddleInitial\"";
									if($_POST["filter"] == "Manager_MiddleInitial"){
										echo " selected";
									}
									echo">Rider_MiddleInitial</option>";
									echo"<option value=\"Manager_Address\"";
									if($_POST["filter"] == "Manager_Address"){
										echo " selected";
									}
									echo">Manager_Address</option>";
									echo"<option value=\"Manager_ContactNum\"";
									if($_POST["filter"] == "Manager_ContactNum"){
										echo " selected";
									}
									echo">Manager_ContactNum</option>";
									echo"<option value=\"Manager_Email\"";
									if($_POST["filter"] == "Manager_Email"){
										echo " selected";
									}
									echo">Manager_Email</option>

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
						$Staff_ID=array();

						if($_POST['filter'] == "Username" || $_POST['filter'] == "Branch_Name"){
							$Staff_ID=array();
							$Rider_ID=array();
							$Manager_ID=array();

							require 'includes\dbh.inc.php';
								$sql = "SELECT Staff_ID FROM staff WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										array_push($Staff_ID, $row["Staff_ID"]);
									}
								}
								else{
										array_push($Staff_ID, "0");
								}		

							mysqli_close($conn);


							require 'includes\dbh.inc.php';
								$sql = "SELECT Rider_ID FROM rider WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										array_push($Rider_ID, $row["Rider_ID"]);
									}
								}
								else{
										array_push($Rider_ID, "0");
								}		

							mysqli_close($conn);


							require 'includes\dbh.inc.php';
								$sql = "SELECT Manager_ID FROM manager WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										array_push($Manager_ID, $row["Manager_ID"]);
									}
								}
								else{
										array_push($Manager_ID, "0");
								}		

							mysqli_close($conn);

						}

						if($_POST['filter'] == "Staff_ID" || $_POST['filter'] == "Staff_FirstName" || $_POST['filter'] == "Staff_LastName" || $_POST['filter'] == "Staff_MiddleInitial" || $_POST['filter'] == "Staff_Address" || $_POST['filter'] == "Staff_ContactNum" || $_POST['filter'] == "Staff_Email"){
								$Staff_ID=array();
								$Rider_ID=array();
								$Manager_ID=array();

								require 'includes\dbh.inc.php';
								$sql = "SELECT Staff_ID FROM staff WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
									array_push($Staff_ID, $row["Staff_ID"]);
									}
								}
								else{
										array_push($Staff_ID, "0");
								}		

								mysqli_close($conn);

								array_push($Rider_ID, "0");
								array_push($Manager_ID, "0");
				

						}

						if($_POST['filter'] == "Rider_ID" || $_POST['filter'] == "Rider_FirstName" || $_POST['filter'] == "Rider_LastName" || $_POST['filter'] == "Rider_MiddleInitial" || $_POST['filter'] == "Rider_Address" || $_POST['filter'] == "Rider_ContactNum" || $_POST['filter'] == "Rider_Email"){
								$Staff_ID=array();
								$Rider_ID=array();
								$Manager_ID=array();

								require 'includes\dbh.inc.php';
								$sql = "SELECT Rider_ID FROM rider WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
									array_push($Rider_ID, $row["Rider_ID"]);
									}
								}
								else{
										array_push($Rider_ID, "0");
								}		

								mysqli_close($conn);

								array_push($Staff_ID, "0");
								array_push($Manager_ID, "0");
				

						}

						if($_POST['filter'] == "Manager_ID" || $_POST['filter'] == "Manager_FirstName" || $_POST['filter'] == "Manager_LastName" || $_POST['filter'] == "Manager_MiddleInitial" || $_POST['filter'] == "Manager_Address" || $_POST['filter'] == "Manager_ContactNum" || $_POST['filter'] == "Manager_Email"){
								$Staff_ID=array();
								$Rider_ID=array();
								$Manager_ID=array();

								require 'includes\dbh.inc.php';
								$sql = "SELECT Manager_ID FROM manager WHERE ".$_POST['filter']."='".$_POST['filtertxt']."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
									array_push($Manager_ID, $row["Manager_ID"]);
									}
								}
								else{
										array_push($Manager_ID, "0");
								}		

								mysqli_close($conn);

								array_push($Staff_ID, "0");
								array_push($Rider_ID, "0");
				
						}



					}

				}
			
		}


		?>

	<?php if ( ($_SESSION["entity"] === "SuperAdmin") ){ ?>
		<div id="Staff">
			<h3>Staff</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Staff_ID</th>
					<th>Staff_LastName</th>
					<th>Staff_FirstName</th>
					<th>Staff_MiddleInitial</th>
					<th>Staff_Address</th>
					<th>Staff_ContactNum</th>
					<th>Staff_Email</th>
					<th>Branch_Name</th>
					<th>Username</th>
					<th></th>


				</tr>
				<?php


						require 'includes\dbh.inc.php';
						if($filternow ==1){
							$sql = "SELECT * from staff where Staff_ID IN (".implode(',', $Staff_ID).")";
						}
						else{
							$sql = "SELECT * from staff";
						}
						$result = $conn-> query($sql) or die($conn->error);

						if ($result-> num_rows >0) {
							while ($row = $result-> fetch_assoc()) {
								echo "<tr>
										<td>". $row["Staff_ID"]."</td>
										<td>". $row["Staff_LastName"]."</td>
										<td>". $row["Staff_FirstName"]."</td>
										<td>". $row["Staff_MiddleInitial"]."</td>
										<td>". $row["Staff_Address"]."</td>
										<td>". $row["Staff_ContactNum"]."</td>
										<td>". $row["Staff_Email"]."</td>
										<td>". $row["Branch_Name"]."</td>
										<td>". $row["Username"]."</td>

										
										
										<td><button onclick=\"location.href='./deleteaccount.php?Staff_ID=".$row['Staff_ID']."'\">Delete</button></td>
										</tr>";

							}
							echo "</table>";
						}
						else {
							echo "<tr><td colspan=\"10\">There are 0 results.</td></tr>";
						}
						$conn -> close();
					
				?>
			</table>
		</div>

		<div id="Rider">
			<h3>Rider</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Rider_ID</th>
					<th>Rider_LastName</th>
					<th>Rider_FirstName</th>
					<th>Rider_MiddleInitial</th>
					<th>Rider_Address</th>
					<th>Rider_ContactNum</th>
					<th>Rider_Email</th>
					<th>Branch_Name</th>
					<th>Username</th>
					<th></th>


				</tr>
				<?php

						require 'includes\dbh.inc.php';
						if($filternow ==1){
							$sql = "SELECT * from rider where Rider_ID IN (" . implode(',', $Rider_ID) . ")";
						}
						else{
							$sql = "SELECT * from rider";
						}
						$result = $conn-> query($sql) or die($conn->error);

						if ($result-> num_rows >0) {
							while ($row = $result-> fetch_assoc()) {
								echo "<tr>
										<td>". $row["Rider_ID"]."</td>
										<td>". $row["Rider_LastName"]."</td>
										<td>". $row["Rider_FirstName"]."</td>
										<td>". $row["Rider_MiddleInitial"]."</td>
										<td>". $row["Rider_Address"]."</td>
										<td>". $row["Rider_ContactNum"]."</td>
										<td>". $row["Rider_Email"]."</td>
										<td>". $row["Branch_Name"]."</td>
										<td>". $row["Username"]."</td>

										
										
										<td><button onclick=\"location.href='./deleteaccount.php?Rider_ID=".$row['Rider_ID']."'\">Delete</button></td>
										</tr>";

							}
							echo "</table>";
						}
						else {
							echo "<tr><td colspan=\"10\">There are 0 results.</td></tr>";
						}
						$conn -> close();
					
				?>
			</table>
		</div>

		<div id="Manager">
			<h3>Manager</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Manager_ID</th>
					<th>Manager_LastName</th>
					<th>Manager_FirstName</th>
					<th>Manager_MiddleInitial</th>
					<th>Manager_Address</th>
					<th>Manager_ContactNum</th>
					<th>Manager_Email</th>
					<th>Branch_Name</th>
					<th>Username</th>
					<th></th>


				</tr>
				<?php


					require 'includes\dbh.inc.php';
					if($filternow ==1){
						$sql = "SELECT * from manager where Manager_ID IN (" . implode(',', $Manager_ID) . ")";
					}
					else{
						$sql = "SELECT * from manager";
					}
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							echo "<tr>
									<td>". $row["Manager_ID"]."</td>
									<td>". $row["Manager_LastName"]."</td>
									<td>". $row["Manager_FirstName"]."</td>
									<td>". $row["Manager_MiddleInitial"]."</td>
									<td>". $row["Manager_Address"]."</td>
									<td>". $row["Manager_ContactNum"]."</td>
									<td>". $row["Manager_Email"]."</td>
									<td>". $row["Branch_Name"]."</td>
									<td>". $row["Username"]."</td>

									
									
									<td><button onclick=\"location.href='./deleteaccount.php?Manager_ID=".$row['Manager_ID']."'\">Delete</button></td>
									</tr>";

						}
						echo "</table>";
					}
					else {
						echo "<tr><td colspan=\"10\">There are 0 results.</td></tr>";
					}
					$conn -> close();
				?>
			</table>
		</div>


			
			<center>
				<button onclick="location.href='./signUpRider.php'" id="add">Add new worker</button>
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

		$Staff_IDa = array();
		$Rider_IDa = array();
		$Manager_IDa = array();

		require 'includes\dbh.inc.php';
		$sql = "SELECT Staff_ID FROM staff WHERE Branch_Name='".$Branch_Name."';";
		$result = $conn-> query($sql) or die($conn->error);

		if ($result-> num_rows >0) {
			while ($row = $result-> fetch_assoc()) {
				array_push($Staff_IDa, $row["Staff_ID"]);
			}		
		}
		else{
			array_push($Staff_IDa, "0");
		}
		mysqli_close($conn);

		require 'includes\dbh.inc.php';
		$sql = "SELECT Rider_ID FROM rider WHERE Branch_Name='".$Branch_Name."';";
		$result = $conn-> query($sql) or die($conn->error);

		if ($result-> num_rows >0) {
			while ($row = $result-> fetch_assoc()) {
				array_push($Rider_IDa, $row["Rider_ID"]);
			}		
		}
		else{
			array_push($Rider_IDa, "0");
		}
		mysqli_close($conn);

		require 'includes\dbh.inc.php';
		$sql = "SELECT Manager_ID FROM manager WHERE Branch_Name='".$Branch_Name."';";
		$result = $conn-> query($sql) or die($conn->error);

		if ($result-> num_rows >0) {
			while ($row = $result-> fetch_assoc()) {
				array_push($Manager_IDa, $row["Manager_ID"]);
			}		
		}
		else{
			array_push($Manager_IDa, "0");
		}
		mysqli_close($conn);

		$Staff_IDarr = array();
		$Rider_IDarr = array();
		$Manager_IDarr = array();

		if($filternow == 1){
			
				if(in_array("0", $Staff_ID)){
					array_push($Staff_IDarr, "0");
				}else{
					$Staff_IDarr = array_intersect($Staff_IDa, $Staff_ID);
					if(empty($Staff_IDarr)){
						array_push($Staff_IDarr, "0");
					}
				}

				if(in_array("0", $Rider_ID)){
					array_push($Rider_IDarr, "0");
				}else{
					$Rider_IDarr = array_intersect($Rider_IDa, $Rider_ID);
					if(empty($Rider_IDarr)){
						array_push($Rider_IDarr, "0");
					}
				}
				if(in_array("0", $Manager_ID)){
					array_push($Manager_IDarr, "0");
				}else{
					$Manager_IDarr = array_intersect($Manager_IDa, $Manager_ID);
					if(empty($Manager_IDarr)){
						array_push($Manager_IDarr, "0");
					}
				}
		
				
			
			
			
		}else{
			$Staff_IDarr = $Staff_IDa;
			$Rider_IDarr = $Rider_IDa;
			$Manager_IDarr = $Manager_IDa;
		}



	?>		<div id="Staff">
			<h3>Staff</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Staff_ID</th>
					<th>Staff_LastName</th>
					<th>Staff_FirstName</th>
					<th>Staff_MiddleInitial</th>
					<th>Staff_Address</th>
					<th>Staff_ContactNum</th>
					<th>Staff_Email</th>
					<th>Branch_Name</th>
					<th>Username</th>
					<th></th>


				</tr>
				<?php


					require 'includes\dbh.inc.php';

					$sql = "SELECT * from staff where Staff_ID IN (" . implode(',', $Staff_IDarr). ")";
					
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							echo "<tr>
									<td>". $row["Staff_ID"]."</td>
									<td>". $row["Staff_LastName"]."</td>
									<td>". $row["Staff_FirstName"]."</td>
									<td>". $row["Staff_MiddleInitial"]."</td>
									<td>". $row["Staff_Address"]."</td>
									<td>". $row["Staff_ContactNum"]."</td>
									<td>". $row["Staff_Email"]."</td>
									<td>". $row["Branch_Name"]."</td>
									<td>". $row["Username"]."</td>

									
									
									<td><button onclick=\"location.href='./deleteaccount.php?Staff_ID=".$row['Staff_ID']."'\">Delete</button></td>
									</tr>";

						}
						echo "</table>";
					}
					else {
						echo "<tr><td colspan=\"10\">There are 0 results.</td></tr>";
					}
					$conn -> close();
				?>
			</table>
		</div>

		<div id="Rider">
			<h3>Rider</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Rider_ID</th>
					<th>Rider_LastName</th>
					<th>Rider_FirstName</th>
					<th>Rider_MiddleInitial</th>
					<th>Rider_Address</th>
					<th>Rider_ContactNum</th>
					<th>Rider_Email</th>
					<th>Branch_Name</th>
					<th>Username</th>
					<th></th>


				</tr>
				<?php


					require 'includes\dbh.inc.php';

					$sql = "SELECT * from rider where Rider_ID IN (" . implode(',', $Rider_IDarr). ")";
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							echo "<tr>
									<td>". $row["Rider_ID"]."</td>
									<td>". $row["Rider_LastName"]."</td>
									<td>". $row["Rider_FirstName"]."</td>
									<td>". $row["Rider_MiddleInitial"]."</td>
									<td>". $row["Rider_Address"]."</td>
									<td>". $row["Rider_ContactNum"]."</td>
									<td>". $row["Rider_Email"]."</td>
									<td>". $row["Branch_Name"]."</td>
									<td>". $row["Username"]."</td>

									
									
									<td><button onclick=\"location.href='./deleteaccount.php?Rider_ID=".$row['Rider_ID']."'\">Delete</button></td>
									</tr>";

						}
						echo "</table>";
					}
					else {
						echo "<tr><td colspan=\"10\">There are 0 results.</td></tr>";
					}
					$conn -> close();
				?>
			</table>
		</div>

		<div id="Manager">
			<h3>Manager</h3>
			<table id="orderstable" class="orderstable">
				<tr>
					<th>Manager_ID</th>
					<th>Manager_LastName</th>
					<th>Manager_FirstName</th>
					<th>Manager_MiddleInitial</th>
					<th>Manager_Address</th>
					<th>Manager_ContactNum</th>
					<th>Manager_Email</th>
					<th>Branch_Name</th>
					<th>Username</th>
					<th></th>


				</tr>
				<?php


					require 'includes\dbh.inc.php';

					$sql = "SELECT * from manager where Manager_ID IN (" . implode(',', $Manager_IDarr). ")";
					$result = $conn-> query($sql) or die($conn->error);

					if ($result-> num_rows >0) {
						while ($row = $result-> fetch_assoc()) {
							echo "<tr>
									<td>". $row["Manager_ID"]."</td>
									<td>". $row["Manager_LastName"]."</td>
									<td>". $row["Manager_FirstName"]."</td>
									<td>". $row["Manager_MiddleInitial"]."</td>
									<td>". $row["Manager_Address"]."</td>
									<td>". $row["Manager_ContactNum"]."</td>
									<td>". $row["Manager_Email"]."</td>
									<td>". $row["Branch_Name"]."</td>
									<td>". $row["Username"]."</td>

									
									
									<td><button onclick=\"location.href='./deleteaccount.php?Manager_ID=".$row['Manager_ID']."'\">Delete</button></td>
									</tr>";

						}
						echo "</table>";
					}
					else {
						echo "<tr><td colspan=\"10\">There are 0 results.</td></tr>";
					}
					$conn -> close();
				?>
			</table>
		</div>


			
			<center>
				<button onclick="location.href='./signUpRider.php'" id="add">Add new worker</button>
			</center>

	</body>

	<?php 
		}
		}
		include_once 'footer.php';

	 ?>

</html>
