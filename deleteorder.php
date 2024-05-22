<html>
	<head>
<?php
				
				include_once 'header.php'; 
				require 'includes\dbh.inc.php';
				ob_start();
?>
			<style>
				body {
					  background: #D9E4EC; /* fallback for old browsers */
					  background: -webkit-linear-gradient(right, #D9E4EC, #B7CFDC);
					  background: -moz-linear-gradient(right, #D9E4EC, #B7CFDC);
					  background: -o-linear-gradient(right, #D9E4EC, #B7CFDC);
					  background: linear-gradient(to left, #D9E4EC, #B7CFDC);
					  font-family: "Roboto", sans-serif;
					  -webkit-font-smoothing: antialiased;
					  -moz-osx-font-smoothing: grayscale;     
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
			        color:white;
			      }
			      #confirmation {
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
					#mySubmit, button {
						font-family: "Roboto", sans-serif;
						  text-transform: uppercase;
						  outline: 0;
						  background:#338BA8 ;
						  width: 30%;
						  border: 0;
						  padding: 15px;
						  color: #FFFFFF;
						  font-size: 14px;
						  -webkit-transition: all 0.3 ease;
						  transition: all 0.3 ease;
						  cursor: pointer;
			        }

			        #mySubmit:hover{
					  width: 30%;
					  font-weight: bold; 
					  background: #43A6C6;
					  color: white;
					}

					.container {
					  display: block;
					  position: relative;
					  padding-left: 35px;
					  margin-bottom: 12px;
					  margin-left:39%;
					  cursor: pointer;
					  font-size: 22px;
					  -webkit-user-select: none;
					  -moz-user-select: none;
					  -ms-user-select: none;
					  user-select: none;
					  text-align:left;

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
				</style>
		</head>
	<body>	
		<?php
			ob_start();

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

					if(isset($_GET["Package_ID"])){
						$_SESSION['Package_ID'] = $_GET["Package_ID"];
					}
					elseif(isset($_GET["Recipient_ID"])){
						$_SESSION['Recipient_ID']= $_GET["Recipient_ID"];
					}
					elseif(isset($_GET["Tracking_Number"])){
						$_SESSION['Tracking_Number']= $_GET["Tracking_Number"];
					}
					elseif(isset($_GET["Sender_ID"])){
						$_SESSION['Sender_ID'] = $_GET["Sender_ID"];
					}

					if(isset($_POST['confirm'])){
						if ($_POST['confirm'] === "No"){
							header("Location:./admin.php");
							exit;
						}
					}
					else{
					
				?>
					<center>

					<div id="confirmation">

					
						<form method="post" action="./deleteorder.php">
							<h3>Are you sure you want to delete this permanently?</h3>
							
							<label for="confirmyes" class="container">Yes
							<input type="radio" id="confirmyes" name="confirm" value="Yes"><span class="checkmark"></span>
							</label>
							<label for="confirmno" class="container">No
							<input type="radio" id="confirmno" name="confirm" value="No" checked><span class="checkmark"></span>
							</label><br><br>
							<input type="submit" value="Submit" id="mySubmit">
						
								
						</form>

					</div>
					</center>
				<?php
					}

				if(isset($_POST['confirm'])){
					if($_POST['confirm'] === "Yes"){
						if(isset($_SESSION["Package_ID"])){

							
							$Package_ID = $_SESSION["Package_ID"];

							$sql = "SELECT Sender_ID FROM sends WHERE Package_ID='".$Package_ID."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										$Sender_ID = $row["Sender_ID"];
									}		
								}

						
							mysqli_close($conn);
							require 'includes\dbh.inc.php';

							$sql = "SELECT Recipient_ID FROM receives WHERE Package_ID='".$Package_ID."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										$Recipient_ID = $row["Recipient_ID"];
									}		
								}

						
							mysqli_close($conn);
							require 'includes\dbh.inc.php';

							$sql = "SELECT Tracking_Number FROM tracks WHERE Package_ID='".$Package_ID."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										$Tracking_Number = $row["Tracking_Number"];
									}		
								}

						
							mysqli_close($conn);
							require 'includes\dbh.inc.php';

							$sql = "delete from tracks where Package_ID='".$Package_ID."'";

							mysqli_query($conn, $sql);
							mysqli_close($conn);
							require 'includes\dbh.inc.php';


							$sql = "delete from sends where Package_ID='".$Package_ID."'";

							mysqli_query($conn, $sql);
							mysqli_close($conn);
							require 'includes\dbh.inc.php';

							$sql = "delete from receives where Package_ID='".$Package_ID."'";

							mysqli_query($conn, $sql);
							mysqli_close($conn);

							require 'includes\dbh.inc.php';

							$sql = "delete from Recipient where Recipient_ID='".$Recipient_ID."'";

							mysqli_query($conn, $sql);
							mysqli_close($conn);
							require 'includes\dbh.inc.php';

							$sql = "delete from tracker where Tracking_Number='".$Tracking_Number."'";

							mysqli_query($conn, $sql);
							mysqli_close($conn);
							require 'includes\dbh.inc.php';

							$sql = "delete from Package where Package_ID='".$Package_ID."'";

							mysqli_query($conn, $sql);
							mysqli_close($conn);
							
									

						}


						elseif(isset($_SESSION["Sender_ID"])){

							$Sender_ID = $_SESSION["Sender_ID"];

							$sql = "SELECT Package_ID FROM sends WHERE Sender_ID='".$_SESSION["Sender_ID"]."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										$Package_ID = $row["Package_ID"];
									}		
								}

						
							mysqli_close($conn);
							
							
						}

						elseif(isset($_SESSION["Recipient_ID"])){

							$sql = "SELECT Package_ID FROM receives WHERE Recipient_ID='".$_SESSION["Recipient_ID"]."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										$Package_ID = $row["Package_ID"];
									}		
								}
							mysqli_close($conn);
						}

						else if(isset($_SESSION["Tracking_Number"])){

							$sql = "SELECT Package_ID FROM tracks WHERE Tracking_Number='".$_SESSION["Tracking_Number"]."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										$Package_ID = $row["Package_ID"];
									}		
								}
								mysqli_close($conn);
						}
						if(isset($Package_ID)){
							if(isset($_SESSION["Sender_ID"]) || isset($_SESSION["Recipient_ID"]) || isset($_SESSION["Tracking_Number"])){
								require 'includes\dbh.inc.php';

								$sql = "SELECT Sender_ID FROM sends WHERE Package_ID='".$Package_ID."';";
								$result = $conn-> query($sql) or die($conn->error);

									if ($result-> num_rows >0) {
										while ($row = $result-> fetch_assoc()) {
											$Sender_ID = $row["Sender_ID"];
										}		
									}
									

							
								mysqli_close($conn);
								require 'includes\dbh.inc.php';

								$sql = "SELECT Recipient_ID FROM receives WHERE Package_ID='".$Package_ID."';";
									$result = $conn-> query($sql) or die($conn->error);

									if ($result-> num_rows >0) {
										while ($row = $result-> fetch_assoc()) {
											$Recipient_ID = $row["Recipient_ID"];
										}		
									}

							
								mysqli_close($conn);
								require 'includes\dbh.inc.php';

								$sql = "SELECT Tracking_Number FROM tracks WHERE Package_ID='".$Package_ID."';";
									$result = $conn-> query($sql) or die($conn->error);

									if ($result-> num_rows >0) {
										while ($row = $result-> fetch_assoc()) {
											$Tracking_Number = $row["Tracking_Number"];
										}		
									}

							
								mysqli_close($conn);
								require 'includes\dbh.inc.php';

								$sql = "delete from tracks where Package_ID='".$Package_ID."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);
								require 'includes\dbh.inc.php';


								$sql = "delete from sends where Package_ID='".$Package_ID."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);
								require 'includes\dbh.inc.php';

								$sql = "delete from receives where Package_ID='".$Package_ID."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);
								require 'includes\dbh.inc.php';

								$sql = "delete from Recipient where Recipient_ID='".$Recipient_ID."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);
								require 'includes\dbh.inc.php';

								$sql = "delete from tracker where Tracking_Number='".$Tracking_Number."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);
								require 'includes\dbh.inc.php';

								$sql = "delete from Package where Package_ID='".$Package_ID."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);

								if(isset($_SESSION["Sender_ID"])){
									require 'includes\dbh.inc.php';

									$sql = "SELECT Username FROM sender WHERE Sender_ID='".$_SESSION["Sender_ID"]."';";
									$result = $conn-> query($sql) or die($conn->error);

									if ($result-> num_rows >0) {
										while ($row = $result-> fetch_assoc()) {
											$Username= $row["Username"];
										}		
									}

									mysqli_close($conn);


									require 'includes\dbh.inc.php';

									$sql = "delete from Sender where Sender_ID='".$Sender_ID."'";

									mysqli_query($conn, $sql);
									mysqli_close($conn);

									require 'includes\dbh.inc.php';

									$sql = "delete from account where Username='".$Username."'";

									mysqli_query($conn, $sql);
									mysqli_close($conn);


								}
								
							}
						}
						else if($_POST['confirm'] == "Yes"){
										require 'includes\dbh.inc.php';

										$sql = "SELECT Username FROM sender WHERE Sender_ID='".$_SESSION["Sender_ID"]."';";
										$result = $conn-> query($sql) or die($conn->error);

										if ($result-> num_rows >0) {
											while ($row = $result-> fetch_assoc()) {
												$Username= $row["Username"];
											}		
										}

										mysqli_close($conn);
										require 'includes\dbh.inc.php';

										$sql = "delete from Sender where Sender_ID='".$Sender_ID."'";

										mysqli_query($conn, $sql);
										mysqli_close($conn);

										require 'includes\dbh.inc.php';

										$sql = "delete from account where Username='".$Username."'";

										mysqli_query($conn, $sql);
										mysqli_close($conn);



						}

						if($_POST['confirm'] == "Yes"){
							if(isset($_SESSION["Package_ID"])){
								unset($_SESSION["Package_ID"]);
							}
							if(isset($_SESSION["Recipient_ID"])){
								unset($_SESSION["Recipient_ID"]);
							}
							if(isset($_SESSION["Tracking_Number"])){
								unset($_SESSION["Tracking_Number"]);
							}
							if(isset($_SESSION["Sender_ID"])){
								unset($_SESSION["Sender_ID"]);
							}
							
							
							header("Location: ./admin.php");
							exit;
						}
					}
				}
			}
		?>
	

	</body>
</html>