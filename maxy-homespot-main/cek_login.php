<?php
    session_start();

    include 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($koneksi, "SELECT * FROM account WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($data);

    if ($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        
        header("location:index.php");
    } else {
        
        echo "<script>alert('username dan password salah');</script>";
        
    }
?>