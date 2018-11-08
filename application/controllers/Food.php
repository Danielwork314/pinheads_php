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
        $this->load->model("Ingredient_model");
        $this->load->model("Food_ingredient_model");
    }

    public function index()
    {
        $this->page_data["food"] = $this->Food_model->get_all();
        // $this->debug($this->page_data["food"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/all");
        $this->load->view("admin/footer");
        // $this->debug($this->page_data["food"]);
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();
            $input = $input['food_list'];

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
                    die(json_encode(array(
                        "status" => false,
                        "message" => $this->upload->display_errors()
                    )));
                }
            }

            $data = array(
                // 'image' => $image,
                'food' => $input['food'],
                'description' => $input['description'],
                'price' => $input['price'],
                'discount' => $input['discount'],
                'store_id' => $input['store_id'],
                'created_by' => $this->session->userdata('login_id'),
            );

            $food_id = $this->Food_model->insert($data);

            foreach($input['ingredient_id'] as $row){
                

                $data = array(
                 
                    'food_id' => $food_id,
                    'ingredient_id' => $row,

                );

                $this->Food_ingredient_model->insert($data);
            }

            redirect("food", "refresh");
        }

        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['ingredient'] = $this->Ingredient_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/add");
        $this->load->view("admin/footer");
    }

    function details($food_id)
    {

        $where = array(
            "food_id" => $food_id
        );
        // $this->debug($food_id);
        $food = $this->Food_model->get_where($where);
        $this->page_data["food"] = $food[0];

        $food_ingredient = $this->Food_ingredient_model->get_where($where);
        $this->page_data["food_ingredient"] = $food_ingredient;

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
                    die(json_encode(array(
                        "status" => false,
                        "message" => $this->upload->display_errors()
                    )));
                }
            }
            $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

            $data = array(
                'image' => $image,
                'food' => $input['food'],
                'description' => $input['description'],
                'price' => $input['price'],
                'discount' => $input['discount'],
                'modified_date' => $date->format("Y-m-d h:i:s"),
                'store_id' => $input['store_id'],
                'modified_by' => $this->session->userdata('login_id')
            );

            $this->Food_model->update_where($where, $data);

            redirect("food", "refresh");
        }

        

        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['food'] = $food[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food/edit");
        $this->load->view("admin/footer");
    }

    function delete($food_id){

        $this->Food_model->soft_delete($food_id);
        redirect("food", "refresh");
    }

    function add_ingredient(){
        
        if($_POST){

            $input = $this->input->post();

            $error = false;

            $data = array(
                'ingredient_id' => $input['ingredient_detail']['ingredient_id'],
            );
            
            $ingredient_id = $this->Ingredient_model->get_where($data)[0];
            

            die(json_encode($ingredient_id));

        }
    }

}
