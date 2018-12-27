<?php

class Order_food_dressing_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "order_food_dressing";
    }

    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from('order_food_dressing');
        $this->db->join('dressing', 'dressing.dressing_id = order_food_dressing.dressing_id', 'left');
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

}