<?php

class User_coupon_model extends Base_Model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "user_coupon";
    }
    
    public function get_where($where)
    {
        $this->db->select("*, store.store");
        $this->db->from("user_coupon");
        $this->db->join("coupon", "coupon.coupon_id = user_coupon.coupon_id", "left");
        $this->db->join("store", "store.store_id = coupon.store_id", "left");
        $this->db->where("user_coupon.deleted", 0);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
}