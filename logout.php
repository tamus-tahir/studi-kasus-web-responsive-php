<?php
session_start();

// berfungsi untuk mengakhiri session
session_unset();

// berfungsi untuk menghapus session
session_destroy();

echo "<script>
            alert('logout Berhasil'); 
            document.location.href = 'login.php';
    </script>";
