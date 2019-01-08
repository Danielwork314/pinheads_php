<?php

class Banner_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "banner";
    }

    public function get_where($where){

        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->join('store', 'store.store_id = banner.store_id', 'left');
        $this->db->where($where);
        $this->db->where($this->table_name.'.deleted', 0);

        $query = $this->db->get();

        return $query->result_array();
    }

}
