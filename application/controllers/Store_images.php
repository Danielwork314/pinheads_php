<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Store_images extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Store_model");
        $this->load->model("Store_image_model");
    }

    public function add($store_id)
    {

        $this->page_data['store_id'] = $store_id;

        if ($_POST) {
            $input = $this->input->post();

            if ($_FILES) {
                if (!empty($_FILES['store_images']['name'] and $_FILES['store_images']['name'][0] != "")) {
                    $images = $this->multi_image_upload($_FILES, "store_images", "store_images");

                    if (!$images["error"]) {
                        $store_images_urls = $images['urls'];
                    } else {
                        $error = true;
                        $error_message = $images["error_message"];
                    }
                }
            }

            $error = false;

            if (!$error) {

                foreach ($store_images_urls as $row) {
                    $data = array(
                        "store_id" => $store_id,
                        "image" => $row,
                    );

                    $this->Store_image_model->insert($data);
                }

                redirect("store/details/" . $store_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store_image/add");
        $this->load->view("admin/footer");
    }

    public function details($store_id)
    {

        $where = array(
            "store_id" => $store_id,
        );

        $store = $this->get_thumb($this->Store_model->get_where($where), "thumbnail");

        $this->show_404_if_empty($store);

        $this->page_data["store"] = $store[0];
        $this->page_data["store_model"] = $this->Store_model_model->get_where($where);
        $this->page_data["store_image"] = $this->get_thumb($this->Store_image_model->get_where($where), "store_image");

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/details");
        $this->load->view("admin/footer");
    }

    public function edit($store_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            if ($_FILES) {
                if (!empty($_FILES['thumbnail']['name'])) {
                    $image = $this->multi_image_upload($_FILES, "thumbnail", "store", 1);

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
                    'store_id' => $store_id,
                );

                $data = array(
                    'store' => $input['store'],
                    'store_category_id' => $input['store_category_id'],
                    'price' => $input['price'],
                    'description' => $input['description'],


                    
                );

                if (!empty($thumbnail)) {
                    $data['thumbnail'] = $thumbnail;
                }

                $this->Store_model->update_where($where, $data);

                redirect('store/details/' . $store_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $where = array(
            "store_id" => $store_id,
        );

        $store = $this->Store_model->get_where($where);

        $this->show_404_if_empty($store);

        $this->page_data["store"] = $store[0];
        $this->page_data['input_field'] = $this->Store_model->generate_edit_input($store_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/edit");
        $this->load->view("admin/footer");
    }

    public function delete($store_id)
    {
        if ($_POST) {
            $input = $this->input->post();

            foreach($input['store_image_id'] as $row){
                $this->Store_image_model->hard_delete($row);
            }

            redirect("store/details/" . $store_id, "refresh");            

        }
    }

}
