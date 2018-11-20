<?php

class User_model extends Base_Model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "user";
    }
    
    public function login_email($email, $password)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where("email = ", $email);
        $this->db->join("role", $this->table_name . ".role_id = role.role_id", "left");
        $this->db->where("password = SHA2(CONCAT(salt,'" . $password . "'),512)");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function login_phone($phone, $password)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where("email = ", $phone);
        $this->db->join("role", $this->table_name . ".role_id = role.role_id", "left");
        $this->db->where("password = SHA2(CONCAT(salt,'" . $password . "'),512)");

        $query = $this->db->get();

        return $query->result_array();
    }
}