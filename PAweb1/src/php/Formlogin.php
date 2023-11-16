<?php
session_start();
require "../include/db_connect.php";

if(isset($_POST["login"])) {
    $username = strtolower($_POST["username"]);
    $pass = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username' ");
    if ($result) {
        if (mysqli_num_rows($result) >= 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['password'])) {
                $_SESSION['logged'] = true;
                $_SESSION['id'] = $row['id_akun'];
                $_SESSION['username'] = $row['username'];
                header("Location:index.php");
                exit;
            } else {
                echo "Gagal login failed";   
            }
        }
        else if ($username == "admin" && $pass == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['logged'] = true;
            header("Location:dasbboardAdmin.php");
            exit;
        }
        $error = true; 
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/stylelog.css">
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="" method="post">
        <a href="../php/index.php" class="back-to-menu">Back To Menu</a>
        <div class="user-box">
            <input type="text" name="username" id="username" autocomplete="off" required>
            <label for="username">Username</label>
        </div>

        <div class="user-box">
            <input type="password" name="password" id="password" autocomplete="off" required>
            <label for="password">Password</label>
        </div>

        <div class="field">
            <input type="submit" class="btn" name="login" value="Login" required>
            
        </div>
        </form>
        <div class="links">
            Don't have an account? <a href="../php/register.php">Sign Up Now</a>
        </div>
    </div>
</body>
</html>
