<?php

class Feedback_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "feedback";
    }
    
    public function get_all(){

        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('user', 'user.user_id = feedback.user_id', 'left');
        $this->db->where('feedback.deleted', 0);
        
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->join('user', 'user.user_id = feedback.user_id', 'left');
        $this->db->where($where);
        $this->db->where($this->table_name.'.deleted', 0);

        $query = $this->db->get();

        return $query->result_array();
    }

    
    
}