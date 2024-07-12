<?php
class Login_model{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function login_model($data){
        $query = 'SELECT * FROM users_profile WHERE nama = :username';
        $nama = htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($data['password'], ENT_QUOTES, 'UTF-8');

        $this->db->query($query);
        $this->db->bind(':username', $nama);
        $user = $this->db->resultSingle();
        if ( password_verify($password,$user['sandi']) ) {
            return $user;
        } else {
            return false;
        }
    }
}