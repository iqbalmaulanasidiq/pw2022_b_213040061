<?php 
// date
// untuk menampilkan tanggal dgn format tertentu
    echo date("l");
    echo "<br>";
    echo date("d");
    echo "<br>";
    echo date("m");
    echo "<br>";
    echo date("M");
    echo "<br>";
    echo date("l, d-M-Y");
    echo "<br>";

    // Time
    // UNIX Timestamp /EPOCH time
    // detik yang sudah berlalu sejak 1 Januari 1970
    echo time();
    echo "<br>";
    echo date("d-M-Y", time()+60*60*24*100);
    echo "<br>";
    // mktime
    // membuat sendiri detik
    // mktime(0,0,0,0,0,0)
    // jam, menit, detik, bulan, tanggal, tahun
    echo date("l", mktime(0,0,0,8,25,1985));

    // strtotime
    echo date("l", strtotime("25 aug 1985"));

    

?>