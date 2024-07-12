<?php
class Home extends Controller{
    private $data_user;
    public function __construct()
    {
        AuthMiddleware::autentikasiBaruMasuk();
    }
    public function index(){
        $data["judul"] = "Beranda";
        $data['navigasi_halaman'] = 'home';
        $data['tabbar_halaman'] = 'beranda';
        $data['user_data'] = $this->model('user_model')->getUserByRememberToken($_COOKIE['remember_me']);
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer', $data);
    }
}