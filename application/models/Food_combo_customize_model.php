<?php

class Food_combo_customize_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "food_combo_customize";
    }
    
    public function get_where($where){

        $this->db->select('*');
        $this->db->from('food_combo_customize');
        $this->db->join('customize', 'customize.customize_id = food_combo_customize.customize_id');
        $this->db->where($where);
        $this->db->where('food_combo_customize.deleted', 0);
        $query = $this->db->get();

        return $query->result_array();
    }
}