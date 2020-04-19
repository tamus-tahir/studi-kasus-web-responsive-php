<?php
include_once('template-user/header-user.php');
require 'function/function-ambil-data.php';
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<h1 class="text-judul">Data Mahasiswa</h1>
 
<section class="container">

    <div class="table-responsive">
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Hobi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <!-- foreach ==> pengulangan array -->
                <?php foreach ($mahasiswa as $m) : ?>
                    <tr>
                        <td class="text-center"><?= $i; ?></td>
                        <td><?= $m['nama']; ?></td>
                        <td><?= $m['prodi']; ?></td>
                        <td class="text-center"><?= $m['gender']; ?></td>
                        <td><?= $m['alamat']; ?></td>
                        <td><?= $m['hobi']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</section>

<?php include_once('template-user/footer-user.php');  ?>