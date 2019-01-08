<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Banner_model");
        $this->load->model("Store_model");

    }

    public function index()
    {

        $this->page_data["banner"] = $this->Banner_model->get_all();

        // $this->debug($this->page_data["banner"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/banner/all");
        $this->load->view("admin/footer");
    }

    public function add()
    {
        $this->page_data['store'] = $this->Store_model->get_all();
        $this->page_data['input_field'] = $this->Banner_model->generate_input();

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!empty($_FILES['image']['name'])) {
                $image = $this->multi_image_upload($_FILES, "image", "banner", 1);

                if (!$image["error"]) {
                    $image_url = $image['urls'];
                } else {
                    $error = true;
                    $error_message = $image["error_message"];
                }
            } else {
                $error = true;
                $error_message = "Please upload a banner";
            }

            if (!$error) {

                $data = array(
                    'image' => $image_url,
                    'store_id' => $_POST['store_id'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Banner_model->insert($data);

                redirect("banner", "refresh");

            } else {

                $this->page_data["input"] = $input;
                $this->page_data["error"] = $error_message;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/banner/add");
        $this->load->view("admin/footer");
    }

    public function details($banner_id)
    {

        $where = array(
            "banner_id" => $banner_id,
        );
        // $this->debug($banner_id);
        $banner = $this->Banner_model->get_where($where);

        $this->page_data["banner"] = $banner[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/banner/details");
        $this->load->view("admin/footer");
    }

    public function edit($banner_id)
    {

        $where = array(
            'banner_id' => $banner_id,
        );

        $banner = $this->Banner_model->get_where($where);

        $this->page_data['banner'] = $banner[0];

        $this->page_data['input_field'] = $this->Banner_model->generate_edit_input($banner_id);

        if ($_POST) {

            $input = $this->input->post();

            if (!empty($_FILES['image']['name'])) {
                $image = $this->multi_image_upload($_FILES, "image", "banner", 1);

                if (!$image["error"]) {
                    $image_url = $image['urls'];
                } else {
                    $error = true;
                    $error_message = $image["error_message"];
                }
            }

            $error = false;

            if (!$error) {

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));

                $data = array(
                    'modified_date' => $date->format("Y-m-d H:i:s"),
                    'modified_by' => $this->session->userdata('login_id'),
                );

                if (!empty($image_url)) {
                    $data['banner'] = $image_url;
                }

                $this->Banner_model->update_where($where, $data);

                redirect("banner/details/" . $banner_id, "refresh");

            } else {

                $this->page_data["input"] = $input;
            }

        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/banner/edit");
        $this->load->view("admin/footer");
    }

    public function delete($banner_id)
    {

        $this->Banner_model->soft_delete($banner_id);
        redirect("banner", "refresh");
    }

}
