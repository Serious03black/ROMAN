<?php
session_start();
// Ensure the session is set and user is not an Admin
$host = "localhost";
$user = "root";
$password = "";
$db = "user";
$data = mysqli_connect($host, $user, $password, $db);
// Check if student_id is passed in the URL
if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];
    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = mysqli_query($data, $sql);

    // Check if the query was successful and returned a result
    if ($result && mysqli_num_rows($result) > 0){
        // Fetch the student info
        $info = $result->fetch_assoc();
    } 
    }
    //form submit  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $id = $_POST['student_id'];
    $username = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Prepare the update SQL query
    $sql = "UPDATE user SET username=?, email=?, phone=?, password=? WHERE id=?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($data, $sql);
    
    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, 'ssssi', $username, $email, $phone, $password, $id);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['message'] = "Student updated successfully.";
            header("location:view_student.php"); // Redirect to view students page
            exit;
        } else {
            $_SESSION['message'] = "Error updating student: " . mysqli_error($data);
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['message'] = "Error preparing statement: " . mysqli_error($data);
    }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="add_student.css">
    <title>Update Student</title>
</head>
<body>
    <?php include "adminSidebar.php"; ?>
    <div>
        <center>
        <h2>Update Student</h2>
        <form action="#" method="POST">
            <input type="hidden" name="student_id" value="<?php echo $id; ?>">  <!-- Hidden field to pass student ID -->
            <div>
                <label for="name">Username</label>
                <input type="text" name="name" value="<?php echo isset($info['username']) ? $info['username'] : ''; ?>">  <!-- Safely populate form -->
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>">
            </div>
            <div>
                <label for="phone">Phone Number</label>
                <input type="number" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="text" name="password" value="<?php echo isset($info['password']) ? $info['password'] : ''; ?>">
            </div>
            <div>
                <input type="submit" value="Update" href="view_student.php">
            </div>
        </form>
        </center>
    </div>
</body>
</html>
