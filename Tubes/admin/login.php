<?php 
session_start();
if(isset($_SESSION["login"])){
   header("location:index.php");

}
require "../connection.php"; 

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if($user == "" || $pass == ""){
        $error= true;
        echo "<script>alert('Username atau Password tidak boleh kosong');</script>";
    }else{
        $sql = "SELECT * FROM adm WHERE kd_admin = '$user' AND pass = '$pass'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['login'] = $row['kd_admin'];
            header("location:index.php");
        }else{
           echo "<script>alert('Username atau Password salah');</script>";
        }
    }
}

?>
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
                    <h1>ADMIN LOGIN</h1>
                </div>
                <div class="login-form rounded">
                    <form name="form1" action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Isi Dengan Kode Admin">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                        </div>
                                
                                <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30 rounded">Sign in</button>
                               
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


