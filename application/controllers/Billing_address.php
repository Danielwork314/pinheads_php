<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Billing_address extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Billing_address_model");
       
    }

    public function index()
    {
        $this->page_data["billing_address"] = $this->Billing_address_model->get_all();
        // $this->debug($this->page_data["gourmet"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/billing_address/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $data = array(
                // 'gourmet_type_title' => $input['gourmet_type_title'],
                // 'created_by' => $this->session->userdata('login_id'),
            );

            $this->Billing_address_model->insert($data);

            redirect("billing_address", "refresh");
        }

        $this->page_data['billing_address'] = $this->Billing_address_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/billing_address/add");
        $this->load->view("admin/footer");
    }

    function details($billing_address_id)
    {

        $where = array(
            "billing_address_id" => $billing_address_id
        );
        // $this->debug($billing_address_id);
        $billing_address = $this->Billing_address_model->get_where($where);

        $this->page_data["billing_address"] = $billing_address[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/billing_address/details");
        $this->load->view("admin/footer");
    }

    function edit($billing_address_id)
    {

        $where = array(
            'billing_address_id' => $billing_address_id
        );

        $billing_address = $this->Billing_address_model->get_where($where);

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
            
            $data = array(
                // 'gourmet_type_title' => $input['gourmet_type_title'],
                'created_by' => $this->session->userdata('login_id'),
                'modified_date' => $date->format("Y-m-d h:i:s"),
                'modified_by' => $this->session->userdata('login_id')
            );

            $this->Billing_address_model->update_where($where, $data);

            redirect("billing_address", "refresh");
        }

        $this->page_data['billing_address'] = $billing_address[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/billing_address/edit");
        $this->load->view("admin/footer");
    }

    function delete($billing_address_id){

        $this->Billing_address_model->soft_delete($billing_address_id);
        redirect("billing_address", "refresh");
    }

}
