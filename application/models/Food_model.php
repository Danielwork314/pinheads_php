<?php

class Food_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "food";
    }

    public function get_all(){

        $this->db->select('*, food.created_by AS created_by');
        $this->db->from('food');
        $this->db->join('store', 'store.store_id = food.store_id', 'left');
        $this->db->where('food.deleted', 0);
        
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->join('store', 'store.store_id = food.store_id', 'left');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    
}