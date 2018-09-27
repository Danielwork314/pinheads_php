<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_models extends Base_Controller
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

            $error = false;

            if (!$error) {

                for ($i = 0; $i < count($input['product_model']); $i++) {
                    if (trim($input['product_model'][$i]) != "") {
                        $data = array(
                            "product_id" => $product_id,
                            "product_model" => $input['product_model'][$i],
                            "SKU" => $input['sku'][$i],
                        );

                        $this->Product_model_model->insert($data);
                    }
                }

                redirect("product/details/" . $product_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/product_models/add");
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
