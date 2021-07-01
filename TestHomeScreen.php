<?php

include_once("database_connection.php");
include("register_modal.php");
include("reports.php");
include('demo_session.php'); 
//TestHomeScreen.php

 //displays the type of user either admin or user
    // if(!isset($_COOKIE["type"]))
    // {
    //  header("location:login.php");
    // }

if(!isset($_COOKIE["name"]))
{
 header("location:login.php");
}

if(isset($_COOKIE["user_email"])){
    echo "User '" . $_COOKIE["user_email"] . "' is set!<br>" ;
} else {
    echo "Cookie is not set!";
}


//save button for demographic insert
$sucess = '';
if(isset($_POST['Save']))
{  
    $member_lname = $_POST['member_lname'];
    $member_fname  = $_POST['member_fname'];
    $member_mi  = $_POST['member_mi'];
    $member_dob = $_POST['member_dob'];
    $address_one  = $_POST['address_one']; 
    $address_two  = $_POST['address_two']; 
    $member_city = $_POST['member_city'];
    $member_state  = $_POST['member_state'];
    $member_zip  = $_POST['member_zip'];
    $member_phone = $_POST['member_phone'];
    $member_email = $_POST['member_email'];
    $start_dt = $_POST['start_dt'];

    // $param_email = password_hash($user_password, PASSWORD_DEFAULT );
    $sql = "INSERT INTO demo_details ( `member_lname`, `member_fname`, `member_mi`, `member_dob`, `address_one`, `address_two`, `member_city`, `member_state`, `member_zip`, `member_phone`, `member_email`, `start_dt`)
    VALUES ('$member_lname', '$member_fname','$member_mi','$member_dob','$address_one','$address_two', '$member_city', '$member_state', '$member_zip', '$member_phone', '$member_email', '$start_dt')";

    if (mysqli_query($conn, $sql))
    {
        $sucess = "Insert has been successfully.!"; 
    }
    else
    {
   echo "Error: " . $sql . "
    " . mysqli_error($conn);
   }
    mysqli_close($conn);
}



?>


