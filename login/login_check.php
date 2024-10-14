<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "user";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            // Store user details in session
            $_SESSION["username"] = $row['username'];
            $_SESSION["usertype"] = trim(strtolower($row["usertype"])); // Ensure it's trimmed and in lowercase
            
            // Debugging: Print user type to ensure it's set correctly
            echo "User Type: " . $_SESSION["usertype"]; // Add this line for debugging

            // Redirect based on user type
            if ($_SESSION["usertype"] === "student") {
                header("Location: ../studentHome/studentHome.php");
            } elseif ($_SESSION["usertype"] === "admin") {
                header("Location: ../adminHome/adminHome.php");
            } else {
                echo "User type not recognized."; // This will help identify if the type is unexpected
            }
            exit(); // Ensure you exit after redirection
        } else {
            echo "Invalid username or password.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please enter both username and password.";
    }
}

// Close the database connection
mysqli_close($data);
?>
