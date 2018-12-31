<?php

class Food_combo_food_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "food_combo_food";
    }
    
    public function get_where($where){

        $this->db->select('*');
        $this->db->from('food_combo_food');
        $this->db->join('food', 'food.food_id = food_combo_food.food_id', 'left');
        $this->db->where($where);
        $query = $this->db->get();

        return $query->result_array();
    }
}