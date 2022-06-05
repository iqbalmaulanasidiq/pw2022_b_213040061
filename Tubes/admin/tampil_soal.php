<?php 
require "header.php" ;
require "../connection.php" ;
$kategori='';
$id_kat=$_GET["id"];
$res= mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori='$id_kat'");
while($row=mysqli_fetch_array($res)){
    $kategori = $row['kategori_ujian'];
    // $exam_time_in_minutes = $row['exam_time_in_minutes'];
}
?>
<div class="breadcrumbs">
<div class="col-sm-12 " >
<div class="page-header float-left">
    <div class="page-title">
        <h1 style="text-align:center ;">Soal Soal Pada Matakuliah <?= "<font color='red'>" . $kategori. "</font>"  ?></h1>
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
              
            <a href="tambah_edit_soal.php?id=<?= $id_kat;?> " class="btn btn-primary rounded mb-2"> Tambah Soal</a>
             
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Pertanyaan</th>
                        <th scope="col">Pertanyaan</th>
                        <th scope="col">OPSI 1</th>
                        <th scope="col">OPSI 2</th>
                        <th scope="col">OPSI 3</th>
                        <th scope="col">OPSI 4</th>
                        <th scope="col">Jawaban</th>
                        <th scope="col">Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 0 ;
                        $res=mysqli_query($conn,"SELECT * FROM soalsoal WHERE id_kategori='$id_kat'");
                        while($row=mysqli_fetch_array($res)){
                        $count++;
                            ?>
                                <tr>
                                    <th scope="row"><?= $count; ?></th>
                                    <td><?= $row["no_pertanyaan"]; ?></td>
                                    <td><?= $row["pertanyaan"]; ?></td>
                                    <td><?= $row["opt1"]; ?></td>
                                    <td><?= $row["opt2"]; ?></td>
                                    <td><?= $row["opt3"]; ?></td>
                                    <td><?= $row["opt4"]; ?></td>
                                    <td><?= $row["jawaban"]; ?></td>
                                    
                                    <td style="text-align:center">
                                    <a href="edit_soal.php?id=<?= $id_kat ?>&id_soal=<?= $row['id_soal']?>"><i class="bi bi-pencil-square text-warning fa-lg"></i></a> <strong>||</strong> 
                                    <a href="delete_soal.php?id=<?= $id_kat ?>&id_soal=<?= $row['id_soal'];?>" ><i class="bi bi-trash text-danger fa-lg" onclick="return confirm('Yakin Hapus Pertanyaan?'); "></i></a>
                                    </td>
                                    
                                </tr>
                            <?php
                        }
                    ?>
                    
                    
                </tbody>
            </table>

            </div>
        </div> 

    </div>
    <!--/.col-->


</div>
</div><!-- .animated -->
</div><!-- .content -->
 <?php include "footer.php" ?>                              