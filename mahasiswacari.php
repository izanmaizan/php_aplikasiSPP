<?php
    session_start();
?>

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

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Laporan Perbulan</div>
            <div class="panel-body">
                <fieldset>
                    <form action="laporan/report_mahasiswa.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bulan</label>
                            <select name="bulan" id="" class="form-control">
                                <option value="01">
                                    Januari
                                </option>
                                <option value="02">
                                    Februari
                                </option>
                                <option value="03">
                                    Maret
                                </option>
                                <option value="04">
                                    April
                                </option>
                                <option value="05">
                                    Mei
                                </option>
                                <option value="06">
                                    Juni
                                </option>
                                <option value="07">
                                    Juli
                                </option>
                                <option value="08">
                                    Agustus
                                </option>
                                <option value="09">
                                    September
                                </option>
                                <option value="10">
                                    Oktober
                                </option>
                                <option value="11">
                                    November
                                </option>
                                <option value="12">
                                    Desember
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <label></label>
                            <label>
                                <input type="submit" name="cetak" value="CETAK" class="btn btn-primary">
                            </label>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>

                               <!-- jQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js"></script>
    <script>
        $("#bulan").chained("#bulan");
    </script>


</body>
</html>