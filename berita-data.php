<?php
session_start();
if (!$_SESSION) {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
require 'function/function-ambil-data.php';
$berita = query("SELECT * FROM berita ORDER BY id_berita DESC");
?>

<h1 class="text-judul">Data Berita</h1>

<section class="container">

    <a href="berita-tambah.php" class="btn btn-primary margin-bottom" role="button">Tambah</a>

    <div class="table-responsive">
        <table class="table table-bordered text-nowrap">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($berita as $b) : ?>
                    <tr>
                        <td class="text-center"><?= $i; ?></td>
                        <td class="text-center"><?= date('d-m-Y', strtotime($b['tanggal'])); ?></td>
                        <td><?= $b['judul']; ?></td>
                        <td class="text-center">
                            <a href="berita-ubah.php?id=<?= $b['id_berita']; ?>" class="btn btn-warning">Ubah</a>
                            <a href="berita-detail.php?id=<?= $b['id_berita']; ?>" class="btn btn-success">Detail</a>
                            <a href="berita-hapus.php?id=<?= $b['id_berita']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin ?');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>