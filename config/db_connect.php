<?php 

$server = "localhost:3307";
$username = "armand";
$password = "test1234";
$database = "task_manager";


// connect to DB
$conn = new mysqli($server, $username, $password, $database);

// check connection
if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
}

?>