<?php
session_start();
require "functions.php";
$data = tampilkan("SELECT * FROM informasi");

if (isset($_GET["cari"])) {
    $data = searchBar($_GET["search"]);
}

if (isset($_GET["refresh"])) {
    $data = tampilkan("SELECT * FROM informasi");
}

if (!$_SESSION['login']) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="search" id="search">
        <button type="submit" name="cari">cari</button>
        <button type="submit" name="refresh">&#x1F504;</button>
    </form>
    <a href="delete.php">logOut</a>
    <a href="profile.php">Profile Kamu</a>

    <?php foreach ($data as $imageData => $informData) :?>
        <a href="detail.php?gambar=<?=$informData["gambar"]?>"><img src="img/<?=$informData["gambar"]?>" alt="" width="150px"></a>
    <?php endforeach;?>

</body>
</html>