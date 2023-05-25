<?php
include("../config.php");

if (isset($_POST['submit'])) {

    // ambil data dari form admin index
    $gambar = $_POST['gambar'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    // query

    $sql = "INSERT INTO articles (gambar, judul, konten) VALUE ('$gambar','$judul','$konten')";
    $query = mysqli_query($db, $sql);

    // kondisi apakah query disimpan?
    if ($query) {
        // alihkan ke halaman index.php dengan status sukes
        header('Location: ./AdminIndex.php');
    } else {
        // alihkan ke halaman admin dengan status gagal
        header('Location: /index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
