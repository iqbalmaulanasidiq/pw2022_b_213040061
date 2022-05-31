<?php 
    require "../connection.php";
    $id=$_GET['id'];
    $img = "SELECT gambar From peserta WHERE id = '$_GET[id]'";
    $res = mysqli_query($conn, $img);
    $row = mysqli_fetch_array($res);
    if(file_exists("../assets/img/".$row['gambar'])){
        unlink("../assets/img/".$row['gambar']);
        mysqli_query($conn, "DELETE FROM peserta WHERE id = '$_GET[id]'");
    }
    
?>

<script type="text/javascript">
    alert("Data Peserta Telah Di Hapus");
    window.location="data_peserta.php";
</script>