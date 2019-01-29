<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("Teacher_model");
    }

    function index()
    {
        $this->page_data["teacher"] = $this->Teacher_model->get_all_with_role();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/teacher/all");
        $this->load->view("admin/footer");
    }

    function delete($teacher_id)
    {
        $this->Teacher_model->soft_delete($teacher_id);

        redirect("teacher", "refresh");
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

                $this->Teacher_model->insert($data);

                redirect("teacher", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->page_data["role"] = $this->Role_model->get_type("TEACHER");
        $this->page_data['input_field'] = $this->Teacher_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/teacher/add");
        $this->load->view("admin/footer");
    }

    function edit($teacher_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"], $teacher_id);

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
                    'teacher_id' => $teacher_id
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

                $this->Teacher_model->update_where($where, $data);

                redirect('teacher/details/' . $teacher_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $where = array(
            "teacher_id" => $teacher_id
        );

        $teacher = $this->Teacher_model->get_where_with_role($where);

        $this->show_404_if_empty($teacher);

        $this->page_data["teacher"] = $teacher[0];
        $this->page_data["role"] = $this->Role_model->get_type("TEACHER");
        $this->page_data['input_field'] = $this->Teacher_model->generate_edit_input($teacher_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/teacher/edit");
        $this->load->view("admin/footer");
    }

    function details($teacher_id)
    {

        $where = array(
            "teacher_id" => $teacher_id
        );

        $teacher = $this->Teacher_model->get_where_with_role($where);

        $this->show_404_if_empty($teacher);

        $this->page_data["teacher"] = $teacher[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/teacher/details");
        $this->load->view("admin/footer");
    }
}
