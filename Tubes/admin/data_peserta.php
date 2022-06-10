<?php require "header.php"; require "../connection.php" ?>
<div class="breadcrumbs">
<div class="col-sm-4">
<div class="page-header float-left">
    
</div>
</div>

</div>

<div class="content mt-3">
<div class="animated fadeIn">


<div class="row">
    
    <div class="col-lg-12">
        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <strong class="card-title ">Data Peserta</strong>
                                <form action="data_peserta.php" method="GET" >

                                <input type="text" id="cari" name="cari" autocomplete="off" placeholder="Silahkan Cari" class="form-control" >
                                
                                
                                </form>
                            </div>

                               

                        <div class="card-body">

                          <div class="d-flex justify-content-between">
                                <a href="tambah_peserta.php" class="btn btn-primary rounded m-2"><i class="fa fa-plus p-2"></i>Tambah Data Peserta</a>
                                <a href="download_peserta.php" target="_blank" class="btn btn-primary rounded m-2"><i class="fa fa-download p-2"></i></a>
                          </div>

                            <div id="tampilkan">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            
                                            <th scope="col">Nama Peserta</th>
                                            <th scope="col">username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Aksi</th>

                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //  pagination
                                        // awal konfigurasi
                                        $jumlahDataPerHal = 5;
                                        $res = mysqli_query($conn, "SELECT * FROM peserta ");
                                        $jumlahsoal= mysqli_num_rows($res);
                                        $jumlahHal = ceil($jumlahsoal / $jumlahDataPerHal);
                                        $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
                                        $awalData = ($jumlahDataPerHal * $halamanAktif) - $jumlahDataPerHal;
                                        // akhir konfigurasi
                                        
                                    ?>

                                    <?php 
                                        if(isset($_GET['cari'])){
                                            $cari = $_GET['cari'];
                                            $query = "SELECT * FROM peserta WHERE nama_peserta LIKE '%$cari%'OR username LIKE '%$cari%' OR email LIKE '%$cari%' LIMIT $awalData, $jumlahDataPerHal";
                                        }else{
                                            $query = "SELECT * FROM peserta LIMIT $awalData, $jumlahDataPerHal";
                                        }
                                        $result = mysqli_query($conn, $query);
                                        $no = 1;
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no++ ?></th>
                                                <td><?php echo $row['nama_peserta'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['pass'] ?></td>
                                                <td><img src="../assets/img/<?= $row["gambar"]; ?>" width="70px" class="rounded"></td>
                                                <td style="text-align:center">
                                                            <a href="edit_peserta.php?id=<?= $row['id'];?>"><i class="bi bi-pencil-square text-warning fa-lg"></i></a> <strong>||</strong> 
                                                            <a href="delete_peserta.php?id=<?= $row['id'];?>" ><i class="bi bi-trash text-danger fa-lg" onclick="return confirm('Yakin Hapus Data Peserta?'); "></i></a>
                                                        </td>
                                            </tr>
                                            <?php } ?>
                                    




                                       
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                                </div>
                              <!-- navigasi -->
                              <nav aria-label="page navigation example fixed-bottom">
                                <ul class="pagination justify-content-end">
                                <?php if($halamanAktif == 1): ?>
                                  <li class="page-item disabled ">
                                    <a class="page-link" href="data_peserta.php?halaman=<?= $halamanAktif-1; ?>" >Back</a> 
                                  </li>
                                  <?php endif; ?>

                                  <?php if($halamanAktif > 1): ?>
                                  <li class="page-item  ">
                                    <a class="page-link" href="data_peserta.php?halaman=<?= $halamanAktif-1; ?>" >Back</a> 
                                  </li>
                                  <?php endif; ?>

                                  <?php for($i=1; $i<= $jumlahHal; $i++ ): ?>
                                    <?php if($i== $halamanAktif): ?>
                                      <li class="page-item active">
                                      <a class="page-link " href="data_peserta.php?halaman=<?= $i; ?>"  ><?= $i; ?></a>
                                      </li>
                                      <?php else: ?>
                                        <li class="page-item">
                                          <a class="page-link" href="data_peserta.php?halaman=<?= $i; ?>"><?= $i; ?></a>
                                      </li>
                                    <?php endif; ?>
                                  <?php endfor; ?>

                                
                                  <?php if($halamanAktif < $jumlahHal): ?>
                                    <li class="page-item  ">
                                    <a class="page-link" href="data_peserta.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                                  </li>
                                  <?php endif; ?>

                                  <?php if($halamanAktif == $jumlahHal): ?>
                                    <li class="page-item disabled ">
                                    <a class="page-link" href="data_peserta.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                                  </li>
                                  <?php endif; ?>

                                  <?php if($halamanAktif > $jumlahHal): ?>
                                    <li class="page-item disabled ">
                                    <a class="page-link" href="data_peserta.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
                                  </li>
                                  <?php endif; ?>


                                </ul>
                            </nav>
                            <!-- akhir navigasi -->

                        </div>
                    </div>
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
 
  xhr.open('GET', 'assets/ajax/peserta.php?cari='+cari.value, true);
    
    xhr.send();
});
</script>



 <?php require "footer.php" ?>                              