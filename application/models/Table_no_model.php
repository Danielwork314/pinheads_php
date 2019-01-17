<?php

class Table_no_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "table_no";
    }

    public function get_all(){
        
        $this->db->select('table_no.*, store.store');
        $this->db->from($this->table_name);
        $this->db->join('store', 'table_no.store_id = store.store_id', 'left');
        $this->db->where('table_no.deleted', 0);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_where($where){
        
        $this->db->select('table_no.*, store.store');
        $this->db->from($this->table_name);
        $this->db->join('store', 'table_no.store_id = store.store_id', 'left');
        $this->db->where($where);
        $this->db->where('table_no.deleted', 0);
        $query = $this->db->get();

        return $query->result_array();
    }
}
