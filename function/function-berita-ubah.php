<?php
require 'confiq.php';
require 'upload.php';

function ubah($data)
{
    global $koneksi;
    $id_berita      = $data["id_berita"];
    $tanggal        = $data["tanggal"];
    $judul          = htmlspecialchars($data["judul"]);
    $isi            = htmlspecialchars($data["isi"]);

    // jika user tidak mengupload gambar maka gambar lama yang akan dipakai
    // $_FILES['gambar']['error'] == 4 ==> tidak ada file diupload
    // jika user upload gambar, jalankan fungsi upload
    if ($_FILES['gambar']['error'] == 4) {
        $gambar = $data["gambar_lama"];
    } else {
        $gambar = upload();
        // menghapus gambar lama
        if ($gambar) {
            unlink('./upload/' . $data["gambar_lama"]);
        }
    }

    $query = "UPDATE berita SET
                judul     = '$judul',
                isi    	  = '$isi',
                gambar    = '$gambar',
                tanggal    = '$tanggal'
                WHERE id_berita  = $id_berita
            ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
