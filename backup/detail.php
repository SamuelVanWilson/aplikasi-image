<?php
require 'functions.php';
$gambar = $_GET['gambar'];
$result = tampilkan("SELECT * FROM informasi WHERE gambar = '$gambar'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Postingan</title>
</head>
<body>
    <img src="img/<?=$result[0]['gambar']?>" alt="" width="250px"><br>
    <p><?=$result[0]['deskripsi']?></p>
    <p><?=$result[0]['keyword']?></p>
    <p>Tanggal Dibuat : <?=$result[0]['tanggal']?></p>
    <p>Postingan Dibuat Oleh : <?=$result[0]['author']?></p>

    <a href="index.php">Kembali Ke Halaman</a>
</body>
</html>