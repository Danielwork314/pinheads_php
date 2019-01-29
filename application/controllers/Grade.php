<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Grade extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Grade_model");
    }

    function index()
    {
        $this->page_data["grade"] = $this->Grade_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/grade/all");
        $this->load->view("admin/footer");
    }

    function delete($grade_id)
    {
        $this->Grade_model->soft_delete($grade_id);

        redirect("grade", "refresh");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {

                $data = array(
                    'grade' => $input['grade'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Grade_model->insert($data);

                redirect("grade", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->page_data['input_field'] = $this->Grade_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/grade/add");
        $this->load->view("admin/footer");
    }

    function edit($grade_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $where = array(
                    'grade_id' => $grade_id
                );

                $this->Grade_model->update_where($where, $input);

                redirect('grade/details/' . $grade_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $where = array(
            "grade_id" => $grade_id
        );

        $grade = $this->Grade_model->get_where($where);

        $this->show_404_if_empty($grade);

        $this->page_data["grade"] = $grade[0];
        $this->page_data['input_field'] = $this->Grade_model->generate_edit_input($grade_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/grade/edit");
        $this->load->view("admin/footer");
    }

    function details($grade_id)
    {

        $where = array(
            "grade_id" => $grade_id
        );

        $grade = $this->Grade_model->get_where($where);

        $this->show_404_if_empty($grade);

        $this->page_data["grade"] = $grade[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/grade/details");
        $this->load->view("admin/footer");
    }
}
