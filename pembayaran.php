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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- HTML5 Shiv and Respond.js for IE Compatibility -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
</head>

<body>
    <?php
    session_start();
    $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
    $host = "localhost"; // Ganti dengan host database Anda
	$username = "root"; // Ganti dengan username database Anda
	$password = ""; // Ganti dengan password database Anda
	$database = "db_spp"; // Ganti dengan nama database Anda
	
	$koneksi = mysqli_connect($host, $username, $password, $database);
	
	if (!$koneksi) {
	    die("Koneksi ke database gagal: " . mysqli_connect_error());
	}


    switch ($aksi) {
        case 'entri':
    ?>
        <h1>Entri Data Pembayaran</h1>
        <form action="aksi_pembayaran.php?proses=tambah" method="POST">
            <table>
                <tr>
                    <td>ID Pembayaran</td>
                    <td><input type="text" class="form-control" name="id_pembayaran"></td>
                </tr>
                <tr>
                    <td>Nim</td>
                    <td>
                        <select name="nim" class="form-control">
                            <?php
                            include('koneksi.php');
                            $nmmahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                            while ($data = mysqli_fetch_array($nmmahasiswa)) {
                                echo "<option value=$data[nim]>$data[nama]</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah SPP</td>
                    <td><input class="form-control" name="jumlah_spp"></td>
                </tr>
                <tr>
                    <td>Tanggal Pembayaran</td>
                    <td><input class="form-control" type="date" name="tgl_pembayaran"></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td><input class="form-control" name="Keterangan"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-primary" name="simpan" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
    <?php
        break;
        case 'list':
    ?>
        <h1>Data Pembayaran</h1>
        <?php
        if ($_SESSION['status'] == 'Bendahara') {
        ?>
            <a href="?page=pembayaran&aksi=entri" class="btn btn-primary" width=30>
                <span class="glyphicon glyphicon-plus"></span>
                Tambah Data Pembayaran
            </a>
        <?php
        }
        ?>
        <table class="table table-bordered" id="dataTables-example" width="100%" border="1">
            <tr>
                <th>ID Pembayaran</th>
                <th>Nama Mahasiswa</th>
                <th>Jumlah SPP</th>
                <th>Tanggal Pembayaran</th>
                <th>Keterangan</th>
                <?php
                if ($_SESSION['status'] == 'Bendahara')
                    echo "<th>Aksi</th>";
                ?>
            </tr>
            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM pembayaran, mahasiswa WHERE mahasiswa.nim = pembayaran.nim");

			if (!$data) {
			    die("Query error: " . mysqli_error($koneksi));
			}
			
            while ($arr = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php echo $arr['id_pembayaran']; ?></td>
                    <td><?php echo $arr['nama']; ?></td>
                    <td><?php echo $arr['jumlah_spp']; ?></td>
                    <td><?php echo $arr['tgl_pembayaran']; ?></td>
                    <td><?php echo $arr['keterangan']; ?></td>
                    <?php
                    if ($_SESSION['status'] == 'Bendahara') {
                    ?>
                        <td>
                            <a href="aksi_pembayaran.php?proses=hapus&id=<?php echo $arr['id_pembayaran'] ?>" onclick="return confirm('Yakin Akan Menghapus ?')" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash">Hapus</span>
                            </a>
                            <a href="?page=pembayaran&aksi=edit&id=<?php echo $arr['id_pembayaran'] ?>" class="btn btn-warning">
                                <span class="glyphicon glyphicon-edit">
                                    Edit
                                </span>
                            </a>
                        </td>
                <?php }
                ?>
                </tr>
            <?php } ?>
        </table>
    <?php
        break;
        case 'edit':
    ?>
    </table>
    <h1>Form Edit Data Pembayaran</h1>
    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran='$_GET[id]'");
    $arr = mysqli_fetch_array($data);
    ?>
    <form action="aksi_pembayaran.php?proses=update" method="POST">
        <div class="form-group">
            <label>Id Pembayaran</label>
            <input class="form-control" value="<?php echo $arr['id_pembayaran']; ?>" name="id_pembayaran">
        </div>
        <div class="form-group">
            <label>Nim</label>
            <select name="nim" class="form-control">
                <?php
                include('koneksi.php');
                $nmmahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                while ($data = mysqli_fetch_array($nmmahasiswa)) {
                    echo "<option value=$data[nim]>$data[nama]</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah SPP</label>
            <input class="form-control" value="<?php echo $arr['jumlah_spp']; ?>" name="jumlah_spp">
        </div>
        <div class="form-group">
            <label>Tanggal Pembayaran</label>
            <input type="date" value="<?php echo $arr['tgl_pembayaran']; ?>" class="form-control" name="tgl_pembayaran">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input value="<?php echo $arr['Keterangan']; ?>" class="form-control" name="Keterangan">
        </div>
        <div class="form-group">
            <label></label>
            <td>
                <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
            </td>
        </div>
    </form>
<?php
        break;
    }
    ?>
</body>
</html>
