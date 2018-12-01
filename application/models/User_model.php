<?php

class User_model extends Base_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "user";
    }

    public function user_login($input)
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("email = ", $input['id']);
        $this->db->where("contact = ", $input['id']);
        $this->db->join("role", $this->table_name . ".role_id = role.role_id", "left");
        $this->db->where("password = SHA2(CONCAT(salt,'" . $password . "'),512)");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function login_email($email, $password)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where("email = ", $email);
        $this->db->join("role", $this->table_name . ".role_id = role.role_id", "left");
        $this->db->where("password = SHA2(CONCAT(salt,'" . $password . "'),512)");
    }

    public function get_all_with_role()
    {
        $this->db->select("*, role.role AS role, gender.gender");
        $this->db->from($this->table_name);
        $this->db->join("role", $this->table_name . ".role_id = role.role_id", "left");
        $this->db->join("gender", $this->table_name . ".gender_id = gender.gender_id", "left");
        $this->db->where($this->table_name . ".deleted", 0);

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
    }

    public function get_where_with_role($where)
    {
        $this->db->select("*, role.role AS role, gender.gender");
        $this->db->from($this->table_name);
        $this->db->join("role", $this->table_name . ".role_id = role.role_id", "left");
        $this->db->join("gender", $this->table_name . ".gender_id = gender.gender_id", "left");
        $this->db->where($this->table_name . ".deleted", 0);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
}
