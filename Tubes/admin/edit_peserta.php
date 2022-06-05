<?php 
    require "header.php";
    require "../connection.php";
    $id=$_GET["id"];
    $res=mysqli_query($conn, "SELECT * FROM peserta WHERE id=$id");
    while($row=mysqli_fetch_array($res)){
        
        $nama_peserta=$row["nama_peserta"];
        $username=$row["username"];
        $email=$row["email"];
        $pass=$row["pass"];
        $gambar=$row["gambar"];
        
    }
?>
<div class="breadcrumbs">
<div class="col-sm-4">
<div class="page-header float-left">
    <div class="page-title">
        <h1>Ubah Data Mahasiswa</h1>
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
                        <h3 class="text-center">Ubah Data Peserta</h3>
                    </div>
                    <hr>
                    <form action="" method="POST" enctype="multipart/form-data">
                       
                        <div class="form-group">
                            <label for="nama_peserta" class="control-label mb-1">Nama Mahasiswa</label>
                            <input id="nama_peserta" name="nama_peserta" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?=  $nama_peserta; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label mb-1">Username</label>
                            <input id="username" name="username" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?=  $username; ?>">
                        <div class="form-group">
                            <label for="email" class="control-label mb-1">Email</label>
                            <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" value="<?=  $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pass" class="control-label mb-1">Password</label>
                            <input id="pass" name="pass" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?=  $pass; ?>">
                        </div>      
                        <div class="form-group">
                            <label for="gambar" class="control-label mb-1" >Gambar</label>
                            <input id="gambar" name="gambar" type="file" class="form-control" aria-required="true" aria-invalid="false"  >
                        </div>     
                                <button id="payment-button" name="submit1" type="submit" class="btn btn-lg btn-primary rounded">
                                    Edit Data Peserta
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
       $sql = mysqli_query($conn, "UPDATE peserta SET nama_peserta='$nama_peserta', username='$username', email='$email', pass='$pass', gambar='$gambar' WHERE id='$id'");
        if($sql){
            echo "<script>
            alert('Data Peserta Berhasil Diubah');
            location.href='data_peserta.php';
            </script>";
        }else{
            echo "<script>
            alert('Data Peserta Gagal Diubah');
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
<!-- }

    // if(isset($_POST["submit1"])){
    //     $ekstensi_diperbolehkan	= array('png','jpg');
    //     $nama = $_FILES['gambar']['name'];
    //     $x = explode('.', $nama);
    //     $ekstensi = strtolower(end($x));
    //     $ukuran	= $_FILES['gambar']['size'];
    //     $file_tmp = $_FILES['gambar']['tmp_name'];
               	
    //     if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    //         if($ukuran < 1044070){			
    //             move_uploaded_file($file_tmp, '../assets/img/'.$nama);
    //             $query = mysqli_query($conn, "UPDATE peserta SET nama_peserta='$_POST[nama_peserta]', username='$_POST[username]', email='$_POST[email]', pass='$_POST[pass]', gambar='$nama' WHERE id='$_GET[id]'");
    //             if($query){
    //                echo "<script>alert('Data Berhasil Diperbaharui'); window.location='data_peserta.php'</script>";
    //             }else{
    //                 echo "<script>alert('Data Gagal Diperbaharui'); window.location='tambah_peserta.php'</script>";
    //             }
    //         }else{
    //             echo "<script>alert('Ukuran File Terlalu Besar'); window.location='tambah_peserta.php'</script>";
    //         }
    //     }else{
    //         echo "<script>alert('Ekstensi File Tidak Diperbolehkan'); window.location='data_peserta.php'</script>";
    //     }
    // }
?> -->







 <?php require "footer.php" ?>                              