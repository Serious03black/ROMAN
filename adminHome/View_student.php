<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "user";
$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM user"; 
$result = mysqli_query($data, $sql);

if (!$result) {
    echo "Error executing query: " . mysqli_error($data);
} else {
    // echo "Query executed successfully.";
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
    <?php include "adminSidebar.php"; ?>

    <div class="content">
        <h1>Applied</h1>
        <table border="1px">
            <tr>
                <th style="padding: 20px; font-size: 15px;">id</th>
                <th style="padding: 20px; font-size: 15px;">name</th>
                <th style="padding: 20px; font-size: 15px;">Email</th>
                <th style="padding: 20px; font-size: 15px;">Phone</th>
                <th style="padding: 20px; font-size: 15px;">Password</th>
                <th style="padding: 20px; font-size: 15px;">delete</th>
                <th style="padding: 20px; font-size: 15px;">update</th>
            </tr>

            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($info = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td style="padding: 20px; font-size: 15px;"><a href=""><?php echo $info['id']; ?></a></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo $info['username']; ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo $info['email']; ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo $info['phone']; ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo $info['password']; ?></td>
                        <td style="padding: 20px; font-size: 15px;"><?php echo"<a onclick='return confirm(\"Are you sure you want to delete this student?\")' href='delete.php?student_id={$info['id']}'>Delete</a>" ?></td>
                        <td>
                        <a href="update_student.php?student_id=<?php echo $info['id']; ?>">Update</a>
                        </td>

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
