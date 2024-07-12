<?php
class User_model {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function setRememberToken($userId, $token){
        $query = "UPDATE users_profile SET remember_token = :token WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':token', $token);
        $this->db->bind(':id', $userId);
        $this->db->execute();
    }
    public function getUserByRememberToken($token){
        $this->db->query("SELECT * FROM users_profile WHERE remember_token = :token");
        $this->db->bind(':token', $token);
        return $this->db->resultSingle();
    }
}