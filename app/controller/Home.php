<?php
class Home extends Controller{
    public function index(){
        $data["judul"] = "Beranda";
        $this->view('template/header', $data);
        $this->view('template/footer');
    }

    public function setting(){
        $data["judul"] = "Setting";
        $this->view('template/header', $data);
        $this->view('template/footer');
    }
}