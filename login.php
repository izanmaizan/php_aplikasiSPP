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
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign in</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="User Name" name="user" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" value="">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" name="login" value="Login">
                            </fieldset>
                        </form>
                        <?php
                            include ('koneksi.php');
                            if(isset($_POST['login']))
                            {
                                $username = $_POST['user'];
                                $pass = $_POST['password'];
                                
                                $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username = '$username' AND password = '$pass'");

                                $cek = mysqli_num_rows($query);
                                $hasil = mysqli_fetch_array($query);

                                if ($cek == 1) {
                                    session_start();

                                    $_SESSION['username'] = $hasil['username'];
                                    $_SESSION['status'] = $hasil['status'];
                                    $_SESSION['nim'] = $hasil['nim'];
                                    header('location:index.php');
                                }
                                else
                                    echo "<script>
                                            alert('username dan Password Salah')
                                        </script>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

                                            <!-- jQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                                <!-- Bootstrap Core JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
                                <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.js"></script>
                                <!-- Custom Theme Javascript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
</body>

</html>