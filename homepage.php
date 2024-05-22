<html>
<head>
	<?php 
	  include_once 'header.php';
	  include_once 'css/homepage.css';
	?>

	  <meta charset="utf-8">
	  <title> Blue Falcon </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
	

	<div class="clearfix">

			<div class= "motto">

			<h1 class="motto-title">Your Package is in our Safe Hands</h1>
			<p><b>We deliver your parcel in a safe and quick way because we care about the gifts you give to others.</b></p>
			<?php
				if(isset($_SESSION["useruid"])){
					echo "<div class=\"button\"><button class=\"shipbutton\" onclick=\"location.href='myShipping.php'\">START SHIPPING</button></div>";
				}
				else{
					echo "<div class=\"button\"><button class=\"loginbutton\" onclick=\"location.href='login.php'\">LOG IN</button>";
					echo "<button class=\"signupbutton\" onclick=\"location.href='signup.php'\">SIGN UP</button></div>";
				}
						
					
			?>
			</div>	
			
			<div class= "photo">
				<img src="delivery man.jpg"  height="450" class="dman">
			</div>
	</div>

	<div class="quality">
		<br>
		<br>
		<center><h1 class="promotion0">Enjoy stress-free deliveries with Blue Falcon Philippines</h1></center>
		<br>
		<br>
		<div class="list">

			<div class="list-item">
				<div class="char"><img src="truck.png" class="char"></div>
				<h2>Workable parcel pickups</h2>
				Choose from different pick-up/drop-off options 
				and simply make reservations via our dashboard.
			</div>	

			<div class="list-item">
				<div class="char"><img src="cash.png" class="char"></div>
				<h2>Reliable <br> Cash-On-Delivery</h2>
				We offer cash-on-delivery services that are guranteed good deals
				in all areas that we cover.
			</div>

			<div class="list-item">
				<div class="char"><img src="staff.png" class="char"></div>
				<h2>Attentive Customer Service</h2>
				Our staff are always attentive to any your problems or help occur
				in all areas that we cover.
			</div>

			<div class="list-item"> 
				<div class="char"><img src="order.png" class="char"></div>
				<h2>Simple Order Creation</h2>
				Comfortably create new shipments and manage<br>
				existing ones via a personalised dashboard.
			</div>

		</div>

	</div>


	<div class="steps">
	<center><h1 class="promotion1">LET'S START SHIPPING</h1></center>
	<center>
			<ul class="quickie"> 
				<li class="step"><h2 class="number">01</h2>
					<img class="step-img" src="account.png" width="200" height="200">
					<h2 class="step-title">Create an Account</h2>
					Get started in less than 5 minutes 
				</li>
				<li class="step"><h2 class="number">02</h2>
						<img class="step-img" src="parcel.png" width="200" height="200">
					<h2 class="step-title">Send Parcels</h2>
					Book or upload of orders in bulk via dashboard
				</li>
				<li class="step"><h2 class="number">03</h2>
					<img class="step-img" src="points.png" width="200" height="200">
					<h2 class="step-title">Earn Points & Enjoy Privileges</h2>
					Redeem points in exchange for gadgets & more 
				</li>
			</ul>
	</center>
	</div>	

	<div>
	<?php 
	  include_once 'footer.php';
	?>
	</div>

</body>
</html>

