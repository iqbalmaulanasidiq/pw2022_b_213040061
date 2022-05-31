<?php require "header.php"; require "../connection.php" ?>
<div class="breadcrumbs">
<div class="col-sm-4">
<div class="page-header float-left">
    <div class="page-title">
        <h1>Tambah Data Peserta</h1>
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
            <!-- Credit Card -->
            <div id="pay-invoice">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center">Tambah Data Peserta</h3>
                    </div>
                    <hr>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_peserta" class="control-label mb-1">Nama Peserta</label>
                            <input id="nama_peserta" name="nama_peserta" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Masukan Nama Peserta">
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label mb-1">Username</label>
                            <input id="username" name="username" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Masukan Nama Mahasiswa">
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label mb-1">Email</label>
                            <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Masukan Email Mahasiswa">
                        </div>
                        
                        <div class="form-group">
                            <label for="pass" class="control-label mb-1">Password</label>
                            <input id="pass" name="pass" type="password" class="form-control" aria-required="true" aria-invalid="false" placeholder="Masukan Password Mahasiswa">
                        </div>      
                        <div class="form-group">
                            <label for="gambar" class="control-label mb-1" >Gambar</label>
                            <input id="gambar" name="gambar" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                        </div>     
                                <button id="payment-button" name="submit1" type="submit" class="btn btn-lg btn-primary rounded">
                                    Tambah Data
                                </button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div> <!-- .card -->
</div><!-- .animated -->
</div><!-- .content -->

<?php 
    if(isset($_POST["submit1"])){
        $ekstensi_diperbolehkan	= array('png','jpg');
        $nama = $_FILES['gambar']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['gambar']['size'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
               	
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){			
                move_uploaded_file($file_tmp, '../assets/img/'.$nama);
                $query= mysqli_query($conn, "INSERT INTO peserta VALUES(NULL, '$_POST[nama_peserta]', '$_POST[username]','$_POST[email]','$_POST[pass]','$nama')") or die(mysqli_error($conn));
                if($query){
                   echo "<script>alert('Data Berhasil Ditambahkan'); window.location='data_peserta.php'</script>";
                }else{
                    echo "<script>alert('Data Gagal Ditambahkan'); window.location='tambah_peserta.php'</script>";
                }
            }else{
                echo "<script>alert('Ukuran File Terlalu Besar'); window.location='tambah_peserta.php'</script>";
            }
        }else{
            echo "<script>alert('Ekstensi File Tidak Diperbolehkan'); window.location='data_peserta.php'</script>";
        }
    }
        
    
?>

 <?php require "footer.php" ?>                              