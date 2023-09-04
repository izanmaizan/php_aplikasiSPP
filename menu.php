<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <!-- Bootstrap core css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <!-- metisMenu -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.css">

    <!-- Custom CSS  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
</head>

<body>
<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            <!-- /input-group -->
        </li>
        <li>
            <a href="index.php">
                <i class="fa fa-dashboard fa-fw"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="index.php?page=mahasiswa">
                <i class="fa fa-child fa-fw"></i>
                Data Mahasiswa
            </a>
        </li>

        <?php
            if ($_SESSION['status'] == 'Bendahara') {
        ?>

        <li>
            <a href="?page=pembayaran">
                <i class="fa fa-book fa-fw"></i>
                Pembayaran
            </a>
        </li>

        <?php
            }
        ?>

        <li>
        	<a href="index.php?page=laporan_pembayaran">
    	<i class="fa fa-edit fa-fw"></i>
    	Cetak Laporan Pembayaran
		</a>
        </li>

        <?php
            if ($_SESSION['status'] == 'Bendahara') {
        ?>

        <li>
        	<a href="index.php?page=laporan_per_mahasiswa">
    <i class="fa fa-edit fa-fw"></i>
    Cetak Laporan Pembayaran Per-Mahasiswa
</a>
        </li>

        <?php
            }
        ?>

        <?php
            if ($_SESSION['status'] == 'Bendahara') {
        ?>
        <li>
        	<a href="index.php?page=tagihan_spp">
    <i class="fa fa-book fa-fw"></i>
    Tagihan SPP
</a>

        </li>

        <?php
            }
        ?>

        <li>
        	<a href="logout.php">
    <i class="fa fa-edit fa-fw"></i>
    Logout
</a>

        </li>
    </ul>
    <!-- /.nav-second-level -->
</div>
</body>
</html>