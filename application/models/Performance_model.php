<?php

class Performance_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
    }

    public function get_all_total_sales(){

        $this->db->select('sales.created_date, total');
        $this->db->from('sales');
        $this->db->where('temp', 0);

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_total_sales($where){

        $this->db->select('sales.created_date, total');
        $this->db->from('sales');
        $this->db->where($where);
        $this->db->where('temp', 0);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_vendor_sales(){

        $this->db->select('SUM(sales.total) as user_sales');
        $this->db->from('sales');
        $this->db->join('vendor', 'vendor.store_id = sales.store_id', 'left');
        $this->db->where('sales.temp', 0);
        $this->db->group_by('vendor.vendor_id');
        $this->db->order_by('user_sales', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_product_sales(){
        
        $this->db->select('SUM(order_food.quantity) as product_sales');
        $this->db->from('order_food');
        $this->db->where('sales.deleted', 0);
        $this->db->group_by('order_food.food_id');
        $this->db->order_by('product_sales', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_coupon_sales(){

    }

    public function get_category_sales(){
        
    }

    public function get_table_sales(){
        
    }
}