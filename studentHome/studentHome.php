<?php
session_start();
if(!isset($_SESSION['username'])or($_SESSION["usertype"]=="student")){
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
       <header class="header"> 
        <a href="">Admin Dashboard</a>
        <div class="logout"><a  href="logout.php">logout</a></div>
    </header>

    <ASide>
        <ul>
            <li>
                <a href="">my cource</a>
            </li>
            <li>
                <a href="">Attendence</a>
            </li>
            <li>
                <a href="">MY RESULT</a>
            </li>
            <li>
                <a href="">add teacher</a>
            </li>
            <li>
                <a href="">view teacher</a>
            </li>
            <li>
                <a href="">add cource</a>
            </li>
            <li>
                <a href="">view cource</a>
            </li>
        </ul>
    </ASide>
    <div class="content">
        <h1>SideBar accoroditon</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis harum voluptate ipsam possimus quod placeat? Itaque soluta, blanditiis doloribus aliquid harum ullam porro minima reiciendis nihil libero vel cupiditate accusantium.  </p>
</body>
</html>