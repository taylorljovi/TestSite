<?php

include("database_connection.php");

$sql= "SELECT * FROM demo_details " ;

$resultSet = (mysqli_query($conn, $sql))


?>

<!DOCTYPE html>
<html>
 <head>
  <title>Register New Employee</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>

 <body>
  <br />
  <div class="container">
   
   <br />
    <div class="modal-content panel panel-default"> 
        <div class="panel-heading">Customer Report</div>      
            <div class="panel-body">
            <!-- <span><?php echo $sucess; ?></span> -->
            <table>
                    <tr>
                        <th> First </th>
                        <th> M.I.</th>     
                        <th> Last Name</th>
                        <th> Date of Birth</th>
                        <th> Address </th>
                        <th> City </th>     
                        <th> State</th>
                        <th> Zip Code</th>
                        <th> Phone Number </th>
                        <th> Email</th>     
                        <th> Start Date</th>
                    </tr>        
                      <?php
                        while ($row = $resultSet -> fetch_assoc()) {
                              echo "<tr><td>" . $row['member_fname'] . "</td><td>" . $row['member_mi'] . "</td><td>" . $row['member_lname'] . "</td><td>". $row['member_dob'] . "</td><td>" . $row['address_one'] . "</td><td>" . $row['member_city'] . "</td><td>" . $row['member_state'] . "</td><td>" . $row['member_zip'] . "</td><td>" . $row['member_phone'] . "</td><td>" . $row['member_email'] . "</td><td>" . $row['start_dt'] . "</td></tr>"  ;
                          }
                      ?>
                </table>
            </div>
    </div>
  </div>
 </body>

 <style>

.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 90%; /* Could be more or less, depending on screen size */
}

/* // radio class */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

table{
    border-collapse: collapse;
    width: 100%;
    color: teal;
    /* font-family: monospace; */
    font-size: 12px;
    text-align: left;
}
th{
    background-color: teal;
    color: white;
}


</style>

</html>