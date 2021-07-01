<?php

include_once("database_connection.php");

$sucess = '';

// if(isset($_POST['Register']))
// {
//     $query =  "INSERT INTO user_details(user_email, user_password, user_name, user_type, user_status )
//     VALUES ('user_email','user_password','user_name', 'user_type', 'user_status')";
//     $statement = $connect -> prepare($query);
//     $statement -> execute(
//         array(
//             'user_email' => $_POST['user_email'],
//             'user_password' => $_POST['user_password'],
//             'user_name' => $_POST['user_name'],
//             'user_type' => $_POST['user_type'],
//             'user_status' => $_POST['user_status'],
//         )
//         );
// }

// if(isset($_POST["Register"]))
// {
//    $user_email = $POST['user_email'] ;
//    $user_password = $POST['user_password'] ;
//    $user_name = $POST['user_name'] ;
//    $user_type = $POST['user_type'] ;
//    $user_status = $POST['user_status'] ;


//    $sql  = "INSERT INTO 'user_details'(user_email, user_password, user_name, user_type, user_status )
//     VALUES ($user_email,$user_password,$user_name, $user_type, $user_status)";

//     if (mysqli_query($con, $sql))
//     {
//         $sucess = "Insert has been successfully.!"; 
//     }
//     else
//     {
//     echo "Error: " . $sql . "   " . mysqli_error($conn);
//     }
//     mysqli_close($conn);
//     header("location:index.php");
// }

$sucess = "";

if(isset($_POST['Register']))
{  

    $user_email = $_POST['user_email'];
    $user_password  = $_POST['user_password'];
    $user_name  = $_POST['user_name'];
    $user_type = $_POST['user_type'];
    $user_status  = $_POST['user_status']; 

    $param_email = password_hash($user_password, PASSWORD_DEFAULT );
    $sql = "INSERT INTO user_details (user_email, user_password, user_name, user_type, user_status)
    VALUES ('$user_email', '$param_email','$user_name','$user_type','$user_status')";

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

// ****THIS WORKS KIND FOR REGISTER_TWO.PHP
// $sucess = "";

// if(isset($_POST['Register']))
// {  
//     $user_email = $_POST['user_email'];
//     $user_password  = $_POST['user_password'];
//     $user_name  = $_POST['user_name'];
//     $user_type = $_POST['user_type'];
//     $user_status  = $_POST['user_status']; 

//     $sql        = "INSERT INTO user_details (user_email,user_password, user_name,user_type,user_status)
//     VALUES ('$user_email','$user_password','$user_name','$user_type','$user_status')";

//     if (mysqli_query($conn, $sql))
//     {
//         $sucess = "Insert has been successfully.!"; 
//     }
//     else
//     {
//    echo "Error: " . $sql . "
//     " . mysqli_error($conn);
//    }
//     mysqli_close($conn);
// }
?>


<!-- header("location:register_two.php"); -->

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
   <h2 align="center">Register New User</h2>
   <br />
    <div class="modal-content panel panel-default"> 
        <div class="panel-heading">Register</div>      
            <div class="panel-body">
            <!-- <span><?php echo $sucess; ?></span> -->
            <form method="post">
                <!-- Enter Username -->
                <div class="form-group">
                    <label>User Email *</label>
                    <input type="text" id="user_email" name="user_email" class="form-control" placeholder="Enter email" required />
                </div>
                <!-- Enter Password -->
                <div class="form-group">
                    <label>Password * </label>
                    <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter password" required/>
                </div>
                <!-- Enter Users Name -->
                <div class="form-group">
                    <label>First and Last Name *</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter first and last name" required/>
                </div>
                <!-- Enter User Type -->
                <div class="form-group">
                <label>Aministrator *</label>
                   <div>
                   <input type="radio" name="user_type" id="user_type" value="admin" required> Yes
                   <input type="radio" name="user_type" id="user_type" value="user" required> No
                   </div>
                </div>
                <div class="form-group">
                <label>Active *</label>
                   <div>
                   <input type="radio" name="user_status" id="user_status" value="Active"> Yes
                   <input type="radio" name="user_status" id="user_status" value="Inactive"> No (Inactive)
                   </div>
                </div>
                <!-- log in button  -->
                <div class="form-group">
                    <input type="submit" id="Register" name="Register" class="btn btn-info" value="Register" />
                    <a class="btn btn-info" href="login.php">Login</a>
                </div>
            </form>
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
  width: 80%; /* Could be more or less, depending on screen size */
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