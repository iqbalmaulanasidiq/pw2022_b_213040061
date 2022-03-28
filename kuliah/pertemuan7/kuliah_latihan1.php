<?php 
    // SUPERGLOBAL
    // variabel bawaan php yang bisa di akses dimanapun.
    // bentuknya array associative
    // $_GET
    // $_POST
    // $_SERVER
    // $_GET["nama"]='Iqbal';
    // $_GET["email"]='iqbal.213040061@mail.unpas.ac.id';
    // $_GET= ["nama" => "Iqbal", "email" => "iqbal.213040061@mail.unpas.ac.id"];

    // var_dump($_GET);


?>
<!-- <h1>Hallo, <?= $_GET["nama"]; ?></h1> -->
<ul>
    <li>
        <a href="kuliah_latihan2.php?nama=Iqbal&npm=213040061&email=iqbalsidiq523@gmail.com">Iqbal</a> 
              
    </li>
    <li>
        <a href="kuliah_latihan2.php?nama=Rivan&npm=213040058&email=rivan@gmail.com">Rivan</a>      
    </li>
    <li>
        <a href="kuliah_latihan2.php?nama=Ardhi&npm=213040068&email=ardhi@gmail.com">Ardhi</a>       
    </li>
</ul>