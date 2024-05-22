<!DOCTYPE html>
<html>
<head>
	<?php 

	include_once 'header.php';
	
	
 	?>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	<?php
		// Sources: Youtube: Code and Coins
		//          Youtube: vivekmoyal
		error_reporting(E_ALL);
		ini_set('display_errors', 1);


			if(isset($_POST["Recipient_FirstName"])){
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
				

				require 'includes\dbh.inc.php';

				if( empty($_POST["Recipient_FirstName"]) || empty($_POST["Recipient_LastName"]) || empty($_POST["Recipient_MiddleInitial"]) || empty($_POST["Recipient_Address"]) || empty($_POST["Recipient_ContactNum"]) || empty($_POST["Recipient_Address"]) || empty($_POST["Recipient_Email"]) ||  empty($_POST["Package_Fragility"]) || empty($_POST["Package_size"]) || empty($_POST["Package_Deal"]) || empty($_POST["Payment_Method"]) || empty($_POST["Branch_Name"])){

			
					if($_SESSION["entity"] === "manager"){
						header("location: myShippingAdmin.php?error=emptyinput");
					}
					elseif($_SESSION["entity"] === "SuperAdmin"){
						header("location: myShippingAdmin.php?error=emptyinput");
					}
					else{
						header("location: myShipping.php?error=emptyinput");
					}
					
					exit();	
					

				}else{

					

					if(!preg_match("/^[a-zA-Z. ]+$/",$_POST["Recipient_LastName"])){
						if($_SESSION["entity"] === "manager" ){
							header("location: myShippingAdmin.php?error=invalidlastname");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location: myShippingAdmin.php?error=invalidlastname");
						}
						else{
							header("location: myShipping.php?error=invalidlastname");
						}

						exit();	
					}
					if(!preg_match("/^[a-zA-Z. ]+$/",$_POST["Recipient_FirstName"])){
						if($_SESSION["entity"] === "manager" ){
							header("location: myShippingAdmin.php?error=invalidfirstname");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location: myShippingAdmin.php?error=invalidfirstname");
						}
						else{
							header("location: myShipping.php?error=invalidfirstname");
						}

						exit();	

					}
					if(!preg_match("/^[a-zA-Z. ]+$/",$_POST["Recipient_MiddleInitial"])){
						if($_SESSION["entity"] === "manager" ){
							header("location: myShippingAdmin.php?error=invalidmiddle");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location: myShippingAdmin.php?error=invalidmiddle");
						}
						else{
							header("location: myShipping.php?error=invalidmiddle");
						}

						exit();	
						
					}
					if(!preg_match("/^[0-9 ()-]+$/",$_POST["Recipient_ContactNum"])){
						if($_SESSION["entity"] === "manager" ){
							header("location: myShippingAdmin.php?error=invalidnumber");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location: myShippingAdmin.php?error=invalidnumber");
						}
						else{
							header("location: myShipping.php?error=invalidnumber");
						}

						exit();	
					}
					if (!filter_var($_POST['Recipient_Email'], FILTER_VALIDATE_EMAIL)) {
						if($_SESSION["entity"] === "manager" ){
							header("location: myShippingAdmin.php?error=invalidemail");
						}
						elseif($_SESSION["entity"] === "SuperAdmin"){
							header("location: myShippingAdmin.php?error=invalidemail");
						}
						else{
							header("location: myShipping.php?error=invalidemail");
						}

						exit();		
					}

	
						
				
				}

			}


		$Recipient_LastName = $_POST['Recipient_LastName'];
		$Recipient_FirstName = $_POST['Recipient_FirstName'];
		$Recipient_MiddleInitial = $_POST['Recipient_MiddleInitial'];
		$Recipient_Address = $_POST['Recipient_Address'];
		$Recipient_ContactNum = $_POST['Recipient_ContactNum'];
		$Recipient_Email = $_POST['Recipient_Email'];

		
		$Package_Fragility = $_POST['Package_Fragility'];
		$Package_size = $_POST['Package_size'];
		$Package_Deal = $_POST['Package_Deal'];
		$Additional_Instructions = $_POST['Additional_Instructions'];
		$Branch_Name = $_POST['Branch_Name'];

		$Payment_Method = $_POST['Payment_Method'];
		$Amount = $_POST['Amount'];

		$ETA = $_POST['ETA'];
		$Tracker_Status = 'Order Created';
		if($_SESSION["entity"] === "manager" || $_SESSION["entity"] === "SuperAdmin"){
			$Username = $_SESSION['orderusername'];
		}else{
			$Username = $_SESSION['username'];
		}
		

		
			unset($_SESSION['orderusername']);
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
		require 'includes\dbh.inc.php';



		if (mysqli_connect_error()) {
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}
		else {
			$SELECT1 = "Select Package_Fragility From package Where Package_Fragility = ? Limit 1";
			$INSERT1 = "INSERT Into package (Package_Fragility, Package_size, Package_Deal, Additional_Instructions, Branch_Name, Payment_Method, Amount) values (?, ?, ?, ?, ?, ?, ?)";

			$SELECT2 = "Select Recipient_LastName From recipient Where Recipient_LastName = ? Limit 1";
			$INSERT2 = "INSERT Into recipient (Recipient_LastName, Recipient_FirstName, Recipient_MiddleInitial, Recipient_Address, Recipient_ContactNum, Recipient_Email) values (?, ?, ?, ?, ?, ?)";
			
			$SELECT3 = "Select ETA From tracker Where ETA = ? Limit 1";
			$INSERT3 = "INSERT Into tracker (Package_ID, Sender_ID, Recipient_ID, ETA, Tracker_Status) values (?, ?, ?, ?, ?)";
			

		}

		//package

		$stmt1 = $conn->prepare($SELECT1);
		$stmt1->bind_param("s", $Package_Fragility);
		$stmt1->execute();
		$stmt1->bind_result($Package_Fragility);
		$stmt1->store_result();
		$rnum1 = $stmt1->num_rows;

		
		$stmt1->close();

		$stmt1 = $conn->prepare($INSERT1);
		$stmt1->bind_param("ssssssi", $Package_Fragility, $Package_size, $Package_Deal, $Additional_Instructions, $Branch_Name, $Payment_Method, $Amount);
		$stmt1->execute();

		//sends
		$Package_ID = $conn->insert_id;
		
		$sql = "SELECT Sender_ID FROM sender WHERE Username='".$Username."';";
			$result = $conn-> query($sql) or die($conn->error);

			if ($result-> num_rows >0) {
				while ($row = $result-> fetch_assoc()) {
					$Sender_ID = $row["Sender_ID"];
				}		
			}

		
		$INSERT4 = "INSERT INTO sends (Package_ID, Sender_ID) VALUES ('".$Package_ID."','".$Sender_ID."')";
		$conn -> query($INSERT4);

		//recipient

		$stmt2 = $conn->prepare($SELECT2);
		$stmt2->bind_param("s", $Recipient_LastName);
		$stmt2->execute();
		$stmt2->bind_result($Recipient_LastName);
		$stmt2->store_result();
		$rnum2 = $stmt2->num_rows;

		
		$stmt2->close();

		$stmt2 = $conn->prepare($INSERT2);
		$stmt2->bind_param("ssssss", $Recipient_LastName, $Recipient_FirstName, $Recipient_MiddleInitial, $Recipient_Address, $Recipient_ContactNum, $Recipient_Email);
		$stmt2->execute();

		//receives
		$Recipient_ID = $conn->insert_id;

		$INSERT5 = "INSERT INTO receives (Package_ID, Recipient_ID) VALUES ('".$Package_ID."','".$Recipient_ID."')";
		$conn -> query($INSERT5);

		//tracker


		$stmt3 = $conn->prepare($SELECT3);
		$stmt3->bind_param("s", $ETA);
		$stmt3->execute();
		$stmt3->bind_result($ETA);
		$stmt3->store_result();
		$rnum3 = $stmt3->num_rows;

		
		$stmt3->close();

		$stmt3 = $conn->prepare($INSERT3);
		$stmt3->bind_param("sssss", $Package_ID, $Sender_ID, $Recipient_ID, $ETA, $Tracker_Status);
		$stmt3->execute();

		//tracks


		$Tracking_Number = $conn->insert_id;


		$INSERT6 = "INSERT INTO tracks (Tracking_Number, Package_ID) VALUES ('".$Tracking_Number."','".$Package_ID."')";
		$conn -> query($INSERT6);


		echo "Order Created. Please wait for your courier to arrive for package pick-up! Redirecting...<br>";

		
		
		$stmt1->close();
		$stmt2->close();
		$stmt3->close();
		$conn->close();


		header("refresh:4; url=Tracker_Page1.php?Id=".$Tracking_Number);

	?>
	
	<br>
	<br>
	<?php 
		include_once 'footer.php';
	?>
</body>
</html>