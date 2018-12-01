<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Store_category extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Store_category_model");
        $this->load->model("Vendor_model");
    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if ($type == "VENDOR") {

            $where = array(
                "store_category.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $store_category_id = $this->Store_category_model->get_where($where);
            $this->page_data["store_category"] = $store_category_id;

        } else {

            $this->page_data["store_category"] = $this->Store_category_model->get_all();
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store_category/all");
        $this->load->view("admin/footer");
    }

    public function add()
    {
        $this->page_data['input_field'] = $this->Store_category_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!empty($_FILES['thumbnail']['name'])) {
                $image = $this->multi_image_upload($_FILES, "thumbnail", "store_category", 1);

                if (!$image["error"]) {
                    $image_url = $image['urls'];
                } else {
                    $error = true;
                    $error_message = $image["error_message"];
                }
            } else {
                $error = true;
                $error_message = "Please upload a thumbnail";
            }

            if (!$error) {
                $data = array(
                    'store_category' => $input['store_category'],
                    'thumbnail' => $image_url,
                    // 'parent_id' => $input['parent_id'],
                );

                $this->Store_category_model->insert($data);

                redirect("store_category", "refresh");

            } else {

                $this->page_data["input"] = $input;
                $this->page_data["error"] = $error_message;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store_category/add");
        $this->load->view("admin/footer");
    }

    public function details($store_category_id)
    {

        $where = array(
            "store_category_id" => $store_category_id,
        );

        $store_category = $this->Store_category_model->get_where($where);

        $this->show_404_if_empty($store_category);

        $this->page_data["store_category"] = $store_category[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store_category/details");
        $this->load->view("admin/footer");
    }

    public function edit($store_category_id)
    {

        $where = array(
            "store_category_id" => $store_category_id,
        );

        $store_category = $this->Store_category_model->get_where($where);

        $this->show_404_if_empty($store_category);

        $this->page_data["store_category"] = $store_category[0];
        $this->page_data['input_field'] = $this->Store_category_model->generate_edit_input($store_category_id);

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!empty($_FILES['thumbnail']['name'])) {
                $image = $this->multi_image_upload($_FILES, "thumbnail", "store_category", 1);

                if (!$image["error"]) {
                    $image_url = $image['urls'];
                } else {
                    $error = true;
                    $error_message = $image["error_message"];
                }
            }

            if (!$error) {
                $where = array(
                    "store_category_id" => $store_category_id,
                );

                $data = array(
                    'store_category' => $input['store_category'],
                    // 'parent_id' => $input['parent_id'],
                );

                if (!empty($image_url)) {
                    $data['thumbnail'] = $image_url;
                }

                $this->Store_category_model->update_where($where, $data);

                redirect("store_category/details/" . $store_category_id, "refresh");
            } else {

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store_category/edit");
        $this->load->view("admin/footer");
    }

    public function delete($store_category_id)
    {
        $this->Store_category_model->soft_delete($store_category_id);

        redirect("store_category", "refresh");
    }

}
