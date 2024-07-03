<?php
class Login extends Controller{
    public function index(){
        $data["judul"] = "Beranda";
        $this->view('template/header', $data);
        $this->view('template/footer');
    }
}