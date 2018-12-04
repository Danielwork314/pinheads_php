<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Social_media_link extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Social_media_link_model");
        $this->load->model("Social_media_model");
        $this->load->model("Store_model");

    }

    public function index()
    {
        $this->page_data["social_media"] = $this->Social_media_model->get_all();
        $this->page_data["social_media_link"] = $this->Social_media_link_model->get_all();
        // $this->debug($this->page_data["social_media_link"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/social_media_link/all");
        $this->load->view("admin/footer");
    }

    function add($store_id)
    {

        $this->page_data['store'] = $this->Store_model->get_all();
        
        $where = array(
            'store_id' => $store_id
        );
        $this->page_data['store'] = $this->Store_model->get_where($where)[0];
        
        $this->page_data['store_id'] = $store_id;

        $this->page_data['social_media'] = $this->Social_media_model->get_all();
        
        $this->page_data['input_field'] = $this->Social_media_link_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'social_media_link' => $input['social_media_link'],
                    // 'url' => $input['url'],
                    'social_media_id'       => $input['social_media_id'],
                    'store_id' => $store_id,
                    'created_by' => $this->session->userdata('login_id'),
                );

                $social_media_link_id = $this->Social_media_link_model->insert($data);

                redirect("store/details/" . $store_id, "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/social_media_link/add");
        $this->load->view("admin/footer");
    }

    function details($social_media_link_id)
    {

        $where = array(
            "social_media_link_id" => $social_media_link_id
        );
        
        $social_media_link = $this->Social_media_link_model->get_where($where);

        $this->page_data["social_media_link"] = $social_media_link[0];

        $where = array(
            'store_id' => $social_media_link[0]['store_id']
        );
        $this->page_data['store'] = $this->Store_model->get_where($where)[0];
        $this->page_data['store_id'] = $social_media_link[0]['store_id'];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/social_media_link/details");
        $this->load->view("admin/footer");
    }

    function edit($social_media_link_id)
    {

        $this->page_data['input_field'] = $this->Social_media_link_model->generate_edit_input($social_media_link_id);

        $where = array(
            'social_media_link_id' => $social_media_link_id
        );

        $social_media_link = $this->Social_media_link_model->get_where($where);

        $this->page_data['social_media_link'] = $social_media_link[0];
        

        $where = array(
            'store_id' => $social_media_link[0]['store_id']
        );
        $this->page_data['store'] = $this->Store_model->get_where($where)[0];
        
        $this->page_data['store_id'] = $social_media_link[0]['store_id'];

        if ($_POST) {

            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
            
                $data = array(
                    'social_media_link' => $input['social_media_link'],
                    'social_media_id'       => $input['social_media_id'],
                    // 'url' => $input['url'],
                    'created_by' => $this->session->userdata('login_id'),
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $store_id = $this->Social_media_link_model->get_where($where)[0];

                $this->Social_media_link_model->update_where($where, $data);

                // redirect("store/details/" . $social_media_link[0]['$store_id'], "refresh");
                redirect("store/details/" . $store_id['store_id'], "refresh");

            }else{

                $this->page_data["input"] = $input;
            }

        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/social_media_link/edit");
        $this->load->view("admin/footer");
    }

    function delete($social_media_link_id){

        $this->Social_media_link_model->soft_delete($social_media_link_id);
        redirect("store/details/" . $store_id, "refresh");
    }

}
