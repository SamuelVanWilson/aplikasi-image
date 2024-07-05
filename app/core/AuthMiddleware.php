<?php
class AuthMiddleware{
    public static function handle() {
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
}