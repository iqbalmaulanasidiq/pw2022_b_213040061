<?php 
// $mahasiswa = [
//     ["Iqbal Maulana Sidiq", "213040061","iqbalsidiq523@gmail.com","Teknik Informatika"],
//     ["M Ardhi", "213040058","ardhia@gmail.com","Teknik Informatika"]
// ];

// array associative
// definisinya sama seperti array numerik, kecuali
// key -nya adalah string yang kita buat sendiri

$mahasiswa = [
    [
    "nama" => "Iqbal Maulana Sidiq", 
    "nrp" => "213040061",
    "email" => "iqbalsidiq523@gmail.com",
    "jurusan" => "Teknik Informatika",
    "gambar" => "5.jpg"
    ],
    [
        "nama" => "Maman", 
        "nrp" => "213040000",
        "email" => "maman@gmail.com",
        "jurusan" => "Teknik Informatika",
        "gambar" => "5.jpg"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar mahasiswa</title>
    <style>
        img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs): ?>
    <ul>
        <li>
            <img src="img/<?= $mhs["gambar"] ?>" alt="" srcset="">
        </li>
        <li>Nama :<?= $mhs["nama"]; ?></li>
        <li>NRP :<?= $mhs["nrp"]; ?></li>
        <li>Email :<?= $mhs["jurusan"]; ?></li>
        <li>Jurusan :<?= $mhs["email"]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>