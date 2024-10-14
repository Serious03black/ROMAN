<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "user";
// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);
if($_GET['student_id']){
    $user_id=$_GET['student_id'];
    $sql = "Delete From user where id='$user_id'";
    $result=mysqli_query($data,$sql);
    if($result){
        header("location:view_student.php");
    }
}
?>