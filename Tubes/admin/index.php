<?php 
require "header.php"; 
require "../connection.php";
?>
<div class="breadcrumbs">
<div class="col-sm-4">
<div class="page-header float-left">
    <div class="page-title">
        <h1>Dashboard</h1>
    </div>
</div>
</div>

</div>

<div class="content mt-3 ">
<div class="animated fadeIn ">


<div class="row ">
    <div class="col-lg-12 ">
        <div class="card ">
           
            

           
            <div class="card-header">
            <?= "<h3>Selamat Datang, " . $_SESSION['login']['nama'] ."!". "</h3>"; ?>
            </div>
            <div class="card-body">
                
            <div class="col-6 col-lg-6">
                <?php 
                $sql = mysqli_query($conn, "SELECT * FROM peserta");
                $jumlah_peserta = mysqli_num_rows($sql);
                ?>
                <div class="card rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-users bg-flat-color-5  p-4  mr-3 float-left text-light rounded"></i>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Jumlah Peserta</div>
                            <div class="h5 text-secondary mb-0 mt-1"><?= $jumlah_peserta  ?> Orang</div>
                            
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="data_peserta.php">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6">
                <?php 
                $sql = mysqli_query($conn, "SELECT * FROM kategori");
                $jumlah_kategori = mysqli_num_rows($sql);
                ?>
                <div class="card rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-book bg-flat-color-4  p-4  mr-3 float-left text-light rounded"></i>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Jumlah Kategori</div>
                            <div class="h5 text-secondary mb-0 mt-1"><?= $jumlah_kategori  ?> Pelajaran</div>
                            
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="kategori.php">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>

           
 

            </div>
        </div> 

    </div>
    <!--/.col-->


</div>
</div><!-- .animated -->
</div><!-- .content -->
 <?php include "footer.php" ?>                              