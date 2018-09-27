<?php

class Role_access_model extends Base_Model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "role_access";
    }
    
    function get_role_access($role_id){
        $this->db->select("role_access.*, (SELECT url FROM module where role_access.module_id = module.module_id) AS url");
        $this->db->from("role_access");
        $this->db->where("role_id", $role_id);

        $query = $this->db->get();

        $result = $query->result_array();

        $role_access = array();
        
        foreach($result as $row){
            $role_access[$row["url"]] = $row;
        }

        return $role_access;
    }

    function get_all(){
        $this->db->select("role_access.*, role.role AS role, role.type AS role_type, module.module");
        $this->db->from("role_access");
        $this->db->join("role", "role_access.role_id = role.role_id", "left");
        $this->db->join("module", "role_access.module_id = module.module_id", "left");
        $this->db->where("role_access.role_id >=", $this->session->userdata("login_data")["role_id"]);
        $this->db->order_by("role_access.role_id, module ASC");
        
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_where($where){
        $this->db->select("role_access.*, role.role AS role, role.type AS role_type, module.module");
        $this->db->from("role_access");
        $this->db->join("role", "role_access.role_id = role.role_id", "left");
        $this->db->join("module", "role_access.module_id = module.module_id", "left");
        $this->db->where($where);
        
        $query = $this->db->get();

        return $query->result_array();
    }
}