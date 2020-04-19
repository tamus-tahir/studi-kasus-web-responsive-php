<?php
    // setiap kali kita butuh koneksi ke databse kita akan memanggil file config
	require 'confiq.php';

    // data dari form akan kita tampung dalam parameter $data
    // data ini akan berupa array assosiatif
    function tambah($data) 
    {   
        /* 
            $koneksi merupakan variabel di luar function yaitu dari file config.php 
            kita harus jadikan global variabel agar dapat digunakan pada function
        */
        global $koneksi;
        // htmlspecialchars == mencegah sql injection
        // $data["nama"] merupakan isi dari data pada form yang namenya nama
        // data dari form ini yang tadinya berupa array akan kita pisah dan tampung masisng-masing data pada variabel yang nantinya isi variabel ini akan dikirimkan ke database
        $nama   	= htmlspecialchars($data["nama"]);
        $gender   	= htmlspecialchars($data["gender"]);
        $alamat   	= htmlspecialchars($data["alamat"]);
        $prodi   	= htmlspecialchars($data["prodi"]);
        // implode ==> array to string 
        // implode(' tanda pemisah ', array yang ingin dijadikan string)
        $hobi   	= htmlspecialchars(implode(', ', $data["hobi"]));

        // membuat variabel query yang isix script sql untuk insert
        // script sql ditulis dengan huruf kapital
        // masukan pada tabel mahasiswa dengan nilai (sesui dengan urutan field pada database, id tidak diisi nilainya tetapi tetap dikirmkan dengan nilai kosong)
        $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$gender', '$alamat', '$prodi', '$hobi')";

        // mysqli_query ==> function untuk mengirimkan perintah ke sql dengan 2 parameter yaitu koneksi ke databse dan perintahnya 
        mysqli_query($koneksi, $query);

        // return ==> sebuah fungsi unytuk mengembalikan nilai
        // mysqli_affected_rows ==> fungsi yang akan bernilai 1 jika terjadi perubahan pada database baik tambah, ubah maupun hapus
        return mysqli_affected_rows($koneksi);
    }

