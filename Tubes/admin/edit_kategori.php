<?php 
    require "header.php";
    require "../connection.php";
    $id=$_GET["id"];
    $res=mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
    while($row=mysqli_fetch_array($res)){
        $kategori=$row["kategori_ujian"];
        $waktu=$row["waktu_menit"];
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
                                    <div class="form-group"><label for="vat" class=" form-control-label">Waktu Ujian</label><input type="text" name="waktu_menit" value="<?=  $waktu; ?>" class="form-control"></div>
                                    <div class="form-group"><input type="submit" name="submit1" value="Perbaharui Kategori Ujian" style="border-radius:5px ;" class="btn btn-success"></div>
                                        
                

            </div>
            
        </div> 
        
    </div>
    <!--/.col-->
    

</div>

            </form>
</div><!-- .animated -->
</div><!-- .content -->

<?php 
    if(isset($_POST["submit1"])){
        mysqli_query($conn, "UPDATE kategori SET kategori_ujian='$_POST[kategoriujian]', waktu_menit='$_POST[waktu_menit]' WHERE id_kategori='$id'  ") or die(mysqli_error($conn));
        echo "
        <script>
        alert('Kategori Ujian Berhasil Diubah');
        window.location='kategori.php';
        </script>";
    }
?>
 <?php require "footer.php" ?>                              