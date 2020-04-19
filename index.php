<?php
include_once('template-user/header-user.php');
require 'function/function-ambil-data.php';
$berita = query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 3");
?>

<section class="flex sambutan">
    <img src="img/sambutan.png" alt="image">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, repellat corporis rem rerum dicta
        commodi beatae accusantium, earum eligendi, labore molestias eos vel praesentium voluptates maxime odio
        quaerat? Exercitationem sint excepturi necessitatibus quas dolorem, a, fuga iste error quasi quae
        similique est magnam culpa porro delectus.</p>
</section>

<hr>

<h1 class="text-judul">BERITA</h1>

<div class="container">
    <div class="row box-center">
        <?php foreach ($berita as $b) : ?>
            <div class="margin-bottom col-box  ">
                <img class="margin-bottom" src="upload/<?= $b['gambar']; ?>" alt="" height="300" width="100%"><br>
                <h2><?= $b['judul']; ?></h2>
                <p><?= date('d-m-Y', strtotime($b['tanggal'])); ?></p>
                <p class="text-justify"><?= substr($b['isi'], 0, 400); ?> ......</p>
                <a href="detail.php?id=<?= $b['id_berita']; ?>" class="btn btn-primary margin-bottom" role="button">Lihat Selengkapnya</a>
            </div>
        <?php endforeach ?>
    </div>

    <div class="text-center">
        <a href="berita.php" class="btn btn-success margin-bottom" role="button">Semua Berita</a>
    </div>
</div>

<?php include_once('template-user/footer-user.php');  ?>