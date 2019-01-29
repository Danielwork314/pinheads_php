<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Parents extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("Parents_model");
    }

    function index()
    {
        $this->page_data["parents"] = $this->Parents_model->get_all_with_role();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/parents/all");
        $this->load->view("admin/footer");
    }

    function delete($parents_id)
    {
        $this->Parents_model->soft_delete($parents_id);

        redirect("parents", "refresh");
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

                $this->Parents_model->insert($data);

                redirect("parents", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->page_data["role"] = $this->Role_model->get_type("PARENTS");
        $this->page_data['input_field'] = $this->Parents_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/parents/add");
        $this->load->view("admin/footer");
    }

    function edit($parents_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"], $parents_id);

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
                    'parents_id' => $parents_id
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

                $this->Parents_model->update_where($where, $data);

                redirect('parents/details/' . $parents_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $where = array(
            "parents_id" => $parents_id
        );

        $parents = $this->Parents_model->get_where_with_role($where);

        $this->show_404_if_empty($parents);

        $this->page_data["parents"] = $parents[0];
        $this->page_data["role"] = $this->Role_model->get_type("PARENTS");
        $this->page_data['input_field'] = $this->Parents_model->generate_edit_input($parents_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/parents/edit");
        $this->load->view("admin/footer");
    }

    function details($parents_id)
    {

        $where = array(
            "parents_id" => $parents_id
        );

        $parents = $this->Parents_model->get_where_with_role($where);

        $this->show_404_if_empty($parents);

        $this->page_data["parents"] = $parents[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/parents/details");
        $this->load->view("admin/footer");
    }
}
