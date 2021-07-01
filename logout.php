<?php
//logout.php
setcookie("name", "", time()-3600);

header("location:login.php");

?>