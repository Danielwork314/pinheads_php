<?php

class Sales_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "sales";
    }

    function get_all(){

        $this->db->select('user.name, store.store, sales.*');
        $this->db->from('sales');
        $this->db->join('user', 'user.user_id = sales.user_id', 'left');
        $this->db->join('store', 'store.store_id = sales.store_id', 'left');
        $this->db->order_by('sales_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_where($where){

        $this->db->select('user.name, store.store, sales.*, billing_address.address1, billing_address.address2, billing_address.state, billing_address.postcode, billing_address.country, payment.card_no, payment.bank, payment.card_type');
        $this->db->from('sales');
        $this->db->join('user', 'user.user_id = sales.user_id', 'left');
        $this->db->join('store', 'store.store_id = sales.store_id', 'left');
        $this->db->join('payment', 'payment.payment_id = sales.payment_id', 'left');
        $this->db->join('billing_address', 'billing_address.billing_address_id = sales.billing_address_id', 'left');
        $this->db->where($where);
        $this->db->order_by('sales_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

}