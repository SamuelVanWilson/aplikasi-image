<?php
session_start();
unset($_SESSION["login"]);
session_destroy();
setcookie("id", "", time() - 3605 * 24 * 7);
setcookie("key", "", time() - 3605 * 24 * 7);

header("Location: login.php");
?>