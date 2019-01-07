<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customize extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Customize_model");
        $this->load->model("Dressing_model");
        $this->load->model("Customize_dressing_model");
    }

    public function index()
    {

        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR") {

            $where = array(
                "created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $customize = $this->Customize_model->get_where($where);

            $this->page_data["customize"] = $customize;

        }else{

            $this->page_data["customize"] = $this->Customize_model->get_all();
        }
        
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/customize/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        $this->page_data['customize'] = $this->Customize_model->get_all();
        $this->page_data['dressing'] = $this->Dressing_model->get_all();
        $this->page_data['input_field'] = $this->Customize_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'customize' => $input['customize'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $customize_id = $this->Customize_model->insert($data);

                foreach($input['dressing_array'] as $row){

                    $data = array(
                        'customize_id' => $customize_id,
                        'dressing_id' => $row['dressing_id'],
                        'created_by' => $this->session->userdata('login_id'),
                    );

                    $this->Customize_dressing_model->insert($data);
                }

                redirect("customize", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/customize/add");
        $this->load->view("admin/footer");
    }

    function delete($customize_id){

        $this->Customize_model->soft_delete($customize_id);
        redirect("customize", "refresh");
    }

    public function details($customize_id)
    {
        $where = array(
            'customize_id' => $customize_id
        );

        $this->page_data["customize"] = $this->Customize_model->get_where($where)[0];
        $this->page_data["dressing"] = $this->Customize_dressing_model->get_where($where);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/customize/details");
        $this->load->view("admin/footer");
    }

    function edit($customize_id)
    {

        $where = array(
            'customize_id' => $customize_id
        );

        $customize = $this->Customize_model->get_where($where);

        $this->page_data['customize'] = $customize[0];
        $this->page_data['dressing'] = $this->Customize_dressing_model->get_where($where);
        $this->page_data['dressing_list'] = $this->Dressing_model->get_all();
        $this->page_data['input_field'] = $this->Customize_model->generate_edit_input($customize_id);

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
            
                $data = array(
                    'customize' => $input['customize'],
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $this->Customize_model->update_where($where, $data);

                $this->Customize_dressing_model->hard_delete_where($where);

                foreach($input['dressing_array'] as $row){

                    $data = array(
                        'customize_id' => $customize_id,
                        'dressing_id' => $row['dressing_id'],
                        'created_by' => $this->session->userdata('login_id'),
                    );

                    $this->Customize_dressing_model->insert($data);
                }

                redirect("customize", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }

        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/customize/edit");
        $this->load->view("admin/footer");
    }

}
