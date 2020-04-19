<?php
session_start();
if (!$_SESSION) {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

require 'confiq.php';

function hapus($id_berita)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM berita WHERE id_berita = $id_berita");
    return mysqli_affected_rows($koneksi);
}

if (isset($_GET["id"])) {

    $id_berita = $_GET["id"];
    if (hapus($id_berita) > 0) {
        echo "<script>
                alert('Data berhasil dihapus');
                document.location.href = 'berita-data.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal dihapus');
                document.location.href = 'berita-data.php';
            </script>";
    }
}
