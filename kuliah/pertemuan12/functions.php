<?php

// function koneksi untuk koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "", "pw2022_b_213040061") or die('KONEKSI GAGAL');

    return $conn;
}

// function query untuk mengambil data dari database
function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // siapkan data $mahasiswa
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// function tambah untuk menambahkan data ke database
function tambah($data)
{
    $conn = koneksi();

    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "INSERT INTO
                mahasiswa
                VALUES
                ( null, '$npm', '$nama', '$email', '$jurusan', '$gambar')";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

// function hapus untuk menghapus data dari database
function hapus($id)
{
    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

// function ubah untuk mengubah data dari database
function ubah($data)
{
    $conn = koneksi();

    $id = $data['id'];
    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "UPDATE mahasiswa SET
                npm = '$npm',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

// function cari untuk mencari data dari database
function cari($keyword)
{
    $conn = koneksi();

    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                npm LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
