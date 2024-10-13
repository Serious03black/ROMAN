<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "user";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Start session
session_start();

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Retrieve the form data
    $username = $_POST["name"];
    $pass = $_POST["password"];
    $u_email = $_POST["email"];
    $u_phone = $_POST["phone"];

    // Check if the student already exists (using email or phone as a unique identifier)
    $check_sql = "SELECT * FROM user WHERE email='$u_email' OR phone='$u_phone'";
    $check_result = mysqli_query($data, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // If the student exists, display an error message
        echo "Student with this email or phone number already exists!";
        $_SESSION['message'] = "Student with this email or phone number already exists!";
    } else {
        // If the student does not exist, insert the new student
        $sql = "INSERT INTO user (username, phone, email, usertype, password) VALUES ('$username', '$u_phone', '$u_email', 'student', '$pass')";
        $result = mysqli_query($data, $sql);

        // Check if the query was successful
        if ($result) {
            echo "Student added successfully";
            $_SESSION['message'] = "Student added successfully";
        } else {
            echo "Error occurred while inserting data.";
            $_SESSION['message'] = "Error occurred while inserting data.";
        }
    }

    // Redirect or exit
    exit;
}
?>
