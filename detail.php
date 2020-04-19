<?php
include_once('template-user/header-user.php');
require 'function/function-ambil-data.php';
$id_berita = $_GET['id'];
$berita = query("SELECT * FROM berita WHERE id_berita = $id_berita")[0];
?>

<section class="container">

    <h2 class="text-judul"><?= $berita['judul']; ?></h2>

    <p><?= date('d-m-Y', strtotime($berita['tanggal'])); ?></p>

    <img class="margin-bottom" src="upload/<?= $berita['gambar']; ?>" alt="" height="500" width="100%"><br>

    <p class="text-justify"><?= $berita['isi']; ?></p>

    <a href="berita.php" class="btn btn-warning margin-right" role="button">Kembali</a>


</section>

<?php include_once('template-user/footer-user.php');  ?>