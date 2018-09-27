<?php

class Role_model extends Base_Model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "role";
    }

    function get_type($type){
        $this->db->select("*");
        $this->db->from("role");
        $this->db->where("type", $type);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}