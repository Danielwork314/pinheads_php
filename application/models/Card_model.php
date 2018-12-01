<?php

class Card_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "card";
    }
    
    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->join('card_type', 'card_type.card_type_id = card.card_type_id', 'left');
        $this->db->where($where);
        $this->db->where('card.deleted', 0);

        $query = $this->db->get();

        return $query->result_array();
    }
}
