<?php 
require "header.php" ;
require "../connection.php" ;
$id = $_GET['id'];
$id_soal = $_GET['id_soal'];
$res=mysqli_query($conn, "SELECT * FROM soalsoal WHERE id_soal='$id_soal'");
    while($row=mysqli_fetch_array($res)){
        $pertanyaan = $row['pertanyaan'];
        
    }

    $sql = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
    while($row=mysqli_fetch_array($sql)){
        $kategori = $row['kategori_ujian'];
    }

?>

<div class="breadcrumbs">
<div class="col-sm-6">
<div class="page-header float-left">
    <div class="page-title">
        <h1>Perbaharui Pertanyaan Pada Kategori <?= "<font color='red'>" . $kategori. "</font>"  ?> </h1>
    </div>
</div>
</div>

</div>

<div class="content mt-3">
<div class="animated fadeIn">


<div class="row">
    <div class="col-lg-12 ">
        <div class="card">
            
            <div class="card-body">
                
            <div class="col-lg-12 ">
                <form action="" name="form1" method="POST">
                        <div class="card">
                            
                        <div class="card-header"><strong>Perbaharui Pertanyaan Untuk Kategori </strong><br>
                       
                            
                            <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company" class=" form-control-label floatingTextarea2">Soal Sebelumnya Adalah : " <?= $pertanyaan ?> " </label>
                                <textarea class="form-control" placeholder="Tambahkan Pertanyaan Baru" name="pertanyaan" id="floatingTextarea2" style="min-height: 100px"></textarea>
                            </div>
                            
                            
                            <div class="form-group">
                                <input type="submit" name="submit1" value="Perbaharui Pertanyaan" style="border-radius:5px ;" class="btn btn-success">
                            </div>
                            
                            </form>
            </div>

            </div>

                

            
            
        </div> 
               

            </div>
            
    </div>
    <!--/.col-->


    
</div>

</div>
</div><!-- .animated -->
</div><!-- .content -->


<?php 
    if(isset($_POST["submit1"])){
        $pertanyaan = $_POST["pertanyaan"];
        
        $res=mysqli_query($conn, "UPDATE soalsoal SET pertanyaan='$pertanyaan' WHERE id_soal='$id_soal'");
        if($res){
            echo "<script>alert('Soal Berhasil Diperbaharui');</script>";
            echo "<script>location='tambah_edit_soal.php?id=$id';</script>";
        }else{
            echo "<script>alert('Soal Gagal Diperbaharui');</script>";
            echo "<script>location='tambah_edit_soal.php?id=$id';</script>";
        }
    }
?>



 <?php include "footer.php" ?>                              