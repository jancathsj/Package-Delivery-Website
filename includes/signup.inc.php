<?php

if (isset($_POST["submit"])) {

	$lastName = $_POST["lastName"];
	$firstName = $_POST["firstName"];
	$middleInitial = $_POST["middleInitial"];
	$address = $_POST["address"];
	$contactNum = $_POST["contactNum"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputSignup($lastName, $firstName, $middleInitial,$address, $contactNum, $email, $username, $pwd, $pwdRepeat) !== false) {
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username) !== false) {
		header("location: ../signup.php?error=invaliduid");
		exit();
	}
	if (invalidEmail($email) !==false) {
		header("location: ../signup.php?error=invalidemail");
		exit();
	}
	if (invalidNum($contactNum) !== false) {
		header("location: ../signup.php?error=invalidnumber");
		exit();
	}
	if (pwdMatch($pwd, $pwdRepeat) !== false) {
		header("location: ../signup.php?error=passwordsdontmatch");
		exit();
	}
	if (uidExists($conn, $username) !== false) {
		header("location: ../signup.php?error=usernametaken");
		exit();
	}

	createUser($conn, $lastName, $firstName, $middleInitial,$address, $contactNum, $email, $username, $pwd);

}
else{
	header("location: ../signup.php");
	exit();
}


?>