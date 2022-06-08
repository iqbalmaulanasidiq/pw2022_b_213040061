<?php 
require "../../../connection.php";
$cari = $_GET['cari'];

?>
<table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col" style="width: 10px;">#</th>
                        <th scope="col">Kategori</th>
                       
                        <th scope="col" style="width: 150px;">ACTION</th>
                        
                    </tr>
                </thead>
                <tbody>

                <!-- <?php 
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query = "SELECT * FROM kategori WHERE Kategori_ujian LIKE '%$cari%'";
            }else{
                $query = "SELECT * FROM kategori";
            }
            $result = mysqli_query($conn, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?= $row["kategori_ujian"]; ?></td>
                    <td style="text-align:center">
                        <a href="tambah_edit_soal.php?id=<?= $row['id_kategori'];?>"><i class="bi bi-plus-circle-fill text-dark rounded fa-lg btn btn-primary"></i></a>
                    </td>
                </tr>
                <?php } ?> -->



                <?php 
                        $no= 1;
                        $keyword= "";
                        if(isset($_GET['cari'])){
                            $keyword = $_GET['cari'];
                        }

                        $query = "SELECT * FROM kategori WHERE Kategori_ujian LIKE '%$cari%'";
                        $result = mysqli_query($conn, $query);
                        $res= mysqli_num_rows($result);
                        if($res >0){
                            while($row= mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?= $row["kategori_ujian"]; ?></td>
                                <td style="text-align:center">
                                    <a  href="tambah_edit_soal.php?id=<?= $row['id_kategori'];?>"><i class="bi bi-plus-circle-fill text-primary rounded fa-lg  "></i></a><strong>||</strong>
                                    <a href="edit_kategori.php?id=<?= $row['id_kategori'];?>"><i class="bi bi-pencil-square text-warning fa-lg"></i></a> <strong>||</strong> 
                                    <a href="delete_kategori.php?id=<?= $row['id_kategori'];?>" ><i class="bi bi-trash text-danger fa-lg" onclick="return confirm('Yakin Hapus Kategori?'); "></i></a>
                                </td>
                            </tr>
                                <?php
                        }
                        }else{
                            ?>
                            <tr>
                                <td colspan="3" class="text-center">
                                    <h3>Data Tidak Ditemukan</h3>
                                </td>
                            </tr>
                            <?php
                        }

                ?>



                   
                    
                    
                </tbody>
            </table>