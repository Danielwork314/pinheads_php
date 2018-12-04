<?php

class Sales_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "sales";
    }

    public function get_all()
    {

        $this->db->select('user.name, store.store, sales.*');
        $this->db->from('sales');
        $this->db->join('user', 'user.user_id = sales.user_id', 'left');
        $this->db->join('store', 'store.store_id = sales.store_id', 'left');
        $this->db->where('sales.deleted', 0);
        $this->db->order_by('sales_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where)
    {

        $this->db->select('user.name, store.store, sales.*, billing_address.address1, billing_address.address2, billing_address.state, billing_address.postcode, billing_address.country, card.card, card.bank, card_type.card_type');
        $this->db->from('sales');
        $this->db->join('user', 'user.user_id = sales.user_id', 'left');
        $this->db->join('store', 'store.store_id = sales.store_id', 'left');
        $this->db->join('card', 'card.card_id = sales.card_id', 'left');
        $this->db->join('card_type', 'card.card_type_id = card_type.card_type_id', 'left');
        $this->db->join('billing_address', 'billing_address.billing_address_id = sales.billing_address_id', 'left');
        $this->db->where($where);
        $this->db->order_by('sales_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_order_history($where)
    {
        $this->db->select("sales.*, store.store, store.thumbnail");
        $this->db->from("sales");
        $this->db->join("store", "sales.store_id = store.store_id", "left");
        $this->db->where('sales.deleted', 0);
        $this->db->where($where);
        $this->db->order_by("sales.created_date  DESC");

        $query = $this->db->get();

        return $query->result_array();
    }

}
