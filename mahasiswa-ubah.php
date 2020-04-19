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
require 'function/function-mahasiswa-ubah.php';

// mengambil data id dari url
$id_mahasiswa = $_GET['id'];
// [0] ditambahkan agar kita tidak perlu menambhkannya lagi di setiap data yang nantinya akan kita cetak pada form
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
					alert('Data Berhasil Diubah');
					window.location.href = 'mahasiswa-data.php';
			</script>";
    } else {
        echo "<script>
					alert('Data Gagal Diubah');
			</script>";
    }
}
?>

<h1 class="text-judul">Ubah Mahasiswa</h1>

<section class="container">

    <form action="" method="post">

        <div class="margin-bottom">
            <label for="nama" required>Nama</label>
            <input type="text" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>">
        </div>

        <div class="margin-bottom">
            <label for="gender">Jenis Kelamin</label>
            <!-- disini kita gunakan operator ternari -->
            <!-- kondisi ? true : false -->
            <input type="radio" name="gender" id="gender" value="Laki-Laki" required <?= $mahasiswa['gender'] == 'Laki-Laki' ? 'checked' : ''; ?>> Laki-Laki
            <input type="radio" name="gender" id="gender" value="Perempuan" <?= $mahasiswa['gender'] == 'Perempuan' ? 'checked' : ''; ?>> Perempuan
        </div>

        <div class="margin-bottom">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10" required><?= $mahasiswa['alamat']; ?></textarea>
        </div>

        <div class="margin-bottom">
            <label for="prodi">Prodi</label>
            <select name="prodi" id="prodi" required>
                <option value="">-- Pilih Prodi --</option>
                <option value="Teknik Informatika" <?= $mahasiswa['prodi'] == 'Teknik Informatika' ? 'selected' : ''; ?>>Teknik Informatika</option>
                <option value="Teknik Elektro" <?= $mahasiswa['prodi'] == 'Teknik Elektro' ? 'selected' : ''; ?>>Teknik Elektro</option>
                <option value="Teknik Mesin" <?= $mahasiswa['prodi'] == 'Teknik Mesin' ? 'selected' : ''; ?>>Teknik Mesin</option>
            </select>
        </div>

        <div class="margin-bottom">
            <!-- explode ==> string to array -->
            <!-- pada saat kita menambahkan data kita membuat datanya menjadi string, sekarang kita balikan prosesnya -->
            <!-- in array, mengecek ada tidaknya data dalam array -->
            <?php $hobi = explode(', ', $mahasiswa['hobi']); ?>
            <label for="hobi">Hobi</label>
            <input type="checkbox" name="hobi[]" id="hobi" value="Seni" <?= in_array('Seni', $hobi) ? 'checked' : null ?>>Seni
            <input type="checkbox" name="hobi[]" id="hobi" value="Olahraga" <?= in_array('Olahraga', $hobi) ? 'checked' : null ?>>Olahraga
            <input type="checkbox" name="hobi[]" id="hobi" value="Programing" <?= in_array('Programing', $hobi) ? 'checked' : null ?>>Programing
            <input type="checkbox" name="hobi[]" id="hobi" value="Pecinta Alam" <?= in_array('Pecinta Alam', $hobi) ? 'checked' : null ?>>Pecinta Alam
            <input type="checkbox" name="hobi[]" id="hobi" value="Jurnalistik" <?= in_array('Jurnalistik', $hobi) ? 'checked' : null ?>>Jurnalistik
        </div>

        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">

        <a href="mahasiswa-data.php" class="btn btn-warning margin-right" role="button">Batal</a>
        <button type="submit" name="submit" class="btn btn-primary" class="margin-bottom">Ubah</button>
    </form>

</section>

<?php include_once('template-admin/footer-admin.php');  ?>