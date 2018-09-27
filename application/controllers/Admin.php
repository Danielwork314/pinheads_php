<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("Admin_model");
    }

    function index()
    {
        $this->page_data["admin"] = $this->Admin_model->get_all_with_role();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/admin/all");
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
            }
            if ($input["password"] != $input["password2"]) {
                $error = true;
                $this->page_data["error"] = "Passwords do not match";
            }

            if (!$error) {
                $hash = $this->hash($input['password']);

                $data = array(
                    'username' => $input['username'],
                    'role_id' => $input['role_id'],
                    'name' => $input['name'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt']
                );

                $this->Admin_model->insert($data);

                redirect("admin", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->page_data["role"] = $this->Role_model->get_type("ADMIN");
        $this->page_data['input_field'] = $this->Admin_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/admin/add");
        $this->load->view("admin/footer");
    }

    function details($admin_id)
    {

        $where = array(
            "admin_id" => $admin_id
        );

        $admin = $this->Admin_model->get_where_with_role($where);

        $this->show_404_if_empty($admin);

        $this->page_data["admin"] = $admin[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/admin/details");
        $this->load->view("admin/footer");
    }

    function edit($admin_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"], $admin_id);

            if ($exists) {
                $error = true;
                $this->page_data["error"] = "Username already exists.";
            }
            if (!empty($input['password'])) {
                if ($input["password"] != $input["password2"]) {
                    $error = true;
                    $this->page_data["error"] = "Passwords do not match";
                }
            }

            if (!$error) {
                $where = array(
                    'admin_id' => $admin_id
                );

                $data = array(
                    'username' => $input['username'],
                    'name' => $input['name'],
                    'role_id' => $input['role_id']
                );

                if (!empty($input['password'])) {
                    $hash = $this->hash['password'];
                    $data['password'] = $hash['password'];
                    $data['salt'] = $hash['salt'];
                }

                $this->Admin_model->update_where($where, $data);

                redirect('admin/details/' . $admin_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $where = array(
            "admin_id" => $admin_id
        );

        $admin = $this->Admin_model->get_where_with_role($where);

        $this->show_404_if_empty($admin);

        $this->page_data["admin"] = $admin[0];
        $this->page_data["role"] = $this->Role_model->get_type("ADMIN");
        $this->page_data['input_field'] = $this->Admin_model->generate_edit_input($admin_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/admin/edit");
        $this->load->view("admin/footer");
    }

    function delete($admin_id)
    {
        $this->Admin_model->soft_delete($admin_id);

        redirect("admin", "refresh");
    }

}
