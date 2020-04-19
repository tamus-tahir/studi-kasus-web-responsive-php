<?php
require 'confiq.php';
function tambah($data)
{
    // disini kita tidak perlu menambahkan htmlspecialchar
    global $koneksi;
    $username           = $data["username"];
    $password           = $data["password"];
    $passwordConfirm    = $data["passwordConfirm"];
    $level              = $data["level"];

    // verifikasi username (username tidak boleh ada yang sama)
    // mengambil data berdasarkan username yang diinput
    $data = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    // jika usernamenya sama akan muncul pop up informasi
    if (mysqli_fetch_assoc($data)) {
        echo "<script>alert('username sudah digunakan');</script>";
        return false;
    }

    // verifikasi password ==> cek apakah pasword dan konfirmasi pasword sama
    if ($password != $passwordConfirm) {
        echo "<script>alert('pass dan konfirmasi pass tidak cocok');</script>";
        return false;
    }

    // encrypt password menggunakan algoritma hash
    // tidak dianjurkan menggunakan algoritma md5
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES ('', '$username', '$password', '$level')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
