<?php 
    require "../connection.php";
   

    $img = "SELECT gambar From peserta WHERE id = '$_GET[id]'";
    $res = mysqli_query($conn, $img);
    $row = mysqli_fetch_array($res);
    if($row['gambar'] != "nophoto.png"){
        unlink("../assets/img/".$row['gambar']);
    }
    $sql = "DELETE FROM peserta WHERE id = '$_GET[id]'";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo "<script>
        alert('Data Peserta Berhasil Dihapus');
        location.href='data_peserta.php';
        </script>";
    }
    
?>

<script type="text/javascript">
    alert("Data Peserta Telah Di Hapus");
    window.location="data_peserta.php";
</script>