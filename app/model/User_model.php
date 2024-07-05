<?php
class User_model {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function authenticate($username, $password){
        $query = "SELECT * FROM users_profile WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        $user = $this->db->resultSingle();
        if ($user && password_verify($password, $user['password'])) {
            var_dump($user);die;
        }
    }
    public function setRememberToken($userId, $token){
        $query = "UPDATE users_profile SET remember_token = :token WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':token', $token);
        $this->db->bind(':id', $userId);
        $this->db->execute();
    }
    public function getUserByRememberToken($token){
        
    }
}