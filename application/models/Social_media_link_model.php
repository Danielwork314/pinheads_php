<?php

class Social_media_link_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();

        $this->table_name = "social_media_link";
    }

    public function get_where($where)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->join('social_media', 'social_media.social_media_id = social_media_link.social_media_id', 'left');
        $this->db->where($where);
        $this->db->where($this->table_name.'.deleted', 0);

        $query = $this->db->get();

        return $query->result_array();
    }
}
