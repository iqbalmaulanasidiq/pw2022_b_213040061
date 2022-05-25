<?php 

  function koneksi(){
    $conn = mysqli_connect("localhost", "root", "", "pw2022_b_213040061")or die('koneksi ke DB gagal');

    return $conn;
  } 
  
  function query($query){
    $conn = koneksi();
    $result = mysqli_query($conn, $query)or die(mysqli_error($conn));

    // siapkan data mahasiswa
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
  }

  function tambah($data){
      $conn = koneksi();
      $npm= htmlspecialchars( $data["npm"]);
      $nama= htmlspecialchars( $data["nama"]);
      $email= htmlspecialchars( $data["email"]);
      $jurusan= htmlspecialchars( $data["jurusan"]);
      $gambar= htmlspecialchars( $data["gambar"]);
      
      $query = "INSERT INTO mahasiswa VALUES(NULL, '$npm', '$nama', '$email', '$jurusan', '$gambar')";

      mysqli_query($conn, $query)or die(mysqli_error($conn));

      return mysqli_affected_rows($conn);
  }

?>