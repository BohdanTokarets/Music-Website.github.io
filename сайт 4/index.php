<?php

session_start();

include('db_connect.php');
$msg = false; 
if (isset($_POST['user_name'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $query = "SELECT * FROM user WHERE user = '".$user_name."' AND password = '".$user_password."' LIMIT 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        header("Location: welcome.php");
    } else {
        $msg = "Incorrect Password";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Music Website Login</title>
</head>
<body>
    <header>
        <div class="left_bx1">
            <div class="content">
                <form method="post">
                    <h3>Login</h3>
                    <div class="card">
                        <label for="name">Name</label>
                        <input type="text" name="user_name" placeholder="Enter Your Username..." required>
                    </div>

                    <div class="card">
                        <label for="password">Password</label>
                        <input type="password" name="user_password" placeholder="Enter Your Password..." required>
                    </div>
                    <input type="submit" value="Login" class="submit">
                    <div class="check">
                        <input type="checkbox" name="" id=""><span>Remember Me</span>
                    </div>
                    <p>Don't have a account yet? <a href="singup.php">Sing Up</a></p>
                </form>
            </div>
        </div>
        <div class="right_bx1">
            <img src="login_png.jpg" alt="">
            <!-- <h3>Inccorect Password</h3> -->
            <?php
            echo ('<h3>'.$msg.'</h3>');
            ?>
        </div>
    </header>
</body>
</html>