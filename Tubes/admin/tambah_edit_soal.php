<?php 
require "header.php" ;
require "../connection.php" ;
$kategori='';
$id_kat=$_GET["id"];
$res= mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori='$id_kat'");
while($row=mysqli_fetch_array($res)){
    $kategori = $row['kategori_ujian'];
}
?>
<div class="breadcrumbs">
<div class="col-sm-5">
<div class="page-header float-left">
    <div class="page-title">
        <h1>Tambah Pertanyaan Pada Kategori <?= "<font color='red'>" . $kategori. "</font>"  ?></h1>
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
                            <?php 
                            
                            $sql = mysqli_query($conn,"SELECT * FROM soalsoal ");
                            $jumlah_soal = mysqli_num_rows($sql);
                            ?>
                        <div class="card-header"><strong>Tambah Pertanyaan Untuk Kategori <?= "<font color='red'>" . $kategori. "</font>"  ?></strong><br>
                        <p class="pt-2">
                        Jumlah Soal Pada Kategori <?= "<font color='red'>" . $kategori. "</font>"  ?> Adalah <?= "<font color='red'>" . $jumlah_soal. "</font>"  ?> Soal
                        </p>
                            
                            <div class="card-body card-block">
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Tambah Pertanyaan</label><input type="text" name="pertanyaan" placeholder="Add Questions" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="opt1" class=" form-control-label">Pilihan Ganda 1</label><input type="text" name="opt1" placeholder="Tambah Pilihan Ganda 1" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="opt2" class=" form-control-label">Pilihan Ganda 2</label><input type="text" name="opt2" placeholder="Tambah Pilihan Ganda 2" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="opt3" class=" form-control-label">Pilihan Ganda 3</label><input type="text" name="opt3" placeholder="Tambah Pilihan Ganda 3" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                    <label for="opt4" class=" form-control-label">Pilihan Ganda 4</label><input type="text" name="opt4" placeholder="Tambah Pilihan Ganda 4" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="jawaban" class=" form-control-label">Jawaban</label><input type="text" name="jawaban" placeholder="Tambah Jawaban" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit1" value="Tambahkan Soal" style="border-radius:5px ;" class="btn btn-success">
                            </div>
                            <a href="tampil_soal.php?id=<?= $id_kat ?>" class="text-primary">Tampilkan Semua Soal Pada Kategori <?=  $kategori ;  ?> </a>
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
    
   if(isset($_POST['submit1'])){

       $no_pertanyaan = $_POST['no_pertanyaan'];
       $loop=0;
         $res= mysqli_query($conn,"SELECT * FROM soalsoal WHERE id_kategori='$id_kat'");
            while($row=mysqli_fetch_array($res)){
                $loop++;
                mysqli_query($conn,"UPDATE soalsoal SET no_pertanyaan='$loop' WHERE id_soal='$row[id_soal]'");
            }
            $no_pertanyaan = $loop+1;


        $pertanyaan = $_POST['pertanyaan'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        $opt4 = $_POST['opt4'];
        $jawaban = $_POST['jawaban'];
        $id_kat = $_GET['id'];
        $res = "INSERT INTO soalsoal (no_pertanyaan, id_kategori, pertanyaan, opt1, opt2, opt3, opt4, jawaban) VALUES ('$no_pertanyaan','$id_kat', '$pertanyaan', '$opt1', '$opt2', '$opt3', '$opt4', '$jawaban')";
        $result = mysqli_query($conn, $res);
        if($result){
            echo "<script>alert('Soal Berhasil Ditambahkan');</script>";
            echo "<script>location='tampil_soal.php?id=$id_kat';</script>";
        }else{
            echo "<script>alert('Soal Gagal Ditambahkan');</script>";
            echo "<script>location='tambah_edit_soal.php?id=$id_kat';</script>";
        }
    }
   
        
    
?>






 <?php include "footer.php" ?>                              