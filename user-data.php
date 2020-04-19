<?php
session_start();
if ($_SESSION['level'] != 'Admin') {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
require 'function/function-ambil-data.php';
$user = query("SELECT * FROM user ORDER BY id_user DESC");
?>

<h1 class="text-judul">Data User</h1>

<section class="container">

    <a href="user-tambah.php" class="btn btn-primary margin-bottom" role="button">Tambah</a>

    <div class="table-responsive">
        <table class="table table-bordered text-nowrap">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($user as $m) : ?>
                    <tr>
                        <td class="text-center"><?= $i; ?></td>
                        <td><?= $m['username']; ?></td>
                        <td class="text-center"><?= $m['level']; ?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-warning">Ubah</a>
                            <a href="#" class="btn btn-danger" onclick="return confirm('Anda Yakin ?');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>