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

        $this->page_data['billing_address'] = $this->Billing_address_model->get_all();

        $this->page_data['input_field'] = $this->Billing_address_model->generate_input();

        $where = array(
            'user_id' => $user_id
        );
        $this->page_data['user'] = $this->User_model->get_where($where)[0];

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

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


            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/billing_address/add");
        $this->load->view("admin/footer");
    }

    function details($billing_address_id)
    {

        $where = array(
            "billing_address_id" => $billing_address_id
        );

        $billing_address = $this->Billing_address_model->get_where($where);

        $this->show_404_if_empty($billing_address);

        $this->page_data["billing_address"] = $billing_address[0];

        $where = array(
            'user_id' => $billing_address[0]['user_id']
        );
        $this->page_data['user'] = $this->User_model->get_where($where)[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/billing_address/details");
        $this->load->view("admin/footer");
    }

    function delete(){

        if($_POST){

            $this->Billing_address_model->soft_delete($_POST['billing_address_id']);
        }
    }

    function edit($billing_address_id)
    {

        $where = array(
            'billing_address_id' => $billing_address_id
        );

        $billing_address = $this->Billing_address_model->get_where($where);
        $this->page_data['billing_address'] = $billing_address[0];

        $this->page_data['input_field'] = $this->Billing_address_model->generate_edit_input($billing_address_id);

        $where = array(
            'user_id' => $billing_address[0]['user_id']
        );
        $this->page_data['user'] = $this->User_model->get_where($where)[0];
        $this->page_data['user_id'] = $billing_address[0]['user_id'];

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){
                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

                $data = array(
                    'address1' => $input['address1'],
                    'address2' => $input['address2'],
                    'state' => $input['state'],
                    'postcode' => $input['postcode'],
                    'country' => $input['country'],
                    'modified_date' => $date->format("Y-m-d h:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $where = array(
                    'billing_address_id' => $billing_address_id
                );

                $this->Billing_address_model->update_where($where, $data);

                redirect("user/details/" . $billing_address[0]['user_id'], "redirect");

            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/billing_address/edit");
        $this->load->view("admin/footer");
    }

}
