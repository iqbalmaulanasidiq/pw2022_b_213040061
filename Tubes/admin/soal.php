<?php require "header.php"; require "../connection.php" ?>
<div class="breadcrumbs">
<div class="col-sm-12 " >
<div class="page-header float-left">
    <div class="page-title">
        <h1 style="text-align:center ;">Pilih Kategori Ujian Untuk Menambahkan Soal Ujian</h1>
    </div>
</div>
</div>

</div>

<div class="content mt-3">
<div class="animated fadeIn">


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                    <strong class="card-title ">Kategori</strong>
                    <form action="soal.php" method="GET" >
                    <input type="text" id="cari" name="cari" autocomplete="off" placeholder="Silahkan Cari" class="form-control" >
                    
                    </form>
            </div>  
            <div class="card-body">
                <a href="kategori.php" class="btn btn-primary rounded my-3"><i class="fa fa-plus"></i>&nbsp;Tambah Kategori</a>
             <div id="tampilkan">  
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10px;">#</th>
                        <th scope="col">Kategori</th>
                       
                        <th scope="col" style="width: 150px;">ACTION</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                    //  pagination
                    // awal konfigurasi
                    $jumlahDataPerHal = 5;
                    $res = mysqli_query($conn, "SELECT * FROM kategori ");
                    $jumlahsoal= mysqli_num_rows($res);
                    $jumlahHal = ceil($jumlahsoal / $jumlahDataPerHal);
                    $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
                    $awalData = ($jumlahDataPerHal * $halamanAktif) - $jumlahDataPerHal;
                    // akhir konfigurasi
                    
                ?>
                <?php 
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $query = "SELECT * FROM kategori WHERE Kategori_ujian LIKE '%$cari%' LIMIT $awalData, $jumlahDataPerHal";
            }else{
                $query = "SELECT * FROM kategori LIMIT $awalData, $jumlahDataPerHal";
            }
            $result = mysqli_query($conn, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?= $row["kategori_ujian"]; ?></td>
                    <td style="text-align:center">
                        <a  href="tambah_edit_soal.php?id=<?= $row['id_kategori'];?>"><i class="bi bi-plus-circle-fill text-primary rounded fa-lg  "></i></a><strong>||</strong>
                        <a href="edit_kategori.php?id=<?= $row['id_kategori'];?>"><i class="bi bi-pencil-square text-warning fa-lg"></i></a> <strong>||</strong> 
                        <a href="delete_kategori.php?id=<?= $row['id_kategori'];?>" ><i class="bi bi-trash text-danger fa-lg" onclick="return confirm('Yakin Hapus Kategori?'); "></i></a>
                    </td>
                </tr>
                <?php } ?>



                   
                    
                    
                </tbody>
            </table>
            </div> 
                    <!-- navigasi -->
                    <nav aria-label="page navigation example fixed-bottom">
                                <ul class="pagination justify-content-end">
                                <?php if($halamanAktif == 1): ?>
                                  <li class="page-item disabled ">
                                    <a class="page-link" href="soal.php?halaman=<?= $halamanAktif-1; ?>" >Back</a> 
                                  </li>
                                  <?php endif; ?>

                                  <?php if($halamanAktif > 1): ?>
                                  <li class="page-item  ">
                                    <a class="page-link" href="soal.php?halaman=<?= $halamanAktif-1; ?>" >Back</a> 
                                  </li>
                                  <?php endif; ?>

                                  <?php for($i=1; $i<= $jumlahHal; $i++ ): ?>
                                    <?php if($i== $halamanAktif): ?>
                                      <li class="page-item active">
                                      <a class="page-link " href="soal.php?halaman=<?= $i; ?>"  ><?= $i; ?></a>
                                      </li>
                                      <?php else: ?>
                                        <li class="page-item">
                                          <a class="page-link" href="soal.php?halaman=<?= $i; ?>"><?= $i; ?></a>
                                      </li>
                                    <?php endif; ?>
                                  <?php endfor; ?>

                                
                                  <?php if($halamanAktif < $jumlahHal): ?>
                                    <li class="page-item  ">
                                    <a class="page-link" href="soal.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                                  </li>
                                  <?php endif; ?>

                                  <?php if($halamanAktif == $jumlahHal): ?>
                                    <li class="page-item disabled ">
                                    <a class="page-link" href="soal.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                                  </li>
                                  <?php endif; ?>

                                  <?php if($halamanAktif > $jumlahHal): ?>
                                    <li class="page-item disabled ">
                                    <a class="page-link" href="soal.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                                  </li>
                                  <?php endif; ?>


                                </ul>
                            </nav>
                            <!-- akhir navigasi -->
            </div>
        </div> 

    </div>
    <!--/.col-->


</div>
</div><!-- .animated -->
</div><!-- .content -->

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
 
  xhr.open('GET', 'assets/ajax/soal.php?cari='+cari.value, true);
    
    xhr.send();
});
</script>

 <?php require "footer.php" ?>                              