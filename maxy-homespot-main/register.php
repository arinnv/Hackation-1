<?php

require_once("config.php");

if(isset($_POST['register'])){

    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    
    $password = $_POST['password'];

    $sql = "INSERT INTO account (nama, username, password) 
            VALUES (:nama, :username, :password)";
    $stmt = $db->prepare($sql);

    $params = array(
        ":nama" => $nama,
        ":username" => $username,
        ":password" => $password
    );

    $saved = $stmt->execute($params);

    if($saved) header("Location: halaman_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Pesbuk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="modal modal-sheet position-static d-block  p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Daftar</h1>
                    <a href="index.php" class="btn-close" ><button type="button" hidden="hidden" ></button></a>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="" action="" method="post">
                        <div class="form-floating mb-3">
                            <input id="floatingInput" class="form-control rounded-3" type="text" name="nama" placeholder="Nama kamu" />
                            <label for="nama">Nama Lengkap</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control rounded-3" type="text" name="username" placeholder="Username" />
                            <label for="username">Username@mail</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control rounded-3" type="password" name="password" placeholder="Password" />
                            <label for="password">Password</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input name="" type="password" class="form-control rounded-3" id="" placeholder="Password">
                            <label for="floatingPassword">Konfirmasi Password</label>
                        </div>
                        <input type="submit" class="w-100 mb-2 btn btn-lg rounded-3" style="background-color: #02569f; color: white;" name="register" value="Daftar" />
                        
                        <center>
                            <small class="text-body-secondary">Sudah Punya Akun? <a href="halaman_login.php"><span style="color: orange;">Login</span></a></small>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>           
</body>
</html>