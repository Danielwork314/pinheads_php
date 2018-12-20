<?php

class Order_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "user_order";
    }

    function get_all(){

        $this->db->select('user.name, store.store, user_order.*');
        $this->db->from('user_order');
        $this->db->join('user', 'user.user_id = user_order.user_id', 'left');
        $this->db->join('store', 'store.store_id = user_order.store_id', 'left');
        $this->db->order_by('user_order_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_where($where){

        $this->db->select('user.name, store.store, user_order.*, billing_address.address1, billing_address.address2, billing_address.state, billing_address.postcode, billing_address.country, payment.card_no, payment.bank, payment.card_type');
        $this->db->from('user_order');
        $this->db->join('user', 'user.user_id = user_order.user_id', 'left');
        $this->db->join('store', 'store.store_id = user_order.store_id', 'left');
        $this->db->join('payment', 'payment.payment_id = user_order.payment_id', 'left');
        $this->db->join('billing_address', 'billing_address.billing_address_id = user_order.billing_address_id', 'left');
        $this->db->where($where);
        $this->db->order_by('user_order_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

}