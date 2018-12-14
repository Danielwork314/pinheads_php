<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dressing extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Dressing_model");
    }

    public function index()
    {
        $this->page_data["dressing"] = $this->Dressing_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/dressing/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        $this->page_data['dressing'] = $this->Dressing_model->get_all();
        $this->page_data['input_field'] = $this->Dressing_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'dressing' => $input['dressing'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $customize_id = $this->Dressing_model->insert($data);

                redirect("dressing", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/dressing/add");
        $this->load->view("admin/footer");
    }


}
