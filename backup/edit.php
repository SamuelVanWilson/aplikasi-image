<?php
session_start();
require "functions.php";
$idUser = $_SESSION['id'];
$dataUser = tampilkan("SELECT * FROM data_user WHERE id = '$idUser'");

if (isset($_POST['ubah'])) {
    if (ubahData($_POST)) {
        $_SESSION['pesan'] = true;
        header("Location: profile.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile Kamu</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">nama</label>
        <input type="text" name="nama" id="name" value="<?=$dataUser[0]["username"]?>"><br>

        <label for="profile"><img src="img/<?=$dataUser[0]['gambar']?>" alt="" width="100px"></label>
        <input type="file" name="gambar" id="profile">

        <button type="submit" name="ubah">Ganti Profile</button>
    </form> 
    <a href="profile.php">Batalkan</a>
</body>
</html>