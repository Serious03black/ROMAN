<?php
$host="localhost";
$user="root";
$db="user";
$password="";
session_start;
$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("error");
}
if(isset($_POST["apply"]))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $msg=$_POST['message'];
    $sql= "insert into admisssion(nama,email,phone,message)values('$name','$email','$phone','$msg')";
       $result=mysqli_query($data,$sql);  
       if($result){
        echo "application sucessfull";
        $_SESSION['message']="radhe radhe";
        header("location:C:\xampp\htdocs\ROMAN\studentHome\studentHome.php");
       }

}
?>