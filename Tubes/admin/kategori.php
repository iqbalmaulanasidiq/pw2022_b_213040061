<?php require "header.php"; include "../connection.php" ?>
<div class="breadcrumbs">
<div class="col-sm-4">
<div class="page-header float-left">
    <div class="page-title">
        <h1>Tambah Kategori Ujian</h1>
    </div>
</div>
</div>

</div>

<div class="content mt-3">
<div class="animated fadeIn">


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-body">
            <div class="col-lg-12">
                        <div class="card">
                        <form action="" name="form1" method="POST">
                            <div class="card-header"><strong>Tambah Kategori Ujian</strong>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Kategori Ujian</label><input type="text" name="kategoriujian" placeholder="Tambah Kategori Ujian" class="form-control"></div>
                                    
                                    <div class="form-group"><input type="submit" name="submit1" value="Tambah Kategori" class="btn btn-success rounded" ></div>
                        </form>                
                

            </div>
            
        </div> 
        
    </div>
    <!--/.col-->
    

</div>

           
</div><!-- .animated -->
</div><!-- .content -->

<?php 
    if(isset($_POST["submit1"])){
       mysqli_query($conn, "INSERT INTO kategori (kategori_ujian) VALUES ('$_POST[kategoriujian]')");
        echo "
        <script>alert('Kategori Ujian Berhasil Ditambahkan');
        window.location='soal.php';
        </script>";
    }
?>
 <?php require "footer.php" ?>                              