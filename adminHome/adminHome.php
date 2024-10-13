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
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
    <header class="header"> 
        <a href="">Admin Dashboard</a>
        <div class="logout"><a  href="logout.php">logout</a></div>
    </header>

 <?php
    include"adminSidebar.php";
    ?>
    <div class="content">
        <h1>Admin Dashboard</h1>
    </div>
</body>
</html>