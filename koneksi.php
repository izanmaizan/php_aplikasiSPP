<?php
$koneksi = mysqli_connect("localhost", "root", ""); // Gantilah "password" dengan kata sandi MySQL Anda yang aman

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

mysqli_select_db($koneksi, "db_spp");
?>
