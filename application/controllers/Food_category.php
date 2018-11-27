<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Food_category extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Food_category_model");
        $this->load->model("Vendor_model");
    }

    function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if($type == "VENDOR"){

            $where = array(
                "food_category.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $food_category_id = $this->Food_category_model->get_where($where);
            $this->page_data["food_category"] = $food_category_id;

        }else{
            
            $this->page_data["food_category"] = $this->Food_category_model->get_all();
        }
        
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food_category/all");
        $this->load->view("admin/footer");
    }

    function add()
    {
        $this->page_data['input_field'] = $this->Food_category_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $data = array(
                    'food_category' => $input['food_category'],
                    'parent_id' => $input['parent_id'],
                );

                $this->Food_category_model->insert($data);

                redirect("food_category", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food_category/add");
        $this->load->view("admin/footer");
    }

    function details($food_category_id)
    {

        $where = array(
            "food_category_id" => $food_category_id
        );

        $food_category = $this->Food_category_model->get_where($where);

        $this->show_404_if_empty($food_category);

        $this->page_data["food_category"] = $food_category[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food_category/details");
        $this->load->view("admin/footer");
    }

    function edit($food_category_id)
    {

        $where = array(
            "food_category_id" => $food_category_id
        );

        $food_category = $this->Food_category_model->get_where($where);

        $this->show_404_if_empty($food_category);

        $this->page_data["food_category"] = $food_category[0];
        $this->page_data['input_field'] = $this->Food_category_model->generate_edit_input($food_category_id);


        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error){
                $where = array(
                    "food_category_id" => $food_category_id
                );

                $data = array(
                    'food_category' => $input['food_category'],
                    'parent_id' => $input['parent_id'],
                );

                $this->Food_category_model->update_where($where, $data);

                redirect("food_category/details/" . $food_category_id, "refresh");
            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/food_category/edit");
        $this->load->view("admin/footer");
    }

    function delete($food_category_id)
    {
        $this->Food_category_model->soft_delete($food_category_id);

        redirect("food_category", "refresh");
    }

}
