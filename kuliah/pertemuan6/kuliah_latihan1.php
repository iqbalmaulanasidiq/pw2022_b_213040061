<?php

// array Associative
// array yang indeknya berupa string, yang berasosiasi dengan nilainya
$mahasiswa = [
    ["nama"=>"muhammad ardhia nugraha", 
    "npm" => "213040068", 
    "email" => "ardhi.213040068@mail.unpas.ac.id", 
    "jurusan" => "Teknik Informatika"],

    ["nama" => "iqbal maulana sidiq", 
    "npm" => "213040061", 
    "email" => "iqbal.213040061@mail.unpas.ac.id",  
    "jurusan" => "Teknik Informatika"],

    ["nama" => "rivan", 
    "email" => "rivan.213040061@mail.unpas.ac.id",
    "jurusan" => "Teknik Informatika",
    "npm" => "213040058"],
];
// var_dump($mahasiswa[1]["npm"]);
// echo "<br>";
// var_dump($mahasiswa[0]["email"]);
// echo "<br>";
?>
<?php foreach ($mahasiswa as $m) :?>
    <ul>
      <li>Nama : <?= $m["nama"];?></li>
      <li>NPM : <?= $m["npm"];?></li>
      <li>Email : <?= $m["email"];?></li>
      <li>Jurusan : <?= $m["jurusan"];?></li>
    </ul>
<?php endforeach?>



