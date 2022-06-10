<?php 
require_once __DIR__ . '../../vendor/autoload.php';
require "../connection.php";
session_start();
$nama_admin = $_SESSION['login']['nama'];
$mpdf = new \Mpdf\Mpdf();
$html ='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peserta</title>
    
</head>
<body>
<center><h1>
Data Nilai Peserta 
</h1></center>

<table border="1" style="border: 1px solid;width: 100%;border-collapse: collapse;" cellpadding="10" >
<thead>
    <tr>
        <th scope="col">NO</th>       
        <th scope="col">Nama Peserta</th>
        <th scope="col">Kategori</th>
        <th scope="col">Nilai</th>
            
    </tr>
</thead>
<tbody>
';
$sql = "SELECT * FROM jawaban INNER JOIN peserta ON jawaban.id = peserta.id INNER JOIN kategori ON jawaban.id_kategori = kategori.id_kategori";
$query = mysqli_query($conn, $sql);
$no = 1;
while($row = mysqli_fetch_assoc($query)){
    $html .= '
    <tr>
        <th scope="row">'.$no++.'</th>
        <td>'.$row['nama_peserta'].'</td>
        <td>'.$row['kategori_ujian'].'</td>
        <td>'.$row['nilai'].'</td>
    </tr>';
}

   
    
   
$html .='</tbody>
</table>
<br>
<br>
<table>
<tr>
		<td></td>
		<td width="500px">
			<p>
            '.date("l d F Y") .'. <br> '.$nama_admin .'   <br/>
				Admin,
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

