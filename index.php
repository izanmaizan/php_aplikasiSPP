<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit; // Tambahkan ini untuk menghentikan eksekusi selanjutnya
}

// Cek apakah parameter "page" telah dikirimkan
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    
    // Periksa nilai "page" dan tentukan konten yang akan dimuat
    switch ($page) {
        case 'mahasiswa':
            include 'mahasiswa.php';
            break;
        case 'laporan_pembayaran':
            include 'report_pembayaran.php';
            break;
        case 'laporan_per_mahasiswa':
            include 'report_per_mahasiswa.php';
            break;
        case 'tagihan_spp':
            include 'tagihan_spp.php';
            break;
        default:
            // Halaman default atau pesan kesalahan jika diperlukan
            echo "Halaman yang diminta tidak ditemukan.";
            break;
    }
} else {
    // Halaman default yang akan dimuat saat tidak ada parameter "page"
    include 'default.php';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.css">
    <!-- metisMenu -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css">
    <!-- dataTables -->

    <!-- dataTables Responsive CSS  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
    <title>Pembayaran SPP</title>
</head>

<body>
    <div class="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-statis-top" role="navigation" style="margin-bottom: 0">
            <?php
            include 'header.php';
            ?>

            <div class="navbar-default sidebar" role="navigation">
                <?php
                include('menu.php');
                ?>

                <!-- /.sidebar-collapse  -->
            </div>

            <!-- /.navbar-static-side  -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php
                            include('main.php');
                            ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel  -->
                </div>
                <!-- /.col-lg-12  -->
            </div>
            <!-- /.row  -->
        </div>
        <!-- /#page-wrapper  -->
    </div>
    <!-- /#wrapper  -->

    <!-- jQuerry -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Bootstrap Core Javascript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

    <!-- DataTables Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <!-- Metis Menu Plugin Javascript  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable({
                responsive: true,
                "lenghtMenu": [5, 10, 25, 50]
            });
        });
    </script>
    <!-- Custom Theme Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
</body>

</html>