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
 		
 	</style>


 	<link rel="stylesheet" type="text/css" href="css/profile.css" />
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Edit Profile</title>
 </head>
 <body>
 	<?php
 	$counter=0;
		// Redirects back to main if GET and POST variables are not set
		if(!isset($_POST['Sender_ID']) && !isset($_GET['Sender_ID']) && !isset($_POST['Manager_ID']) && !isset($_GET['Manager_ID']) && !isset($_POST['Rider_ID']) && !isset($_GET['Rider_ID']) && !isset($_POST['Staff_ID']) && !isset($_GET['Staff_ID'])) {
			header("Location: ./profile.php");
			exit;
		}

		if(isset($_POST["Sender_FirstName"])){
			$check = 1;
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "";
			$db = "phase3";
			$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error); 

			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Sender_LastName"])){
					$check = 0;
			}
			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Sender_FirstName"])){
				$check = 0;
			}
			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Sender_MiddleInitial"])){
				$check = 0;
			}

			if($check == 0) echo "One or more of your inputs are wrong";
			else{

				$sql = "SELECT * from Sender";
				$result = $conn-> query($sql) or die($conn->error);
				
				$query = "update Sender
				set Sender_LastName = '".$_POST["Sender_LastName"]."',Sender_FirstName = '".$_POST["Sender_FirstName"]."', Sender_MiddleInitial = '".$_POST["Sender_MiddleInitial"]."', Sender_Address = '".$_POST["Sender_Address"]."', Sender_ContactNum = '".$_POST["Sender_ContactNum"]."', Sender_Email = '".$_POST["Sender_Email"]."' where Sender_ID = ".$_POST['Sender_ID'];

				mysqli_query($conn, $query);
				$check = 1;
				mysqli_close($conn);
				header("Location: ./profile.php");
				exit;
			}
			mysqli_close($conn);
			$counter=1;
		}
		elseif(isset($_POST["Manager_FirstName"])){
			$check = 1;
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "";
			$db = "phase3";
			$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error); 

			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Manager_LastName"])){
					$check = 0;
			}
			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Manager_FirstName"])){
				$check = 0;
			}
			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Manager_MiddleInitial"])){
				$check = 0;
			}

			if($check == 0) echo "One or more of your inputs are wrong";
			else{

				$sql = "SELECT * from Manager";
				$result = $conn-> query($sql) or die($conn->error);
				
				$query = "update Manager
				set Manager_LastName = '".$_POST["Manager_LastName"]."',Manager_FirstName = '".$_POST["Manager_FirstName"]."', Manager_MiddleInitial = '".$_POST["Manager_MiddleInitial"]."', Manager_Address = '".$_POST["Manager_Address"]."', Manager_ContactNum = '".$_POST["Manager_ContactNum"]."', Manager_Email = '".$_POST["Manager_Email"]."' where Manager_ID = ".$_POST['Manager_ID'];

				mysqli_query($conn, $query);
				$check = 1;
				mysqli_close($conn);
				header("Location: ./profile.php");
				exit;
			}
			mysqli_close($conn);
			$counter=1;
		}
		elseif(isset($_POST["Rider_FirstName"])){
			$check = 1;
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "";
			$db = "phase3";
			$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error); 

			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Rider_LastName"])){
					$check = 0;
			}
			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Rider_FirstName"])){
				$check = 0;
			}
			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Rider_MiddleInitial"])){
				$check = 0;
			}

			if($check == 0) echo "One or more of your inputs are wrong";
			else{

				$sql = "SELECT * from Rider";
				$result = $conn-> query($sql) or die($conn->error);
				
				$query = "update Rider
				set Rider_LastName = '".$_POST["Rider_LastName"]."',Rider_FirstName = '".$_POST["Rider_FirstName"]."', Rider_MiddleInitial = '".$_POST["Rider_MiddleInitial"]."', Rider_Address = '".$_POST["Rider_Address"]."', Rider_ContactNum = '".$_POST["Rider_ContactNum"]."', Rider_Email = '".$_POST["Rider_Email"]."' where Rider_ID = ".$_POST['Rider_ID'];

				mysqli_query($conn, $query);
				$check = 1;
				mysqli_close($conn);
				header("Location: ./profile.php");
				exit;
			}
			mysqli_close($conn);
			$counter=1;
		}
		elseif(isset($_POST["Staff_FirstName"])){
			$check = 1;
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "";
			$db = "phase3";
			$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error); 

			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Staff_LastName"])){
					$check = 0;
			}
			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Staff_FirstName"])){
				$check = 0;
			}
			if(!preg_match("/^[a-zA-Z ]+$/",$_POST["Staff_MiddleInitial"])){
				$check = 0;
			}

			if($check == 0) echo "One or more of your inputs are wrong";
			else{

				$sql = "SELECT * from Staff";
				$result = $conn-> query($sql) or die($conn->error);
				
				$query = "update Staff
				set Staff_LastName = '".$_POST["Staff_LastName"]."',Staff_FirstName = '".$_POST["Staff_FirstName"]."', Staff_MiddleInitial = '".$_POST["Staff_MiddleInitial"]."', Staff_Address = '".$_POST["Staff_Address"]."', Staff_ContactNum = '".$_POST["Staff_ContactNum"]."', Staff_Email = '".$_POST["Staff_Email"]."' where Staff_ID = ".$_POST['Staff_ID'];

				mysqli_query($conn, $query);
				$check = 1;
				mysqli_close($conn);
				header("Location: ./profile.php");
				exit;
			}
			mysqli_close($conn);
			$counter=1;
		}


	?>
	 	
	 	<br>
	 	
	 	<br>
	 	<br>

	 	<?php 
	 		echo "<form action='./editprofile.php' method='post' id='myForm'>";
	 		echo "<h1>Edit Profile</h1>";
	 		echo "<hr style='width:100%;text-align:center;margin-left:0'>";
	 		if ($counter == 0) {
	 			if(isset($_GET['Sender_ID'])){
					$id = $_GET['Sender_ID'];


				echo "<input type='hidden' name='Sender_ID' value='".$id."'>";

				require 'includes\dbh.inc.php';	
					//get info
		 		$query = "select * from Sender where Sender_ID = '".$id."'";
		 		$result = mysqli_query($conn,$query);
				$orig = mysqli_fetch_assoc($result);


				//set info

				echo "Last Name: <input type='text' name='Sender_LastName' value='".$orig['Sender_LastName']."'><br>";
				echo "First Name: <input type='text' name='Sender_FirstName' value='".$orig['Sender_FirstName']."'><br>";
				echo "Middle Initial (exclude the period): <input type='text' name='Sender_MiddleInitial' value='".$orig['Sender_MiddleInitial']."'><br>";
				echo "Contact Number: <input type='text' name='Sender_ContactNum' value='".$orig['Sender_ContactNum']."'><br>";
				echo "Email: <input type='text' name='Sender_Email' value='".$orig['Sender_Email']."'><br>";
				echo "Address: <input type='text' name='Sender_Address' value='".$orig['Sender_Address']."'><br>";
				mysqli_close($conn);

				echo "<input type='submit' value='Confirm' id='mySubmit' onclick=\"location.href='./profile.php'\">";
				//echo "<button type='button' onclick=\"location.href='./profile.php'\">Confirm Changes</button>";

				echo"</form>";	
				}
				else if(isset($_GET['Manager_ID'])){
					$id = $_GET['Manager_ID'];

				echo "<input type='hidden' name='Manager_ID' value='".$id."'>";

				require 'includes\dbh.inc.php';

					//get info
		 		$query = "select * from Manager where Manager_ID = '".$id."'";
		 		$result = mysqli_query($conn,$query);
				$orig = mysqli_fetch_assoc($result);


				//set info

				echo "Last Name: <input type='text' name='Manager_LastName' value='".$orig['Manager_LastName']."'><br>";
				echo "First Name: <input type='text' name='Manager_FirstName' value='".$orig['Manager_FirstName']."'><br>";
				echo "Middle Initial (exclude the period): <input type='text' name='Manager_MiddleInitial' value='".$orig['Manager_MiddleInitial']."'><br>";
				echo "Contact Number: <input type='text' name='Manager_ContactNum' value='".$orig['Manager_ContactNum']."'><br>";
				echo "Email: <input type='text' name='Manager_Email' value='".$orig['Manager_Email']."'><br>";
				echo "Address: <input type='text' name='Manager_Address' value='".$orig['Manager_Address']."'><br>";
				mysqli_close($conn);

				echo "<input type='submit' value='Confirm' id='mySubmit' onclick=\"location.href='./profile.php'\">";
				//echo "<button type='button' onclick=\"location.href='./profile.php'\">Confirm Changes</button>";

				echo"</form>";	
				}
				else if(isset($_GET['Rider_ID'])){
					$id = $_GET['Rider_ID'];

				echo "<input type='hidden' name='Rider_ID' value='".$id."'>";

				require 'includes\dbh.inc.php';
					//get info
		 		$query = "select * from Rider where Rider_ID = '".$id."'";
		 		$result = mysqli_query($conn,$query);
				$orig = mysqli_fetch_assoc($result);


				//set info

				echo "Last Name: <input type='text' name='Rider_LastName' value='".$orig['Rider_LastName']."'><br>";
				echo "First Name: <input type='text' name='Rider_FirstName' value='".$orig['Rider_FirstName']."'><br>";
				echo "Middle Initial (exclude the period): <input type='text' name='Rider_MiddleInitial' value='".$orig['Rider_MiddleInitial']."'><br>";
				echo "Contact Number: <input type='text' name='Rider_ContactNum' value='".$orig['Rider_ContactNum']."'><br>";
				echo "Email: <input type='text' name='Rider_Email' value='".$orig['Rider_Email']."'><br>";
				echo "Address: <input type='text' name='Rider_Address' value='".$orig['Rider_Address']."'><br>";
				mysqli_close($conn);

				echo "<input type='submit' value='Confirm' id='mySubmit' onclick=\"location.href='./profile.php'\">";
				//echo "<button type='button' onclick=\"location.href='./profile.php'\">Confirm Changes</button>";

				echo"</form>";	
				}
				else if(isset($_GET['Staff_ID'])){
					$id = $_GET['Staff_ID'];


				echo "<input type='hidden' name='Staff_ID' value='".$id."'>";

				require 'includes\dbh.inc.php';
					//get info
		 		$query = "select * from Staff where Staff_ID = '".$id."'";
		 		$result = mysqli_query($conn,$query);
				$orig = mysqli_fetch_assoc($result);


				//set info

				echo "Last Name: <input type='text' name='Staff_LastName' value='".$orig['Staff_LastName']."'><br>";
				echo "First Name: <input type='text' name='Staff_FirstName' value='".$orig['Staff_FirstName']."'><br>";
				echo "Middle Initial (exclude the period): <input type='text' name='Staff_MiddleInitial' value='".$orig['Staff_MiddleInitial']."'><br>";
				echo "Contact Number: <input type='text' name='Staff_ContactNum' value='".$orig['Staff_ContactNum']."'><br>";
				echo "Email: <input type='text' name='Staff_Email' value='".$orig['Staff_Email']."'><br>";
				echo "Address: <input type='text' name='Staff_Address' value='".$orig['Staff_Address']."'><br>";
				mysqli_close($conn);

				echo "<input type='submit' value='Confirm' id='mySubmit' onclick=\"location.href='./profile.php'\">";
				//echo "<button type='button' onclick=\"location.href='./profile.php'\">Confirm Changes</button>";

				echo"</form>";	
				}

				


		 		
	 		}
	 		else{
	 			if(isset($_POST['Sender_ID'])){
					$id = $_POST['Sender_ID'];

					echo "<input type='hidden' name='Sender_ID' value='".$id."'>";


				require 'includes\dbh.inc.php';
				$query = "select * from Sender where Sender_ID='".$id."'";
				$result = mysqli_query($conn, $query);


				echo "Last Name: <input type='text' name='Sender_LastName' value='".$_POST['Sender_LastName']."'><br>";
				echo "First Name: <input type='text' name='Sender_FirstName' value='".$_POST['Sender_FirstName']."'><br>";
				echo "Middle Initial (exclude the period): <input type='text' name='Sender_MiddleInitial' value='".$_POST['Sender_MiddleInitial']."'><br>";
				echo "Contact Number: <input type='text' name='Sender_ContactNum' value='".$_POST['Sender_ContactNum']."'><br>";
				echo "Email: <input type='text' name='Sender_Email' value='".$_POST['Sender_Email']."'><br>";
				echo "Address: <input type='text' name='Sender_Address' value='".$_POST['Sender_Address']."'><br>";

				echo "<input type='submit' value='Confirm' id='mySubmit' onclick=\"location.href='./profile.php'\">";

				echo "</form>";
				}
				else if(isset($_POST['Manager_ID'])){
					$id = $_POST['Manager_ID'];

					echo "<input type='hidden' name='Manager_ID' value='".$id."'>";


				require 'includes\dbh.inc.php';
				$query = "select * from Manager where Manager_ID='".$id."'";
				$result = mysqli_query($conn, $query);


				echo "Last Name: <input type='text' name='Manager_LastName' value='".$_POST['Manager_LastName']."'><br>";
				echo "First Name: <input type='text' name='Manager_FirstName' value='".$_POST['Manager_FirstName']."'><br>";
				echo "Middle Initial (exclude the period): <input type='text' name='Manager_MiddleInitial' value='".$_POST['Manager_MiddleInitial']."'><br>";
				echo "Contact Number: <input type='text' name='Manager_ContactNum' value='".$_POST['Manager_ContactNum']."'><br>";
				echo "Email: <input type='text' name='Manager_Email' value='".$_POST['Manager_Email']."'><br>";
				echo "Address: <input type='text' name='Manager_Address' value='".$_POST['Manager_Address']."'><br>";

				echo "<input type='submit' value='Confirm' id='mySubmit' onclick=\"location.href='./profile.php'\">";

				echo "</form>";
				}
				else if(isset($_POST['Rider_ID'])){
					$id = $_POST['Rider_ID'];

					echo "<input type='hidden' name='Rider_ID' value='".$id."'>";


				require 'includes\dbh.inc.php';
				$query = "select * from Rider where Rider_ID='".$id."'";
				$result = mysqli_query($conn, $query);


				echo "Last Name: <input type='text' name='Rider_LastName' value='".$_POST['Rider_LastName']."'><br>";
				echo "First Name: <input type='text' name='Rider_FirstName' value='".$_POST['Rider_FirstName']."'><br>";
				echo "Middle Initial (exclude the period): <input type='text' name='Rider_MiddleInitial' value='".$_POST['Rider_MiddleInitial']."'><br>";
				echo "Contact Number: <input type='text' name='Rider_ContactNum' value='".$_POST['Rider_ContactNum']."'><br>";
				echo "Email: <input type='text' name='Rider_Email' value='".$_POST['Rider_Email']."'><br>";
				echo "Address: <input type='text' name='Rider_Address' value='".$_POST['Rider_Address']."'><br>";

				echo "<input type='submit' value='Confirm' id='mySubmit' onclick=\"location.href='./profile.php'\">";

				echo "</form>";
				}
				else if(isset($_POST['Staff_ID'])){
					$id = $_POST['Staff_ID'];

					echo "<input type='hidden' name='Staff_ID' value='".$id."'>";


				require 'includes\dbh.inc.php';
				$query = "select * from Staff where Staff_ID='".$id."'";
				$result = mysqli_query($conn, $query);


				echo "Last Name: <input type='text' name='Staff_LastName' value='".$_POST['Staff_LastName']."'><br>";
				echo "First Name: <input type='text' name='Staff_FirstName' value='".$_POST['Staff_FirstName']."'><br>";
				echo "Middle Initial (exclude the period): <input type='text' name='Staff_MiddleInitial' value='".$_POST['Staff_MiddleInitial']."'><br>";
				echo "Contact Number: <input type='text' name='Staff_ContactNum' value='".$_POST['Staff_ContactNum']."'><br>";
				echo "Email: <input type='text' name='Staff_Email' value='".$_POST['Staff_Email']."'><br>";
				echo "Address: <input type='text' name='Staff_Address' value='".$_POST['Staff_Address']."'><br>";

				echo "<input type='submit' value='Confirm' id='mySubmit' onclick=\"location.href='./profile.php'\">";

				echo "</form>";
				}


					
	 		}


	 	?>

 </body>
 </html>