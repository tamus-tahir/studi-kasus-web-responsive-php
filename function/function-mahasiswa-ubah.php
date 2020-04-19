<?php
require 'confiq.php';

function ubah($data)
{
    global $koneksi;
    $id_mahasiswa   = htmlspecialchars($data["id_mahasiswa"]);
    $nama           = htmlspecialchars($data["nama"]);
    $gender         = htmlspecialchars($data["gender"]);
    $alamat         = htmlspecialchars($data["alamat"]);
    $prodi          = htmlspecialchars($data["prodi"]);
    $hobi           = htmlspecialchars(implode(', ', $data["hobi"]));

    $query = "UPDATE mahasiswa SET
						nama      = '$nama',
						gender    = '$gender',
						alamat    = '$alamat',
						prodi     = '$prodi',
						hobi      = '$hobi'
						WHERE id_mahasiswa  = $id_mahasiswa
					";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
