<?php

include_once("database_connection.php");

$sql= "SELECT * FROM demo_details " ;

$resultSet = (mysqli_query($conn, $sql))


?>

<!DOCTYPE html>
<html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>

 <body>

  <!-- <div class = "modal"> -->
  <!-- <button id="myreportBtn">REPORTS</button>  -->
    <div id="myReportModal" class="modal panel panel-default"> 
    <span class="close_report">&times;</span> 
        <div class="panel-heading">Reports</div>     
            <div class="panel-body">
            <!-- <span><?php echo $sucess; ?></span> -->
            <form method="post">
                <label>Select a report to run</label>
                <select name= "demo_details">
                    <optgroup label="All">
                        <option>All Customers</option>
                    </optgroup>
                    <optgroup label="Individual">
                        <?php 
                        while ($row = $resultSet -> fetch_assoc()){
                            $member_fname = $row['member_fname'];
                            $member_lname = $row['member_lname'];
                            echo "<option value = '$member_fname' '$member_lname'>$member_fname $member_lname</option>";
                        } 
                        
                        ?>
                    </optgroup>
                </select>
                <input type="submit" value="submit">
            </form>
            </div>
    </div>
   <!-- </div> -->
 </body>

 <style>

.modal {
      display: none; /* Hidden by default */
      /* position: fixed; Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      /* height: 100%; Full height */
      /* overflow: auto; Enable scroll if needed */
      background-color: #fefefe;
      margin: 10% auto; /* 15% from the top and centered */
      padding: 20px;
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
    }


.modal-content {
  justify-content: center;
  z-index: 1; /* Sit on top */
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
  align-items: center;
  
}

  /* The Close Button */
  .close_report {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    
    .close_report:hover,
    .close_report:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
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

</style>


</html>