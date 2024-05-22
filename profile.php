<?php 
	include 'header.php';
	

	
 ?>
 <!DOCTYPE html>
 <html>
 <head>

	<link rel="stylesheet" type="text/css" href="css/profile.css" />
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Profile Page</title>
 </head>
 <body>
 	<h1>My Profile</h1>
 	Manage and protect your account
 	<br>
 	<hr style="width:50%;text-align:left;margin-left:0;">
 	<br>
 	<br>
 	        
 	<?php

 		require 'includes\dbh.inc.php';

 		if ( (isset($_SESSION["useruid"])) && ($_SESSION["entity"] === "sender")) {

	 		$sql = "SELECT * from Sender where Username ='".$_SESSION['username']."'";
	 		$result = $conn-> query($sql) or die($conn->error);
	 		//$result = mysqli_query($conn, $sql);

	 		if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
					echo "<b>Username:</b>". "   ". $row["Username"]."<br><br>";
					echo "<b>Name:</b>". "   ". $row["Sender_LastName"].", ".$row["Sender_FirstName"]." ".$row["Sender_MiddleInitial"]."."."<br><br>";
					echo "<b>Contact Number:</b>". "   ". $row["Sender_ContactNum"]."<br><br>";
					echo "<b>Email:</b>". "   ". $row["Sender_Email"]."<br><br>";
					echo "<b>Address:</b>". "   ". $row["Sender_Address"]."<br><br>";
					echo "<button onclick=\"location.href='./editprofile.php?Sender_ID=".$row['Sender_ID']."'\">Edit</button>";

				}
			}
			else {
				echo "0 result";
			}
			$conn -> close();
		}
		elseif (isset($_SESSION["useruid"]) && ($_SESSION["entity"] === "manager")) {

			$sql = "SELECT * from manager where Username ='".$_SESSION['username']."'";
	 		$result = $conn-> query($sql) or die($conn->error);
	 		//$result = mysqli_query($conn, $sql);

	 		if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
					echo "<b>Username:</b>". "   ". $row["Username"]."<br><br>";
					echo "<b>Name:</b>". "   ". $row["Manager_LastName"].", ".$row["Manager_FirstName"]." ".$row["Manager_MiddleInitial"]."."."<br><br>";
					echo "<b>Contact Number:</b>". "   ". $row["Manager_ContactNum"]."<br><br>";
					echo "<b>Email:</b>". "   ". $row["Manager_Email"]."<br><br>";
					echo "<b>Address:</b>". "   ". $row["Manager_Address"]."<br><br>";
					echo "<button onclick=\"location.href='./editprofile.php?Manager_ID=".$row['Manager_ID']."'\">Edit</button>";

				}
			}
			else {
				echo "0 result";
			}
			$conn -> close();
		}
		elseif (isset($_SESSION["useruid"]) && ($_SESSION["entity"] === "rider")) {
			$sql = "SELECT * from Rider where Username ='".$_SESSION['username']."'";
	 		$result = $conn-> query($sql) or die($conn->error);
	 		//$result = mysqli_query($conn, $sql);

	 		if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
					echo "<b>Username:</b>". "   ". $row["Username"]."<br><br>";
					echo "<b>Name:</b>". "   ". $row["Rider_LastName"].", ".$row["Rider_FirstName"]." ".$row["Rider_MiddleInitial"]."."."<br><br>";
					echo "<b>Contact Number:</b>". "   ". $row["Rider_ContactNum"]."<br><br>";
					echo "<b>Email:</b>". "   ". $row["Rider_Email"]."<br><br>";
					echo "<b>Address:</b>". "   ". $row["Rider_Address"]."<br><br>";
					echo "<button onclick=\"location.href='./editprofile.php?Rider_ID=".$row['Rider_ID']."'\">Edit</button>";

				}
			}
			else {
				echo "0 result";
			}
			$conn -> close();
		}
		elseif (isset($_SESSION["useruid"]) && ($_SESSION["entity"] === "staff")) {
			$sql = "SELECT * from Staff where Username ='".$_SESSION['username']."'";
	 		$result = $conn-> query($sql) or die($conn->error);
	 		//$result = mysqli_query($conn, $sql);

	 		if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
					echo "<b>Username:</b>". "   ". $row["Username"]."<br><br>";
					echo "<b>Name:</b>". "   ". $row["Staff_LastName"].", ".$row["Staff_FirstName"]." ".$row["Staff_MiddleInitial"]."."."<br><br>";
					echo "<b>Contact Number:</b>". "   ". $row["Staff_ContactNum"]."<br><br>";
					echo "<b>Email:</b>". "   ". $row["Staff_Email"]."<br><br>";
					echo "<b>Address:</b>". "   ". $row["Staff_Address"]."<br><br>";
					echo "<button onclick=\"location.href='./editprofile.php?Staff_ID=".$row['Staff_ID']."'\">Edit</button>";

				}
			}

			else {
				echo "0 result";
			}

			$conn -> close();
		}
		elseif (isset($_SESSION["useruid"]) && ($_SESSION["entity"] === "SuperAdmin")) {

			$sql = "SELECT * from manager where Username ='".$_SESSION['username']."'";
	 		$result = $conn-> query($sql) or die($conn->error);
	 		//$result = mysqli_query($conn, $sql);

	 		if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
					echo "<b>Username:</b>". "   ". $row["Username"]."<br><br>";
					echo "<b>Name:</b>". "   ". $row["Manager_LastName"].", ".$row["Manager_FirstName"]." ".$row["Manager_MiddleInitial"]."."."<br><br>";
					echo "<b>Contact Number:</b>". "   ". $row["Manager_ContactNum"]."<br><br>";
					echo "<b>Email:</b>". "   ". $row["Manager_Email"]."<br><br>";
					echo "<b>Address:</b>". "   ". $row["Manager_Address"]."<br><br>";
					echo "<button onclick=\"location.href='./editprofile.php?Manager_ID=".$row['Manager_ID']."'\">Edit</button>";

				}
			}
			else {
				echo "0 result";
			}
			$conn -> close();
		}

			
		
 	?>
 	<br>
 	<br>
 	<h1>Order History</h1>
 	Tracker your orders here
 	<br>
 	<hr style="width:50%;text-align:left;margin-left:0;">

 
	 	<table id="orderstable" class="orderstable">
			<tr>
				<th>Tracking Number</th>
				<th>Recipient</th>
				<th>Address</th>
				<th>Deal-ivery</th>
				<th>Date of Order</th>
				<th>Order Total</th>
				<th>Order Status</th>
			</tr>
		 	<?php

		 		require 'includes\dbh.inc.php';

		 		$sql = "SELECT * from Tracker Where Sender_ID=(SELECT Sender_ID from Sender where Username='".$_SESSION['username']."')";

		 		//$sql1 = "SELECT Recipient_LastName, Recipient_FirstName, Recipient_MiddleInitial, Recipient_Address from recipient where Recipient_ID IN (SELECT Recipient_ID from receives Where Package_ID IN (SELECT Package_ID from sends Where Sender_ID IN (SELECT Sender_ID from Sender where Username='".$_SESSION['username']."')))";

		 		// $sql2 = "SELECT Package_Deal, Amount from package where Package_ID IN (SELECT Package_ID from sends where Sender_ID IN (SELECT Sender_ID from sender where Username='".$_SESSION['username']."'))";


		 		$result = $conn-> query($sql) or die($conn->error);
		 		// $result1 = $conn-> query($sql1) or die($conn->error);
		 		// $result2 = $conn-> query($sql2) or die($conn->error);

		 		if ($result-> num_rows >0) {
					while ($row = $result-> fetch_assoc()) {
						echo "<tr>
							<td>". $row["Tracking_Number"]."</td>";

							$sql1 = "SELECT Recipient_LastName, Recipient_FirstName, Recipient_MiddleInitial, Recipient_Address from recipient where Recipient_ID = (SELECT Recipient_ID from tracker Where Tracking_Number ='".$row['Tracking_Number']."')";
								$result1 = $conn-> query($sql1) or die($conn->error);
								$row1 = $result1-> fetch_assoc();

						echo "	<td>". $row1['Recipient_LastName']. ", " . $row1['Recipient_FirstName'] ." " . $row1['Recipient_MiddleInitial'] . ".</td>
							<td>". $row1["Recipient_Address"]."</td>";

						$sql2 = "SELECT Package_Deal, Amount from package where Package_ID = (SELECT Package_ID from tracker where Tracking_Number ='".$row['Tracking_Number']."')";
						$result2 = $conn-> query($sql2) or die($conn->error);
						$row2 = $result2-> fetch_assoc();

						echo "	<td>". $row2["Package_Deal"]."</td>
							<td>". $row["Tracker_Date"]."</td>
							<td> ₱". $row2["Amount"]."</td>
							<td>". $row["Tracker_Status"]."</td>

							</tr>";

					}
					echo "</table>";
				}
				else {
					echo "0 result";
				}

				$conn -> close();

		 	?>
	 	</table>
	 	

 </body>
 </html>