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
        $this->load->model("Role_model");
        $this->load->model("Access_model");
    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR"){

            $where = array(
                "vendor_id" => $this->session->userdata("login_id"),
                // "store.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $store_id = $this->Store_model->get_where($where);
            $this->page_data["store"] = $store_id;

        }else{
            
            $this->page_data["store"] = $this->Store_model->get_all();
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        $this->page_data['gourmet_type'] = $this->Gourmet_type_model->get_all();
        $this->page_data['pricing'] = $this->Pricing_model->get_all();
        $this->page_data['input_field'] = $this->Store_model->generate_input();

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

                     $error_message = $this->upload->display_errors();
                }
            }

            if(!$error){

                $data = array(

                    'thumbnail'         => $thumbnail,
                    'store'             => $input['store'],
                    'address'           => $input['address'],
                    'social_media_link' => $input['social_media_link'],
                    'phone'             => $input['phone'],
                    'latitude'          => $input['latitude'],
                    'longitude'         => $input['longitude'],
                    'business_hour'     => $input['business_hour'],
                    'gourmet_type_id'   => $input['gourmet_type_id'],
                    'pricing_id'        => $input['pricing_id'],
                    'created_by'        => $this->session->userdata('login_id'),
                    'vendor_id'         => $this->session->userdata('login_id'),
                );

                if(isset($input['take_away'])){
                    $data['take_away'] = 1;
                }

                if(isset($input['dine_in'])){
                    $data['dine_in'] = 1;
                }

                if(isset($input['halal'])){
                    $data['halal'] = 1;
                }

                if(isset($input['vegetarian'])){
                    $data['vegetarian'] = 1;
                }

                if(isset($input['favourite'])){
                    $data['favourite'] = 1;
                }

                $this->Store_model->insert($data);
                
                redirect("store", "refresh"); 

            }else{

                $this->page_data["input"] = $input;
            }
        }

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

        $where = array(
            'store_id' => $store_id
        );

        $store = $this->Store_model->get_where($where)[0];

        $this->page_data['store'] = $store;

        $this->page_data['type'] = $this->Gourmet_type_model->get_all();
        $this->page_data['price'] = $this->Pricing_model->get_all();

        $this->page_data['input_field'] = $this->Store_model->generate_edit_input($store_id);

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
                    
                     $error_message = $this->upload->display_errors();
                }
            }

            if(!$error){

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
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/edit");
        $this->load->view("admin/footer");
    }

    function delete($store_id){
        $this->Store_model->soft_delete($store_id);
        redirect("store", "refresh");
    }

}
