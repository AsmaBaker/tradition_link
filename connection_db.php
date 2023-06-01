<?php
$host = "localhost";
$username = "root";
$password = "";
$name="tradition";

$conn = new mysqli($host, $username, $password ,$name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>






