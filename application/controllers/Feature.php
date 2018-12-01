<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Feature extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Feature_model");

    }

    public function index()
    {
        
        $this->page_data["feature"] = $this->Feature_model->get_all();

        // $this->debug($this->page_data["feature"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/feature/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        $this->page_data['feature'] = $this->Feature_model->get_all();
        $this->page_data['input_field'] = $this->Feature_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'feature' => $input['feature'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Feature_model->insert($data);

                redirect("feature", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/feature/add");
        $this->load->view("admin/footer");
    }

    function details($feature_id)
    {

        $where = array(
            "feature_id" => $feature_id
        );
        // $this->debug($feature_id);
        $feature = $this->Feature_model->get_where($where);

        $this->page_data["feature"] = $feature[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/feature/details");
        $this->load->view("admin/footer");
    }

    function edit($feature_id)
    {

        $where = array(
            'feature_id' => $feature_id
        );

        $feature = $this->Feature_model->get_where($where);

        $this->page_data['feature'] = $feature[0];

        $this->page_data['input_field'] = $this->Feature_model->generate_edit_input($feature_id);

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
            
                $data = array(
                    'feature' => $input['feature'],
                    'created_by' => $this->session->userdata('login_id'),
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $this->Feature_model->update_where($where, $data);

                redirect("feature", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }

        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/feature/edit");
        $this->load->view("admin/footer");
    }

    function delete($feature_id){

        $this->Feature_model->soft_delete($feature_id);
        redirect("feature", "refresh");
    }

}
