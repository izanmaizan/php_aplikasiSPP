<?php
include 'koneksi.php';

$proses = isset($_GET['proses']) ? $_GET['proses'] : '';

if ($proses == 'tambah') {
    // Kode untuk penambahan data
} elseif ($proses == 'hapus') {
    // Kode untuk penghapusan data
} elseif ($proses == 'update') {
    // Kode untuk pembaruan data
} else {
    // Handle kasus jika 'proses' tidak diatur atau tidak valid
    echo "Proses tidak valid atau tidak diatur.";
}

if ($proses == 'tambah') {
    if (isset($_POST['simpan'])) {
        $nim = $_POST['nim'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $nama_bapak = $_POST['nama_bapak'];
        $alamat = $_POST['alamat'];
        $umur = $_POST['umur'];
        $status = $_POST['status'];

        $q = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, username, password, nama, jk, nama_bapak, alamat, umur, status) VALUES('$nim', '$username', '$password', '$nama', '$jk', '$nama_bapak', '$alamat', '$umur', '$status')");


        if ($q) {
            header("location:index.php?page=mahasiswa");
        }
    }
} else if ($proses == 'hapus') {
    $nim = $_GET['id'];
    $data = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'");

    if ($data) {
        header("location:index.php?page=mahasiswa&aksi=list");
    } else {
        echo mysqli_error($koneksi);
    }
} else if ($proses == 'update') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $nama_bapak = $_POST['nama_bapak'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];

    $edit = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', jk='$jk', nama_bapak='$nama_bapak', alamat='$alamat', umur='$umur' WHERE nim='$nim'");

    if ($edit) {
        header("location:index.php?page=mahasiswa&aksi=list");
    } else
        echo mysqli_error($koneksi);
}
?>