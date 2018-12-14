<?php

class Customize_dressing_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "customize_dressing";
    }

    public function get_where($where){

        $this->db->select('*');
        $this->db->from('customize_dressing');
        $this->db->join('dressing', 'dressing.dressing_id = customize_dressing.dressing_id');
        $this->db->where($where);
        $this->db->where('customize_dressing.deleted', 0);
        $query = $this->db->get();

        return $query->result_array();
    }
}


