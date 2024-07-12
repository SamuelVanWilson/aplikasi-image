<?php
class Profile extends Controller{
    public function __construct()
    {
        AuthMiddleware::autentikasiBaruMasuk();
    }
    public function index(){
        $data['judul'] = 'Profile';
        $data['navigasi_halaman'] = false;
        $data['tabbar_halaman'] = 'beranda';
        $data['user_data'] = $this->model('user_model')->getUserByRememberToken($_COOKIE['remember_me']);
        $this->view('template/header', $data);
        $this->view('profile/index', $data);
        $this->view('template/footer', $data);
    }

    public function setting(){
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
         }
        $data["judul"] = "Setting";
        $data['navigasi_halaman'] = false;
        $data['tabbar_halaman'] = false;
        $data['user_data'] = $this->model('user_model')->getUserByRememberToken($_COOKIE['remember_me']);
        $this->view('template/header', $data);
        $this->view('profile/setting', $data);
        $this->view('template/footer', $data);
    }

    public function update_user($tkn){
        if ($_SESSION['csrf_token'] === $_POST['csrf_token']) {
            $dataLama = $this->model('user_model')->getUserByRememberToken($_COOKIE['remember_me']);
            if($this->model('updateprofile_model')->update_user($_POST, $tkn, $dataLama['foto'])){
                header('Location:' . BASE_URL . 'profile');
            }
        }
    }
}