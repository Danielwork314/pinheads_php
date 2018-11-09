<?php

class Store_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "store";
    }

    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from("store");
        $this->db->join("gourmet_type", "gourmet_type.gourmet_type_id = store.gourmet_type_id", "left");
        $this->db->join("pricing", "pricing.pricing_id = store.pricing_id", "left");
        $this->db->where("store.deleted", 0);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

}
