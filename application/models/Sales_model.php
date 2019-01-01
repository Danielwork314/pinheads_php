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
        $this->db->join('coupon', 'coupon.coupon_id = sales.coupon_id', 'left');
        $this->db->where('sales.deleted', 0);
        $this->db->order_by('sales_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where)
    {

        $this->db->select('user.name, order_status.order_status, store.store, sales.*, billing_address.address1, billing_address.address2, billing_address.state, billing_address.postcode, billing_address.country, card.card, card.bank, card_type.card_type, coupon.coupon, coupon.discount_rate');
        $this->db->from('sales');
        $this->db->join('user', 'user.user_id = sales.user_id', 'left');
        $this->db->join('store', 'store.store_id = sales.store_id', 'left');
        $this->db->join('card', 'card.card_id = sales.card_id', 'left');
        $this->db->join('card_type', 'card.card_type_id = card_type.card_type_id', 'left');
        $this->db->join('coupon', 'coupon.coupon_id = sales.coupon_id', 'left');
        $this->db->join('billing_address', 'billing_address.billing_address_id = sales.billing_address_id', 'left');
        $this->db->join('order_status', 'order_status.order_status_id = sales.order_status_id', 'left');
        $this->db->where($where);
        $this->db->order_by('sales_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_order_history($where)
    {
        $this->db->select("sales.*, store.store, store.thumbnail, order_status");
        $this->db->from("sales");
        $this->db->join("store", "sales.store_id = store.store_id", "left");
        $this->db->join("order_status", "sales.order_status_id = order_status.order_status_id", "left");
        $this->db->where('sales.deleted', 0);
        $this->db->where($where);
        $this->db->order_by("sales.created_date  DESC");

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_queue_list()
    {

        $this->db->select('sales.*, order_status.order_status, user.username, user.email, user.name');
        $this->db->from('sales');
        $this->db->join("order_status", "sales.order_status_id = order_status.order_status_id", "left");
        $this->db->join("user", "sales.user_id = user.user_id", "left");
        $this->db->where('sales.order_status_id !=', 2);
        $this->db->where('sales.order_status_id !=', 3);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_queue_list_where($where)
    {

        $this->db->select('sales.*, order_status.order_status, user.username, user.email, user.name');
        $this->db->from('sales');
        $this->db->join("order_status", "sales.order_status_id = order_status.order_status_id", "left");
        $this->db->join("user", "sales.user_id = user.user_id", "left");
        $this->db->where($where);
        $this->db->where('sales.order_status_id !=', 2);
        $this->db->where('sales.order_status_id !=', 3);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_years()
    {
        $this->db->select("YEAR(MAX(created_date)) AS max_year, YEAR(MIN(created_date)) AS min_year");
        $this->db->from("sales");
        $this->db->where("sales.deleted = 0");

        $query = $this->db->get();

        return $query->result_array();
    }
}
