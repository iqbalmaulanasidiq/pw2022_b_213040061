<?php

require_once __DIR__ . '/vendor/autoload.php';
require "connection.php";
$id_kat = $_GET['id'];
$mpdf = new \Mpdf\Mpdf();
$html = '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>download soal</title>
</head>
<body>
    <h3>Soal Essay</h3>
    <p>Silahkan kerjakan soal di bawah ini dengan teliti dan benar. <br> Setelah mengerjakan soal silahkan upload dengan format file yang telah di tentukan</p>
<table class="table table-borderless">
<tr>
  <th style="width: 10px;"></th>
  <th> </th>
</tr>';

$sql = "SELECT * FROM soalsoal WHERE id_kategori = '$id_kat'";
$query = mysqli_query($conn, $sql);
$no = 1;
while($row = mysqli_fetch_assoc($query)){
  $html .= '
  <tr>
      <th scope="row">'.$no++.'.</th>
      <td>'.$row['pertanyaan'].'</td>
  </tr>';
}

$html .='</table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output();


?>



