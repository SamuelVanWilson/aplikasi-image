<?php
session_start();
ini_set('display_errors', 0);
require "functions.php";
if (isset($_SESSION["pesan"])) {
    echo 'Silahkan masukan data kembali untuk login';
    unset($_SESSION["pesan"]);
}
if (isset($_POST["login"])) {
    if (login($_POST)) {
        if (isset($_POST["remember"])) {
            if (remember($_POST)) {
                $_SESSION['login'] = true;
            }
        }
        $_SESSION['login'] = true;
    }
}
if (isset($_SESSION['login'])) {
    header("Location: index.php");
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
    <h1>Login</h1>
    <form action="" method="post">
        <ul>
            <li><input type="email" name="email" placeholder="email" value="<?=$_POST['gambar']?>"></li>
            <li><input type="password" name="pass" placeholder="password"></li>
            <li><input type="checkbox" name="remember" id="rm"><label for="rm">Remember me</label></li>
            <li><button type="submit" name="login">login</button></li>
        </ul>
    </form>
    <a href="register.php">daftar   </a>
</body>
</html>