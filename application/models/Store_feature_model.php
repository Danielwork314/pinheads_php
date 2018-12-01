<?php

class Store_feature_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "store_feature";
    }

    public function get_where($where)
    {
        $this->db->select("store_feature.*, feature");
        $this->db->from("store_feature");
        $this->db->join("feature", "store_feature.feature_id = feature.feature_id", "left");
        $this->db->where("store_feature.deleted", 0);
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }

}
