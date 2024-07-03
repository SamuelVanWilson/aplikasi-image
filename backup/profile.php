<?php
session_start();
ini_set('display_errors', 0);
require "functions.php";
$idUser = $_SESSION['id'];
$dataUser = tampilkan("SELECT * FROM data_user WHERE id = '$idUser'");
$username = $dataUser[0]['username'];
$dataPostingan = tampilkan("SELECT * FROM informasi WHERE author = '$username'");
try {
    if ($_SESSION['pesan']) {
        echo "profile berhasil diganti";
        unset($_SESSION['pesan']);
    }
} catch (\Throwable $th) {
}

if (isset($_POST['btnPost'])) {
    if (tambahPostingan($_POST)) {
        header("Location: profile.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Kamu</title>
</head>
<body>
    <br>
    <img src="img/<?=$dataUser[0]['gambar']?>" alt="" width="150px">
    <h1><?= $username?></h1>
    <a href="edit.php">Edit Profil</a>
    <a href="index.php">Kembali</a>

    <h2>Unggah Postingan</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="post">Pilih Postingan :</label>
        <input type="file" name="gambar" id="post"><br>

        <label for="caption">Tambah Caption</label>
        <textarea name="deskripsi" id="caption" cols="30" rows="10" style="resize: none;"><?=$_POST['deskripsi']?></textarea><br>

        <label for="key">Tambahkan Keyword</label>
        <textarea name="keyword" id="key" cols="30" rows="2" style="resize: none;" placeholder="gunakan koma sebagai pemisah (trend, fyp, ambatron)"><?=$_POST['keyword']?></textarea>
        <button type="submit" name="btnPost">Unggah Postingan</button>
    </form>

    <h2>Postingan Kamu</h2>
    <?php foreach ($dataPostingan as $postinganUser => $informPost):?>
        <a href="detail.php?gambar=<?=$informPost['gambar']?>"><img src="img/<?=$informPost['gambar']?>" alt="" width="150px"></a>
    <?php endforeach;?>
</body>
</html>