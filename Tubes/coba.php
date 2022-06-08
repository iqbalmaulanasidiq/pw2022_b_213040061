<!DOCTYPE html>
<html>
<head>
    <title>Menampilkan Data Dari Database PHP </title>
    <style>
        table,tr,td {
            border: 1px solid black;
        }
        thead {
            background-color: #cccddd;
        }
    </style>
</head>
<body>
    <h2>Menampilkan Data Dari Database PHP</h2>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>jawaban</td>
                <td>peserta</td>
                <td>kategori</td>                
            </tr>
        </thead>
        <?php
        include "connection.php";
        $no = 1;
        $query= mysqli_query($conn, "SELECT * FROM jawaban INNER JOIN peserta ON jawaban.id = peserta.id INNER JOIN kategori ON jawaban.id_kategori = kategori.id_kategori");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['jawaban_soal'] ?></td>
                <td><?php echo $data['nama_peserta'] ?></td>
                <td><?php echo $data['kategori_ujian'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>