<?php
session_start();
if (!$_SESSION) {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
require 'function/function-berita-tambah.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
					alert('Data Berhasil Ditambahkan');
					window.location.href = 'berita-data.php';
			</script>";
    } else {
        echo "<script>
					alert('Data Gagal Ditambahkan');
			</script>";
    }
}
?>

<h1 class="text-judul">Tambah Berita</h1>

<section class="container">

    <form action="" method="post" enctype="multipart/form-data">

        <div class="margin-bottom">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" required>
        </div>

        <div class="margin-bottom">
            <label for="isi">Isi</label>
            <textarea name="isi" id="isi" cols="30" rows="10" required></textarea>
        </div>

        <div>
            <label for="gambar" class="margin-bottom d-block">Gambar (size max 2mb)</label>
            <input type="file" id="gambar" name="gambar" required class="margin-bottom d-block">
        </div>

        <a href="berita-data.php" class="btn btn-warning margin-right" role="button">Batal</a>
        <button type="submit" name="submit" class="btn btn-primary" class="margin-bottom">Tambah</button>
    </form>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>