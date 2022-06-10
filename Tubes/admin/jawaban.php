<?php require "header.php"; require "../connection.php" ?>
<div class="breadcrumbs">
<div class="col-sm-4">
<div class="page-header float-left">
    
</div>
</div>

</div>

<div class="content mt-3">
<div class="animated fadeIn">

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <strong class="card-title ">Data Nilai Peserta</strong>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    
                    <a href="download_nilai.php" target="_blank" class="btn btn-primary rounded m-2"><i class="fa fa-download p-2"></i></a>
                </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10px;">#</th>
                                <th scope="col">Nama Peserta</th>
                                <th scope="col"  data-order="asc">Kategori</th>
                                <th scope="col" style="width: 10px;">jawaban</th>
                                <th scope="col">Nilai</th>
                                <th scope="col" style="width: 90px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                            $query= mysqli_query($conn, "SELECT * FROM jawaban INNER JOIN peserta ON jawaban.id = peserta.id INNER JOIN kategori ON jawaban.id_kategori = kategori.id_kategori");
                            
                            while($data = mysqli_fetch_array($query)){
                                $jawaban_soal = $data['jawaban_soal'];
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama_peserta']; ?></td>
                                        <td><?php echo $data['kategori_ujian']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-success rounded" style="width: 100%;" href="download_jawaban.php?filename=<?= $jawaban_soal ?>"><i class="fa fa-download text-success "></i></a>
                                        </td>
                                        <td><?php echo $data['nilai']; ?></td>
                                        <td style="text-align:center">
                                            <a href="tambah_nilai.php?id_jawaban=<?= $data['id_jawaban']?>"><i class="bi bi-plus text-dark fa-lg btn-primary rounded"></i></a> <strong>||</strong> 
                                            <a href="delete_jawaban.php?id_jawaban=<?= $data['id_jawaban']?>" ><i class="bi bi-trash text-dark fa-lg btn-danger rounded" onclick="return confirm('Yakin Hapus Data Peserta?'); "></i></a>
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
</div>
</div>


</div><!-- .animated -->
</div><!-- .content -->


<?php require "footer.php" ?>      