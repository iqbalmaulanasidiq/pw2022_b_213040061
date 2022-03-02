<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
// Pengulangan
// for, while, do, do .. while, foreach(pengulangan khusus array)
// for
for ($i = 0; $i < 5; $i++){
    echo "Hello world <br>";
}
echo "<hr>";

// while
$i=0;
while($i<5){
echo "Hello world <br>";
$i++;
}
echo "<hr>";

// do ... while
$i=0;
do{
echo "Hello world <br>";
$i++;
}while($i <5);

echo "<hr>";
?>


    <table border="1" cellpadding="10" cellspacing="0">
        <?php 
            for ($i = 1; $i<=3;$i++):
                echo "<tr>";
                for($j =1 ; $j<=5; $j++){
                    echo "<td>$i,$j</td>";
                }
               
            endfor;
        ?>
         </table>
            <br>

        <!-- cara lain -->
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for($i=1;$i<=3;$i++): ?>
            <tr>
                <?php for($j =1;$j<=5;$j++){ ?>
                   <td><?php echo"$i,$j" ?></td> 
                <?php } ?>  
            </tr>
        <?php endfor; echo "<hr>"?>
    </table>
    <hr>

   
</body>
</html>