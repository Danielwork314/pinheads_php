<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Food_combo extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Food_model");
        $this->load->model("Food_combo_model");
        $this->load->model("Food_combo_food_model");
        $this->load->model("Store_model");
        $this->load->model("Role_model");
        $this->load->model("Access_model");
        $this->load->model("Food_category_model");
        $this->load->model("Food_model_model");
        $this->load->model("Vendor_model");
        $this->load->model("Customize_model");
        $this->load->model("Food_customize_model");
        $this->load->model("Food_combo_customize_model");
    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR") {

            $where = array(
                "food_combo.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $food_id = $this->Food_combo_model->get_where($where);

            $this->page_data["food_combo"] = $food_id;

        }else{

            $this->page_data["food_combo"] = $this->Food_combo_model->get_all();
        }
       
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food_combo/all");
        $this->load->view("admin/footer");

    }

    function add()
    {

        $this->page_data['food'] = $this->Food_model->get_all();
        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['customize'] = $this->Customize_model->get_all();
        $this->page_data['food_category'] = $this->Food_category_model->get_all();
        $this->page_data['input_field'] = $this->Food_combo_model->generate_input();

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

                    $image = $config['path'] . $this->upload->data()['file_name'];

                } else {

                    $error_message = $this->upload->display_errors();
                }
            }

            if(!$error){

                $data = array(
                    'image'             => $image,
                    'food_combo'        => $input['food_combo'],
                    'description'       => $input['description'],
                    'price'             => $input['price'],
                    'discount'          => $input['discount'],
                    'discounted_price'  => $input['discounted_price'],
                    'store_id'          => $input['store_id'],
                    'food_category_id'  => $input['food_category_id'],
                    'created_by'        => $this->session->userdata('login_id'),
                );

                $food_combo_id = $this->Food_combo_model->insert($data);

                // if(!empty($input['food_model'])){

                //     for ($i = 0; $i < count($input['food_model']); $i++) {

                //         if (trim($input['food_model'][$i]) != "") {

                //             $data = array(
                //                 "food_id" => $food_id,
                //                 "food_model" => $input['food_model'][$i],
                //                 "SKU" => $input['sku'][$i],
                //             );
        
                //             $this->Food_model_model->insert($data);
                //         }
                //     }
                // }

                foreach($input['customize'] as $row){

                    $data = array(
                        'food_combo_id' => $food_combo_id,
                        'customize_id' => $row
                    );

                    $this->Food_combo_customize_model->insert($data);
                }

                foreach($input['food'] as $row){

                    $data = array(
                        'food_combo_id' => $food_combo_id,
                        'food_id' => $row
                    );

                    $this->Food_combo_food_model->insert($data);
                }

                redirect("food_combo", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }
    
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food_combo/add");
        $this->load->view("admin/footer");
    }

    function details($food_combo_id)
    {

        $where = array(
            "food_combo_id" => $food_combo_id
        );

        $food_combo = $this->Food_combo_model->get_where($where);

        $this->show_404_if_empty($food_combo);

        $this->page_data["food_combo"] = $food_combo[0];

        $this->page_data['customize'] = $this->Food_combo_customize_model->get_where($where);
        $this->page_data['food_list'] = $this->Food_combo_food_model->get_where($where);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food_combo/details");
        $this->load->view("admin/footer");
    }

    function edit($food_combo_id)
    {

        $where = array(
            'food_combo_id' => $food_combo_id
        );

        $food_combo = $this->Food_combo_model->get_where($where);

        $this->show_404_if_empty($food_combo);

        $this->page_data['food_combo_id'] = $food_combo_id;
        $this->page_data['food_combo'] = $food_combo[0];
        $this->page_data['food'] = $this->Food_model->get_all();
        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['food_category'] = $this->Food_category_model->get_all();
        $this->page_data['input_field'] = $this->Food_combo_model->generate_edit_input($food_combo_id);
        $this->page_data['customize'] = $this->Customize_model->get_all();
        $this->page_data['customize_list'] = $this->Food_combo_customize_model->get_where($where);   
        $this->page_data['food_list'] = $this->Food_combo_food_model->get_where($where);        
        
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!empty($_FILES['file']['name'])) {
                $config = array(
                    "allowed_types" => "gif|png|jpg|jpeg",
                    "upload_path"   => "./images/food/",
                    "path"          => "/images/food/"
                );

                $this->load->library("upload", $config);

                if ($this->upload->do_upload("file")) {
                    $image = $config['path'] . $this->upload->data()['file_name'];
                } else {

                   $error_message = $this->upload->display_errors();
                }

            }

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

                $data = array(
                    'food_combo'        => $input['food_combo'],
                    'description'       => $input['description'],
                    'price'             => $input['price'],
                    'discounted_price'  => $input['discounted_price'],
                    'discount'          => $input['discount'],
                    'modified_date'     => $date->format("Y-m-d h:i:s"),
                    'store_id'          => $input['store_id'],
                    'food_category_id'  => $input['food_category_id'],
                    'modified_by'       => $this->session->userdata('login_id')
                );

                if($image){
                    $data['image'] = $image;
                }

                $this->Food_combo_model->update_where($where, $data);

                $this->Food_combo_customize_model->hard_delete_where($where);
                $this->Food_combo_food_model->hard_delete_where($where);

                foreach($input['customize'] as $row){

                    $data = array(
                        'food_combo_id' => $food_combo_id,
                        'customize_id' => $row
                    );

                    $this->Food_combo_customize_model->insert($data);
                }

                foreach($input['food'] as $row){

                    $data = array(
                        'food_combo_id' => $food_combo_id,
                        'food_id' => $row
                    );

                    $this->Food_combo_food_model->insert($data);
                }

                redirect("food_combo", "refresh");

            }else{

            $this->page_data["input"] = $input;
        }
    }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food_combo/edit");
        $this->load->view("admin/footer");
    }
}
