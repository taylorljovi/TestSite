<!-- <?php
//need to set up a report set up for showing the demographics of the customers info 
// this would be nice to set up so that i can just call the name to the person and then grab a variable name that goes with all the other information to display on the screen for a "report"
// youtube time 26:45 https://www.youtube.com/watch?v=-e17XRf2kI8
session_start();
require ("database_connection.php");

$sql= "SELECT * FROM demo_details " ;

$resultSet = (mysqli_query($conn, $sql));

$row = $resultSet -> fetch_assoc();
    $member_fname = $row['member_fname'];
    $member_lname = $row['member_lname'];
    $member_dob = $row['member_dob'];
    $address_one = $row['address_one'];
    $address_two = $row['address_two'];
    $member_city = $row['member_city'];
    $member_state = $row['member_state'];
    $member_zip = $row['member_zip'];
    $member_phone = $row['member_phone'];
    $member_email = $row['member_email'];
    $start_dt = $row['start_dt'];
    

?> -->