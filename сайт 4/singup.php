<?php
session_start();

include('db_connect.php');
$msg = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_re_password = $_POST['user_re_password'];

    if (!empty($user_name) && !empty($user_email) && !empty($user_password) && !is_numeric($user_name)) {
        if ($user_password === $user_re_password) {
            $query = "insert into user (user, email, password) VALUES ('$user_name', '$user_email', '$user_password')";
            mysqli_query($con, $query);
            header("Location: index.php");
        } else {
            $msg = "Password Not Match";
        }
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
    <title>Music Website Sing Up</title>
</head>
<body>
    <header>
        <div class="left_bx1">
            <div class="content">
                <form method="post">
                    <h3>Sing Up</h3>
                    <div class="card">
                        <label for="name">Name</label>
                        <input type="text" name="user_name" placeholder="Enter Your Username..." required>
                    </div>
                    
                    <div class="card">
                        <label for="email">Email</label>
                        <input type="email" name="user_email" placeholder="Enter Your Email..." required>
                    </div>


                    <div class="card">
                        <label for="password">Password</label>
                        <input type="password" name="user_password" placeholder="Enter Your Password..." required>
                    </div>

                    <div class="card">
                        <label for="re-password">Re-Password</label>
                        <input type="password" name="user_re_password" placeholder="Enter Your Re-Password..." required>
                    </div> 

                    <input type="submit" value="Sing Up" class="submit">
                    <div class="check">
                        <input type="checkbox" name="" id=""><span>Remember Me</span>
                    </div>
                    <p>You have a account? <a href="index.php">Login</a></p>
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