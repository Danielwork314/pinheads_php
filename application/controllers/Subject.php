<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Subject extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Subject_model");
    }

    function index()
    {
        $this->page_data["subject"] = $this->Subject_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/subject/all");
        $this->load->view("admin/footer");
    }

    function delete($subject_id)
    {
        $this->Subject_model->soft_delete($subject_id);

        redirect("subject", "refresh");
    }
    
    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {

                $data = array(
                    'subject' => $input['subject'],
                    'created_by' => $this->session->userdata('login_id'),
                );

                $this->Subject_model->insert($data);

                redirect("subject", "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $this->page_data['input_field'] = $this->Subject_model->generate_input();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/subject/add");
        $this->load->view("admin/footer");
    }

    function edit($subject_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $where = array(
                    'subject_id' => $subject_id
                );

                $this->Subject_model->update_where($where, $input);

                redirect('subject/details/' . $subject_id, "refresh");
            } else {
                $this->page_data["input"] = $input;
            }
        }

        $where = array(
            "subject_id" => $subject_id
        );

        $subject = $this->Subject_model->get_where($where);

        $this->show_404_if_empty($subject);

        $this->page_data["subject"] = $subject[0];
        $this->page_data['input_field'] = $this->Subject_model->generate_edit_input($subject_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/subject/edit");
        $this->load->view("admin/footer");
    }

    function details($subject_id)
    {

        $where = array(
            "subject_id" => $subject_id
        );

        $subject = $this->Subject_model->get_where($where);

        $this->show_404_if_empty($subject);

        $this->page_data["subject"] = $subject[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/subject/details");
        $this->load->view("admin/footer");
    }
}
