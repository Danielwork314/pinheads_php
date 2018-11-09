<?php

class Order_food_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "order_food";
    }

    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from('order_food');
        $this->db->join('food', 'order_food.food_id = food.food_id', 'left');
        $this->db->where($where);
        $this->db->where('order_food.deleted', 0);

        $query = $this->db->get();

        return $query->result_array();
    }

}