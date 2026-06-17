<?php

// $servername ="localhost";
// $username ="singhan1_refrigeration";
// $password ="Oberoi@123#";
// $database ="singhan1_refrigeration";

$servername ="localhost";
$username ="root";
$password ="webkul";
$database ="refrigation";


$conn = mysqli_connect($servername,$username,$password,$database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

}





?>
