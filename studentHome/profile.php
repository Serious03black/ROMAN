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

$name = $_SESSION['username'];

// Fetch user information from the database
$sql = "SELECT * FROM user WHERE username='$name'";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

// Check if user info is fetched successfully
if (!$info) {
    echo "User not found.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Sanitize input
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);

    // Check if the new email or phone already exists in the database
    $check_sql = "SELECT * FROM user WHERE (email = ? OR phone = ?) AND username != ?";
    $check_stmt = $data->prepare($check_sql);
    $check_stmt->bind_param("sss", $email, $phone, $name);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "The email or phone number is already in use. Please choose another one.";
    } else {
        // Update SQL statement
        $update_sql = "UPDATE user SET email=?, phone=?, password=? WHERE username=?";
        $stmt = $data->prepare($update_sql);
        $stmt->bind_param("ssss", $email, $phone, $password, $name);

        if ($stmt->execute()) {
            echo "Profile updated successfully.";
        } else {
            echo "Error updating profile: " . $stmt->error;
        }

        $stmt->close();
    }
    $check_stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <?php include 'student_sidebar.php'; ?>
    <center>
        <nav>Update Profile</nav><br><br>
        <form action="" method="POST">
            <div class="content">
                <label for="">Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($info['email']); ?>" required>
            </div>
            <div class="content">
                <label for="">Phone Number</label>
                <input type="number" name="phone" value="<?php echo htmlspecialchars($info['phone']); ?>" required>
            </div>
            <div class="content">
                <label for="">Password</label>
                <input type="text" name="password" value="<?php echo htmlspecialchars($info['password']); ?>" required>
            </div>
            <div class="content">
                <input type="submit" name="update" value="Update">
            </div>
        </form>
    </center>
</body>
</html>
