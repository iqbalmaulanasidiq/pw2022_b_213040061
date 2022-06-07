<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN LOGIN</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content ">
                <div class="login-logo" style="color: white ;">
                    <h1>ADMIN REGISTER</h1>
                </div>
                <div class="login-form rounded">
                    <form name="form1" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Isi Dengan Kode Admin">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label>Gambar</label>
                                <input type="file" name="gambar" class="form-control" >
                            </div>

                                
                                <button type="submit" name="daftar" class="btn btn-success btn-flat m-b-30 m-t-30 mb-3 rounded">Sign Up</button>
                                <div class="btn ">
                                <a href="login.php"  class="text-primary ">Sudah Punya akun? Ya Login</a>
                                </div>
                               
                                <!-- <div class="alert alert-danger" id="gagal" style="margin-top:10px; display:none">
                                  <strong>Username Atau Password Salah!</strong>
                                </div>
                                <div class="alert alert-danger" id="kosong" style="margin-top:10px; display:none">
                                  <strong>Username Atau Password Tidak Boleh Kosong!</strong>
                                </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>

<?php 
require "../connection.php";
if(isset($_POST['daftar'])){
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    if($_FILES['gambar']['error'] === 4){
        $gambar = "nophoto.png";
    }else{
        if(!$gambar){
            return false;
        }
    }

    $sql = "INSERT INTO adm (kd_admin, nama, pass, gambar) VALUES ('$username', '$nama', '$password', '$gambar')";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo "<script>alert('Berhasil Registrasi');</script>";
        echo "<script>location='login.php';</script>";
    }else{
        echo "<script>alert('Gagal Registrasi');</script>";
        echo "<script>location='register.php';</script>";
    }
}
?>
