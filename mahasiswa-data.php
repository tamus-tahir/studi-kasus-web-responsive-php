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

// disini kita jalankan function query yang ada pada function-ambil-data.php, kemudian kita kirimkan parameter sql untuk mengambil data pada tabel mahasiswa. fungsi query ini akan mengembalikan nilai yang kita simpan pada variabel $mahasiswa
// ambil semua data pada tabel mahasiswa order berdasarkan id_mahasiswa dari dimulai dari urutan terbesar
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<h1 class="text-judul">Data Mahasiswa</h1>
 
<section class="container">

    <a href="mahasiswa-tambah.php" class="btn btn-primary margin-bottom" role="button">Tambah</a>

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
                    <th>Aksi</th>
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
                        <td><?= $m['gender']; ?></td>
                        <td><?= $m['alamat']; ?></td>
                        <td><?= $m['hobi']; ?></td>
                        <td class="text-center">
                            <a href="mahasiswa-ubah.php?id=<?= $m['id_mahasiswa']; ?>" class="btn btn-warning">Ubah</a>
                            <a href="mahasiswa-hapus.php?id=<?= $m['id_mahasiswa']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin ?');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>