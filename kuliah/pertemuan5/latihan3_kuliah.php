<?php
$mahasiswa = [
    ["muhammad ardhia nugraha","213040068","ardhi.213040068@mail.unpas.ac.id","Teknik Informatika"],
    ["iqbal maulana sidiq","213040061","iqbal.213040061@mail.unpas.ac.id","Teknik Informatika"],
    ["rivan","213040058","rivan.213040061@mail.unpas.ac.id","Teknik Informatika"]
];

// foreach ($mahasiswa as $key => $value) {
//     foreach ($value as $key => $value) {
//         echo $value;
//         echo "<br>";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($mahasiswa as $key) :?>
        <ul>
            <?php foreach($key as $value):?>
                <li><?= $value?></li>
            <?php endforeach?>
        </ul>
    <?php endforeach?>

    <hr>
    
    <?php foreach ($mahasiswa as $key) :?>
        <ul>
          <li>Nama : <?= $key[0]?></li>
          <li>NPM : <?= $key[1]?></li>
          <li>Email : <?= $key[2]?></li>
          <li>Jurusan : <?= $key[3]?></li>
        </ul>
    <?php endforeach?>
</body>
</html>