<!DOCTYPE html>
<html>
 <head>
  <title>Test Site</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 </head>
 
 
 <body>
  <br />
    
  <div class="container">
   <h2 align="center">Test Site</h2>
    <!-- <span><?php echo $sucess; ?></span> -->
   <br />

    <div class="w3-row">
        <!-- demographics  -->
        <div class="w3-teal w3-container w3-twothird">
            <div>
            <div>
                <br />
                <label>Existing Customer</label>
                <select name= "Customers">
                <option>select</option>
                    <?php 
                        while ($rows = $resultSet -> fetch_assoc()){
                        $member_fname = $rows['member_fname'];
                        $member_lname = $rows['member_lname'];
                        echo "<option  value = '$member_fname' '$member_lname'> $member_fname $member_lname</option>";
                        } 
                    ?>
               </select> 
               <input type= "submit" name= "submit" value= "Select"/>
               <?php
                    if(isset($_POST["submit"])){
                        $getCustomer= $_POST["Customers"];
                    }
               ?>
               <br />
            </div>
            <h1>Demographics</h1>
            </div>
            <br />
            <form method="post">
                <div class="w3-third w3-container ">
                    <label>Last, First, M.I. *</label>
                </div>
                <div class="w3-rest w3-container " >
                    <input type="text" id="member_lname" name="member_lname" size = "16" placeholder= 
                    <?php
                        //displays the type of user either admin or user
                            // if(isset($_COOKIE["type"]))
                            // {
                            //     echo "Welcome " . $_COOKIE["type"] ;
                            // } else {
                            //     echo '<h2 align="center">Welcome User</h2>';
                            // }

                        if(isset($_POST["submit"]))
                        {
                            echo $_POST["name"] ;
                        } else {
                            echo '<h2 align="center">Welcome User</h2>';
                        }
                    ?>
                    />
                    <input type="text" id="member_fname" name="member_fname" size = "16" placeholder= "First" required />
                    <input type="text" id="member_mi" name="member_mi" size="5" placeholder= "M.I." required />
                </div>
                 <br />
                <div class="w3-third w3-container ">
                    <label>Member DOB *</label>
                </div>
                <div class="w3-rest w3-container ">
                    <input type="date" id="member_dob" name="member_dob" required />   
                </div>
                 <br />
                <div class="w3-third w3-container ">
                    <label>Address 1 *</label>
                </div>
                <div class="w3-rest w3-container ">
                    <input type="text" id="address_one" name="address_one" size="50" placeholder= "Address" required />
                </div>
                 <br />
                <div class="w3-third w3-container ">
                    <label>Address line 2</label>
                </div>
                <div class="w3-rest w3-container ">
                    <input type="text" id="address_two" name="address_two" size="50" placeholder= "Address" />
                </div>
                 <br />
                <div class="w3-third w3-container ">
                    <label>City, State, Zip* </label>
                </div>
                <div class="w3-rest w3-container ">
                    <input type="text" id="member_city" name="member_city" size = "16" placeholder= "City" required />
                    <input type="text" id="member_state" name="member_state" size = "5" placeholder= "State" required />
                    <input type="number" id="member_zip" name="member_zip" size="15" placeholder= "Zip" required />
                </div>
                 <br />
                <div class="w3-third w3-container ">
                    <label>Phone Number *</label>
                </div>
                <div class="w3-rest w3-container ">
                    <input type="text" id="member_phone" name="member_phone" placeholder= "ex. 123-123-4321" required />
                </div>
                <br />
                <div class="w3-third w3-container ">
                    <label>Email Address *</label>
                </div>
                <div class="w3-rest w3-container ">
                    <input type="email" id="member_email" name="member_email" size="50" placeholder= "Email" required />
                </div>
                <br />
                <div class="w3-third w3-container ">
                    <label>Start Service Date *</label>
                </div>
                <div class="w3-rest w3-container ">
                    <input type="date" id="start_dt" name="start_dt" required />
                </div>
                <br />  
                <div class="form-group">
                    <input type="submit" id="Save" name="Save" class="btn btn-info" value="Save" reset/>
                </div>

            </form>
        </div>

        <!-- Display Users Information section  -->
        <div class="w3-container w3-third">
            <div >
                <div align="left">
                   <!-- //using php cookies to display welcome user_name from log in screen -->
                    <?php
                        //displays the type of user either admin or user
                            // if(isset($_COOKIE["type"]))
                            // {
                            //     echo "Welcome " . $_COOKIE["type"] ;
                            // } else {
                            //     echo '<h2 align="center">Welcome User</h2>';
                            // }

                        if(isset($_COOKIE["name"]))
                        {
                            echo '<h3> Welcome  '. $_COOKIE["name"] . '</h3>';
                        } else {
                            echo '<h2 align="center">Welcome User</h2>';
                        }
                    ?>
                </div>
                <div align= "right">    
                    <!-- log out button  -->
                    <button id = "myreportsBtn" class = "button button:hover" href="reports.php" > Reports </button> 
                    <button id = "myregBtn" class = "button button:hover" href="register_modal.php">Register</button>
                    <a class = "button button:hover" href="logout.php">Logout</a>
                </div>
            <h2>Display Users Information</h2>
            </div>
        </div>
    <br />
    </div>
 </body>

 <style>
/* .flex-container {
  flex-wrap: wrap;
  align-content: space-around;
} */

 .button {
  background-color: white; 
  color: black; 
  border: 2px solid teal;
  border-radius: 12%;
  display: inline-block;
  padding: 10px 10px;

}

.button:hover {
  background-color: teal;
  color: white;
}
 

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
      width: 40%; /* Could be more or less, depending on screen size */
    }


input{
  color: black;
}

select {
    color:black;
}
 
</style>

<script> 

 // Get the Register modal
 var regModal = document.getElementById("myRegModal")

// Get the button that opens the Register modal
var regbtn = document.getElementById("myregBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the Register modal
regbtn.onclick = function() {
  regModal.style.display = "block";
}

// When the user clicks on <span> (x), close the login modal
span.onclick = function() {
  regModal.style.display = "none";

}

// Get the Report modal
var reportModal = document.getElementById("myReportModal")

// Get the button that opens the Register modal
var reportbtn = document.getElementById("myreportsBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close_report")[0];

// When the user clicks on the button, open the Register modal
reportbtn.onclick = function() {
  reportModal.style.display = "block";
}

// When the user clicks on <span> (x), close the login modal
span.onclick = function() {
  reportModal.style.display = "none";

}
</script>

</html>