<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "user";

session_start();
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Error: Could not connect.");
}

if (isset($_POST["apply"])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $msg = trim($_POST['msg']);  // Ensure this matches the 'name' attribute in your form

    // Check if fields are not empty before inserting
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($msg)) {
        $sql = "INSERT INTO admission (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$msg')";
        $result = mysqli_query($data, $sql);

        if ($result) {
            $_SESSION['message'] = "Application sent successfully";
            header("Location: /ROMAN/studentHome/studentHome.php");
            exit;
        } else {
            $_SESSION['message'] = "Error occurred while inserting data.";
            header("Location: /ROMAN/frontpage/INDEX.php");
            exit;
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
