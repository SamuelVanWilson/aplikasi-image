<?php
session_start();
ini_set('display_errors', 0);
require "functions.php";
if (isset($_POST["daftar"])) {
    if (daftar($_POST)) {
        $_SESSION["pesan"] = true;
        header("Location: login.php"); exit; 
    }
}

try {
    if ($_SESSION['login']) {
        header("Location: index.php");
     }
} catch (\Throwable $th) {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
</head>
<body>
    <h1>Daftar Sekarang</h1>
    <form action="" method="post">
        <ul>
            <li><input type="text" name="username" placeholder="username" value="<?=$_POST['username']?>"></li>
            <li><input type="email" name="email" placeholder="email" value="<?=$_POST['email']?>"></li>
            <li><input type="password" name="pass" placeholder="password"></li>
            <li><input type="password" name="konfirmPass" placeholder="konfirmasi password"></li>
            <li><button type="submit" name="daftar">daftar</button></li>
        </ul>
    </form><br>
    <a href="login.php">Login</a>
</body>
</html>