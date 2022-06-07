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
        <a class="nav-link" href="index.php" onclick="return confirm('Yakin Meninggalkan Halaman ini?'); ">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kategori_ujian.php" onclick="return confirm('Yakin Meninggalkan Halaman ini?'); ">Kategori</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="rank.php" onclick="return confirm('Yakin Meninggalkan Halaman ini?'); ">Ranking</a>
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


<div class="main-content">
<?php 
$id_kat = $_GET['id'];
$sql = "SELECT * FROM kategori WHERE id_kategori = '$id_kat'";
$query = mysqli_query($conn, $sql);
while($data = mysqli_fetch_array($query)){
    $nama_kategori = $data['kategori_ujian'];
}
?>
  <section>
    <div class="container">
      <div class="row justify-content-around pt-5 ">
        <div class="col-lg-8 ">
          <div class="card bg-dark px-5 pt-3 pb-3 text-white" style="min-height: 600px">
            <div class="card-header">
            <h3 class="text-center">Selamat Datang <?= $nama_peserta; ?></h3>
              <p class="text-center">Selamat mengerjakan Soal Pada Kategori <?= $nama_kategori; ?> </p>
            </div>
            <div class="card-body">
            
            
            
              <div class="col-lg-12">
              <div class="card bg-white" style="min-height: 400px;">
              <div class="container">
                <form action="" method="post">
                  <table class="table table-borderless">
                    <tr>
                      <th style="width: 10px;"></th>
                      <th></th>
                    </tr>
                   <?php 

                  //  pagination
                  // awal konfigurasi
                    $jumlahDataPerHal = 5;
                    $res = mysqli_query($conn, "SELECT * FROM soalsoal WHERE id_kategori = '$_GET[id]'");
                    $jumlahsoal= mysqli_num_rows($res);
                    $jumlahHal = ceil($jumlahsoal / $jumlahDataPerHal);
                    $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
                    $awalData = ($jumlahDataPerHal * $halamanAktif) - $jumlahDataPerHal;
                  // akhir konfigurasi

                    $sql = "SELECT * FROM soalsoal WHERE id_kategori = '$_GET[id]' LIMIT $awalData, $jumlahDataPerHal";
                    $query = mysqli_query($conn, $sql);
                    $no = 1;
                    while($row = mysqli_fetch_assoc($query)){
                      ?>
                      <tr>
                          <th scope="row"><?php echo $no++ ?>.</th>
                          <td><?php echo $row['pertanyaan'] ?></td>
                      </tr>
                      <?php } ?>
                    
                   ?>
                  </table>
                </form>
              </div>
              </div>
              </div>
            

            </div>

            <!-- navigasi awal -->
            <!-- <?php if($halamanAktif > 1): ?>
            <a href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $halamanAktif-1; ?>">&lt;</a>
            <?php endif; ?>

              <?php for($i=1; $i<= $jumlahHal; $i++ ): ?>
                <?php if($i== $halamanAktif): ?>
                  <a href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $i; ?>" style="font-weight:bold;color:red;" ><?= $i; ?></a>
                <?php else: ?>
                  <a href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $i; ?>"><?= $i; ?></a>
                <?php endif; ?>
              <?php endfor; ?>

              <?php if($halamanAktif < $jumlahHal): ?>
            <a href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $halamanAktif+1; ?>">&gt;</a>
            <?php endif; ?> -->


            <nav aria-label="page navigation example">
                <ul class="pagination justify-content-center">
                <?php if($halamanAktif == 1): ?>
                  <li class="page-item disabled ">
                    <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $halamanAktif-1; ?>" >Back</a> 
                  </li>
                  <?php endif; ?>

                  <?php if($halamanAktif > 1): ?>
                  <li class="page-item  ">
                    <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $halamanAktif-1; ?>" >Back</a> 
                  </li>
                  <?php endif; ?>
                
                  <?php if($halamanAktif < $jumlahHal): ?>
                    <li class="page-item  ">
                    <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                  </li>
                  <?php endif; ?>

                  <?php if($halamanAktif == $jumlahHal): ?>
                    <li class="page-item disabled ">
                    <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                  </li>
                  <?php endif; ?>

                  <?php if($halamanAktif > $jumlahHal): ?>
                    <li class="page-item disabled ">
                    <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                  </li>
                  <?php endif; ?>


                </ul>
            </nav>

              
            <!-- navigasi akhir -->
          </div>
        </div>
      </div>
    </div>
  </section>

  


  </div>


<?php require "footer.php" ?>

