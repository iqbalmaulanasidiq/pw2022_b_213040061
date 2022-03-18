<?php
//array
//array adalah variable yang dapat menyimpan lebih dari satu nilai sekaligus

$hari1 = "senin";
$hari2 = "selasa";
$hari7 = "minggu";

$bulan1 = "Januari";
$bulan12 = "Desembber";

$mahasiswa = "orang";

//membuat array
$hari = ["senin","selasa","rabu","kamis"]; //membuat array dengan cara baru
$bulan = array("Januari","Februari","Maret"); // membuat array dengan cara lama
$myArray = [100,"pukimen",false];

//menampilkan array
//menampilkan 1 elemen menggunakan index, dimulai dari 0
echo $hari[1];
echo "<br>";
echo $bulan[2];
echo "<hr>";

//menampilkan semua isi array sekaligus
//var_dump() atau print_r()
//khusus debuging
var_dump($hari);
echo "<br>";
print_r($hari);
echo "<hr>";

//mencetak semua isi array menggunakan looping

for($x = 0; $x < count($hari); $x++) {
  echo $hari[$x];
  echo "<br>";
}
echo "<hr>";

//foreach
foreach ($bulan as $key) {
    echo $key;
    echo "<br>";
}

//memanipulasi array
//menambahkan element di akhir array
$hari[]="jum'at";
$hari[]="sabtu";
var_dump($hari);



