<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("User_model");
        $this->load->model("Payment_model");
    }

    function index()
    {
        $this->page_data["user"] = $this->User_model->get_all_with_role();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/user/all");
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
                $hash = $this->hash($input['password']);

                $data = array(
                    'username' => $input['username'],
                    'role_id' => $input['role_id'],
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'contact' => $input['contact'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt']
                );

                $this->User_model->insert($data);

                redirect("user", "refresh");
            }
        }

        $this->page_data["role"] = $this->Role_model->get_type("USER");
        $this->page_data['input_field'] = $this->User_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/user/add");
        $this->load->view("admin/footer");
    }

    function details($user_id)
    {

        $where = array(
            "user_id" => $user_id
        );

        $user = $this->User_model->get_where_with_role($where);

        $this->show_404_if_empty($user);

        $this->page_data["user"] = $user[0];

        $payment = $this->Payment_model->get_where($where);
        $this->page_data["payment"] = $payment;


        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/user/details");
        $this->load->view("admin/footer");
    }

    function edit($user_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"], $user_id);

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
                    'user_id' => $user_id
                );

                $data = array(
                    'username' => $input['username'],
                    'name' => $input['name'],
                    'role_id' => $input['role_id'],
                    'email' => $input['email'],
                    'contact' => $input['contact']
                );

                if (!empty($input['password'])) {
                    $hash = $this->hash($input['password']);
                    $data['password'] = $hash['password'];
                    $data['salt'] = $hash['salt'];
                }

                $this->User_model->update_where($where, $data);

                redirect('user/details/' . $user_id, "refresh");
            }
        }

        $where = array(
            "user_id" => $user_id
        );

        $user = $this->User_model->get_where_with_role($where);

        $this->show_404_if_empty($user);

        $this->page_data["user"] = $user[0];
        $this->page_data["role"] = $this->Role_model->get_type("USER");
        $this->page_data['input_field'] = $this->User_model->generate_edit_input($user_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/user/edit");
        $this->load->view("admin/footer");
    }

    function delete($user_id)
    {
        $this->User_model->soft_delete($user_id);

        redirect("user", "refresh");
    }

}
