<?php
include_once('template-user/header-user.php');
require 'function/function-ambil-data.php';
$berita = query("SELECT * FROM berita ORDER BY id_berita DESC");
?>

<h1 class="text-judul">BERITA</h1>

<div class="container">
    <div class="row box-center">
        <?php foreach ($berita as $b) : ?>
            <div class="margin-bottom col-box">
                <img class="margin-bottom" src="upload/<?= $b['gambar']; ?>" alt="" height="300" width="100%"><br>
                <h2><?= $b['judul']; ?></h2>
                <p><?= date('d-m-Y', strtotime($b['tanggal'])); ?></p>
                <p class="text-justify"><?= substr($b['isi'], 0, 400); ?> ......</p>
                <a href="detail.php?id=<?= $b['id_berita']; ?>" class="btn btn-primary margin-bottom" role="button">Lihat Selengkapnya</a>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php include_once('template-user/footer-user.php');  ?>