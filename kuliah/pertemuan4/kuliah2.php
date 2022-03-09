<?php
// definisikan masing masing sisi kubus 
$a = 9;
$b = 4;

// hitung masing masing volume kubus
$volume_a = $a * $a * $a;
$volume_b = pow($b, 3);

// total 2 volume
$total = $volume_a + $volume_b;

// cetak / kembalikan nilai total

echo "Jumlah dari volume kubus a dan sisi $a dan kubus b dengan sisi $b adalah $total";

echo "<hr>";


function totalVolumeDuaKubus($a, $b){
   
$volume_a = $a * $a * $a;
$volume_b = pow($b, 3);


$total = $volume_a + $volume_b;

    return "Jumlah dari volume kubus dengan sisi $a dan kubus dengan sisi $b adalah $total";
}

echo totalVolumeDuaKubus(9, 4);
echo "<br>";
echo totalVolumeDuaKubus(100,12);
echo "<hr>";

// buat sebuah fungsi untuk menghitung luas segitiga
function luasSegita($alas, $tinggi){
    $luas = 1/2 *($alas * $tinggi);
    return "luas segitiga dengan alas $alas dan tinggi $tinggi adalah $luas";
}

echo luasSegita(2,4);
echo "<br>";
echo luasSegita(10,8);
echo "<hr>";
?>