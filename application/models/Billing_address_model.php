<?php

class Billing_address_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "billing_address";
    }
    
    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->join('user', 'user.user_id = billing_address.user_id', 'left');
        $this->db->where($where);
        $this->db->where($this->table_name.'.deleted', 0);

        $query = $this->db->get();

        return $query->result_array();
    }
}