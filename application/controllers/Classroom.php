<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Classroom extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Classroom_model");
    }

    function index()
    {
        $this->page_data["classroom"] = $this->Classroom_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/classroom/all");
        $this->load->view("admin/footer");
    }

    function delete($classroom_id)
    {
        $this->Classroom_model->soft_delete($classroom_id);

        redirect("classroom", "refresh");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {

                $data = array(
                    'classroom' => $input['classroom'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Classroom_model->insert($data);

                redirect("classroom", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->page_data['input_field'] = $this->Classroom_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/classroom/add");
        $this->load->view("admin/footer");
    }

    function edit($classroom_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $where = array(
                    'classroom_id' => $classroom_id
                );

                $this->Classroom_model->update_where($where, $input);

                redirect('classroom/details/' . $classroom_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $where = array(
            "classroom_id" => $classroom_id
        );

        $classroom = $this->Classroom_model->get_where($where);

        $this->show_404_if_empty($classroom);

        $this->page_data["classroom"] = $classroom[0];
        $this->page_data['input_field'] = $this->Classroom_model->generate_edit_input($classroom_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/classroom/edit");
        $this->load->view("admin/footer");
    }

    function details($classroom_id)
    {

        $where = array(
            "classroom_id" => $classroom_id
        );

        $classroom = $this->Classroom_model->get_where($where);

        $this->show_404_if_empty($classroom);

        $this->page_data["classroom"] = $classroom[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/classroom/details");
        $this->load->view("admin/footer");
    }
}
