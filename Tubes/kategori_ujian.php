<?php 

require "header.php";
require "connection.php";
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
                    <h2 class=" card-title ">Pilih Kategori Kuis</h2>
                    <form action="kategori_ujian.php" method="GET"  >
                        <input type="text" id="cari"  name="cari" autocomplete="off" placeholder="Silahkan Cari" class="form-control" >        
                    </form>
                    </div>
                
                <div id="tampilkan">
                  <div class="card bg-dark p-3" style="min-height: 400px;">
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
                      //  pagination
                      // awal konfigurasi
                        $jumlahDataPerHal = 5;
                        $res = mysqli_query($conn, "SELECT * FROM Kategori ");
                        $jumlahsoal= mysqli_num_rows($res);
                        $jumlahHal = ceil($jumlahsoal / $jumlahDataPerHal);
                        $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
                        $awalData = ($jumlahDataPerHal * $halamanAktif) - $jumlahDataPerHal;
                      // akhir konfigurasi
                     
                     ?>
                      <?php 
                         
                            $sql = "SELECT * FROM kategori LIMIT $awalData, $jumlahDataPerHal";
                         

                          $result = mysqli_query($conn, $sql);
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
                  <!-- navigasi -->
                <nav aria-label="page navigation example fixed-bottom">
                <ul class="pagination justify-content-end">
                <?php if($halamanAktif == 1): ?>
                  <li class="page-item disabled ">
                    <a class="page-link" href="kategori_ujian.php?halaman=<?= $halamanAktif-1; ?>" >Back</a> 
                  </li>
                  <?php endif; ?>

                  <?php if($halamanAktif > 1): ?>
                  <li class="page-item  ">
                    <a class="page-link" href="kategori_ujian.php?halaman=<?= $halamanAktif-1; ?>" >Back</a> 
                  </li>
                  <?php endif; ?>

                  <?php for($i=1; $i<= $jumlahHal; $i++ ): ?>
                    <?php if($i== $halamanAktif): ?>
                      <li class="page-item active">
                      <a class="page-link " href="kategori_ujian.php?halaman=<?= $i; ?>"  ><?= $i; ?></a>
                      </li>
                      <?php else: ?>
                        <li class="page-item">
                          <a class="page-link" href="kategori_ujian.php?halaman=<?= $i; ?>"><?= $i; ?></a>
                      </li>
                    <?php endif; ?>
                  <?php endfor; ?>

                
                  <?php if($halamanAktif < $jumlahHal): ?>
                    <li class="page-item  ">
                    <a class="page-link" href="kategori_ujian.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                  </li>
                  <?php endif; ?>

                  <?php if($halamanAktif == $jumlahHal): ?>
                    <li class="page-item disabled ">
                    <a class="page-link" href="kategori_ujian.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                  </li>
                  <?php endif; ?>

                  <?php if($halamanAktif > $jumlahHal): ?>
                    <li class="page-item disabled ">
                    <a class="page-link" href="kategori_ujian.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                  </li>
                  <?php endif; ?>


                </ul>
            </nav>
            <!-- akhir navigasi -->
                </div>
                
                
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
  <script type="text/javascript">
    // ambil element

var cari = document.getElementById('cari');

var tampilkan = document.getElementById('tampilkan');

// tambahkan event ketika ditulis

cari.addEventListener('keyup', function () {
  // buat objeck ajax
  var xhr = new XMLHttpRequest();

  // mengecek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tampilkan.innerHTML = xhr.responseText;
    }
  };
  // eksekusi ajaxnya
 
  xhr.open('GET', 'assets/ajax/kategori.php?cari='+cari.value, true);
    
    xhr.send();
});
</script>


<?php require "footer.php" ?>

