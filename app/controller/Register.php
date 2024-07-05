<?php
class Register extends Controller{
    public function __construct()
    {
        AuthMiddleware::autentikasiSudahMasuk();
    }
    public function index(){
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        $data["judul"] = "Beranda";
        $this->view('template/header', $data);
        $this->view('register/index');
        $this->view('template/footer');
    }

    public function user_register(){
        if ($_POST["csrf_token"] === $_SESSION["csrf_token"]) {
            $userId = $this->model("Register_model")->user_register($_POST);
            if ( $userId > 0) {
                $_SESSION['user_id'] = $userId;
                $token = bin2hex(random_bytes(16));
                setcookie('remember_me', $token, time() + (86400 * 30), "/");
                $this->model('User_model')->setRememberToken($userId, $token);
            }
            header("Location: " . BASE_URL . "Home");
        } else {
            die("heheh, ngirimin apaan hayoo");
        }
    }
}