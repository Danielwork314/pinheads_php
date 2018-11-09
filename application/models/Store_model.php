<?php

class Store_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "store";
    }
    // public function get_all()
    // {
    //     $this->db->select("*");
    //     $this->db->from("store");
    //     $this->db->join("role", "role.role_id = store.vendor_id", "left");
    //     $this->db->where("store.deleted", 0);

    //     $query = $this->db->get();

    //     return $query->result_array();
    // }
    

    // public function get_all()
    // {
    //     $this->db->select("*, product_category.product_category");
    //     $this->db->from("product");
    //     $this->db->join("product_category", "product.product_category_id = product_category.product_category_id", "left");
    //     $this->db->where("product.deleted", 0);

    //     $query = $this->db->get();

    //     return $query->result_array();
    // }

    // public function get_where($where)
    // {
    //     $this->db->select("*, product_category.product_category");
    //     $this->db->from("product");
    //     $this->db->join("product_category", "product.product_category_id = product_category.product_category_id", "left");
    //     $this->db->where("product.deleted", 0);
    //     $this->db->where($where);

    //     $query = $this->db->get();

    //     return $query->result_array();
    // }

}
