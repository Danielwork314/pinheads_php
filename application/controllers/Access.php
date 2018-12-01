<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Access extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Admin_model");
        $this->load->model("User_model");
        $this->load->model("Vendor_model");
    }

    function login()
    {
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $where = array(
                "username" => $input["username"],
                // "password" => $input["password"]
            );

            $admin = $this->Admin_model->get_where($where);
            $user = $this->User_model->get_where($where);
            $vendor = $this->Vendor_model->get_where($where);

            if (!empty($admin)) {
                $login = $this->Admin_model->login($input["username"], $input["password"]);
                $login_data = $login[0];
                $login_id = $login[0]["admin_id"];

                // $this->debug($login);
            } else if (!empty($user)) {
                $login = $this->User_model->login($input["username"], $input["password"]);
                $login_data = $login[0];
                $login_id = $login[0]["user_id"];
            } else if (!empty($vendor)) {
                $login = $this->Vendor_model->login($input["username"], $input["password"]);
                $login_data = $login[0];
                $login_id = $login[0]["vendor_id"];
            } else {
                $error = true;
                $this->page_data["error"] = "invalid username and password";
            }

            if (!empty($login_data) AND $login_data["deleted"] == 1) {
                $error = true;
                $this->page_data["error"] = "this account has been deactivated";
            }


            if (!$error) {
                $this->session->set_userdata("login_data", $login_data);
                $this->session->set_userdata("login_id", $login_id);

                redirect("dashboard", "refresh");
            }

        }

        $this->load->view("access/header", $this->page_data);
        $this->load->view("access/login");
        $this->load->view("access/footer");
    }

    function logout()
    {
        $this->session->sess_destroy();

        redirect("access/login", "refresh");
    }
}
