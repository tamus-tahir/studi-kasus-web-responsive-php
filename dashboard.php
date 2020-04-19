<?php
session_start();
// cek ada tidak sessionnya
// session hanya di dapat ketika user melakukan login
if (!$_SESSION) {
    echo "<script>
            alert('Anda Tidak Memiliki Akses'); 
            document.location.href = 'login.php';
        </script>";
}

include_once('template-admin/header-admin.php');
?>

<h1 class="text-judul">Halaman Dashboard</h1>

<section class="flex sambutan">
    <img src="img/sambutan.png" alt="image">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, repellat corporis rem rerum dicta
        commodi beatae accusantium, earum eligendi, labore molestias eos vel praesentium voluptates maxime odio
        quaerat? Exercitationem sint excepturi necessitatibus quas dolorem, a, fuga iste error quasi quae
        similique est magnam culpa porro delectus.</p>
</section>

<?php include_once('template-admin/footer-admin.php');  ?>