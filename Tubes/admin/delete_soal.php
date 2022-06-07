<?php 
    require "../connection.php";
   $id_kat=$_GET["id"];
    $id_soal=$_GET["id_soal"];
    $res= mysqli_query($conn,"DELETE FROM soalsoal WHERE id_soal='$id_soal'");
    if($res){
        echo "<script>alert('Soal Berhasil Dihapus');</script>";
        echo "<script>location='tambah_edit_soal.php?id=$id_kat';</script>";
    }else{
        echo "<script>alert('Soal Gagal Dihapus');</script>";
        echo "<script>location='tambah_edit_soal.php?id=$id_kat';</script>";
    }
    


?>

