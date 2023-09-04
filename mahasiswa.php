<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran SPP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
</head>

<body>

<?php
    $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
    $koneksi = mysqli_connect("localhost", "root", "", "db_spp"); // Gantilah nilai sesuai dengan database Anda.

    switch ($aksi) {
        case 'entri':
?>

<h1>Entri Data Mahasiswa</h1>
<table>
<form action="aksi_mahasiswa.php?proses=tambah" method="POST">
    <div class="form-group">
        <label>Nim</label>
        <input class="form-control" name="nim">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input class="form-control" name="username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" name="password">
    </div>
    <div class="form-group">
        <label>Nama Mahasiswa</label>
        <input class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jk" id="" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label>Nama Bapak</label>
        <input class="form-control" name="nama_bapak">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input class="form-control" name="alamat">
    </div>
    <div class="form-group">
        <label>Umur</label>
        <input class="form-control" name="umur">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="status" id="" class="form-control">
            <option value="Bendahara">Bendahara</option>
            <option value="Mahasiswa">Mahasiswa</option>
        </select>
    </div>
    <tr>
        <td></td>
        <td><input type="submit" class="btn btn-primary" value="Simpan" name="simpan"></td>
    </tr>
</form>
</table>
<?php
    break;
    case 'list':
?>

<h1>Data Mahasiswa</h1>
<?php
    if ($_SESSION['status'] == 'Bendahara') {
?>
<a href="?page=mahasiswa&aksi=entri" class="btn btn-primary" width=30>
    <span class="glyphicon glyphicon-plus">
    Tambah Data Mahasiswa
    </span>
</a>
<?php } ?>

<table class="table table-bordered" id="dataTables-example" border="1" width="100%">
    <tr>
        <th>Nim</th>
        <th>Nama Mahasiswa</th>
        <th>Jenis Kelamin</th>
        <th>Nama Bapak</th>
        <th>Alamat</th>
        <th>Umur</th>
        <?php
        if ($_SESSION['status'] == 'Bendahara')
            echo "<th>Aksi</th>";
        ?>
    </tr>
    <?php
    $nim = $_SESSION['nim'];
    if ($_SESSION['status'] == 'Bendahara') {
        $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
    } else {
        $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = $nim");
    }
    while ($arr = mysqli_fetch_array($data)) {
    ?>

    <tr>
        <td><?php echo $arr['nim'] ?></td>
        <td><?php echo $arr['nama'] ?></td>
        <td><?php echo $arr['jk'] ?></td>
        <td><?php echo $arr['nama_bapak'] ?></td>
        <td><?php echo $arr['alamat'] ?></td>
        <td><?php echo $arr['umur'] ?></td>

        <?php
        if ($_SESSION['status'] == 'Bendahara') {
        ?>

        <td>
            <a href="aksi_mahasiswa.php?proses=hapus&id=<?php echo $arr['nim']?>" onclick="return confirm('Yakin Akan Menghapus ?')" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash">Hapus</span>
            </a>
            <a href="?aksi=edit&id=<?php echo $arr['nim']?>" class="btn btn-warning">
                <span class="glyphicon glyphicon-edit">
                    Edit
                </span>
            </a>
        </td>
    <?php } ?>
    </tr>
<?php 
}
?>

<?php 
    break;
    case 'edit' :
?>
</table>
<h1>Form Edit Data Mahasiswa</h1>
<?php 
    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$_GET[id]'");
    $arr = mysqli_fetch_array($data);
?>

    <table>
<form action="aksi_mahasiswa.php?proses=update" method="POST">
        <tr>
            <td>Nim</td>
            <td>
                <input type="text" value="<?php echo $arr['nim']; ?>" name="nim">
            </td>
            <tr>
                <td>Nama Mahasiswa</td>
                <td>
                    <input type="text" value="<?php echo $arr['nama']; ?>" name="nama">
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jk">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Bapak</td>
                <td>
                    <input type="text" value="<?php echo $arr['nama_bapak']; ?>" name="nama_bapak">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <input type="text" value="<?php echo $arr['alamat']; ?>" name="alamat">
                </td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>
                    <input type="text" value="<?php echo $arr['umur']; ?>" name="umur">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
                </td>
            </tr>
        </tr>
</form>
    </table>
<?php 
    break;
}
?>
</body>
</html>
