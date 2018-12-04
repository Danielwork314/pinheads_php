<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Social_media extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Social_media_model");

    }

    public function index()
    {
        
        $this->page_data["social_media"] = $this->Social_media_model->get_all();

        // $this->debug($this->page_data["social_media"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/social_media/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        $this->page_data['social_media'] = $this->Social_media_model->get_all();
        $this->page_data['input_field'] = $this->Social_media_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'social_media' => $input['social_media'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Social_media_model->insert($data);

                redirect("social_media", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/social_media/add");
        $this->load->view("admin/footer");
    }

    function details($social_media_id)
    {

        $where = array(
            "social_media_id" => $social_media_id
        );
        // $this->debug($social_media_id);
        $social_media = $this->Social_media_model->get_where($where);

        $this->page_data["social_media"] = $social_media[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/social_media/details");
        $this->load->view("admin/footer");
    }

    function edit($social_media_id)
    {

        $where = array(
            'social_media_id' => $social_media_id
        );

        $social_media = $this->Social_media_model->get_where($where);

        $this->page_data['social_media'] = $social_media[0];

        $this->page_data['input_field'] = $this->Social_media_model->generate_edit_input($social_media_id);

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
            
                $data = array(
                    'social_media' => $input['social_media'],
                    'created_by' => $this->session->userdata('login_id'),
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $this->Social_media_model->update_where($where, $data);

                redirect("social_media", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }

        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/social_media/edit");
        $this->load->view("admin/footer");
    }

    function delete($social_media_id){

        $this->Social_media_model->soft_delete($social_media_id);
        redirect("social_media", "refresh");
    }

}
