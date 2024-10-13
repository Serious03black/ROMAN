<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "user";
session_start();
// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Check what is in the $_POST array
    print_r($_POST);

    // Check if 'username' and 'password' are present in the POST request
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $name = trim($_POST['username']);
        $pass = trim($_POST['password']);

        // Prepared statement to avoid SQL injection
        $stmt = $data->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $name, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            // Check user type and redirect
            if ($row["usertype"] == "student") {
                $_SESSION["usertype"]="student";
                $_SESSION["username"] = $name;
                $_SESSION["password"] = $pass;
                header("Location:..\studentHome\studentHome.php");
            } elseif ($row["usertype"] == "admin") {
                 $_SESSION["usertype"]="Admin ";
                $_SESSION["username"] = $name;
                  $_SESSION["password"] = "pass1";
                header("location:..\adminHome\adminHome.php");
            }
            exit(); // Exit after redirection
        } else {
            echo "Invalid username or password";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please enter both username and password!";
    }
}

// Close the database connection
mysqli_close($data);
?>
