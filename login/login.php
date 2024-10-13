<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <center>
        <div class="title_deg">
            <label>Login</label>
        </div>
       <form action="login_check.php" method="POST" class="login_form">
    <div class="form_deg">
       
    </div>
    <div class="form_deg">
        <label class="lable_deg">Usertype</label>
        <input type="text" name="usertype" required>
    </div>
    <div class="form_deg">
        <label class="lable_deg">Username</label>
        <input type="text" name="username" required>
    </div>
    <div class="form_deg">
        <label class="lable_deg">Password</label>
        <input type="password" name="password" required>
    </div>
    <div class="form_deg">
        <input type="submit" value="Login">
    </div>
</form>

    </center>
</body>
</html>
