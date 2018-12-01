<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("Vendor_model");
        $this->load->model("Store_model");

    }

    function index()
    {
        $this->page_data["vendor"] = $this->Vendor_model->get_all_with_role();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/vendor/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"]);

            if ($exists) {
                $error = true;
                $this->page_data["error"] = "Username already exists.";
                $this->page_data["input"] = $input;
            }
            if ($input["password"] != $input["password2"]) {
                $error = true;
                $this->page_data["error"] = "Passwords do not match";
                $this->page_data["input"] = $input;
            }

            if (!$error) {

                if (!empty($_FILES['file']['name'])) {
                    $config = array(
                        "allowed_types" => "gif|png|jpg|jpeg",
                        "upload_path"   => "./images/vendor/",
                        "path"          => "/images/vendor/"
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

                $hash = $this->hash($input['password']);

                $data = array(
                    'image' => $image,
                    'username' => $input['username'],
                    'role_id' => $input['role_id'],
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'contact' => $input['contact'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt'],
                );

                $this->Vendor_model->insert($data);

                redirect("vendor", "refresh");
            }
        }

        $this->page_data["role"] = $this->Role_model->get_type("CLIENT");
        $this->page_data['input_field'] = $this->Vendor_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/vendor/add");
        $this->load->view("admin/footer");
    }

    function details($vendor_id)
    {

        $where = array(
            "vendor.vendor_id" => $vendor_id
        );

        $vendor = $this->Vendor_model->get_where_with_role($where);

        $this->show_404_if_empty($vendor);

        $this->page_data["vendor"] = $vendor[0];

        $store = $this->Store_model->get_where($where);
        $this->page_data["store"] = $store;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/vendor/details");
        $this->load->view("admin/footer");
    }

    function edit($vendor_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"], $vendor_id);

            if ($exists) {
                $error = true;
                $this->page_data["error"] = "Username already exists.";
                $this->page_data["input"] = $input;
            }
            if (!empty($input['password'])) {
                if ($input["password"] != $input["password2"]) {
                    $error = true;
                    $this->page_data["error"] = "Passwords do not match";
                    $this->page_data["input"] = $input;
                }
            }

            if (!$error) {
                $where = array(
                    'vendor_id' => $vendor_id
                );

                if (!empty($_FILES['file']['name'])) {
                    $config = array(
                        "allowed_types" => "gif|png|jpg|jpeg",
                        "upload_path"   => "./images/vendor/",
                        "path"          => "/images/vendor/"
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
                    'username' => $input['username'],
                    'name' => $input['name'],
                    'role_id' => $input['role_id'],
                    'email' => $input['email'],
                    'contact' => $input['contact'],
                );

                // $this->debug($data);

                if (!empty($input['password'])) {
                    $hash = $this->hash($input['password']);
                    $data['password'] = $hash['password'];
                    $data['salt'] = $hash['salt'];
                }

                $this->Vendor_model->update_where($where, $data);

                redirect('vendor', "refresh");
            }
        }

        $where = array(
            "vendor_id" => $vendor_id
        );

        $vendor = $this->Vendor_model->get_where_with_role($where);

        $this->show_404_if_empty($vendor);

        $this->page_data["vendor"] = $vendor[0];
        $this->page_data["role"] = $this->Role_model->get_type("CLIENT");
        $this->page_data['input_field'] = $this->Vendor_model->generate_edit_input($vendor_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/vendor/edit");
        $this->load->view("admin/footer");
    }

    function delete($vendor_id)
    {
        $this->Vendor_model->soft_delete($vendor_id);

        redirect("vendor", "refresh");
    }

}
