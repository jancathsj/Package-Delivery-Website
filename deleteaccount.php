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
				echo "<button class=\"signbutton\"onclick=\"location.href='homepage.php'\">Go back to homepage</button></center>";
			}

			
			else{

					if(isset($_GET["Staff_ID"])){
						$_SESSION['Staff_ID'] = $_GET["Staff_ID"];
					}
					elseif(isset($_GET["Rider_ID"])){
						$_SESSION['Rider_ID']= $_GET["Rider_ID"];
					}
					elseif(isset($_GET["Manager_ID"])){
						$_SESSION['Manager_ID'] = $_GET["Manager_ID"];
					}

					if(isset($_POST['confirm'])){
						if ($_POST['confirm'] === "No"){
							header("Location:./adminaccounts.php");
							exit;
						}
					}
					else{
					
				?>
					<center>

					<div id="confirmation">

					
						<form method="post" action="./deleteaccount.php">
							<h3>Are you sure you want to delete this account permanently?</h3>
							
							<label for="confirmyes" class="container">Yes
							<input type="radio" id="confirmyes" name="confirm" value="Yes"><span class="checkmark"></span>
							</label>
							<label for="confirmno" class="container">No
							<input type="radio" id="confirmno" name="confirm" value="No"><span class="checkmark"></span>
							</label><br><br>
							<input type="submit" value="Submit" id="mySubmit">
						
								
						</form>

					</div>
					</center>
				<?php
					}
					if(isset($_POST['confirm'])){
						if($_POST['confirm'] === "Yes"){
							if(isset($_SESSION["Staff_ID"])){
								require 'includes\dbh.inc.php';
								$sql = "SELECT Username FROM staff WHERE Staff_ID='".$_SESSION["Staff_ID"]."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
									$Username= $row["Username"];
									}		
								}

								mysqli_close($conn);

								
								require 'includes\dbh.inc.php';

								$sql = "delete from staff where Staff_ID='".$_SESSION["Staff_ID"]."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);

								require 'includes\dbh.inc.php';

								$sql = "delete from account where Username='".$Username."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);

								header("Location: ./adminaccounts.php");
								unset($_SESSION["Staff_ID"]);
								
								exit;


							}
							elseif(isset($_SESSION["Rider_ID"])){

								require 'includes\dbh.inc.php';
								$sql = "SELECT Username FROM rider WHERE Rider_ID='".$_SESSION["Rider_ID"]."';";
								$result = $conn-> query($sql) or die($conn->error);

								if ($result-> num_rows >0) {
									while ($row = $result-> fetch_assoc()) {
										$Username= $row["Username"];
									}		
								}

								mysqli_close($conn);

								
								require 'includes\dbh.inc.php';

								$sql = "delete from rider where Rider_ID='".$_SESSION["Rider_ID"]."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);

								require 'includes\dbh.inc.php';

								$sql = "delete from account where Username='".$Username."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);

								unset($_SESSION["Rider_ID"]);
								header("Location: ./adminaccounts.php");
								exit;
								
							}
							elseif(isset($_SESSION["Manager_ID"])){

								require 'includes\dbh.inc.php';
										$sql = "SELECT Username FROM manager WHERE Manager_ID='".$_SESSION["Manager_ID"]."';";
										$result = $conn-> query($sql) or die($conn->error);

										if ($result-> num_rows >0) {
											while ($row = $result-> fetch_assoc()) {
												$Username= $row["Username"];
											}		
										}

								mysqli_close($conn);

								

								require 'includes\dbh.inc.php';

								$sql = "delete from manager where Manager_ID='".$_SESSION["Manager_ID"]."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);

								require 'includes\dbh.inc.php';

								$sql = "delete from account where Username='".$Username."'";

								mysqli_query($conn, $sql);
								mysqli_close($conn);

									
								if($_SESSION['username'] == $Username){
									header("Location: ./includes/logout.inc.php");
								}else{
									header("Location: ./adminaccounts.php");
								}
										
								unset($_SESSION["Manager_ID"]);
								
								exit;
								
							}


						}
					}


				}
			?>
	</body>
</html>
