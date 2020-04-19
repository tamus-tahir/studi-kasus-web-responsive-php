<?php
function upload()
{
    $name         = $_FILES['gambar']['name'];
    $size         = $_FILES['gambar']['size'];
    $error        = $_FILES['gambar']['error'];
    $tmp_name     = $_FILES['gambar']['tmp_name'];

    if ($error != 0) {
        echo "<script>alert('file gagal diupload')</script>";
        return false;
    }

    // verifikasi tipe file yang diizinkan
    $type_file         = ['png', 'jpg', 'jpeg'];
    // merubah nama file menjadi arrray karena kita ingin mendapatkan tipe file
    $type_name         = explode('.', $name);
    // strtolower ==> merubah text menjadi huruf kecil
    // hal ini karena ada tipe file yang menggunakan huruf kapital
    // end menyeleksi data terakhir dari array
    // hal ini dilakukan untuk mendapatkan tipe file
    $type_name         = strtolower(end($type_name));

    // mengeceak tipe file apakah diizinkan atau tidak
    if (!in_array($type_name, $type_file)) {
        echo "<script>alert('tipe file tidak di izinkan')</script>";
        return false;
    }

    // verifikasi size file satuan dalam byte
    // 2000000 == 2mb
    if ($size > 2000000) {
        echo "<script>alert('file tidak boleh lebih dari 2mb')</script>";
        return false;
    }

    // nama file baru untuk mencegah jika terjadi nama file yang sama
    $new_name = time() . '.' . $type_name;

    // memindahkan dari tempat penyimpanan sementara yaitu tmp_name ke folder yang kita buat
    move_uploaded_file($tmp_name, 'upload/' . $new_name);

    return $new_name;
}
