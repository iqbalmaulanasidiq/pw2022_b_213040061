<?php 
require "../connection.php";
require "header.php";
$id = $_SESSION['login']['id'];
$sql = "SELECT * FROM adm WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $nama = $row['nama'];
    $username = $row['kd_admin'];
    $password = $row['pass'];
    $gambar = $row['gambar'];
}
?>

<div class="col-md-12">
    <div class="card rounded">
        <div class="card-header">
            <i class="fa fa-user"></i><strong class="card-title pl-2"> Profil Anda</strong>
        </div>
        <div class="card-body">
            <div class="mx-auto d-block">
                <img width="200px" class="rounded-circle mx-auto d-block" src="../assets/img/<?= $gambar ?>" alt="Card image cap">
                
                <h5 class="text-sm-center mt-2 mb-1"><i class="fa fa-user"></i>&nbsp;<label for="">Nama : &nbsp; </label><?= $nama; ?></h5>
                <div class="location text-sm-center " style="font-size: 20px;"><i class="fa fa-gear h1"></i>&nbsp;<label for="">Username : &nbsp; </label><?= $username; ?></div>
                <div class="location text-sm-center " style="font-size: 20px;"><i class="fa fa-lock h1"></i>&nbsp;<label for="">Password : &nbsp; </label><?= $password; ?></div>
            </div>
           <hr>
        <form action="" enctype="multipart/form-data" method="post">
            
           
                <div class="card">
                    <div class="card-header text-center">
                        <strong >Ubah Profil Anda</strong> 
                    </div>
                    <div class="card-body card-block">
                        <?php 
                        $id = $_SESSION["login"]["id"];
                        $sql = "SELECT * FROM adm WHERE id = '$id'";
                        $result = mysqli_query($conn, $sql);
                        
                        
                        ?>
                        <form action="" enctype="multipart/form-data" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="input1-group1" name="nama"  class="form-control" value="<?= $nama ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-gear"></i></div>
                                        <input type="text" id="input1-group1" name="username"  class="form-control" value="<?= $username ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                        <input type="text" id="input1-group1" name="pass"  class="form-control" value="<?= $password ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon" ><i class="fa fa-upload"></i></div>
                                        <input type="file" id="input1-group1" name="gambar"  class="form-control" >
                                    </div>
                                </div>
                            </div>
                            
                                
                                
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit1" class="btn rounded btn-success btn-sm">
                                <i class="fa fa-upload"></i>&nbsp; Perbaharui
                            </button>
                            
                        </div>
                    </div>
            

        </form>

        </div>
    </div>
</div>


<?php 
require "footer.php";
?>

<?php 
if(isset($_POST["submit1"])){
    $nama = htmlspecialchars($_POST["nama"]);
    $username = htmlspecialchars($_POST["username"]);
    $pass = htmlspecialchars($_POST["pass"]);

    if($_FILES['gambar']['error'] === 4){
        $gambar = "nophoto.png";
    }else{
        $gambar = upload();
        if(!$gambar){
            return false;
        }
    }

    $sql = "UPDATE adm SET  kd_admin = '$username',nama = '$nama', pass = '$pass', gambar = '$gambar' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "
            <script>
            alert('Data Berhasil Diubah');
            window.location = 'profil_admin.php';
            </script>
        ";
    }else{
        echo "
            <script>
            alert('Data Gagal Diubah');
            window.location.href='ubah_profil_admin.php';
            </script>
        ";
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