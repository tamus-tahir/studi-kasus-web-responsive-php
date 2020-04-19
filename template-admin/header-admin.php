<!DOCTYPE html>
<!-- dokumen ini dibuat dengan bahasa inggris -->
<html lang="en">

<head>
    <!-- 
        Universal Character Set, atau yang umum disebut sebagai Charset adalah kumpulan dari beberapa jenis pengkodean karakter baik huruf, angka, symbol, dll. Untuk untuk saat ini pengkodean UTF-8 telah menjadi standarisasi untuk pengkodean dalam system operasi, bahasa pemrograman, API, dan software.
        charset="utf-8" ==> menandakan standar pengkodean pada web ini
     -->
    <meta charset="utf-8">
    <!-- 
        digunakan untuk mendefiniskan dokumen HTML agar ditampilkan pada Internet Explorer versi berapa 
    -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 
        digunakan untuk mengontrol bagaimana dokumen HTML ditampilkan pada perangkat mobile (supaya responsive)
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- deskripsi web -->
    <meta name="description" content="Website untuk menampilkan data berita dan data mahasiswa">
    <!-- nama penulis -->
    <meta name="author" content="Tamus Tahir">
    <!-- judul -->
    <title>Studi Kasus</title>
    <!-- pemanggilan css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- favicon ==> icon di samping judul halaman pada browser -->
    <link href="img/sambutan.png" rel="Icon">
</head>

<body>

    <div class="topnav" id="myTopnav">
        <a href="dashboard.php">Dashboard</a>
        <?php if ($_SESSION['level'] == 'Admin') : ?>
            <a href="user-data.php">User</a>
        <?php endif ?>
        <a href="mahasiswa-data.php">Mahasiswa</a>
        <a href="berita-data.php">Berita</a>
        <a href="logout.php" onclick="return confirm('Anda Yakin Ingin Logout?');">logout</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <img src="img/menu.png" alt="" width="20">
        </a>
    </div>