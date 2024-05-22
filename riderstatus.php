<?php
     include 'includes/dbh.inc.php';
     include_once 'header.php';
    include_once 'css/editRider.css.php';
?>

<html>
  <head>
    <style>
      table
        { margin-top: 15px;
          border-style:solid;
          border-width:2px;
          border-color:darkcyan;
          text-align: center;
          margin-left: 10%;
          margin-right: 10%;
       }
       th, td {
      padding: 5px;
      width:2%;
    }
    #addbutton{
      margin-top: 15px;
          border-style:solid;
          border-width:2px;
          border-color:darkcyan;
          text-align: center;
          margin-left: 45%;
          margin-right: 45%;
    }
        button {margin: 10px;
        }

        h1{
          margin: auto;
          width: 75%;
          border: 3px solid black;
          padding: 10px;
          text-align: center;
        }

        h3{
          width: 100%;
          padding-top: 10px;
          text-align: center;
        }

        select{
    width: 70%;
    padding: 1%;
    margin: 1%;
    font-size: 14px;
  }



    </style>
  </head>

  <body>
  		<br>
    	<h1>Delivery Status</h1>
    <br>
    <center>
  
    <?php
    
// username -> branch_Name -> Package_ID-> tracker_Number


    if(isset($_GET["Tracker_Status"]) && isset($_GET["packageId"])){
    	$query11  = "update Tracker set Tracker_Status  = '".$_GET["Tracker_Status"]."' where Package_ID = '".$_GET["packageId"]."';";
    	mysqli_query($conn,$query11);
       

 	}
     
    if(isset($_SESSION['username'])){

    echo "<center>";
	
	echo("<div class='table-wrapper'>");
	echo "<table class='fl-table' border='1'>

	 <tr>
		
		<th>Tracking Number</th>
		<th>Package ID</th>
		<th>Rider</th>
		<th>Sender</th>
		<th>Recipient</th>
		<th>ETA</th>
		<th>Date Created</th>
		<th>Order Status</th>

	</tr>"; 



    	$query5  = "SELECT Branch_Name FROM Rider WHERE Username = '".$_SESSION['username']."'";
    	$result5 = mysqli_query($conn,$query5);

    	if ($result5->num_rows > 0) {
    		$row = mysqli_fetch_array($result5);
    		$branch = $row["Branch_Name"];
    		echo "<h2>";
    		echo ("Branch Name: "."$branch");
    		echo "</h4>";
    	}

    
    	$query6  = "SELECT Package_ID FROM Tracker WHERE Rider_ID = (SELECT Rider_ID from rider WHERE Username ='".$_SESSION['username']."')"; 
   		$result6 = $conn-> query($query6) or die($conn->error);


   		if ($result6->num_rows > 0) {
    		while($row = mysqli_fetch_array($result6)){
    			$Package_ID = $row["Package_ID"];
    			

    			$query7  = "SELECT * FROM Tracker WHERE Package_ID = '".$Package_ID."'"; 
   				$result7 = mysqli_query($conn,$query7);

   				if ($result7->num_rows > 0) {
   					while($row = mysqli_fetch_array($result7)){
   						
   								$query1 =   "SELECT Rider_LastName, Rider_FirstName, Rider_MiddleInitial FROM Rider WHERE Rider_ID = '".$row['Rider_ID']."'";
			            $result1 = mysqli_query($conn,$query1);
			            $row1 = mysqli_fetch_array($result1);

			            //for the Sender's Name
			            $query2 =   "SELECT Sender_LastName, Sender_FirstName, Sender_MiddleInitial FROM Sender WHERE Sender_ID = (SELECT Sender_ID FROM Tracker WHERE Tracking_Number ='".$row['Tracking_Number']."')";
			            $result2 = mysqli_query($conn,$query2);
			            $row2 = mysqli_fetch_array($result2);

			            //for the Reciever's Name
			            $query3 =   "SELECT Recipient_LastName, Recipient_FirstName, Recipient_MiddleInitial FROM Recipient WHERE Recipient_ID = (SELECT Recipient_ID FROM Tracker WHERE Tracking_Number ='".$row['Tracking_Number']."')";
			            $result3 = mysqli_query($conn,$query3);
			            $row3 = mysqli_fetch_array($result3);

   						echo "<tr>";
   							echo "<td  class='Col2' >" . $row["Tracking_Number"] . "</td>";
   							echo "<td  class='Col2' >" . $Package_ID . "</td>";
   							//echo "<td  class='Col2' >" . $row["Rider_ID"] . "</td>";

							if ($row1 === null) {
				                echo "<td  class='Col2' >Unassigned</td>";
				              }
				              else{
				                echo "<td  class='Col2' >" . $row1['Rider_LastName']. ", " . $row1['Rider_FirstName'] ." " . $row1['Rider_MiddleInitial'] . ".</td>";
				              }
   							//echo "<td  class='Col2' >" . $row["Sender_ID"] . "</td>";
   							echo "<td  class='Col2' >" . $row2['Sender_LastName']. ", " . $row2['Sender_FirstName'] ." " . $row2['Sender_MiddleInitial'] . ".</td>";
   							//echo "<td  class='Col2' >" . $row["Recipient_ID"] . "</td>";
   							echo "<td  class='Col2' >" . $row3['Recipient_LastName']. ", " . $row3['Recipient_FirstName'] ." " . $row3['Recipient_MiddleInitial'] . ".</td>";
   							echo "<td  class='Col2' >" . $row["ETA"] . "</td>";
   							echo "<td  class='Col2' >" . $row["Tracker_Date"] . "</td>";
   							echo "<td  class='Col2' >" . $row["Tracker_Status"] . "</td>";

				        echo "</tr>";



   					}
   				}
    		}
    	}
    	else{
    		echo "0 result";
    	}
    	echo "</table>";
    	echo "</div>";
          echo "</center>";
    }


    if(isset($_GET["Tracker_Status"]) && isset($_GET["packageId"])){
       mysqli_close($conn);

       echo("<center>");
	    echo('<a href="./riderstatus.php"><button>Edit Again</button></a>');     
	     echo('</center>'); 
       

 	}
	 else{  
	  ?>

	      <form method="get" action="riderstatus.php">
		      <br>
		    
			  <select name="packageId">
			    <option disabled selected>-- Package ID --</option>
			    <?php
			        $query9  = "SELECT Package_ID FROM Tracker WHERE Rider_ID = (SELECT Rider_ID from rider WHERE Username ='".$_SESSION['username']."')"; 
		   			$result9 = mysqli_query($conn,$query9);

			    	if ($result9->num_rows > 0) {                   
			          while($row = mysqli_fetch_array($result9)){
			          	$ridername = $row["Rider_ID"];

			          	echo "<option value='". $row["Package_ID"] ."'>" .$row["Package_ID"] ."</option>";  // displaying data in option menu
			          }
		        }
		        ?>
		       </select>
		      <br>
			  
			  <select name="Tracker_Status">
			    <option disabled selected>-- Order Status --</option>
			    <?php

			   		echo "<option value='Order Created'>Order Created</option>
			          	<option value='Shipped Out'>Shipped Out</option>
			          	<option value='Sorting'>Sorting</option>
			          	<option value='Out for Delivery'>Out for Delivery</option>
			          	<option value='Delivered'>Delivered</option>";
			     //    $query8  = "SELECT Tracker_Status FROM tracker WHERE Rider_ID = (SELECT Rider_ID from rider WHERE Username ='".$_SESSION['username']."')"; 
			    	// $result8 = mysqli_query($conn,$query8);

			    	// if ($result8->num_rows > 0) {            
			     //      while($row = mysqli_fetch_array($result8)){


			     //      	//$ridername = $row1["Rider_ID"];


			          	


			     //      //	echo "<option value='". $row["Tracker_Status"] ."'>" .$row1["Rider_FirstName"] ." ". $row1["Rider_LastName"]." " . $row1["Rider_MiddleInitial"]." " ."</option>";  // displaying data in option menu
			     //      }
		      //   	}
		    	?>  
		  	  </select>
		      <br>
	 					<button type="submit" name="submit"> Save Changes </button>
	 				<br>

			    <?php  
			      mysqli_close($conn);
			    ?>
	       </form>

	      <center>
	        <a href="./myShipping.php"><button>Create Order</button></a>
	        <a href="./homepage.php"><button>Go to Main Page</button></a>
	      </center>

	  <?php } ?>
    </center>
  </body>
</html>