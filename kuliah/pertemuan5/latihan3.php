<?php 
$mahasiswa =[
    ["Iqbal Maulana Sidiq", "213040061", "teknik informatika", "iqbalsidiq523@gmail.com"],
    ["Iqbal ", "213040060", "teknik informatika", "iqbalsidiq@gmail.com"],
    ["Iqbal ", "213040060", "teknik informatika", "iqbalsidiq@gmail.com"]

];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    

    <ul>

    <?php foreach($mahasiswa as $mhs) : ?>
        <li>Nama :<?= $mhs[0] ?></li>
        <li>NRP :<?= $mhs[1] ?></li>
        <li>Jurusan :<?= $mhs[2] ?></li>
        <li>Email:<?= $mhs[3] ?></li>
        <?php endforeach; ?>     
    

    </ul>
</body>
</html>