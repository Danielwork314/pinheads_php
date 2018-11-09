<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Billing_address extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Billing_address_model");
        $this->load->model("User_model");
       
    }

    public function index()
    {
        $this->page_data["billing_address"] = $this->Billing_address_model->get_all();
        // $this->debug($this->page_data["gourmet"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/billing_address/all");
        $this->load->view("admin/footer");
    }

    function add($user_id)
    {
        $this->page_data['user_id'] = $user_id;

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $data = array(
                'address1' => $input['address1'],
                'address2' => $input['address2'],
                'state' => $input['state'],
                'postcode' => $input['postcode'],
                'country' => $input['country'],
                'created_by' => $this->session->userdata('login_id'),
                'user_id' => $user_id,
            );

            $this->Billing_address_model->insert($data);

            redirect("user/details/" . $user_id, "redirect");
        }

        $this->page_data['billing_address'] = $this->Billing_address_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/billing_address/add");
        $this->load->view("admin/footer");
    }

    function delete(){

        if($_POST){

            $this->Billing_address_model->soft_delete($_POST['billing_address_id']);
        }
    }

}
