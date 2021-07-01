<?php
//index.php

if(!isset($_COOKIE["type"]))
{
 header("location:login.php");
}

if(isset($_COOKIE["user_email"])){
    echo "User '" . $_COOKIE["user_email"] . "' is set!<br>" ;
} else {
    echo "Cookie is not set!";
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
   <div align="right">
    <a href="logout.php">Logout</a>
   </div>
   <br />
   <?php
   if(isset($_COOKIE["type"]))
  {
    echo "Welcome " . $_COOKIE["type"] ;
  } else {
    echo '<h2 align="center">Welcome User</h2>';
   }
   ?>
  </div>
 </body>
</html>