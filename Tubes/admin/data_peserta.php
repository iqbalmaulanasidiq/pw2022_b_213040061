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
                            <div class="card-header d-flex justify-content-between">
                                <strong class="card-title ">Data Peserta</strong>
                                <form action="data_peserta.php" method="POST" >
                                <input type="text" name="cari" autocomplete="off" placeholder="Silahkan Cari" class="form-control" >
                                
                                </form>
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
                                        if(isset($_POST['cari'])){
                                            $cari = $_POST['cari'];
                                            $query = "SELECT * FROM peserta WHERE nama_peserta LIKE '%$cari%'OR username LIKE '%$cari%' OR email LIKE '%$cari%'";
                                        }else{
                                            $query = "SELECT * FROM peserta";
                                        }
                                        $result = mysqli_query($conn, $query);
                                        $no = 1;
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no++ ?></th>
                                                <td><?php echo $row['nama_peserta'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['pass'] ?></td>
                                                <td><img src="../assets/img/<?= $row["gambar"]; ?>" width="70px" class="rounded"></td>
                                                <td style="text-align:center">
                                                            <a href="edit_peserta.php?id=<?= $row['id'];?>"><i class="bi bi-pencil-square text-warning fa-lg"></i></a> <strong>||</strong> 
                                                            <a href="delete_peserta.php?id=<?= $row['id'];?>" ><i class="bi bi-trash text-danger fa-lg" onclick="return confirm('Yakin Hapus Data Peserta?'); "></i></a>
                                                        </td>
                                            </tr>
                                            <?php } ?>
                                    




                                       
                                        
                                       
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