<?php 
require'functions.php';
    $id = $_GET["id"];

    if(hapus($id)>0){
        echo "
        <script>
          alert('Data Berhasil Dihapus!');
          document.location.href = 'kuliah_latihan1.php';
        </script>
        ";
    }
    function hapus($id){
        $conn = koneksi();
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die (mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }
?>