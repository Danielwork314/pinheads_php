<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Student extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("Student_model");
    }

    function index()
    {
        $this->page_data["student"] = $this->Student_model->get_all_with_role();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/student/all");
        $this->load->view("admin/footer");
    }

    function delete($student_id)
    {
        $this->Student_model->soft_delete($student_id);

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

                $this->Student_model->insert($data);

                redirect("student", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->page_data["role"] = $this->Role_model->get_type("STUDENT");
        $this->page_data['input_field'] = $this->Student_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/student/add");
        $this->load->view("admin/footer");
    }

    function edit($student_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"], $student_id);

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
                    'student_id' => $student_id
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

                $this->Student_model->update_where($where, $data);

                redirect('student/details/' . $student_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $where = array(
            "student_id" => $student_id
        );

        $student = $this->Student_model->get_where_with_role($where);

        $this->show_404_if_empty($student);

        $this->page_data["student"] = $student[0];
        $this->page_data["role"] = $this->Role_model->get_type("STUDENT");
        $this->page_data['input_field'] = $this->Student_model->generate_edit_input($student_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/student/edit");
        $this->load->view("admin/footer");
    }

    function details($student_id)
    {

        $where = array(
            "student_id" => $student_id
        );

        $student = $this->Student_model->get_where_with_role($where);

        $this->show_404_if_empty($student);

        $this->page_data["student"] = $student[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/student/details");
        $this->load->view("admin/footer");
    }
}
