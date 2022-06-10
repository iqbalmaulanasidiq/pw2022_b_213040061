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
        <a class="nav-link" href="index.php" onclick="return confirm('Yakin Meninggalkan Halaman ini?'); ">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kategori_ujian.php" onclick="return confirm('Yakin Meninggalkan Halaman ini?'); ">Kategori</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="rank.php" onclick="return confirm('Yakin Meninggalkan Halaman ini?'); ">Nilai</a>
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
          <a class="dropdown-item"  href="edit_profil.php" onclick="return confirm('Yakin Meninggalkan Halaman ini?'); ">Ubah Profil</a>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php" onclick="return confirm('Yakin Meninggalkan Halaman ini?'); ">Logout</a>
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

$res = "SELECT * FROM soalsoal WHERE id_kategori = '$id_kat'";
$query = mysqli_query($conn, $res);
$jumlah_soal = mysqli_num_rows($query);
?>
  <section>
    <div class="container">
      <div class="row justify-content-around pt-5 ">
        <div class="col-lg-8 ">
          <div class="card bg-dark px-5 pt-3 pb-3 text-white" style="min-height: 500px">
            <div class="card-header">
            <h3 class="text-center">Selamat Datang <?= $nama_peserta; ?></h3>
              <p class="text-center">Selamat mengerjakan Soal Pada Kategori <?= $nama_kategori; ?> dengan jumlah soal <?= $jumlah_soal; ?> </p>
              
              <a href="" class="text-warning h5" onclick="return confirm('Kerjakan Soal Essay Berikut dengan sertakan nama lengkap, kategori soal, nomor soal, dan halaman soal. Kemudian Upload Dengan Format .PDF atau .docx'); ""><i class="bi bi-info-circle-fill"></i></a>
              <h3 class="text-center">Soal Essay</h3>
              <a href="download_soal.php?id=<?= $id_kat ?>" target="_blank">DOWNLOAD SOAL</a>
            </div>
            <div class="card-body">
            
            
            
              <div class="col-lg-12">
              
              <div class="card bg-white" style="min-height: 300px;">
              
             
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

           
            <div id="ambil">
              <form action="" method="POST" enctype="multipart/form-data">
                  <div class="mb-3 col-12 justify-content-around">
                    <label for="formFile"  class="form-label">Upload Jawaban Anda</label>
                    <input  class="form-control" type="file" id="jawab" name="jawab">
                    <input class=" btn btn-primary mt-2" name="kumpulkan" id="kumpulkan" type="submit" value="Upload">
                  </div>
                  </form>
            </div>
            


            <nav aria-label="page navigation example">
                <ul class="pagination justify-content-center">
                <?php if($halamanAktif == 1): ?>
                  <li class="page-item disabled ">
                    <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $i; ?>" >Back</a> 
                  </li>
                  <?php endif; ?>

                  <?php if($halamanAktif > 1): ?>
                  <li class="page-item  ">
                    <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $halamanAktif-1; ?>" >Back</a> 
                  </li>
                  <?php endif; ?>

                  <?php for($i=1; $i<= $jumlahHal; $i++ ): ?>
                    <?php if($i== $halamanAktif): ?>
                      <li class="page-item">
                      <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $i; ?>" style="font-weight:bold;color:red;" >Halaman&nbsp;<?= $i; ?></a>
                      </li>
                    <?php endif; ?>
                  <?php endfor; ?>

                
                  <?php if($halamanAktif < $jumlahHal): ?>
                    <li class="page-item  ">
                    <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                  </li>
                  <?php endif; ?>

                  <?php if($halamanAktif == $jumlahHal): ?>
                    <li class="page-item disabled ">
                    <a class="page-link" href="mulai_ujian.php?id=<?= $id_kat; ?>&halaman=<?= $i; ?>" >Next</a> 
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















<?php 
if(isset($_POST['kumpulkan'])){
$filename= $_FILES['jawab']['name'];
$filetmpname = $_FILES['jawab']['tmp_name'];
$filesize = $_FILES['jawab']['size'];
$filetype = pathinfo($filename, PATHINFO_EXTENSION);
$allowed = ['pdf', 'doc', 'docx'];


if(in_array(strtolower($filetype), $allowed)){
  if($filesize < 5000000){
    move_uploaded_file($filetmpname, "assets/jawaban_peserta/" .$filename);
    $query = mysqli_query($conn, "INSERT INTO jawaban (id_jawaban, jawaban_soal, id, id_kategori) VALUES ('NULL', '$filename', '$id_peserta', '$id_kat')");
    if($query){
      echo "<script>alert('Jawaban berhasil diupload');</script>";
      echo "<script>location='kategori_ujian.php';</script>";
    }else{
      echo "<script>alert('Jawaban gagal diupload');</script>";
      echo "<script>location='kategori_ujian.php';</script>";
    }
  }else{
    echo "<script>alert('Ukuran file terlalu besar');</script>";
  }
  }else{
    echo "<script>alert('File yang diupload bukan file pdf ataupun docx');</script>";
}

}
?>
