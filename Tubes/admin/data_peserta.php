<?php require "header.php"; require "../connection.php" ?>
<div class="breadcrumbs">
<div class="col-sm-4">
<div class="page-header float-left">
    
</div>
</div>

</div>

<div class="content mt-3">
<div class="animated fadeIn">


<div class="row">
    
<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Peserta</strong>
                            </div>
                            <div class="card-body">
                                <a href="tambah_peserta.php" class="btn btn-primary rounded m-2"><i class="fa fa-plus p-2"></i>Tambah Data Peserta</a>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            
                                            <th scope="col">Nama Peserta</th>
                                            <th scope="col">username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Aksi</th>

                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $count = 0 ;
                                            $res=mysqli_query($conn, "SELECT * FROM peserta");
                                            while($row=mysqli_fetch_array($res)){
                                            $count++;
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $count; ?></th>
                                                        <td><?= $row["nama_peserta"]; ?></td>
                                                        <td><?= $row["username"]; ?></td>
                                                        <td><?= $row["email"]; ?></td>
                                                        <td><?= $row["pass"]; ?></td>
                                                        <td><img src="../assets/img/<?= $row["gambar"]; ?>" width="70px" class="rounded"></td>
                                                        <td style="text-align:center">
                                                            <a href="edit_peserta.php?id=<?= $row['id'];?>"><i class="bi bi-pencil-square text-warning fa-lg"></i></a> <strong>||</strong> 
                                                            <a href="delete_peserta.php?id=<?= $row['id'];?>" ><i class="bi bi-trash text-danger fa-lg" onclick="return confirm('Yakin?'); "></i></a>
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
            </form>
</div><!-- .animated -->
</div><!-- .content -->


 <?php require "footer.php" ?>                              