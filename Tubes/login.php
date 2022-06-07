<?php 

require "connection.php";
session_start();
if(isset($_SESSION["login"])){
   header("location:index.php");
}

if(isset($_POST["login"])){
    $user = $_POST["username"];
    $pass = $_POST["pass"];
    
    if($user == "" || $pass == ""){
        $error = true;
        echo "
            <script>
                alert('Username atau Password Tidak Boleh Kosong');
                window.location.href='login.php';
            </script>
            ";
    }else{
        $sql = "SELECT * FROM peserta WHERE username = '$user' AND pass = '$pass'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            $_SESSION["login"] = $row;
            echo "
            <script>
            alert('Login Berhasil');
            window.location.href='index.php';
            </script>";
        }else{
            echo "
            <script>
            alert('Username Atau Password Salah');
            window.location.href='login.php';
            </script>";
        }
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>Kuisin</title>
  </head>
  <body>
    
  <!-- login -->
  <div class="d-flex justify-content-center align-items-center mt-5">


    <div class="card">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item text-center">
          <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
        </li>
        <li class="nav-item text-center">
          <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a>
        </li>
       
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <h3 class="text-center">Silahkan Login</h3>
          <div class="form px-4 pt-4">
            
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username"  placeholder="Masukan Username Anda" name="username">
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                </div>
                <div class="d-grid gap-2 col-9 mx-auto pt-5">
                <button type="submit" name="login" class="btn btn-primary ">Login</button>
                </div>
                
               
            </form>
            
          </div>
        </div>

        <!-- register -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          
        <h3 class="text-center">Silahkan Untuk Mendaftar</h3>
          <div class="px-4 pb-4  ">

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group pt-2 ">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama"  placeholder="Masukan Nama Lengkap Anda" name="nama">
                </div>
                <div class="form-group pt-2">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Password Anda">
                </div>
                <div class="form-group pt-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email Anda">
                </div>
                <div class="form-group pt-2">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Masukan Password Anda">
                </div>
                <div class="form-group " style="display: none ;">
                    <label for="gambar" class="control-label mb-1" >Gambar</label>
                    <input id="gambar" name="gambar" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                </div>   
                <div class="d-grid gap-2 col-9 mx-auto pt-4">
                <button type="submit" name="daftar" class="btn btn-primary ">Daftar</button>
                </div>
            </form>
            

          </div>



        </div>
        
       </div>
    
  
  

</div>


</div>
 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/1aa8b05b37.js" crossorigin="anonymous"></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html> 


<?php 
require "footer.php";
if(isset($_POST['daftar'])){
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);
    
    if($_FILES['gambar']['error'] === 4){
        $gambar = "nophoto.png";
    }else{
        if(!$gambar){
            return false;
        }
    }
    $sql = mysqli_query($conn, "INSERT INTO peserta (id, nama_peserta, username, email, pass, gambar) VALUES (NULL,'$nama', '$username', '$email', '$pass', '$gambar')")or die(mysqli_error($conn));
    if($sql){
        echo "<script>alert('Pendaftaran Berhasil');</script>";
        echo "<script>location='login.php';</script>";
    }

}
?>