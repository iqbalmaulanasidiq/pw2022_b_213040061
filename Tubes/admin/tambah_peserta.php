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

        $nama_peserta = htmlspecialchars($_POST["nama_peserta"]);
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $pass = htmlspecialchars($_POST["pass"]);
        
        if($_FILES["gambar"]["error"] === 4) {
            // pilih gambar default
            $gambar = "nophoto.png";
        } else {
            // jalankan fungsi upload
            $gambar = upload();
            // cek jika upload gagal
            if (!$gambar) {
                return false;
            }
        }
        $sql = mysqli_query($conn, "INSERT INTO peserta (id, nama_peserta, username, email, pass, gambar) VALUES (NULL,'$nama_peserta', '$username', '$email', '$pass', '$gambar')")or die(mysqli_error($conn));
        if($sql){
            echo "<script>
            alert('Data Peserta Berhasil Ditambahkan');
            location.href='data_peserta.php';
            </script>";
           }
        
        
    }

function upload(){
    $filename = $_FILES['gambar']['name'];
    $filetmpname = $_FILES['gambar']['tmp_name'];
    $filesize = $_FILES['gambar']['size'];
    $filetype = pathinfo($filename, PATHINFO_EXTENSION);
    $allowedtype = ['jpg', 'jpeg', 'png'];


    if(!in_array($filetype, $allowedtype)){
        echo "<script>
        alert('File yang diupload harus berformat .jpg, .jpeg, .png');
        </script>";
        return false;
    }else{
        if($filesize > 2000000){
            echo "<script>
            alert('Ukuran file terlalu besar');
            </script>";
            return false;
        }
    }

   $newname = uniqid().$filename;
   move_uploaded_file($filetmpname, '../assets/img/'.$newname);
    return $newname;
   

}


?>

 <?php require "footer.php" ?>                              