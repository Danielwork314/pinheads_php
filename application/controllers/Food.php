<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Food extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Food_model");
        $this->load->model("Store_model");
        $this->load->model("Role_model");
        $this->load->model("Access_model");
        $this->load->model("Food_category_model");
        $this->load->model("Food_model_model");
        $this->load->model("Vendor_model");
    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR") {

            $where = array(
                "food.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $food_id = $this->Food_model->get_where($where);

            $this->page_data["food"] = $food_id;

        }else{

            $this->page_data["food"] = $this->Food_model->get_all();
        }
       
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/all");
        $this->load->view("admin/footer");

    }

    function add()
    {

        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['food_category'] = $this->Food_category_model->get_all();
        $this->page_data['input_field'] = $this->Food_model->generate_input();

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
                    'food'              => $input['food'],
                    'description'       => $input['description'],
                    'price'             => $input['price'],
                    'discount'          => $input['discount'],
                    'discounted_price'  => $input['discounted_price'],
                    'store_id'          => $input['store_id'],
                    'food_category_id'  => $input['food_category_id'],
                    'created_by'        => $this->session->userdata('login_id'),
                );

                $food_id = $this->Food_model->insert($data);

                if(!empty($input['food_model'])){

                    for ($i = 0; $i < count($input['food_model']); $i++) {

                        if (trim($input['food_model'][$i]) != "") {

                            $data = array(
                                "food_id" => $food_id,
                                "food_model" => $input['food_model'][$i],
                                "SKU" => $input['sku'][$i],
                            );
        
                            $this->Food_model_model->insert($data);
                        }
                    }
                }

                redirect("food", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }
    
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/add");
        $this->load->view("admin/footer");
    }

    function details($food_id)
    {

        if ($_POST) {

            $where = array(
                "food_model_id" => $this->input->post("food_model_id")
            );

            $data = array(
                "quantity" => $this->input->post("quantity")
            );

            $this->Food_model_model->update_where($where, $data);

            redirect("food/details/" . $food_id, "refresh");
        }

        $where = array(
            "food_id" => $food_id
        );

        $food = $this->Food_model->get_where($where);

        $this->show_404_if_empty($food);

        $this->page_data["food"] = $food[0];

        // $this->page_data["food"] = $this->Food_model->get_where($where)[0];

        $this->page_data["food_model"] = $this->Food_model_model->get_where($where);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/details");
        $this->load->view("admin/footer");
    }

    function edit($food_id)
    {

        $where = array(
            'food_id' => $food_id
        );

        $food = $this->Food_model->get_where($where);

        $this->show_404_if_empty($food);

        $this->page_data['food'] = $food[0];

        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['food_category'] = $this->Food_category_model->get_all();
        $this->page_data['input_field'] = $this->Food_model->generate_edit_input($food_id);
        
        
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
                    'image'             => $image,
                    'food'              => $input['food'],
                    'description'       => $input['description'],
                    'price'             => $input['price'],
                    'discounted_price'  => $input['discounted_price'],
                    'discount'          => $input['discount'],
                    'modified_date'     => $date->format("Y-m-d h:i:s"),
                    'store_id'          => $input['store_id'],
                    'food_category_id'  => $input['food_category_id'],
                    'modified_by'       => $this->session->userdata('login_id')
                );

                $this->Food_model->update_where($where, $data);
                // redirect("food", "refresh");

            }else{

            $this->page_data["input"] = $input;
        }
    }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/edit");
        $this->load->view("admin/footer");
    }

    function delete($food_id){

        $this->Food_model->soft_delete($food_id);

        redirect("food", "refresh");
    }

    function add_menu($store_id)
    {
        $this->page_data['store_id'] = $store_id;
        $this->page_data['input_fields'] = $this->Food_model->generate_input();

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

                $data = array(
                    'image'             => $image,
                    'food'              => $input['food'],
                    'description'       => $input['description'],
                    'price'             => $input['price'],
                    'discounted_price'  => $input['discounted_price'],
                    'discount'          => $input['discount'],
                    'created_by'        => $this->session->userdata('login_id'),
                    'store_id'          => $store_id,
                );

                $food_id = $this->Food_model->insert($data);

                redirect("store/details/" . $store_id, "refresh");
                
            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/add_menu");
        $this->load->view("admin/footer");
    }


    function details_menu($food_id)
    {

        $where = array(
            "food_id" => $food_id
        );
        // $this->debug($menu_id);
        $food = $this->Food_model->get_where($where);
        $this->page_data["food"] = $food[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/details_menu");
        $this->load->view("admin/footer");
    }


    function edit_food($food_id)
    {

        $where = array(
            'food_id' => $food_id
        );

        $food = $this->Food_model->get_where($where);

        $this->page_data['food'] = $food[0];
        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['input_field'] = $this->Food_model->generate_edit_input($food_id);

        
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
                    'image'             => $image,
                    'food'              => $input['food'],
                    'description'       => $input['description'],
                    'price'             => $input['price'],
                    'discounted_price'  => $input['discounted_price'],
                    'discount'          => $input['discount'],
                    'modified_date'     => $date->format("Y-m-d h:i:s"),
                    'modified_by'       => $this->session->userdata('login_id')
                );

                $store_id = $this->Food_model->get_where($where)[0];

                $this->Food_model->update_where($where, $data);

                redirect("store/details/" . $store_id['store_id'], "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/edit_menu");
        $this->load->view("admin/footer");
    }

    function delete_menu($food_id){

        $where = array(
            "food_id" => $food_id
        );

        $store_id = $this->Food_model->get_where($where)[0];

        $this->Food_model->soft_delete($food_id);

        redirect("store/details/" . $store_id['store_id'], "refresh");
    }

}
