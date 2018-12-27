<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Store_model");
        $this->load->model("Staff_model");
        $this->load->model("Role_model");
    }

    public function index()
    {
        $this->page_data["staff"] = $this->Staff_model->get_all_with_role();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/staff/all");
        $this->load->view("admin/footer");
    }

    public function add()
    {
        $where = array(
            "type" => "STAFF",
        );

        $this->page_data['role'] = $this->Role_model->get_where($where);
        $this->page_data['store'] = $this->Store_model->get_all();

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
                    'store_id' => $input['store_id'],
                    'name' => $input['name'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt'],
                );

                $this->Staff_model->insert($data);

                redirect("staff", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/staff/add");
        $this->load->view("admin/footer");
    }

    public function details($staff_id)
    {
        $where = array(
            "staff_id" => $staff_id,
        );

        $this->page_data['staff'] = $this->Staff_model->get_where_with_role($where)[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/staff/details");
        $this->load->view("admin/footer");
    }

    public function edit($staff_id)
    {
        $where = array(
            "staff_id" => $staff_id,
        );

        $this->page_data['staff'] = $this->Staff_model->get_where_with_role($where)[0];

        $where = array(
            "type" => "STAFF",
        );

        $this->page_data['role'] = $this->Role_model->get_where($where);

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"], $staff_id);

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
                    'staff_id' => $staff_id
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

                $this->Staff_model->update_where($where, $data);

                redirect('staff/details/' . $staff_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/staff/edit");
        $this->load->view("admin/footer");
    }
}
