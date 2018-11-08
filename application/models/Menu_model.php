<?php

class Menu_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "menu";
    }
    
    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where($where);
        $this->db->where('deleted', 0);

        $query = $this->db->get();

        return $query->result_array();
    }

}