<?php 
session_start();

if( isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'config/config.php';

if( isset($_POST['daftar'])){
    if(register($_POST) > 0){
        echo "<script>
        alert('anda berhasil mendaftar');
        document.location.href = 'login.php';
        </script>";
    }else{
       echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
</head>
<body>
    <h1>Daftar</h1>
    <form action="" method="post">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="text" name="password">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email">
        </p>
        <p>
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap">
        </p>
        <p>
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat">
        </p>
        <p>
            <button type="submit" name="daftar">Daftar</button>
        </p>
    </form>
</body>
</html>