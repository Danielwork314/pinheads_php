<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Store extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Store_model");
        $this->load->model("Gourmet_type_model");
        $this->load->model("Pricing_model");
        $this->load->model("Food_model");
        $this->load->model("Role_model");
        $this->load->model("Vendor_model");
        $this->load->model("Access_model");
        $this->load->model("Feature_model");
        $this->load->model("Store_feature_model");
    }

    public function index()
    {
        $type = $this->session->userdata('login_data')['type'];

        if ($type == "VENDOR") {

            $where = array(
                "vendor_id" => $this->session->userdata("login_id"),
                // "store.created_by" => $this->session->userdata("login_data")["vendor_id"],
            );

            $store_id = $this->Store_model->get_where($where);
            $this->page_data["store"] = $store_id;

        } else {

            $this->page_data["store"] = $this->Store_model->get_all();
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/all");
        $this->load->view("admin/footer");
    }

    public function add()
    {

        $this->page_data['feature'] = $this->Feature_model->get_all();
        $this->page_data['input_field'] = $this->Store_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!empty($_FILES['thumbnail']['name'])) {
                $image = $this->multi_image_upload($_FILES, "thumbnail", "store", 1);

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

                    'thumbnail' => $image_url,
                    'store' => $input['store'],
                    'address' => $input['address'],
                    'phone' => $input['phone'],
                    'latitude' => $input['latitude'],
                    'longitude' => $input['longitude'],
                    'business_hour' => $input['business_hour'],
                    'gourmet_type_id' => $input['gourmet_type_id'],
                    'pricing_id' => $input['pricing_id'],
                    'created_by' => $this->session->userdata('login_id'),
                    'vendor_id' => $input['vendor_id'],
                );

                if ($input['favourite']) {
                    $data['favourite'] = 1;
                }

                $vendor_id = $this->Store_model->insert($data);

                foreach ($input['feature_id'] as $row) {
                    $data = array(
                        "vendor_id" => $vendor_id,
                        "feature_id" => $row,
                    );

                    $this->Store_feature_model->insert($data);
                }

                redirect("store", "refresh");

            } else {

                $this->page_data["input"] = $input;
                $this->page_data["error"] = $error_message;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/add");
        $this->load->view("admin/footer");
    }

    public function details($store_id)
    {
        $where = array(
            "store_id" => $store_id,
        );

        $store = $this->Store_model->get_where($where);
        $store_feature = $this->Store_feature_model->get_where($where);

        $where = array(
            "food.store_id" => $store_id,
        );

        $food = $this->Food_model->get_where($where);

        $this->page_data["store"] = $store[0];
        $this->page_data["food"] = $food;
        $this->page_data["store_feature"] = $store_feature;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/details");
        $this->load->view("admin/footer");
    }

    public function details_store($store_id)
    {

        $where = array(
            "store_id" => $store_id,
        );

        $store = $this->Store_model->get_where($where);

        $where = array(
            "food.store_id" => $store_id,
        );

        $food = $this->Food_model->get_where($where);

        $this->page_data["store"] = $store[0];

        $this->page_data["food"] = $food;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/details_store");
        $this->load->view("admin/footer");
    }

    public function edit($store_id)
    {

        $where = array(
            'store_id' => $store_id,
        );

        $store = $this->Store_model->get_where($where)[0];

        $this->page_data['store'] = $store;
        $this->page_data['store_feature'] = $this->Store_feature_model->get_where($where);
        $this->page_data['feature'] = $this->Feature_model->get_all();
        $this->page_data['input_field'] = $this->Store_model->generate_edit_input($store_id);

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!empty($_FILES['thumbnail']['name'])) {
                $image = $this->multi_image_upload($_FILES, "thumbnail", "store", 1);

                if (!$image["error"]) {
                    $image_url = $image['urls'];
                } else {
                    $error = true;
                    $error_message = $image["error_message"];
                }
            }

            if (!$error) {

                $where = array(
                    "store_id" => $store_id,
                );

                $data = array(
                    'store' => $input['store'],
                    'address' => $input['address'],
                    'phone' => $input['phone'],
                    'latitude' => $input['latitude'],
                    'longitude' => $input['longitude'],
                    'business_hour' => $input['business_hour'],
                    'gourmet_type_id' => $input['gourmet_type_id'],
                    'pricing_id' => $input['pricing_id'],
                    'modified_by' => $this->session->userdata('login_id'),
                );

                if (!empty($image_url)) {
                    $data['thumbnail'] = $image_url;
                }
                if (!empty($input['favourite'])) {
                    $data['favourite'] = 1;
                }

                $this->Store_model->update_where($where, $data);

                $this->Store_feature_model->hard_delete_where($where);

                foreach ($input['feature_id'] as $row) {
                    $data = array(
                        "store_id" => $store_id,
                        "feature_id" => $row,
                    );

                    $this->Store_feature_model->insert($data);
                }

                redirect("store", "refresh");
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/store/edit");
        $this->load->view("admin/footer");
    }

    public function delete($store_id)
    {
        $this->Store_model->soft_delete($store_id);
        redirect("store", "refresh");
    }

}
