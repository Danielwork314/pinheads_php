<?php

class Notification_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "notification";
    }

    public function get_all(){

        $this->db->select('notification.*, user.username');
        $this->db->from($this->table_name);
        $this->db->join('user', 'user.user_id = notification.user_id', 'left');
        $this->db->where('notification.deleted', 0);
        $this->db->order_by('notification.notification_id', 'DESC'); 
               
        $query = $this->db->get();
        return $query->result_array();

    }

    public function get_where($where)
    {
        $this->db->select("notification.*, user.username");
        $this->db->from($this->table_name);
        $this->db->join('user', 'user.user_id = notification.user_id', 'left');
        $this->db->where($where);
        $this->db->where($this->table_name.'.deleted', 0);
        $this->db->order_by('notification.notification_id', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }
}
