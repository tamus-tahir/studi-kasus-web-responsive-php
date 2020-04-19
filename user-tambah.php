<?php
session_start();
if ($_SESSION['level'] != 'Admin') {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
require 'function/function-user-tambah.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
					alert('Data Berhasil Ditambahkan');
					window.location.href = 'user-data.php';
			</script>";
    } else {
        echo "<script>
					alert('Data Gagal Ditambahkan');
			</script>";
    }
}
?>

<h1 class="text-judul">Tambah User</h1>

<section class="container">

    <form method="post" action="">

        <div class="margin-bottom">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="margin-bottom">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="margin-bottom">
            <label for="passwordConfirm">Konfirmasi Password</label>
            <input type="password" id="passwordConfirm" name="passwordConfirm" required>
        </div>

        <div class="margin-bottom">
            <label for="level">Level User</label>
            <select name="level" id="level" required>
                <option value="">-- Pilih level --</option>
                <option value="Admin">Admin</option>
                <option value="Operator">Operator</option>
            </select>
        </div>

        <a href="user-data.php" class="btn btn-warning margin-right" role="button">Batal</a>
        <button type="submit" name="submit" class="btn btn-primary" class="margin-bottom">Tambah</button>

    </form>

</section>

<?php include 'template-admin/footer-admin.php';  ?>