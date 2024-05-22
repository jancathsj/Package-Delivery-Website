<?php

if (isset($_POST["submit"])) {

	$workerType = $_POST["workerType"];
	$lastName = $_POST["lastName"];
	$firstName = $_POST["firstName"];
	$middleInitial = $_POST["middleInitial"];
	$address = $_POST["address"];
	$contactNum = $_POST["contactNum"];
	$email = $_POST["email"];
	$branchName = $_POST["branchName"];
	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputSignupWorker($workerType, $lastName, $firstName, $middleInitial, $address, $contactNum, $email, $branchName, $username, $pwd, $pwdRepeat) !== false) {
		header("location: ../signupRider.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username) !== false) {
		header("location: ../signupRider.php?error=invaliduid");
		exit();
	}
	if (invalidEmail($email) !==false) {
		header("location: ../signupRider.php?error=invalidemail");
		exit();
	}
	if (invalidNum($contactNum) !== false) {
		header("location: ../signupRider.php?error=invalidnumber");
		exit();
	}
	if (pwdMatch($pwd, $pwdRepeat) !== false) {
		header("location: ../signupRider.php?error=passwordsdontmatch");
		exit();
	}
	if (uidExists($conn, $username) !== false) {
		header("location: ../signupRider.php?error=usernametaken");
		exit();
	}

	createUserWorker($conn, $workerType, $lastName, $firstName, $middleInitial,$address, $contactNum, $email, $branchName, $username, $pwd);

}
else{
	header("location: ../signupRider.php");
	exit();
}


?>