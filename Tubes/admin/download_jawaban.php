<?php 

    if(isset($_GET['filename'])){
        $filename = $_GET['filename'];
        $back_dir = "../assets/jawaban_peserta/";
        $file = $back_dir.$filename;

        if(file_exists($file)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }else{
            echo "File tidak ditemukan";
        }
    }

?>