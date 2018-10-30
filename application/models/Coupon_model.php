<?php

class Coupon_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "coupon";
    }
    
    public function get_all(){

        $this->db->select('*');
        $this->db->from('coupon');
        $this->db->join('store', 'store.store_id = coupon.store_id', 'left');
        $this->db->where('coupon.deleted', 0);
        
        $query = $this->db->get();
        return $query->result_array();

    }
    
}