<?php
     include 'includes/dbh.inc.php';
     include_once 'header.php';

?>

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
    <link rel="stylesheet" type="text/css" href="css/tracker.css" />
  </head>

  <body>
    
    <br>
    <center>
  
    <?php
      if(isset($_GET['Id'])){     

       $search_query = ($_GET['Id']);       
       $query  = "SELECT * FROM tracker WHERE Tracking_Number = '".$search_query."'"; 
        $result = mysqli_query($conn,$query);     

        if ($result->num_rows > 0) {              
         echo "<h1>Details of your package</h1>"; 
         echo "<center>";
         echo "<table border='1' class='track'>

         <tr>
           <th></th>
            <th> Info </th>
          </tr>";   

          while($row = mysqli_fetch_array($result))
          {

            // for the Rider's Name
            $query1 =   "SELECT Rider_LastName, Rider_FirstName, Rider_MiddleInitial FROM Rider WHERE Rider_ID = (SELECT Rider_ID from tracker where Tracking_Number='".$row['Tracking_Number']."')";
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
              echo "<td> Tracking Number </td>";
              echo "<td  class='Col2' >" . $row['Tracking_Number'] . "</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td> Name of Rider </td>";

              if ($row1 == null) {
                echo "<td  class='Col2' >Unassigned</td>";
              }
              else{
                echo "<td  class='Col2' >" . $row1['Rider_LastName']. ", " . $row1['Rider_FirstName'] ." " . $row1['Rider_MiddleInitial'] . ".</td>";
              }
              
            echo "</tr>";
            echo "<tr>";
              echo "<td> Name of Sender </td>";
              echo "<td  class='Col2' >" . $row2['Sender_LastName']. ", " . $row2['Sender_FirstName'] ." " . $row2['Sender_MiddleInitial'] . ".</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td> Name of Receiver </td>";
              echo "<td  class='Col2' >" . $row3['Recipient_LastName']. ", " . $row3['Recipient_FirstName'] ." " . $row3['Recipient_MiddleInitial'] . ".</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td> ETA </td>";
              echo "<td  class='Col2' >" . $row['ETA'] . "</td>";
            echo "</tr>";
             echo "<tr>";
              echo "<td> Date Ordered </td>";
              echo "<td  class='Col2' >" . $row['Tracker_Date'] . "</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td> Tracker Status </td>";


                echo "<td  class='Col2' >" . $row['Tracker_Status'] . "</td>";

              
            echo "</tr>";
          }

          echo "</table>";
          echo "</center>";

          mysqli_close($conn);

    ?>
        <center>
          <?php

              if (isset($_SESSION['username'])) {
                echo "<a href='./myShipping.php' style='text-decoration : none;'> <button>Create Order</button></a>";
              }

          ?>
          
          <a href="./homepage.php" style="text-decoration : none;"> <button>Go to Main Page</button></a>
          <a href="./Tracker_page1.php" style="text-decoration : none;"><button>Track Another Package</button></a>
        </center>
    <?php
        } else {            
          echo "<h1>Details of your package</h1>";
          echo "<h3> Tracking number ".$_GET['Id']." does not exist. </h3>";
    ?>
          <center>
            <?php

              if (isset($_SESSION['username'])) {
                echo "<a href='./myShipping.php' style='text-decoration : none;'> <button>Create Order</button></a>";
              }

          ?>

            <a href="./homepage.php" style="text-decoration : none;"> <button>Go to Main Page</button></a>
            <a href="./Tracker_page1.php" style="text-decoration : none;"><button>Track Another Package</button></a>
          </center>
    <?php
          }
    }else{  
  ?>
      

      <form method="get" action="" class="myTrack">
      <h3>Please input your Tracking number provided during check-out:</h3>
      <input type="text" name="Id">
      <input type="submit" id="mySubmit" value="Search!">
      </form>

      <center>
        <?php

              if (isset($_SESSION['username'])) {
                echo "<a href='./myShipping.php' style='text-decoration : none;'> <button>Create Order</button></a>";
              }

          ?>
        <a href="./homepage.php"><button>Go to Main Page</button></a>
      </center>

  <?php } ?>
    </center>
  </body>
</html>