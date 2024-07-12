<?php
class Login extends Controller{
    public function __construct()
    {
        AuthMiddleware::autentikasiSudahMasuk();
    }
    public function index(){
        if (empty($_SESSION['csrf_token'])) {
           $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        $data['judul'] = 'Login';
        $data['navigasi_halaman'] = 'awal';
        $this->view('template/header', $data);
        $this->view('login/index');
        $this->view('template/footer');
    }
    public function user_login(){
        if ($_SESSION['csrf_token'] === $_POST['csrf_token']) {
            $user = $this->model('login_model')->login_model($_POST);
            $userId = $user['id'];
            $token = $user['remember_token'];
            var_dump($token);
            if ($user) {
                $_SESSION['user_id'] = $userId;
                setcookie('remember_me', $token, time() + (86400 * 30), "/");
                header("Location: " . BASE_URL . "Home");
            }else {
                echo 'password salah';
            }
        }
    }
}