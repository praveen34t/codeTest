<?php

$dbhost= "localhost";
$dbusername = "root";
$dbpass = "";
$dbname = "arder_university";
$port = "3308";

// Create connection
$conn = new mysqli($dbhost, $dbusername, $dbpass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

?>