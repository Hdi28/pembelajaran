<?php

$conn = mysqli_connect("localhost","root","","gallery");


function register($data){
    global $conn;

    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $nama_lengkap = $data['nama_lengkap'];
    $alamat = $data['alamat'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    //seleksi
    if(mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah digunakan')</script>";
        return false;
    }

    //password hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email','$nama_lengkap','$alamat')");
    return mysqli_affected_rows($conn);
    
}

?>