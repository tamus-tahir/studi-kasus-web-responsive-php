<?php
session_start();
require 'confiq.php';

if (isset($_POST["submit"])) {

    // ambil data dari form input
    $username   = $_POST["username"];
    $password     = $_POST["password"];

    // ambil data username berdasarkan username
    $user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // verifikasi username ==> apakah usernamenya ada
    if ($user) {
        // merubah data menjadi array assosiatif
        $data = mysqli_fetch_assoc($user);

        // verifikasi password ==> apakah passwornya benar
        if (password_verify($password, $data["password"])) {
            // memberikan session yang menandakan usernya telah login
            $_SESSION['level'] = $data["level"];

            echo "<script>alert('berhasil'); document.location.href = 'dashboard.php';</script>";
        }
    }

    // jika error
    $error = true;
    if (isset($error)) {
        echo "<script>alert('gagal'); document.location.href = 'login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studi Kasus</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .flex {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            width: 70%;
            margin: auto;
        }

        .text-login {
            text-align: center;
            text-transform: uppercase;
            color: white;
        }

        label {
            color: white;
        }

        body {
            background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)), url('img/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="flex">
        <div class="box">
            <h1 class="text-login">Halaman Login</h1>

            <form method="post" action="">
                <div class="margin-bottom">
                    <label for="username" required>Username </label>
                    <input type="text" id="username" name="username">
                </div>

                <div class="margin-bottom">
                    <label for="password" required>Password </label>
                    <input type="password" id="password" name="password">
                </div>

                <a href="index.php" class="btn btn-warning margin-right" role="button">Beranda</a>
                <button type="submit" name="submit" class="btn btn-primary" class="margin-bottom">Login</button>
            </form>
        </div>
    </div>
</body>

</html>