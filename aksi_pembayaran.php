<?php
include 'koneksi.php';

$proses = isset($_GET['proses']) ? $_GET['proses'] : '';

if ($proses == 'tambah') {
    if (isset($_POST['simpan'])) {
        $id_pembayaran = $_POST['id_pembayaran'];
        $nim = $_POST['nim'];
        $jumlah_spp = $_POST['jumlah_spp'];
        $tgl_pembayaran = $_POST['tgl_pembayaran']; // Perbaikan: hapus tanda '$' sebelum 'tgl_pembayaran'
        $keterangan = $_POST['keterangan'];

        $q = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembayaran, nim, jumlah_spp, tgl_pembayaran, keterangan) VALUES ('$id_pembayaran', '$nim', '$jumlah_spp', '$tgl_pembayaran', '$keterangan')"); // Perbaikan: hapus tanda '$' sebelum 'tgl_pembayaran'

        if ($q) {
            header("Location: index.php?page=pembayaran");
        }
    }
} else if ($proses == 'hapus') {
    $id_pembayaran = isset($_GET['id']) ? $_GET['id'] : '';

    if (!empty($id_pembayaran)) {
        $data = mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'");

        if ($data) {
            header("Location: index.php?page=pembayaran&aksi=list");
        } else {
            echo mysqli_error($koneksi);
        }
    } else {
        echo "ID Pembayaran tidak valid.";
    }
} else if ($proses == 'update') {
    $id_pembayaran = $_POST['id_pembayaran']; // Perbaikan: hapus tanda '$' sebelum 'id_pembayaran'
    $nim = $_POST['nim'];
    $jumlah_spp = $_POST['jumlah_spp'];
    $tgl_pembayaran = $_POST['tgl_pembayaran'];
    $keterangan = $_POST['keterangan'];

    $edit = mysqli_query($koneksi, "UPDATE pembayaran SET nim = '$nim', jumlah_spp = '$jumlah_spp', tgl_pembayaran = '$tgl_pembayaran', keterangan = '$keterangan' WHERE id_pembayaran = '$id_pembayaran'"); // Perbaikan: hapus tanda '$' sebelum 'id_pembayaran'
    if ($edit) {
        header("Location: index.php?page=pembayaran&aksi=list");
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
