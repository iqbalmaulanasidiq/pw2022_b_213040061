<?php 
// 4-Function
// build-in function

// date()
// untuk mengetahui waktu saat ini
//  default timezone: UTC (-7jam)

echo date("d");
echo "<br>";
echo date("j");
echo "<br>";
echo date("l");
echo "<br>";
echo date("l, j F Y");
echo "<br>";
echo date("G");
echo "<hr>";
echo date("l", time());
echo "<hr>";

// time()
// UNIX Timestamo / EPOCH Time
// detik yang sudah berlalu sejak 1 Januari 1970
echo time();
echo "<br>";
echo time()+60*60*24;
echo "<hr>";
// hari apa 100 hari kebelakang
echo date("l", time() + 60*60*24*100);
echo "<hr>";

// mktime()
// membuat waktu berdasarkan format
// mktime(0,0,0,0,0,0);
// jam, menit, detik, bulan, tanggal, tahun
echo mktime(10,45,0,3,5,2022);
echo "<hr>";
echo date("l", mktime(0,0,0,9,7,2002));
echo "<hr>";
echo strtotime("7 september 2002");
echo "<br>";
echo mktime(0,0,0,9,7,2002);
echo "<hr>";


// Fungsi Matematika
// pow() untuk pangkat
echo pow(2, 3);
echo "<br>";
echo rand(1, 10);
echo "<br>";

// pembulatan
echo round(2.5); //pembulatan ke nilai terdekat
echo "<br>";
echo ceil(9.1); //pembulatan ke atas (ceiling / langit 2)
echo "<br>";
echo floor(2.9); //pembulatan ke bawah
echo "<hr>";




?>