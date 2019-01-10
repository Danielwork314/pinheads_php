<?php

class Store_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "store";
    }

    public function get_all()
    {
        $this->db->select("store.*, gourmet_type, pricing, vendor.name AS vendor");
        $this->db->from("store");
        $this->db->join("gourmet_type", "gourmet_type.gourmet_type_id = store.gourmet_type_id", "left");
        $this->db->join("pricing", "pricing.pricing_id = store.pricing_id", "left");
        $this->db->join("vendor", "vendor.vendor_id = store.vendor_id", "left");
        $this->db->where("store.deleted", 0);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_pricing_all()
    {
        $this->db->select("store.*, gourmet_type, pricing, vendor.name AS vendor");
        $this->db->from("store");
        $this->db->join("gourmet_type", "gourmet_type.gourmet_type_id = store.gourmet_type_id", "left");
        $this->db->join("pricing", "pricing.pricing_id = store.pricing_id", "left");
        $this->db->join("vendor", "vendor.vendor_id = store.vendor_id", "left");
        $this->db->where("store.deleted", 0);
        $this->db->order_by("store.pricing_id", 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where)
    {
        $this->db->select("store.*, gourmet_type, pricing, vendor.name AS vendor");
        $this->db->from("store");
        $this->db->join("gourmet_type", "gourmet_type.gourmet_type_id = store.gourmet_type_id", "left");
        $this->db->join("pricing", "pricing.pricing_id = store.pricing_id", "left");
        $this->db->join("vendor", "vendor.vendor_id = store.vendor_id", "left");
        $this->db->where("store.deleted", 0);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_store($keyword){

        $this->db->select("*");
        $this->db->from("store");
        $this->db->like("LOWER(store)", strtolower($keyword));
        $this->db->where("store.deleted", 0);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_location($keyword){

        $this->db->select("*");
        $this->db->from("store");
        $this->db->like("LOWER(address)", strtolower($keyword));
        $this->db->where("store.deleted", 0);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_new(){

        $this->db->select('*');
        $this->db->where('created_date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_type($keyword){

        $this->db->select("store.*, gourmet_type, pricing, vendor.name AS vendor");
        $this->db->from("store");
        $this->db->join("gourmet_type", "gourmet_type.gourmet_type_id = store.gourmet_type_id", "left");
        $this->db->join("pricing", "pricing.pricing_id = store.pricing_id", "left");
        $this->db->join("vendor", "vendor.vendor_id = store.vendor_id", "left");
        $this->db->like("LOWER(gourmet_type)", strtolower($keyword));
        $this->db->where("store.deleted", 0);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_more(){

        $this->db->select("store.*, gourmet_type, pricing, vendor.name AS vendor");
        $this->db->from("store");
        $this->db->join("gourmet_type", "gourmet_type.gourmet_type_id = store.gourmet_type_id", "left");
        $this->db->join("pricing", "pricing.pricing_id = store.pricing_id", "left");
        $this->db->join("vendor", "vendor.vendor_id = store.vendor_id", "left");
        $this->db->where("gourmet_type.gourmet_type_id > 8");
        $this->db->where("store.deleted", 0);

        $query = $this->db->get();

        return $query->result_array();
    }
}
