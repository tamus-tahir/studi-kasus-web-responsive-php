<?php
require 'confiq.php';
require 'upload.php';

function tambah($data)
{
    global $koneksi;
    $judul      = htmlspecialchars($data["judul"]);
    $isi        = htmlspecialchars($data["isi"]);

    // date('Y-m-d') ==> mencetak tanggal sekarang
    // urutannya tahun - bulan - tanggal karena sesuai dengan format database
    $tanggal    = date('Y-m-d');

    // membuat fungsi baru untuk menangani upload file
    $gambar     = upload();
    // kondisi jika gambar gagal diupload
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO berita VALUES ('', '$judul', '$isi', '$tanggal', '$gambar')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
