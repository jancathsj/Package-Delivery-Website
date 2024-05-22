<?php 
	session_start();
	include_once 'css/NavBar.css.php';
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
  </head>


<body>
		<div class="head1">
			<header>
			 	<span class="image-clickable">
					<a href="homepage.php">
          			<img src="BF logo.png" alt="main-logo" class="logo" />
        			</a>
        		</span>
        		<nav>
			<ul class="nav-links">
			  <?php
			  	if (isset($_SESSION["useruid"]) && ($_SESSION["entity"] === "SuperAdmin")) {
			  		echo "<li><a href='admin.php'>SuperAdmin</a></li>";
				  	echo "<li><a href='profile.php'>SuperAdmin Profile</a></li>";
				  	echo "<li><a href='createBranch.php'>Create Branch</a></li>";
				  	echo "<li><a href='signUpAdmin.php'>Create Admin</a></li>";
				  	echo "<li><a href='signUpRider.php'>Sign-up Workers</a></li>";
				  	echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
			  	}
				elseif ( (isset($_SESSION["useruid"])) && ($_SESSION["entity"] === "manager")) {
				  	//echo "Hello Admin";
				  	echo "<li><a href='admin.php'>Admin</a></li>";
				  	echo "<li><a href='profile.php'>Admin Profile</a></li>";
				  	echo "<li><a href='signUpRider.php'>Sign-up Workers</a></li>";
				  	//echo "<li><a href='signUpAdmin.php'>Sign-up (Admin)</a></li>";
				  	echo "<li><a href='signup.php'>Sign-up Customer</a></li>";
				  	echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
				  	//echo "<li><a href='login.php'>Login</a></li>";
				  }
				  elseif(isset($_SESSION["useruid"]) && ($_SESSION["entity"] === "rider")){
				  	echo "<li><a class='active' href='homepage.php'>Home</a></li>";
				  	echo "<li><a href='myShipping.php'>Shipping</a></li>";
				  	echo "<li><a href='Tracker_page1.php'>Tracking</a></li>";
				  	echo "<li><a href='riderstatus.php?'>Delivery Status</a></li>";
				  	echo "<li><a href='profile.php'>Rider Profile</a></li>";
				  	echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
				  }
				  elseif(isset($_SESSION["useruid"]) && ($_SESSION["entity"] === "staff")){
				  	echo "<li><a class='active' href='homepage.php'>Home</a></li>";
				  	echo "<li><a href='myShipping.php'>Shipping</a></li>";
				  	echo "<li><a href='Tracker_page1.php'>Tracking</a></li>";
				  	echo "<li><a href='editRider.php'>Assign Rider</a></li>";
				  	echo "<li><a href='profile.php'>Staff Profile</a></li>";
				  	echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
				  }
				  elseif(isset($_SESSION["useruid"]) && ($_SESSION["entity"] === "sender")){
				  	echo "<li><a class='active' href='homepage.php'>Home</a></li>";
				  	echo "<li><a href='myShipping.php'>Shipping</a></li>";
				  	echo "<li><a href='Tracker_page1.php'>Tracking</a></li>";
				  	echo "<li><a href='career.php'>Career</a></li>";
				  	echo "<li><a href='profile.php'>Customer Profile</a></li>";
				  	echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
				  }
				  else{
				  	echo "<li><a class='active' href='homepage.php'>Home</a></li>";
				  	echo "<li><a href='Tracker_page1.php'>Tracking</a></li>";
				  	echo "<li><a href='career.php'>Career</a></li>";
				  	echo "<li><a href='signup.php'>Sign-up</a></li>";
				  	echo "<li><a href='login.php'>Login</a></li>";
				  }
			   ?>
			</div>
			</ul>
			</nav>
			</header>
		</div>
</body>
<?php 
	//for automatic log out
	if (isset($_SESSION["useruid"])) {
		if ((time() - $_SESSION['last_login_timestamp']) > 5*60) {
			header("location:includes/logout.inc.php");
		}
		$_SESSION['last_login_timestamp'] = time();
		/*
		echo "<br>";
		echo("<center>");
		echo("time started: " );
		echo ($_SESSION['last_login_timestamp']);
		echo "<br>";
		echo("time: " );
		echo (time());
		echo "<br>";
		echo("</center>");
		*/
	}
 ?>

 	</div>	
</html>