<?php

class Food_combo_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "food_combo";
    }

    public function get_all(){

        $this->db->select('food_combo.*, store, food_combo.created_by AS created_by, food_category');
        $this->db->from('food_combo');
        $this->db->join('store', 'store.store_id = food_combo.store_id', 'left');
        $this->db->join('food_category', 'food_combo.food_category_id = food_category.food_category_id', 'left');
        $this->db->where('food_combo.deleted', 0);
        
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_where($where)
    {
        $this->db->select("food_combo.*, store, food_category");
        $this->db->from($this->table_name);
        $this->db->join('store', 'store.store_id = food_combo.store_id', 'left');
        $this->db->join('food_category', 'food_combo.food_category_id = food_category.food_category_id', 'left');
        $this->db->where('food_combo.deleted', 0);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }
    
}