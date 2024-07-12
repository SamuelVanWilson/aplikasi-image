<?php
require_once __DIR__ . '/../model/User_model.php';
class AuthMiddleware{
    public static function autentikasiBaruMasuk() {
        if (!isset($_SESSION['user_id'])) {
            if (isset($_COOKIE['remember_me'])) {
                $userModel = new User_model();
                $user = $userModel->getUserByRememberToken($_COOKIE['remember_me']);
                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    return;
                }
            }
            header('Location: ' . BASE_URL . 'login');
            exit();
        }
    }

    public static function autentikasiSudahMasuk(){
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . 'home');
            exit();
        }
    }
}