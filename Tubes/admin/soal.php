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
                    <form action="soal.php" method="POST" >
                    <input type="text" name="cari" autocomplete="off" placeholder="Silahkan Cari" class="form-control" >
                    
                    </form>
            </div>  
            <div class="card-body">
                
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Waktu Ujian</th>
                        <th scope="col">ACTION</th>
                        
                    </tr>
                </thead>
                <tbody>

                <?php 
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $query = "SELECT * FROM kategori WHERE Kategori_ujian LIKE '%$cari%'OR waktu_menit LIKE '%$cari%' ";
            }else{
                $query = "SELECT * FROM kategori";
            }
            $result = mysqli_query($conn, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?= $row["kategori_ujian"]; ?></td>
                    <td><?= $row["waktu_menit"]; ?></td>
                    <td style="text-align:center">
                        <a href="tambah_edit_soal.php?id=<?= $row['id_kategori'];?>"><i class="bi bi-plus-circle-fill text-success fa-lg"></i></a> <strong>||</strong> 
                        <a href="tampil_soal.php?id=<?= $row['id_kategori'];?>" ><i class="bi bi-eye-fill text-primary fa-lg"></i></a>
                    </td>
                </tr>
                <?php } ?>



                    <!-- <?php 
                    $count = 0 ;
                        $res=mysqli_query($conn,"SELECT * FROM kategori");
                        while($row=mysqli_fetch_array($res)){
                        $count++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $count; ?></th>
                                    <td><?= $row["kategori_ujian"]; ?></td>
                                    <td><?= $row["waktu_menit"]; ?></td>
                                    <td style="text-align:center">
                                        <a href="tambah_edit_soal.php?id=<?= $row['id_kategori'];?>"><i class="bi bi-plus-circle-fill text-success fa-lg"></i></a> <strong>||</strong> 
                                        <a href="tampil_soal.php?id=<?= $row['id_kategori'];?>" ><i class="bi bi-eye-fill text-primary fa-lg"></i></a>
                                    </td>
                                    
                                </tr>
                            <?php
                        }
                    ?> -->
                    
                    
                </tbody>
            </table>

            </div>
        </div> 

    </div>
    <!--/.col-->


</div>
</div><!-- .animated -->
</div><!-- .content -->
 <?php require "footer.php" ?>                              