<?php
class Register_model {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function user_register($data){
        $query = "INSERT INTO users_profile (nama, sandi, foto) VALUES (:nama, :pass, :foto)";
        $nama = htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($data['password'], ENT_QUOTES, 'UTF-8');
        $gambar_user = "user.jpg";
        $amankan_password = password_hash($password, PASSWORD_BCRYPT);

        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':pass', $amankan_password);
        $this->db->bind(':foto', $gambar_user);
        $this->db->execute();
        return $this->db->lastInsertId();
    }
}