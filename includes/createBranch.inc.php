<?php

if (isset($_POST["submit"])) {

	$name = $_POST["name"];
	$address = $_POST["address"];
	$contactNum = $_POST["contactNum"];
	$email = $_POST["email"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputBranch($name, $address, $contactNum) !== false) {
		header("location: ../createBranch.php?error=emptyinput");
		exit();
	}
	if (branchExist($conn, $name) !== false) {
		header("location: ../createBranch.php?error=branchNameTaken");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: ../createBranch.php?error=invalidEmail");
		exit();
	}
	$sql = "INSERT INTO Branch (Branch_Name, Branch_Address, Branch_Contactnum, Branch_Email ) VALUES (?,?,?,?);";
	$stmt = mysqli_stmt_init($conn); 
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../createBranch.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ssss",$name, $address, $contactNum, $email);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../createBranch.php?error=none");
	exit();
}
else{
	header("location: ../createBranch.php");
	exit();
}


?>