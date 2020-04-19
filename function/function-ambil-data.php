<?php

// setiap kali kita butuh koneksi ke databse kita akan memanggil file config
require 'confiq.php';

/* 
    kita membuat fungsi untuk mengambil data dengan nama query yang akan menerima parameter yang ditampung dalam $query
    parameter ini nantinya akan berupa perintah sql
*/

function query($query)
{
    /* 
        $koneksi merupakan variabel di luar function yaitu dari file config.php 
        kita harus jadikan global variabel agar dapat digunakan pada function
    */
    global $koneksi;
    // mysqli_query ==> function untuk mengirimkan perintah ke sql dengan 2 parameter yaitu koneksi ke databse dan perintahnya 
    $result    = mysqli_query($koneksi, $query);

    // membuat array kosong, array ini nantinya akan kita isi dengan data yang diperoleh dari database
    $row       = [];

    // mysqli_fetch_assoc ambil data dalam bentuk array asosiatif
    // setelah datanya diperoleh, data tersebut akan kita tambahkan ke dalam array kosong yang telah kita buat
    //  kita menggunakan while sebagai pengulangan karna kemungkinan datanya lebih dari 1
    while ($data = mysqli_fetch_assoc($result)) {
        $row[]     = $data;
    }

    // mengembalikan nilai
    return $row;
}
