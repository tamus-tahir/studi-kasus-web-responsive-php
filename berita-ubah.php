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
require 'function/function-berita-ubah.php';

$id_berita = $_GET['id'];
$berita = query("SELECT * FROM berita WHERE id_berita = $id_berita")[0];


if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
					alert('Data Berhasil Diubah');
					window.location.href = 'berita-data.php';
			</script>";
    } else {
        echo "<script>
					alert('Data Gagal Diubah');
			</script>";
    }
}
?>

<h1 class="text-judul">Ubah Berita</h1>

<section class="container">

    <form action="" method="post" enctype="multipart/form-data">

        <div class="margin-bottom">
            <label for="judul">Judul :</label>
            <input type="text" id="judul" name="judul" required value="<?= $berita['judul']; ?>">
        </div>

        <div class="margin-bottom">
            <label for="isi">Isi :</label>
            <textarea name="isi" id="isi" cols="30" rows="10" required><?= $berita['isi']; ?></textarea>
        </div>

        <div>
            <!-- menampilkan ke user gambar lama -->
            <label for="gambar" class="margin-bottom d-block">Gambar Lama</label>
            <img src="upload/<?= $berita['gambar']; ?>" alt="" height="300" class="margin-bottom d-block">
        </div>


        <div>
            <label for="gambar" class="margin-bottom d-block">Upload gambar baru jika ingin mengganti (size max 2mb)</label>
            <input type="file" id="gambar" name="gambar" class="margin-bottom d-block">
        </div>

        <input type="hidden" name="id_berita" value="<?= $berita['id_berita']; ?>">
        <input type="hidden" name="tanggal" value="<?= $berita['tanggal']; ?>">

        <!-- 
            disini kita membutuhkan data dari gambar lama karena jika user tidak menupload gambar data ini yang akan kita masukan ke database 
        -->
        <input type="hidden" name="gambar_lama" value="<?= $berita['gambar']; ?>">

        <a href="berita-data.php" class="btn btn-warning margin-right" role="button">Batal</a>
        <button type="submit" name="submit" class="btn btn-primary" class="margin-bottom">Ubah</button>
    </form>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>