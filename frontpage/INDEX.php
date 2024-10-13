<?php 
error_reporting(0);
session_start();

if ($_SESSION['message']) {
    $messageType = $_SESSION['message'];
    echo "<script type='text/javascript'>
            alert('Application sent successfully');
          </script>";
    session_destroy();  // Destroy session after message is displayed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav>
        <label class="logo">HOME</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="//localhost/ROMAN/login/login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <div class="section1">
        <label class="img_txt">WE TECH WELL</label>
        <img src="city-committed-education-collage-concept.jpg" class="main_img" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
               <img class="welcome_img" src="32935.jpg" alt="">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cum accusamus...</p>
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>

    <center><h1>OUR Teacher</h1></center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="3649732.jpg" alt="">
                <p>Lorem ipsum dolor sit...</p>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="6500398.jpg" alt="">
                <p>Lorem ipsum dolor sit...</p>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="2011.i039.004..big data science analysis isometric set.jpg" alt="">
                <p>Lorem ipsum dolor sit...</p>
            </div>
        </div>
    </div>

    <center>
        <h2>Admission Form</h2>
        <div class="admission_form" align="center">
            <form action="check.php" method="POST">
                <div>
                    <label class="label_text">Name</label>
                    <input class="input_des" type="text" name="name" required>
                </div><br>

                <div>
                    <label class="label_text">Email</label>
                    <input class="input_des" type="email" name="email" required>
                </div><br>

                <div>
                    <label class="label_text">Phone</label>
                    <input class="input_des" type="text" name="phone" required>
                </div><br>

                <div>
                    <label class="label_text">Message</label>
                    <textarea class="input_des" name="message" required></textarea>
                </div><br>

                <div>
                    <input type="submit" name="apply" class="btn btn-primary">
                </div>
            </form>
        </div>
    </center>

</body>
</html>
