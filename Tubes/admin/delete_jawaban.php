<?php 
    require "../connection.php";
    $id_jawaban = $_GET['id_jawaban'];
   $sql = "SELECT * FROM jawaban WHERE id_jawaban = '$id_jawaban'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if(isset($row['jawaban_soal'])){
        unlink("../assets/jawaban_peserta/".$row['jawaban_soal']);
    }
    $query = "DELETE FROM jawaban WHERE id_jawaban = '$id_jawaban'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo "<script>
        alert('Data Jawaban Berhasil Dihapus');
        location.href='jawaban.php';
        </script>";
    }else{
        echo "<script>
        alert('Data Jawaban Gagal Dihapus');
        location.href='jawaban.php';
        </script>";
    }