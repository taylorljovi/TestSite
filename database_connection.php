<?php
//database_connection.php
$connect = new PDO("mysql:host=localhost;dbname=testing2", "root", "");
?>

<?php
    $servername =   'localhost';
    $username   =   'root';
    $password   =   '';
    $dbname     =   "testing2";
    $conn=mysqli_connect($servername,$username,$password,
                    "$dbname");
if(!$conn)
{
   die('Could not Connect My Sql:');
}
?>
