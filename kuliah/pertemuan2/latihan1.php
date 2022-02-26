<?php 
//Pertemuan 2, belajar sintaks PHP

// NILAI
// angka (integer), tulisan (string), true/false (boolean)
echo 10;
echo '<br>';
echo 'Iqbal Maulana Sidiq'; //harus menggunakan kutip
echo '<br>';
echo true; //jika true menampilkan 1, jika false null
echo false;
echo '<hr>';

// VARIABEL
// variabel adalah wadah/tempat untuk menampung nilai
// awali dengan tanda $, namanya bebas
// boleh mengandung angk, tidak boleh diawali angka
// tidak boleh ada spasi
$nama = 'Iqbal Maulana Sidiq';
echo $nama;
echo "<br>";
$nama_depan ='Iqbal';
echo $nama_depan;
echo '<hr>';
// string
// boleh menggunakan '', ""
$hari = 'sabtu';
echo $hari;
echo "<br>";
echo 'Iqbal: "Halo, semua"';
echo '<br>';
// escape character (\)
echo 'Iqbal: "Selamat Hari jum\'at"';
echo '<br>';
echo "Iqbal: \"Selamat Hari jum'at\"";
echo "<br>";
// interpolasi
// mencetak langsung isi variabel
// hanya bisa oleh ""
echo "Halo, nama saya $nama_depan";
echo "<br>";
// concat / penggabungan string
// .
$nama_depan = 'Iqbal';
$nama_belakang = 'Maulana Sidiq';
echo $nama_depan ." " . $nama_belakang;
echo "<br>";
echo 'Iqbal : "Selamat'. " " . "hari jum'at\"";
echo "<hr>";
 
// operator
// Aritmatika
// +, -, *, /, %(modulus/modulo/ sisa bagi)
echo 1+1;
echo "<br>";
echo "Hasil dari 1 + 1 adalah" . " " . 1+1;
echo "<br>";
$penjumlahan = 1 + 1 ;
echo "Hasil dari 1 + 1 adalah" . " " . $penjumlahan ;
echo "<br>";
echo 1 + 2 * 3 - 4 ; //KaBaTaKu 
echo "<br>";
echo (1 + 2) * 3 - 4;
echo "<br>";
echo 10 % 5;
echo '<br>';
echo 1 + "1" + 1 ;
echo "<hr>";

//Perbandingan 
// <, >, <=, >=, ==, !=
echo 1 < 5;
echo "<br>";
echo 1 == 10;
echo "<br>";
echo 1 == "1";
echo "<hr>";

// Identitas /Strict Comparison
//  ===, !==
echo 1 === "1";

echo "<hr>";

// increment / decrement
// tambah / kurang 1
// ++, --
$x = 10;
// $x++;
echo $x;
echo '<br>';
echo $x++;
echo '<br>';
echo $x;
?>