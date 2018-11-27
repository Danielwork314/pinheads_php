<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Feedback_model");
        // $this->load->model("User_model");
       
    }

    public function index()
    {
        $this->page_data["feedback"] = $this->Feedback_model->get_all();
        // $this->debug($this->page_data["feedback"]);
        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/feedback/all");
        $this->load->view("admin/footer");
    }

    function add()
    {
        $this->page_data['feedback'] = $this->Feedback_model->get_all();
        // $this->page_data['user'] = $this->User_model->get_all();
        $this->page_data['input_field'] = $this->Feedback_model->generate_input();

        if ($_POST) {
            
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $data = array(
                    'feedback' => $input['feedback'],
                    'created_by' => $this->session->userdata('login_id'),
                    // 'user_id' => $this->session->userdata('login_id'),
                );

                 $this->Feedback_model->insert($data);

                redirect("feedback", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/feedback/add");
        $this->load->view("admin/footer");
    }

    function details($feedback_id)
    {

        $where = array(
            "feedback_id" => $feedback_id
        );
        // $this->debug($feedback_id);
        $feedback = $this->Feedback_model->get_where($where);

        $this->page_data["feedback"] = $feedback[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/feedback/details");
        $this->load->view("admin/footer");
    }

    function edit($feedback_id)
    {

        $where = array(
            'feedback_id' => $feedback_id
        );

        $feedback = $this->Feedback_model->get_where($where);

        $this->page_data['feedback'] = $feedback[0];

        $this->page_data['input_field'] = $this->Feedback_model->generate_edit_input($feedback_id);

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if(!$error){

                $date = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
            
                $data = array(
                    'feedback' => $input['feedback'],
                    'created_by' => $this->session->userdata('login_id'),
                    'modified_date' => $date->format("Y-m-d h:i:s"),
                    'modified_by' => $this->session->userdata('login_id')
                );

                $this->Feedback_model->update_where($where, $data);

                redirect("feedback", "refresh");

            }else{

                $this->page_data["input"] = $input;
            }
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/feedback/edit");
        $this->load->view("admin/footer");
    }

    function delete($feedback_id){

        $this->Feedback_model->soft_delete($feedback_id);
        redirect("feedback", "refresh");
    }

}
