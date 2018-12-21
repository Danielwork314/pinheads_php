<?php

class Food_model_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "food_model";
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
