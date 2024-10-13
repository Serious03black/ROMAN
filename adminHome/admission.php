<?php
// session_start();
// if (!isset($_SESSION['username']) || $_SESSION["usertype"] != "Admin") {
//     header("location:../login/login.php");
//     exit();
// }

$host = "localhost";
$user = "root";
$password = "";
$db = "user";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM admission";  // Corrected typo from "form" to "from"
$result = mysqli_query($data, $sql);

if (!$result) {
    echo "Error executing query: " . mysqli_error($data);
} else {
    echo "Query executed successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admission</title>
</head>
<body>
    <header class="header"> 
        <a href="">Admission</a>
        <div class="logout"><a href="logout.php">Logout</a></div>
    </header>
    <?php include "adminSidebar.php"; ?>

    <div class="content">
        <h1>Applied</h1>
        <table border="1px">
            <tr>
                <th style="padding: 20px; font-size: 15px;">id</th>
                <th style="padding: 20px; font-size: 15px;">Name</th>
                <th style="padding: 20px; font-size: 15px;">Email</th>
                <th style="padding: 20px; font-size: 15px;">Phone</th>
                <th style="padding: 20px; font-size: 15px;">Message</th>
            </tr>

            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($info = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td style="padding: 20px; font-size: 15px;"><?php echo $info['id']; ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo $info['name']; ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo $info['email']; ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo $info['phone']; ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo $info['message']; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='4'>No records found.</td></tr>";
            }
            ?>

        </table>
    </div>
</body>
</html>
