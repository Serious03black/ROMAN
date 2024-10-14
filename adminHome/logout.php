<?php
session_start();
session_destroy();
header("location:..\login\login.php");
$host = "localhost";
$user = "root";
$password = "";
$db = "user";
$data = mysqli_connect($host, $user, $password, $db);
if(isset($_POST["add_student"])){
    $username = $_POST["name"];
    $pass = $_POST["password"];
    $u_email = $_POST["email"];
    $u_phone = $_POST["phone"];
    $sql = "INSERT INTO user( username, u_phone, u_email, pass) VALUES ('$username','$phone','$email','$password')";
$result = mysqli_query($data, $sql);
}
?>