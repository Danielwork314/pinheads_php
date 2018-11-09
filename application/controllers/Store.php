<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Store extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Store_model");
        $this->load->model("Gourmet_type_model");
        $this->load->model("Pricing_model");
        $this->load->model("Food_model");
    }

    public function index()
    {
        $this->page_data["store"] = $this->Store_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!empty($_FILES['file']['name'])) {
                $config = array(
                    "allowed_types" => "gif|png|jpg|jpeg",
                    "upload_path"   => "./images/store/",
                    "path"          => "/images/store/"
                );

                $this->load->library("upload", $config);

                if ($this->upload->do_upload("file")) {
                    $thumbnail = $config['path'] . $this->upload->data()['file_name'];
                } else {
                    die(json_encode(array(
                        "status" => false,
                        "message" => $this->upload->display_errors()
                    )));
                }
            }


            if($input['take_away']){
                $take_away = 1;
            } else {
                $take_away = 0;
            }

            if($input['dine_in']){
                $dine_in = 1;
            } else {
                $dine_in = 0;
            }

            if($input['halal']){
                $halal = 1;
            } else {
                $halal = 0;
            }

            if($input['vegetarian']){
                $vegetarian = 1;
            } else {
                $vegetarian = 0;
            }

            if($input['favourite']){
                $favourite = 1;
            } else {
                $favourite = 0;
            }


            $data = array(
                'thumbnail' => $thumbnail,
                'store' => $input['store'],
                'address' => $input['address'],
                'social_media_link' => $input['social_media_link'],
                'phone' => $input['phone'],
                'latitude' => $input['latitude'],
                'longitude' => $input['longitude'],
                'business_hour' => $input['business_hour'],
                'gourmet_type_id' => $input['gourmet_type_id'],
                'pricing_id' => $input['pricing_id'],
                'take_away' => $take_away,
                'dine_in' => $dine_in,
                'halal' => $halal,
                'vegetarian' => $vegetarian,
                'favourite' => $favourite,
                'created_by' => $this->session->userdata('login_id'),
            );

            $this->Store_model->insert($data);
            
                // redirect("store", "refresh");
                
        }

        $this->page_data['type'] = $this->Gourmet_type_model->get_all();
        $this->page_data['price'] = $this->Pricing_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/add");
        $this->load->view("admin/footer");
    }

    function details($store_id)
    {

        $where = array(
            "store_id" => $store_id
        );

        $store = $this->Store_model->get_where($where);

        $where = array(
            "food.store_id" => $store_id
        );
        $food = $this->Food_model->get_where($where);

        $this->page_data["store"] = $store[0];
        $this->page_data["food"] = $food;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/details");
        $this->load->view("admin/footer");
    }

    function edit($store_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!empty($_FILES['file']['name'])) {
                $config = array(
                    "allowed_types" => "gif|png|jpg|jpeg",
                    "upload_path"   => "./images/store/",
                    "path"          => "/images/store/"
                );

                $this->load->library("upload", $config);

                if ($this->upload->do_upload("file")) {
                    $store_thumbnail = $config['path'] . $this->upload->data()['file_name'];
                } else {
                    die(json_encode(array(
                        "status" => false,
                        "message" => $this->upload->display_errors()
                    )));
                }
            }

            if($input['take_away']){
                $take_away = 1;
            } else {
                $take_away = 0;
            }

            if($input['dine_in']){
                $dine_in = 1;
            } else {
                $dine_in = 0;
            }

            if($input['halal']){
                $halal = 1;
            } else {
                $halal = 0;
            }

            if($input['vegetarian']){
                $vegetarian = 1;
            } else {
                $vegetarian = 0;
            }

            if($input['favourite']){
                $favourite = 1;
            } else {
                $favourite = 0;
            }


            $data = array(
                'store_thumbnail' => $store_thumbnail,
                'store' => $input['store'],
                'address' => $input['address'],
                'social_media_link' => $input['social_media_link'],
                'phone' => $input['phone'],
                'latitude' => $input['latitude'],
                'longitude' => $input['longitude'],
                'business_hour' => $input['business_hour'],
                'gourmet_type_id' => $input['gourmet_type_id'],
                'pricing_id' => $input['pricing_id'],
                'take_away' => $take_away,
                'dine_in' => $dine_in,
                'halal' => $halal,
                'vegetarian' => $vegetarian,
                'favourite' => $favourite,
                'modified_by' => $this->session->userdata('login_id'),
            );

            $this->Store_model->insert($data);

            redirect("store", "refresh");
        }

        $where = array(
            'store_id' => $store_id
        );

        $store = $this->Store_model->get_where($where)[0];

        $this->page_data['type'] = $this->Gourmet_type_model->get_all();
        $this->page_data['price'] = $this->Pricing_model->get_all();
        $this->page_data['store'] = $store;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/edit");
        $this->load->view("admin/footer");
    }

    function delete($store_id){
        $this->Store_model->soft_delete($store_id);
        redirect("store", "refresh");
    }

}
