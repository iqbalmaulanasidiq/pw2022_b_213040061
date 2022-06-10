<?php 


require 'header.php';
require 'connection.php';
session_start();
if(!isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}
?>
<header class="header">
  <div class="header-inner">
    <div class="container-fluid px-lg-5">
      <nav class="navbar navbar-expand-lg my-navbar ps-5">
  <a class="navbar-brand" href="#"><span class="logo">
    <img src="assets/img/gambar/logo.png" class="img-fluid" style="width:30px; margin:-3px 0px 0px 0px;"> Kuisin</span>
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
    <?php 
    

    $id_peserta = $_SESSION['login']['id'];
    $sql = "SELECT * FROM peserta WHERE id = '$id_peserta'";
    $query = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($query)){
        $gambar = $data['gambar'];
        $nama_peserta = $data['nama_peserta'];
    }
    ?>
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

<section class="content-banner">
  <div class="container">
<div class="row d-flex justify-content-center">
  <div class="col-md-12">
    <div class="banner-con text-center">
      <p class="first-title text-white">Selamat Datang <font style="color: red;"> <?= $nama_peserta; ?> </font></p>
      <p class="first-title text-white">kuisin aja &amp; Kembangkan Dirimu</p>
      <a href="kategori_ujian.php" class="banner-btn ">Yuk!! Pilih Kuis dan Mulai </a>
    </div>
</div>
</div>
</div>
</section>



   






   <?php 
   require 'footer.php';
   ?>