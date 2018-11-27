<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gourmet_type extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Gourmet_type_model");
       
    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR"){

            $where = array(
                "gourmet_type.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $gourmet_type_id = $this->Gourmet_type_model->get_where($where);
            $this->page_data["gourmet_type"] = $gourmet_type_id;

        }else{
            
            $this->page_data["gourmet_type"] = $this->Gourmet_type_model->get_all();
        }

        // $this->debug($this->page_data["gourmet"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/gourmet_type/all");
        $this->load->view("admin/footer");
    }

    function add()
    {
        $this->page_data['gourmet_type'] = $this->Gourmet_type_model->get_all();
        $this->page_data['input_field'] = $this->Gourmet_type_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'gourmet_type' => $input['gourmet_type'],
                    'created_by' => $this->session->userdata('login_id'),
                );

            $this->Gourmet_type_model->insert($data);

            redirect("gourmet_type", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/gourmet_type/add");
        $this->load->view("admin/footer");
    }

    function details($gourmet_type_id)
    {

        $where = array(
            "gourmet_type_id" => $gourmet_type_id
        );
        // $this->debug($gourmet_type_id);
        $gourmet_type = $this->Gourmet_type_model->get_where($where);

        $this->page_data["gourmet_type"] = $gourmet_type[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/gourmet_type/details");
        $this->load->view("admin/footer");
    }

    function edit($gourmet_type_id)
    {

        $where = array(
            'gourmet_type_id' => $gourmet_type_id
        );

        $gourmet_type = $this->Gourmet_type_model->get_where($where);

        $this->page_data['gourmet_type'] = $gourmet_type[0];

        $this->page_data['input_field'] = $this->Gourmet_type_model->generate_edit_input($gourmet_type_id);

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
            
                $data = array(
                    'gourmet_type' => $input['gourmet_type'],
                    'created_by' => $this->session->userdata('login_id'),
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $this->Gourmet_type_model->update_where($where, $data);

                redirect("gourmet_type", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }   
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/gourmet_type/edit");
        $this->load->view("admin/footer");
    }

    function delete($gourmet_type_id){

        $this->Gourmet_type_model->soft_delete($gourmet_type_id);
        redirect("gourmet_type", "refresh");
    }
}
