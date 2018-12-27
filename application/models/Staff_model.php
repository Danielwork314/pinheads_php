<?php

class Staff_model extends Base_model
{
    public function __construct()
    {
        parent::__construct();

        $this->table_name = "staff";
    }

    public function get_all_with_role()
    {
        $this->db->select("staff.*, role.role AS role, store.store");
        $this->db->from("staff");
        $this->db->join("role", "staff.role_id = role.role_id", "left");
        $this->db->join("store", "staff.store_id = store.store_id", "left");
        $this->db->where("staff.deleted", 0);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where_with_role($where)
    {
        $this->db->select("staff.*, role.role AS role, store.store");
        $this->db->from("staff");
        $this->db->join("role", "staff.role_id = role.role_id", "left");
        $this->db->join("store", "staff.store_id = store.store_id", "left");
        $this->db->where("staff.deleted", 0);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
}
