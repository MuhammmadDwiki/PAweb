<?php
session_start();
require 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header('Location: index.php');
            exit;
        }
    }
    
    else if($username == "admin" && $password == "admin"){
        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;
        header("Location: formadmin.php");
        exit;
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="regis.css">
</head>

<body>
    <div class="container">
    <div class="login">
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'> Username/Password Salah! </p>";
    } else {
        echo "<p style='color: red; display:none;'> Username/Password Salah! </p>";
    }
    ?>
    <form action="" method="post">
        <h1>Login</h1>
        <hr>
        <p>Top-game terpercaya</p>
        <label for="">Username : </label>
        <input type="text" name="username" id=""> 
        <label for="">Password : </label>
        <input type="password" name="password" id=""> 
        <button type="submit" name="login">Login</button>
        <P> 
            <p1>Don't have an account?</p1>
            <a href="regis.php">Sign-Up</a>
        </P>
    </form>
    </div>
    <div class="right">
        <p>Play Point Store</p>
        <img src="img/gambar login.jpeg" alt="Top-up Game">
       

    </div>
    </div>
</body>

</html>