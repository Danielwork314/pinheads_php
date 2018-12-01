<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pricing extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Pricing_model");

    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR"){

            $where = array(
                "pricing.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $pricing_id = $this->Pricing_model->get_where($where);
            $this->page_data["pricing"] = $pricing_id;

        }else{
            
            $this->page_data["pricing"] = $this->Pricing_model->get_all();
        }

        // $this->debug($this->page_data["pricing"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/pricing/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        $this->page_data['pricing'] = $this->Pricing_model->get_all();
        $this->page_data['input_field'] = $this->Pricing_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'pricing' => $input['pricing'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Pricing_model->insert($data);

                redirect("pricing", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/pricing/add");
        $this->load->view("admin/footer");
    }

    function details($pricing_id)
    {

        $where = array(
            "pricing_id" => $pricing_id
        );
        // $this->debug($pricing_id);
        $pricing = $this->Pricing_model->get_where($where);

        $this->page_data["pricing"] = $pricing[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/pricing/details");
        $this->load->view("admin/footer");
    }

    function edit($pricing_id)
    {

        $where = array(
            'pricing_id' => $pricing_id
        );

        $pricing = $this->Pricing_model->get_where($where);

        $this->page_data['pricing'] = $pricing[0];

        $this->page_data['input_field'] = $this->Pricing_model->generate_edit_input($pricing_id);

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
            
                $data = array(
                    'pricing' => $input['pricing'],
                    'created_by' => $this->session->userdata('login_id'),
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $this->Pricing_model->update_where($where, $data);

                redirect("pricing", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }

        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/pricing/edit");
        $this->load->view("admin/footer");
    }

    function delete($pricing_id){

        $this->Pricing_model->soft_delete($pricing_id);
        redirect("pricing", "refresh");
    }

}
