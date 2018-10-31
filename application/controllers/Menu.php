<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Menu_model");
        $this->load->model("Store_model");
        $this->load->model("Ingredient_model");
        $this->load->model("Food_ingredient_model");
    }

    // public function index()
    // {
    //     $this->page_data["menu"] = $this->Menu_model->get_all();
    //     // $this->debug($this->page_data["food"]);
    //     $this->load->view("admin/header", $this->page_data);
    //     $this->load->view("admin/menu/all");
    //     $this->load->view("admin/footer");
    // }

    function add($store_id)
    {
        $this->page_data['store_id'] = $store_id;
        // $this->page_data['ingredient_id'] = $ingredient_id;

        if ($_POST) {

            // $this->debug($_POST);

            $input = $this->input->post();

            $this->debug($_FILES['file']['name']);

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

            $data = array(
                'image' => $image,
                'menu' => $input['menu'],
                'description' => $input['description'],
                'price' => $input['price'],
                'discount' => $input['discount'],
                'created_by' => $this->session->userdata('login_id'),
                // 'ingredient_id' => $ingredient_id,
                'store_id' => $store_id,

            );

            $menu_id = $this->Menu_model->insert($data); 

        //    $ingredient_id =  $input['ingredient_id'];

        // //    $this->debug($input);

        //     foreach($ingredient_id AS $row){

        //         $data = array(
                 
        //             'menu_id' => $menu_id,
        //             'ingredient_id' => $row

        //         );
        //         $this->Food_ingredient_model->insert($data);
        //     }


        

            redirect("store/details/" . $store_id, "refresh");

        }

        $this->page_data['food_ingredient'] = $this->Food_ingredient_model->get_all();

        $this->page_data['ingredient'] = $this->Ingredient_model->get_all();

        $this->page_data['input_fields'] = $this->Menu_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/menu/add");
        $this->load->view("admin/footer");
    }

    function details($menu_id)
    {

        $where = array(
            "menu_id" => $menu_id
        );
        // $this->debug($menu_id);
        $menu = $this->Menu_model->get_where($where);
        $this->page_data["menu"] = $menu[0];

        // $store = $this->Store_model->get_where($where);
        // $this->page_data["store"] = $store[0];


        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/menu/details");
        $this->load->view("admin/footer");
    }


    function edit($menu_id)
    {

        $where = array(
            'menu_id' => $menu_id
        );

        $menu = $this->Menu_model->get_where($where);
        
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
                'menu' => $input['menu'],
                'description' => $input['description'],
                'price' => $input['price'],
                'discount' => $input['discount'],
                'modified_date' => $date->format("Y-m-d h:i:s"),
                'modified_by' => $this->session->userdata('login_id')
            );

            $store_id = $this->Menu_model->get_where($where)[0];

            $this->Menu_model->update_where($where, $data);
           

            redirect("store/details/" . $store_id['store_id'], "refresh");
        }

        

        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['menu'] = $menu[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/menu/edit");
        $this->load->view("admin/footer");
    }

    function delete($menu_id){

        $where = array(
            "menu_id" => $menu_id
        );

        $store_id = $this->Menu_model->get_where($where)[0];


        $this->Menu_model->soft_delete($menu_id);
        redirect("store/details/" . $store_id['store_id'], "refresh");
    }

    function add_ingredient(){

   
        if($_POST){

            $input = $this->input->post();

            $error = false;

            $data = array(
                'ingredient_id' => $input['ingredient_id'],
            );

            $ingredient_id = $this->Ingredient_model->get_where($data)[0];


            // die(json_encode($ingredient_id));
        

            // $this->Menu_model->insert($data);

        }
    }

}
