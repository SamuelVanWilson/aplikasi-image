<?php
class Login extends Controller{
    public function __construct()
    {
        AuthMiddleware::autentikasiSudahMasuk();
    }
    public function index(){
        
    }
}