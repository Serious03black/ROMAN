
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="add_student.css">
    <title>Add student</title>
</head>
<body>

     <?php include "adminSidebar.php"; ?>
    <div >
        <center>
        <h2>Add Student</h2><br>
            <form action="add.php" method="POST">
                <label>Name</label>
                <input type="text"name="name">
                <label>Email</label>
                <input type="text"name="email">
                <label>Contact</label>
                <input type="text"name="phone">
                <label>password</label>
                <input type="text"name="password">
                <input type="submit"name="submit" value="submit">
            </form>
        </center>
    </div>
</body>
</html>
