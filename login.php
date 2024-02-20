<?php
session_start();

if( isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
require 'config/config.php';

if ( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]) ) {

            //set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;

            header("location: app/index.php?pesan=login");
            exit;
        }
    }

    $error = true;
}

if( isset($error)){
  echo "<script> alert('Username / password anda salah!'); </script>";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password">
        </p>
        <p>
            <button type="submit" name="login">Login</button>
        </p>
        <p>
            <a href="daftar.php">Daftar</a>
        </p>
    </form>
</body>
</html>