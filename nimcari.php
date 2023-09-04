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
<div class="row d-flex justify-content-center">
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<div class="panel-heading">Cari Mahasiswa Berdasarkan Nim</div>
			<div class="panel-body border border-secondary rounded p-3">
				<fieldset>
					<form action="report_nim.php">
						<div class="form-group">
							<label for="">NIM</label>
							<select name="nim" id="nim" class="form-control">
								<option value="">Please Select</option>
								<?php 
									include 'koneksi.php';

									$nim = mysqli_query($koneksi, "SELECT * FROM pembayaran ORDER BY nim");

									while ($data = mysqli_fetch_array($nim)) {
										echo "<option value=$data[nim]>$data[nim]</option>";
									}
								?>
							</select>
						</div>
					<div class="form-group">
						<label for=""> </label>
						<label for=""> </label>
						<label for="">
							<input type="submit" value="CETAK" name="cetak" class="btn btn-primary" style="margin-top: 15px;">
						</label>
					</div>
					</form>
				</fieldset>
			</div>
		</div>
	</div>

                                            <!-- jQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js"></script>
	<script>
   		$("#prodi").chained("#jur");
	</script>
</div>
</body>
</html>