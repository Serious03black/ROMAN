<?php
session_start();
if (!isset($_SESSION['username'])or($_SESSION["usertype"]=="Admin")) {
header("location:..\login\login.php");
//if some one want to loggin without entering details it will send the user it to login.php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>
            Admin Panel
        </h1>
        <a href="logout.php">Logout</a>
    </center>
</body>
</html>