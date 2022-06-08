<?php 
require "../../connection.php";
$cari = $_GET['cari'];
?>
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
                       
                        $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
                        $awalData = ($jumlahDataPerHal * $halamanAktif) - $jumlahDataPerHal;
                        $res = mysqli_query($conn, "SELECT * FROM Kategori LIMIT $awalData, $jumlahDataPerHal");
                        $jumlahsoal= mysqli_num_rows($res);
                        $jumlahHal = ceil($jumlahsoal / $jumlahDataPerHal);
                      // akhir konfigurasi
                     
                     ?>
                        

                      <?php 
                        $no= 1;
                        $keyword= "";
                        if(isset($_GET['cari'])){
                            $keyword = $_GET['cari'];
                        }

                        $query = "SELECT * FROM kategori WHERE kategori_ujian LIKE '%$keyword%' ";
                        $result = mysqli_query($conn, $query);
                        $res= mysqli_num_rows($result);
                        if($res >0){
                            while($row= mysqli_fetch_array($result)){
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo $row['kategori_ujian'] ?></td>
                                        
                                        <td style="text-align:center">
                                        <a href="mulai_ujian.php?id=<?= $row['id_kategori'];?>" ><i class="bi bi-check2-square text-white fa-lg btn btn-primary" onclick="return confirm('Yakin Pilih Kategori <?= $row['kategori_ujian'];?> ?'); "></i></a>
                                            
                                        </td>
                                    </tr>
                                <?php
                            }
                        }else{
                            ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <h3>Data Tidak Ditemukan</h3>
                                </td>
                            </tr>
                            <?php
                        }

                    ?>
                      
                      </tbody>
                  </table>
</div>
 <!-- navigasi -->
 <!-- <nav aria-label="page navigation example fixed-bottom">
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

        

    
        <?php if($halamanAktif < $jumlahHal): ?>
        <li class="page-item  ">
        <a class="page-link" href="kategori_ujian.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
        </li>
        <?php endif; ?>

        <?php if($halamanAktif == $jumlahHal): ?>
        <li class="page-item  ">
        <a class="page-link" href="kategori_ujian.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
        </li>
        <?php endif; ?>

        <?php if($halamanAktif > $jumlahHal): ?>
        <li class="page-item  ">
        <a class="page-link" href="kategori_ujian.php?halaman=<?= $halamanAktif+1; ?>" >Next</a> 
        </li>
        <?php endif; ?>


    </ul>
</nav> -->
<!-- akhir navigasi -->