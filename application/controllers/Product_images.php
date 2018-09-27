<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_images extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Product_model");
        $this->load->model("Product_model_model");
        $this->load->model("Product_image_model");
    }

    public function add($product_id)
    {

        $this->page_data['product_id'] = $product_id;

        if ($_POST) {
            $input = $this->input->post();

            if ($_FILES) {
                if (!empty($_FILES['product_images']['name'] and $_FILES['product_images']['name'][0] != "")) {
                    $images = $this->multi_image_upload($_FILES, "product_images", "product_images");

                    if (!$images["error"]) {
                        $product_images_urls = $images['urls'];
                    } else {
                        $error = true;
                        $error_message = $images["error_message"];
                    }
                }
            }

            $error = false;

            if (!$error) {

                foreach ($product_images_urls as $row) {
                    $data = array(
                        "product_id" => $product_id,
                        "product_image" => $row,
                    );

                    $this->Product_image_model->insert($data);
                }


                redirect("product/details/" . $product_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/product_images/add");
        $this->load->view("admin/footer");
    }

    public function details($product_id)
    {

        $where = array(
            "product_id" => $product_id,
        );

        $product = $this->get_thumb($this->Product_model->get_where($where), "thumbnail");

        $this->show_404_if_empty($product);

        $this->page_data["product"] = $product[0];
        $this->page_data["product_model"] = $this->Product_model_model->get_where($where);
        $this->page_data["product_image"] = $this->get_thumb($this->Product_image_model->get_where($where), "product_image");

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/product/details");
        $this->load->view("admin/footer");
    }

    public function edit($product_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            if ($_FILES) {
                if (!empty($_FILES['thumbnail']['name'])) {
                    $image = $this->multi_image_upload($_FILES, "thumbnail", "product", 1);

                    if (!$image["error"]) {
                        $thumbnail = $image['urls'];
                    } else {
                        $error = true;
                        $error_message = $image["error_message"];
                    }
                } 
            }

            $error = false;

            if (!$error) {
                $where = array(
                    'product_id' => $product_id,
                );

                $data = array(
                    'product' => $input['product'],
                    'product_category_id' => $input['product_category_id'],
                    'price' => $input['price'],
                    'description' => $input['description'],
                );

                if (!empty($thumbnail)) {
                    $data['thumbnail'] = $thumbnail;
                }

                $this->Product_model->update_where($where, $data);

                redirect('product/details/' . $product_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $where = array(
            "product_id" => $product_id,
        );

        $product = $this->Product_model->get_where($where);

        $this->show_404_if_empty($product);

        $this->page_data["product"] = $product[0];
        $this->page_data['input_field'] = $this->Product_model->generate_edit_input($product_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/product/edit");
        $this->load->view("admin/footer");
    }

    public function delete($product_id)
    {
        $this->Admin_model->soft_delete($product_id);

        redirect("product", "refresh");
    }

}
