<?php
session_start();
session_destroy();


echo "
    <script>
    alert('Anda Telah Keluar');
    window.location.href='login.php';
    </script>
";
?>
