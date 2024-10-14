<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "user";
// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check if connection failed
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form is submitted
// Close the connection
mysqli_close($data);
?>
