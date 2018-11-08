<?php

class Food_ingredient_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "food_ingredient";
    }

    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->join('ingredient', 'ingredient.ingredient_id = food_ingredient.ingredient_id', 'left');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}