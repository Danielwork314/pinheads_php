<?php

class Store_category_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "store_category";
    }
    
    // function get_all(){
    //     $this->db->select("*, (SELECT store_category FROM store_category temp WHERE store_category.parent_id = temp.store_category_id) AS parent");
    //     $this->db->from($this->table_name);
    //     $this->db->where("deleted = 0");

    //     $query = $this->db->get();

    //     return $query->result_array();
    // }

    // function get_where($where){
    //     $this->db->select("*, (SELECT store_category FROM store_category temp WHERE store_category.parent_id = temp.store_category_id) AS parent");
    //     $this->db->from($this->table_name);
    //     $this->db->where("deleted = 0");
    //     $this->db->where($where);

    //     $query = $this->db->get();

    //     return $query->result_array();
    // }

    
    
}