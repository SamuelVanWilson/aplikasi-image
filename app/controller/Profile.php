<?php
class Profile extends Controller{
    public function __construct()
    {
        AuthMiddleware::autentikasiBaruMasuk();
    }
}