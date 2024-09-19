<?php
// // Create connection
$conn = new mysqli("localhost", "root", "root", "themegrill_plugin_dev");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

?>

