<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_category extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Product_category_model");
    }

    function index()
    {
        $this->page_data["product_category"] = $this->Product_category_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/product_category/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $data = array(
                    'product_category' => $input['product_category'],
                    'parent_id' => $input['parent_id'],
                );

                $this->Product_category_model->insert($data);

                redirect("product_category", "refresh");
            }
        }

        $this->page_data['input_field'] = $this->Product_category_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/product_category/add");
        $this->load->view("admin/footer");
    }

    function details($product_category_id)
    {

        $where = array(
            "product_category_id" => $product_category_id
        );

        $product_category = $this->Product_category_model->get_where($where);

        $this->show_404_if_empty($product_category);

        $this->page_data["product_category"] = $product_category[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/product_category/details");
        $this->load->view("admin/footer");
    }

    function edit($product_category_id)
    {

        
        $where = array(
            "product_category_id" => $product_category_id
        );

        $product_category = $this->Product_category_model->get_where($where);

        $this->show_404_if_empty($product_category);

        $this->page_data["product_category"] = $product_category[0];
        $this->page_data['input_field'] = $this->Product_category_model->generate_edit_input($product_category_id);

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $where = array(
                    "product_category_id" => $product_category_id
                );

                $data = array(
                    'product_category' => $input['product_category'],
                    'parent_id' => $input['parent_id'],
                );

                $this->Product_category_model->update_where($where, $data);

                redirect("product_category/details/" . $product_category_id, "refresh");
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/product_category/edit");
        $this->load->view("admin/footer");
    }

    function delete($user_id)
    {
        $this->User_model->soft_delete($user_id);

        redirect("user", "refresh");
    }

}
