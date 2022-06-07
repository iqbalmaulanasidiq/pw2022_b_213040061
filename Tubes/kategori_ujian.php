<?php 
session_start();
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
        <a class="nav-link" href="rank.php">Ranking</a>
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


<div class="main-content">

  <section>
     <div class="container">
         
           <div class="row justify-content-around pt-5 ">
                <div class="col-lg-10 ">
                    
                <div class="card bg-dark px-5 pt-3 pb-3 text-white">
                <h2 class="text-center pb-3 pt-3">Pilih Kategori Kuis</h2>
                <hr>
                <table class="table text-white mt-4" >
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                                        
                        $query = "SELECT * FROM kategori";
                        $result = mysqli_query($conn, $query);
                        $no = 1;
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?php echo $row['kategori_ujian'] ?></td>
                                
                                <td style="text-align:center">
                                <a href="mulai_ujian.php?id=<?= $row['id_kategori'];?>" ><i class="bi bi-check2-square text-white fa-lg btn btn-primary" onclick="return confirm('Yakin Pilih Kategori <?= $row['kategori_ujian'];?> ?'); "></i></a>
                                    
                                </td>
                            </tr>
                        <?php } 
                    ?>
                    </tbody>
                </table>
                
                </div>
                </div>
                         
           </div>
           
                

           
        </div>
       
  </section>

  <!-- <section>
    <div class="container">
      <div class="row justify-content-around pt-5 ">
        <div class="col-lg-10 ">
          <div class="card bg-dark px-5 pt-3 pb-3 text-white">
            
          </div>
        </div>
      </div>
    </div>
  </section> -->


  </div>
  

<?php require "footer.php" ?>

