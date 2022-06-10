<?php 
    require "header.php";
    require "../connection.php";
    $id=$_GET["id"];
    $res=mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
    while($row=mysqli_fetch_array($res)){
        $kategori=$row["kategori_ujian"];

    }
?>
<div class="breadcrumbs">
<div class="col-sm-4">
<div class="page-header float-left">
    <div class="page-title">
        <h1>Edit Kategori Ujian </h1>
    </div>
</div>
</div>

</div>

<div class="content mt-3">
<div class="animated fadeIn">


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="" name="form1" method="POST">
            <div class="card-body">
            <div class="col-lg-6">
                        <div class="card">
                        <div class="card-header"><strong>Edit Kategori Ujian</strong>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="kategoriujian" class=" form-control-label">Kategori Ujian</label><input type="text" name="kategoriujian" value="<?=  $kategori; ?>" class="form-control"></div>
                                    <div class="form-group"><input type="submit" name="submit1" value="Perbaharui Kategori Ujian" style="border-radius:5px ;" class="btn btn-success"></div>
                                        
                

            </div>
            
        </div> 
        </form>
        
    </div>
    <!--/.col-->
    

</div>
<div class="col-lg-6">
                        <div class="card ">
                            <div class="card-header   ">
                                <strong class="card-title " >Kategori Ujian</strong>
                               
                            </div>
                            <div class="card-body">
                            
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 30px;">#</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col" style="width: 90px;">ACTION</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php 
                                        
                                        $query = "SELECT * FROM kategori";
                                        $result = mysqli_query($conn, $query);
                                        $no = 1;
                                        while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no++ ?></th>
                                                <td><?php echo $row['kategori_ujian'] ?></td>
                                                
                                                <td style="text-align:center">
                                                    <a href="edit_kategori.php?id=<?= $row['id_kategori'];?>"><i class="bi bi-pencil-square text-warning fa-lg"></i></a> <strong>||</strong> 
                                                    <a href="delete_kategori.php?id=<?= $row['id_kategori'];?>" ><i class="bi bi-trash text-danger fa-lg" onclick="return confirm('Yakin Hapus Kategori?'); "></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>


                                    
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
          
</div><!-- .animated -->
</div><!-- .content -->

<?php 
    if(isset($_POST["submit1"])){
        mysqli_query($conn, "UPDATE kategori SET kategori_ujian='$_POST[kategoriujian]' WHERE id_kategori='$id'  ") or die(mysqli_error($conn));
        echo "
        <script>
        alert('Kategori Ujian Berhasil Diubah');
        document.location='soal.php';
        </script>";
    }
?>
 <?php require "footer.php" ?>                              