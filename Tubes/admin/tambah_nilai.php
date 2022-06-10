<?php 
require "header.php"; require "../connection.php";
$id_jawaban = $_GET['id_jawaban'];
$sql = mysqli_query($conn, "SELECT * FROM jawaban  INNER JOIN peserta ON jawaban.id = peserta.id INNER JOIN kategori ON jawaban.id_kategori = kategori.id_kategori WHERE id_jawaban = '$id_jawaban'"); 

while($data = mysqli_fetch_array($sql)){
    $nama_peserta = $data['nama_peserta'];
    $kategori_ujian = $data['kategori_ujian'];
}
    
    
?>
<div class="breadcrumbs">
<div class="col-sm-12">
<div class="page-header float-left">
    <div class="page-title">
        <h1>Input Nilai <font style="color: red;"> <?= $nama_peserta; ?></font> untuk kategori <font style="color: red;"> <?= $kategori_ujian; ?></font>  </h1>
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
            <div class="col-lg-12">
                        <div class="card">
                        <form action="" name="form1" method="POST">
                            <div class="card-header"><strong>Input Nilai</strong>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Kategori <?= $kategori_ujian ?></label><input type="text" name="nilai" placeholder="Input Nilai " class="form-control"></div>
                                    
                                    <div class="form-group"><input type="submit" name="submit1" value="INPUT NILAI" class="btn btn-success rounded" ></div>
                        </form>                
                

            </div>
            
        </div> 
        
    </div>
    <!--/.col-->
    

</div>

           
</div><!-- .animated -->
</div><!-- .content -->
<?php 
require "footer.php";
?>

<?php 
if(isset($_POST["submit1"])){
    mysqli_query($conn, "UPDATE jawaban SET nilai = '$_POST[nilai]' WHERE id_jawaban = '$id_jawaban'");
    echo "
    <script>
    alert('Nilai Berhasil Diinput');
    window.location='jawaban.php';
    </script>";
}
?>