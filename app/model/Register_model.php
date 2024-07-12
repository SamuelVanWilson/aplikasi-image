<?php
class Register_model {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function user_register($data){
        $query = "INSERT INTO users_profile (nama, sandi, foto, banner) VALUES (:nama, :pass, :foto, :banner)";
        $nama = htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($data['password'], ENT_QUOTES, 'UTF-8');
        $passwordVerify = htmlspecialchars($data['passwordVerify'], ENT_QUOTES, 'UTF-8');
        $gambar_user = "user.png";
        $banner_user = "banner2.png";
        if ($password === $passwordVerify) {
            $amankan_password = password_hash($password, PASSWORD_BCRYPT);
        }

        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':pass', $amankan_password);
        $this->db->bind(':foto', $gambar_user);
        $this->db->bind(':banner', $banner_user);
        $this->db->execute();
        return $this->db->lastInsertId();
    }
}