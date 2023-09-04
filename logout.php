<?php
    session_start();
    
    // Periksa apakah pengguna sudah login sebelum melakukan logout
    if(isset($_SESSION['username'])) {
        session_destroy(); // Menghapus semua sesi yang ada di server
        header('location: login.php');
    } else {
        // Pengguna belum login, mungkin tidak perlu logout.
        // Anda bisa mengarahkan mereka ke halaman lain atau memberikan pesan.
        header('location: index.php'); // Contoh pengalihan ke halaman lain jika belum login.
    }
?>
