<?php

require_once __DIR__ . '/vendor/autoload.php';
require "connection.php";
$id_jawaban = $_GET['id_jawaban'];
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
    <h3 style="text-align:center;">Nilai  Anda</h3>
<table border="1" style="border: 1px solid;width: 100%;border-collapse: collapse;" cellpadding="10" class="table table-responsive">
<tr>
    <th style="width: 10px;">No</th>
  <th style="text-align:left;" >Nama</th>
  <th style="width: 20px;">Nilai </th>
</tr>';

$sql = "SELECT * FROM jawaban INNER JOIN peserta ON jawaban.id = peserta.id INNER JOIN kategori ON jawaban.id_kategori = kategori.id_kategori WHERE jawaban.id_jawaban = '$id_jawaban'";
$query = mysqli_query($conn, $sql);
$no = 1;
while($row = mysqli_fetch_assoc($query)){
  $html .= '
  <tr>
      <th scope="row">'.$no++.'.</th>
      <td>'.$row['nama_peserta'].'</td>
    <td>'.$row['nilai'].'</td>
  </tr>';
}

$html .='</table>
<br>
<br>
<table>
<tr>
		<td></td>
		<td width="500px">
			<p>
            '.date("l d F Y") .'.    <br/>
				
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output();


?>



