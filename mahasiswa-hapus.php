<?php
session_start();
if (!$_SESSION) {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

require 'confiq.php';

function hapus($id_mahasiswa)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa");
    return mysqli_affected_rows($koneksi);
}

if (isset($_GET["id"])) {

    $id_mahasiswa = $_GET["id"];
    if (hapus($id_mahasiswa) > 0) {
        echo "<script>
                alert('Data berhasil dihapus');
                document.location.href = 'mahasiswa-data.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal dihapus');
                document.location.href = 'mahasiswa-data.php';
            </script>";
    }
}
