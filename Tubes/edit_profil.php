<?php 
require 'connection.php';
require 'header.php';

   session_start();
   if(!isset($_SESSION['login'])){
       header("location: login.php");
       exit;
   }
  
$id = $_SESSION['login']['id'];

$res=mysqli_query($conn, "SELECT * FROM peserta WHERE id=$id");
    while($row=mysqli_fetch_array($res)){
        
        $nama_peserta=$row["nama_peserta"];
        $username=$row["username"];
        $email=$row["email"];
        $pass=$row["pass"];
        $gambar=$row["gambar"];
        
    }
?>

<header class="header">
  <div class="header-inner">
    <div class="container-fluid px-lg-5">
      <nav class="navbar navbar-expand-lg my-navbar ps-5">
  <a class="navbar-brand" href="#"><span class="logo">
    <img src="assets/img/gambar/logo.png" class="img-fluid" style="width:30px; margin:-3px 0px 0px 0px;">Kuisin</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars" style="margin:5px 0px 0px 0px;"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kategori_ujian.php">Kategori</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="rank.php">Nilai</a>
      </li>
      
      
    </ul>
    
    <ul class="pe-5">  
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="assets/img/<?= $gambar; ?>" alt="" style="width: 30px;" class="rounded-circle img-thumbnail ">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="edit_profil.php">Ubah Profil</a>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

    </div>
  </div>


</header>



<div class="main-content">

  <section>
     <div class="container">
         
           <div class="row justify-content-center pt-5 ">
                <div class="col-lg-6 ">
                    
                <div class="card bg-dark px-5 pt-3 pb-3 text-white">
                <h2 class="text-center pb-3 pt-3">Ubah Profil Anda</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                
                    <img src="assets/img/<?= $gambar; ?> " class="rounded-circle mx-auto d-block img-thumbnail " width="200px">
                
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="tetx" name="nama" class="form-control" id="nama" value="<?= $nama_peserta;?>" >
                        
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" name="username" class="form-control" id="username" value="<?= $username;?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?= $email;?>">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="text" name="pass" class="form-control" id="pass" value="<?= $pass;?>">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Foto Profil Baru</label>
                        <input type="file" name="gambar" class="form-control" id="gambar">
                    </div>
                    
                    
                        <button class="btn btn-primary" name="submit1" type="submit">Ubah</button>
                   
                </form>
                </div>
                </div>
                <div class="col-lg-4 ">
                    
                <div class="card rounded bg-dark text-white">
                  <div class="card-header">
                      <i class="fa fa-user"></i><strong class="card-title pl-2"> Profil Anda</strong>
                  </div>
                  <div class="card-body">
                      <div class="mx-auto d-block">
                          <img width="200px" class="rounded-circle mx-auto d-block" src="assets/img/<?= $gambar ?>" alt="Card image cap">
                          
                          <h5 class="text-sm-center mt-2 mb-1"><i class="fa fa-user"></i>&nbsp;<label for="">Nama : &nbsp; </label><?= $nama_peserta; ?></h5>
                          <div class="location text-sm-center " style="font-size: 20px;"><i class="bi bi-person-video3"></i>&nbsp;<label for="">Username : &nbsp; </label><?= $username; ?></div>
                          <div class="location text-sm-center " style="font-size: 20px;"><i class="bi bi-envelope-fill"></i></i>&nbsp;<label for="">Email : &nbsp; </label><?= $email; ?></div>
                          <div class="location text-sm-center " style="font-size: 20px;"><i class="fa fa-lock "></i>&nbsp;<label for="">Password : &nbsp; </label><?= $pass; ?></div>
                      </div>
                  </div>

                </div>
           </div>
        </div>
       
  </section>
  </div>

  <?php 
    if(isset($_POST["submit1"])){

        $nama_peserta = htmlspecialchars($_POST["nama"]);
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $pass = htmlspecialchars($_POST["pass"]);
        
        if($_FILES["gambar"]["error"] === 4) {
            // pilih gambar default
            $gambar = "nophoto.png";
        } else {
            // jalankan fungsi upload
            $gambar = upload();
            // cek jika upload gagal
            if (!$gambar) {
                return false;
            }
        }
       $sql = mysqli_query($conn, "UPDATE peserta SET nama_peserta='$nama_peserta', username='$username', email='$email', pass='$pass', gambar='$gambar' WHERE id='$id'");
        if($sql){
            echo "<script>
            alert('Data Peserta Berhasil Diubah');
            location.href='edit_profil.php';
            </script>";
        }else{
            echo "<script>
            alert('Data Peserta Gagal Diubah');
            location.href='edit_profil.php';
            </script>";
        }
        
        
    }

function upload(){
    $filename = $_FILES['gambar']['name'];
    $filetmpname = $_FILES['gambar']['tmp_name'];
    $filesize = $_FILES['gambar']['size'];
    $filetype = pathinfo($filename, PATHINFO_EXTENSION);
    $allowedtype = ['jpg', 'jpeg', 'png'];


    if(!in_array($filetype, $allowedtype)){
        echo "<script>
        alert('File yang diupload harus berformat .jpg, .jpeg, .png');
        </script>";
        return false;
    }else{
        if($filesize > 2000000){
            echo "<script>
            alert('Ukuran file terlalu besar');
            </script>";
            return false;
        }
    }

   $newname = uniqid().$filename;
   move_uploaded_file($filetmpname, 'assets/img/'.$newname);
    return $newname;
   

}


?>


<?php require 'footer.php';?>