<?php 

require "header.php";
require "connection.php";
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


<div >

  <section >
     <div class="container">
         
           
        <div class="row justify-content-around pt-5 ">
          <div class="card bg-dark" style="min-height: 600px;">
            <div class="col-lg-12 ">
                    <div class="card-header bg-dark text-white d-flex justify-content-between px-5 py-3">
                        <h2 class=" card-title ">Nilai Anda</h2>
                    
                    </div>
                    <div class="card-body text-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th style="width: 10px;">No</th>
                                        <th >Kategori</th>
                                        <th>Nilai</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $id_peserta = $_SESSION['login']['id']; 
                                        $query= mysqli_query($conn, "SELECT * FROM jawaban INNER JOIN peserta ON jawaban.id = peserta.id INNER JOIN kategori ON jawaban.id_kategori = kategori.id_kategori WHERE jawaban.id = '$id_peserta'");
                                        $no = 1;
                                        while($data = mysqli_fetch_array($query)){
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['kategori_ujian']; ?></td>
                                                <td><?= $data['nilai']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                

                
                
                </div>
                
             </div>  
                    
          </div>
           
                

           
    </div>
       
  </section>

  

  


  </div>
  


<?php require "footer.php" ?>

