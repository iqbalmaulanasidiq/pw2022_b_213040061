<?php 
    require "../connection.php";
    $id=$_GET['id'];
    mysqli_query($conn,"DELETE FROM kategori WHERE id_kategori='$id'");
?>

<script type="text/javascript">
    alert("Kategori Ujian Telah Di Hapus");
    document.location="soal.php";
</script>