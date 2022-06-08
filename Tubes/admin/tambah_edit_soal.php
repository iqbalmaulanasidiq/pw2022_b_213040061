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



<!-- mulai -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-body">
            <div class="col-lg-12">
                        <div class="card">
                        <form action="" name="form1" method="POST">
                        <div class="card">
                            
                        <div class="card-header"><strong>Tambah Pertanyaan Untuk Kategori <?= "<font color='red'>" . $kategori. "</font>"  ?></strong><br>
                        
                            
                            <div class="card-body card-block">
                            <div class="form-group">
                               
                            

                            <div class="form-floating">
                            <label for="floatingTextarea2"><strong>Tambahkan Pertanyaan</strong></label>
                            <textarea class="form-control" placeholder="Tambahkan Pertanyaan" name="pertanyaan" id="floatingTextarea2" style="min-height: 150px"></textarea>
                            
                            </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <input type="submit" name="submit1" value="Tambahkan Soal" style="border-radius:5px ;" class="btn btn-success">
                            </div>
                            
                            </div>            
                
                 </form>         
                

            </div>
            
        </div> 
        
    </div>
    <!--/.col-->
    

</div>
            <div class="col-lg-12">
                        <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                    <strong class="card-title ">Pertanyaan Pada Kategori <?= $kategori; ?></strong>
                   
                    </div>  
                            <div class="card-body">
                            <div id="tampilkan">

                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col" style="width: 10px;">No</th>
                                        
                                        <th scope="col">Pertanyaan</th>
                                        
                                        <th scope="col" style="width: 90px;">Aksi</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                   
                                        $res=mysqli_query($conn,"SELECT * FROM soalsoal WHERE id_kategori='$id_kat'");
                                        $no=1;
                                        while($row=mysqli_fetch_array($res)){
                                       
                                            ?>
                                                <tr>
                                                
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row["pertanyaan"]; ?></td>
                                                    
                                                    
                                                    <td style="text-align:center">
                                                    <a href="edit_soal.php?id=<?= $id_kat ?>&id_soal=<?= $row['id_soal']?>"><i class="bi bi-pencil-square text-warning fa-lg"></i></a> <strong>||</strong> 
                                                    <a href="delete_soal.php?id=<?= $id_kat ?>&id_soal=<?= $row['id_soal'];?>" ><i class="bi bi-trash text-danger fa-lg" onclick="return confirm('Yakin Hapus Pertanyaan?'); "></i></a>
                                                    </td>
                                                    
                                                </tr>
                                            <?php
                                        }
                                    ?>


                            <!-- <?php 
                            if(isset($_POST['cari'])){
                                $cari = $_POST['cari'];
                                $query = "SELECT * FROM soalsoal  WHERE id_kategori='$id_kat' AND pertanyaan LIKE '%$cari%'";
                            }else{
                                $query = "SELECT * FROM soalsoal WHERE id_kategori='$id_kat'";
                            }
                            $result = mysqli_query($conn, $query);
                            $no = 1;
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                                
                                    <td><?= $row["no_pertanyaan"]; ?></td>
                                    <td><?= $row["pertanyaan"]; ?></td>
                                    
                                    
                                    <td style="text-align:center">
                                    <a href="edit_soal.php?id=<?= $id_kat ?>&id_soal=<?= $row['id_soal']?>"><i class="bi bi-pencil-square text-warning fa-lg"></i></a> <strong>||</strong> 
                                    <a href="delete_soal.php?id=<?= $id_kat ?>&id_soal=<?= $row['id_soal'];?>" ><i class="bi bi-trash text-danger fa-lg" onclick="return confirm('Yakin Hapus Pertanyaan?'); "></i></a>
                                    </td>
                                    
                                </tr>
                                <?php } ?> -->
                                    
                                    
                                </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>

<!-- selesai -->















</div><!-- .animated -->
</div><!-- .content -->

<?php 
    
   if(isset($_POST['submit1'])){

       
       
        


        $pertanyaan = $_POST['pertanyaan'];
        $id_kat = $_GET['id'];
        $res = "INSERT INTO soalsoal ( id_kategori, pertanyaan) VALUES ('$id_kat', '$pertanyaan')";
        $result = mysqli_query($conn, $res);
        if($result){
            echo "<script>alert('Soal Berhasil Ditambahkan');</script>";
            echo "<script>location='tambah_edit_soal.php?id=$id_kat';</script>";
        }else{
            echo "<script>alert('Soal Gagal Ditambahkan');</script>";
            echo "<script>location='tambah_edit_soal.php?id=$id_kat';</script>";
        }
    }
   
        
    
?>






 <?php include "footer.php" ?>                              