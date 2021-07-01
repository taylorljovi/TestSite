<?php
//login.php

include("database_connection.php");

 //displays the type of user either admin or user
  // if(isset($_COOKIE["type"]))
  // {
    
  //  header("location:TestHomeScreen.php");
  // }

if(isset($_COOKIE["name"]))
{
  
 header("location:TestHomeScreen.php");
}

// if (isset($_POST["login"]))
//   { 
//   $users_email = htmlentities($_POST["user_email"]);
//   setcookie("user_email", $users_email, time()+3600);
//   header('Location: TestHomeScreen.php');
//   }

  $message = '';

if(isset($_POST["login"]))
{
 if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  $query = "
  SELECT * FROM user_details 
  WHERE user_email = :user_email
  ";
//   $statement = $connect->prepare($query);
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    'user_email' => $_POST["user_email"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if(password_verify($_POST["user_password"], $row["user_password"]))
     //displays the type of user either admin or user
      // {
      //  setcookie("type", $row["user_type"], time()+3600);
      //  header("location:TestHomeScreen.php");
      // }
    {
      $users_email = htmlentities($_POST["user_email"]);
      setcookie("user_email", $users_email, time()+3600);
      setcookie("name", $row["user_name"], time()+3600);
      header("location:TestHomeScreen.php");
     }
    else
    {
     $message = '<div class="alert alert-danger">Wrong Password</div>';
    }
   }
  }
  else
  {
   $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
  }
 }

}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>How to create PHP Login Script using Cookies</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>

 <body>
  <br />
  <div class="container">
   <h2 align="center">How to create PHP Login Script using Cookies</h2>
   <br />
    <div class="modal-content panel panel-default">
        <div class="panel-heading">Login</div>
            <div class="panel-body">
            <span><?php echo $message; ?></span>
            <form method="post">
            <!-- Enter Username -->                
            <div class="form-group">
            <label>User Email</label>
            <input type="text" name="user_email" id="user_email" class="form-control" />
            </div>
            <!-- Enter Password -->            
            <div class="form-group">
            <label>Password</label>
            <input type="password" name="user_password" id="user_password" class="form-control" />
            </div>
                            <!-- log in button  -->
            <div class="form-group">
            <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
                <!-- <a class="btn btn-info" href="register_two.php">Register</a> -->
            </div>
            <div class="form-group"  >
            
            </div>
            </form>
            </div>
   </div>
   <br />
   <p>Admin email - john_smith@gmail.com</p>
   <p>Admin Password - password</p>
   <p>All user password is 'password'</p>
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

</style>

</html>

