<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Performance extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Sales_model");
        $this->load->model("Store_model");
    }

    public function store_sales()
    {
        $store = $this->Store_model->get_all();

        foreach($store as $row){
            $where = array(
                "status" => 2,
                "sales.store_id" => $row['store_id']
            );

            $sales = $this->Sales_model->get_where($where);

            $this->debug($sales);
        }

        $this->load->view("admin/header", $this->page_data);
        
        $this->load->view("admin/footer");
    }
}
