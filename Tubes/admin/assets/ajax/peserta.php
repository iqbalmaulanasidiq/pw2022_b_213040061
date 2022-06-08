<?php 
require "../../../connection.php";
$cari = $_GET['cari'];

?>

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
                                        $no= 1;
                                        $keyword= "";
                                        if(isset($_GET['cari'])){
                                            $keyword = $_GET['cari'];
                                        }

                                        $query = "SELECT * FROM peserta WHERE nama_peserta LIKE '%$keyword%' OR username LIKE '%$keyword%' OR email LIKE '%$keyword%'";
                                        $result = mysqli_query($conn, $query);
                                        $res= mysqli_num_rows($result);
                                        if($res >0){
                                            while($row= mysqli_fetch_array($result)){
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
                                                <?php
                                            }
                                        }else{
                                            ?>
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    <h3>Data Tidak Ditemukan</h3>
                                                </td>
                                            </tr>
                                            <?php
                                        }

                                    ?>

                                    
                                    




                                       
                                        
                                       
                                    </tbody>
                                </table>
