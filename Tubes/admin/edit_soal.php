<?php 
require "header.php" ;
require "../connection.php" ;
$id = $_GET['id'];
$id_soal = $_GET['id_soal'];
$res=mysqli_query($conn, "SELECT * FROM soalsoal WHERE id_soal='$id_soal'");
    while($row=mysqli_fetch_array($res)){
        $pertanyaan = $row['pertanyaan'];
        $opt1 = $row['opt1'];
        $opt2 = $row['opt2'];
        $opt3 = $row['opt3'];
        $opt4 = $row['opt4'];
        $jawaban = $row['jawaban'];
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
                        <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM soalsoal");
                        $jumlah_soal = mysqli_num_rows($sql);
                        ?>
                        <p class="pt-2">
                        Jumlah Soal Pada Kategori <?= "<font color='red'>" . $kategori. "</font>"  ?> Adalah <?= "<font color='red'>" . $jumlah_soal. "</font>"  ?> Soal
                        </p>
                            
                            <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Edit Pertanyaan</label><input type="text" name="pertanyaan" value="<?= $pertanyaan ?>" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="opt1" class=" form-control-label">Pilihan Ganda 1</label><input type="text" name="opt1" value="<?= $opt1 ?>" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="opt2" class=" form-control-label">Pilihan Ganda 2</label><input type="text" name="opt2" value="<?= $opt2 ?>" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="opt3" class=" form-control-label">Pilihan Ganda 3</label><input type="text" name="opt3" value="<?= $opt3 ?>" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                    <label for="opt4" class=" form-control-label">Pilihan Ganda 4</label><input type="text" name="opt4" value="<?= $opt4 ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="jawaban" class=" form-control-label">Jawaban</label><input type="text" name="jawaban" value="<?= $jawaban ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit1" value="Perbaharui Pertanyaan" style="border-radius:5px ;" class="btn btn-success">
                            </div>
                            <a href="tampil_soal.php?id=<?= $id ?>" class="text-primary">Tampilkan Semua Soal Pada Kategori <?=  $kategori ;  ?> </a>
                            </div>            
                

            </div>

            </div>

                

            
            
        </div> 
               

            </div>
            </form>
    </div>
    <!--/.col-->
</div>

</div>
</div><!-- .animated -->
</div><!-- .content -->


<?php 
    if(isset($_POST["submit1"])){
        $pertanyaan = $_POST["pertanyaan"];
        $opt1 = $_POST["opt1"];
        $opt2 = $_POST["opt2"];
        $opt3 = $_POST["opt3"];
        $opt4 = $_POST["opt4"];
        $jawaban = $_POST["jawaban"];
        $res=mysqli_query($conn, "UPDATE soalsoal SET pertanyaan='$pertanyaan', opt1='$opt1', opt2='$opt2', opt3='$opt3', opt4='$opt4', jawaban='$jawaban' WHERE id_soal='$id_soal'");
        if($res){
            echo "<script>alert('Soal Berhasil Diperbaharui');</script>";
            echo "<script>location='tampil_soal.php?id=$id';</script>";
        }else{
            echo "<script>alert('Soal Gagal Diperbaharui');</script>";
            echo "<script>location='tampil_soal.php?id=$id';</script>";
        }
    }
?>



 <?php include "footer.php" ?>                              