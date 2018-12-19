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
        $this->db->join('order_status', 'order_status.order_status_id = order_food.order_status_id', 'left');
        $this->db->join('dressing', 'dressing.dressing_id = order_food.dressing_id', 'left');
        $this->db->where($where);
        $this->db->where('order_food.deleted', 0);

        $query = $this->db->get();

        return $query->result_array();
    }

    // public function get_queue_list(){

    //     $this->db->select('*');
    //     $this->db->from('order_food');
    //     $this->db->join('sales', 'sales.sales_id = order_food.sales_id');
    //     $this->db->where('sales.order_status_id !=', 3);
    //     $this->db->where('sales.order_status_id !=', 4);
    //     $this->db->group_by('sales.sales_id');
    //     $query = $this->db->get();

    //     return $query->result_array();
    // }

}