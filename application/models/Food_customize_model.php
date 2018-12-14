<?php

class Food_customize_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "food_customize";
    }

    public function get_where($where){

        $this->db->select('*');
        $this->db->from('food_customize');
        $this->db->join('customize', 'customize.customize_id = food_customize.customize_id');
        $this->db->where($where);
        $this->db->where('food_customize.deleted', 0);
        $query = $this->db->get();

        return $query->result_array();
    }
}

